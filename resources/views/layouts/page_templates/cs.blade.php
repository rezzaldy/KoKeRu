@include('layouts.navbars.navs.auth')
<div class="wrapper wrapper-full-page">
  <div class="main-panel cs">
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>