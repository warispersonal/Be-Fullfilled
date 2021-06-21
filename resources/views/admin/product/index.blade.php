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

            @foreach($products as $product)
                <div class="MangeStore">
                    <div class="imgtop">
                        <img class="product-image" src="{{$product->image}}" alt=""/>
                        <div class="dotted">
                            <img src="{{asset('assets/images/table-dotted.svg')}}"
                                 class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt=""/>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('edit_manage_store',$product->id)}}">Edit</a>
                                <a class="dropdown-item" onclick="return confirm('Are you sure?')"  href="{{route('destroy_manage_store',$product->id)}}">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="ManageHead-Btm">
                        <h1>{{$product->title}}</h1>
{{--                        <h2>1277-SOGREENS</h2>--}}
                        <p>
                            {{$product->description}}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
