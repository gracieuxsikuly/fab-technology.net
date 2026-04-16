@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-gear"></i> Paramètres du Site
                    </h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Logo et Favicon -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="bi bi-image"></i> Logos et Iconographie</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Logo actuel</label>
                                        @if($setting->logo)
                                        <div class="mb-2">
                                            <img src="{{ asset($setting->logo) }}" alt="Logo" style="max-height: 60px; max-width: 200px;">
                                        </div>
                                        @else
                                        <p class="text-muted">Aucun logo défini</p>
                                        @endif
                                        <label for="logo" class="form-label">Remplacer le logo</label>
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*">
                                        <small class="form-text text-muted">Max 2 MB</small>
                                        @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Favicon actuel</label>
                                        @if($setting->favicon)
                                        <div class="mb-2">
                                            <img src="{{ asset($setting->favicon) }}" alt="Favicon" style="max-height: 50px;">
                                        </div>
                                        @else
                                        <p class="text-muted">Aucun favicon défini</p>
                                        @endif
                                        <label for="favicon" class="form-label">Remplacer le favicon</label>
                                        <input type="file" class="form-control @error('favicon') is-invalid @enderror" id="favicon" name="favicon" accept="image/*">
                                        <small class="form-text text-muted">Max 1 MB</small>
                                        @error('favicon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations Générales -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="bi bi-info-circle"></i> Informations Générales</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="site_name" class="form-label">Nom du site <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name) }}" required>
                                    @error('site_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="site_description" class="form-label">Description du site</label>
                                    <textarea class="form-control @error('site_description') is-invalid @enderror" id="site_description" name="site_description" rows="4">{{ old('site_description', $setting->site_description) }}</textarea>
                                    @error('site_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="bi bi-telephone"></i> Contact</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $setting->email) }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Téléphone</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $setting->phone) }}">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SEO -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="bi bi-search"></i> SEO & Métadonnées</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="metadata_description" class="form-label">Description (Meta)</label>
                                    <textarea class="form-control @error('metadata_description') is-invalid @enderror" id="metadata_description" name="metadata_description" rows="3" maxlength="160">{{ old('metadata_description', $setting->metadata_description) }}</textarea>
                                    <small class="form-text text-muted">Recommandé: 120-160 caractères</small>
                                    @error('metadata_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="metadata_keywords" class="form-label">Mots-clés (Meta)</label>
                                    <textarea class="form-control @error('metadata_keywords') is-invalid @enderror" id="metadata_keywords" name="metadata_keywords" rows="3">{{ old('metadata_keywords', $setting->metadata_keywords) }}</textarea>
                                    <small class="form-text text-muted">Séparez les mots-clés par des virgules</small>
                                    @error('metadata_keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle"></i> Sauvegarder les paramètres
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
