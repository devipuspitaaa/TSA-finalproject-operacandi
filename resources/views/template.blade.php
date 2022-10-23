<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/bps.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    OPERA CANDI | BPS KOTA MADIUN
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />


  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="/dashboard" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ asset('assets/img/bps.png') }}">
          </div>
        </a>
        <a href="/dashboard" class="simple-text logo-normal">
          OPERA CANDI
        </a>
      </div>
      <div class="sidebar-wrapper">
        <!-- MENU -->
        <ul class="nav">

          <li class="nav-item {{ set_active('home') }}">
            <a href="{{ route('home')}}">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Dashboard</p>
            </a>
          </li>
          {{-- <li>
            <a href="./map.html">
              <i class="nc-icon nc-chart-pie-36"></i>
              <p>Data Statistik</p>
            </a>
          </li> --}}
          @if (Auth::user()->role=='admin')
          <li class="nav-item {{ set_active(['form.index', 'form.create', 'form.edit']) }}">
            <a href="{{ route('form.index')}}">
              <i class="nc-icon nc-paper"></i>
              <p>Input Survei</p>
            </a>
          </li>
          @endif
          @if (Auth::user()->role=='pengawas')
          <li class="nav-item {{ set_active(['target.index', 'target.create', 'target.edit']) }}">
            <a href="{{ route('target.index')}}">
              <i class="nc-icon nc-align-center"></i>
              <p>Input Realisasi Target</p>
            </a>
          </li>
          @endif
          <li
            class="nav-item {{ set_active(['pengawas.index','pengawas.create', 'petugas.index', 'petugas.create']) }}">
            <a data-toggle="collapse" href="#componentsExamples" aria-expanded="true" class="">
              <i class="nc-icon nc-layout-11"></i>
              <p>
                Data Pegawai <b class="caret"></b>
              </p>
            </a>
            <div class="collapse show" id="componentsExamples">
              <ul class="nav">
                <li class="nav-item {{ set_active(['pengawas.index', 'pengawas.create', 'pengawas.edit']) }}">
                  <a href="{{ route('pengawas.index')}}">
                    <span class="sidebar-normal"> Biodata Pengawas </span>
                  </a>
                </li>
                <li class="nav-item {{ set_active(['petugas.index', 'petugas.create', 'petugas.edit']) }}">
                  <a href="{{ route('petugas.index')}}">
                    <span class="sidebar-normal"> Biodata Petugas </span>
                  </a>
                </li>
              </ul>
            </div>
            <li class="nav-item {{ set_active(['laporan']) }}">
            <a href="{{ route('laporan.form')}}">
              <i class="nc-icon nc-align-center"></i>
              <p>Laporan Realisasi</p>
            </a>
          </li>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon">
                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <a class="navbar-brand">Optimalisasi Pengawasan Petugas Kelurahan Cantik Kota Madiun</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-circle-10"></i>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }}</span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="nc-icon nc-single-02"></i>
                    Profile
                  </a>
                  {{-- <a class="dropdown-item" href="#">
                    <i class="nc-icon nc-settings-gear-65"></i>
                    Settings
                  </a> --}}
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="nc-icon nc-share-66"></i>
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>

                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk logout?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">pilih tombol "Logout" dibawah ini</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- CONTENT -->
      @yield('content')

      <!-- END CONTENT -->
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://madiunkota.bps.go.id/" target="_blank"><i class="nc-icon nc-globe"></i> Website BPS
                    Kota Madiun</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by TIM IT BPS Kota Madiun
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script> -->
  <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <script src="{{ asset('assets/js/paper-dashboard.min.js') }}?v=2.0.1" type="text/javascript"></script>
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/chartjs.min.js') }}"></script>

  <script src="https://demos.creative-tim.com/paper-dashboard-2-pro/assets/js/plugins/moment.min.js"></script>
  <script src="https://demos.creative-tim.com/paper-dashboard-2-pro/assets/js/plugins/bootstrap-datetimepicker.js"></script>
  <script src="https://demos.creative-tim.com/paper-dashboard-2-pro/assets/js/plugins/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartPageCharts();
    });
  </script>

  <script>
    $(document).ready(function() {
      demo.initChartsPages();
    });
  </script>
  <script>
    $(function() {

      $('#datatable').DataTable();

      $('.datepicker').datetimepicker({
                format: 'MM/DD/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });


      
    });
  </script>
</body>

</html>