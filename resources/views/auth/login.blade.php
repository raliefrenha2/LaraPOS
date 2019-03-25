@extends('layouts.auth')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>Laravel</b>POS</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
  
      <form action="{{ route('login') }}" method="post">
        @csrf
        @if (session('error'))
            @alert(['type' => 'danger'])
                {{ session('error') }}
            @endalert
        @endif
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="{{ __('E-Mail Address') }}" {{ $errors->has('email') ? ' is-invalid' : '' }} value="{{ old('email') }}">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <p class="text-danger">{{ $errors->first('email') }}</p>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} " placeholder="{{ __('Password') }}">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <p class="text-danger">{{ $errors->first('password') }}</p>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div>
      <!-- /.social-auth-links -->
  
      <a href="#">I forgot my password</a><br>
      <a href="register.html" class="text-center">Register a new membership</a>
  
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
