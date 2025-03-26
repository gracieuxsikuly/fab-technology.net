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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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

<body class="index-page">

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

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">

                <div class="carousel-item active">
                    <img src="{{asset('assets/img/hero-carousel/hero-carousel-1.webp')}}" alt="">
                    <div class="carousel-container">
                        <h2>Infrastructure Réseau de Pointe pour Entreprises</h2>
                        <p>Nos ingénieurs IT conçoivent et optimisent des infrastructures réseau modernes pour assurer
                            une connectivité stable et sécurisée. Performance et fiabilité au cœur de votre entreprise.
                        </p>
                        <a href="#contact" class="btn-get-started">Entrez en contact</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{asset('assets/img/hero-carousel/hero-carousel-6.webp')}}" alt="">
                    <div class="carousel-container">
                        <h2>Installation et Configuration de Connexion Internet par Satellite</h2>
                        <p>Nos ingénieurs spécialisés assurent l’installation et la configuration de solutions VSAT pour
                            une connectivité internet fiable, même dans les zones les plus reculées. Internet partout,
                            sans limites.</p>
                        <a href="#contact" class="btn-get-started">Entrez en contact</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{asset('assets/img/hero-carousel/hero-carousel-3.webp')}}" alt="">
                    <div class="carousel-container">
                        <h2>Solutions Cloud Innovantes pour Votre Entreprise</h2>
                        <p>Optimisez vos infrastructures avec nos services de cloud computing, gestion de serveurs
                            virtuels et solutions de stockage sécurisées. Profitez de la puissance du numérique pour une
                            performance optimale</p>
                        <a href="#contact" class="btn-get-started">Entrez en contact</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{asset('assets/img/hero-carousel/hero-carousel-4.webp')}}" alt="">
                    <div class="carousel-container">
                        <h2>Expertise en Infrastructure Réseau et Serveurs</h2>
                        <p>Nos ingénieurs IT assurent l’installation et la configuration optimales de vos serveurs dans
                            un centre de données ultra-moderne. Sécurité, performance et innovation pour une
                            connectivité sans faille.</p>
                        <a href="#contact" class="btn-get-started">Entrez en contact</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{asset('assets/img/hero-carousel/hero-carousel-5.webp')}}" alt="">
                    <div class="carousel-container">
                        <h2>Développement Web et Hébergement de Qualité</h2>
                        <p>Nos experts en programmation web et hébergement assurent des solutions performantes et
                            adaptées à vos besoins. Une expertise locale pour des services digitaux de pointe</p>
                        <a href="#contact" class="btn-get-started">Entrez en contact</a>
                    </div>
                </div><!-- End Carousel Item -->

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->
        <!-- About Section -->
        <livewire:front.about>
            <!-- /About Section -->
   <!-- projet mision vision -->
   <livewire:front.vision-mision-projet>
 <!-- /projet mision vision -->
            <!-- Stats Section realisation-->
            <livewire:front.realisation>
            <!-- /Stats Section -->
                    <!-- Services Section -->
                    <livewire:front.service>
                      {{-- end service --}}

                        <!-- Call To Action Section -->
                        <section id="call-to-action" class="call-to-action section dark-background">

                            <img src="{{asset('assets/img/cta-bg.jpg')}}" alt="">

                            <div class="container">
                                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="col-xl-10">
                                        <div class="text-center">
                                            <h3>Passons à l'action</h3>
                                            <p>Une solution adaptée à vos besoins vous attend. Contactez-nous dès
                                                aujourd'hui pour discuter de votre projet et obtenir des résultats
                                                concrets.</p>
                                            <a class="cta-btn" style="cursor: pointer;" href="#contact">Passons à
                                                l'action</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section><!-- /Call To Action Section -->

                        <!-- Portfolio Section ou galery -->
                        <livewire:front.galery>
                            <!-- /Portfolio Section -->

                            <!-- Testimonials Section -->
                            <section id="testimonials" class="testimonials section">

                                <!-- Section Title -->
                                <div class="container section-title" data-aos="fade-up">
                                    <h2>Ils nous font confiance</h2>
                                    <p>Lisez ce que nos clients disent de leur collaboration avec nous.</p>
                                </div><!-- End Section Title -->

                                <div class="container" data-aos="fade-up" data-aos-delay="100">

                                    <div class="swiper init-swiper">
                                        <script type="application/json" class="swiper-config">
                                            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
                                        </script>
                                        <div class="swiper-wrapper">

                                            <div class="swiper-slide">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-1.jpg"
                                                        class="testimonial-img" alt="">
                                                    <h3>Sophie D., Directrice IT</h3>
                                                    <h4>Wunder &amp; Corporation</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                            class="bi bi-star-fill"></i><i
                                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        <span>Grâce à Fab Technology, notre migration vers le cloud
                                                            s'est déroulée sans interruption. Leur équipe a été
                                                            réactive, transparente sur les coûts, et leur expertise nous
                                                            a évité des semaines de downtime. Un partenaire de confiance
                                                            !</span>
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div><!-- End testimonial item -->

                                            <div class="swiper-slide">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-2.jpg"
                                                        class="testimonial-img" alt="">
                                                    <h3> Thomas L.</h3>
                                                    <h4>Gérant de la boutique Topfiv</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                            class="bi bi-star-fill"></i><i
                                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        <span>On cherchait un prestataire informatique qui comprendrait
                                                            nos enjeux sans jargon inutile. Fab Technology a sécurisé
                                                            notre réseau et formé nos équipes avec patience.
                                                            Aujourd’hui, on travaille sereinement !</span>
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div><!-- End testimonial item -->

                                            <div class="swiper-slide">
                                                <div class="testimonial-item">
                                                    <img src="assets/img/testimonials/testimonials-3.jpg"
                                                        class="testimonial-img" alt="">
                                                    <h3>Dr. Karim M.</h3>
                                                    <h4>CTO, WordlviStyp</h4>
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                            class="bi bi-star-fill"></i><i
                                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p>
                                                        <i class="bi bi-quote quote-icon-left"></i>
                                                        <span>Leur audit a identifié des failles critiques que notre
                                                            équipe interne n’avait pas détectées. Leurs solutions sur
                                                            mesure et leur support 24/7 ont dépassé nos attentes.</span>
                                                        <i class="bi bi-quote quote-icon-right"></i>
                                                    </p>
                                                </div>
                                            </div><!-- End testimonial item -->

                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>

                                </div>

                            </section><!-- /Testimonials Section -->

                            <!-- Team Section team -->
                            <livewire:front.team>
                                <!-- /Team Section -->


                                <!-- Faq Section -->
                                <livewire:front.faq>
                                    <!-- /Faq Section -->

                                    <!-- Contact Section -->
                                    <livewire:front.contact>
                                        <!-- /Contact Section -->

    </main>

    @include('partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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

    {{-- <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script> --}}

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