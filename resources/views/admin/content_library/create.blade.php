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
                        <li class="nav-item">
                            <label class="radio-container-btn-power">PDF
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
                                <label>Title</label>
                                <input type="text" id="" name="title" value="{{old('title')}}" placeholder="">
                            </div>

                            <div class="datainfo">
                                <label>Descriptions</label>
                                <textarea id="" name="description">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group mt-4">
                                <label>Upload Thumbnail Picture</label>
                                <input type="file" name="file" id="file" class="input-file">
                                <label for="file" class="btn btn-tertiary js-labelFile">
                                    <i class="icon-upload"></i>
                                    <span class="js-fileName">Upload a file</span>
                                </label>
                            </div>
                            <div class="SpriteLine"></div>
                            <div class="form-group mt-4">
                                <label>Upload Media File</label>
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
                                                <input type="checkbox">
                                                <span class="tag-mark"></span>
                                            </label>
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
