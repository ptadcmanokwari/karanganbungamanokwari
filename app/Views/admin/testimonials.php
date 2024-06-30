<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Tabel Galeri</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addNewTestimonial"
                                    class="btn_1">Tambah
                                    Testimoni Baru</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table id="tabelTestimoni" class="table lms_table_active bordered">
                            <thead>
                                <tr style="text-align:center;">
                                    <th class="w-5" scope="col">No.</th>
                                    <th class="w-25" scope="col">Gambar</th>
                                    <th class="w-50" scope="col">Status</th>
                                    <th class="w-25" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($testimonials as $index => $testi) : ?>
                                <tr style="text-align:center;">
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <div class="zoom-container">
                                            <a href="<?= base_url('uploads/testimonials/' . $testi['gambar']) ?>"
                                                data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                                <img class="w-100 zoom-in img-thumbnail"
                                                    src="<?= base_url('uploads/testimonials/' . $testi['gambar']) ?>"
                                                    alt="Testimoni Image">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="status-toggle" data-size="normal"
                                            data-on-text="Active" data-off-text="Inactive" data-id="<?= $testi['id'] ?>"
                                            <?= $testi['is_active'] ? 'checked' : '' ?>>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm delete-testimoni"
                                            data-id="<?= $testi['id'] ?>">Hapus</button>
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
<div class="modal fade" id="addNewTestimonial" tabindex="-1" aria-labelledby="addNewTestimonialLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTestimonialLabel">Unggah Galeri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="TestimonialsUploadForm" action="<?= base_url('admin/save_testimonials'); ?>">
                    <div class="mb-3">
                        <span>Gambar Tesimoni</span>
                        <div class="dropzone" id="gbrTestimoni"></div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="status" id="status" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-pink">Unggah Galeri</button>
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

    $('#tabelTestimoni').DataTable({
        "searching": false,
        "bStateSave": true,
        "info": false,
        "destroy": true,
        "columnDefs": [{
                targets: [1],
                sortable: false
            },
            {
                targets: [2],
                sortable: false
            },
        ],

        "drawCallback": function(settings) {
            $('.delete-testimoni').on('click', function() {
                var testiID = $(this).data('id');

                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Aksi ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ff78af',
                    cancelButtonColor: '#5c636a',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= base_url('admin/delete_testimonials'); ?>",
                            type: "POST",
                            data: {
                                id: testiID
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Testimoni telah dihapus.',
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Testimoni belum dihapus.',
                                });
                            }
                        });
                    }
                });
            });

            $('#tabelTestimoni .status-toggle').bootstrapSwitch();
            $('#tabelTestimoni .show-home-toggle').bootstrapSwitch();

            $('#tabelTestimoni .status-toggle').on('switchChange.bootstrapSwitch', function(event,
                state) {
                var testimoniID = $(this).data('id');
                var newStatus = state ? 1 : 0;

                $.ajax({
                    url: "<?= base_url('admin/status_testimonials'); ?>",
                    type: "POST",
                    data: {
                        id: testimoniID,
                        status: newStatus
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Status telah diperbarui.',
                            timer: 1000, // Auto-close after 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false // Hide the default "OK" button
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Status belum diperbarui.',
                            timer: 1000, // Auto-close after 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false // Hide the default "OK" button
                        });
                    }
                });
            });

        },
    });

    var gbrTestimoniDropzone = new Dropzone("#gbrTestimoni", {
        url: "<?= base_url('admin/save_testimonials'); ?>",
        maxFiles: null,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: "Seret gambar ke sini untuk unggah",
        autoProcessQueue: false,
        resizeQuality: 0.6,
        parallelUploads: 10,

        checkOrientation: true,
        maxWidth: 8192,
        maxHeight: 8192,
        quality: 0.5,
        init: function() {
            var dz = this;

            $("#TestimonialsUploadForm").on("submit", function(e) {
                e.preventDefault();
                dz.processQueue();
            });

            this.on("sending", function(file, xhr, formData) {
                formData.append("status", $("input[name='status']").val());
            });

            this.on("queuecomplete", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Testimoni baru telah diunggah',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#addNewTestimonial').modal('hide');
                        location.reload();
                    }
                });
            });

            this.on("error", function(file, response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Testimoni baru tidak berhasil diunggah',
                });
            });
        }
    });

});
</script>


<?= $this->endSection() ?>