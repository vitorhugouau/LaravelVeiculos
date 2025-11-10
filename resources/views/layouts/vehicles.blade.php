<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AutoVendas')</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .vehicles-page {
            min-height: 100vh;
            background: linear-gradient(to bottom, #f8fafc 0%, #ffffff 100%);
        }

        .custom-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #3b82f6;
            margin: 0;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            align-items: center;
        }

        .nav-links a {
            color: #475569;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: #3b82f6;
        }

        .nav-login {
            background: #3b82f6;
            color: #ffffff !important;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
        }

        .nav-login:hover {
            background: #2563eb;
        }

        .nav-admin {
            background: #10b981;
            color: #ffffff !important;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .nav-admin:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .nav-user-name {
            color: #475569;
            font-weight: 600;
            padding: 8px 12px;
        }

        .nav-logout {
            background: #ef4444;
            color: #ffffff !important;
            padding: 8px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.95rem;
        }

        .nav-logout:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .hero-section {
            position: relative;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            padding: 60px 20px;
            text-align: center;
            overflow: hidden;
        }

        .hero-gradient {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .hero-subtitle {
            font-size: 1.125rem;
            color: #cbd5e1;
            font-weight: 400;
        }

        .filters-container {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 24px 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .filters-wrapper {
            max-width: 1200px;
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
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #475569;
            background: #ffffff;
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-select:hover {
            border-color: #3b82f6;
        }

        .filter-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
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
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
            background: #f8fafc;
            padding: 12px;
            border-radius: 8px;
        }

        .price-value-box label {
            display: block;
            font-size: 0.75rem;
            color: #64748b;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .price-value-box span {
            display: block;
            font-size: 1rem;
            font-weight: 700;
            color: #1e293b;
        }

        .range-slider {
            position: relative;
            height: 5px;
            margin: 20px 0;
        }

        .slider-track {
            position: absolute;
            width: 100%;
            height: 5px;
            background: #e2e8f0;
            border-radius: 5px;
        }

        .slider-range {
            position: absolute;
            height: 5px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 5px;
        }

        .range-slider input[type="range"] {
            position: absolute;
            width: 100%;
            height: 5px;
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
            background: #3b82f6;
            border: 3px solid #ffffff;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
        }

        .range-slider input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            background: #3b82f6;
            border: 3px solid #ffffff;
            border-radius: 50%;
            cursor: pointer;
            pointer-events: all;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
        }

        .filter-btn {
            padding: 12px 32px;
            background: #3b82f6;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-btn:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }

        .clear-filters {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 12px 20px;
            background: #f1f5f9;
            color: #64748b;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .clear-filters:hover {
            background: #e2e8f0;
            color: #475569;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 20px;
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
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
        }

        .results-count {
            color: #64748b;
            font-size: 1rem;
        }

        .vehicles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 32px;
        }

        .vehicle-card {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .vehicle-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1), 0 10px 10px rgba(0, 0, 0, 0.04);
        }

        .vehicle-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .vehicle-image-wrapper {
            position: relative;
            width: 100%;
            height: 240px;
            overflow: hidden;
            background: #f1f5f9;
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
            border: none;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .favorite-btn:hover {
            background: #ffffff;
            transform: scale(1.1);
        }

        .favorite-btn svg {
            color: #64748b;
        }

        .favorite-btn:hover svg {
            color: #ef4444;
        }

        .vehicle-content {
            padding: 24px;
        }

        .vehicle-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 16px;
            gap: 12px;
        }

        .vehicle-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.3;
        }

        .vehicle-year {
            background: #f1f5f9;
            color: #475569;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .vehicle-specs {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .spec-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 0.95rem;
        }

        .spec-item svg {
            color: #94a3b8;
        }

        .vehicle-price-section {
            margin-bottom: 20px;
        }

        .price-label {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 4px;
        }

        .vehicle-price {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.02em;
        }

        .vehicle-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .vehicle-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .vehicle-btn svg {
            transition: transform 0.2s;
        }

        .vehicle-btn:hover svg {
            transform: translateX(4px);
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #64748b;
        }

        .empty-state svg {
            margin-bottom: 24px;
            opacity: 0.3;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: #475569;
            margin-bottom: 8px;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 12px;
                flex-wrap: wrap;
            }

            .nav-logo h2 {
                font-size: 1.25rem;
            }

            .nav-admin,
            .nav-login,
            .nav-logout {
                padding: 6px 16px;
                font-size: 0.875rem;
            }

            .nav-user-name {
                font-size: 0.875rem;
                padding: 6px 8px;
            }

            .hero-section {
                padding: 40px 20px;
            }

            .hero-title {
                font-size: 1.75rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .vehicles-grid {
                grid-template-columns: 1fr;
            }

            .vehicles-header {
                flex-direction: column;
                align-items: start;
            }

            .filter-select, .price-filter-wrapper {
                min-width: 100%;
            }

            .filter-btn {
                width: 100%;
            }

            .price-dropdown {
                left: 0;
                right: 0;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 1.5rem;
            }

            .vehicle-price {
                font-size: 1.5rem;
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
