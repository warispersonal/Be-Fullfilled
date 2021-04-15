@extends('layouts.admin')

@section('content')

    <div class="main-container">


        <div class="MainFlip-Container">

            <div class="FlipSwitch-Con">
                <div class="FlipLeft-Head"><h1>All Push Notifications History</h1></div>
                <div class="FlipRight-Head"><button>Create</button></div>
            </div>

            <div class="TheCyclone-Con">

                <div class="cyclonetop">

                    <div class="tophead-left">
                        <h3>September 24, 2017 <span>03:40 PM</span></h3>
                    </div>

                    <div class="tophead-right"><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></div>

                </div>

                <h3>The Cyclone sale will start 05:30 PM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sodales nibh et lectus varius, sed vehicula purus interdum. Sed magna quam, laoreet ac scelerisque sed, pulvinar ut nulla.</p>

            </div>

            <div class="TheCyclone-Con">

                <div class="cyclonetop">

                    <div class="tophead-left">
                        <h3>September 24, 2017 <span>03:40 PM</span></h3>
                    </div>

                    <div class="tophead-right"><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></div>

                </div>

                <h3>The Cyclone sale will start 05:30 PM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sodales nibh et lectus varius, sed vehicula purus interdum. Sed magna quam, laoreet ac scelerisque sed, pulvinar ut nulla.</p>

                <div class="Cyclone-imgCon">

                    <div class="main-image">
                        <div class="imgholder">
                            <img src="{{asset('assets/images/cyclone-img.png')}}" alt=""/>
                        </div>
                    </div>

                    <div class="main-image">
                        <div class="imgholder">
                            <img src="{{asset('assets/images/cyclone-img.png')}}" alt=""/>
                        </div>
                    </div>

                    <div class="main-image">
                        <div class="imgholder">
                            <img src="{{asset('assets/images/cyclone-img.png')}}" alt=""/>
                        </div>
                    </div>

                </div>


            </div>


        </div>

    </div>
@endsection
