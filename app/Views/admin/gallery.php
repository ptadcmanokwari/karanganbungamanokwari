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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addGaleriBaru" class="btn_1">Tambah
                                    Galeri Baru</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table id="tabelGaleri" class="table lms_table_active bordered">
                            <thead>
                                <tr style="text-align:center;">
                                    <th class="w-5" scope="col">No.</th>
                                    <th class="w-25" scope="col">Gambar</th>
                                    <th class="w-20" scope="col">Status</th>
                                    <th class="w-20" scope="col">Show Home</th>
                                    <th class="w-20" scope="col">Kategori</th>
                                    <th class="w-10" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($galeris as $index => $galeri) : ?>
                                <tr style="text-align:center;">
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <div class="zoom-container">
                                            <img class="w-100 zoom-in img-thumbnail"
                                                src="<?= base_url('uploads/gallery/' . $galeri['img']) ?>"
                                                alt="galeri Image">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="status-toggle" data-size="normal"
                                            data-on-text="Active" data-off-text="Inactive"
                                            data-id="<?= $galeri['id'] ?>" <?= $galeri['is_active'] ? 'checked' : '' ?>>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="show-home-toggle" data-size="normal"
                                            data-on-text="Show" data-off-text="Hide" data-id="<?= $galeri['id'] ?>"
                                            <?= $galeri['is_show_home'] ? 'checked' : '' ?>>
                                    </td>
                                    <td><?= $galeri['kategori']; ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-galeri"
                                            data-id="<?= $galeri['id'] ?>">Hapus</button>
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
<div class="modal fade" id="addGaleriBaru" tabindex="-1" aria-labelledby="addGaleriBaruLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGaleriBaruLabel">Unggah Galeri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="galeriUploadForm" action="<?= base_url('admin/save_gallery'); ?>">
                    <div class="mb-3">
                        <span>Gambar Galeri</span>
                        <div class="dropzone" id="galeriImage"></div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="status" id="status" value="1">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="show_home" id="show_home" value="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kategori">Kategori Galeri</label>
                        <input class="form-control" type="text" name="kategori" id="kategori" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Unggah Galeri</button>
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

    $('#tabelGaleri').DataTable({
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
            {
                targets: [3],
                sortable: false
            },
            {
                targets: [5],
                sortable: false
            }
        ],

        "drawCallback": function(settings) {
            // Handle delete galeri
            $('.delete-galeri').on('click', function() {
                var galeriId = $(this).data('id');

                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Aksi ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= base_url('admin/delete_gallery'); ?>",
                            type: "POST",
                            data: {
                                id: galeriId
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Galeri telah dihapus.',
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Galeri belum dihapus.',
                                });
                            }
                        });
                    }
                });
            });

            $('#tabelGaleri .status-toggle').bootstrapSwitch();
            $('#tabelGaleri .show-home-toggle').bootstrapSwitch();

            $('#tabelGaleri .status-toggle').on('switchChange.bootstrapSwitch', function(event,
                state) {
                var galeriId = $(this).data('id');
                var newStatus = state ? 1 : 0;

                $.ajax({
                    url: "<?= base_url('admin/status_gallery'); ?>",
                    type: "POST",
                    data: {
                        id: galeriId,
                        status: newStatus
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Status telah diperbarui.',
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Status belum diperbarui.',
                        });
                    }
                });
            });

            $('#tabelGaleri .show-home-toggle').on('switchChange.bootstrapSwitch', function(event,
                state) {
                var galeriId = $(this).data('id');
                var newShowHome = state ? 1 : 0;

                $.ajax({
                    url: "<?= base_url('admin/showhome_gallery'); ?>",
                    type: "POST",
                    data: {
                        id: galeriId,
                        is_show_home: newShowHome
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Galeri telah ditampilkan di halaman Beranda',
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Galeri gagal ditampilkan di halaman Beranda',
                        });
                    }
                });
            });
        },
    });




    var galeriImageDropzone = new Dropzone("#galeriImage", {
        url: "<?= base_url('admin/save_gallery'); ?>",
        maxFiles: null,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: "Seret gambar ke sini untuk unggah",
        autoProcessQueue: false,
        init: function() {
            var dz = this;

            $("#galeriUploadForm").on("submit", function(e) {
                e.preventDefault();
                dz.processQueue();
            });

            this.on("sending", function(file, xhr, formData) {
                formData.append("status", $("input[name='status']").val());
                formData.append("show_home", $("input[name='show_home']").val());
                formData.append("kategori", $("#kategori").val());
            });

            this.on("success", function(file, response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Galeri baru telah diunggah',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#addGaleriBaru').modal('hide');
                        location.reload();
                    }
                });
            });

            this.on("error", function(file, response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Galeri baru tidak berhasil diunggah',
                });
            });
        }
    });



});
</script>


<?= $this->endSection() ?>