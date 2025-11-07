<nav class="custom-navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <h2>AutoVendas</h2>
        </div>
        <div class="nav-links">
            <a href="{{ route('vehicles.index') }}">Início</a>
            @guest
                <a href="{{ route('login') }}" class="nav-login">Login</a>
            @else
                <a href="#">{{ Auth::user()->name }}</a>
            @endguest
        </div>
    </div>
</nav>