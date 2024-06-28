<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="Jasa pembuatan karangan papan bunga untuk berbagai acara dan momen. Kami menyediakan papan bunga dengan desain elegan dan bahan berkualitas tinggi untuk pernikahan, ucapan selamat, ucapan duka cita, dan lainnya. Pesan sekarang untuk pengiriman cepat dan pelayanan terbaik.">
    <meta name="keywords" content="karangan papan bunga, jasa pembuatan bunga papan, desain papan bunga, papan bunga pernikahan, papan bunga ucapan selamat, papan bunga duka cita, bunga papan murah">
    <meta name="author" content="Karangan Bunga Manokwari">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Karangan Bunga Manokwari">
    <meta property="og:description" content="Jasa pembuatan karangan papan bunga untuk berbagai acara dan momen. Desain elegan dan bahan berkualitas tinggi untuk pernikahan, ucapan selamat, acara duka cita, dan lainnya. Pesan sekarang untuk pengiriman cepat dan pelayanan terbaik.">
    <meta property="og:image" content="<?= base_url(); ?>uploads/karanganbungamanokwari.jpg">
    <meta property="og:url" content="https://karanganbungamanokwari.com">
    <meta property="og:type" content="website">
    <title><?= $title; ?></title>
    <!-- Favicons -->
    <link href="<?= base_url(); ?>frontend/assets/img/settings/favicon_io/favicon.ico" rel="icon">
    <link href="<?= base_url(); ?>frontend/assets/img/settings/favicon_io/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="<?= base_url(); ?>backend/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/swiper_slider/css/swiper.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/select2/css/select2.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/morris/morris.css">

    <link rel="stylesheet" href="<?= base_url(); ?>backend/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>backend/css/metisMenu.css">

    <link rel="stylesheet" href="<?= base_url(); ?>backend/css/style1.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>backend/css/colors/default.css" id="colorSkinCSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet">

    <!-- Swall -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
    <style>
        .sidebar #sidebar_menu li.mm-active>a {
            color: #1f253a;
            font-weight: bold;
        }

        .dropzone {
            border: 2px dashed #007bff;
            border-radius: 5px;
            background: white;
        }

        div#sliderImage {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        i.bi.bi-grid-fill.ml-2 {
            margin: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Slider, galeri, produk */
        .zoom-container {
            overflow: hidden;
            width: 100%;
            /* height: 230px; */
            position: relative;
        }

        .zoom-in {
            transition: transform 0.3s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .zoom-in:hover {
            transform: scale(1.5);
        }

        /* gambar Produk */
        #tabelSlider img,
        #tabelGaleri img,
        #tabelProduk img {
            height: 150px !important;
            object-fit: cover;
        }

        #panduanPanelAdmin i {
            margin-right: 10px !important;
        }
    </style>

    <script src="<?= base_url(); ?>backend/js/jquery1-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>backend/js/popper1.min.js"></script>
    <script src="<?= base_url(); ?>backend/js/bootstrap1.min.js"></script>
    <script src="<?= base_url(); ?>backend/js/metisMenu.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/count_up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/chartlist/Chart.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/count_up/jquery.counterup.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/swiper_slider/js/swiper.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/niceselect/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/owl_carousel/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/gijgo/gijgo.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/jszip.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/datatable/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>backend/js/chart.min.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/progressbar/jquery.barfiller.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/tagsinput/tagsinput.js"></script>
    <script src="<?= base_url(); ?>backend/vendors/text_editor/summernote-bs4.js"></script>
</head>

<body class="crm_body_bg">

    <nav class="sidebar">
        <div class="logo d-flex justify-content-between mb-0 pb-1">Panel Admin
        </div>
        <ul id="sidebar_menu">
            <li class="<?= ($current_uri == 'dashboard' || $current_uri == 'admin') ? 'mm-active' : '' ?>">
                <a href="<?= base_url('admin/dashboard'); ?>" aria-expanded="false">
                    <i class="bi bi-laptop" style="font-size: 1.5rem;"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="<?= ($current_uri == 'products') ? 'mm-active' : '' ?>">
                <a href="<?= base_url('admin/products'); ?>" aria-expanded="false">
                    <i class="bi bi-box-seam" style="font-size: 1.5rem;"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="<?= ($current_uri == 'gallery') ? 'mm-active' : '' ?>">
                <a href="<?= base_url('admin/gallery'); ?>" aria-expanded="false">
                    <i class="bi bi-images" style="font-size: 1.5rem;"></i>
                    <span>Galeri</span>
                </a>
            </li>

            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="bi bi-gear" style="font-size: 1.5rem;"></i>
                    <span>Pengaturan</span>
                </a>
                <ul>
                    <li class="<?= ($current_uri == 'sliders') ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('admin/sliders'); ?>" aria-expanded="false">
                            <span>Slider</span>
                        </a>
                    </li>
                    <li class="<?= ($current_uri == 'page_setting') ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('admin/page_setting'); ?>" aria-expanded="false">
                            <span>Halaman</span>
                        </a>
                    </li>
                    <li class="<?= ($current_uri == 'system_setting') ? 'mm-active' : '' ?>">
                        <a href="<?= base_url('admin/system_setting'); ?>" aria-expanded="false">
                            <span>Sistem</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?= ($current_uri == 'galeri') ? 'mm-active' : '' ?>">
                <a href="<?= base_url(); ?>/logout" aria-expanded="false">
                    <i class="bi bi-box-arrow-right" style="font-size: 1.5rem;"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>


    <section class="main_content dashboard_part">
        <div class="container-fluid g-0 d-lg-none d-md-none">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none d-md-none">
                            <i class="bi bi-grid-fill ml-2" style="font-size: 1.5rem; margin-left: 7px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->renderSection('content') ?>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="footer_iner text-center">
                            <p>2024 © Karangan Bunga Manokwari - Designed with <i class="bi bi-heart-fill"></i> by<a href="https://arasoft.id/" target="_blank"> Arasoft Digital Creative</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>


</html>