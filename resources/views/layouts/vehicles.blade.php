<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoVendas - Tema Escuro Moderno</title>
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

        .vehicles-page {
            min-height: 100vh;
            background: linear-gradient(to bottom, var(--bg-darker) 0%, var(--bg-dark) 100%);
        }

        /* Navbar Moderna Dark */
        .custom-navbar {
            background: rgba(26, 26, 36, 0.8);
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
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
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
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            transition: all 0.3s;
            transform: translateX(-50%);
            box-shadow: 0 0 12px var(--glow-primary);
        }

        .nav-links a:hover {
            color: var(--text-primary);
            background: var(--bg-hover);
        }

        .nav-links a:hover::after {
            width: 80%;
        }

        .nav-login,
        .nav-admin,
        .nav-logout {
            padding: 11px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            margin-left: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            position: relative;
            overflow: hidden;
        }

        .nav-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 16px var(--glow-primary);
        }

        .nav-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px var(--glow-primary);
        }

        .nav-admin {
            background: linear-gradient(135deg, var(--accent) 0%, #0d9488 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 16px var(--glow-accent);
        }

        .nav-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px var(--glow-accent);
        }

        .nav-user-name {
            color: var(--text-primary);
            font-weight: 600;
            padding: 11px 20px;
            background: var(--bg-elevated);
            border-radius: 10px;
            font-size: 0.9rem;
            margin-left: 12px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--border-medium);
        }

        .nav-user-name i {
            color: var(--primary);
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

        /* Hero Section Dark */
        .hero-section {
            position: relative;
            padding: 100px 20px 80px;
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
            background: radial-gradient(circle, var(--glow-primary) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(80px);
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
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
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 24px;
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
            font-size: 3.5rem;
            animation: float 3s ease-in-out infinite;
            filter: drop-shadow(0 0 20px var(--glow-primary));
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.4rem);
            color: var(--text-secondary);
            font-weight: 400;
            line-height: 1.6;
            text-shadow: 0 2px 12px var(--shadow-md);
        }

        /* Filters Container Dark */
        .filters-container {
            background: rgba(26, 26, 36, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-subtle);
            padding: 32px;
            margin: -50px 20px 0;
            position: relative;
            z-index: 10;
            box-shadow: 0 8px 32px var(--shadow-lg);
            border-radius: 20px;
            max-width: 1360px;
            margin-left: auto;
            margin-right: auto;
        }

        .filters-wrapper {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .filter-select {
            flex: 1;
            min-width: 200px;
            padding: 15px 20px;
            background: var(--bg-elevated);
            border: 2px solid var(--border-medium);
            border-radius: 12px;
            font-size: 0.95rem;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .filter-select:hover {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--glow-primary);
            transform: translateY(-2px);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--glow-primary);
        }

        .filter-select option {
            background: var(--bg-elevated);
            color: var(--text-primary);
            padding: 12px;
        }

        .price-filter-wrapper {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        .price-toggle {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
            color: var(--text-primary);
            padding: 15px 20px;
            background: var(--bg-elevated);
            border: 2px solid var(--border-medium);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .price-toggle:hover {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--glow-primary);
        }

        .price-dropdown {
            position: absolute;
            top: calc(100% + 12px);
            left: 0;
            right: 0;
            background: var(--bg-elevated);
            border: 2px solid var(--border-medium);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 12px 48px var(--shadow-lg);
            z-index: 50;
            display: none;
        }

        .price-dropdown.active {
            display: block;
            animation: slideDown 0.3s ease-out;
        }

        .price-values {
            display: flex;
            gap: 16px;
            margin-bottom: 28px;
        }

        .price-value-box {
            flex: 1;
            background: var(--bg-card);
            padding: 18px;
            border-radius: 12px;
            border: 2px solid var(--border-medium);
            position: relative;
        }

        .price-value-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 12px 12px 0 0;
        }

        .price-value-box label {
            display: block;
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .price-value-box span {
            display: block;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
        }

        .range-slider {
            position: relative;
            height: 6px;
            margin: 28px 0;
        }

        .slider-track {
            position: absolute;
            width: 100%;
            height: 6px;
            background: var(--border-medium);
            border-radius: 6px;
        }

        .slider-range {
            position: absolute;
            height: 6px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 6px;
            box-shadow: 0 0 12px var(--glow-primary);
        }

        .range-slider input[type="range"] {
            position: absolute;
            width: 100%;
            height: 6px;
            background: none;
            pointer-events: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .range-slider input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 22px;
            height: 22px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: 3px solid var(--bg-elevated);
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            box-shadow: 0 0 16px var(--glow-primary);
            transition: all 0.2s;
        }

        .range-slider input[type="range"]::-webkit-slider-thumb:hover {
            transform: scale(1.2);
            box-shadow: 0 0 24px var(--glow-primary);
        }

        .filter-btn {
            padding: 15px 36px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 20px var(--glow-primary);
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 28px var(--glow-primary);
        }

        .clear-filters {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 15px 28px;
            background: var(--bg-elevated);
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
            border: 2px solid var(--border-medium);
        }

        .clear-filters:hover {
            background: var(--bg-hover);
            border-color: var(--danger);
            color: var(--danger);
            transform: translateY(-2px);
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 30px;
        }

        .vehicles-header {
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -1px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .section-title i {
            color: var(--primary);
            font-size: 2.2rem;
            filter: drop-shadow(0 0 12px var(--glow-primary));
        }

        .results-count {
            color: var(--text-secondary);
            font-size: 1rem;
            font-weight: 600;
            background: var(--bg-elevated);
            padding: 12px 24px;
            border-radius: 12px;
            border: 2px solid var(--border-medium);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .results-count i {
            color: var(--primary);
        }

        /* Vehicles Grid Dark */
        .vehicles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 32px;
        }

        .vehicle-card {
            background: var(--bg-card);
            border: 2px solid var(--border-subtle);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 16px var(--shadow-md);
            position: relative;
        }

        .vehicle-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .vehicle-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px var(--shadow-lg);
            border-color: var(--primary);
        }

        .vehicle-card:hover::before {
            opacity: 1;
            box-shadow: 0 0 20px var(--glow-primary);
        }

        .vehicle-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            background: linear-gradient(135deg, var(--accent) 0%, #0d9488 100%);
            color: #ffffff;
            padding: 8px 18px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 16px var(--glow-accent);
        }

        .vehicle-image-wrapper {
            position: relative;
            width: 100%;
            height: 260px;
            overflow: hidden;
            background: var(--bg-elevated);
        }

        .vehicle-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .vehicle-card:hover .vehicle-image {
            transform: scale(1.15);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            right: 0;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.4s;
        }

        .vehicle-card:hover .image-overlay {
            opacity: 1;
        }

        .favorite-btn {
            background: rgba(26, 26, 36, 0.95);
            backdrop-filter: blur(10px);
            border: 2px solid var(--border-medium);
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 16px var(--shadow-md);
        }

        .favorite-btn:hover {
            background: var(--bg-elevated);
            transform: scale(1.15) rotate(10deg);
            border-color: var(--danger);
            box-shadow: 0 6px 24px rgba(239, 68, 68, 0.4);
        }

        .favorite-btn i {
            color: var(--text-muted);
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .favorite-btn:hover i {
            color: var(--danger);
        }

        .vehicle-content {
            padding: 26px;
        }

        .vehicle-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 18px;
            gap: 12px;
        }

        .vehicle-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.3;
        }

        .vehicle-year {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15) 0%, rgba(168, 85, 247, 0.15) 100%);
            color: var(--primary-light);
            padding: 7px 16px;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 700;
            white-space: nowrap;
            border: 2px solid rgba(99, 102, 241, 0.3);
        }

        .vehicle-specs {
            display: flex;
            gap: 26px;
            margin-bottom: 22px;
            padding-bottom: 22px;
            border-bottom: 1px solid var(--border-subtle);
            flex-wrap: wrap;
        }

        .spec-item {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .spec-item i {
            color: var(--primary);
            font-size: 1.15rem;
            filter: drop-shadow(0 0 8px var(--glow-primary));
        }

        .vehicle-price-section {
            margin-bottom: 22px;
        }

        .price-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 7px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .vehicle-price {
            font-size: 1.9rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -1px;
            filter: drop-shadow(0 0 8px var(--glow-primary));
        }

        .vehicle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 15px 28px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: #ffffff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 20px var(--glow-primary);
        }

        .vehicle-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 28px var(--glow-primary);
        }

        .vehicle-btn i {
            font-size: 1.1rem;
            transition: transform 0.3s;
        }

        .vehicle-btn:hover i {
            transform: translateX(4px);
        }

        .empty-state {
            text-align: center;
            padding: 120px 20px;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 6rem;
            color: var(--primary);
            margin-bottom: 28px;
            opacity: 0.2;
            filter: drop-shadow(0 0 20px var(--glow-primary));
        }

        .empty-state h3 {
            font-size: 2rem;
            color: var(--text-primary);
            margin-bottom: 14px;
            font-weight: 700;
        }

        .empty-state p {
            font-size: 1.15rem;
            color: var(--text-secondary);
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

            .hero-section {
                padding: 70px 20px 60px;
            }

            .filters-container {
                margin: -30px 20px 40px;
                padding: 28px;
            }

            .filter-select,
            .price-filter-wrapper {
                min-width: 100%;
            }

            .vehicles-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <div class="vehicles-page">
        @include('partials.navbar')

        @yield('hero')

        @yield('filters')

        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
