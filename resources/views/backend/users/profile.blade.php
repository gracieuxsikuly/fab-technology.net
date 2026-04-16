@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-person-circle"></i> Mon Profil
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

                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-person-circle" style="font-size: 80px; color: #1976d2;"></i>
                            </div>
                            <h6 class="text-muted">{{ $user->email }}</h6>
                        </div>
                        <div class="col-md-8">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <strong>Nom:</strong> {{ $user->name }}
                                </div>
                                <div class="list-group-item">
                                    <strong>Email:</strong> {{ $user->email }}
                                </div>
                                <div class="list-group-item">
                                    <strong>Inscription:</strong> {{ $user->created_at->format('d/m/Y à H:i') }}
                                </div>
                                <div class="list-group-item">
                                    <strong>Dernier accès:</strong> {{ $user->updated_at->format('d/m/Y à H:i') }}
                                </div>
                                <div class="list-group-item">
                                    <strong>Statut:</strong> 
                                    @if($user->email_verified_at)
                                    <span class="badge bg-success">Vérifié</span>
                                    @else
                                    <span class="badge bg-warning">Non vérifié</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h6 class="mb-3"><i class="bi bi-pencil"></i> Modifier le profil</h6>

                    <form action="{{ route('admin.users.updateProfile') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Mettre à jour le profil
                            </button>
                            <a href="{{ route('settings.password') }}" class="btn btn-secondary">
                                <i class="bi bi-key"></i> Changer le mot de passe
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
