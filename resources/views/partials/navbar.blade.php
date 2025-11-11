<nav class="custom-navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="{{ route('vehicles.index') }}" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-car"></i>
                <h2>AutoVendas</h2>
            </a>
        </div>
        <div class="nav-links">
            <a href="{{ route('vehicles.index') }}">
                <i class="fas fa-home"></i> Início
            </a>
            @guest
                <a href="{{ route('login') }}" class="nav-login">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Registrar</a>
                @endif
            @else
                @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="nav-admin">
                        <i class="fas fa-shield-alt"></i> Painel Admin
                    </a>
                @endif
                <span class="nav-user-name">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
