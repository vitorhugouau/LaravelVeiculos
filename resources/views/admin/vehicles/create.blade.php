@extends('layouts.admin')

@section('title', 'Novo Veículo - Admin')

@section('hero')
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-plus-circle"></i> Novo Veículo
            </h1>
            <p class="hero-subtitle">Adicione um novo veículo ao sistema</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-header">
        <h2 class="page-title">
            <i class="fas fa-car"></i> Cadastrar Veículo
        </h2>
        <a href="{{ route('admin.vehicles.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="admin-card">
        <div class="card-body">
            <form action="{{ route('admin.vehicles.store') }}" method="POST" class="admin-form">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="photo" class="form-label">
                            <i class="fas fa-image"></i> URL da Foto *
                        </label>
                        <input type="url" 
                               class="form-input @error('photo') error @enderror" 
                               id="photo" 
                               name="photo" 
                               value="{{ old('photo') }}" 
                               placeholder="https://exemplo.com/imagem.jpg" 
                               required>
                        @error('photo')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                        <small class="form-hint">Cole a URL completa da imagem</small>
                    </div>

                    <div class="form-group">
                        <label for="brand_id" class="form-label">
                            <i class="fas fa-tag"></i> Marca *
                        </label>
                        <select class="form-select @error('brand_id') error @enderror" 
                                id="brand_id" 
                                name="brand_id" 
                                required>
                            <option value="">Selecione uma marca</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="model_id" class="form-label">
                            <i class="fas fa-list"></i> Modelo *
                        </label>
                        <select class="form-select @error('model_id') error @enderror" 
                                id="model_id" 
                                name="model_id" 
                                required>
                            <option value="">Selecione um modelo</option>
                            @foreach($models as $model)
                                <option value="{{ $model->id }}" 
                                        data-brand="{{ $model->brand_id }}"
                                        {{ old('model_id') == $model->id ? 'selected' : '' }}>
                                    {{ $model->brand->name }} - {{ $model->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('model_id')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="color_id" class="form-label">
                            <i class="fas fa-palette"></i> Cor *
                        </label>
                        <select class="form-select @error('color_id') error @enderror" 
                                id="color_id" 
                                name="color_id" 
                                required>
                            <option value="">Selecione uma cor</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" {{ old('color_id') == $color->id ? 'selected' : '' }}>
                                    {{ $color->colors }}
                                </option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="year" class="form-label">
                            <i class="fas fa-calendar"></i> Ano *
                        </label>
                        <input type="number" 
                               class="form-input @error('year') error @enderror" 
                               id="year" 
                               name="year" 
                               value="{{ old('year') }}" 
                               min="1900" 
                               max="{{ date('Y') + 1 }}" 
                               required>
                        @error('year')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mileage" class="form-label">
                            <i class="fas fa-tachometer-alt"></i> Quilometragem (km) *
                        </label>
                        <input type="number" 
                               class="form-input @error('mileage') error @enderror" 
                               id="mileage" 
                               name="mileage" 
                               value="{{ old('mileage') }}" 
                               min="0" 
                               required>
                        @error('mileage')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">
                            <i class="fas fa-dollar-sign"></i> Preço (R$) *
                        </label>
                        <input type="number" 
                               class="form-input @error('price') error @enderror" 
                               id="price" 
                               name="price" 
                               value="{{ old('price') }}" 
                               step="0.01" 
                               min="0" 
                               required>
                        @error('price')
                            <div class="form-error">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">
                        <i class="fas fa-align-left"></i> Descrição *
                    </label>
                    <textarea class="form-textarea @error('description') error @enderror" 
                              id="description" 
                              name="description" 
                              rows="4" 
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.vehicles.index') }}" class="btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Salvar Veículo
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 32px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0;
    }

    .page-title i {
        color: var(--primary);
        filter: drop-shadow(0 0 12px var(--glow-primary));
    }

    .admin-card {
        background: var(--bg-card);
        border: 2px solid var(--border-subtle);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px var(--shadow-lg);
    }

    .card-body {
        padding: 40px;
    }

    .admin-form {
        max-width: 1000px;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
        margin-bottom: 28px;
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: var(--primary);
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 14px 18px;
        background: var(--bg-elevated);
        border: 2px solid var(--border-medium);
        border-radius: 12px;
        color: var(--text-primary);
        font-size: 1rem;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--glow-primary);
        background: var(--bg-hover);
    }

    .form-input.error,
    .form-select.error,
    .form-textarea.error {
        border-color: var(--danger);
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2);
    }

    .form-input::placeholder {
        color: var(--text-muted);
    }

    .form-select option {
        background: var(--bg-elevated);
        color: var(--text-primary);
    }

    .form-hint {
        display: block;
        margin-top: 8px;
        font-size: 0.875rem;
        color: var(--text-muted);
    }

    .form-error {
        margin-top: 8px;
        color: var(--danger);
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 16px;
        margin-top: 32px;
        padding-top: 32px;
        border-top: 2px solid var(--border-subtle);
    }

    .btn-primary,
    .btn-secondary {
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: #ffffff;
        box-shadow: 0 4px 16px var(--glow-primary);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 24px var(--glow-primary);
    }

    .btn-secondary {
        background: var(--bg-elevated);
        color: var(--text-secondary);
        border: 2px solid var(--border-medium);
    }

    .btn-secondary:hover {
        background: var(--bg-hover);
        color: var(--text-primary);
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-body {
            padding: 28px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Filtrar modelos baseado na marca selecionada
    document.getElementById('brand_id').addEventListener('change', function() {
        const brandId = this.value;
        const modelSelect = document.getElementById('model_id');
        const options = modelSelect.querySelectorAll('option');

        options.forEach(option => {
            if (option.value === '') {
                option.style.display = 'block';
            } else {
                const optionBrandId = option.getAttribute('data-brand');
                if (optionBrandId === brandId) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                    if (option.selected) {
                        option.selected = false;
                    }
                }
            }
        });
    });
</script>
@endsection
