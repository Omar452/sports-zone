@extends('layouts.app')

@section('content')

@section('banner_button')
    <a class="btn btn-primary" href="{{ route('clubs.create')}}"><i class="fas fa-plus"></i> Add a new club</a>
@endsection

<div class="fluid">

    @include('/partials/_header_banner')

    <div class="container py-3">
        @include('partials/_alerts')
    </div>

    <div class="row p-2 justify-content-center">
        <h1>CLUBS</h1>
    </div>    

    <div class="container">
        <div class="row clubs-div justify-content-center">
            <form class="d-flex align-items-center search-bar"  method="GET" action="{{ route('clubs.index') }}">

                <div class="d-flex align-items-center px-2">
                    <label class="p-1" for="sport-input">Sport</label>
                    <input class="form-control" id="sport-input" type="text" name="sports">
                </div>
                
                <div class="d-flex align-items-center px-2">
                    <label class="p-1" for="city-input">City</label>
                    <input class="form-control" id="city-input" type="text" name="city">
                </div>

                <div class="d-flex align-items-center px-2">
                    <label class="p-1" for="county-input">County</label>
                    <input class="form-control" id="county-input" type="text" name="county">
                </div>

                <div class="px-2">
                    <input class="btn btn-primary btn-sm" type="submit" value="Search">
                </div>

            </form>            
        </div>     
        
    </div> 

    @include('/partials/_clubs_list')

    <div class="fluid m-5">
        <div class="row justify-content-center">
                {{ $clubs->links() }}
        </div>
    </div>

</div>

@endsection
