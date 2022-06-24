@extends('layout.wrapper') @section('content')
<div class="row">
<!-- main content -->
@if($status != 'success')
<div class="col-md-12" > 
        <div class="alert alert-info">
        <h1> Payment status: {{$payment_status}}</h1>
        @if($payment_status == 'paid')
        <h2> Paiment id: {{$payment_id}}</h2>
        @endif   
        </div>
    </div>
<div class="col-md-12" > 
    <div class="alert alert-danger">
    <h1> Premium Access status: {{$status}}</h1>
    <h2> {{$message}}</h2>
    <h3>{{$th}}</h3>
       
    </div>
    <div>        
</div>
@endif
@if($status == 'success')
<div class="col-md-12" > 
<div class="alert alert-success">
    <h1>congrats your now a premium user.</h1>
    <h2>Now you can download the Hit 60 Application.</h2>
    <a href="#" class="btn btn-info"> Downlod App</a>
</div>
</div>
@endif
<!--main content -->


@endsection