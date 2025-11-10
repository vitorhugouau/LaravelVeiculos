@extends('layouts.admin')

@section('title', 'Nova Cor - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Nova Cor</h1>
    <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.colors.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="colors" class="form-label">Nome da Cor *</label>
                <input type="text" class="form-control @error('colors') is-invalid @enderror" 
                       id="colors" name="colors" value="{{ old('colors') }}" 
                       placeholder="Ex: Branco, Preto, Vermelho..." required>
                @error('colors')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar Cor</button>
            </div>
        </form>
    </div>
</div>
@endsection
