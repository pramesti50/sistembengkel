<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('template')}}/dist/assets/css/app.css">
    <link rel="shortcut icon" href="{{asset('template')}}/dist/assets/images/favicon.svg" type="image/x-icon">

    <!-- tambahan link modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- tambahan untuk toast -->
    <script href="{{asset('template')}}/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script href="{{asset('template')}}/dist/assets/js/bootstrap.bundle.min.js"></script>

    <script href="{{asset('template')}}/dist/assets/vendors/toastify/toastify.js"></script>
    <script href="{{asset('template')}}/dist/assets/js/extensions/toastify.js"></script>

    <script href="{{asset('template')}}/dist/assets/js/main.js"></script>

</head>

<body>
<!-- NAVIGATION BAR -->
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            
                            <h3>Sistem Servis Kendaraan</h3>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <!-- <li class="sidebar-item active"> -->
                        <li class="sidebar-item">
                            <a href="{{ url('/teknisi/beranda') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Beranda</span>
                            </a>
                        </li>

                        

                        <li class="sidebar-item">
                            <a href="{{ url('/kelola perbaikan/index') }}" class='sidebar-link'>
                                <i class="bi bi-journal-text"></i>
                                <span>Kelola Perbaikan Kendaraan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ url('/teknisi/manajemenKerja') }}" class='sidebar-link'>
                                <i class="bi bi-card-checklist"></i>
                                <span>Manajemen Kerja</span>
                            </a>
                        </li>
                        
                    <li class="sidebar-title">Master Data</li>

                        <li class="sidebar-item">
                            <a href="{{ url('/teknisi/dataPemilik') }}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Data Pemilik Kendaraan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ url('/teknisi/dataTeknisi') }}" class='sidebar-link'>
                                <i class="bi bi-person-badge"></i>
                                <span>Data Teknisi</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ url('/service/dataServiceKategori') }}" class='sidebar-link'>
                                <i class="bi bi-gear"></i>
                                <span>Data Service Kendaraan</span>
                            </a>
                        </li>
                    
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
<!-- END NAVIGATION BAR -->



<!-- HEADER CONTENT -->
<div id="main" class='layout-navbar'> 
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container-fluid">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
     
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav ms-auto">
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">{{ Auth::guard('teknisi')->user()->nama }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">Teknisi</p>
                                </div>
                                        
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                    <img src="{{asset('template')}}/dist/assets/images/logo/profil2.png">
                                    </div>
                                </div>
                            </div>
                        </a>
                                
                                
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">
                                <i class="icon-mid bi bi-person me-2"></i>Profil Saya</a>
                            </li>
                            
                            <li>
                            <form action="{{ route('logoutTeknisi')}}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <i class="icon-mid bi bi-box-arrow-right me-2"></i> Logout</button>
                            </form>
                            </li>
                                                      
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
<!-- END HEADER CONTENT -->



    <!-- ------------------ ISI CONTENT -------------------->
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-8 order-md-1">
                        <h4>@yield('header')</h4> 
                    </div>
                </div>
                @yield('content')
            </div>                   
        </div>                
    </div>  
<!-- ------------------ SELESAI CONTENT -------------------->
    </div>



    <script src="{{asset('template')}}/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{asset('template')}}/dist/assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('template')}}/dist/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{asset('template')}}/dist/assets/js/pages/dashboard.js"></script>

    <script src="{{asset('template')}}/dist/assets/js/main.js"></script>
    <!-- tambahan script untuk modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 2000);
        });    
    </script>
</body>

</html>