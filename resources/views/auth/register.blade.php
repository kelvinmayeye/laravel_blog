@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </nav>

                <div class="form-card bg-light p-3 rounded">
                    <form action="{{url('register')}}" method="POST">
                        @csrf
    
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your name" value="{{ old('name') }}">
                            @error('name')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your email" value="{{ old('email') }}">
                            @error('email')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Choose a Password">
                            @error('password')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password">
                            @error('password_confirmed')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" name="" class="btn btn-primary" >Register</button>
                        </div>
    
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
