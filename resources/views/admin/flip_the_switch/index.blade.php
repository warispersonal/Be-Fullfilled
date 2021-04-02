@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Filp The Switch</h1></div>
            <div class="FlipRight-Head">
                <a href="{{route('upload_new')}}">
                    <button>Upload New</button>
                </a>
            </div>
        </div>
        <div class="FlipThumb-Con">
            @foreach($flipTheSwitches as  $flipTheSwitch)
                <div class="{{$loop->index % 2 == 0 ?  "FlipThumb-Left" : "FlipThumb-Right"}}">
                    <div class="FlipSwitch-Thum">
                        <img src="{{$flipTheSwitch->image}}" class="flip-the-switch-image" alt=""/>

                        <div class="FlipInner-Head">
                            <h2>{{$flipTheSwitch->date}}</h2>
                            <h3>{{$flipTheSwitch->title}}</h3>
                        </div>

                        <div class="Auto-Container">
                            <audio controls>
                                <source src="horse.ogg" type="audio/ogg">
                                <source src="{{$flipTheSwitch->media}}" type="audio/mpeg">
                            </audio>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
