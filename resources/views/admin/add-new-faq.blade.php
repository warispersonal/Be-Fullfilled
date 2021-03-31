@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>All Question</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

        <div class="AdFaq-Container">

            <div class="FaqInput">
                <label>Questions</label>
                <input type="text" id="" name="" placeholder="">
            </div>

            <div class="FaqInput">
                <label>Answer</label>
                <textarea id="" name=""></textarea>
            </div>

            <div class="FaqInput">
                <button type="submit">Add New</button>
            </div>

        </div>


    </div>

@endsection
