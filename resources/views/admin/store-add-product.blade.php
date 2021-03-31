@extends('layouts.admin')

@section('content')


    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Add New Products</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

        <div class="Store-AddNew">

            <div class="ProdLeft">

                <div class="prodInput">
                    <label>Product Name</label>
                    <input type="text" id="" name="" placeholder="">
                </div>

                <div class="prodInput">
                    <label>Price</label>
                    <input class="divinput" type="text" id="" name="" placeholder="">
                </div>

                <div class="prodInput">
                    <label>Descriptions</label>
                    <textarea id="" name="" placeholder=""></textarea>
                </div>

                <div class="prodInput">
                    <label>Ingredient Lists</label>
                    <textarea id="" name="" placeholder=""></textarea>
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
                        <input type="file" name="myfile">
                    </div>
                </div>

                <div class="SaveBtn mt-4">
                    <button type="submit">Save File</button>
                </div>

            </div>

        </div>

    </div>
@endsection
