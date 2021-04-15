<header class="main-header">

    <div class="Main-Logo">
        <a href="{{route('admin')}}"><img src="{{asset('assets/images/BeFulfilled_logo.png')}}" alt=""/></a>
    </div>

    <div class="header-right">

        <div class="pr-dropdown">
            <div class="dropdown">

                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="icon-menu-btn"></i>
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('user_profile_detail')}}">View Profile</a>
                    <a class="dropdown-item" href="{{route('my_profile_setting')}}">Edit</a>
                    <a class="dropdown-item" href="{{route('new_password')}}">New Password</a>
                    <a class="dropdown-item" href="{{route('reset_password')}}">Reset Password</a>
                    <a class="dropdown-item" href="{{route('reset_password_email')}}">Reset Password Email</a>
                    <a class="dropdown-item" href="#">Delete</a>
                </div>

            </div>
        </div>

        <div class="PrCon">
            <img src="{{asset('assets/images/pr-img.png')}}" alt=""/>
            <div class="pr-right">
                <h1>Carla Arcand</h1>
                <h2>Admin</h2>
            </div>
        </div>

        <div class="notify-container">
            <div class="notify">
                <a href="{{route('notification')}}">
                    <i class="icon-menu-notification"></i>
                </a>
            </div>
        </div>

        <div class="header-search">
            <input type="text" id="" name="" placeholder="Search here">
            <button type="submit"><i class="icon-search-btn"></i></button>
        </div>

    </div>

</header>
