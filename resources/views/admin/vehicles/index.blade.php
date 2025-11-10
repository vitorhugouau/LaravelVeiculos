@extends('layouts.admin')

@section('title', 'Veículos - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Gestão de Veículos</h1>
    <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Novo Veículo
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($vehicles->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Marca/Modelo</th>
                            <th>Cor</th>
                            <th>Ano</th>
                            <th>Quilometragem</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicles as $vehicle)
                            <tr>
                                <td>
                                    <img src="{{ $vehicle->photo }}" alt="{{ $vehicle->brand->name }} {{ $vehicle->model->name }}" 
                                         class="img-thumbnail" style="width: 100px; height: 75px; object-fit: cover;">
                                </td>
                                <td>
                                    <strong>{{ $vehicle->brand->name }}</strong><br>
                                    <small class="text-muted">{{ $vehicle->model->name }}</small>
                                </td>
                                <td>{{ $vehicle->color->colors }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>{{ number_format($vehicle->mileage, 0, ',', '.') }} km</td>
                                <td><strong>R$ {{ number_format($vehicle->price, 2, ',', '.') }}</strong></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-warning">
                                            Editar
                                        </a>
                                        <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Tem certeza que deseja excluir este veículo?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $vehicles->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted">Nenhum veículo cadastrado ainda.</p>
                <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary">Adicionar Primeiro Veículo</a>
            </div>
        @endif
    </div>
</div>
@endsection