@extends('layouts.simple')

@section('content')

    <div class="UserLogin-Container">
        <div class="Forget-Password">

            <div class="UserVertical-Align">
                <div class="UserLogin-Bg">

                    <div class="Reset-Pass">
                        <h4>Reset Password</h4>
                        <p>Select which contact details should be<br />
                            used to reset your password.</p>
                    </div>

                    <div class="ViaEmail-Address mb-3">

                        <div class="ViaEmail-Left">
                            <img src="{{asset('assets/images/via-email.svg')}}" alt=""/>
                        </div>

                        <div class="ViaEmail-Right">
                            <h3>Via Email Address</h3>
                            <h4>manhhachkt08@gmail.com</h4>
                        </div>

                        <div class="ViaEmail-image">
                            <i class="icon-arrow-right"></i>
                        </div>

                    </div>

                    <div class="ViaEmail-Address">

                        <div class="ViaEmail-Left">
                            <img src="{{asset('assets/images/via-phone.svg')}}" alt=""/>
                        </div>

                        <div class="ViaEmail-Right">
                            <h3>Via Phone Number</h3>
                            <h4>(225) 555-0118</h4>
                        </div>

                        <div class="ViaEmail-image">
                            <i class="icon-arrow-right"></i>
                        </div>

                    </div>

                </div>
            </div>

            <div class="CopyRight">
                <h1>Powered by the App guys</h1>
            </div>

        </div>
    </div>


@endsection
