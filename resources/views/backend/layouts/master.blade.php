<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <title>Sunshine | @yield('title')</title>

    <!-- Các custom style dành riêng cho từng view -->
    @yield('custom-css')
  </head>
  <body>
    <!-- Navbar -->
    @include('backend.layouts.partials.navbar')
    <!-- End Navbar -->

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('backend.layouts.partials.sidebar')
            <!-- End sidebar -->

            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('feature-title')</h1>
                    <small>@yield('feature-description')</small>
                </div>
                @yield('content')
            </main>
            <!-- End content -->
        </div>
    </div>
    <!-- End main content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/localization/messages_vi.min.js') }}"></script>
    <!-- Các custom script dành riêng cho từng view -->
    @yield('custom-scripts')
  </body>
</html>
<!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
    <title>
      Argon Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  </head>
  

    <!--   Core JS Files   -->
    <script src="../../../assets/js/core/popper.min.js"></script>
    <script src="../../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../../assets/js/plugins/chartjs.min.js"></script>
    
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  </body>
  
  </html>
  