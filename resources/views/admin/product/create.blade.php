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
                            @foreach($tags as $tag)
                                <li>
                                    <label class="tag-btn-container">
                                        <small>{{$tag->name}}</small>
                                        <input type="checkbox">
                                        <span class="tag-mark"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="form-group mt-4">
                        <input type="file" name="file" id="file" class="input-file">
                        <label for="file" class="btn btn-tertiary js-labelFile">
                            <i class="icon-upload"></i>
                            <span class="js-fileName">Upload a file</span>
                        </label>
                    </div>

                    <div class="SaveBtn mt-4">
                        <button type="submit">Save File</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
