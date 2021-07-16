@extends('layouts.admin')

@section('content')

    <div class="MainFlip-Container">

        <div class="FlipSwitch-Con">
            <div class="FlipLeft-Head"><h1>Terms & Conditions</h1></div>
            <div class="FlipRight-Head">
                <a href="{{route('add_new_terms_condition')}}">
                    <button>Add</button>
                </a>
            </div>
        </div>
        <div class="Terms-Container">
            @foreach($terms as $term)
                <div class="TermHead-Con">
{{--                    <h1>Last revised: <span>Sept 2, 2019</span>--}}
{{--                        <img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></h1>--}}
                    <h2>  {{$term->title }}</h2>
                    <p>
                        {{$term->description }}
                    </p>
                </div>
            @endforeach
        </div>


    </div>


@endsection
