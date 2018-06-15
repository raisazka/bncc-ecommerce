@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/styleLogin.css')}}">
@endsection
@section('content')
    <main>
        <center>
            <div class="square">
                <div class="Login col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br>
                    <center><h3><b>LOGIN</b></h3></center>
                    <br>
                    <form class="Form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <center style="margin-top: 20px;">Not yet register? <a href="{{route('register')}}"><b>Sign up</b></a></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </center>
    </main>
@endsection
