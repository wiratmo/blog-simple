@extends('layouts.guest.index')
@push('style')
<link rel="stylesheet" type="text/css" href="{{url('/assets/font-awesome/css/font-awesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/login.css')}}">
@endpush
@section('body')
<div class="container d-table">
        <div class="d-100vh-va-middle">
        <center>
                    <h2>Masuk</h2>    
            </center>
            <hr>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card-group">
                        <div class="card p-2">
                            <div class="card-block">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="input-group mb-1 col-md-12">
                            <span class="input-group-addon"><i class="fa fa-user-o"></i>
                                    </span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="input-group mb-2 col-md-12">
                            <span class="input-group-addon"><i class="fa fa-lock"></i>
                                    </span>
                                <input id="password" type="password" class="form-control" name="password" required placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                            <div class="col-md-7" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                            </div>
                        </div>
                        <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                            <div class="card-block text-xs-center">
                                <div>
                                    <h4>Bergabunglah bersama kami</h4>
                                    <p>Bergabunglah sebagai kontrinutor artikel dan mari kita ubah dunia dnegan tuliasn dan aksi kita</p>
                                    <a href="{{url('/register')}}"><button type="button" class="btn btn-primary active mt-1">Gabung</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--  -->
@endsection

@push('script')
<script type="text/javascript" src="{{url('/assets/tether/dist/js/tether.js')}}"></script>
@endpush
