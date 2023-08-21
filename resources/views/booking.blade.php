@extends('layouts.theme')
@section('title', 'bookings')
@section('content')
    @include('include/navbar')
    {{--     --}}
    <!-- Contact Form Area Start -->
    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>Reservation</h6>
                        <h2>Book Your Room</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="{{route('room-booking.store')}}" method="post">
                        @csrf
                        <table class="table tbUser">
                            <tr>
                                <th>Hotel</th>
                                <th>Address</th>
                                <th>Room</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                            @foreach($name as $key=>$row)
                                @if (isset($row[0]) && isset($row[1]) && isset($row[2]) && !empty($row[0]) && !empty($row[1]) && !empty($row[2]))
                                    @php
                                        $room=\App\Room::where('id',$row[0])->first();
                                           $session=Session::get('variableName');
                                           if($session && $session['checkin-date'] && $session['checkout-date']):
                                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $session['checkin-date']);
                                            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $session['checkout-date']);
                                            $diff_in_days = $to->diffInDays($from);
                                            else:
                                            $diff_in_days=0;
                                           endif;
                                          
                                           if ($diff_in_days==0){
                                               $price=($room->price * $row[2]);
                                           }else{
                                             $price=($room->price * $row[2]) * $diff_in_days;
                                           }
                                    @endphp
                                    <tr id="trremove{{$key}}">
                                        <td>{{$room->hotel->title}}</td>
                                        <td>{{$room->hotel->address." ".$room->hotel->atCity->name}}</td>
                                        <td><input type="hidden"
                                                   value="{{$room->id}},{{$price}},{{$row[1]}},{{$row[2]}}"
                                                   name="bed_no[]">{{isset($row[1]) ? $row[1] : ""}}</td>
                                        <td>{{isset($row[2]) ? $row[2] : ""}}</td>
                                        <td>{{$price}} </td>
                                        <td><a src="javascript:void(0)" style="cursor: pointer" onclick="remove({{$key}})"><i
                                                    class="fa fa-times text-danger" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms"
                             style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                            <button type="submit" class="btn roberto-btn mt-15">
                                Reserve
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
    @include('include/callnow')
    @include('include/footer')
    <script>
        function remove(id) {
            $('#trremove' + id).remove();
        }
    </script>
@endsection
