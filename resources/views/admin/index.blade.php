@extends('layouts.admin')

@section('content')
    <div class="AllUser-Dashboard">
        <div class="AllUser-Head">
            <div class="UserLeft">
                <h1>All Users <span>123</span></h1>
            </div>
            <div class="Userright">
                <a href="#">View All</a>
            </div>
        </div>
        <div class="main-Table">
            <table class="table">
                <thead>
                <tr>
                    <th>Registration Date</th>
                    <th>User Name</th>
                    <th>Locations</th>
                    <th>Address</th>
                    <th>ZIP COde</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="table-border">
                        <td>{{$user->customizeDates}}</td>
                        <td>
                            <div class="UserName-Head">
                                <div class="headeleft">
                                    <img src="{{$user->profile}}" alt="" class="user-profile-image"/>
                                </div>
                                <div class="headeright">
                                    <h2>{{$user->name}}</h2>
                                    <h3>{{$user->phone_number}}</h3>
                                </div>
                            </div>
                        </td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->street_address}}</td>
                        <td>{{$user->zipcode}}</td>
                        <td>
                            <img src="{{asset('assets/images/table-dotted.svg')}}"
                                 class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt=""/>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('user_profile_detail',$user->id)}}">View Profile</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>
@endsection
