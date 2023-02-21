    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Balai</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template/Lonely/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template/Lonely/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i&subset=cyrillic" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/Lonely/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/Lonely/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/Lonely/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/Lonely/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/Lonely/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template/Lonely/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Lonely - v4.10.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-lonely/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>

  <!-- ======= Hero Section ======= -->
    <div>
        @yield('hero')
    </div>
      

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        @yield('nama-balai')
      </div>

      <nav id="navbar" class="navbar">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
       
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profil Balai</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="Visi-Misi-tab" data-bs-toggle="tab" data-bs-target="#Visi-Misi" type="button" role="tab" aria-controls="Visi-Misi" aria-selected="false">Visi-Misi</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="Struktur-tab" data-bs-toggle="tab" data-bs-target="#Struktur" type="button" role="tab" aria-controls="Struktur" aria-selected="false">Struktur</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="Kawasan-tab" data-bs-toggle="tab" data-bs-target="#Kawasan" type="button" role="tab" aria-controls="Kawasan" aria-selected="false">Kawasan</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="Peraturan-tab" data-bs-toggle="tab" data-bs-target="#Peraturan" type="button" role="tab" aria-controls="Peraturan" aria-selected="false">Peraturan</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="Informasi-tab" data-bs-toggle="tab" data-bs-target="#Informasi" type="button" role="tab" aria-controls="Informasi" aria-selected="false">Informasi</button>
              </li>
   
          </ul>
      
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">

    <!-- ======= About Section ======= -->
    {{--  <section id="about" class="about">
      <div class="container">
        <div class="row no-gutters">
            @yield('body')
        </div>
      </div>
    </section><!-- End About Section -->  --}}
    {{--  <div class="tab-content about">
      <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container">
          <div class="row no-gutters">
    <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start"></div>
          <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
            <div class="content d-flex flex-column justify-content-center">
              <h3>Voluptatem dignissimos provident quasi</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock"></i>
                    <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate non vel</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="Visi-Misi" role="tabpanel" aria-labelledby="Visi-Misi-tab">
      sda  
      </div>
      <div class="tab-pane" id="Struktur" role="tabpanel" aria-labelledby="Struktur-tab">.f..</div>
      <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
    </div>  --}}
    <div class="tab-content about">
        <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="container my-4 my-4">
            <div class="row no-gutters">
                @yield('profil')
            </div>
          </div>
        </div>
        <div class="tab-pane " id="Visi-Misi" role="tabpanel" aria-labelledby="Visi-Misi-tab">
          <div class="container my-4">
            <div class="row no-gutters">
                @yield('Visi-Misi')
            </div>
          </div>
        </div>
        <div class="tab-pane" id="Struktur" role="tabpanel" aria-labelledby="Struktur-tab">
          <div class="container my-4">
            <div class="row no-gutters">
                @yield('Struktur')
            </div>
          </div>
        </div>
        <div class="tab-pane" id="Kawasan" role="tabpanel" aria-labelledby="Kawasan-tab">
          <div class="container my-4">
            <div class="row no-gutters">
                @yield('Kawasan')
            </div>
          </div>
        </div>
        <div class="tab-pane" id="Peraturan" role="tabpanel" aria-labelledby="Peraturan-tab">
          <div class="container my-4">
            <div class="row no-gutters">
                @yield('Peraturan')
            </div>
          </div>
        </div>
        <div class="tab-pane" id="Informasi" role="tabpanel" aria-labelledby="Informasi-tab">
          <div class="container my-4">
            <div class="row no-gutters">
                @yield('Informasi')
            </div>
          </div>
        </div>
 
    </div>
 

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Lonely</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-html-bootstrap-template-lonely/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/Lonely/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('template/Lonely/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/Lonely/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/Lonely/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/Lonely/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template/Lonely/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('template/Lonely/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template/Lonely/assets/js/main.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script>
    @yield('js-section')
  </script>
</body>

</html>