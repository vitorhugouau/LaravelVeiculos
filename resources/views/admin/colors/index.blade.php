@extends('layouts.admin')

@section('title', 'Cores - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Gestão de Cores</h1>
    <a href="{{ route('admin.colors.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nova Cor
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($colors->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cor</th>
                            <th>Veículos</th>
                            <th>Data de Criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $color)
                            <tr>
                                <td>{{ $color->id }}</td>
                                <td><strong>{{ $color->colors }}</strong></td>
                                <td>
                                    <span class="badge bg-primary">{{ $color->vehicles_count }}</span>
                                </td>
                                <td>{{ $color->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.colors.edit', $color->id) }}" class="btn btn-sm btn-warning">
                                            Editar
                                        </a>
                                        <form action="{{ route('admin.colors.destroy', $color->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Tem certeza que deseja excluir esta cor?')">
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
                <p class="text-muted">Nenhuma cor cadastrada ainda.</p>
                <a href="{{ route('admin.colors.create') }}" class="btn btn-primary">Adicionar Primeira Cor</a>
            </div>
        @endif
    </div>
</div>
@endsection
