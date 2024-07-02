<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $sitetitle . ' | ' . $sitedesc; ?></title>
    <!-- <meta content="" name="description">
    <meta content="" name="keywords"> -->
    <meta name="description"
        content="Jasa pembuatan karangan papan bunga untuk berbagai acara dan momen. Kami menyediakan papan bunga dengan desain elegan dan bahan berkualitas tinggi untuk pernikahan, ucapan selamat, ucapan duka cita, dan lainnya. Pesan sekarang untuk pengiriman cepat dan pelayanan terbaik.">
    <meta name="keywords"
        content="karangan papan bunga, jasa pembuatan bunga papan, desain papan bunga, papan bunga pernikahan, papan bunga ucapan selamat, papan bunga duka cita, bunga papan murah">
    <meta name="author" content="Karangan Bunga Manokwari">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Karangan Bunga Manokwari">
    <meta property="og:description"
        content="Jasa pembuatan karangan papan bunga untuk berbagai acara dan momen. Desain elegan dan bahan berkualitas tinggi untuk pernikahan, ucapan selamat, acara duka cita, dan lainnya. Pesan sekarang untuk pengiriman cepat dan pelayanan terbaik.">
    <meta property="thumbnail" content="<?= base_url(); ?>uploads/karanganbungamanokwari.webp">
    <meta property="og:image" content="<?= base_url(); ?>uploads/karanganbungamanokwari.webp">
    <meta property="og:url" content="https://karanganbungamanokwari.com">
    <meta property="og:type" content="website">
    <!-- Favicons -->
    <link href="<?= base_url() . $favicon; ?>" rel="icon">
    <link href="<?= base_url() . $faviconapple; ?>" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>frontend/assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>frontend/assets/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>frontend/assets/vendors/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>frontend/assets/vendors/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>frontend/assets/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    <!-- Main CSS File -->
    <link href="<?= base_url(); ?>frontend/assets/css/main.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/palingcustomfrontend.css" rel="stylesheet">

</head>

<body class="index-page">
    <header id="header" class="header d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>
        <img src="<?= base_url() . $logo; ?>" alt="Karangan Bunga Manokwari Spesialis Papan Bunga">
        <div class="social-links text-center">
            <a href="https://wa.me/<?= $whatsapp; ?>" class="whatsapp" target="_blank"><i
                    class="bi bi-whatsapp"></i></a>
            <a href="tel:<?= $whatsapp; ?>" class="phone" target="_blank"><i class="bi bi-telephone"></i></a>
            <a href="https://facebook.com/<?= $facebook; ?>" class="facebook" target="_blank"><i
                    class="bi bi-facebook"></i></a>
            <a href="https://instagram.com/<?= $instagram; ?>" class="instagram" target="_blank"><i
                    class="bi bi-instagram"></i></a>
        </div>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?= base_url(); ?>#beranda" class="active"><i class="bi bi-house navicon"></i>Beranda</a>
                </li>
                <li><a href="<?= base_url(); ?>#tentang"><i class="bi bi-person navicon"></i> Tentang Kami</a></li>
                <li><a href="<?= base_url(); ?>#produk"><i class="bi bi-file-earmark-text navicon"></i> Produk</a></li>
                <li><a href="<?= base_url(); ?>#galeri"><i class="bi bi-images navicon"></i> Galeri</a></li>
                <li><a href="<?= base_url(); ?>#testimoni"><i class="bi bi-chat-square-quote navicon"></i> Testimoni</a>
                </li>
                <li><a href="<?= base_url(); ?>#kontak"><i class="bi bi-envelope navicon"></i> Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">

        <!-- Galeri Section -->
        <section id="galeri" class="portfolio section"
            style="background-image: url('<?= base_url(); ?>Login_v16/bg2.jpg');">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Galeri</h2>
                <p><?= $textgaleri; ?></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php $no = 1;
                        foreach ($kategori_galeri as $listkategori_galeri) {
                            $listkategori_galerix = url_title($listkategori_galeri['kategori'], '-', true);
                        ?>

                        <li data-filter=".filter-<?= $listkategori_galerix; ?>">
                            <?= $listkategori_galeri['kategori']; ?>
                        </li>
                        <?php $no++;
                        } ?>
                    </ul>

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        <?php $no = 1;
                        foreach ($galeri as $listgaleri) {
                            $listgalerix = url_title($listgaleri['kategori'], '-', true);
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?= $listgalerix; ?>">
                            <div class="portfolio-content h-100">
                                <a href="<?= base_url(); ?>uploads/gallery/<?= $listgaleri['img']; ?>"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                    <img src="<?= base_url(); ?>uploads/gallery/<?= $listgaleri['img']; ?>"
                                        class="img-fluid" alt="Karangan Bungan Manokwari <?= $listgalerix; ?>">

                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div><!-- End Portfolio Container -->
                </div>

            </div>

        </section><!-- /Galeri Section -->




    </main>

    <footer id="footer" class="footer position-relative">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright 2024 | Karangan Bunga Manokwari</span></p>
            </div>
            <div class="credits">
                Designed by <a href="https://arasoft.id/" target="_blank" style="color:white;">Arasoft Digital
                    Creative</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/aos/aos.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/typed.js/typed.umd.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>frontend/assets/vendors/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url(); ?>frontend/assets/js/main.js"></script>
    <script>
    const tombolPesan = document.getElementById('tombolPesan');
    let scaleDirection = 1;

    function animateButton() {
        if (scaleDirection === 1) {
            tombolPesan.style.transform = 'scale(1.1)';
            scaleDirection = -1;
        } else {
            tombolPesan.style.transform = 'scale(1)';
            scaleDirection = 1;
        }
    }

    setInterval(animateButton, 100);
    </script>
</body>

</html>