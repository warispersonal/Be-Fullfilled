@extends('layouts.admin')

@section('content')
    <div class="main-container">


        <div class="MainFlip-Container">

            <div class="FlipSwitch-Con">
                <div class="FlipLeft-Head"><h1>Send Push Notifications</h1></div>
                <div class="FlipRight-Head"><a href="#">View All History</a></div>
            </div>

            <form method="post" enctype="multipart/form-data" action="{{route('send_push_notification_post')}}">
                @csrf
                @include('partials.generic._errors')
                <div class="UploadNew-Container">
                    <div class="UploadTab">
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
                                    <label>Title</label>
                                    <input type="text" id="" name="title" value="{{old('title')}}" placeholder="">
                                </div>

                                <div class="datainfo">
                                    <label>Descriptions</label>
                                    <textarea id="" name="description">{{old('description')}}</textarea>
                                </div>

                                <div class="UploadContainer">
                                    <div class="upload-btn-wrapper">
                                        <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                                        <input type="file" name="file"/>
                                    </div>
                                </div>

                                <div class="SaveBtn mt-4">
                                    <button type="submit">Send</button>
                                </div>
                                <div class="SaveLater">
                                    <h5>Save for Later Use</h5>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>

                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>

                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
