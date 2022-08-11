<!DOCTYPE html>
<html lang="fr">

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
                <span>{{ getProfilsName() }}</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>{{ getMutuelle() }}</span>
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
      
     
      @can("superadmin")

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('pays') }}">
          <i class="ri ri-community-line"></i>
          <span>Pays</span>
        </a>   
      </li> 

      <li class="nav-item">
        <a href="{{ route('utilisateurs') }}" class="nav-link collapsed">
          <i class="bi bi-person"></i>
          <span>Utilisateurs</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('mutuelles') }}">
          <i class="ri ri-community-line"></i>
          <span>Mutuelles de santé</span>
        </a>   
      </li> 

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('prestataires') }}">
          <i class="ri ri-hospital-line"></i>
          <span>Formations sanitaires</span>
        </a>   
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('conventions') }}">
          <i class="ri ri-hospital-line"></i>
          <span>Conventions</span>
        </a>   
      </li>
      @endcan

      @can("admin")
        <li class="nav-item">
        <a href="{{ route('utilisateurs') }}" class="nav-link collapsed">
          <i class="bi bi-person"></i>
          <span>Utilisateurs</span>
        </a>
      </li>
      @endcan

      @can("secretaire")
          <li class="nav-item">
            <a href="{{ route('adherents') }}" class="nav-link collapsed ">
              <i class="ri ri-team-line"></i><span>Adherents</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('beneficiaires') }}" class="nav-link collapsed ">
              <i class="ri ri-team-line"></i><span>Bénéficiaires</span>
            </a>
          </li>
        
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('prestations') }}">
          <i class="bi bi-umbrella"></i>
          <span>Prestations</span>
        </a>   
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('cotisations') }}">
          <i class="bi bi-piggy-bank"></i>
          <span>Cotisations</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('soins') }}">
          <i class="bi bi-umbrella"></i>
          <span>Soins</span>
        </a>   
      </li>  
      @endcan             
      
      @can("prestataire")
      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('soins') }}">
          <i class="bi bi-umbrella"></i>
          <span>Soins</span>
        </a>   
      </li>  

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{ route('prescriptions') }}">
          <i class="bi bi-journal-text"></i>
          <span>Prescriptions</span>
        </a>   
      </li>  
      @endcan

      @can("adherent")

        <li class="nav-item">
          <a class="nav-link collapsed"  href="">
            <i class="bi bi-umbrella"></i>
            <span>Liste des prestations</span>
          </a>   
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed"  href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-umbrella"></i>
            <span>Payer cotisation</span>
          </a>   
        </li> 

      @endcan
      
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
  
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Payer une cotisation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              
                <livewire:cotisations.cotiser>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                 
              </div>
            </div>
          </div>
        </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('asset/vendor/bootstrap/js/jquery.js') }}"></script>
  <script src="{{ asset('asset/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('asset/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('asset/js/main.js') }}"></script>

   <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
@livewireScripts
</body>

</html>