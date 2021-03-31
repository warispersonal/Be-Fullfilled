@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Upload New Podcast</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

        <div class="UploadNew-Container">

            <div class="datainfo">
                <label>Select Date</label>
                <input type="text" id="" name="" placeholder="December 2, 2018">
                <i class="icon-calendar"></i>
            </div>

            <div class="datainfo">
                <label>Podcast Title</label>
                <input type="text" id="" name="" placeholder="">
            </div>

            <div class="UploadContainer">
                <label>Upload Thumnail Picture</label>
                <div class="upload-btn-wrapper">
                    <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                    <input type="file" name="myfile" />
                </div>
            </div>

            <div class="SpriteLine"></div>

            <div class="UploadContainer">
                <div class="upload-btn-wrapper">
                    <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                    <input type="file" name="myfile" />
                </div>
            </div>

            <div class="SaveBtn mt-4">
                <button type="submit">Save File</button>
            </div>

        </div>


    </div>
@endsection
