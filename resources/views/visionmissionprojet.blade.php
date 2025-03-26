<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Fab-Technology | FT</title>
    <meta name="description"
        content="Fab-Technology est une entreprise qui a vu le jour en 2018, est un fournisseur indépendant et complet de services et de produits informatiques.">
    <meta name="keywords" content="Fab-Technology, services informatiques, produits informatiques,
   maintenance informatique, télécommunications, installation CCTV, téléphones VoIP, radios HF, radios VHF,
    hébergement web, cybersécurité, parc informatique, Goma, Nord-Kivu, Lubumbashi, Haut-Katanga, RDC">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <style>
        /* Désactive l'ancien preloader */
        #preloader {
            display: none !important;
        }
        
        /* Nouveau preloader */
        .custom-preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .preloader-logo {
            width: 80px;
            height: 80px;
            animation: pulse 1.5s infinite ease-in-out;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>

<body class="service-details-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{asset('assets/img/logo.jpg')}}" alt="">
            <h1 class="sitename">FAB-TECHNOLOGY</h1>
        </a>

      @include('partials.menu')

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url({{asset('assets/img/page-title-bg.webp')}});">
      <div class="container position-relative">
        <h1>Details</h1>
        <p>Des solutions tech fiables qui simplifient votre quotidien professionnel.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home')}}">Home</a></li>
            <li class="current">Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <livewire:front.visionmissionprojet-detail :designation="$designation" :id="$id" />
    <!-- /Service Details Section -->

  </main>

  @include('partials.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
    {{-- <div id="preloader"></div> --}}
    <!-- Nouveau Preloader avec votre logo -->
    <div class="custom-preloader">
        <div class="preloader-logo">
            <img src="{{asset('assets/img/favicon.png')}}" alt="Fab-Technology Logo" width="80px;" height="80px;">
        </div>
    </div>

 <!-- Vendor JS Files -->
 <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
 <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
 <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
 <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
 <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
 <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
 <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>


      <!-- Main JS File -->
      <script src="{{asset('assets/js/main.js')}}"></script>
      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
          var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/67e2e9ea4bbde1190a845e06/1in763f9u';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
      </script>
      <!--End of Tawk.to Script-->
  
      <script>
          // Script pour le nouveau preloader
          window.addEventListener('load', function() {
              const preloader = document.querySelector('.custom-preloader');
              setTimeout(function() {
                  preloader.style.transition = 'opacity 0.5s ease';
                  preloader.style.opacity = '0';
                  setTimeout(function() {
                      preloader.style.display = 'none';
                  }, 500);
              }, 1000);
          });
      </script>
</body>

</html>