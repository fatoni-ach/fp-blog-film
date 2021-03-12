@extends('layouts.master')
@section('contentsatu')
<section class="normal-breadcrumb set-bg" data-setbg="{{ asset('/anime/img/Movie.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Profile</h2>
                    <p>Hello, Please create your profile so you can post review </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('contentdua')
<section class="signup spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Profile</h3>
                    <form action="{{action('ProfilController@store')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input__item">
                            <input type="text" name="nama" placeholder="Nama">
                            <span class="icon_profile"></span>
                            @error("body")
                                <div class=”alert alert-danger”>
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input__item">
                            <input type="date" name="tgl_lahir">
                            <span class="icon_birth"></span>
                            @error("body")
                                <div class=”alert alert-danger”>
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="site-btn">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @error("body")
        <div class=”alert alert-danger”>
        {{ $message }}
        </div>
    @enderror
</section>
@endsection