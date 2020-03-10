@extends('layouts.app')

@section('content')

@section('banner_button')
    <a class="btn btn-primary" href="{{ route('clubs.create')}}"><i class="fas fa-plus"></i> Add a new club</a>
@endsection



@include('/partials/_header_banner')

<div class="container vh-100 my-5">
    <div class="row justify-content-center border py-5 clubs-div">
        <div class="col-md-12 col-md-offset-2 text-center  ">
            <h2 class="text-danger">Error: Your are not authorized to perform this action !</h2>
            <a href="{{route('clubs.index')}}">Return to search club page</a>
        </div>

    </div>
</div>





@endsection