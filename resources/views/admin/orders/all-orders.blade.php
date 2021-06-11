@extends('layouts.admin')

@section('content')

    <div class="AllUser-Dashboard">

        <div class="AllUser-Head">

            <div class="UserLeft">
                <h1>All Orders <span>{{count($orders)}}</span></h1>
            </div>

            <div class="Userright">
                <a href="#">Filter By date <i class="icon-calendar"></i></a>
            </div>

        </div>
        <div class="main-Table">

            <div class="Main-Head"><h1>Recent Orders</h1></div>

            <table class="table">

                <thead>
                <tr>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Address</th>
                    <th>Shipping Status</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $order)
                    <tr class="table-border">

                        <td>{{$order->date}}</td>

                        <td>

                            <div class="UserName-Head">

                                <div class="headeleft">
                                    <img class="order-image" src="{{$order->user->profile ?? ""}}" alt=""/>
                                </div>

                                <div class="headeright">
                                    <h2>{{$order->user->name ?? ""}}</h2>
                                    <h3>{{$order->user->phone_number ?? ""}}</h3>
                                </div>

                            </div>

                        </td>

                        <td>
                            <div class="UserName-Head">

                                <div class="headeright">
                                    <h2>{{$order->prosuct->title ?? ""}}</h2>
                                    <h3>${{$order->total_price ?? ""}}</h3>
                                </div>

                            </div>
                        </td>

                        <td>
                            {{$order->shipping_address ?? ""}}
                        </td>

                        <td>{{$order->orderStatus->name ?? ""}}</td>
                        <td>
                            <img src="{{asset('assets/images/table-dotted.svg')}}"
                                 class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt=""/>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('user_profile_detail',$order->id)}}">Change Status</a>
                            </div>
                        </td>

                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
    </div>
@endsection
