@extends('layouts.simple')

@section('content')

    <div class="UserLogin-Container">
        <div class="Forget-Password">

            <div class="UserVertical-Align">
                <div class="UserLogin-Bg">

                    <div class="Reset-Pass">
                        <h4>Reset Password</h4>
                        <p>Select which contact details should be<br/>
                            used to reset your password.</p>
                    </div>

                    <form id="via_email" method="post" action="{{route('via_email')}}">
                        @csrf
                        <div class="ViaEmail-Address mb-3">

                            <div class="ViaEmail-Left">
                                <img src="{{asset('assets/images/via-email.svg')}}" alt=""/>
                            </div>

                            <div class="ViaEmail-Right">
                                <h3>Via Email Address</h3>
                                <input type="email" name="email"
                                       autocomplete="email" autofocus
                                       placeholder="Enter Email Address">
                            </div>

                            <div class="ViaEmail-image">
                                <i onclick="via_email()" class="icon-arrow-right"></i>
                            </div>

                        </div>
                    </form>

                    <form id="via_cell_number" method="post" action="{{route('via_cell_number')}}">
                        @csrf
                        <div class="ViaEmail-Address">

                            <div class="ViaEmail-Left">
                                <img src="{{asset('assets/images/via-phone.svg')}}" alt=""/>
                            </div>

                            <div class="ViaEmail-Right">
                                <h3>Via Phone Number</h3>
                                <input type="text" name="phone_number"
                                       placeholder="Enter Phone Number">
                            </div>

                            <div class="ViaEmail-image">
                                <i onclick="via_cell_number()" class="icon-arrow-right"></i>
                            </div>

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
@section('js')
    <script>
        function via_email() {
            $("#via_email").submit();
        }

        function via_cell_number() {
            $("#via_cell_number").submit();
        }
    </script>
@endsection
