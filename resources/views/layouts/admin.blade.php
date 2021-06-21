@include('partials.admin._head')

@include('components.navigation.header')

<div class="main-container">
    @include('components.navigation.side-bar')
    @if(Session::has('success_message'))
        <div class="MainFlip-Container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success_message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
    @endif

    @yield('content')
</div>

@include('partials.admin._footer')

