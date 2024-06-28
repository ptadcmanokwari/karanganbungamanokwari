<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Tabel Slider</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addSliderBaru" class="btn_1">Tambah
                                    Slider Baru</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table id="tabelSlider" class="table lms_table_active bordered">
                            <thead>
                                <tr>
                                    <th class="w-5" scope="col">No.</th>
                                    <th class="w-25" scope="col">Gambar</th>
                                    <th class="w-25" scope="col">Judul</th>
                                    <th class="w-25" scope="col">Subjudul</th>
                                    <th class="w-15" scope="col">Status</th>
                                    <th class="w-15" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sliders as $index => $slider) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td>
                                            <div class="zoom-container">
                                                <img class="w-100 zoom-in img-thumbnail" src="<?= base_url('uploads/slider/' . $slider['img']) ?>" alt="Slider Image">
                                            </div>
                                        </td>
                                        <td><?= $slider['title']; ?></td>
                                        <td><?= $slider['subtitle']; ?></td>
                                        <td>
                                            <input type="checkbox" class="status-toggle" data-id="<?= $slider['id'] ?>" <?= $slider['is_active'] ? 'checked' : '' ?>>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm delete-slider" data-id="<?= $slider['id'] ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="addSliderBaru" tabindex="-1" aria-labelledby="addSliderBaruLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSliderBaruLabel">Tambah Slider Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sliderUploadForm" action="<?= base_url('admin/save_sliders'); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="sliderImage" class="form-label">Gambar Slider</label>
                        <div class="dropzone" id="sliderImage"></div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="status" id="status" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="title">Judul Slider</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle">Subjudul Slider</label>
                        <input class="form-control" type="text" name="subtitle" id="subtitle">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Unggah Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        var sliderImageDropzone = new Dropzone("#sliderImage", {
            url: "<?= base_url('admin/save_sliders'); ?>",
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            maxFiles: 1,
            dictDefaultMessage: "Seret gambar ke sini untuk unggah",
            autoProcessQueue: false,
            init: function() {
                var dz = this;

                // On form submit
                $("#sliderUploadForm").on("submit", function(e) {
                    e.preventDefault();
                    dz.processQueue();
                });

                this.on("sending", function(file, xhr, formData) {
                    formData.append("status", $("input[name='status']:checked").val());
                    formData.append("title", $("input[name='title']").val());
                    formData.append("subtitle", $("input[name='subtitle']").val());
                });

                this.on("success", function(file, response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Slider baru telah diunggah.',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#addSliderBaru').modal('hide');
                            location.reload();
                        }
                    });
                });

                this.on("error", function(file, response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Slider baru belum berhasil diunggah.',
                    });
                });
            }
        });

        $('#tabelSlider .status-toggle').bootstrapSwitch();
        $('#tabelSlider .status-toggle').on('switchChange.bootstrapSwitch', function(event, state) {
            var sliderId = $(this).data('id');
            var newStatus = state ? 1 : 0;

            var activeSliders = $('#tabelSlider .status-toggle:checked').length;

            if (newStatus === 1 && activeSliders >= 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Hanya dapat mengaktifkan 5 slider',
                });
                $(this).bootstrapSwitch('state', false, true);
                return false;
            }

            $.ajax({
                url: "<?= base_url('admin/status_sliders'); ?>",
                type: "POST",
                data: {
                    id: sliderId,
                    status: newStatus
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Status telah berubah.',
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Status belum berubah.',
                    });
                }
            });
        });

        // Handle delete action for slider
        $('#tabelSlider .delete-slider').on('click', function() {
            var sliderId = $(this).data('id');

            Swal.fire({
                title: 'Anda yakin?',
                text: "Aksi ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('admin/delete_sliders'); ?>",
                        type: "POST",
                        data: {
                            id: sliderId
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Slider telah dihapus.',
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Slider belum dihapus',
                            });
                        }
                    });
                }
            });
        });


    });
</script>

<?= $this->endSection() ?>