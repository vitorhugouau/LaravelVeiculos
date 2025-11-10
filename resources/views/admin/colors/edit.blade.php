@extends('layouts.admin')

@section('title', 'Editar Cor - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Editar Cor</h1>
    <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.colors.update', $color->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="colors" class="form-label">Nome da Cor *</label>
                <input type="text" class="form-control @error('colors') is-invalid @enderror" 
                       id="colors" name="colors" value="{{ old('colors', $color->colors) }}" 
                       placeholder="Ex: Branco, Preto, Vermelho..." required>
                @error('colors')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar Cor</button>
            </div>
        </form>
    </div>
</div>
@endsection
