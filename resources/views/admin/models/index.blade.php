@extends('layouts.admin')

@section('title', 'Modelos - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Gestão de Modelos</h1>
    <a href="{{ route('admin.models.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Novo Modelo
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($models->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Veículos</th>
                            <th>Data de Criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $model)
                            <tr>
                                <td>{{ $model->id }}</td>
                                <td><strong>{{ $model->name }}</strong></td>
                                <td>{{ $model->brand->name }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $model->vehicles_count }}</span>
                                </td>
                                <td>{{ $model->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.models.edit', $model->id) }}" class="btn btn-sm btn-warning">
                                            Editar
                                        </a>
                                        <form action="{{ route('admin.models.destroy', $model->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Tem certeza que deseja excluir este modelo?')">
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
        @else
            <div class="text-center py-5">
                <p class="text-muted">Nenhum modelo cadastrado ainda.</p>
                <a href="{{ route('admin.models.create') }}" class="btn btn-primary">Adicionar Primeiro Modelo</a>
            </div>
        @endif
    </div>
</div>
@endsection
