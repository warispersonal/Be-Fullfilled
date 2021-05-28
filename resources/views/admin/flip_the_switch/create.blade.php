@extends('layouts.admin')
@section('content')
    <div class="MainFlip-Container">
        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Upload New</h1></div>
        </div>
        <form method="post" enctype="multipart/form-data" action="{{route('upload_new_post')}}">
            @csrf
            @include('partials.generic._errors')
            <div class="UploadNew-Container">
                <div class="UploadTab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                            <label class="radio-container-btn-power">Audio
                                <input type="radio" name="radio">
                                <span class="radiomark"></span>
                            </label>
                        </li>

                        <li class="nav-item">
                            <label class="radio-container-btn-power">Video
                                <input type="radio" name="radio">
                                <span class="radiomark"></span>
                            </label>
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
                            <div class="form-group mt-4">
                                <input type="file" name="file" id="file" class="input-file">
                                <label for="file" class="btn btn-tertiary js-labelFile">
                                    <i class="icon-upload"></i>
                                    <span class="js-fileName">Upload a file</span>
                                </label>
                            </div>
                            <div class="SpriteLine"></div>
                            <div class="form-group mt-4">
                                <input type="file" name="link" id="file1" class="input-file">
                                <label for="file" class="btn btn-tertiary js-labelFile">
                                    <i class="icon-upload"></i>
                                    <span class="js-fileName">Upload a file</span>
                                </label>
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
