@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('/anime/img/Movie.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Sign Up</h2>
                    <p>Welcome to the Blog Review Movie.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('contentdua')
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Sign Up</h3>
                    <form action="{{route('signup')}}" method="POST">
                        @csrf
                        <div class="input__item">
                            <input name="email" type="text" placeholder="Email address" value="{{old('email', '')}}">
                            <span class="icon_mail"></span>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input__item">
                            <input name="name" type="text" placeholder="Your Name" value="{{old('name', '')}}">
                            <span class="icon_profile"></span>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input__item">
                            <input name="password" type="password" placeholder="Password" value="{{old('password' , '')}}">
                            <span class="icon_lock"></span>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input__item">
                            <input name="password_confirmation" type="password" placeholder="Konfirmasi password" value="{{old('password_confirmation', '')}}">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" class="site-btn">Login Now</button>
                    </form>
                    <h5>Already have an account? <a href="{{route('login')}}">Log In!</a></h5>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="login__social__links">
                    <h3>Login With:</h3>
                    <ul>
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
                        </li>
                        <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection