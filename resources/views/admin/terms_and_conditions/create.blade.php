@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Add New Term & Condition</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

        @include('partials.generic._errors')
        <form method="post" action="{{route('add_new_terms_condition_post')}}">
            @csrf
            <div class="AdFaq-Container">

                <div class="FaqInput">
                    <label>Title</label>
                    <input type="text" id="" name="title" value="{{old('title')}}" placeholder="">
                </div>

                <div class="FaqInput">
                    <label>Description</label>
                    <textarea id="" name="description">{{old('description')}}</textarea>
                </div>

                <div class="FaqInput">
                    <button type="submit">Add New</button>
                </div>

            </div>
        </form>


    </div>

@endsection
