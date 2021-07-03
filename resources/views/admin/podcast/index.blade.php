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


                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                               href="{{route('edit_podcast',$podcast->id )}}">Edit</a>
                                            <a class="dropdown-item" onclick="return confirm('Are you sure?')"
                                               href="{{route('destroy_podcast', $podcast)}}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

        @include('partials.generic._pagination', ['paginator' =>$podcasts ])
    </div>
@endsection
