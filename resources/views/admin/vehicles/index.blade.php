@extends('layouts.admin')

@section('title', 'Veículos - Admin')

@section('hero')
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-car"></i> Gestão de Veículos
            </h1>
            <p class="hero-subtitle">Gerencie todos os veículos cadastrados no sistema</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-header">
        <h2 class="page-title">
            <i class="fas fa-list"></i> Lista de Veículos
        </h2>
        <a href="{{ route('admin.vehicles.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Novo Veículo
        </a>
    </div>

    <div class="admin-card">
        <div class="card-body">
            @if($vehicles->count() > 0)
                <div class="table-wrapper">
                    <table class="admin-table">
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
                                        <div class="table-image">
                                            <img src="{{ $vehicle->photo }}" alt="{{ $vehicle->brand->name }} {{ $vehicle->model->name }}">
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $vehicle->brand->name }}</strong><br>
                                        <span class="text-muted">{{ $vehicle->model->name }}</span>
                                    </td>
                                    <td>{{ $vehicle->color->colors }}</td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td>{{ number_format($vehicle->mileage, 0, ',', '.') }} km</td>
                                    <td><strong>R$ {{ number_format($vehicle->price, 2, ',', '.') }}</strong></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn-warning">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" class="inline-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-danger"
                                                        onclick="return confirm('Tem certeza que deseja excluir este veículo?')">
                                                    <i class="fas fa-trash"></i> Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- <div class="pagination-wrapper">
                    {{ $vehicles->links() }}
                </div> -->
            @else
                <div class="empty-state">
                    <i class="fas fa-car"></i>
                    <h3>Nenhum veículo cadastrado</h3>
                    <p>Comece adicionando seu primeiro veículo ao sistema</p>
                    <a href="{{ route('admin.vehicles.create') }}" class="btn-primary">
                        <i class="fas fa-plus"></i> Adicionar Primeiro Veículo
                    </a>
                </div>
            @endif
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
        padding: 32px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    .admin-table thead {
        background: var(--bg-elevated);
    }

    .admin-table th {
        padding: 16px 20px;
        text-align: left;
        font-weight: 700;
        color: var(--text-primary);
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--border-medium);
    }

    .admin-table td {
        padding: 20px;
        border-bottom: 1px solid var(--border-subtle);
        color: var(--text-secondary);
    }

    .admin-table tbody tr {
        transition: all 0.3s;
    }

    .admin-table tbody tr:hover {
        background: var(--bg-elevated);
    }

    .table-image {
        width: 100px;
        height: 75px;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid var(--border-medium);
    }

    .table-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .inline-form {
        display: inline;
    }

    .btn-primary,
    .btn-warning,
    .btn-danger {
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
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

    .btn-warning {
        background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
        color: #ffffff;
        box-shadow: 0 4px 16px rgba(245, 158, 11, 0.3);
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(245, 158, 11, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
        color: #ffffff;
        box-shadow: 0 4px 16px rgba(239, 68, 68, 0.3);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(239, 68, 68, 0.4);
    }

    .pagination-wrapper {
        margin-top: 32px;
        display: flex;
        justify-content: center;
    }

    .pagination-wrapper .pagination {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination-wrapper .pagination li {
        display: inline-block;
    }

    .pagination-wrapper .pagination a,
    .pagination-wrapper .pagination span {
        padding: 12px 18px;
        background: var(--bg-elevated);
        color: var(--text-primary);
        text-decoration: none;
        border-radius: 10px;
        border: 2px solid var(--border-medium);
        transition: all 0.3s;
        display: inline-block;
    }

    .pagination-wrapper .pagination a:hover {
        background: var(--bg-hover);
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    .pagination-wrapper .pagination .active span {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-color: var(--primary);
        color: #ffffff;
        box-shadow: 0 4px 16px var(--glow-primary);
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 5rem;
        color: var(--primary);
        margin-bottom: 24px;
        opacity: 0.2;
        filter: drop-shadow(0 0 20px var(--glow-primary));
    }

    .empty-state h3 {
        font-size: 1.75rem;
        color: var(--text-primary);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .empty-state p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        margin-bottom: 24px;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .admin-table {
            font-size: 0.875rem;
        }

        .admin-table th,
        .admin-table td {
            padding: 12px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection
