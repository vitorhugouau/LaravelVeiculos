@extends('layouts.vehicles')

@section('title', $vehicle->brand->name . ' ' . $vehicle->model->name . ' - AutoVendas')

@section('hero')
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-car-side"></i> {{ $vehicle->brand->name }} {{ $vehicle->model->name }}
            </h1>
            <p class="hero-subtitle">{{ $vehicle->year }} • {{ number_format($vehicle->mileage, 0, ',', '.') }} km • {{ $vehicle->color->colors }}</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="vehicle-details-page">
        <div class="container">
            <nav class="breadcrumb">
                <a href="{{ route('vehicles.index') }}">Início</a>
                <span>/</span>
                <a href="{{ route('vehicles.index') }}">Veículos</a>
                <span>/</span>
                <span>{{ $vehicle->brand->name }} {{ $vehicle->model->name }}</span>
            </nav>

            <div class="details-grid">
                <div class="images-section">
                    <div class="main-image">
                        <img src="{{ $vehicle->photo }}" alt="{{ $vehicle->brand->name }} {{ $vehicle->model->name }}"
                            id="mainImage">
                        <button class="favorite-btn-large">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                            </svg>
                        </button>
                    </div>

                    <div class="thumbnail-gallery">
                        <div class="thumbnail active">
                            <img src="{{ $vehicle->photo }}" alt="Foto 1">
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <div class="vehicle-badge-detail">Em Destaque</div>

                    <h1 class="vehicle-title-detail">
                        {{ $vehicle->brand->name }} {{ $vehicle->model->name }}
                    </h1>

                    <div class="vehicle-subtitle">
                        {{ $vehicle->year }} • {{ number_format($vehicle->mileage, 0, ',', '.') }} km
                    </div>

                    <div class="price-section-detail">
                        <div class="price-label-detail">Preço à vista</div>
                        <div class="price-value-detail">R$ {{ number_format($vehicle->price, 2, ',', '.') }}</div>
                        <div class="price-installment">
                            ou 48x de R$ {{ number_format($vehicle->price / 48, 2, ',', '.') }}
                        </div>
                    </div>

                    <div class="quick-specs">
                        <div class="spec-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            <div>
                                <div class="spec-label">Ano</div>
                                <div class="spec-value">{{ $vehicle->year }}</div>
                            </div>
                        </div>

                        <div class="spec-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                            <div>
                                <div class="spec-label">Quilometragem</div>
                                <div class="spec-value">{{ number_format($vehicle->mileage, 0, ',', '.') }} km</div>
                            </div>
                        </div>

                        <div class="spec-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <div>
                                <div class="spec-label">Cor</div>
                                <div class="spec-value">{{ $vehicle->color->colors }}</div>
                            </div>
                        </div>

                        <div class="spec-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                            </svg>
                            <div>
                                <div class="spec-label">Marca</div>
                                <div class="spec-value">{{ $vehicle->brand->name }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="cta-buttons">
                        <a href="https://wa.me/5511999999999?text=Olá! Tenho interesse no {{ $vehicle->brand->name }} {{ $vehicle->model->name }}"
                            target="_blank" class="btn-whatsapp">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                            </svg>
                            Chamar no WhatsApp
                        </a>
                        <button class="btn-contact">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            Enviar E-mail
                        </button>
                    </div>
                </div>
            </div>

            @if($vehicle->description)
                <div class="description-section">
                    <h2 class="section-title-detail">Descrição</h2>
                    <div class="description-content">
                        {{ $vehicle->description }}
                    </div>
                </div>
            @endif

            <div class="additional-info">
                <h2 class="section-title-detail">Informações Adicionais</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Marca:</span>
                        <span class="info-value">{{ $vehicle->brand->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Modelo:</span>
                        <span class="info-value">{{ $vehicle->model->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Ano:</span>
                        <span class="info-value">{{ $vehicle->year }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Cor:</span>
                        <span class="info-value">{{ $vehicle->color->colors }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Quilometragem:</span>
                        <span class="info-value">{{ number_format($vehicle->mileage, 0, ',', '.') }} km</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Preço:</span>
                        <span class="info-value">R$ {{ number_format($vehicle->price, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="back-button-container">
                <a href="{{ route('vehicles.index') }}" class="btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12" />
                        <polyline points="12 19 5 12 12 5" />
                    </svg>
                    Voltar para listagem
                </a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
  <style>
    .vehicle-details-page {
        background: var(--bg-darker);
        padding: 0 0 80px;
        min-height: 100vh;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 40px;
        font-size: 0.875rem;
    }

    .breadcrumb a {
        color: var(--text-muted);
        text-decoration: none;
        transition: color 0.3s;
        font-weight: 500;
    }

    .breadcrumb a:hover {
        color: var(--primary);
    }

    .breadcrumb span:not(:last-child) {
        color: var(--border-medium);
    }

    .breadcrumb span:last-child {
        color: var(--text-primary);
        font-weight: 600;
    }

    .details-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 48px;
        margin-bottom: 48px;
    }

    .images-section {
        position: sticky;
        top: 100px;
        height: fit-content;
    }

    .main-image {
        position: relative;
        width: 100%;
        height: 550px;
        background: var(--bg-card);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px var(--shadow-lg);
        margin-bottom: 20px;
        border: 2px solid var(--border-subtle);
    }

    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s;
    }

    .main-image:hover img {
        transform: scale(1.05);
    }

    .favorite-btn-large {
        position: absolute;
        top: 24px;
        right: 24px;
        background: rgba(26, 26, 36, 0.95);
        backdrop-filter: blur(10px);
        border: 2px solid var(--border-medium);
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 8px 24px var(--shadow-md);
        z-index: 10;
    }

    .favorite-btn-large:hover {
        background: var(--bg-elevated);
        transform: scale(1.15) rotate(10deg);
        border-color: var(--danger);
        box-shadow: 0 8px 32px rgba(239, 68, 68, 0.4);
    }

    .favorite-btn-large svg {
        color: var(--text-muted);
        width: 28px;
        height: 28px;
    }

    .favorite-btn-large:hover svg {
        color: var(--danger);
    }

    .thumbnail-gallery {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        padding-bottom: 8px;
    }

    .thumbnail-gallery::-webkit-scrollbar {
        height: 6px;
    }

    .thumbnail-gallery::-webkit-scrollbar-track {
        background: var(--bg-elevated);
        border-radius: 10px;
    }

    .thumbnail-gallery::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 10px;
    }

    .thumbnail {
        flex-shrink: 0;
        width: 120px;
        height: 90px;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid var(--border-subtle);
        transition: all 0.3s;
        background: var(--bg-elevated);
    }

    .thumbnail.active {
        border-color: var(--primary);
        box-shadow: 0 0 20px var(--glow-primary);
    }

    .thumbnail:hover {
        border-color: var(--primary-light);
        transform: translateY(-4px);
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .info-section {
        background: var(--bg-card);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 32px var(--shadow-lg);
        border: 2px solid var(--border-subtle);
    }

    .vehicle-badge-detail {
        display: inline-block;
        background: linear-gradient(135deg, var(--accent) 0%, #0d9488 100%);
        color: #ffffff;
        padding: 8px 20px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
        box-shadow: 0 4px 16px var(--glow-accent);
    }

    .vehicle-title-detail {
        font-size: 2.8rem;
        font-weight: 900;
        color: var(--text-primary);
        margin-bottom: 12px;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .vehicle-subtitle {
        font-size: 1.2rem;
        color: var(--text-secondary);
        margin-bottom: 36px;
        font-weight: 500;
    }

    .price-section-detail {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(168, 85, 247, 0.1) 100%);
        padding: 28px;
        border-radius: 16px;
        margin-bottom: 36px;
        border: 2px solid rgba(99, 102, 241, 0.2);
        position: relative;
        overflow: hidden;
    }

    .price-section-detail::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
    }

    .price-label-detail {
        font-size: 0.875rem;
        color: var(--text-muted);
        margin-bottom: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .price-value-detail {
        font-size: 3.5rem;
        font-weight: 900;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
        line-height: 1;
        letter-spacing: -2px;
        filter: drop-shadow(0 0 12px var(--glow-primary));
    }

    .price-installment {
        font-size: 1.1rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .quick-specs {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-bottom: 36px;
    }

    .spec-box {
        display: flex;
        gap: 14px;
        padding: 20px;
        background: var(--bg-elevated);
        border-radius: 14px;
        border: 2px solid var(--border-medium);
        transition: all 0.3s;
    }

    .spec-box:hover {
        border-color: var(--primary);
        box-shadow: 0 0 20px var(--glow-primary);
        transform: translateY(-4px);
    }

    .spec-box svg {
        color: var(--primary);
        flex-shrink: 0;
        filter: drop-shadow(0 0 8px var(--glow-primary));
    }

    .spec-label {
        font-size: 0.75rem;
        color: var(--text-muted);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .spec-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-primary);
    }

    .cta-buttons {
        display: flex;
        gap: 14px;
    }

    .btn-whatsapp,
    .btn-contact {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 18px 28px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        border: none;
    }

    .btn-whatsapp {
        background: linear-gradient(135deg, #25D366 0%, #20BA5A 100%);
        color: #ffffff;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
    }

    .btn-whatsapp:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 32px rgba(37, 211, 102, 0.5);
    }

    .btn-contact {
        background: var(--bg-elevated);
        color: var(--text-primary);
        border: 2px solid var(--border-medium);
    }

    .btn-contact:hover {
        background: var(--bg-hover);
        border-color: var(--primary);
        transform: translateY(-4px);
        box-shadow: 0 0 20px var(--glow-primary);
    }

    .description-section,
    .additional-info {
        background: var(--bg-card);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 32px var(--shadow-lg);
        margin-bottom: 36px;
        border: 2px solid var(--border-subtle);
    }

    .section-title-detail {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 28px;
        letter-spacing: -1px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-title-detail::before {
        content: '';
        width: 4px;
        height: 36px;
        background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 4px;
        box-shadow: 0 0 12px var(--glow-primary);
    }

    .description-content {
        font-size: 1.15rem;
        line-height: 1.8;
        color: var(--text-secondary);
        font-weight: 400;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        background: var(--bg-elevated);
        border-radius: 12px;
        border: 2px solid var(--border-medium);
        transition: all 0.3s;
    }

    .info-item:hover {
        border-color: var(--primary);
        box-shadow: 0 0 16px var(--glow-primary);
        transform: translateY(-2px);
    }

    .info-label {
        font-weight: 600;
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    .info-value {
        font-weight: 700;
        color: var(--text-primary);
        font-size: 1rem;
    }

    .back-button-container {
        text-align: center;
        margin-top: 48px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 16px 32px;
        background: var(--bg-elevated);
        color: var(--text-secondary);
        text-decoration: none;
        border-radius: 12px;
        font-weight: 700;
        transition: all 0.3s;
        border: 2px solid var(--border-medium);
        font-size: 1rem;
    }

    .btn-back:hover {
        background: var(--bg-hover);
        color: var(--text-primary);
        border-color: var(--primary);
        transform: translateX(-6px);
        box-shadow: 0 0 20px var(--glow-primary);
    }

    .btn-back svg {
        transition: transform 0.3s;
    }

    .btn-back:hover svg {
        transform: translateX(-4px);
    }

    @media (max-width: 1200px) {
        .details-grid {
            grid-template-columns: 1fr;
            gap: 36px;
        }

        .images-section {
            position: relative;
            top: 0;
        }
    }

    @media (max-width: 768px) {
        .vehicle-title-detail {
            font-size: 2.2rem;
        }

        .price-value-detail {
            font-size: 2.5rem;
        }

        .quick-specs {
            grid-template-columns: 1fr;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .main-image {
            height: 380px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .info-section,
        .description-section,
        .additional-info {
            padding: 28px;
        }
    }

    @media (max-width: 480px) {
        .vehicle-title-detail {
            font-size: 1.8rem;
        }

        .price-value-detail {
            font-size: 2rem;
        }

        .main-image {
            height: 300px;
        }
    }
</style>
@endsection

@section('scripts')
    <script>
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function () {
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                mainImage.src = this.querySelector('img').src;
            });
        });
    </script>
@endsection
