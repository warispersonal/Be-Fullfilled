@extends('layouts.admin')

@section('content')


    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Add New Products</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

        <form method="post" action="{{route('store_add_product_post')}}" enctype="multipart/form-data">
            @csrf
            @include('partials.generic._errors')
            <div class="Store-AddNew">
                <div class="ProdLeft">

                    <div class="prodInput">
                        <label>Product Name</label>
                        <input type="text" id="" name="title" value="{{old('title')}}" placeholder="">
                    </div>

                    <div class="prodInput">
                        <label>Price</label>
                        <input class="divinput" type="text" id="" name="price" value="{{old('price')}}" placeholder="">
                    </div>

                    <div class="prodInput">
                        <label>Descriptions</label>
                        <textarea id="" name="description" placeholder="">{{old('description')}}</textarea>
                    </div>

                    <div class="prodInput">
                        <label>Ingredient Lists</label>
                        <textarea id="" name="ingredient" placeholder="">{{old('ingredient')}}</textarea>
                    </div>

                </div>
                <div class="ProdRight UploadNew-Container">

                    <div class="AddTag-List mt-0">
                        <h5>Add Tag</h5>
                        <ul>
                            <li><a href="#">Free Content</a></li>
                            <li><a href="#">Paid</a></li>
                            <li><a href="#">Popular</a></li>
                            <li><a href="#">Top on list</a></li>
                        </ul>
                    </div>

                    <div class="UploadContainer mt-4">
                        <div class="upload-btn-wrapper">
                            <button class="btn"><i class="icon-upload"></i> Upload a file</button>
                            <input type="file" name="file">
                        </div>
                    </div>

                    <div class="SaveBtn mt-4">
                        <button type="submit">Save File</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
