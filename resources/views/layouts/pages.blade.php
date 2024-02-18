<!doctype html>
<html lang="en">

  <head>
    @include('includes.head')

  </head>

  <body>

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar site-navbar-target" role="banner">

      @include('includes.headerNav')

      </header>
      
      @include('includes.header')


      @yield('content')

      @include('includes.waitingFor')

      <footer class="site-footer">

      @include('includes.footerAboutus')
      
      </footer>

    </div>

    @include('includes.js')

  </body>

</html>