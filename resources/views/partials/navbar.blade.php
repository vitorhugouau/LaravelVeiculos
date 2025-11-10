<nav class="custom-navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="{{ route('vehicles.index') }}" style="text-decoration: none; color: inherit;">
                <h2>AutoVendas</h2>
            </a>
        </div>
        <div class="nav-links">
            <a href="{{ route('vehicles.index') }}">Início</a>
            @guest
                <a href="{{ route('login') }}" class="nav-login">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrar</a>
                @endif
            @else
                @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="nav-admin">
                        Painel Admin
                    </a>
                @endif
                <span class="nav-user-name">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-logout">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>
