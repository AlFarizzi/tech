@include('Partials.header')

    @auth
        <x-navbar login={{true}} />
    @endauth
    @guest
        <x-navbar login={{false}}/>
    @endguest

    <div class="dashboard-content">
        @yield('content')
    </div>

@include('Partials.footer')
