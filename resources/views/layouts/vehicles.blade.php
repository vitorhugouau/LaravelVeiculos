<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AutoVendas')</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        :root {
            --wm-red: #d32f2f;
            --wm-red-dark: #b71c1c;
            --wm-red-light: #f44336;
            --bg-white: #ffffff;
            --bg-light: #f5f5f5;
            --bg-gray: #fafafa;
            --text-dark: #212121;
            --text-medium: #616161;
            --text-light: #9e9e9e;
            --border: #e0e0e0;
            --shadow: rgba(0, 0, 0, 0.1);
            --shadow-lg: rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .vehicles-page {
            min-height: 100vh;
            background: var(--bg-light);
        }

        /* Navbar Webmotors Style */
        .custom-navbar {
            background: var(--bg-white);
            border-bottom: 2px solid var(--wm-red);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px var(--shadow);
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
            padding: 16px 30px;
            background: var(--wm-red);
        }

        .nav-logo h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            gap: 0;
            align-items: center;
            padding-right: 30px;
        }

        .nav-links a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            font-size: 0.95rem;
            padding: 16px 20px;
            display: inline-block;
        }

        .nav-links a:hover {
            color: var(--wm-red);
            background: var(--bg-light);
        }

        .nav-login {
            background: var(--wm-red);
            color: #ffffff !important;
            padding: 10px 24px;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.2s;
            margin-left: 12px;
        }

        .nav-login:hover {
            background: var(--wm-red-dark);
            color: #ffffff !important;
        }

        .nav-admin {
            background: #10b981;
            color: #ffffff !important;
            padding: 10px 24px;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            margin-left: 12px;
        }

        .nav-admin:hover {
            background: #059669;
            color: #ffffff !important;
        }

        .nav-user-name {
            color: var(--text-dark);
            font-weight: 600;
            padding: 8px 16px;
            background: var(--bg-light);
            border-radius: 4px;
            font-size: 0.9rem;
            margin-left: 12px;
        }

        .nav-logout {
            background: var(--wm-red);
            color: #ffffff !important;
            padding: 10px 24px;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.95rem;
            margin-left: 12px;
        }

        .nav-logout:hover {
            background: var(--wm-red-dark);
        }

        /* Hero Section Webmotors Style */
        .hero-section {
            position: relative;
            padding: 60px 20px;
            text-align: center;
            background: linear-gradient(135deg, var(--wm-red) 0%, var(--wm-red-dark) 100%);
            color: #ffffff;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 16px;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.25rem);
            color: rgba(255, 255, 255, 0.95);
            font-weight: 400;
            line-height: 1.6;
        }

        /* Filters Container Webmotors Style */
        .filters-container {
            background: var(--bg-white);
            border-bottom: 1px solid var(--border);
            padding: 24px 30px;
            margin-top: 0;
            box-shadow: 0 2px 4px var(--shadow);
        }

        .filters-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .filter-select {
            flex: 1;
            min-width: 180px;
            padding: 12px 16px;
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 4px;
            font-size: 0.95rem;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-select:hover {
            border-color: var(--wm-red);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--wm-red);
            box-shadow: 0 0 0 2px rgba(211, 47, 47, 0.1);
        }

        .filter-select option {
            background: var(--bg-white);
            color: var(--text-dark);
        }

        .price-filter-wrapper {
            flex: 1;
            min-width: 180px;
            position: relative;
        }

        .price-toggle {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
            color: var(--text-dark);
        }

        .price-toggle svg {
            transition: transform 0.2s;
        }

        .price-toggle.active svg {
            transform: rotate(180deg);
        }

        .price-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 4px 12px var(--shadow-lg);
            z-index: 50;
            display: none;
        }

        .price-dropdown.active {
            display: block;
        }

        .price-range-container {
            min-width: 280px;
        }

        .price-values {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .price-value-box {
            flex: 1;
            background: var(--bg-gray);
            padding: 12px;
            border-radius: 4px;
            border: 1px solid var(--border);
        }

        .price-value-box label {
            display: block;
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-bottom: 6px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .price-value-box span {
            display: block;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .range-slider {
            position: relative;
            height: 4px;
            margin: 20px 0;
        }

        .slider-track {
            position: absolute;
            width: 100%;
            height: 4px;
            background: var(--border);
            border-radius: 4px;
        }

        .slider-range {
            position: absolute;
            height: 4px;
            background: var(--wm-red);
            border-radius: 4px;
        }

        .range-slider input[type="range"] {
            position: absolute;
            width: 100%;
            height: 4px;
            background: none;
            pointer-events: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .range-slider input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            background: var(--wm-red);
            border: 2px solid #ffffff;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            box-shadow: 0 2px 4px var(--shadow);
            transition: all 0.2s;
        }

        .range-slider input[type="range"]::-webkit-slider-thumb:hover {
            transform: scale(1.1);
            background: var(--wm-red-dark);
        }

        .range-slider input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            background: var(--wm-red);
            border: 2px solid #ffffff;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            box-shadow: 0 2px 4px var(--shadow);
        }

        .filter-btn {
            padding: 12px 32px;
            background: var(--wm-red);
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-btn:hover {
            background: var(--wm-red-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px var(--shadow);
        }

        .clear-filters {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 12px 20px;
            background: var(--bg-gray);
            color: var(--text-medium);
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            border: 1px solid var(--border);
        }

        .clear-filters:hover {
            background: var(--border);
            color: var(--text-dark);
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 30px;
        }

        .vehicles-header {
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .section-title {
            font-size: clamp(1.75rem, 3vw, 2.25rem);
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.5px;
        }

        .results-count {
            color: var(--text-medium);
            font-size: 0.95rem;
            font-weight: 500;
            background: var(--bg-gray);
            padding: 8px 16px;
            border-radius: 4px;
            border: 1px solid var(--border);
        }

        /* Vehicles Grid Webmotors Style */
        .vehicles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .vehicle-card {
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px var(--shadow);
        }

        .vehicle-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px var(--shadow-lg);
            border-color: var(--wm-red);
        }

        .vehicle-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--wm-red);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 700;
            z-index: 3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .vehicle-image-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: var(--bg-gray);
        }

        .vehicle-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .vehicle-card:hover .vehicle-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            right: 0;
            padding: 16px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .vehicle-card:hover .image-overlay {
            opacity: 1;
        }

        .favorite-btn {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid var(--border);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 4px var(--shadow);
        }

        .favorite-btn:hover {
            background: #ffffff;
            transform: scale(1.1);
            border-color: var(--wm-red);
        }

        .favorite-btn svg {
            color: var(--text-medium);
        }

        .favorite-btn:hover svg {
            color: var(--wm-red);
        }

        .vehicle-content {
            padding: 20px;
        }

        .vehicle-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 12px;
            gap: 12px;
        }

        .vehicle-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .vehicle-year {
            background: var(--bg-gray);
            color: var(--text-dark);
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 700;
            white-space: nowrap;
            border: 1px solid var(--border);
        }

        .vehicle-specs {
            display: flex;
            gap: 20px;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }

        .spec-item {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-medium);
            font-size: 0.875rem;
        }

        .spec-item svg {
            color: var(--wm-red);
            width: 16px;
            height: 16px;
        }

        .vehicle-price-section {
            margin-bottom: 16px;
        }

        .price-label {
            font-size: 0.75rem;
            color: var(--text-light);
            margin-bottom: 4px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .vehicle-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--wm-red);
            letter-spacing: -0.5px;
        }

        .vehicle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px 24px;
            background: var(--wm-red);
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .vehicle-btn:hover {
            background: var(--wm-red-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px var(--shadow);
        }

        .vehicle-btn svg {
            transition: transform 0.2s;
            width: 18px;
            height: 18px;
        }

        .vehicle-btn:hover svg {
            transform: translateX(3px);
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: var(--text-medium);
        }

        .empty-state svg {
            margin-bottom: 24px;
            opacity: 0.3;
            width: 64px;
            height: 64px;
            color: var(--wm-red);
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-weight: 700;
        }

        .empty-state p {
            font-size: 1rem;
            color: var(--text-medium);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-logo {
                padding: 12px 20px;
                text-align: center;
            }

            .nav-links {
                padding: 12px 20px;
                flex-wrap: wrap;
                gap: 8px;
                justify-content: center;
                border-top: 1px solid var(--border);
            }

            .nav-links a {
                padding: 10px 16px;
            }

            .hero-section {
                padding: 40px 20px;
            }

            .filters-container {
                padding: 20px;
            }

            .filter-select,
            .price-filter-wrapper {
                min-width: 100%;
            }

            .filter-btn {
                width: 100%;
            }

            .vehicles-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .vehicles-header {
                flex-direction: column;
                align-items: start;
            }

            .container {
                padding: 30px 20px;
            }

            .nav-admin,
            .nav-login,
            .nav-logout {
                margin-left: 0;
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 1.5rem;
            }

            .vehicle-price {
                font-size: 1.25rem;
            }
        }

        @yield('styles')
    </style>
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
