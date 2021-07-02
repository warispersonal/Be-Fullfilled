@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Content Library</h1></div>
            <div class="FlipRight-Head">
                <a href="{{route('add_content_to_the_library')}}">
                    <button>Add New</button>
                </a>
            </div>
        </div>

        <div class="LibraryThum-Container">
            <div class="LibraryCon">
                @foreach($contentLibraries as $contentLibrary)
                    <div class="LibraryLeft {{$loop->index % 2 == 0 ?  "Thumb-margin " : ""}}">
                        <div class="MainThumb">
                            <img src="{{$contentLibrary->image}}" alt="" class="content-library-image"/>
                            <div class="Mainhead-Btm">
                                @if($contentLibrary->tags()->first())
                                    <div class="FreeCon">
                                        <h1>{{$contentLibrary->tags()->first()->name??""}}</h1>
                                    </div>
                                @endif
                                <h1>{{$contentLibrary->title}}
                                    <img src="{{asset('assets/images/table-dotted.svg')}}"
                                         class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt=""/>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                           href="{{route('edit_content_library',$contentLibrary->id)}}">Edit</a>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure?')"
                                           href="{{route('destroy_content_library',$contentLibrary->id)}}">Delete</a>
                                    </div>
                                </h1>
                                <p>{{$contentLibrary->description}}</p>
                                {{--                                <h2>11 Lessons</h2>--}}
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
