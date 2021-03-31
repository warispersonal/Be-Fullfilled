@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Add Content to the Library</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

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
                            <input type="text" id="" name="" placeholder="December 2, 2018">
                            <i class="icon-calendar"></i>
                        </div>

                        <div class="datainfo">
                            <label>Title</label>
                            <input type="text" id="" name="" placeholder="">
                        </div>

                        <div class="datainfo">
                            <label>Descriptions</label>
                            <textarea id="" name=""></textarea>
                        </div>

                        <div class="UploadContainer">
                            <div class="upload-btn-wrapper">
                                <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                                <input type="file" name="myfile"/>
                            </div>
                        </div>

                        <div class="AddTag-List">
                            <h5>Add Tag</h5>
                            <ul>
                                <li><a href="#">Free Content</a></li>
                                <li><a href="#">Paid</a></li>
                                <li><a href="#">Popular</a></li>
                                <li><a href="#">Top on list</a></li>
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


    </div>

@endsection