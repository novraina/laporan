<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{ asset('assets/vendors/feather/feather.css') }}>
  <link rel="stylesheet" href={{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}>
  <link rel="stylesheet" href={{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}>
  <link rel="stylesheet" href={{ asset('assets/vendors/typicons/typicons.css') }}>
  <link rel="stylesheet" href={{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}>
  <link rel="stylesheet" href={{ asset('assets/vendors/css/vendor.bundle.base.css') }}>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href={{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}>
  <link rel="stylesheet" href={{ asset('assets/js/select.dataTables.min.css') }}>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{ asset('assets/css/vertical-layout-light/style.css') }}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{ asset('assets/images/logo.png') }} />
</head>
<body>
  <div class="container-scroller"> 
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <a class="navbar-brand brand-logo" href="/">
          <img src={{ asset('assets/images/logo.png') }} alt="logo" style="max-width: 100%;
          height: auto;" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="/">
          <img src={{ asset('assets/images/logo.png') }} alt="logo" />
          </a>
        </div>
        <div>
            <h5><span class="text-black fw-bold">LABKOM UNISKA</span></h5>
        </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Hello, <span class="text-black fw-bold">{{ auth()->user()->fullname }}</span></h1> 
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">  
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src={{ asset('assets/images/faces/face23.jpg') }} alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src={{ asset('assets/images/faces/face23.jpg') }} alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->fullname }}</p>
                <p class="fw-light text-muted mb-0">@ {{ auth()->user()->username }}</p>
                <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
                </div> 
                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                  action="{{ route('user.destroy',  auth()->user()->id ) }}" method="POST">
                  <a class="dropdown-item" href="{{ route('user.edit', auth()->user()->id ) }}"><i class="dropdown-item-icon mdi mdi-lead-pencil text-primary me-2"></i>Edit Profile</a>
                  @csrf
                  @method('DELETE')
                  <button class="dropdown-item" type="submit"><i class="dropdown-item-icon mdi mdi-delete text-primary me-2"></i>Delete Account</button>
                </form>  
                <a class="dropdown-item" href="/logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> 
      <!-- partial -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
            </li>
            <li class="nav-item nav-category">User</li>
            <li class="nav-item">
            <a class="nav-link"  href="/user" aria-expanded="false" aria-controls="user">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">User</span> 
            </a> 
            </li>
            <li class="nav-item nav-category">Forms and Datas</li>
            <li class="nav-item">
            <a class="nav-link"  href="/peserta" aria-expanded="false" aria-controls="peserta">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Peserta</span> 
            </a> 
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/instruktur" aria-expanded="false" aria-controls="instruktur">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Instruktur</span> 
            </a> 
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/kelas" aria-expanded="false" aria-controls="kelas">
                <i class="menu-icon mdi mdi-book-open"></i>
                <span class="menu-title">Kelas</span> 
            </a> 
            </li>
            <li class="nav-item nav-category">Applications</li>
            <li class="nav-item">
            <a class="nav-link" href="/laporan" aria-expanded="false" aria-controls="laporan">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Laporan</span> 
            </a> 
            </li> 
        </ul>
        </nav>
      <div class="main-panel">
        @yield('container')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Lapkom Uniska Banjarmasin</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src={{ asset('assets/vendors/js/vendor.bundle.base.js') }}></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src={{ asset('assets/vendors/chart.js/Chart.min.js') }}></script>
  <script src={{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}></script>
  <script src={{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src={{ asset('assets/js/off-canvas.js') }}></script>
  <script src={{ asset('assets/js/hoverable-collapse.js') }}></script>
  <script src={{ asset('assets/js/template.js') }}></script>
  <script src={{ asset('assets/js/settings.js') }}></script>
  <script src={{ asset('assets/js/todolist.js') }}></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src={{ asset('assets/js/jquery.cookie.js') }} type="text/javascript"></script>
  <script src={{ asset('assets/js/dashboard.js') }}></script>
  <script src={{ asset('assets/js/Chart.roundedBarCharts.js') }}></script>
  <!-- End custom js for this page-->
</body>

</html>

