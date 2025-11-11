@extends('layouts.vehicles')

@section('title', 'Veículos à Venda - AutoVendas')

@section('hero')
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-car-side"></i> Encontre o Carro dos Seus Sonhos
            </h1>
            <p class="hero-subtitle">Milhares de veículos novos e seminovos com as melhores condições. Encontre o carro ideal para você.</p>
        </div>
    </div>
@endsection

@section('filters')
    <div class="filters-container">
        <form method="GET" action="{{ route('vehicles.index') }}" class="filters-wrapper" id="filterForm">
            <select name="brand_id" class="filter-select" id="brandFilter">
                <option value="">Todas as marcas</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>

            <select name="year" class="filter-select" id="yearFilter">
                <option value="">Todos os anos</option>
                @foreach($years as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>

            <div class="price-filter-wrapper">
                <button type="button" class="filter-select price-toggle" id="priceToggle">
                    <span id="priceLabel">
                        @if(request('min_price') || request('max_price'))
                            R$ {{ number_format(request('min_price', $minPrice), 0, ',', '.') }} - R$
                            {{ number_format(request('max_price', $maxPrice), 0, ',', '.') }}
                        @else
                            Preço
                        @endif
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>

                <div class="price-dropdown" id="priceDropdown">
                    <div class="price-range-container">
                        <div class="price-values">
                            <div class="price-value-box">
                                <label>Mínimo</label>
                                <span id="minPriceDisplay">R$ {{ number_format($minPrice, 0, ',', '.') }}</span>
                            </div>
                            <div class="price-value-box">
                                <label>Máximo</label>
                                <span id="maxPriceDisplay">R$ {{ number_format($maxPrice, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="range-slider">
                            <input type="range" name="min_price" id="minPrice" min="{{ $minPrice }}" max="{{ $maxPrice }}"
                                value="{{ request('min_price', $minPrice) }}" step="1000">
                            <input type="range" name="max_price" id="maxPrice" min="{{ $minPrice }}" max="{{ $maxPrice }}"
                                value="{{ request('max_price', $maxPrice) }}" step="1000">
                            <div class="slider-track"></div>
                            <div class="slider-range" id="sliderRange"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="filter-btn">
                <i class="fas fa-filter"></i> Filtrar
            </button>

            @if(request()->hasAny(['brand_id', 'year', 'min_price', 'max_price']))
                <a href="{{ route('vehicles.index') }}" class="clear-filters">
                    <i class="fas fa-times-circle"></i> Limpar Filtros
                </a>
            @endif
        </form>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="vehicles-header">
            <h2 class="section-title">
                <i class="fas fa-car"></i> Veículos Disponíveis
            </h2>
            <p class="results-count">
                <i class="fas fa-search"></i>
                {{ count($vehicles) }} veículo{{ count($vehicles) != 1 ? 's' : '' }}
                encontrado{{ count($vehicles) != 1 ? 's' : '' }}
            </p>
        </div>

        <div class="vehicles-grid">
            @foreach($vehicles as $vehicle)
                <div class="vehicle-card">
                    <div class="vehicle-badge">
                        <i class="fas fa-star"></i> Em destaque
                    </div>

                    <div class="vehicle-image-wrapper">
                        <img src="{{ $vehicle->photo }}" alt="{{ $vehicle->brand->name }} {{ $vehicle->model->name }}"
                            class="vehicle-image">
                        <div class="image-overlay">
                            <button class="favorite-btn" title="Favoritar">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <div class="vehicle-content">
                        <div class="vehicle-header">
                            <h3 class="vehicle-title">{{ $vehicle->brand->name }} {{ $vehicle->model->name }}</h3>
                            <span class="vehicle-year">{{ $vehicle->year }}</span>
                        </div>

                        <div class="vehicle-specs">
                            <div class="spec-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>{{ number_format($vehicle->mileage, 0, ',', '.') }} km</span>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{ $vehicle->year }}</span>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-palette"></i>
                                <span>{{ $vehicle->color->colors }}</span>
                            </div>
                        </div>

                        <div class="vehicle-price-section">
                            <div class="price-label">
                                <i class="fas fa-tag"></i> A partir de
                            </div>
                            <div class="vehicle-price">R$ {{ number_format($vehicle->price, 2, ',', '.') }}</div>
                        </div>

                        <a href="{{ route('vehicle.show', $vehicle->id) }}" class="vehicle-btn">
                            <i class="fas fa-eye"></i> Ver Detalhes
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($vehicles) === 0)
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13" />
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8" />
                    <circle cx="5.5" cy="18.5" r="2.5" />
                    <circle cx="18.5" cy="18.5" r="2.5" />
                </svg>
                <h3>Nenhum veículo encontrado</h3>
                <p>Tente ajustar os filtros ou volte mais tarde</p>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        const minPrice = document.getElementById('minPrice');
        const maxPrice = document.getElementById('maxPrice');
        const minPriceDisplay = document.getElementById('minPriceDisplay');
        const maxPriceDisplay = document.getElementById('maxPriceDisplay');
        const sliderRange = document.getElementById('sliderRange');
        const priceLabel = document.getElementById('priceLabel');
        const priceToggle = document.getElementById('priceToggle');
        const priceDropdown = document.getElementById('priceDropdown');

        function formatPrice(value) {
            return 'R$ ' + parseInt(value).toLocaleString('pt-BR');
        }

        function updateSlider() {
            const min = parseInt(minPrice.value);
            const max = parseInt(maxPrice.value);
            const rangeMin = parseInt(minPrice.min);
            const rangeMax = parseInt(minPrice.max);

            if (min > max - 5000) {
                if (this.id === 'minPrice') {
                    minPrice.value = max - 5000;
                } else {
                    maxPrice.value = min + 5000;
                }
            }

            const minPercent = ((min - rangeMin) / (rangeMax - rangeMin)) * 100;
            const maxPercent = ((max - rangeMin) / (rangeMax - rangeMin)) * 100;

            sliderRange.style.left = minPercent + '%';
            sliderRange.style.width = (maxPercent - minPercent) + '%';

            minPriceDisplay.textContent = formatPrice(minPrice.value);
            maxPriceDisplay.textContent = formatPrice(maxPrice.value);

            priceLabel.textContent = formatPrice(minPrice.value) + ' - ' + formatPrice(maxPrice.value);
        }

        minPrice.addEventListener('input', updateSlider);
        maxPrice.addEventListener('input', updateSlider);

        priceToggle.addEventListener('click', function (e) {
            e.preventDefault();
            priceDropdown.classList.toggle('active');
            priceToggle.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (!priceToggle.contains(e.target) && !priceDropdown.contains(e.target)) {
                priceDropdown.classList.remove('active');
                priceToggle.classList.remove('active');
            }
        });

        updateSlider();
    </script>
@endsection
