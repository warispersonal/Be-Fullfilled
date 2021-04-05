@extends('layouts.admin')

@section('content')
    <div class="MainFlip-Container">
        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Upload New Podcast</h1></div>
        </div>
        <form method="post" enctype="multipart/form-data" action="{{route('upload_new_podcast_post')}}">
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
                                <label>Podcast Title</label>
                                <input type="text" id="" name="title" value="{{old('title')}}" placeholder="">
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
                            <div class="SaveBtn">
                                <button type="submit">Save File</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
