@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Dashboard</h1>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-2">Veículos</h6>
                        <h2 class="card-title mb-0">{{ $stats['vehicles'] }}</h2>
                    </div>
                    <div class="fs-1">🚗</div>
                </div>
                <a href="{{ route('admin.vehicles.index') }}" class="text-white text-decoration-none">
                    Ver todos →
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-2">Marcas</h6>
                        <h2 class="card-title mb-0">{{ $stats['brands'] }}</h2>
                    </div>
                    <div class="fs-1">🏷️</div>
                </div>
                <a href="{{ route('admin.brands.index') }}" class="text-white text-decoration-none">
                    Ver todas →
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-2">Modelos</h6>
                        <h2 class="card-title mb-0">{{ $stats['models'] }}</h2>
                    </div>
                    <div class="fs-1">📋</div>
                </div>
                <a href="{{ route('admin.models.index') }}" class="text-white text-decoration-none">
                    Ver todos →
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-2">Cores</h6>
                        <h2 class="card-title mb-0">{{ $stats['colors'] }}</h2>
                    </div>
                    <div class="fs-1">🎨</div>
                </div>
                <a href="{{ route('admin.colors.index') }}" class="text-white text-decoration-none">
                    Ver todas →
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Recent Vehicles -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Veículos Recentes</h5>
        <a href="{{ route('admin.vehicles.create') }}" class="btn btn-sm btn-primary">Novo Veículo</a>
    </div>
    <div class="card-body">
        @if($recentVehicles->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Marca/Modelo</th>
                            <th>Ano</th>
                            <th>Preço</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentVehicles as $vehicle)
                            <tr>
                                <td>
                                    <img src="{{ $vehicle->photo }}" alt="{{ $vehicle->brand->name }} {{ $vehicle->model->name }}" 
                                         class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                                </td>
                                <td>
                                    <strong>{{ $vehicle->brand->name }}</strong><br>
                                    <small class="text-muted">{{ $vehicle->model->name }}</small>
                                </td>
                                <td>{{ $vehicle->year }}</td>
                                <td>R$ {{ number_format($vehicle->price, 2, ',', '.') }}</td>
                                <td>{{ $vehicle->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted text-center">Nenhum veículo cadastrado ainda.</p>
        @endif
    </div>
</div>
@endsection
