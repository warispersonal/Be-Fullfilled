@extends('layouts.admin')

@section('content')

    <div class="AllUser-Dashboard">

        <div class="AllUser-Head">

            <div class="UserLeft">
                <h1>All Orders <span>33</span></h1>
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

                    <td>
                        <div class="UserName-Head">

                            <div class="headeright">
                                <h2>OLLAGEN COMPLEX</h2>
                                <h3>$630.44</h3>
                            </div>

                        </div>
                    </td>

                    <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                    <td>Pending</td>

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

                    <td>
                        <div class="UserName-Head">

                            <div class="headeright">
                                <h2>OLLAGEN COMPLEX</h2>
                                <h3>$630.44</h3>
                            </div>

                        </div>
                    </td>

                    <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                    <td>Pending</td>

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

                    <td>
                        <div class="UserName-Head">

                            <div class="headeright">
                                <h2>OLLAGEN COMPLEX</h2>
                                <h3>$630.44</h3>
                            </div>

                        </div>
                    </td>

                    <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                    <td>Pending</td>

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

                    <td>
                        <div class="UserName-Head">

                            <div class="headeright">
                                <h2>OLLAGEN COMPLEX</h2>
                                <h3>$630.44</h3>
                            </div>

                        </div>
                    </td>

                    <td>4517 Washington Ave.<br /> Manchester, Kentucky 39495</td>

                    <td>Pending</td>

                    <td><img src="assets/images/table-dotted.svg" alt=""/></td>

                </tr>

                </tbody>

            </table>
        </div>

    </div>
@endsection
