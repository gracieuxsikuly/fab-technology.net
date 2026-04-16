@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">
                    <i class="bi bi-share"></i> Gestion des Liens Sociaux
                </h1>
                <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Ajouter un Lien
                </a>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if($socialLinks->isEmpty())
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Aucun lien social. 
                <a href="{{ route('admin.social-links.create') }}">Ajouter un lien</a>
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Plateforme</th>
                            <th>URL</th>
                            <th>Icône</th>
                            <th>Ordre</th>
                            <th>Statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($socialLinks as $link)
                        <tr>
                            <td>{{ ucfirst($link->platform) }}</td>
                            <td><a href="{{ $link->url }}" target="_blank" class="text-truncate" style="max-width: 300px;">{{ $link->url }}</a></td>
                            <td><i class="bi {{ $link->icon }}"></i> {{ $link->icon }}</td>
                            <td><span class="badge bg-secondary">{{ $link->order }}</span></td>
                            <td>
                                @if($link->is_active)
                                <span class="badge bg-success"><i class="bi bi-check-circle"></i> Actif</span>
                                @else
                                <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Inactif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.social-links.edit', $link) }}" class="btn btn-sm btn-primary" title="Éditer">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" style="display:inline;">
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
