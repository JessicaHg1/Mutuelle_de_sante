<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>

  <!-- Favicons -->
  <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset('asset/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

@livewireStyles
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="" alt="">
        <span class="d-none d-lg-block">MUT-ASSUR</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!--<li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul>

        </li> -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('img/user.png') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 ellipsis">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 class="ellipsis">{{ auth()->user()->name }}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mon rôle</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item bi bi-box-arrow-right" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Déconnecter') }}
                </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
     
      
      <li class="nav-item">
        <a href="{{ route('utilisateurs') }}" class="nav-link collapsed">
          <i class="bi bi-person-fill"></i>
          <span>Utilisateurs</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('mutuelles') }}">
          <i class="ri ri-community-line"></i>
          <span>Mutuelles de santé</span>
        </a>   
      </li>
                   
      <li class="nav-item ">
        <a class="nav-link collapsed " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-team-line"></i><span>Bénéficiares</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('beneficiaires.adherents') }}" class="nav-link collapsed ">
              <i class="ri ri-team-line"></i><span>Adhérents</span>
            </a>
          </li>

           <li>
            <a href="{{ route('beneficiaires.beneficiaire') }}" class="nav-link collapsed ">
              <i class="ri ri-team-line"></i><span>Personnes à charge</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('prestataires') }}">
          <i class="ri ri-hospital-line"></i>
          <span>Prestataires de soins</span>
        </a>   
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('prestations') }}">
          <i class="bi bi-umbrella-fill"></i>
          <span>Prestations</span>
        </a>   
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#cotisation-nav" data-bs-toggle="collapse" href="{{ route('cotisations') }}">
          <i class="bi bi-piggy-bank-fill"></i><span>Cotisations</span>
        </a>
       
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('soins') }}">
          <i class="bi bi-umbrella-fill"></i>
          <span>Soins</span>
        </a>   
      </li>
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

        @yield('content')

  </main><!-- End #main -->

  {{-- ======= Footer ======= -->
  <!--<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->--}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('asset/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('asset/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('asset/js/main.js') }}"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
@livewireScripts
</body>

</html>