<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>RAHMANA RENT-CAR</title>

    <meta name="description" content="PT. Yafo Agro Indonesia adalah perusahaan agribisnis yang berkomitmen pada praktik ekonomi hijau Menyediakan produk dan jasa agrikultur yang berkualitas dan berkelanjutan, untuk menciptakan nilai tambah kepada seluruh pemangku kepentingan"
     />

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" /> -->
    <link href="{{url('logo')}}/LOGO YAFO aja.png" rel="icon">
  <link href="{{url('landingpage')}}/LOGO YAFO aja.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{url('sneat')}}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('sneat')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('sneat')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('sneat')}}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('sneat')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{url('sneat')}}/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{url('sneat')}}/assets/vendor/js/helpers.js"></script>
    <link rel="stylesheet" href="{{asset('arfa/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('sneat')}}/assets/js/config.js"></script>
    <style>
        body{
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }
           .responsive-img {
            max-width: 100%;
            height: auto;
        }
        .menu-item {
    position: relative;
}

.menu-link {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
}

.menu-link .menu-icon {
    margin-right: 10px;
}

.menu-item.active > .menu-link {
    background-color: #f0f0f0;
}

.dropdown-menu {
    padding: 0;
    margin: 0;
    border: none;
    box-shadow: none;
    background: none;
}

.dropdown-item {
    display: flex;
    align-items: center;
    padding: 5px 10px;
    color: #666;
    text-decoration: none;
}

.dropdown-item .submenu-icon {
    margin-right: 8px;
}

.submenu-item.active > .dropdown-item {
    background-color: #e0e0e0;
    color: #333;
}

    </style>
</head>

<body style="background-color: #179bbd;">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

           @include('layouts-admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('layouts-admin.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                      @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                               
                                <a href="" target="_blank"
                                    class="footer-link fw-bolder">RAHMANA RENT-CAR</a>
                            </div>
                            
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('sneat')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{url('sneat')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{url('sneat')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{url('sneat')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{url('sneat')}}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{url('sneat')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{url('sneat')}}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{url('sneat')}}/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- <script src="{{asset('arfa/toastr/toastr.min.js') }}"></script> -->
    <script src="{{url('arfa/toastr')}}/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script>
    toastr.options.timeOut = 1500;
    toastr.options.showMethod = 'slideDown';
    toastr.options.hideMethod = 'slideUp';
    toastr.options.closeMethod = 'slideUp';
    @if(session()->has('success'))
        toastr.success('{{session()->get("success")}}')
    @elseif(session()->has('error'))
        toastr.error('{{session()->get("error")}}')
    @endif
</script>
<script>
     new DataTable('#myTable');
</script>

 
@include('layouts-admin.js')
</body>

</html>