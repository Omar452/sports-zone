@extends('layouts.app')

@section('content')

@section('banner_button')
    <a class="btn btn-primary" href="{{ route('clubs.create')}}"><i class="fas fa-plus"></i> Add a new club</a>
@endsection

@include('/partials/_header_banner')  

<!--CLUB MODAL-->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure that you want to delete your club?</p>
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{route('clubs.destroy', $club)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="Delete my club"> 
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<!--CLUB MODAL-->

<div class="container py-3">
  @include('partials/_alerts')
</div>

<!--CLUB-->
<div class="container mb-5">
    <div class="container">
      <div class="row py-3 justify-content-center">
        <h1>{{$club->name}}</h1>
      </div>
      <div>
        @can('update',$club)
        <a class="btn btn-warning" href="{{route('clubs.edit', $club)}}"><i class="fas fa-edit"></i> Edit</a>
        @endcan
        @can('delete',$club)
        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i> Delete</button>
        @endcan  
      </div>
      
      <div class="fluid text-center my-3">
        @if(!empty($club->image))
        <img class="img-fluid" src="{{  asset("storage/" . $club->image) }}" alt="club picture">
        @else
        <img class="img-fluid" src="{{  url('images/sport.jpg') }}" alt="club picture">
        @endif
      </div>
      <div class="d-flex">
        <div class="d-flex align-items-start mr-3">      
          <p>{{$club->likes}} <i class="far fa-thumbs-up"></i></p>
        
          <form method="post" action="{{ route('clubs.like', $club) }}">
            @method('PUT')
            @csrf
            <input type="submit" class="btn btn-info btn-sm" name="submitbutton" value="Like" >
          </form>
        </div>
        <div class="d-flex align-items-start mr-3">
          <p>{{$club->dislikes}} <i class="far fa-thumbs-down"></i></p>
          <form method="post" action="{{ route('clubs.dislike', $club) }}">
            @method('PUT')
            @csrf
            <input type="submit" class="btn btn-danger btn-sm" name="submitbutton" value="Dislike" >
          </form>
        </div>
        <div>
          <p class="btn btn-dark btn-sm"><i class="fas fa-comment"></i> {{$comments->count()}} comments</p>
        </div>
      </div>
      <div>
        <p>Sport: {{$club->sports}}</p>
        <p>{{$club->description}}</p>
        <p>{{$club->address}}</p>
        <p>{{$club->city}}</p>
        <p>{{$club->county}}</p>
        <p>{{$club->postcode}}</p>
        <p>{{$club->price}}£ / per month</p>
        <p>{{$club->phone_number}}</p>
        <p>{{$club->email}}</p>
      </div>
    </div>
</div>

<!--COMMENTS-->
<div class="container mb-5">
  <h3 class="py-2">Comments</h3>

  <!-- COMMENT FORM-->
  <form action="{{route('comments.store', $club)}}" method="POST">
    @csrf
    <div class="form-group">
      
      <textarea class="w-100 form-control bg-light @error('content') is-invalid @enderror mb-2" name="content" id="content" placeholder="Add your comment here..."></textarea>
      @error('content')
        <div class="invalid-feedback"> {{ $errors->first('content')}}</div>
      @enderror
      <div class="text-right">
        <input class="btn btn-primary btn-sm" type="submit" value="Submit">
      </div> 
    </div>
  
  </form>
  <!-- COMMENT FORM-->
  
  @forelse ($comments as $comment)
    <!--COMMENT MODAL-->
    <div id="myCommentModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure that you want to delete your comment?</p>
          </div>
          <div class="modal-footer">
              <form method="POST" action="{{route('comments.destroy', $comment)}}">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="Delete my comment"> 
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--COMMENT MODAL-->

    <div class="container">
      <div class="row clubs-div p-3">

        <!--COMMENT-->

        <div class="d-flex align-items-baseline col-12">
          <p class="text-primary pr-2"> {{$comment->user->name}}</p>
          @if($comment->created_at == $comment->updated_at )
          <p class="italic">{{$comment->created_at->format('d/m/Y')}}</p>
          @else
          <p class="italic">{{$comment->updated_at->format('d/m/Y')}} (edited)</p>
          @endif
        </div>
        <div class="col-12 comment-div">
          <div class="col-12">
            <p class="text-justify comment-content">{{$comment->content}}</p>  
          </div>
          <div class="col-12 d-flex  justify-content-between">
            <div>
              @if($comment->signalments > 0)
              <p class="text-danger italic m-0 pt-2"><i class="fas fa-exclamation-triangle"></i> Signaled {{$comment->signalments}} time</p>
              @elseif($comment->signalments > 1)
              <p class="text-danger italic m-0"><i class="fas fa-exclamation-triangle"></i> Signaled {{$comment->signalments}} times</p>
              @endif
            </div>
            <div class="d-flex">
              <form method="POST" action="{{route('comments.signal', $comment)}}">
                @method('PUT')
                @csrf
                <button class="btn btn-link btn-sm"><i class="fas fa-ban"></i> Signal</button>
              </form>
              @can('update',$comment)
              <button class="btn btn-link btn-sm edit-button"><i class="fas fa-edit"></i> Edit</button> 
              @endcan
              @can('delete',$comment)
              <button class="btn btn-link btn-sm" type="button" data-toggle="modal" data-target="#myCommentModal"><i class="fas fa-trash-alt"></i> Delete</button>
              @endcan
            </div>
          </div>
        </div>
        
        <!--COMMENT-->

        <!--EDIT FORM-->
        <form class="pt-3 w-100 edit-form hidden" action="{{route('comments.update', $comment)}}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">  
            <textarea class="w-100 form-control bg-light edit-area @error('content') is-invalid @enderror mb-2" name="content" id="content">{{$comment->content}}</textarea>
            @error('content')
              <div class="invalid-feedback"> {{ $errors->first('content')}}</div>
            @enderror
            <div class="text-right">
              <button type="button" class="btn btn-dark btn-sm cancel-button"><i class="far fa-window-close"></i> Cancel</button>
              <input class="btn btn-primary btn-sm " type="submit" value="Edit your comment">
            </div>
          </div>
        </form>
        <!--EDIT FORM-->

      </div>
    </div>
  @empty
      <p>No comment found for this club !</p>
  @endforelse
</div>

@endsection
