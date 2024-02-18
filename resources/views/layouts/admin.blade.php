<!DOCTYPE html>
<html lang="en">
  <head>
   @include('includes.adminHead')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('index')}}" class="site_title"><i class="fa fa-car"></i></i> <span>Rent Car Admin</span></a>
            </div>

            <div class="clearfix"></div>

            @include('includes.profileInfo')

            @include('includes.sidebar')

            @include('includes.adminFooter')

            @include('includes.navigation')


       @yield('admin')
       

        <!-- footer content -->
        <footer>
          <div class="pull-right">
             by <a href="">Aya Mohammed</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('includes.adminJs')