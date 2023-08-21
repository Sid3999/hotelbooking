<?php

namespace App\Http\Controllers;
use Auth;
use App\Payment;
use App\RoleUser;
use App\PaymentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use PDF;
class PaymentController extends Controller
{
    public function index()
    {
        $logs = PaymentLog::get();
        // // $paymentIds = PaymentLog::where('payment_status', '=', '1')
        // //     ->where(DB::raw('MONTH(payment_date)'),'=',date('m'))
        // //     ->where('payment','>',0)
        // //     ->select(DB::raw('DISTINCT(user_id) as user_id'))
        // //     ->pluck('user_id');
        $users = RoleUser::where('role_id',3)
            ->with('users')
            ->get()
            ->pluck('users');
        return view('admin.payments.index',compact('users' , 'logs'));
    }

    public function get_payemnt(Request $request)
    {
        try{
           if($request->has('user_id')):
                $user_id = $request->user_id;
                // dd($user_id);
                $payment =  Payment::where('user_id',$user_id)
                    ->select(
                        '*',
                        DB::raw('(IF(subscription_type = "1", "Monthly", "Yearly")) as type')
                        )
                    ->with('user','hotel')
                    ->first();
                return response()->json(['status'=>'success','data'=>$payment],200);
           endif;
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function pay(Request $request)
    {
        try{
            if($request->has('user_id')):
               $payment = Payment::where('user_id',$request->user_id)->first();
                if($payment):
                    $paymentlog = new PaymentLog();
                    $paymentlog->user_id = $request->user_id;
                    $paymentlog->hotel_id = $payment->hotel_id;
                    $paymentlog->payment_id = $payment->id;
                    $paymentlog->payment_date = date('Y-m-d');
                    $paymentlog->payment_status = '1';
                    $paymentlog->payment = $payment->charges;
                    $paymentlog->save();
                endif;
                return response()->json(['status'=>'success','message'=>'Payment Successful'],200);
            endif;
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function generateInvoice(Request $request)
    {
        $number = rand(100000,999999);
        $number = 'INV - ' . $number . $request->user_id;
        $paymentlog = new PaymentLog();
        $paymentlog->user_id = $request->user_id;
        $paymentlog->subscription_start_date = $request->from;
        $paymentlog->subscription_end_date = $request->to;
        $paymentlog->other_charges = $request->othercharges;
        $paymentlog->subscription_amount = $request->subamount;
        $paymentlog->pervious_adjusment = $request->perviousadjusment;
        $paymentlog->payment = $request->sum;
        $paymentlog->invoice_id = $number;
        $paymentlog->description = $request->desc;
        $paymentlog->save();

        return 'Done';
    }
    public function Invoice($id)
    {
        $log =PaymentLog::where('id',$id)->first();
        return view('admin.payments.invoice' , compact('log'));
    }
    public function allinvoices()
    {
        $logs = PaymentLog::where('user_id',Auth::user()->id)->get();
        return view('admin.invoice.index' , compact('logs'));
    }
    public function print($id)
    {
        // // dd('hello');
        $log =PaymentLog::where('id',$id)->with('User')->first();
       
       
        $pdf = PDF::loadView('admin.payments.pdf', compact('log'));
        // dd($pdf);
        return $pdf->download('invoice.pdf');
      
    //    dd($log);
        // return view('admin.payments.pdf' , compact('log'));
    }
}
