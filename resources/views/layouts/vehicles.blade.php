<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AutoVendas')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #e90909ff;
            --primary-dark: #ff0b02ff;
            --primary-light: #ff3333ff;
            --secondary: #1E293B;
            --accent: #10b981;
            --danger: #ef4444;
            --bg-white: #ffffff;
            --bg-light: #F8FAFC;
            --bg-gray: #F1F5F9;
            --text-dark: #1E293B;
            --text-medium: #64748B;
            --text-light: #94A3B8;
            --border: #E2E8F0;
            --shadow: rgba(0, 0, 0, 0.05);
            --shadow-md: rgba(0, 0, 0, 0.1);
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

        /* Navbar Estilo WebMotors */
        .custom-navbar {
            background: var(--bg-white);
            border-bottom: 1px solid var(--border);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px var(--shadow);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-logo h2 {
            font-size: 1.6rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .nav-logo i {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .nav-links a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            font-size: 0.95rem;
            padding: 10px 16px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 8px;
        }

        .nav-links a:hover {
            color: var(--primary);
            background: var(--bg-light);
        }

        .nav-login,
        .nav-admin {
            background: var(--primary);
            color: #ffffff !important;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(255, 107, 0, 0.3);
        }

        .nav-login:hover,
        .nav-admin:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 0, 0.4);
            color: #ffffff !important;
        }

        .nav-admin {
            background: var(--accent);
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .nav-admin:hover {
            background: #059669;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .nav-user-name {
            color: var(--text-dark);
            font-weight: 600;
            padding: 10px 16px;
            background: var(--bg-gray);
            border-radius: 8px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .nav-user-name i {
            color: var(--primary);
        }

        .nav-logout {
            background: var(--danger);
            color: #ffffff !important;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        }

        .nav-logout:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            padding: 60px 30px 100px;
            text-align: center;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            color: #ffffff;
            margin-bottom: 16px;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.2rem);
            color: rgba(255, 255, 255, 0.95);
            font-weight: 400;
            line-height: 1.6;
        }

        /* Filters Container - Estilo WebMotors */
        .filters-container {
            background: var(--bg-white);
            border-radius: 16px;
            padding: 24px;
            margin: -60px auto 40px;
            position: relative;
            z-index: 10;
            box-shadow: 0 8px 30px var(--shadow-lg);
            max-width: 1400px;
            margin-left: 260px;
            margin-right: 30px;
        }

        .filters-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            align-items: start;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-medium);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-select {
            padding: 12px 16px;
            background: var(--bg-white);
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 0.95rem;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .filter-select:hover {
            border-color: var(--primary);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }

        .price-filter-wrapper {
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
            transition: transform 0.3s;
        }

        .price-toggle.active svg {
            transform: rotate(180deg);
        }

        .price-dropdown {
            position: absolute;
            top: calc(100% + 12px);
            left: 0;
            right: 0;
            background: var(--bg-white);
            border: 2px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 25px var(--shadow-lg);
            z-index: 50;
            display: none;
        }

        .price-dropdown.active {
            display: block;
        }

        .price-values {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
        }

        .price-value-box {
            flex: 1;
            background: var(--bg-gray);
            padding: 12px;
            border-radius: 10px;
        }

        .price-value-box label {
            display: block;
            font-size: 0.75rem;
            color: var(--text-medium);
            margin-bottom: 4px;
            font-weight: 600;
        }

        .price-value-box span {
            display: block;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
        }

        .range-slider {
            position: relative;
            height: 6px;
            margin: 20px 0;
        }

        .slider-track {
            position: absolute;
            width: 100%;
            height: 6px;
            background: var(--border);
            border-radius: 6px;
        }

        .slider-range {
            position: absolute;
            height: 6px;
            background: var(--primary);
            border-radius: 6px;
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
            width: 18px;
            height: 18px;
            background: var(--primary);
            border: 3px solid #ffffff;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            box-shadow: 0 2px 8px var(--shadow-md);
        }

        .range-slider input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            background: var(--primary);
            border: 3px solid #ffffff;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            box-shadow: 0 2px 8px var(--shadow-md);
        }

        .filter-actions {
            display: flex;
            gap: 12px;
            grid-column: 1 / -1;
            margin-top: 8px;
        }

        .filter-btn {
            flex: 1;
            padding: 14px 24px;
            background: var(--primary);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(255, 107, 0, 0.3);
        }

        .filter-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.4);
        }

        .clear-filters {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 24px;
            background: var(--bg-gray);
            color: var(--text-medium);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
            border: 2px solid var(--border);
        }

        .clear-filters:hover {
            background: var(--bg-light);
            border-color: var(--danger);
            color: var(--danger);
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
            font-size: clamp(1.75rem, 4vw, 2.25rem);
            font-weight: 800;
            color: var(--text-dark);
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: var(--primary);
        }

        .results-count {
            color: var(--text-medium);
            font-size: 1rem;
            font-weight: 600;
            background: var(--bg-white);
            padding: 12px 20px;
            border-radius: 10px;
            border: 2px solid var(--border);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .results-count i {
            color: var(--primary);
        }

        /* Vehicles Grid */
        .vehicles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .vehicle-card {
            background: var(--bg-white);
            border: 2px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 2px 8px var(--shadow);
        }

        .vehicle-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px var(--shadow-lg);
            border-color: var(--primary);
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
            transition: transform 0.5s;
        }

        .vehicle-card:hover .vehicle-image {
            transform: scale(1.05);
        }

        .vehicle-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--accent);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .vehicle-year {
            background: rgba(255, 107, 0, 0.1);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .vehicle-specs {
            display: flex;
            gap: 20px;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .spec-item {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--text-medium);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .spec-item i {
            color: var(--primary);
            font-size: 1rem;
        }

        .vehicle-price-section {
            margin-bottom: 16px;
        }

        .price-label {
            font-size: 0.75rem;
            color: var(--text-light);
            margin-bottom: 4px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .vehicle-price {
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .vehicle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px 20px;
            background: var(--primary);
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .vehicle-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 0, 0.3);
            color: #ffffff;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: var(--text-medium);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--primary);
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: var(--text-dark);
            margin-bottom: 12px;
            font-weight: 700;
        }

        .empty-state p {
            font-size: 1rem;
            color: var(--text-medium);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 20px;
                flex-wrap: wrap;
                height: auto;
                min-height: 70px;
            }

            .nav-links {
                width: 100%;
                justify-content: space-between;
                padding: 12px 0;
                border-top: 1px solid var(--border);
            }

            .nav-links a {
                padding: 8px 12px;
                font-size: 0.85rem;
            }

            .hero-section {
                padding: 40px 20px 80px;
            }

            .filters-container {
                margin: -40px 20px 30px;
                padding: 20px;
            }

            .filters-wrapper {
                grid-template-columns: 1fr;
            }

            .filter-actions {
                flex-direction: column;
            }

            .vehicles-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 30px 20px;
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
