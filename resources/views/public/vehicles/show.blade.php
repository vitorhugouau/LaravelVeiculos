@extends('layouts.vehicles')

@section('title', $vehicle->brand->name . ' ' . $vehicle->model->name . ' - AutoVendas')

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
            background: #f8fafc;
            padding: 32px 0 64px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
            font-size: 0.875rem;
        }

        .breadcrumb a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb a:hover {
            color: #3b82f6;
        }

        .breadcrumb span:not(:last-child) {
            color: #cbd5e1;
        }

        .breadcrumb span:last-child {
            color: #1e293b;
            font-weight: 600;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
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
            height: 500px;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
        }

        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .favorite-btn-large {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.95);
            border: none;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .favorite-btn-large:hover {
            background: #ffffff;
            transform: scale(1.1);
        }

        .favorite-btn-large svg {
            color: #64748b;
        }

        .favorite-btn-large:hover svg {
            color: #ef4444;
        }

        .thumbnail-gallery {
            display: flex;
            gap: 12px;
            overflow-x: auto;
        }

        .thumbnail {
            flex-shrink: 0;
            width: 100px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.2s;
        }

        .thumbnail.active {
            border-color: #3b82f6;
        }

        .thumbnail:hover {
            border-color: #93c5fd;
        }

        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info-section {
            background: #ffffff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .vehicle-badge-detail {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: #ffffff;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
        }

        .vehicle-title-detail {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .vehicle-subtitle {
            font-size: 1.125rem;
            color: #64748b;
            margin-bottom: 32px;
        }

        .price-section-detail {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 32px;
            border: 1px solid #e2e8f0;
        }

        .price-label-detail {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .price-value-detail {
            font-size: 3rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 4px;
            line-height: 1;
        }

        .price-installment {
            font-size: 1rem;
            color: #64748b;
        }

        .quick-specs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 32px;
        }

        .spec-box {
            display: flex;
            gap: 12px;
            padding: 16px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .spec-box svg {
            color: #3b82f6;
            flex-shrink: 0;
        }

        .spec-label {
            font-size: 0.75rem;
            color: #64748b;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .spec-value {
            font-size: 1rem;
            font-weight: 700;
            color: #1e293b;
        }

        .cta-buttons {
            display: flex;
            gap: 12px;
        }

        .btn-whatsapp,
        .btn-contact {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 16px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            border: none;
        }

        .btn-whatsapp {
            background: #25D366;
            color: #ffffff;
        }

        .btn-whatsapp:hover {
            background: #20BA5A;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
        }

        .btn-contact {
            background: #f1f5f9;
            color: #1e293b;
        }

        .btn-contact:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .description-section,
        .additional-info {
            background: #ffffff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 32px;
        }

        .section-title-detail {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 24px;
        }

        .description-content {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #475569;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .info-label {
            font-weight: 600;
            color: #64748b;
        }

        .info-value {
            font-weight: 700;
            color: #1e293b;
        }

        .back-button-container {
            text-align: center;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #f1f5f9;
            color: #475569;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: #1e293b;
            transform: translateX(-4px);
        }

        @media (max-width: 1024px) {
            .details-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .images-section {
                position: relative;
                top: 0;
            }

            .quick-specs {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .vehicle-title-detail {
                font-size: 2rem;
            }

            .price-value-detail {
                font-size: 2.25rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .main-image {
                height: 350px;
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