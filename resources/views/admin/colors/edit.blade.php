@extends('layouts.admin')

@section('title', 'Editar Cor - Admin')

@section('hero')
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-edit"></i> Editar Cor
            </h1>
            <p class="hero-subtitle">Atualize as informações da cor</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-header">
        <h2 class="page-title">
            <i class="fas fa-palette"></i> Editar Cor
        </h2>
        <a href="{{ route('admin.colors.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="admin-card">
        <div class="card-body">
            <form action="{{ route('admin.colors.update', $color->id) }}" method="POST" class="admin-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="colors" class="form-label">
                        <i class="fas fa-palette"></i> Nome da Cor *
                    </label>
                    <input type="text" 
                           class="form-input @error('colors') error @enderror" 
                           id="colors" 
                           name="colors" 
                           value="{{ old('colors', $color->colors) }}" 
                           placeholder="Ex: Branco, Preto, Vermelho..." 
                           required>
                    @error('colors')
                        <div class="form-error">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.colors.index') }}" class="btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Atualizar Cor
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
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 28px;
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

    .form-error {
        margin-top: 8px;
        color: var(--danger);
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 6px;
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
