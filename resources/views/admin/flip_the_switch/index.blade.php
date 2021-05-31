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
                        @if($flipTheSwitch->mediaValue != 1)
                            <img src="{{$flipTheSwitch->image}}" class="flip-the-switch-image" alt=""/>
                        @else
                            <div class="VideoCon">
                                <div class="holder-prod">
                                    <video width="343" height="156" controls>
                                        <source src="{{$flipTheSwitch->media}}">
                                    </video>
                                </div>
                            </div>
                        @endif
                        <div class="FlipInner-Head">
                            <h2>{{$flipTheSwitch->customizeDates}}</h2>
                            <h3>{{$flipTheSwitch->title}}</h3>
                        </div>
                        <div class="Auto-Container">
                            <audio controls>
                                @if($flipTheSwitch->mediaType != 1)
                                    <source src="{{$flipTheSwitch->media}}" type="audio/mpeg">
                                @endif
                            </audio>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
