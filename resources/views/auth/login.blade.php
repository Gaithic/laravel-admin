@extends('layout.master')


@section('content')
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
    <div class="wrap-login100">
        <form class="login100-form validate-form" action="{{ route('user-login') }}" method="post">
            @csrf
            <span class="login100-form-logo">
                <i class="zmdi zmdi-landscape"></i>
            </span>

            <span class="login100-form-title p-b-34 p-t-27">
                {{ $title }}

            </span>

            <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                <input class="input100" type="email" name="email" placeholder="Enter Email">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            @error('email')
            <div class="alert alert-danger" role="alert">
                <small>
                    <strong>{{ $message }}</strong>
                </small>
            </div>
            @enderror

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            @error('password')
            <div class="alert alert-danger" role="alert">
                <small>
                    <strong>{{ $message }}</strong>
                </small>
            </div>
            @enderror

            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                    Remember me
                </label>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Login
                </button>
            </div>

            <div class="text-center p-t-90">
                <a class="txt1" href="{{route('forget-password')}}">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
