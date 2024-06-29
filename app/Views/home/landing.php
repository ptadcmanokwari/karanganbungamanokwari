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
    <meta property="og:image" content="<?= base_url(); ?>uploads/karanganbungamanokwari.jpg">
    <meta property="og:url" content="https://karanganbungamanokwari.com">
    <meta property="og:type" content="website">
    <!-- Favicons -->
    <link href="<?= base_url() . $faviconapple; ?>" rel="icon">
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

    <!-- Main CSS File -->
    <link href="<?= base_url(); ?>frontend/assets/css/main.css" rel="stylesheet">

    <style>
    * {
        font-family: 'Figtree', sans-serif !important;
    }

    :root {
        --accent-color: #ff78af !important;
        --nav-dropdown-hover-color: #8d0049 !important;
    }

    #produk .popular-label {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: red;
        color: white;
        padding: 5px 25px 5px 10px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 3px;
        clip-path: polygon(100% 0, 83% 52%, 100% 100%, 0% 100%, 0% 0%);
        z-index: 999;
    }

    #produk .service-item {
        position: relative;
    }

    .hero p span {
        letter-spacing: 1px;
        border-bottom: 2px solid var(--accent-color);
        font-size: 40px;
        font-weight: bold;
        color: #efedb3;
    }

    h4.font-weight-bold {
        color: #272829;
        font-weight: bold;
    }

    a.btn.btn-success {
        font-size: 14px !important;
    }

    footer#footer {
        background-color: #8d0049 !important;
        color: #fff !important;
    }


    #tombolPesan {
        background-color: #ff78af;
        color: #fff;
    }

    li.filter-active {
        background-color: #ff78af !important;
        color: #fff !important;
        padding: 10px !important;
        border-radius: 5px;
    }

    /* section#kontak {
        background: rgb(255, 255, 255);
        background: linear-gradient(90deg, rgba(255, 255, 255, 1) 0%, rgba(255, 25, 234, 0.773546918767507) 47%, rgba(255, 167, 238, 1) 100%);
    } */

    section#beranda {
        padding-bottom: 0 !important;
    }

    section#produk {
        background-color: #ecf0f6 !important;
    }

    .carousel-indicators img {
        width: 150px;
        display: block;
        border: 4px solid #fff;
    }

    .carousel-indicators button {
        width: max-content !important;
    }

    .carousel-indicators {
        position: unset;
    }

    #beranda img.w-100 {
        height: 50rem !important;
        object-fit: cover;
        object-position: center;
    }

    .carousel-indicators {
        position: absolute;
        right: 0;
        bottom: 40px;
        left: 0;
        z-index: 2;
        display: flex;
        justify-content: center;
        padding: 0;
        margin-right: 15%;
        margin-bottom: 1rem;
        margin-left: 15%;
    }

    .carousel-item {
        position: relative;
    }

    .carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .carousel-item img {
        position: relative;
        z-index: 0;
    }

    .carousel-caption {
        z-index: 2;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        width: 80% !important;
    }

    #beranda h5 {
        font-size: 30px !important;
        color: #fff !important;
        font-weight: bold !important;
        text-transform: capitalize;
    }

    #tombolPesan {
        display: inline-block;
        transition: transform 0.3s ease;
        animation: zoom 3s infinite alternate;
    }

    @keyframes zoom {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.1);
        }
    }

    #btnOrder {
        display: inline-block;
        transition: transform 0.3s ease;
    }

    #btnOrder:hover,
    #btnOrder:focus {
        animation: animasi 0.6s infinite alternate !important;
        background-color: #149ddd !important;
    }

    @keyframes animasi {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.1);
        }
    }

    .namaProduk {
        color: #8d0049 !important;
    }

    .carousel-caption h1 {
        font-size: 55px !important;
        font-weight: bold;
        color: #fff !important;
    }

    .carousel-caption p.subtitle {
        font-size: 25px !important;
        font-weight: bold !important;
    }

    .testimonials .swiper-wrapper {
        justify-content: space-evenly !important;
    }

    .testimonials .testimonial-item .testimonial-img {
        width: 96% !important;
        border-radius: 0 !important;
        margin: 0 2% !important;
    }

    img.slider {
        max-width: 100%;
        height: auto !important;
    }

    .contact .info-item i {
        color: #fff;
        background: #ff88c5;
    }

    .portfolio-item img {
        height: 200px;
        /* Sesuaikan tinggi sesuai kebutuhan Anda */
        object-fit: cover;
        /* Mempertahankan aspek rasio dan memastikan gambar terpotong sesuai dengan kontainer */
        width: 100%;
    }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>
        <img src="<?= base_url() . $logo; ?>" alt="">
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
                <li><a href="#beranda" class="active"><i class="bi bi-house navicon"></i>Beranda</a></li>
                <li><a href="#tentang"><i class="bi bi-person navicon"></i> Tentang Kami</a></li>
                <li><a href="#produk"><i class="bi bi-file-earmark-text navicon"></i> Produk</a></li>
                <li><a href="#galeri"><i class="bi bi-images navicon"></i> Galeri</a></li>
                <li><a href="#testimoni"><i class="bi bi-chat-square-quote navicon"></i> Testimoni</a></li>
                <li><a href="#kontak"><i class="bi bi-envelope navicon"></i> Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <section id="beranda" class="pt-0">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $activeSliders = array_filter($sliders, function ($slide) {
                        return $slide['is_active'] == 1;
                    });
                    $activeSliders = array_values($activeSliders);
                    $intervalslider = 2000;
                    foreach ($activeSliders as $index => $slide) : ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>"
                        data-bs-interval="<?= $intervalslider; ?>">
                        <img src="<?= base_url('uploads/slider/' . $slide['img']); ?>" class="slider" alt="...">
                    </div>

                    <?php $intervalslider += 2000;
                    endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="welcome" class="testimonials section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Selamat Datang di Website Karangan Bunga Manokwari</h2>
                <p><?= $textwelcome; ?>
                </p>
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
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                            },
                            "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 1
                            }
                        }
                    }
                    </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Ucapan Selamat dan Sukses, Selamat Atas Promosi Jabatan, Selamat Atas Kenaikan
                                        Pangkat, dll.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <a href="<?= base_url(); ?>section_welcome/UcapanSelamat.jpg"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                    <img src="<?= base_url(); ?>section_welcome/UcapanSelamat.jpg"
                                        class="testimonial-img zoom-in" alt="Karangan Bunga Manokwari Ucapan Selamat dan
                                        Sukses, Selamat Atas Promosi Jabatan, Selamat Atas Kenaikan Pangkat"></a>

                                <!-- <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4> -->
                            </div>
                        </div><!-- End testimonial item -->



                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Ucapan Duka Cita, Bela Sungkawa, Turut Berduka Cita, Turut Berbela Sungkawa,
                                        dll </span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <a href="<?= base_url(); ?>section_welcome/UcapanDuka.jpg"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                    <img src="<?= base_url(); ?>section_welcome/UcapanDuka.jpg" class="testimonial-img"
                                        alt="Karangan Bunga Manokwari Ucapan Duka Cita, Bela Sungkawa, Turut Berduka Cita, Turut Berbela Sungkawa">
                                </a>
                                <!-- <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4> -->
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Ucapan Selamat Hari Ulang Tahun, Dirgahayu, Selamat Hari Jadi, Anniversary,
                                        dll.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <a href="<?= base_url(); ?>section_welcome/UcapanHUT.jpg"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                    <img src="<?= base_url(); ?>section_welcome/UcapanHUT.jpg" class="testimonial-img"
                                        alt="Karangan Bunga Manokwari Ucapan Selamat Hari Ulang Tahun, Dirgahayu, Selamat Hari Jadi, Anniversary">
                                </a>
                                <!-- <h3>Saul Goodman</h3>
                                 <h4>Ceo &amp; Founder</h4> -->
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Ucapan Selamat atas Peresmian suatu Kantor, Launching Bisnis, Pendirian Usaha,
                                        dll.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <a href="<?= base_url(); ?>section_welcome/UcapanLaunching.jpg"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                    <img src="<?= base_url(); ?>section_welcome/UcapanLaunching.jpg"
                                        class="testimonial-img"
                                        alt="Karangan Bunga Manokwari Ucapan Selamat atas Peresmian suatu Kantor, Launching Bisnis, Pendirian Usaha,">
                                </a>
                                <!-- <h3>Saul Goodman</h3>
                                 <h4>Ceo &amp; Founder</h4> -->
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->




        <!-- About Section -->
        <section id="tentang" class="about section"
            style="background-image: url('<?= base_url(); ?>Login_v16/bg3.jpg'); background-repeat: no-repeat; background-size: cover;">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <div class="row gy-4 justify-content-center">
                    <h2>Tentang Kami</h2>
                    <div class="col-lg-5">
                        <img src="<?= base_url(); ?>frontend/assets/img/mitrafloristmkw.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-7 content">
                        <div class="row">
                            <div class="col-lg-12">
                                <p><?= $texttentang; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-4">
                                <h4 class="font-weight-bold">Pesan Papan Bunga Mudah dan Cepat</h4>
                                <p>Kini giliran Anda membuktikannya!</p>
                                <a id="tombolPesan" class="btn btn-lg mt-3" href="#produk" data-aos="fade-up">Pesan
                                    Sekarang!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Section Title -->


        </section><!-- /About Section -->



        <!-- Produk Section -->
        <section id="produk" class="services portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-right">
                <h2>Produk</h2>
                <p><?= $textproduk; ?></p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4 mb-5">
                    <?php $no = 1;
                    foreach ($produk as $listproduk) { ?>
                    <div class="portfolio-content col-lg-3 col-md-6 service-item d-flex flex-column px-3"
                        data-aos="fade-right" data-aos-delay="100">
                        <a href="<?= base_url(); ?>uploads/products/<?= $listproduk['gambar']; ?>"
                            data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                            <?php if ($listproduk['is_popular'] == 1) : ?>
                            <div class="popular-label">Terlaris !!!</div>
                            <?php endif; ?>
                            <img src="<?= base_url(); ?>uploads/products/<?= $listproduk['gambar']; ?>"
                                class="w-100 h-100 img-fluid" alt="<?= $listproduk['nama']; ?>"
                                style="height: 200px !important; object-fit: cover !important;">
                        </a>
                        <div>
                            <h4 class="title text-center mt-3">
                                <p class="mb-1 namaProduk"><?= $listproduk['nama']; ?></p>
                                <p class="hargaProduk">Harga <?= $listproduk['harga']; ?></p>
                            </h4>
                        </div>
                        <a id="btnOrder"
                            href="https://api.whatsapp.com/send?phone=<?= $whatsapp; ?>&text=Halo%20Karangan%20Bunga%20Manokwari%0A%0ASaya%20mau%20order%20Papan%20Bunga%20<?= $listproduk['nama']; ?>%0A%0ATerima%20Kasih."
                            target="_blank" class="btn btn-success btnOrder"
                            style="background-color: #25D366; border-color: #25D366; color: white;">
                            <i class="bi bi-whatsapp"></i> Pesan Sekarang
                        </a>
                    </div>
                    <?php } ?>

                </div>

            </div>



        </section><!-- /Produk Section -->

        <!-- Galeri Section -->
        <section id="galeri" class="portfolio section"
            style="background-image: url('<?= base_url(); ?>Login_v16/bg2.jpg');">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Galeri</h2>
                <p><?= $textgaleri; ?></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php $no = 1;
                        foreach ($kategori_galeri as $listkategori_galeri) {
                            $listkategori_galerix = url_title($listkategori_galeri['kategori'], '-', true);
                        ?>

                        <li data-filter=".filter-<?= $listkategori_galerix; ?>"><?= $listkategori_galeri['kategori']; ?>
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
                                        class="img-fluid" alt="">

                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Galeri Section -->


        <section id="testimoni" class="testimonials section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimoni</h2>
                <p><?= $texttestimonials; ?>
                </p>
            </div>
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
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                            },
                            "1200": {
                                "slidesPerView": 4,
                                "spaceBetween": 1
                            }
                        }
                    }
                    </script>
                    <div class="swiper-wrapper">
                        <?php foreach ($testimonials as $testi) : ?>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <a href="<?= base_url('uploads/testimonials/' . $testi['gambar']) ?>"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                    <img src="<?= base_url('uploads/testimonials/' . $testi['gambar']) ?>"
                                        class="testimonial-img zoom-in" alt="Testimonial Image">
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->
        <!-- Contact Section -->
        <section id="kontak" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
                <p><?= $textkontak; ?></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-12">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="info-item d-flex mb-2" data-aos="fade-up" data-aos-delay="100">
                                        <i class="bi bi-telephone flex-shrink-0"></i>
                                        <div>
                                            <h3>Telepon</h3>
                                            <p><a href="tel:<?= $whatsapp; ?>"
                                                    style="color:black !important;"><?= $whatsapp; ?></a></p><br>
                                        </div>
                                    </div><!-- End Info Item -->
                                </div><!-- End Info Item -->
                                <div class="col-lg-3">
                                    <div class="info-item d-flex mb-2" data-aos="fade-up" data-aos-delay="100">
                                        <i class="bi bi-whatsapp flex-shrink-0"></i>
                                        <div>
                                            <h3>Whatsapp</h3>
                                            <p><a href="https://wa.me/<?= $whatsapp; ?>" target="_blank"
                                                    style="color:black !important;"><?= $whatsapp; ?></a></p><br>
                                        </div>
                                    </div><!-- End Info Item -->
                                </div><!-- End Info Item -->
                                <div class="col-lg-3">
                                    <div class="info-item d-flex mb-2" data-aos="fade-up" data-aos-delay="100">
                                        <i class="bi bi-facebook flex-shrink-0"></i>
                                        <div>
                                            <h3>Facebook</h3>
                                            <p><a href="htttps://facebook.com/<?= $facebook; ?>" target="_blank"
                                                    style="color:black !important;"><?= $facebook; ?></a></p><br>
                                        </div>
                                    </div><!-- End Info Item -->
                                </div>
                                <div class="col-lg-3">
                                    <div class="info-item d-flex mb-2" data-aos="fade-up" data-aos-delay="100">
                                        <i class="bi bi-instagram flex-shrink-0"></i>
                                        <div>
                                            <h3>Instagram</h3>
                                            <p><a href="<?= $instagram; ?>" target="_blank"
                                                    style="color:black !important;"><?= $instagram; ?></a></p><br>
                                        </div>
                                    </div><!-- End Info Item -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="info-item d-flex mb-3" data-aos="fade-up" data-aos-delay="100">
                                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                                        <div>
                                            <h3>Alamat Toko Utama</h3>
                                            <p><?= $alamat1; ?></p><br>
                                        </div>
                                    </div><!-- End Info Item -->
                                    <div class="info-item d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.477874618451!2d134.0664004!3d-0.859442!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d540b4bea091de9%3A0xbc127d1ab16c5502!2sMitra%20florist%20Manokwari!5e0!3m2!1sid!2sid!4v1718990853630!5m2!1sid!2sid"
                                            frameborder="0" style="border:0; width: 100%; height: 400px;"
                                            allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div><!-- End Info Item -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="info-item d-flex mb-3" data-aos="fade-up" data-aos-delay="100">
                                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                                        <div>
                                            <h3>Alamat Toko Cabang</h3>
                                            <p><?= $alamat2; ?></p><br>
                                        </div>
                                    </div><!-- End Info Item -->
                                    <div class="info-item d-flex mb-4" data-aos="fade-up" data-aos-delay="100">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3989.3315242058134!2d133.85001507496506!3d-0.8950329990963015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwNTMnNDIuMSJTIDEzM8KwNTEnMDkuMyJF!5e0!3m2!1sid!2sid!4v1719533240687!5m2!1sid!2sid"
                                            frameborder="0" style="border:0; width: 100%; height: 400px;"
                                            allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div><!-- End Info Item -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer position-relative">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright 2024 | Karangan Bunga Manokwari</span></p>
            </div>
            <div class="credits">
                Designed by <a href="https://arasoft.id/" target="_blank">Arasoft Digital Creative</a>
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