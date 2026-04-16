<nav id="navmenu" class="navmenu">
    <ul>
      @foreach($menus as $menu)
      <li><a href="{{ $menu->getDisplayUrl() }}" @if(request()->path() === trim($menu->getDisplayUrl(), '/')) class="active" @endif>{{ $menu->getDisplayName() }}</a></li>
      @endforeach
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
