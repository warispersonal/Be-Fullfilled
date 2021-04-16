@extends('layouts.admin')

@section('content')

    <div class="main-container">


        <div class="MainFlip-Container">

            <div class="FlipSwitch-Con">
                <div class="FlipLeft-Head"><h1>User's Feedback</h1></div>
                <div class="FlipRight-Head"></div>
            </div>


            <div class="UserFeed-Container">

                <div class="Feedback-Thum">

                    <div class="tophead">
                        <h1>November 7, 2017 <img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></h1>
                    </div>

                    <div class="RatingStar">
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                    </div>

                    <div class="tonyhead">
                        <h1>Tony is really good.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur<br /> adipiscing elit. Donec sodales nibh et lectus<br /> varius, sed vehicula purus interdum. Sed<br /> magna quam, laoreet ac scelerisque sed,<br /> pulvinar ut nulla.</p>
                    </div>

                    <div class="codefisher">

                        <div class="fisherleft">
                            <div class="fish-holder">
                                <img src="{{asset('assets/images/cody-fisher.png')}}" alt=""/>
                            </div>
                        </div>

                        <div class="fisheright">
                            <h2>Cody Fisher</h2>
                            <h3>Pembroke Pines</h3>
                        </div>

                    </div>

                </div>

                <div class="Feedback-Thum">

                    <div class="tophead">
                        <h1>November 7, 2017 <img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></h1>
                    </div>

                    <div class="RatingStar">
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                        </ul>
                    </div>

                    <div class="tonyhead">
                        <h1>Tony is really good.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur<br /> adipiscing elit. Donec sodales nibh et lectus<br /> varius, sed vehicula purus interdum. Sed<br /> magna quam, laoreet ac scelerisque sed,<br /> pulvinar ut nulla.</p>
                    </div>

                    <div class="codefisher">

                        <div class="fisherleft">
                            <div class="fish-holder">
                                <img src="{{asset('assets/images/cody-fisher.png')}}" alt=""/>
                            </div>
                        </div>

                        <div class="fisheright">
                            <h2>Cody Fisher</h2>
                            <h3>Pembroke Pines</h3>
                        </div>

                    </div>

                </div>

            </div>



        </div>

    </div>


@endsection
