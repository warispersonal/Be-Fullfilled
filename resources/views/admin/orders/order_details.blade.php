@extends('layouts.admin')

@section('content')

    <div class="AllUser-Dashboard">

        <div class="AllUser-Head">

            <div class="UserLeft">
                <h1>Order’s Details </h1>
            </div>

        </div>

        <div class="main-Table">
            <table class="table">

                <thead>
                <tr>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>Shipping Status</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
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
                        {{$order->shipping_address ?? ""}}
                    </td>
                    <td>
                        {{$order->orderStatus->name ?? ""}}
                    </td>
                    <td>
                        <img src="{{asset('assets/images/table-dotted.svg')}}"
                             class="dropdown-toggle" type="button" id="dropdownMenuButton"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt=""/>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('order_details',$order->id)}}">
                                Order Details
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>

        <div class="main-tab">
            <nav>
                <div class="nav tablist" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Order Details</a>

{{--                    <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile"--}}
{{--                       role="tab" aria-controls="nav-profile" aria-selected="false">--}}
{{--                        View Activity</a>--}}

{{--                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"--}}
{{--                       aria-controls="nav-contact" aria-selected="false">Contact</a>--}}

                </div>
            </nav>
        </div>
    </div>

    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="AllUser-Dashboard">

                <div class="AllUser-Head">

                    <div class="UserLeft">
                        <h1>All Partners <span>12</span></h1>
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

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
             aria-labelledby="nav-profile-tab">
            <div class="AllUser-Dashboard activitybg">
                <div class="ViewActivity-Con">

                    <div class="ViewLeft-Con">
                        <div id="chart_div" style="width: 100%; height: 300px;"></div>
                    </div>

                    <div class="ViewRight-Con">
                        <div id="donutchart" style="width: 100%; height: 300px;"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="AllUser-Dashboard">

                <div class="AllUser-Head">

                    <div class="UserLeft">
                        <h1>All Partners with <span>18</span></h1>
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

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        <tr class="table-border">

                            <td>October 25, 2019</td>

                            <td>
                                <div class="UserName-Head">

                                    <div class="headeleft">
                                        <img src="assets/images/Kristin Watson.png" alt=""/>
                                    </div>

                                    <div class="headeright">
                                        <h2>Kristin Watson</h2>
                                        <h3>(217) 555-0113</h3>
                                    </div>

                                </div>
                            </td>

                            <td>Austin</td>

                            <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                            <td>2312</td>

                            <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                        </tr>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>


@endsection

