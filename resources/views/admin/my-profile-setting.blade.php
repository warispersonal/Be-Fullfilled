@extends('layouts.admin')

@section('content')
    <div class="main-container">
        <div class="MainFlip-Container">
            <div class="FlipSwitch-Con">
                <div class="FlipLeft-Head"><h1>My Profile Settings</h1></div>
                <div class="FlipRight-Head"></div>
            </div>
            <form method="post" action="{{route('update_profile')}}" enctype="multipart/form-data">
                @csrf
                <div class="MyProfile-Container">
                    <div class="ChangePr-Container">
                        <div class="ChangePr-Left">
                            <div class="pr-imgholder">
                                <img src="{{Auth::user()->image}}" name="file" alt=""/>
                            </div>
                        </div>
                        <div class="ChangePr-Right">
                        <div class="profile-upload-button-container">
                        <div class="form-group mt-4">
                            <input type="file" name="file" id="file" class="input-file">
                            <label for="file" class="btn btn-tertiary js-labelFile">
                            <span class="js-fileName">Change Picture</span>
                            </label>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="ProfileUser-Input">
                        <label>User Name</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}">
                        <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                    </div>
                    <div class="ProfileUser-Input">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{Auth::user()->email}}">
                        <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                    </div>
                    <div class="ProfileUser-Input">
                        <label>Password (Remain empty if you don't want to change)</label>
                        <input type="password" id="" name="password">
                        <img src="{{asset  ('assets/images/edit-input.svg')}}" alt=""/>
                    </div>
                    <div class="ProfileUser-Input">
                        <label>Phone Number</label>
                        <input type="text" id="" name="phone_number"  value="{{Auth::user()->phone_number}}">
                        <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                    </div>
                    <div class="ProfileUser-Input">
                        <label>City</label>
                        <input type="text" id="" name="city" value="{{Auth::user()->city}}">
                        <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                    </div>
                    <div class="ProfileUser-Input">
                        <label>Zip Code</label>
                        <input type="text" id="" name="zipcode" value="{{Auth::user()->zipcode}}">
                        <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                    </div>
                    <div class="ProfileUser-Input">
                        <label>Street Address</label>
                        <input type="text" id="" name="street_address" value="{{Auth::user()->street_address}}">
                        <img src="{{asset('assets/images/edit-input.svg')}}" alt=""/>
                    </div>
                    <div class="ProfileUser-Input mt-0">
                        <button type="submit">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection


