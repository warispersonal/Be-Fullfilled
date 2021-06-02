@extends('layouts.admin')

@section('content')

    <div class="AllUser-Dashboard">

        <div class="AllUser-Head">

            <div class="UserLeft">
                <h1>User’s Profile Details </h1>
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

                    <td>{{$user->date}}</td>

                    <td>

                        <div class="UserName-Head">

                            <div class="headeleft">
                                <img class="user-profile-image" src="{{$user->image}}" alt=""/>
                            </div>

                            <div class="headeright">
                                <h2>{{$user->name}}</h2>
                                <h3>{{$user->phone_number}}</h3>
                            </div>

                        </div>

                    </td>

                    <td>{{$user->city}}</td>

                    <td>{{$user->city}}<br/> {{$user->street_address}}</td>

                    <td>{{$user->zipcode}}</td>

                    <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>

                </tr>

                </tbody>

            </table>
        </div>

        <div class="main-tab">
            <nav>
                <div class="nav tablist" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Accountability Partner</a>

                    <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                       role="tab" aria-controls="nav-profile" aria-selected="false">
                        View Activity</a>

                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false">Contact</a>

                </div>
            </nav>
        </div>

    </div>

    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="AllUser-Dashboard">

                <div class="AllUser-Head">

                    <div class="UserLeft">
                        <h1>All Partners <span>0</span></h1>
                    </div>

                    <div class="Userright">
                        <a href="#">View All</a>
                    </div>

                </div>

{{--                <div class="main-Table">--}}
{{--                    <table class="table">--}}

{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Registration Date</th>--}}
{{--                            <th>User Name</th>--}}
{{--                            <th>Locations</th>--}}
{{--                            <th>Address</th>--}}
{{--                            <th>ZIP COde</th>--}}
{{--                            <th></th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        </tbody>--}}

{{--                    </table>--}}
{{--                </div>--}}

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
                        <h1>All Partners with <span>0</span></h1>
                    </div>

                    <div class="Userright">
                        <a href="#">View All</a>
                    </div>

                </div>

{{--                <div class="main-Table">--}}
{{--                    <table class="table">--}}

{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Registration Date</th>--}}
{{--                            <th>User Name</th>--}}
{{--                            <th>Locations</th>--}}
{{--                            <th>Address</th>--}}
{{--                            <th>ZIP COde</th>--}}
{{--                            <th></th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        <tr class="table-border">--}}

{{--                            <td>October 25, 2019</td>--}}

{{--                            <td>--}}
{{--                                <div class="UserName-Head">--}}

{{--                                    <div class="headeleft">--}}
{{--                                        <img src="{{asset('assets/images/Kristin Watson.png')}}" alt=""/>--}}
{{--                                    </div>--}}

{{--                                    <div class="headeright">--}}
{{--                                        <h2>Kristin Watson</h2>--}}
{{--                                        <h3>(217) 555-0113</h3>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </td>--}}

{{--                            <td>Austin</td>--}}

{{--                            <td>4517 Washington Ave.<br/> Manchester, Kentucky 39495</td>--}}

{{--                            <td>2312</td>--}}

{{--                            <td><img src="{{asset('assets/images/table-dotted.svg')}}" alt=""/></td>--}}

{{--                        </tr>--}}

{{--                        </tbody>--}}

{{--                    </table>--}}
{{--                </div>--}}

            </div>
        </div>

    </div>

@endsection


@section('js')


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['FOCUS', 'SLEEP', 'RELATIONSHIPS', 'EXERCISE', 'NUTRITION', 'ME TIME', 'CREATIVITY'],
                ['2004/05', 165, 938, 522, 998, 450, 614.6],
                ['2005/06', 135, 1120, 599, 1268, 288, 682],
                ['2006/07', 157, 1167, 587, 807, 397, 623],
                ['2007/08', 139, 1110, 615, 968, 215, 609.4],
                ['2008/09', 136, 691, 629, 1026, 366, 569.6]
            ]);

            var options = {
                title: 'Daily Activity',
                vAxis: {title: ''},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Goals Completed', 'Hours per Day'],
                ['Goals Completed', 11],
                ['Goals Delayed', 2],
                ['Goals Not Completed', 2]
            ]);

            var options = {
                title: 'Goal Accomplishment',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>


@stop
