<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? __('app.dashboard') }} - Fab-Technology</title>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        :root { --sidebar-width: 260px; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; }
        #sidebar { width: var(--sidebar-width); min-height: 100vh; background: #1e293b; position: fixed; top: 0; left: 0; z-index: 1040; transition: transform .3s ease; }
        #sidebar .sidebar-header { padding: 1.25rem 1rem; border-bottom: 1px solid rgba(255,255,255,.1); }
        #sidebar .sidebar-header img { height: 36px; }
        #sidebar .sidebar-header h5 { color: #fff; font-size: .95rem; margin: 0; }
        #sidebar .nav-link { color: rgba(255,255,255,.7); padding: .6rem 1rem; font-size: .875rem; border-radius: .375rem; margin: 2px 8px; transition: all .2s; }
        #sidebar .nav-link:hover, #sidebar .nav-link.active { background: rgba(255,255,255,.1); color: #fff; }
        #sidebar .nav-link i { width: 20px; text-align: center; margin-right: .6rem; font-size: 1rem; }
        #sidebar .sidebar-section { color: rgba(255,255,255,.4); font-size: .7rem; text-transform: uppercase; letter-spacing: .08em; padding: .75rem 1rem .35rem; font-weight: 600; }
        #content-wrapper { margin-left: var(--sidebar-width); min-height: 100vh; }
        .top-navbar { background: #fff; border-bottom: 1px solid #e2e8f0; padding: .6rem 1.5rem; }
        .top-navbar .btn-toggle-sidebar { display: none; }
        .stat-card { border: none; border-radius: .75rem; box-shadow: 0 1px 3px rgba(0,0,0,.08); transition: transform .2s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,.12); }
        @media (max-width: 991.98px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.show { transform: translateX(0); }
            #content-wrapper { margin-left: 0; }
            .top-navbar .btn-toggle-sidebar { display: inline-flex; }
            .sidebar-backdrop { position: fixed; inset: 0; background: rgba(0,0,0,.5); z-index: 1035; display: none; }
            .sidebar-backdrop.show { display: block; }
        }
    </style>
    @livewireStyles
</head>
<body>
    <!-- Sidebar Backdrop (mobile) -->
    <div class="sidebar-backdrop" id="sidebarBackdrop" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center gap-2">
            <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo">
            <h5>Fab-Technology</h5>
            <button class="btn btn-sm btn-link text-white ms-auto d-lg-none" onclick="toggleSidebar()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="py-2">
            <div class="sidebar-section">{{ __('app.dashboard') }}</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i> {{ __('app.dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        <i class="bi bi-info-circle"></i> {{ __('app.about') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('realisation') ? 'active' : '' }}" href="{{ route('realisation') }}">
                        <i class="bi bi-trophy"></i> {{ __('app.realisation') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('vision') ? 'active' : '' }}" href="{{ route('vision') }}">
                        <i class="bi bi-eye"></i> {{ __('app.vision') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('mission') ? 'active' : '' }}" href="{{ route('mission') }}">
                        <i class="bi bi-bullseye"></i> {{ __('app.mission') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projet') ? 'active' : '' }}" href="{{ route('projet') }}">
                        <i class="bi bi-diagram-3"></i> {{ __('app.projet') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">
                        <i class="bi bi-wrench-adjustable"></i> {{ __('app.services') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                        <i class="bi bi-images"></i> {{ __('app.gallery') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('equipe') ? 'active' : '' }}" href="{{ route('equipe') }}">
                        <i class="bi bi-people"></i> {{ __('app.equipe') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('faqs') ? 'active' : '' }}" href="{{ route('faqs') }}">
                        <i class="bi bi-question-circle"></i> {{ __('app.faqs') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('competencedomaine') ? 'active' : '' }}" href="{{ route('competencedomaine') }}">
                        <i class="bi bi-pc-display"></i> {{ __('app.competencedomaine') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('message') ? 'active' : '' }}" href="{{ route('message') }}">
                        <i class="bi bi-envelope"></i> {{ __('app.message') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt-auto border-top border-secondary p-3" style="position:absolute;bottom:0;width:100%;">
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px;height:36px;font-size:.8rem;">
                    {{ auth()->user()->initials() }}
                </div>
                <div>
                    <div class="text-white small fw-semibold text-truncate" style="max-width:140px;">{{ auth()->user()->name }}</div>
                    <div class="text-white-50" style="font-size:.75rem;">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div id="content-wrapper">
        <!-- Top Navbar -->
        <nav class="top-navbar d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary btn-toggle-sidebar" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <h6 class="mb-0 text-muted">{{ $title ?? __('app.dashboard') }}</h6>
            </div>
            <div class="d-flex align-items-center gap-3">
                <!-- Language Switcher -->
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-translate"></i> {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item {{ app()->getLocale() == 'fr' ? 'active' : '' }}" href="{{ url('langue/fr') }}">{{ __('app.french') }}</a></li>
                        <li><a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ url('langue/en') }}">{{ __('app.english') }}</a></li>
                    </ul>
                </div>
                <!-- User Menu -->
                <div class="dropdown">
                    <button class="btn btn-sm btn-light dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:.7rem;">
                            {{ auth()->user()->initials() }}
                        </div>
                        <span class="d-none d-md-inline small">{{ auth()->user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('settings.profile') }}"><i class="bi bi-gear me-2"></i>{{ __('app.settings') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>{{ __('app.logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4">
            {{ $slot }}
        </main>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('sidebarBackdrop').classList.toggle('show');
        }
        document.addEventListener('livewire:init', () => {
            Livewire.on('openModal', (params) => {
                const modalEl = document.getElementById(params.modalId || params[0]);
                if (modalEl) new bootstrap.Modal(modalEl).show();
            });
            Livewire.on('closeModal', (params) => {
                const modalEl = document.getElementById(params.modalId || params[0]);
                if (modalEl) {
                    const instance = bootstrap.Modal.getInstance(modalEl);
                    if (instance) instance.hide();
                }
            });
        });
    </script>
</body>
</html>
