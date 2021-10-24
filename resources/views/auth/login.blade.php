@extends('layouts.front')
@section('page_title', 'Login')
@section('container')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Page Content -->

<div class="row">
    <div class="col-md-8 offset-md-2">
        <!-- Login Tab Content -->
        <div class="account-content">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 col-lg-6 login-left">
                    <img src="{{ asset('front/assets/img/login-banner.png') }}" class="img-fluid" alt="Doccure Login">
                </div>
                <div class="col-md-12 col-lg-6 login-right">
                    <div class="login-header">
                        <h3>Login <span>Doccure</span></h3>
                    </div>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group form-focus">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control floating @error('email') is-invalid @enderror">
                            <label class="focus-label">Email</label>
                        </div>
                        <div class="form-group form-focus">
                            <input id="password" type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" required>
                            <label class="focus-label">Password</label>
                        </div>
                        <div class="text-right">
                            <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class="row form-row social-login">
                            <div class="col-6">
                                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                            </div>
                        </div>
                        <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Login Tab Content -->
    </div>
</div>

<!-- /Page Content -->
@endsection
