@extends('layouts.app')

@section('content')

@section('banner_button')
    <a class="btn btn-primary" href="{{ route('clubs.create')}}"><i class="fas fa-plus"></i> Add a new club</a>
@endsection

@include('/partials/_header_banner')

<div class="container py-3">
    @include('partials/_alerts')
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1 class="text-center">Your club(s): {{$clubs->count()}}</h1>

            @include('/partials/_clubs_list')

        </div>
    </div>
</div>

@endsection
