@extends('layouts.admin')

@section('content')
    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>All Question</h1></div>
            <div class="FlipRight-Head">
                <a href="{{route('add_new_faq')}}">
                    <button>Add New Question</button>
                </a>
            </div>
        </div>

        <div class="Question-Section">
            @foreach($questions as $question)
                <div class="FaqThum">
                    <h1>{{$question->question}}
                        <img src="assets/images/table-dotted.svg" alt=""/></h1>
                    <p>{{$question->answer}}</p>
                </div>
            @endforeach

        </div>

    </div>
@endsection
