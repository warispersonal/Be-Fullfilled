@extends('layouts.simple')

@section('content')
    <div class="UserLogin-Container">
        <div class="New-Password">

            <div class="UserVertical-Align">
                <div class="UserLogin-Bg">

                    <div class="New-PassInner">
                        <h2>Reset Password</h2>

                        <div class="PassInner-Form">
                            <input type="text" id="" name="" placeholder="New Password">
                            <i class="icon-password-hidden"></i>
                        </div>

                        <div class="PassInner-Form">
                            <input type="text" id="" name="" placeholder="Confirm Password">
                            <i class="icon-password-show"></i>
                        </div>

                        <label class="LoginContainer">Remember login info
                            <input type="checkbox" id="" name="">
                            <span class="Login-Checkmark"></span>
                        </label>

                        <button type="submit">Create Password</button>

                    </div>

                </div>
            </div>

            <div class="CopyRight">
                <h1>Powered by the App guys</h1>
            </div>

        </div>
    </div>

@endsection
