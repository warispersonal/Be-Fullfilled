@include('partials.admin._head')

@include('components.navigation.header')

<div class="main-container">
    @include('components.navigation.side-bar')
    @yield('content')
</div>

@include('partials.admin._footer')

