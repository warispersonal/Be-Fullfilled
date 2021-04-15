@extends('layouts.admin')

@section('content')
    <div class="main-container">


        <div class="MainFlip-Container">

            <div class="FlipSwitch-Con">
                <div class="FlipLeft-Head"><h1>Send Push Notifications</h1></div>
                <div class="FlipRight-Head"><a href="#">View All History</a></div>
            </div>

            <div class="UploadNew-Container">

                <div class="UploadTab">

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
                        <textarea id="" name="" placeholder=""></textarea>
                    </div>

                    <div class="UploadContainer">
                        <div class="upload-btn-wrapper">
                            <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                            <input type="file" name="myfile" />
                        </div>
                    </div>

                    <div class="SaveBtn">
                        <button type="submit">Send</button>
                    </div>

                    <div class="SaveLater">
                        <h5>Save for Later Use</h5>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
