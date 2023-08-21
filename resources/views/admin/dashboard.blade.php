@extends('admin.layouts.app') 

@section('content')
<style>
  .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Dashboard Overview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Overview</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid"> 

    
<div class="container">
    <div class="row">
    <div class="col-md-5">
      <div class="card-counter primary">
        <i class="fa fa-user"></i>
        <span class="count-numbers">{{$bookings}}</span>
        <span class="count-name">Total Bookings</span>
      </div>
    </div>

    <div class="col-md-5">
      <div class="card-counter danger">
        <i class="fa fa-home"></i>
        <span class="count-numbers">{{$rooms}}</span>
        <span class="count-name">Total Rooms</span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="card-counter success">
        <i class="fa fa-money"></i>
        <span class="count-numbers">{{$revenue}}</span>
        <span class="count-name">Revenue</span>
      </div>
    </div>

    <div class="col-md-5">
      <div class="card-counter info">
        <i class="fa fa-h-square"></i>
        <span class="count-numbers">{{$hotels}}</span>
        <span class="count-name">No of Hotels</span>
      </div>
    </div>
  </div>
</div>


    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@endsection 

@section('title', 'Dashboard') 