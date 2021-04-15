@extends('layouts.admin')

@section('content')
    <div class="main-container">


        <div class="MainFlip-Container">

            <div class="FlipSwitch-Con">
                <div class="FlipLeft-Head"><h1>My Profile Settings</h1></div>
                <div class="FlipRight-Head"></div>
            </div>

            <div class="MyProfile-Container">

                <div class="ChangePr-Container">

                    <div class="ChangePr-Left">
                        <div class="pr-imgholder">
                            <img src="{{asset('assets/images/pr-img.png')}}" alt=""/>
                        </div>
                    </div>

                    <div class="ChangePr-Right"><button>Change Picture</button></div>

                </div>

                <div class="ProfileUser-Input">
                    <label>User Name</label>
                    <input type="text" id="" name="" placeholder="Carla Arcand">
                    <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                </div>

                <div class="ProfileUser-Input">
                    <label>Email Address</label>
                    <input type="text" id="" name="" placeholder="Carlaarcand@gmial.com">
                    <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                </div>

                <div class="ProfileUser-Input">
                    <label>Password</label>
                    <input type="password" id="" name="" placeholder="*****************">
                    <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                </div>

                <div class="ProfileUser-Input mt-0">
                    <button type="submit">Save</button>
                </div>


            </div>



        </div>

    </div>
@endsection


