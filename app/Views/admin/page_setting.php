<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div class="main_content_iner">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row">
            <div class="col-lg-12">
                <div class="box_header">
                    <div class="main-title">
                        <h4 class="mb-0">Pengaturan Halaman</h4>
                    </div>
                </div>
            </div>
            <form id="pageSettingForm" method="POST">
                <div class="col-lg-12">
                    <div class="row">

                        <?php foreach ($setting as $item) : ?>
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="<?= $item['parameter'] ?>">
                                        <?= ucwords(str_replace('-', ' ', $item['parameter'])); ?>
                                    </label>
                                    <textarea class="form-control" id="<?= $item['parameter'] ?>" name="<?= $item['parameter'] ?>"><?= $item['nilai']; ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="mb-3 flex-end">
                            <button type="submit" class="btn btn-primary" id="savepageSettingForm">Perbarui Pengaturan
                                Halaman</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#pageSettingForm').submit(function(e) {
        e.preventDefault();
        console.log('Form submitted'); // Debugging line

        var form = $(this);
        var url = "<?= base_url('admin/update_page_setting') ?>"; // Pastikan URL sesuai

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
                    window.location.href = "<?= base_url('admin/page_setting') ?>";
                });
            },
            error: function(response) {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menyimpan data.',
                    icon: 'error'
                });
            }
        });
    });
</script>


<?= $this->endSection() ?>