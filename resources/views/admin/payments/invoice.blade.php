@extends('admin.layouts.app') 

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>Payemnts Managment</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Payments</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid"> 

        <div class="card">
            <div class="card-body">
              <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                  <div class="col-md-9">
                    <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: {{$log->invoice_id}}</strong></p>
                  </div>
                  {{-- <div class="col-md-3">
                    <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                        class="fas fa-print text-primary"></i> Print</a>
                    <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                        class="far fa-file-pdf text-danger"></i> Export</a>
                  </div> --}}
                  <hr>
                </div>
          
                <div class="container">
                 
          
                  <div class="row">
                    <div class="col-md-8" style="margin-bottom:10px">
                      <ul class="list-unstyled">
                        <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$log->user->name}}</span></li>
                        <li class="text-muted">{{$log->user->address}}</li>
                        <li class="text-muted"><i class="fa fa-phone"></i> {{$log->user->mobile}}</li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                     
                      <ul class="list-unstyled">
                        <li class="text-muted"><span style="color:#5d9fc5 ;">Invoice</span></li>
                        <li class="text-muted"><i class="fa fa-calendar-o" style="color:#84B0CA ;"></i> <span
                            class="fw-bold">Creation Date: </span>{{$log->created_at}}</li>
                        <li class="text-muted"> <span
                            class="me-1 fw-bold">Status:</span> @if($log->payment_status == 0)
                            <span class="badge badge-danger" style="
                            background-color: red;">Pending</span>
                            @else
                            <span class="badge badge-danger" style="
                            background-color: green;">Success</span>
                            @endif</li>
                      </ul>
                    </div>
                  </div>
          
                  <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless">
                      <thead style="background-color:#84B0CA ;" class="text-white">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col" style="width: 15%">Subscription Amount</th>
                          <th scope="col" style="width: 10%">Other Charges</th>
                          <th scope="col" >Description(Other Charges)</th>
                          <th scope="col" style="width: 15%">Pervious adjusment</th>
                          <th scope="col">Total Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>{{$log->subscription_amount}}</td>
                          <td>{{$log->other_charges}}</td>
                          <td>{{$log->description}}</td>
                          <td>{{$log->pervious_adjusment}}</td>
                          <td>{{$log->payment}}</td>
                        </tr>
                      </tbody>
          
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="text-black float-right"><span class="text-black me-3"> Total Amount</span><span
                          style="font-size: 25px;"> Rs {{$log->payment}}</span></p>
                    </div>
                  </div>
                  <hr>
                  @if (Auth::user()->roles->first()->id != 1)
                  <div class="row">
                    <div class="col-xl-10">
                      <p>Thank you for your purchase</p>
                    </div>
                    <div class="col-xl-2">
                      <button type="button" class="btn btn-primary text-capitalize"
                        style="background-color:#60bdf3 ;">Pay Now</button>
                    </div>
                  </div>
                  @endif

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@endsection 

@section('title', 'Payemnts') 
@section('custom-js')
<script>
    function calculate()
    {
    var subamount = $("#subamount").val();
    var othercharges = $("#othercharges").val();
    var perviousadjusment = $("#perviousadjusment").val(); 
    var sum = (Number(subamount) + Number(othercharges)) - perviousadjusment;
    $('#totaltopay').text(sum); 
    }
    function pay()
    {
    
    var subamount = $("#subamount").val();
    var othercharges = $("#othercharges").val();
    var perviousadjusment = $("#perviousadjusment").val(); 
    var sum = (Number(subamount) + Number(othercharges)) - perviousadjusment;
    var user_id = $('select[id=user]').val();
    var desc =  $("#desc").val(); 
    var from =  $("#from").val(); 
    var to   =  $("#to").val(); 
    
    if(user_id == ''){ toastr.error('Please select user');}
    else if(from == '' || to == '')
    {
        toastr.error('Please Select Dates');
    }
    else if(subamount == '')
    {toastr.error('Please enter Subscription Amount');}
    
    else
    {
    $.ajax({
                type: 'GET',
                url: '{{ url('generate_invoice') }}',
                data: {
                    subamount : subamount,
                    othercharges : othercharges,
                    perviousadjusment : perviousadjusment,
                    sum : sum,
                    user_id : user_id,
                    desc : desc,
                    from : from,
                    to : to
                },
                success: function (data) {
                
                 location.reload();
                 }
            });
        }
    }
       
</script>
@endsection
