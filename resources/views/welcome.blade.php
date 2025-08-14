<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Makombi app</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Apple Touch Icon -->
<link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">

<!-- Favicon -->
<link rel="icon" href="{{ asset('img/favicon.png') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




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

      <a href="" class="logo d-flex align-items-center me-auto">
    
        <h1 class="sitename">Makombi</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Informasi</a></li>
          <li><a href="#services">Galeri</a></li>
          <li><a href="#contact">Kontak</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn" href="{{ route('login') }}">Login</a>

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
          <a href="{{route('mahasiswa.create')}}" class="btn-get-started">Daftar Sekarang</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident laboris nisi ut aliquip ex ea commodo</h3>
              <img class="img-fluid rounded-4 mb-4" src="{{ asset('img/about.jpg') }}">
            <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
            <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
              </p>

              <div class="position-relative mt-4">
                  <img class="img-fluid rounded-4" src="{{ asset('img/about-2.jpg') }}" alt="">

                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
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
              
              <i class="fas fa-user-graduate color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
                <p>Alumni Magang</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
               <i class="fas fa-university color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
                <p>Universitas Terkait</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
               <i class="fas fa-file-alt color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pendaftar</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="fas fa-check-circle color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
                <p>Diterima</p>
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
                  <p>Jl. Beringin, Kec. Binjai Kota, Kota Binjai, Sumatera Utara 20741</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>06126367272</p>
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
            <form id="contactForm" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="4" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading" style="display: none;">Loading...</div>
                  <div class="error-message" style="display: none;"></div>
                  <div class="sent-message" style="display: none;">Your message has been sent. Thank you!</div>

                  <button type="submit" class="btn btn-primary">Send Message</button>
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
            <p>Jl. Kartini</p>
            <p>Kec. Binjai Kota, Kota Binjai, Sumatera Utara 20741</p>
            <p class="mt-3"><strong>Phone:</strong> <span>06126367272</span></p>
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
            <li><i class="bi bi-chevron-right"></i> <a href="#">Kontak</a></li>
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

    <!-- Contact Form JavaScript -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm');
        const loading = document.querySelector('.loading');
        const errorMessage = document.querySelector('.error-message');
        const sentMessage = document.querySelector('.sent-message');

        contactForm.addEventListener('submit', function(e) {
          e.preventDefault();
          
          // Show loading
          loading.style.display = 'block';
          errorMessage.style.display = 'none';
          sentMessage.style.display = 'none';

          // Get form data
          const formData = new FormData(contactForm);

          // Send AJAX request
          fetch('/contact', {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
          })
          .then(response => response.json())
          .then(data => {
            loading.style.display = 'none';
            
            if (data.success) {
              sentMessage.style.display = 'block';
              contactForm.reset();
              
              // Hide success message after 5 seconds
              setTimeout(() => {
                sentMessage.style.display = 'none';
              }, 5000);
            } else {
              errorMessage.textContent = data.message || 'Terjadi kesalahan. Silakan coba lagi.';
              errorMessage.style.display = 'block';
            }
          })
          .catch(error => {
            loading.style.display = 'none';
            errorMessage.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
            errorMessage.style.display = 'block';
            console.error('Error:', error);
          });
        });
      });
    </script>

    </body>
</html>