@extends('layouts.admin')

@section('content')


    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Content Library</h1></div>
            <div class="FlipRight-Head">
                <button type="submit">Add New</button>
            </div>
        </div>

        <div class="LibraryThum-Container">
            <div class="LibraryCon">

                <div class="LibraryLeft Thumb-margin">
                    <div class="MainThumb">

                        <img src="assets/images/library-img.png" alt=""/>

                        <div class="Mainhead-Btm">
                            <div class="FreeCon"><h1>Free Content</h1></div>
                            <h1>Drainers and Drivers <img src="assets/images/table-dotted.svg" alt=""/></h1>
                            <p>Drainers and Drivers is a five-day mini-course about cutting through the bullshit and
                                finding the clarity to live your best life now.</p>
                            <h2>11 Lessions</h2>
                        </div>

                    </div>
                </div>

                <div class="LibraryLeft">
                    <div class="MainThumb">

                        <img src="assets/images/library-img-2.png" alt=""/>

                        <div class="Mainhead-Btm">
                            <div class="FreeCon"><h1>Free Content</h1></div>
                            <h1>BeFulfilled Recovery <img src="assets/images/table-dotted.svg" alt=""/></h1>
                            <p>The BeFulfilled Recovery Journal online course<br/> brings all the teachings, videos, and
                                tools<br/> together into one convenient place to<br/> maximize your journal experience.
                            </p>
                            <h2>19 Lessions</h2>
                        </div>

                    </div>
                </div>

                <div class="LibraryLeft Thumb-margin">
                    <div class="MainThumb">

                        <img src="assets/images/library-img-3.png" alt=""/>

                        <div class="Mainhead-Btm">
                            <div class="FreeCon"><h1>Free Content</h1></div>
                            <h1>BeFulfilled Recovery <img src="assets/images/table-dotted.svg" alt=""/></h1>
                            <p>The BeFulfilled Recovery Journal online course<br/> brings all the teachings, videos, and
                                tools<br/> together into one convenient place to<br/> maximize your journal experience.
                            </p>
                            <h2>19 Lessions</h2>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
