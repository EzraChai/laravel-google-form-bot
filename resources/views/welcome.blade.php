@extends('layouts.app')

@section('content')
    <div class="main-page-content">
    <style>
        .main-page-content{
            background: url('images/index-image.webp') no-repeat center/cover;
        }
    </style>
    <div class="container ">
        <div class="row  vh-100" style="margin-top: -10px">
            <div class="container d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h1 class="d-none d-sm-block display-4">Fill Out The Attendance For You</h1>
                    <h2 class="d-block d-sm-none">Fill Out The Attendance For You</h2>
                    <samp>Just for SMKTPD Student</samp>
                    <br>
                    <br>
                    @guest
                        @if (Route::has('register'))
                            <a href="/register" class="mt-4 btn btn-outline-dark">Register Now</a>
                        @endif
                    @else
                        <a href="/home" class="mt-4 btn btn-outline-dark">Home</a>
                    @endguest
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
