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
    <link href="<?= base_url(); ?>frontend/assets/vendors/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/palingcustombackend.css" rel="stylesheet">

</head>

<body class="crm_body_bg">

    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <!-- <a href="<?= base_url(); ?>admin"><img src="<?= base_url(); ?>backend/img/logo.png" alt></a> -->
            <h2>Panel Admin</h2>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu" class="mt-10">
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
            <li class="<?= ($current_uri == 'testimonials') ? 'mm-active' : '' ?>">
                <a href="<?= base_url('admin/testimonials'); ?>" aria-expanded="false">
                    <i class="bi bi-chat-square-quote" style="font-size: 1.5rem;"></i>
                    <span>Testimoni</span>
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
            <li class="<?= ($current_uri == 'logout') ? 'mm-active' : '' ?>">
                <a href="<?= base_url('logout'); ?>" aria-expanded="false">
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
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner">
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a href="<?= base_url(); ?>" target="_blank"><i class="bi bi-globe"></i> Lihat
                                        Website</a>
                                </li>
                                <li>
                                    <a href="<?= base_url(); ?>logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        <script src="<?= base_url(); ?>frontend/assets/vendors/glightbox/js/glightbox.min.js"></script>
        <script src="<?= base_url(); ?>backend/js/custom.js"></script>
        <?= $this->renderSection('content') ?>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="footer_iner text-center">
                            <p>2024 © Karangan Bunga Manokwari - Designed by<a href="https://arasoft.id/" target="_blank"> Arasoft Digital Creative</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script>
    $(document).ready(function() {
        const lightbox = GLightbox({
            selector: '.glightbox'
        });
    });
</script>

</html>