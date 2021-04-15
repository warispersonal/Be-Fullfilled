@extends('layouts.simple')

@section('content')

    <div class="UserLogin-Container">
        <div class="Forget-Password-Email">

            <div class="UserVertical-Align">
                <div class="UserLogin-Bg">

                    <div class="Email-Verify">
                        <img src="{{asset('assets/images/email-verify.png')}}" alt=""/>
                        <h5>Please login to email to verify your email<br /> address
                            <a href="#">example@gmail.com</a></h5>
                        <h6>I did not recive the code<br /> Please! <a href="#">resend.</a></h6>
                    </div>

                </div>
            </div>

            <div class="CopyRight">
                <h1>Powered by the App guys</h1>
            </div>

        </div>
    </div>

@endsection
