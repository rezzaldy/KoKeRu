<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-3.jpg">
  <div class="logo">
    <a href="{{ url('/home') }}" class="simple-text logo-normal">
      <img src="{{ asset('material') }}/img/logo.png" alt="" class="logo-side">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'distribusi' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">analytics</i>
          <p>{{ __('Manage') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'distribusi' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons">assignment</i>
                <span class="sidebar-normal">{{ __('Task') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="report">
                <i class="material-icons">print</i>
                <span class="sidebar-normal"> {{ __('Report') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'monitor' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('monitor') }}">
          <i class="material-icons">tv</i>
            <p>{{ __('Monitor') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
