<div class="SideMenu-Left">
    <div class="aside-menu">
        <ul>

            <li class="active"><a href="{{route('admin')}}"><i class="icon-manage-users"></i> Manage Users</a></li>
            <li><a href="{{route('flip_the_switch')}}"><i class="icon-flip-the-switch"></i> Flip the Switch</a></li>
            <li><a href="{{route('content_library')}}"><i class="icon-content-library"></i> Content Library</a></li>
            <li><a href="{{route('podcast')}}"><i class="icon-podcasts"></i> Podcasts</a></li>

            <div class="spriter-line"></div>

            <li><a href="{{route('manage_store')}}"><i class="icon-manage-store"></i> Manage Store</a></li>
            <li><a href="{{route('all_orders')}}"><i class="icon-orders"></i> Orders</a></li>
            <li><a href="{{route('finance_dashboard')}}"><i class="icon-finance-dashboard"></i> Finance Dashboard</a></li>
            <li><a href="{{route('faq')}}"><i class="icon-faq"></i> FAQ</a></li>
            <li><a href="javascript:void(0)"><i class="icon-feedback"></i> Feedback</a></li>
            <li><a href="{{route('notification')}}"><i class="icon-push-notifications"></i> Push Notifications</a></li>
            <li><a href="javascript:void(0)"><i class="icon-terms"></i> Terms & Conditions</a></li>

            <div class="spriter-line"></div>

            <div class="LogoutHead">
                <h6>Powered by the App guys<br/> Be Fulfilled © 2021 *</h6>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"><i class="icon-logout"></i> Log Out</a>
            </div>

        </ul>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
