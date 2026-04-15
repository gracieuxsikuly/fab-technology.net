<nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="{{ route('home') }}" class="active">{{ __('app.home') }}</a></li>
      <li><a href="{{ route('home') }}#about">{{ __('app.about_us') }}</a></li>
      <li><a href="{{ route('home') }}#services">{{ __('app.our_services') }}</a></li>
      <li><a href="{{ route('home') }}#portfolio">{{ __('app.our_gallery') }}</a></li>
      <li><a href="{{ route('home') }}#team">{{ __('app.our_team') }}</a></li>
      <li><a href="{{ route('home') }}#contact">{{ __('app.contact_us') }}</a></li>
      <li class="dropdown">
        <a href="#"><i class="bi bi-globe"></i> {{ app()->getLocale() == 'fr' ? 'FR' : 'EN' }}</a>
        <ul>
          <li><a href="{{ url('langue/fr') }}">🇫🇷 {{ __('app.french') }}</a></li>
          <li><a href="{{ url('langue/en') }}">🇬🇧 {{ __('app.english') }}</a></li>
        </ul>
      </li>
      <li><a href="{{ route('login') }}" class="login-btn"><i class="bi bi-box-arrow-in-right"></i>&nbsp;&nbsp; {{ app()->getLocale() == 'fr' ? 'Connexion' : 'Login' }}</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>
