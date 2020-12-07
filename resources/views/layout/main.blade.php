<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title')</title>

    <link href="{{ asset('css/sidemenu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    
    @yield('customCss')
  </head>


<body class="pt-0">
  {{-- <div class="container-fluid fixed-top bg-primary py-3">
    <div class="row collapse show no-gutters d-flex h-100 position-relative">
        <div class="col-3 px-0 w-sidebar navbar-collapse collapse d-none d-md-flex">
            <!-- spacer col -->
        </div>
        <div class="col px-3 px-md-0">
            <!-- toggler -->
            <a data-toggle="collapse" href="#" data-target=".collapse" role="button" class="text-white p-1">
                <i class="fa fa-bars fa-lg"></i>
            </a>
        </div>
    </div>
  </div> --}}
  <div class="container-fluid px-0">
    <div class="row collapse show no-gutters d-flex h-100 position-relative">
        <div class="col-3 p-0 h-100 w-sidebar navbar-collapse collapse d-none d-md-flex sidebar">
            <!-- fixed sidebar -->
            <div class="pt-3 navbar-dark bg-lightest text-white position-fixed h-100 align-self-start w-sidebar">
              <div class="pt-4 pb-5 d-flex justify-content-center">
                <a class="" href="/dashboard/{{ date("Y-m-d")}}">
                  <img src="{{url('/images/logo.png')}}" width="183.8" height="90.6" alt="logo">
                </a>
              </div>  
                <ul class="nav flex-column flex-nowrap text-truncate">
                  @yield('sideMenu')
                </ul>
            </div>
        </div>
        <div class="col p-5">

         @yield('main')

        </div>
    </div>
  </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
          {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
          <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                  

          {{-- data tables --}}
          <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

          
          <script src="{{ asset('js/test.js') }}"></script>

          @yield('customJs')

          @yield('JSON')
  </body>
</html>
