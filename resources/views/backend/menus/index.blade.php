@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">
                    <i class="bi bi-list"></i> Gestion des Menus
                </h1>
                <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Ajouter un Menu
                </a>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if($menus->isEmpty())
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Aucun menu trouvé. 
                <a href="{{ route('admin.menus.create') }}">Créer le premier menu</a>
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th><i class="bi bi-translate"></i> Français</th>
                            <th><i class="bi bi-translate"></i> English</th>
                            <th>Ordre</th>
                            <th>Statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td>
                                <strong>Nom:</strong> {{ $menu->name }}<br>
                                <small class="text-muted"><code>{{ $menu->url }}</code></small>
                            </td>
                            <td>
                                @if($menu->name_en && $menu->url_en)
                                <strong>{{ $menu->name_en }}</strong><br>
                                <small class="text-muted"><code>{{ $menu->url_en }}</code></small>
                                @else
                                <small class="text-warning"><i class="bi bi-exclamation-triangle"></i> Non traduit</small>
                                @endif
                            </td>
                            <td><span class="badge bg-secondary">{{ $menu->order }}</span></td>
                            <td>
                                @if($menu->is_active)
                                <span class="badge bg-success"><i class="bi bi-check-circle"></i> Actif</span>
                                @else
                                <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Inactif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-primary" title="Éditer">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
