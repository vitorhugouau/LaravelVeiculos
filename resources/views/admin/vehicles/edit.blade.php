@extends('layouts.admin')

@section('title', 'Editar Veículo - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Editar Veículo</h1>
    <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="photo" class="form-label">URL da Foto *</label>
                    <input type="url" class="form-control @error('photo') is-invalid @enderror" 
                           id="photo" name="photo" value="{{ old('photo', $vehicle->photo) }}" required>
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($vehicle->photo)
                        <div class="mt-2">
                            <img src="{{ $vehicle->photo }}" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <label for="brand_id" class="form-label">Marca *</label>
                    <select class="form-select @error('brand_id') is-invalid @enderror" 
                            id="brand_id" name="brand_id" required>
                        <option value="">Selecione uma marca</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" 
                                    {{ old('brand_id', $vehicle->brand_id) == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="model_id" class="form-label">Modelo *</label>
                    <select class="form-select @error('model_id') is-invalid @enderror" 
                            id="model_id" name="model_id" required>
                        <option value="">Selecione um modelo</option>
                        @foreach($models as $model)
                            <option value="{{ $model->id }}" 
                                    data-brand="{{ $model->brand_id }}"
                                    {{ old('model_id', $vehicle->model_id) == $model->id ? 'selected' : '' }}>
                                {{ $model->brand->name }} - {{ $model->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('model_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="color_id" class="form-label">Cor *</label>
                    <select class="form-select @error('color_id') is-invalid @enderror" 
                            id="color_id" name="color_id" required>
                        <option value="">Selecione uma cor</option>
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}" 
                                    {{ old('color_id', $vehicle->color_id) == $color->id ? 'selected' : '' }}>
                                {{ $color->colors }}
                            </option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="year" class="form-label">Ano *</label>
                    <input type="number" class="form-control @error('year') is-invalid @enderror" 
                           id="year" name="year" value="{{ old('year', $vehicle->year) }}" 
                           min="1900" max="{{ date('Y') + 1 }}" required>
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="mileage" class="form-label">Quilometragem (km) *</label>
                    <input type="number" class="form-control @error('mileage') is-invalid @enderror" 
                           id="mileage" name="mileage" value="{{ old('mileage', $vehicle->mileage) }}" 
                           min="0" required>
                    @error('mileage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Preço (R$) *</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                           id="price" name="price" value="{{ old('price', $vehicle->price) }}" 
                           step="0.01" min="0" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="4" required>{{ old('description', $vehicle->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.vehicles.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar Veículo</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Filtrar modelos baseado na marca selecionada
    document.getElementById('brand_id').addEventListener('change', function() {
        const brandId = this.value;
        const modelSelect = document.getElementById('model_id');
        const options = modelSelect.querySelectorAll('option');
        const currentModelId = '{{ old("model_id", $vehicle->model_id) }}';

        options.forEach(option => {
            if (option.value === '') {
                option.style.display = 'block';
            } else {
                const optionBrandId = option.getAttribute('data-brand');
                if (optionBrandId === brandId) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                    if (option.selected && option.value !== currentModelId) {
                        option.selected = false;
                    }
                }
            }
        });
    });

    // Trigger on page load
    document.getElementById('brand_id').dispatchEvent(new Event('change'));
</script>
@endpush
@endsection
