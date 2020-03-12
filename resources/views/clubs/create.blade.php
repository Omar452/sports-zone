@extends('layouts.app')

@section('content')

@section('banner_button')
    <a class="btn btn-primary" href="{{ route('clubs.index')}}"><i class="fas fa-arrow-left"></i> Return to club search page</a>
@endsection

@include('/partials/_header_banner')

<div class="fluid">
    <div class="row p-5 justify-content-center">
        <h1>Add a new club</h1>
    </div>
</div>    


<div class="container mb-5">
    <div class="card clubs-div mb-5">
        <div class="card-header">{{ __('Create a club') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('clubs.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-12 form-group">
                    <label for="sports" class="col-12 col-form-label text-center">Club sport(s)</label>
                    <div class="col-md-12 row m-0 text-left d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Archery"> Archery
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Athletics"> Athletics
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Badminton"> Badminton
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Basketball"> Basketball
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Boxing"> Boxing
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Brazilian Jiu-jitsu"> Brazilian Jiu-jitsu
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Cricket"> Cricket
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Crossfit"> Crossfit
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Disability Sport"> Disability Sport
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Equestrian"> Equestrian
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Fitness"> Fitness
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Football"> Football
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Golf"> Golf
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Grapling"> Grapling
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Gymnastics"> Gymnastics
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Handball"> Handball
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Hockey"> Hockey
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Judo"> Judo
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Karate"> Karate
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Kun-fu"> Kun-fu
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Mixed Martial Arts"> Mixed Martial Arts
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Motorsport"> Motorsport
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Muay Thai"> Muay Thai
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Rugby"> Rugby
                                </label>
                            </div>
                            <div class="checkbox">
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Sambo"> Sambo
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Squash"> Squash
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Swimming"> Swimming
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Table Tennis"> Table Tennis
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Taekwondo"> Taekwondo
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Tennis"> Tennis
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Volleyball"> Volleyball
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Winter Sports"> Winter Sports
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sports[]" value="Wrestling"> Wrestling
                                    
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
                        <input id="name" type="name" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="club name">
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
                        placeholder="club description">{{ old('description') }}</textarea>
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
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="club email">
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
                        value="{{ old('phone_number') }}"  placeholder="club phone number">
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
                        value="{{ old('address') }}"  placeholder="club street address">
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
                        value="{{ old('city') }}"  placeholder="club city">
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
                        value="{{ old('county') }}"  placeholder="club county">
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
                        value="{{ old('postcode') }}"  placeholder="club postcode in majuscule ex: NW8 5XH">
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
                        value="{{ old('price') }}"  placeholder="club price per month ex: 35" >
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
                        <input class="agreement" id="agreement" type="checkbox" class="@error('agreement') is-invalid @enderror" name="agreement" value=1>
                        <div class="{{ $errors->first('agreement') }}">
                            <p class="error-message danger">{{ $errors->first('agreement') }}</p>
                        </div>                              
                    </div>                 
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add my club') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection    
