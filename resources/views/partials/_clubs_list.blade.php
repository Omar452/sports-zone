@if( $clubs->count() > 0 )
@foreach ($clubs as $club)
<!--Modal-->
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
<!--Modal-->
<div class="row">
    <div class="container">
        <div class="clubs-div">
            <div class="row">           
                <div class="col-12 col-lg-5">
                    @if(!empty($club->image))
                    <img class="img-fluid" src="{{  asset("storage/" . $club->image) }}" alt="club picture">
                    @else
                    <img class="img-fluid" src="{{  url('images/sport.jpg') }}" alt="club picture">
                    @endif
                </div>
                <div class="col-12 col-lg-7 club-info">
                    <div class="row d-flex">
                        <a class="club-name pr-2" href="{{ route('clubs.show',['club' => $club->id]) }}">{{$club->name}}</a>
                    </div>
                    <div class="row py-3">
                        <div class="pr-1">
                            <a class="btn btn-primary btn-sm align-text-bottom" href="{{ route('clubs.show',['club' => $club->id]) }}"><i class="fas fa-eye"></i> Show</a>
                        </div>
                        @can('update',$club)
                        <div  class="pr-1">
                            <a class="btn btn-warning btn-sm" href="{{route('clubs.edit', $club)}}"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                        @endcan
                        @can('delete',$club)
                        <div>
                            <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i> Delete</button>                                        
                        </div> 
                        @endcan                                                                                 
                    </div>
                    <div class="row d-flex">
                        <div class="d-flex align-items-start mr-3">      
                            <p>{{$club->likes}} <i class="far fa-thumbs-up"></i></p>
                        </div>
                        <div class="d-flex align-items-start mr-3">
                            <p>{{$club->dislikes}} <i class="far fa-thumbs-down"></i></p>
                        </div>
                        <div>
                            <p class="btn btn-dark btn-sm"><i class="fas fa-comment"></i> {{$club->comments->count()}} comments</p>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <p >Sport: {{$club->sports}}</p>
                            <p>{{$club->address}}</p>
                            <p>{{$club->city}}</p>
                            <p>{{$club->county}}</p>
                            <p>{{$club->postcode}}</p>
                            <p class="justify-content-end">{{$club->price}}£/per month</p>                                    
                        </div>             
                    </div>                               
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
    <div class="container text-center py-5 no-club">
        <p class="text-danger">No club found !</p>
    </div>
    
@endif