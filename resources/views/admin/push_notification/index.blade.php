@extends('layouts.admin')

@section('content')

    <div class="main-container">


        <div class="MainFlip-Container">

            <div class="FlipSwitch-Con">
                <div class="FlipLeft-Head"><h1>All Push Notifications History</h1></div>
                <div class="FlipRight-Head">
                    <a href="{{route('send_push_notification')}}">
                        <button>Create</button>
                    </a>
                </div>
            </div>

            @foreach($pushNotifications as $pushNotification)
                <div class="TheCyclone-Con">

                    <div class="cyclonetop">

                        <div class="tophead-left">
                            <h3>{{$pushNotification->customizeDates}}</h3>
                        </div>

                        <div class="tophead-right"><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></div>

                    </div>

                    <h3>{{$pushNotification->title}}</h3>
                    <p>{{$pushNotification->description}}</p>

                    <div class="Cyclone-imgCon">
                        <div class="main-image">
                            <div class="imgholder">
                                <img src="{{$pushNotification->image}}" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
