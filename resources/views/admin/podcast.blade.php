@extends('layouts.admin')

@section('content')


    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Podcast</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

        <div class="FlipThumb-Con">

            <div class="FlipThumb-Left">
                <div class="FlipSwitch-Thum">

                    <img src="{{asset('assets/images/podcast-img.png')}}" alt=""/>

                    <div class="FlipInner-Head">
                        <h2>September 24, 2017</h2>
                        <h3>Remarkably Simple And Practical Advice ...</h3>
                    </div>

                    <div class="Auto-Container">
                        <audio controls>
                            <source src="horse.ogg" type="audio/ogg">
                            <source src="horse.mp3" type="audio/mpeg">
                        </audio>
                    </div>

                </div>
            </div>

            <div class="FlipThumb-Right">
                <div class="FlipSwitch-Thum">

                    <img src="{{asset('assets/images/podcast-img.png')}}" alt=""/>

                    <div class="FlipInner-Head">
                        <h2>September 24, 2017</h2>
                        <h3>Remarkably Simple And Practical Advice ...</h3>
                    </div>

                    <div class="Auto-Container">
                        <audio controls>
                            <source src="horse.ogg" type="audio/ogg">
                            <source src="horse.mp3" type="audio/mpeg">
                        </audio>
                    </div>

                </div>
            </div>

            <div class="FlipThumb-Left">
                <div class="FlipSwitch-Thum">

                    <img src="{{asset('assets/images/podcast-img.png')}}" alt=""/>

                    <div class="FlipInner-Head">
                        <h2>September 24, 2017</h2>
                        <h3>Remarkably Simple And Practical Advice ...</h3>
                    </div>

                    <div class="Auto-Container">
                        <audio controls>
                            <source src="horse.ogg" type="audio/ogg">
                            <source src="horse.mp3" type="audio/mpeg">
                        </audio>
                    </div>

                </div>
            </div>

            <div class="FlipThumb-Right">
                <div class="FlipSwitch-Thum">

                    <div class="VideoCon">
                        <div class="holder-prod">
                            <video width="343" height="156" controls>
                                <source src="movie.mp4" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                            </video>
                        </div>
                    </div>

                    <div class="FlipInner-Head">
                        <h2>September 24, 2017</h2>
                        <h3>This Is How You Can Manage Yourself And Be<br /> Consistent - Andrew Kaplan</h3>
                    </div>


                </div>
            </div>

        </div>

    </div>
@endsection