@extends('layouts.app')

@section('content')

@section('banner_button')
    <a class="btn btn-primary" href="{{ route('clubs.index')}}"><i class="fas fa-arrow-left"></i> Return to club search page</a>
@endsection

@include('/partials/_header_banner')

<div class="fluid">
    <div class="row p-5 justify-content-center">
        <h1>Edit my club</h1>
    </div>
</div>    


<div class="container mb-5">
    <div class="card clubs-div">
        <div class="card-body">
            <form method="POST" action="{{ route('clubs.update', $club) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12 form-group">
                    <label for="sports" class="col-12 col-form-label text-center">Club sport(s)</label>
                    <div class="col-md-12 row m-0 text-left d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Archery" @if(in_array('Archery',$sports)){{'checked'}}@endif> Archery
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Athletics"  @if(in_array('Athletics',$sports)){{'checked'}}@endif> Athletics
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Badminton"  @if(in_array('Badminton',$sports)){{'checked'}}@endif> Badminton
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Basketball"  @if(in_array('Basketball',$sports)){{'checked'}}@endif> Basketball
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Boxing"  @if(in_array('Boxing',$sports)){{'checked'}}@endif> Boxing
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Brazilian Jiu-jitsu"  @if(in_array('Brazilian Jiu-jitsu',$sports)){{'checked'}}@endif> Brazilian Jiu-jitsu
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Cricket"  @if(in_array('Cricket',$sports)){{'checked'}}@endif> Cricket
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Crossfit"  @if(in_array('Crossfit',$sports)){{'checked'}}@endif> Crossfit
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Disability Sport"  @if(in_array('Disability Sport',$sports)){{'checked'}}@endif> Disability Sport
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Equestrian"  @if(in_array('Equestrian',$sports)){{'checked'}}@endif> Equestrian
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Fitness"  @if(in_array('Fitness',$sports)){{'checked'}}@endif> Fitness
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Football"  @if(in_array('Football',$sports)){{'checked'}}@endif> Football
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Golf"  @if(in_array('Golf',$sports)){{'checked'}}@endif> Golf
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Grapling"  @if(in_array('Grapling',$sports)){{'checked'}}@endif> Grapling
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Gymnastics"  @if(in_array('Gymnastics',$sports)){{'checked'}}@endif> Gymnastics
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Handball"  @if(in_array('Handball',$sports)){{'checked'}}@endif> Handball
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Hockey"  @if(in_array('Hockey',$sports)){{'checked'}}@endif> Hockey
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Judo"  @if(in_array('Judo',$sports)){{'checked'}}@endif> Judo
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Karate"  @if(in_array('Karate',$sports)){{'checked'}}@endif> Karate
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Kun-fu"  @if(in_array('Kun-fu',$sports)){{'checked'}}@endif> Kun-fu
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Mixed Martial Arts"  @if(in_array('Mixed Martial Arts',$sports)){{'checked'}}@endif> Mixed Martial Arts
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Motorsport"  @if(in_array('Motorsport',$sports)){{'checked'}}@endif> Motorsport
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Muay Thai"  @if(in_array('Muay Thai',$sports)){{'checked'}}@endif> Muay Thai
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Rugby"  @if(in_array('Rugby',$sports)){{'checked'}}@endif> Rugby
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Sambo"  @if(in_array('Sambo',$sports)){{'checked'}}@endif> Sambo
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Squash"  @if(in_array('Squash',$sports)){{'checked'}}@endif> Squash
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Swimming"  @if(in_array('Swimming',$sports)){{'checked'}}@endif> Swimming
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Table Tennis"  @if(in_array('Table Tennis',$sports)){{'checked'}}@endif> Table Tennis
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Taekwondo"  @if(in_array('Taekwondo',$sports)){{'checked'}}@endif> Taekwondo
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Tennis"  @if(in_array('Tennis',$sports)){{'checked'}}@endif> Tennis
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Volleyball"  @if(in_array('Volleyball',$sports)){{'checked'}}@endif> Volleyball
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Winter Sports"  @if(in_array('Winter Sports',$sports)){{'checked'}}@endif> Winter Sports
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Wrestling"  @if(in_array('Wrestling',$sports)){{'checked'}}@endif> Wrestling                      
                                </label>
                            </div>
                        </div>

                        <div class="{{ $errors->first('sports') }}">
                            <p class="danger">{{ $errors->first('sports') }}</p>
                        </div>
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') ? : $club->name }}" placeholder="club name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                        placeholder="club description">{{ old('description') ? : $club->description}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') ? :$club->email }}"" placeholder="club email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text" name="phone_number" class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('phone_number') ? : $club->phone_number }}"  placeholder="club phone number">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" 
                        value="{{ old('address') ? : $club->address }}"  placeholder="club street address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        value="{{ old('city') ? : $club->city }}"  placeholder="club city">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="county" class="col-md-4 col-form-label text-md-right">{{ __('County') }}</label>

                    <div class="col-md-6">
                        <input id="county" type="county" class="form-control @error('email') is-invalid @enderror" name="county"
                        value="{{ old('county') ? : $club->county }}"  placeholder="club county">
                        @error('county')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                    <div class="col-md-6">
                        <input id="postcode" type="postcode" class="form-control @error('email') is-invalid @enderror" name="postcode"
                        value="{{ old('postcode') ? : $club->postcode }}"  placeholder="club postcode in majuscule ex: NW8 5XH">
                        @error('postcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price per month') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="price" class="form-control @error('email') is-invalid @enderror" name="price"
                        value="{{ old('price') ? : $club->price }}"  placeholder="club price per month ex: 35" >
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-6 mx-auto ">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input name='image' type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="customFile">   
                                <label class="custom-file-label" for="customFile">Choose an image</label>
                            </div>                          
                        </div>
                        <div class="{{ $errors->first('image') }} row col-md-6 mx-auto">
                            <p class="danger">{{ $errors->first('image') }}</p>
                        </div>   
                    </div>
                </div>

                <div class="form-group d-flex flex-column text-center">
                    <label for="owner">{{ __('I agee terms and conditions and confirm to be the club owner') }}</label>
                    <div>
                        <input class="agreement" id="agreement" type="checkbox" class="@error('agreement') is-invalid @enderror" name="agreement" value=1 checked>
                        <div class="{{ $errors->first('agreement') }}">
                            <p class="error-message danger">{{ $errors->first('agreement') }}</p>
                        </div>                              
                    </div>                 
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Edit my club') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection  