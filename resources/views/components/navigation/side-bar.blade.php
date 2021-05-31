<div class="SideMenu-Left">
    <div class="aside-menu longEnough mCustomScrollbar" data-mcs-theme="dark">
        <ul>
            <li @if(request()->segment(2) == 'users') class="active" @endif; ><a href="{{route('admin')}}"><i class="icon-manage-users"></i> Manage Users</a></li>
            <li @if(request()->segment(2) == 'flip-the-switch') class="active" @endif; ><a href="{{route('flip_the_switch')}}"><i class="icon-flip-the-switch"></i> Flip the Switch</a></li>
            <li @if(request()->segment(2) == 'content_library') class="active" @endif; ><a href="{{route('content_library')}}"><i class="icon-content-library"></i> Content Library</a></li>
            <li @if(request()->segment(2) == 'podcast') class="active" @endif; ><a href="{{route('podcast')}}"><i class="icon-podcasts"></i> Podcasts</a></li>
            <div class="spriter-line"></div>
            <li @if(request()->segment(2) == 'manage_store') class="active" @endif; ><a href="{{route('manage_store')}}"><i class="icon-manage-store"></i> Manage Store</a></li>
            <li @if(request()->segment(2) == 'all_orders') class="active" @endif; ><a href="{{route('all_orders')}}"><i class="icon-orders"></i> Orders</a></li>
            <li @if(request()->segment(2) == 'finance_dashboard') class="active" @endif; ><a href="{{route('finance_dashboard')}}"><i class="icon-finance-dashboard"></i> Finance Dashboard</a></li>
            <li @if(request()->segment(2) == 'faq') class="active" @endif; ><a href="{{route('faq')}}"><i class="icon-faq"></i> FAQ</a></li>
            <li @if(request()->segment(2) == 'feedback') class="active" @endif; ><a href="{{route('feedback')}}"><i class="icon-feedback"></i> Feedback</a></li>
            <li @if(request()->segment(2) == 'send_push_notification') class="active" @endif; ><a href="{{route('send_push_notification')}}"><i class="icon-push-notifications"></i> Push Notifications</a></li>
            <li @if(request()->segment(2) == 'terms_and_condition') class="active" @endif; ><a href="{{route('terms_and_condition')}}"><i class="icon-terms"></i> Terms & Conditions</a></li>
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
