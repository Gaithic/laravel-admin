@extends('layout.master')


@section('content')
<div class="container-login100" style="background-image: url('images/bg-01.jpg');" >
    <div class="wrap-login100">
        <form class="login100-form validate-form" action="{{ route('/save-user') }}" method="post" name="registration" >
            @csrf
            <span class="login100-form-logo">
                <i class="zmdi zmdi-landscape"></i>
            </span>

            <span class="login100-form-title p-b-34 p-t-27 text-center" >
                {{ $title }}
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Enter username">
                <input class="input100" type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            @error('username')
            <div class="alert alert-danger" role="alert">
                <small>
                    <strong>{{ $message }}</strong>
                </small>  
            </div>
            @enderror

            <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                <input class="input100" type="email" name="email" id="email" placeholder=" Enter Email" {{ old('email') }}>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            @error('email')
            <div class="alert alert-danger" role="alert">
                <small>
                    <strong>{{ $message }}</strong>
                </small>  
            </div>
            @enderror

            <div class="wrap-input100 validate-input" data-validate = "Enter Contact">
                <input class="input100" type="text" name="contact" id="contact" placeholder=" Enter contact" {{ old('contact') }}>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            @error('contact')
            <div class="alert alert-danger" role="alert">
                <small>
                    <strong>{{ $message }}</strong>
                </small>  
            </div>
            @enderror

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100" type="password" name="password" id="poassword" placeholder="Password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>
            @error('password')
            <div class="alert alert-danger" role="alert">
                <small>
                    <strong>{{ $message }}</strong>
                </small>  
            </div>
            @enderror

            
            <div class="wrap-input100 validate-input" data-validate="Confirm password">
                <input class="input100" type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm Password">
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                    Agree with the terms and conditions
                </label>
            </div>
            @error('remember-me')
            <div class="alert alert-danger" role="alert">
                <small>
                    <strong>{{ $message }}</strong>
                </small>  
            </div>
            @enderror

            <div class="container-login100-form-btn">
                <input class="login100-form-btn" type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    
            </div>

            <div class="text-center p-t-90">
                <a class="txt1" href="#">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection