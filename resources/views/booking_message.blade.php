@extends('layouts.theme')
@section('title', 'Dashboard')
@section('content')
    @include('include/navbar')
     @include('include/breadcrumb', ['page' => 'Booking History'])
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-12">
               <h2 class="text-center">My Booking History Log</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <!-- Section Heading -->
                <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                    <div class="container">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="row row-grid align-items-center">
                           
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Hotel</th>
                                    <th>Booking Number</th>
                                    <th>Room Assigned</th>
                                    <th>Adults</th>
                                    <th>Childrens</th>
                                    <th>Booked Ago</th>
                                    <th>Booking Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($bookings as $room_booking)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <!-- <td><span class="badge badge-success">{{ $room_booking->id }}</span></td> -->
                                        <td>{{ $room_booking->hotel->title}}</td>
                                        {{-- <td>{{ !is_null($room_booking->roomCategory) ? $room_booking->roomCategory->title : '' }}</td> --}}
                                        <td>{{$room_booking->booking_number}}</td>
                                        <td>{!! $room_booking->room_id == '' ? '<span class="badege badge-primary">Not Assigned</span>' : '<span class="badge badge-info">Assigned</span>' !!}</td>
                                        <td>{{ $room_booking->no_of_adults }} Adults </td>
                                        <td>{{ $room_booking->no_of_childrens }} Childrens</td>
                                        <td>{!! $room_booking->created_at->diffForHumans() !!}</td>
                                        <td>{!! $room_booking->created_at->format('d-m-Y') !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{-- <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Hotel</th>
                                    <th>Booking Number</th>
                                    <th>Room Assigned</th>
                                    <th>Adults</th>
                                    <th>Childrens</th>
                                    <th>Booked Ago</th>
                                    <th>Booking Date</th>
                                </tr>
                                </tfoot> --}}
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('include/callnow') --}}
    @include('include/footer')
@endsection
