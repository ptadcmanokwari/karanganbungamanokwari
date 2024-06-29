<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div class="main_content_iner">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row">
            <div class="col-lg-12">
                <div class="box_header">
                    <div class="main-title">
                        <h4 class="mb-0">Pengaturan Sistem</h4>
                    </div>
                </div>
            </div>
            <form id="systemSettingForm" method="POST" action="<?= base_url('admin/update_system_setting') ?>">
                <div class="col-lg-12">
                    <div class="row">
                        <?php
                        $first_row_parameters = ['site-title', 'site-desc', 'instagram', 'facebook', 'whatsapp', 'favicon', 'favicon-apple', 'logo', 'website'];
                        $second_row_parameters = ['alamat', 'gambartoko1', 'alamat2', 'gambartoko2'];

                        foreach ($setting as $item) :
                            if (in_array($item['parameter'], $first_row_parameters)) :
                        ?>
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="<?= $item['parameter'] ?>">
                                            <?= ucwords(str_replace('-', ' ', $item['parameter'])); ?>
                                        </label>
                                        <input type="text" class="form-control" id="<?= $item['parameter'] ?>" name="<?= $item['parameter'] ?>" value="<?= $item['nilai']; ?>">
                                    </div>
                                </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>

                <div class="col-lg-12 mt-3">
                    <div class="row">
                        <?php foreach ($second_row_parameters as $param) :
                            foreach ($setting as $item) :
                                if ($item['parameter'] == $param) :
                                    if (strpos($param, 'gambar') !== false) : ?>
                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            <?= ucwords(str_replace('-', ' ', $item['parameter'])); ?>
                                                        </label><br>
                                                        <?php if (!empty($item['nilai'])) : ?>
                                                            <img src="<?= base_url($item['nilai']); ?>" class="img-fluid w-75">
                                                        <?php else : ?>
                                                            <p>Tidak ada gambar terunggah.</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">
                                                            Upload <?= ucwords(str_replace('-', ' ', $item['parameter'])); ?> Baru
                                                        </label>
                                                        <div class="dropzone" id="<?= $item['parameter'] ?>-dropzone">
                                                            <input type="hidden" name="<?= $item['parameter'] ?>" id="<?= $item['parameter'] ?>-input" value="<?= $item['nilai']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif (in_array($param, ['alamat', 'alamat2'])) : ?>
                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="<?= $item['parameter'] ?>">
                                                    <?= ucwords(str_replace('-', ' ', $item['parameter'])); ?>
                                                </label>
                                                <textarea class="form-control" id="<?= $item['parameter'] ?>" name="<?= $item['parameter'] ?>" rows="4"><?= $item['nilai']; ?></textarea>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="<?= $item['parameter'] ?>">
                                                    <?= ucwords(str_replace('-', ' ', $item['parameter'])); ?>
                                                </label>
                                                <input type="text" class="form-control" id="<?= $item['parameter'] ?>" name="<?= $item['parameter'] ?>" value="<?= $item['nilai']; ?>">
                                            </div>
                                        </div>
                        <?php
                                    endif;
                                endif;
                            endforeach;
                        endforeach;
                        ?>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="row">
                        <div class="mb-3 flex-end">
                            <button type="submit" class="btn btn-primary" id="saveSystemSettingForm">Perbarui Pengaturan
                                Sistem</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {

        $('#systemSettingForm').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        title: 'Sukses!',
                        text: response.message,
                        icon: 'success'
                    }).then(function() {
                        window.location.href =
                            "<?= base_url('admin/system_setting') ?>";
                    });
                },
                error: function(response) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan data.',
                        icon: 'error'
                    });
                }
            });
        });

        function initializeDropzone(param) {
            new Dropzone("#" + param + "-dropzone", {
                url: "<?= base_url('admin/upload_image') ?>", // Pastikan URL ini benar
                maxFiles: 1,
                acceptedFiles: "image/*",
                dictDefaultMessage: "Seret gambar ke sini untuk unggah",
                addRemoveLinks: true,
                init: function() {
                    var thisDropzone = this;
                    this.on("success", function(file, response) {
                        document.getElementById(param + "-input").value = response.filePath;
                    });
                    this.on("removedfile", function(file) {
                        document.getElementById(param + "-input").value = "";
                    });
                }
            });
        }

        ['gambartoko1', 'gambartoko2'].forEach(function(param) {
            initializeDropzone(param);
        });
    });
</script>

<?= $this->endSection() ?>