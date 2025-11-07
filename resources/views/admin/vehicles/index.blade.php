@extends('layouts.app')

@section('content')
    <h1>Gestão de Veículos</h1>
    <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary">Adicionar Novo Veículo</a>
    <div class="vehicle-list">
        @foreach($vehicles as $vehicle)
            <div class="vehicle">
                <h3>{{ $vehicle->brand->name }} {{ $vehicle->model->name }}</h3>
                <p>Ano: {{ $vehicle->year }}</p>
                <p>Quilometragem: {{ $vehicle->mileage }} km</p>
                <p>Valor: R$ {{ number_format($vehicle->price, 2, ',', '.') }}</p>
                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection