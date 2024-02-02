<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Desa Sukajaya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/theme/Arsha/') ?>assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome 4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="<?= site_url('/') ?>">Desa Sukajaya</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="<?= base_url('assets/theme/Arsha/') ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="<?= site_url('/') ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('informasi') ?>">Informasi</a></li>
                    <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?=site_url('public/surat_domisili')?>">Surat Keterangan Domisili</a></li>
                            <li><a href="<?=site_url('public/surat_keterangan_usaha')?>">Surat Keterangan Usaha</a></li>
                        </ul>
                    </li>
                    <li><a class="getstarted scrollto" href="<?= site_url('login') ?>">Masuk</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('register') ?>">Daftar</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="height: 97vh;">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h1>Desa Sukajaya</h1>
                    <h2>“Desa Sukajaya Maju Berkualitas dan Dinamis Menuju Kehidupan
                        Masyarakat Desa Yang Adil, Makmur dan Sejahtera di Tahun 2024“</h2>

                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?= base_url('assets/theme/Arsha/') ?>assets/img/hero-img.png" class="img-fluid mt-3 shadow" style="border: 10px solid white; border-radius: 10px" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <?php
        if (isset($_view)) $this->load->view($_view);
        ?>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Desa Sukajaya</h3>
                        <p>
                            Kabupaten Ciamis, Jawa Barat<br>
                            Indonesia <br><br>
                            <strong> Phone:</strong> <a href="https://wa.me/6282219309889"><i class="fa fa-whatsapp"></i> 0822-1930-9889</a><br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Link Berguna</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('/') ?>">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="<?= site_url('informasi') ?>">Informasi</a></li>
                            <li class="dropdown">
                                <i class="bx bx-chevron-right"></i>
                                <a href="#" class="" data-bs-toggle="dropdown">Layanan Masyarakat</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= site_url('public/surat_domisili') ?>">
                                        <i class="bx bx-chevron-right"></i>
                                        Surat Keterangan Domisili</a>
                                    <a class="dropdown-item" href="<?= site_url('public/surat_keterangan_usaha') ?>">
                                        <i class="bx bx-chevron-right"></i>
                                        Surat Keterangan Usaha</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                © Hak Cipta <strong><span>Desa Sukajaya</span></strong>. Seluruh Hak Dilindungi
            </div>
            <div class="credits">
                <!-- Semua tautan di footer harus tetap utuh. -->
                <!-- Anda dapat menghapus tautan hanya jika Anda membeli versi pro. -->
                <!-- Informasi lisensi: https://bootstrapmade.com/license/ -->
                <!-- Beli versi pro dengan formulir kontak PHP/AJAX berfungsi: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                Didesain oleh <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- Akhir Footer -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/theme/Arsha/') ?>assets/js/main.js"></script>



</body>

</html>