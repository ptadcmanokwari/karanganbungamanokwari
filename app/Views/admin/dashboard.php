<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div class="main_content_iner">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row">
            <div class="col-lg-12">
                <div class="box_header">
                    <div class="main-title">
                        <h4 class="mb-0">Panduan Admin www.karanganbungamanokwari.com </h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="accordion" id="panduanPanelAdmin">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aksesPanelAdmin" aria-expanded="true" aria-controls="aksesPanelAdmin">
                                <i class="bi bi-person-fill"></i> Akses Panel Admin
                            </button>
                        </h2>
                        <div id="aksesPanelAdmin" class="accordion-collapse collapse" data-bs-parent="#panduanPanelAdmin">
                            <div class="accordion-body">
                                <iframe src="<?= base_url(); ?>/uploads/panduan/akses-panel-admin.pdf" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pengaturanProduk" aria-expanded="false" aria-controls="pengaturanProduk">
                                <i class="mr-2 bi bi-box-seam"></i> Pengaturan Produk
                            </button>
                        </h2>
                        <div id="pengaturanProduk" class="accordion-collapse collapse" data-bs-parent="#panduanPanelAdmin">
                            <div class="accordion-body">
                                <iframe src="<?= base_url(); ?>/uploads/panduan/pengaturan-produk.pdf" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pengaturanGaleri" aria-expanded="false" aria-controls="pengaturanGaleri">
                                <i class="mr-2 bi bi-images"></i> Pengaturan Galeri
                            </button>
                        </h2>
                        <div id="pengaturanGaleri" class="accordion-collapse collapse" data-bs-parent="#panduanPanelAdmin">
                            <div class="accordion-body">
                                <iframe src="<?= base_url(); ?>/uploads/panduan/pengaturan-galeri.pdf" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pengaturanSlider" aria-expanded="false" aria-controls="pengaturanSlider">
                                <i class="mr-2 bi bi-sliders"></i> Pengaturan Slider
                            </button>
                        </h2>
                        <div id="pengaturanSlider" class="accordion-collapse collapse" data-bs-parent="#panduanPanelAdmin">
                            <div class="accordion-body">
                                <iframe src="<?= base_url(); ?>/uploads/panduan/pengaturan-slider.pdf" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pengaturanHalaman" aria-expanded="false" aria-controls="pengaturanHalaman">
                                <i class="mr-2 bi bi-file-earmark-text"></i> Pengaturan Halaman
                            </button>
                        </h2>
                        <div id="pengaturanHalaman" class="accordion-collapse collapse" data-bs-parent="#panduanPanelAdmin">
                            <div class="accordion-body">
                                <iframe src="<?= base_url(); ?>/uploads/panduan/pengaturan-halaman.pdf" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pengaturanSistem" aria-expanded="false" aria-controls="pengaturanSistem">
                                <i class="mr-2 bi bi-gear-fill"></i> Pengaturan Sistem
                            </button>
                        </h2>
                        <div id="pengaturanSistem" class="accordion-collapse collapse" data-bs-parent="#panduanPanelAdmin">
                            <div class="accordion-body">
                                <iframe src="<?= base_url(); ?>/uploads/panduan/pengaturan-sistem.pdf" width="100%" height="700px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>