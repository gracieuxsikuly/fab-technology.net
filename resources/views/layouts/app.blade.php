<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fab-Technology') }} - Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1976d2;
            --primary-light: #42a5f5;
            --primary-dark: #1565c0;
            --secondary-color: #f5f7fa;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .sidebar {
            background-color: #0d47a1;
            min-height: 100vh;
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
            width: 255px;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            border-left: 3px solid transparent;
            margin-bottom: 5px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--primary-light);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
        }

        .sidebar-header-logo {
            max-height: 35px;
            width: auto;
            margin-right: 10px;
            border-radius: 3px;
            vertical-align: middle;
        }

        .main-content {
            margin-left: 255px;
            padding: 20px;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 20px;
            margin-left: 255px;
        }

        .navbar .navbar-brand {
            color: var(--primary-color);
            font-weight: 600;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .table-primary {
            background-color: var(--secondary-color);
        }

        .badge {
            padding: 5px 10px;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--primary-color);
        }

        .navbar-logo img {
            max-height: 40px;
            width: auto;
            border-radius: 4px;
        }

        .navbar-logo-text {
            font-weight: 600;
            font-size: 18px;
            color: var(--primary-color);
        }

        .navbar-logo-sub {
            font-size: 12px;
            color: #999;
            display: block;
            font-weight: normal;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }

            .main-content,
            .navbar {
                margin-left: 0;
            }

            .navbar {
                margin-bottom: 20px;
            }

            .navbar-logo-text {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar">
        <div class="container-fluid">
            <?php $siteSetting = \App\Models\SiteSetting::getSetting(); ?>
            <a href="{{ route('admin.settings.edit') }}" class="navbar-logo">
                @if($siteSetting->logo)
                    <img src="{{ asset($siteSetting->logo) }}" alt="{{ $siteSetting->site_name }}">
                @else
                    <i class="bi bi-speedometer2" style="font-size: 28px;"></i>
                @endif
                <div>
                    <span class="navbar-logo-text">{{ $siteSetting->site_name ?? 'Fab-Technology' }}</span>
                    <span class="navbar-logo-sub">Administration</span>
                </div>
            </a>
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name ?? 'Admin' }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                    <li><a class="dropdown-item" href="{{ route('admin.users.profile') }}"><i class="bi bi-person"></i> Mon Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo text-center py-4 border-bottom border-secondary">
            @if($siteSetting->logo)
                <img src="{{ asset($siteSetting->logo) }}" alt="{{ $siteSetting->site_name }}" class="sidebar-header-logo">
            @else
                <i class="bi bi-gear" style="font-size: 40px; color: #1976d2;"></i>
            @endif
            <h5 class="text-white mb-0 mt-2"><i class="bi bi-gear"></i> {{ $siteSetting->site_name ?? 'Fab-Technology' }}</h5>
            <small class="text-white-50 d-block mt-1">Gestion du site</small>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">
                <i class="bi bi-gear-fill"></i> Paramètres
            </a>
            <a class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}">
                <i class="bi bi-images"></i> Sliders
            </a>
            <a class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}" href="{{ route('admin.menus.index') }}">
                <i class="bi bi-list-ul"></i> Menus
            </a>
            <a class="nav-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}" href="{{ route('admin.social-links.index') }}">
                <i class="bi bi-share"></i> Réseaux Sociaux
            </a>
            <a class="nav-link {{ request()->routeIs('admin.footer-infos.*') ? 'active' : '' }}" href="{{ route('admin.footer-infos.index') }}">
                <i class="bi bi-info-square"></i> Pied de Page
            </a>
            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="bi bi-people"></i> Utilisateurs
            </a>
            <hr class="my-2 border-light">
            <a class="nav-link" href="{{ route('admin.users.profile') }}">
                <i class="bi bi-person-circle"></i> Mon Profil
            </a>
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="bi bi-globe"></i> Voir le site
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
