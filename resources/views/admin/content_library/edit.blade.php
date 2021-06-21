@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Update Content Library</h1></div>
        </div>

        <form method="post" enctype="multipart/form-data" action="{{route('update_content_library',$contentLibrary)}}">
            @csrf
            @include('partials.generic._errors')
            <div class="UploadNew-Container">

                <div class="UploadTab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <label class="radio-container-btn-power">Audio
                                <input type="radio" name="fileType" checked
                                       value="audio" {{ $contentLibrary->fileType == "audio" ? 'checked' : '' }}>
                                <span class="radiomark"></span>
                            </label>
                        </li>
                        <li class="nav-item">
                            <label class="radio-container-btn-power">Video
                                <input type="radio" name="fileType"
                                       value="video" {{ $contentLibrary->fileType == "video" ? 'checked' : '' }}>
                                <span class="radiomark"></span>
                            </label>
                        </li>
                        <li class="nav-item">
                            <label class="radio-container-btn-power">PDF
                                <input type="radio" name="fileType"
                                       value="pdf" {{ $contentLibrary->fileType == "pdf" ? 'checked' : '' }}>
                                <span class="radiomark"></span>
                            </label>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="datainfo">
                                <div class="form-group">
                                    <label class="control-label" for="date">Select Date</label>
                                    <div class="input-group date" id="dp3" data-date="{{$contentLibrary->date}}"
                                         data-date-format="mm-dd-yyyy">
                                        <input name="date" id="date" class="form-control" type="text"  value="{{$contentLibrary->date}}">
                                        <span class="input-group-addon btn">
											<i class="icon-calendar" id="butt"></i>
										</span>
                                    </div>
                                </div>
                            </div>

                            <div class="datainfo">
                                <label>Title</label>
                                <input type="text" id="" name="title" value="{{$contentLibrary->title}}" placeholder="">
                            </div>

                            <div class="datainfo">
                                <label>Descriptions</label>
                                <textarea id="" name="description">{{$contentLibrary->description}}</textarea>
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


                            <div class="AddTag-List">
                                <h5>Add Tag</h5>
                                <ul>
                                    @foreach($tags as $tag)
                                        <li>
                                            <label class="tag-btn-container">
                                                <small>{{$tag->name}}</small>
                                                <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                                                <span class="tag-mark"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="SaveBtn mt-4">
                                <button type="submit">Update</button>
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
@section('js')
    <script>
        $(document).ready(function (){
            let date = "{{$contentLibrary->date}}";
            const d = new Date(date)
            const ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d)
            const mo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(d)
            const da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d)
            date = da + "/" + mo + "/" + ye;
            $("#date").val(date)
        });
    </script>
@endsection
