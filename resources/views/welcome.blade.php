@extends('layouts.app')

@section('content')


<div class="col-12 banner">
    <div class="col-12 div-img"> 
        <img class="img-fluid gym-img" src="{{url('/images/background1.jpg')}}" alt="boxing gym">
    </div>
    <div class="col-lg-7 banner-txt">
        <p>You will have no excuse to not practice sport !</p>
        <h1>SPORTS ZONE</h1>
        <a href="{{route('clubs.index')}}" class="btn btn-primary">Search a club</a>
        <a href="{{route('clubs.create')}}" class="btn btn-primary">Add a club</a>
    </div>
</div>







@endsection