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
                            <label class="radio-container-btn-power">Audio
                                <input type="radio" name="fileType" value="audio" checked  {{ old('fileType') == "audio" ? 'checked' : '' }}>
                                <span class="radiomark"></span>
                            </label>
                        </li>

                        <li class="nav-item">
                            <label class="radio-container-btn-power">Video
                                <input type="radio" name="fileType" value="video"  {{ old('fileType') == "video" ? 'checked' : '' }}>
                                <span class="radiomark"></span>
                            </label>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="datainfo">
                                <div class="form-group">
                                    <label class="control-label" for="date">Select Date</label>
                                    <div class="input-group date" id="dp3" data-date="12-02-2017"
                                         data-date-format="mm-dd-yyyy">
                                        <input name="date" class="form-control" type="text" value="12-02-2017" value="{{old('date')}}">
                                        <span class="input-group-addon btn">
											<i class="icon-calendar" id="butt"></i>
										</span>
                                    </div>
                                </div>
                            </div>
                            <div class="datainfo">
                                <label>Podcast Title</label>
                                <input type="text" id="" name="title" value="{{old('title')}}" placeholder="">
                            </div>
                            <div class="UploadContainer">
                                <label>Upload Thumnail Picture</label>

                                <div class="custom-file-upload-two">
                                <label for="file-upload" class="custom-file-upload">
                                    <i class="icon-upload"></i> Upload Image
                                </label>
                                <input id="file-upload" name="file" type="file" style="display:none;">
                                </div>

                                </div>

                                <div class="SpriteLine"></div>

                                <div class="form-group mt-4">
                                <input type="file" name="link" id="file" class="input-file">
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
