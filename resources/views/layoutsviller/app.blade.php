<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{url('/assets/img/favicon.png')}}">
  <title>
    {{-- Soft UI Dashboard by Creative Tim --}}
    @yield('title')
  </title>
  <!--     Fonts and icons     penting-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{url('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{url('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{url('/assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
  <script src="/assets/js/utils.js" ></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  
  @stack('css')
</head>

<body class="bg-gray-100 g-sidenav-show">
  {{-- <h2>@{{ message }}</h2> --}}
    @include('layoutsviller.sidebar')
    @include('layoutsviller.main')

    <div class="fixed-plugin">
      <a class="px-3 py-2 fixed-plugin-button text-dark position-fixed">
        <i class="py-2 fa fa-cog"> </i>
      </a>
      <div class="shadow-lg card ">
        <div class="pt-3 pb-0 card-header ">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
            <p>See our dashboard options.</p>
          </div>
          <div class="mt-4 float-end">
            <button class="p-0 btn btn-link text-dark fixed-plugin-close-button">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="my-1 horizontal dark">
        <div class="pt-0 card-body pt-sm-3">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="my-2 badge-colors text-start">
              <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button class="px-3 mb-2 btn bg-gradient-primary w-100 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
            <button class="px-3 mb-2 btn bg-gradient-primary w-100 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          </div>
          <p class="mt-2 text-sm d-xl-none d-block">You can change the sidenav type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="mt-3">
            <h6 class="mb-0">Navbar Fixed</h6>
          </div>
          <div class="form-check form-switch ps-0">
            <input class="mt-1 form-check-input ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
          <hr class="horizontal dark my-sm-4">
          <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro">Free Download</a>
          <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
          <div class="text-center w-100">
            <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
            <h6 class="mt-3">Thank you for sharing!</h6>
            <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="mb-0 btn btn-dark me-2" target="_blank">
              <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="mb-0 btn btn-dark me-2" target="_blank">
              <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
            </a>
          </div>
        </div>
      </div>
    </div>
  <!--   Core JS Files   -->
  <script src="{{url('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
 

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
  <script src="{{url('/assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
  @stack('scripts')
</body>

</html>