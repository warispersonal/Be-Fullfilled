@extends('layouts.admin')

@section('content')

    <div class="AllUser-Dashboard">

        <input type="hidden" id="order_id" value="{{$order->id ?? 0}}"/>
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
                        <select class="form-control" id="order_status">
                            @foreach($order_status  as $status)
                                <option value="{{$status->id ?? 0}}">{{$status->name ?? ""}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" onclick="update_order_status()" class="btn btn-outline-warning">Update
                            Status
                        </button>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>


        <div class="main-tab">
            <nav>
                <div class="nav tablist" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">All Products</a>

                    {{--                    <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">--}}
                    {{--                        View Activity</a>--}}

                    {{--                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>--}}

                </div>
            </nav>
        </div>

    </div>

    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="AllUser-Dashboard">

                <div class="AllUser-Head">

                    <div class="UserLeft">
                        <h1>All Products <span>{{count($order->order_products ?? 0)}}</span></h1>
                    </div>

                    <div class="Userright">
                        {{--                        <a href="#">View All</a>--}}
                    </div>

                </div>

                <div class="main-Table">
                    <table class="table">

                        <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($order->order_products  as $order)
                            <tr class="table-border">
                                <td>
                                    <div class="UserName-Head">

                                        <div class="headeright">
                                            <h2>{{$order->product->title ?? ""}}</h2>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    {{$order->price ?? 0}}
                                </td>
                                <td>
                                    {{$order->quantity ?? 0}}
                                </td>
                                <td>
                                    {{$order->total_price ?? 0}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>


                    </table>
                </div>

            </div>
        </div>

        <div class="tab-pane fade " id="nav-profile" role="tabpanel"
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


    </div>



@endsection
@section('js')
    <script>
        document.getElementById("order_status").value = "{{$order_status_id ?? 0}}";

        function update_order_status() {
            if (confirm("Are you sure?")) {
                let id = $("#order_id").val();
                let status = $("#order_status").val();
                let url = '{{ url("admin/update/order/{id}/{status}") }}';
                url = url.replace("{id}", id)
                url = url.replace("{status}", status)
                window.location.href = url
            }
        }
    </script>
@endsection
