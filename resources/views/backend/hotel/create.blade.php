@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add new hotel</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('hotel.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Hotel Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Name" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail3" placeholder="Email" value="{{old('email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Hotel Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail3" placeholder="password" value="{{old('password')}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">

                            @if(count($cities)>0)
                                <div class="form-group row">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">City Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="city_id">
                                            <option >select city</option>
                                            @foreach($cities as $city)
                                                <option class="" value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary form-control">Add</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
