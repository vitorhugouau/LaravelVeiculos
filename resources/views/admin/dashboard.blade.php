@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('hero')
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-chart-line"></i> Dashboard Administrativo
            </h1>
            <p class="hero-subtitle">Gerencie veículos, marcas, modelos e cores do sistema</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
                <i class="fas fa-car"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Veículos</div>
                <div class="stat-value">{{ $stats['vehicles'] }}</div>
                <a href="{{ route('admin.vehicles.index') }}" class="stat-link">
                    Ver todos <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, var(--success) 0%, #059669 100%);">
                <i class="fas fa-tag"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Marcas</div>
                <div class="stat-value">{{ $stats['brands'] }}</div>
                <a href="{{ route('admin.brands.index') }}" class="stat-link">
                    Ver todas <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary) 100%);">
                <i class="fas fa-list"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Modelos</div>
                <div class="stat-value">{{ $stats['models'] }}</div>
                <a href="{{ route('admin.models.index') }}" class="stat-link">
                    Ver todos <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);">
                <i class="fas fa-palette"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Cores</div>
                <div class="stat-value">{{ $stats['colors'] }}</div>
                <a href="{{ route('admin.colors.index') }}" class="stat-link">
                    Ver todas <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Vehicles -->
    <div class="admin-card">
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-clock"></i> Veículos Recentes
            </h2>
            <a href="{{ route('admin.vehicles.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i> Novo Veículo
            </a>
        </div>
        <div class="card-body">
            @if($recentVehicles->count() > 0)
                <div class="table-wrapper">
                    <table class="admin-table">
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
                                        <div class="table-image">
                                            <img src="{{ $vehicle->photo }}" alt="{{ $vehicle->brand->name }} {{ $vehicle->model->name }}">
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $vehicle->brand->name }}</strong><br>
                                        <span class="text-muted">{{ $vehicle->model->name }}</span>
                                    </td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td><strong>R$ {{ number_format($vehicle->price, 2, ',', '.') }}</strong></td>
                                    <td>{{ $vehicle->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn-warning">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-car"></i>
                    <h3>Nenhum veículo cadastrado</h3>
                    <p>Comece adicionando seu primeiro veículo ao sistema</p>
                    <a href="{{ route('admin.vehicles.create') }}" class="btn-primary">
                        <i class="fas fa-plus"></i> Adicionar Veículo
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: var(--bg-card);
        border: 2px solid var(--border-subtle);
        border-radius: 20px;
        padding: 28px;
        display: flex;
        gap: 20px;
        align-items: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 4px 16px var(--shadow-md);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        opacity: 0;
        transition: opacity 0.4s;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px var(--shadow-lg);
        border-color: var(--primary);
    }

    .stat-card:hover::before {
        opacity: 1;
        box-shadow: 0 0 20px var(--glow-primary);
    }

    .stat-icon {
        width: 80px;
        height: 80px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .stat-icon i {
        font-size: 2rem;
        color: #ffffff;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
    }

    .stat-content {
        flex: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--text-muted);
        margin-bottom: 8px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--text-primary);
        margin-bottom: 12px;
        line-height: 1;
        letter-spacing: -2px;
    }

    .stat-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s;
    }

    .stat-link:hover {
        color: var(--primary-light);
        gap: 10px;
    }

    .admin-card {
        background: var(--bg-card);
        border: 2px solid var(--border-subtle);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px var(--shadow-lg);
    }

    .card-header {
        padding: 28px 32px;
        border-bottom: 2px solid var(--border-subtle);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
    }

    .card-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0;
    }

    .card-title i {
        color: var(--accent);
        filter: drop-shadow(0 0 12px var(--glow-accent));
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
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .card-header {
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
    }
</style>
@endsection
