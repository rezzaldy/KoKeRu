<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ url('/') }}" style="color: #000"><img src="{{ asset('material') }}/img/logo.png" alt="" class="navbar-brand nav-logo"></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link">
            <i class="material-icons">home</i> {{ __('Home') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ url('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Login') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->