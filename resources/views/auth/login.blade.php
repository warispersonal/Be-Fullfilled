@extends('layouts.simple')

@section('content')



    <div class="UserLogin-Container">
        <div class="UserLogin">

            <div class="UserVertical-Align">
                <div class="UserLogin-Bg">

                    <div class="inner-logo">
                        <img src="{{asset('assets/images/BeFulfilled_logo.png')}}" alt=""/>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="UserHead-Form">
                            <h3>Use Login</h3>

                            <div class="UserForm">
                                <input class="@error('email') is-invalid @enderror" type="email" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus
                                       placeholder="Enter Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="UserForm">
                                <input type="password" class="@error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password" placeholder="Password">
                                {{--                                <i class="icon-password-hidden"></i>--}}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="UserForm">
                                <button type="submit">Login</button>
                            </div>

                            <div class="Reset-Pass"><a href="{{route('reset_password')}}">Reset Password?</a></div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="CopyRight">
                <h1>Powered by the App guys</h1>
            </div>

        </div>
    </div>

@endsection
