@extends('layouts.admin')

@section('content')


    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Podcast</h1></div>
            <div class="FlipRight-Head">
                <a href="{{route('upload_new_podcast')}}">
                    <button>Upload New</button>
                </a>
            </div>
        </div>

        <div class="FlipThumb-Con">
            @foreach($podcasts as  $podcast)
                <div class="{{$loop->index % 2 == 0 ?  "FlipThumb-Left" : "FlipThumb-Right"}}">
                    <div class="FlipSwitch-Thum">
                        @if($podcast->mediaValue != 1)
                            <img src="{{$podcast->image}}" class="flip-the-switch-image" alt=""/>
                        @else
                            <div class="VideoCon">
                                <div class="holder-prod">
                                    <video width="343" height="156" controls>
                                        <source src="{{$podcast->media}}">
                                    </video>
                                </div>
                            </div>
                        @endif
                        <div class="FlipInner-Head">
                            <h2>{{$podcast->customizeDates}}</h2>
                            <h3>{{$podcast->title}}</h3>
                        </div>
                        @if($podcast->mediaValue != 1)

                            <div class="Auto-Container">
                                <audio controls>
                                    <source src="{{$podcast->media}}" type="audio/mpeg">
                                </audio>
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
