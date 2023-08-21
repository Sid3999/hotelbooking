@extends('admin.layouts.app') 

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payments
        <small>Payemnts Managment</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Payments</a></li>
        <li class="active">Manage</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid"> 

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-users"></i>
                                    Payments Management
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Select user</label>
                                            <select class="form-control" id="user" name = "user">
                                                <option value="">Select</option>
                                                @foreach($users as $record)
                                                    <option value="{{$record->id}}">{{$record->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subamount">Subscription Start Date</label>
                                            <input type = "date" id = "from" name = "from" >
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subamount">Subscription End Date</label>
                                            <input type = "date" id = "to" name = "to">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subamount">Subscription Amount</label>
                                            <input type = "number" id = "subamount" name = "subamount" onkeyup="calculate()">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="othercharges">Other Charges</label>
                                            <input type = "number" id = "othercharges" name = "othercharges" onkeyup="calculate()">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="othercharges">Pervious Adjusment</label>
                                            <input type = "number" id = "perviousadjusment" name = "perviousadjusment" onkeyup="calculate()">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desc">Description</label>
                                            <textarea id = "desc" rows="7" cols = "30" name = "desc" placeholder="Other Charges Description"></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="payment-div">
                                            <div class="box box-widget widget-user-2">
                                                {{-- <div class="widget-user-header bg-info">
                                                    <div class="widget-user-image">
                                                        <img class="img-circle user-img" src="{{asset('images/logo.png')}}" alt="User Avatar">
                                                    </div>
                                                        
                                                        <h3 class="widget-user-username user-name"></h3>
                                                        <h5 class="widget-user-desc hotel-name"></h5>
                                                </div> --}}
                                                <div class="box-footer no-padding">
                                                    <ul class="nav nav-stacked">
                                                        <li><a href="#">Total to Pay <span class="pull-right badge bg-blue payment" id = "totaltopay">0</span></a></li>
                                                        {{-- <li><a href="">Subscription <span class="pull-right badge bg-blue subscription-type">0</span></a></li> --}}
                                                    </ul>
                                                    
                                                </div>
                                                <div class="box-footer">
                                                <button type="button pull-left " id="pay" class="btn btn-info payment-btn" onclick="pay()">Generate Invoice</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-users"></i>
                                    Payments Log
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>User</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Created at</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                @foreach($logs as $log)
                                                <tbody>
                                                    <tr>
                                                        <td>{{$log->id}}</td>
                                                        <td>{{$log->user->name}}</td>
                                                        <td>{{$log->payment}}</td>
                                                        <td>
                                                            @if($log->payment_status == 0)
                                                            <span class="badge badge-danger" style="
                                                            background-color: red;">Pending</span>
                                                            @else
                                                            <span class="badge badge-danger" style="
                                                            background-color: green;">Success</span>
                                                            @endif
                                                        </td>
                                                        <td>{{$log->created_at->diffForHumans()}}</td>
                                                        <td>  <a href="{{ url('/invoice/'.$log->id) }}" title="View Hotel"><i
                                                            class="fa fa-eye text-info"></i></a>
                                                            @if($log->payment_status == 0)
                                                            <img style = "width:25px ; cursor: pointer ; margin-bottom: 3px" src="{{ asset('images/offbutton.png') }}" data-toggle="tooltip" data-placement="top" title="Change Status" onclick="status(1,{{$log->id}})       "> 
                                                            @else
                                                            <img style = "width:30px ; cursor: pointer ; margin-bottom: 3px" src="{{ asset('images/onbutton.png') }}" data-toggle="tooltip" data-placement="top" title="Change Status" onclick="status(0,{{$log->id}})">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @endforeach

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                          
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@endsection 

@section('title', 'Payemnts') 
@section('custom-js')
<script>
    function status(id,hid)
        {
            $.ajax({
                type: 'GET',
                url: '{{ url('updatestatus') }}',
                data: {
                id : id,
                hid : hid,
                cid : 1
                },
                success: function () {
                    location.reload();
                }
        });
    }
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
       

    
// $('body').on('change', '#users', function(){
//      user_id = $(this).val();
//     var imgPath = '{{url("")}}';
//      if(user_id != ''){
//         try{
//             $('.payment-btn').attr('disabled', 'disabled');
//             $.ajax({
//             url: "{{route('payments.get_payment')}}",
//             type: "GET",
//             data: {user_id: user_id},
//             dataType: "json",
//             success: function(res){
//                 if(res.status == 'success'){
//                     data = res.data
//                     $('.user-img').attr('src', imgPath+'/'+data.user.image);
//                     $('.user-name').text(data.user.name);
//                     $('.hotel-name').text(data.hotel.title);
//                     $('.payment').text(data.charges);
//                     $('.subscription-type').text(data.type);
//                     console.log(data);
//                 }
                
              

//             },
//             onError: function(data){
//                 console.log(data);
//             }
//         });
//         $('.payment-btn').removeAttr('disabled');
//         }catch(error){
//             console.log(error);
//         }
//     }
// });

// $('body').on('click','.payment-btn',function(){
//     if(typeof user_id != 'undefined' &&  user_id != ''){
//         $('.payment-btn').attr('disabled', 'disabled');
//         try{
//             $.ajax({
//             url: "{{route('payments.pay')}}",
//             type: "GET",
//             data: {user_id: user_id},
//             dataType: "json",
//             success: function(res){
//                 if(res.status == 'success'){
//                     data = res.data
//                    $('.users').val('');
//                    toastr.success(res.message);
//                    setTimeout(() => {
//                         window.location.reload();
//                    }, 1000);
//                 }
                
              

//             },
//             onError: function(data){
//                 console.log(data);
//             }
//         });
//         }catch(error){
//             console.log(error);
//         }
//     }else{
//         toastr.error('Please select user');
//     }
// });
</script>
@endsection
