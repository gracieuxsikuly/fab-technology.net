@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">
                    <i class="bi bi-images"></i> Gestion des Sliders (Carrousel)
                </h1>
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Ajouter un Slider
                </a>
            </div>

            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Maximum 3 sliders actifs seront affichés sur le site.
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if($sliders->isEmpty())
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle"></i> Aucun slider. 
                <a href="{{ route('admin.sliders.create') }}">Ajouter un slider</a>
            </div>
            @else
            <div class="row g-4">
                @foreach($sliders as $slider)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="{{ asset($slider->image) }}" class="card-img-top" alt="{{ $slider->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $slider->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($slider->description, 80) }}</p>
                            <div class="d-flex gap-2 justify-content-between align-items-center">
                                <span class="badge {{ $slider->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $slider->is_active ? '✓ Actif' : '✗ Inactif' }}
                                </span>
                                <small class="text-muted">Ordre: {{ $slider->order }}</small>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-primary" title="Éditer">
                                <i class="bi bi-pencil-square"></i> Éditer
                            </a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr ?')">
                                    <i class="bi bi-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
