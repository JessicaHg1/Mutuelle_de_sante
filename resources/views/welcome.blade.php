
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MUT-ASSUR</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href= {{ asset('assets/css/style.css') }} rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v4.7.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">MUT-ASSUR</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Quelques fonctionalités</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
           <!--li><a class="nav-link scrollto" href="{{ route('register') }}">
           Enregistrer un utilisateur sur MUT-ASSUR</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" style="background-image: url('img/famille.jfif')">
    <div class="hero-container">
      <h3>Bienvenu sur <strong>MUT-ASSUR</strong></h3>
      <h1>La solidarité au service de la santé</h1><br/>
      <br/><br/><a href="{{ route('login') }}" class="btn-get-started scrollto">Se connecter</a>
    </div>
    
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>A propos</h2>
          <h3 class="title-title">Gérez facilement et efficacemment votre mutuelle de santé avec notre logiciel MUT-ASSUR.</h3>
        </div>

        <div class="col-lg-12 text-center">
            <p>
              MUT-ASSUR est le meilleur logiciel de gestion des mutuelles de santé. 
              MUT-ASSUR permet de gérer toutes les activités de votre institution.<br/>
            
              Gestion des adhérents et de leurs personnes à charge,
              suivi des cotisations,
              gestion des prestataires, des prestations,
              gestion des soins administrés aux bénéficiaires.
            </p>
        </div>   
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Quelques fonctionnalités de MUT-ASSUR</h2>
          <h3 class="title-title">Notre plateforme possède les fonctionnalités ci-dessous</h3>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people-fill"></i></div>
              <h4 class="title"><a href="">ADHÉSION</a></h4>
              <p class="description">ASSURÉ PRINCIPAL, PERSONNES À CHARGE... Créez la fiche détaillée de vos 
              assurés principaux, ajouter leurs personnes à charge...</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-piggy-bank-fill"></i></div>
              <h4 class="title"><a href="">COTISATIONS</a></h4>
              <p class="description">APPEL ET RECOUVREMENTS DES COTISATIONS... Faites le suivi et 
              le recouvrement...</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-umbrella-fill"></i></div>
              <h4 class="title"><a href="">PRESTATIONS</a></h4>
              <p class="description">GESTION DES RECOURS AUX PRESTATIONS. FACTURES PRESTATAIRES... Enrégistrez et faites le suivi 
              des recours aux prestations. Saisie, traitement et règlement de factures prestataires...</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-lock-fill"></i></div>
              <h4 class="title"><a href="">SÉCURITÉ</a></h4>
              <p class="description">MUT-ASSUR intègre les dernières technologies en terme de sécurité.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>Contactez <span>nous</span></h3>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-4 col-6">
            <div class="info">
              <div class="phone">
                <i class="bi bi-geo-alt"></i>
                <h4>Localisation</h4>
                <p>04 rue des merveilles</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-6">
            <div class="info">
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email</h4>
                <p>kpavuvujess@gmail.com</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-6">
            <div class="info">
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Téléphone</h4>
                <p>+228 70367074</p>
              </div>
            </div>
          </div>


          
        </div> 
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>zoetechgroup</span></strong>. All Rights Reserved.
        </div>
        {{--<div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>--}}
      </div>
      {{--<div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>--}}
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i></a>

  <script src={{ asset('assets/js/main.js') }}></script>
  
  <!-- Template Main JS File -->
</body>

</html>