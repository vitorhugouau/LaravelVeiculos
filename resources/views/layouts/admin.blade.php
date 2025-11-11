<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - AutoVendas')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #a855f7;
            --accent: #14b8a6;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;

            /* Dark Theme Colors */
            --bg-darker: #0a0a0f;
            --bg-dark: #111118;
            --bg-card: #1a1a24;
            --bg-elevated: #222232;
            --bg-hover: #2a2a3c;

            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;

            --border-subtle: #2a2a3c;
            --border-medium: #3a3a4c;

            --shadow-sm: rgba(0, 0, 0, 0.3);
            --shadow-md: rgba(0, 0, 0, 0.5);
            --shadow-lg: rgba(0, 0, 0, 0.7);

            --glow-primary: rgba(99, 102, 241, 0.3);
            --glow-accent: rgba(20, 184, 166, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-darker);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .admin-page {
            min-height: 100vh;
            background: linear-gradient(to bottom, var(--bg-darker) 0%, var(--bg-dark) 100%);
        }

        /* Navbar Moderna Dark */
        .admin-navbar {
            background: rgba(26, 26, 36, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-subtle);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 24px var(--shadow-md);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            padding: 20px 32px;
            background: linear-gradient(135deg, var(--accent) 0%, #0d9488 100%);
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .nav-logo::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .nav-logo h2 {
            font-size: 1.75rem;
            font-weight: 900;
            color: #ffffff;
            margin: 0;
            letter-spacing: -0.5px;
            position: relative;
            z-index: 1;
        }

        .nav-logo i {
            font-size: 1.5rem;
            color: #ffffff;
            position: relative;
            z-index: 1;
        }

        .nav-links {
            display: flex;
            gap: 0;
            align-items: center;
            padding-right: 32px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.95rem;
            padding: 20px 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent) 0%, var(--primary) 100%);
            transition: all 0.3s;
            transform: translateX(-50%);
            box-shadow: 0 0 12px var(--glow-accent);
        }

        .nav-links a:hover {
            color: var(--text-primary);
            background: var(--bg-hover);
        }

        .nav-links a:hover::after {
            width: 80%;
        }

        .nav-links a.active {
            color: var(--accent);
        }

        .nav-links a.active::after {
            width: 80%;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-right: 32px;
        }

        .nav-user-name {
            color: var(--text-primary);
            font-weight: 600;
            padding: 11px 20px;
            background: var(--bg-elevated);
            border-radius: 10px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--border-medium);
        }

        .nav-user-name i {
            color: var(--accent);
        }

        .nav-site,
        .nav-logout {
            padding: 11px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            text-decoration: none;
        }

        .nav-site {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 16px var(--glow-primary);
        }

        .nav-site:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px var(--glow-primary);
        }

        .nav-logout {
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 16px rgba(239, 68, 68, 0.3);
        }

        .nav-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(239, 68, 68, 0.4);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            padding: 80px 20px 60px;
            text-align: center;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--glow-accent) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(80px);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 16px;
            letter-spacing: -2px;
            line-height: 1.1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            text-shadow: 0 4px 24px var(--shadow-lg);
        }

        .hero-title i {
            font-size: 2.5rem;
            animation: float 3s ease-in-out infinite;
            filter: drop-shadow(0 0 20px var(--glow-accent));
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.2rem);
            color: var(--text-secondary);
            font-weight: 400;
            line-height: 1.6;
            text-shadow: 0 2px 12px var(--shadow-md);
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 30px;
        }

        /* Alerts */
        .alert {
            padding: 20px 24px;
            border-radius: 12px;
            margin-bottom: 24px;
            border: 2px solid;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border-color: var(--success);
            color: var(--success);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-color: var(--danger);
            color: var(--danger);
        }

        .alert-close {
            background: none;
            border: none;
            color: inherit;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .alert-close:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-logo {
                padding: 16px 24px;
                justify-content: center;
            }

            .nav-links {
                padding: 14px 24px;
                flex-wrap: wrap;
                gap: 10px;
                justify-content: center;
                border-top: 1px solid var(--border-subtle);
            }

            .nav-user {
                padding: 14px 24px;
                justify-content: center;
                border-top: 1px solid var(--border-subtle);
            }

            .hero-section {
                padding: 60px 20px 40px;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <div class="admin-page">
        <nav class="admin-navbar">
            <div class="nav-container">
                <a href="{{ route('admin.dashboard') }}" class="nav-logo">
                    <i class="fas fa-shield-alt"></i>
                    <h2>Painel Admin</h2>
                </a>
                <div class="nav-links">
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.vehicles.index') }}" class="{{ request()->routeIs('admin.vehicles.*') ? 'active' : '' }}">
                        <i class="fas fa-car"></i> Veículos
                    </a>
                    <a href="{{ route('admin.brands.index') }}" class="{{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                        <i class="fas fa-tag"></i> Marcas
                    </a>
                    <a href="{{ route('admin.models.index') }}" class="{{ request()->routeIs('admin.models.*') ? 'active' : '' }}">
                        <i class="fas fa-list"></i> Modelos
                    </a>
                    <a href="{{ route('admin.colors.index') }}" class="{{ request()->routeIs('admin.colors.*') ? 'active' : '' }}">
                        <i class="fas fa-palette"></i> Cores
                    </a>
                </div>
                <div class="nav-user">
                    <span class="nav-user-name">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </span>
                    <a href="{{ route('vehicles.index') }}" class="nav-site">
                        <i class="fas fa-external-link-alt"></i> Ver Site
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-logout">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        @yield('hero')

        <main>
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success">
                        <div>
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                        <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <div>
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        </div>
                        <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <div>
                            <i class="fas fa-exclamation-triangle"></i>
                            <ul style="margin: 8px 0 0 20px; padding: 0;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="alert-close" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @yield('scripts')
</body>
</html>
