@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>All Question</h1></div>
            <div class="FlipRight-Head"></div>
        </div>

        @include('partials.generic._errors')
        <form method="post" action="{{route('add_new_faq')}}">
            @csrf
            <div class="AdFaq-Container">

                <div class="FaqInput">
                    <label>Questions</label>
                    <input type="text" id="" name="question" value="{{old('question')}}" placeholder="">
                </div>

                <div class="FaqInput">
                    <label>Answer</label>
                    <textarea id="" name="answer">{{old('answer')}}</textarea>
                </div>

                <div class="FaqInput">
                    <button type="submit">Add New</button>
                </div>

            </div>
        </form>


    </div>

@endsection
