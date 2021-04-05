@extends('layouts.admin')

@section('content')


    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Store</h1></div>
            <div class="FlipRight-Head">
                <a href="{{route('store_add_product')}}">
                    <button>Add New Product</button>
                </a>
            </div>
        </div>

        <div class="mainstore">

            <div class="MangeStore">

                <div class="imgtop">
                    <img src="{{asset('assets/images/store-img.png')}}" alt=""/>
                    <div class="dotted"><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></div>
                </div>

                <div class="ManageHead-Btm">
                    <h1>GREENS NUTRITION</h1>
                    <h2>1277-SOGREENS</h2>
                    <p>Drink your greens in an<br/> incredible tasting<br/> nutrient-packed formula with<br/> none of
                        the juicing mess.*</p>
                </div>

            </div>

            <div class="MangeStore">

                <div class="imgtop">
                    <img src="{{asset('assets/images/store-img.png')}}" alt=""/>
                    <div class="dotted"><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></div>
                </div>

                <div class="ManageHead-Btm">
                    <h1>GREENS NUTRITION</h1>
                    <h2>1277-SOGREENS</h2>
                    <p>Drink your greens in an<br/> incredible tasting<br/> nutrient-packed formula with<br/> none of
                        the juicing mess.*</p>
                </div>

            </div>

            <div class="MangeStore">

                <div class="imgtop">
                    <img src="{{asset('assets/images/store-img.png')}}" alt=""/>
                    <div class="dotted"><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></div>
                </div>

                <div class="ManageHead-Btm">
                    <h1>GREENS NUTRITION</h1>
                    <h2>1277-SOGREENS</h2>
                    <p>Drink your greens in an<br/> incredible tasting<br/> nutrient-packed formula with<br/> none of
                        the juicing mess.*</p>
                </div>

            </div>

        </div>

    </div>
@endsection