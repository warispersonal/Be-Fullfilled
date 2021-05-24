@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Add Content to the Library</h1></div>
        </div>

        <form method="post" enctype="multipart/form-data" action="{{route('add_content_to_the_library_post')}}">
            @csrf
            @include('partials.generic._errors')
            <div class="UploadNew-Container">
                <div class="UploadTab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">Audio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Video</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                               aria-controls="contact" aria-selected="false">PDF</a>
                        </li>

                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="datainfo">
                                <label>Select Date</label>
                                <input type="date" id="" name="date" value="{{old('date')}}"
                                       placeholder="December 2, 2018">
                                <i class="icon-calendar"></i>
                            </div>

                            <div class="datainfo">
                                <label>Title</label>
                                <input type="text" id="" name="title" value="{{old('title')}}" placeholder="">
                            </div>

                            <div class="datainfo">
                                <label>Descriptions</label>
                                <textarea id="" name="description">{{old('description')}}</textarea>
                            </div>

                            <div class="UploadContainer">
                                <label>Upload Thumbnail Picture</label>
                                <div class="upload-btn-wrapper">
                                    <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                                    <input type="file" name="file"/>
                                </div>
                            </div>
                            <div class="SpriteLine"></div>
                            <div class="UploadContainer">
                                <div class="upload-btn-wrapper">
                                    <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                                    <input type="file" name="link"/>
                                </div>
                            </div>

                            <div class="AddTag-List">
                                <h5>Add Tag</h5>
                                <ul>
                                    @foreach($tags as $tag)
                                        <li class="m-2">
                                            <a href="#">{{$tag->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="SaveBtn mt-4">
                                <button type="submit">Save File</button>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>

                    </div>

                </div>
            </div>
        </form>

    </div>

@endsection
