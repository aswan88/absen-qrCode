<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title><?= $title; ?></title>
  
    <!-- Custom CSS -->
    <link href="../template/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../template/dist/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../template/assets/extra-libs/DataTables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../template/assets/extra-libs/DataTables/buttons.dataTables.min.css">
    
    
    
    
    <script src="../template/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../template/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../template/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../template/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../template/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../template/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../template/assets/libs/flot/excanvas.js"></script>
    <script src="../template/assets/libs/flot/jquery.flot.js"></script>
    <script src="../template/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../template/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../template/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../template/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../template/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../template/dist/js/pages/chart/chart-page-init.js"></script>
        <!-- this page js -->
        <script src="../template/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../template/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../template/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="../template/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="../template/assets/extra-libs/DataTables/dataTables.buttons.min.js"></script>
    <script src="../template/assets/extra-libs/DataTables/buttons.colVis.min.js"></script>
    <script src="../template/assets/extra-libs/DataTables/buttons.html5.min.js"></script>
    <script src="../template/assets/extra-libs/DataTables/jszip.min.js"></script>
    

    <script src="../qr-scanner/qr-scanner.umd.min.js"></script>
    <!-- <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script> -->
    <script src="html5-qrcode.min.js"></script>
<script>
    // do something with QrScanner
</script>
  </head>

  <body>
        <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >

    <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.html">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="../template/assets/images/logo-icon.png"
                  alt="homepage"
                  class="light-logo"
                  width="25"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2 pt-3">
                <h3>NAVIGASI</h3>
              </span>
            
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
             <li class="nav-item d-none d-lg-block pt-3 text-white"><h3>ABSENSI PEGAWAI</h3></li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              

              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="../template/assets/images/users/1.jpg"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php"
                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                  >
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>