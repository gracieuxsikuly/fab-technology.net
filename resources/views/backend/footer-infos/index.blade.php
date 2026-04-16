@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">
                    <i class="bi bi-info-circle"></i> Gestion du Pied de Page
                </h1>
                <a href="{{ route('admin.footer-infos.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Ajouter une Info
                </a>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if($footerInfos->isEmpty())
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Aucune information de pied de page. 
                <a href="{{ route('admin.footer-infos.create') }}">Ajouter une information</a>
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Adresse/Description</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Ordre</th>
                            <th>Statut</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($footerInfos as $info)
                        <tr>
                            <td>{{ Str::limit($info->address ?? $info->description, 40) }}</td>
                            <td>{{ $info->email ?? '-' }}</td>
                            <td>{{ $info->phone ?? '-' }}</td>
                            <td><span class="badge bg-secondary">{{ $info->order }}</span></td>
                            <td>
                                @if($info->is_active)
                                <span class="badge bg-success"><i class="bi bi-check-circle"></i> Actif</span>
                                @else
                                <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Inactif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.footer-infos.edit', $info) }}" class="btn btn-sm btn-primary" title="Éditer">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.footer-infos.destroy', $info) }}" method="POST" style="display:inline;">
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
