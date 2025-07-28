<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Dewi Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Apple Touch Icon -->
<link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">

<!-- Favicon -->
<link rel="icon" href="{{ asset('img/favicon.png') }}">



  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/aos/aos.css') }}">
      <link rel="stylesheet" href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

  
  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
    
        <h1 class="sitename">Makombi</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Informasi</a></li>
          <li><a href="#services">Galeri</a></li>
          <li><a href="#portfolio">Berita</a></li>
          <li><a href="#portfolio">Kontak</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn" href="">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="{{ asset('img/hero-bg.jpg') }}" data-aos="fade-in">

      

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">MAGANG KOMINFO BINJAI</h2>
        <p data-aos="fade-up" data-aos-delay="200">Program magang resmi dari Dinas Komunikasi dan Informatika Kota Binjai untuk mahasiswa dan pelajar yang ingin belajar langsung di lingkungan kerja profesional dan berkontribusi dalam pelayanan informasi publik</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">Daftar Sekarang</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

  <div class="row gy-4">
    <!-- Kolom Kiri: Visi dan Sejarah -->
    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <h3>Visi & Sejarah Kominfo Kota Binjai</h3>
      <img class="img-fluid rounded-4 mb-4" src="{{ asset('img/about.jpg') }}" alt="Kominfo Binjai">
      <p>
        Dinas Komunikasi dan Informatika Kota Binjai awalnya merupakan bagian dari Dinas Perhubungan. Seiring dengan kebutuhan akan pengelolaan informasi yang lebih modern dan terintegrasi, maka dibentuklah Kominfo sebagai perangkat daerah tersendiri. Kominfo memiliki peran sentral dalam digitalisasi layanan publik, penyebaran informasi, dan penguatan komunikasi antara pemerintah dengan masyarakat.
      </p>
      <p>
        <strong>Visi:</strong><br>
        “Mewujudkan komunikasi dan informasi yang transparan, partisipatif, dan berbasis teknologi informasi untuk mendukung pemerintahan yang baik dan bersih.”
      </p>
    </div>

    <!-- Kolom Kanan: Misi -->
    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
      <div class="content ps-0 ps-lg-5">
        <p class="fst-italic">
          Misi Kominfo Kota Binjai bertujuan untuk mendukung pemerintahan yang efektif melalui teknologi dan komunikasi.
        </p>
        <ul>
          <li><i class="bi bi-check-circle-fill"></i> <span>Menyebarkan informasi pembangunan secara cepat, tepat, dan akurat.</span></li>
          <li><i class="bi bi-check-circle-fill"></i> <span>Mengembangkan sistem pemerintahan berbasis elektronik (e-Government).</span></li>
          <li><i class="bi bi-check-circle-fill"></i> <span>Mendorong partisipasi publik melalui media komunikasi yang efektif.</span></li>
          <li><i class="bi bi-check-circle-fill"></i> <span>Meningkatkan kualitas layanan TIK untuk perangkat daerah dan masyarakat.</span></li>
          <li><i class="bi bi-check-circle-fill"></i> <span>Menjalin kerja sama informasi dengan berbagai pihak strategis.</span></li>
        </ul>
        <p>
          Seluruh misi tersebut mendukung terwujudnya Kota Binjai sebagai kota yang informatif, transparan, dan responsif dalam pelayanan publik berbasis digital.
        </p>

        <div class="position-relative mt-4">
          <img class="img-fluid rounded-4" src="{{ asset('img/Diskominfo.png') }}" alt="Video Kominfo">
          <a href="https://www.youtube.com/watch?v=f7SgxSi6wm0" class="glightbox pulsating-play-btn" aria-label="Play Video"></a>
        </div>
      </div>
    </div>
  </div>  
</div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- galeri Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>galeri</h2>
        <p>Galeri<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          
        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Clients Section -->
    
   
    

      
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Hubungi Kami</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Makombi</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Informasi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Galeri</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Berita</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Kontak</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>


        <div class="container copyright text-center mt-4">
      <p>© <span>Copyright 2025</span> <strong class="px-1 sitename">Makombi</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
      </div>
    </div>
          </footer>

          <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
        <!-- Vendor JS Files -->

  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
      <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
          <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>





  <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>