<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<!-- Cropper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Tabel Galeri</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="btn-group add_button ms-2">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tambah Galeri Baru
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addGaleriMasal">Upload Masal</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addGalleryCroping">Upload & Cropping</a></li>
                                </ul>
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
                                                <a href="<?= base_url('uploads/gallery/' . $galeri['img']) ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                                    <img class="w-100 zoom-in img-thumbnail" src="<?= base_url('uploads/gallery/' . $galeri['img']) ?>" alt="galeri Image">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="status-toggle" data-size="normal" data-on-text="Active" data-off-text="Inactive" data-id="<?= $galeri['id'] ?>" <?= $galeri['is_active'] ? 'checked' : '' ?>>
                                        </td>
                                        <td>
                                            <input type="checkbox" class="show-home-toggle" data-size="normal" data-on-text="Show" data-off-text="Hide" data-id="<?= $galeri['id'] ?>" <?= $galeri['is_show_home'] ? 'checked' : '' ?>>
                                        </td>
                                        <td><?= $galeri['kategori']; ?></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm delete-galeri" data-id="<?= $galeri['id'] ?>">Hapus</button>
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

<!-- Modal Tambah Galeri & Cropping-->
<div class="modal fade" id="addGalleryCroping" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addGalleryCropingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGalleryCropingLabel">Unggah Galeri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                    Jika menggunakan pilihan upload & cropping, gambar yang Anda unggah akan dipotong terlebih dahulu
                    sehingga rasionya menjadi 16/9.
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="kategori">Nama/Kategori Galeri</label>
                        <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Masukkan kategori" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="status" name="status" class="form-control" value="1">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="show_home" name="show_home" class="form-control" value="1">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="myDropzone">Gambar Galeri</label>
                    <form action="<?= base_url('admin/save_gallery') ?>" class="dropzone" id="myDropzone"></form>
                </div>

                <div style="max-height: 400px" id="cropContainer" style="display: none;">
                    <img id="cropImage">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="cropBtn">Crop & Unggah Galeri</button>
            </div>
        </div>
    </div>
</div>


<!-- The Modal Tambah Galesi Masal -->
<div class="modal fade" id="addGaleriMasal" tabindex="-1" aria-labelledby="addGaleriMasalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGaleriMasalLabel">Unggah Galeri Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                    Jika menggunakan pilihan upload masal, pastikan aspect ratio semua gambar adalah 16/9 (foto mode
                    landscape).
                </div>
                <form id="galeriUploadForm" action="<?= base_url('admin/save_gallery'); ?>">
                    <div class="mb-3">
                        <label class="form-label" for="kategori">Nama/Kategori Galeri</label>
                        <input class="form-control" type="text" name="kategori" id="kategori" required>
                    </div>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Unggah Galeri</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Dropzone JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script>
    // Dropzone configuration
    Dropzone.autoDiscover = false;
    // Dropzone untuk bagian Croping
    var myDropzone = new Dropzone("#myDropzone", {
        url: "<?= base_url('admin/save_gallery') ?>",
        paramName: "file",
        maxFilesize: 5,
        acceptedFiles: "image/*",
        maxFiles: 1,
        autoProcessQueue: false,
        dictDefaultMessage: "Drag dan drop file di sini atau klik untuk memilih file",
        init: function() {
            this.on("addedfile", function(file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('cropContainer').style.display = 'flex';
                    var cropImage = document.getElementById('cropImage');
                    cropImage.src = event.target.result;
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(cropImage, {
                        aspectRatio: 16 / 9,
                        viewMode: 3,
                        responsive: true,
                        scalable: false,
                        zoomable: false,
                        autoCrop: true,
                        autoCropArea: 1,
                    });
                };
                reader.readAsDataURL(file);
            });

            this.on("sending", function(file, xhr, formData) {
                formData.append("status", $("input[name='status']").val());
                formData.append("show_home", $("input[name='show_home']").val());
                formData.append("kategori", $("#kategori").val());
            });
            this.on("queuecomplete", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Upload Berhasil',
                    timer: 1000, // Auto-close after 3 seconds
                    timerProgressBar: true,
                    showConfirmButton: false // Hide the default "OK" button
                }).then((result) => {
                    $('#addGalleryCroping').modal('hide');
                    resetModal();
                });
                location.reload();
            });
        }
    });

    // Dropzone untuk unggah masal
    var galeriImageDropzone = new Dropzone("#galeriImage", {
        url: "<?= base_url('admin/save_gallery'); ?>",
        maxFiles: null, // Menghilangkan batasan jumlah file
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictDefaultMessage: "Seret gambar ke sini untuk unggah",
        autoProcessQueue: false,
        resizeQuality: 0.6,
        parallelUploads: 10, // Batasi jumlah unggahan paralel
        checkOrientation: true,
        quality: 0.5,
        init: function() {
            var dz = this;

            $("#galeriUploadForm").on("submit", function(e) {
                e.preventDefault();
                dz.processQueue();
            });

            this.on("sending", function(file, xhr, formData) {
                formData.append("status", $("#galeriUploadForm input[name='status']").val());
                formData.append("show_home", $("#galeriUploadForm input[name='show_home']").val());
                formData.append("kategori", $("#galeriUploadForm input[name='kategori']").val());
            });

            this.on("queuecomplete", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Galeri baru telah diunggah',
                    timer: 1000, // Auto-close after 3 seconds
                    timerProgressBar: true,
                    showConfirmButton: false // Hide the default "OK" button
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#addGaleriMasal').modal('hide');
                        location.reload();
                    }
                });
            });

            this.on("error", function(file, response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Galeri baru tidak berhasil diunggah',
                    timer: 1000, // Auto-close after 3 seconds
                    timerProgressBar: true,
                    showConfirmButton: false // Hide the default "OK" button
                });
            });
        }
    });

    var cropper;

    function resetModal() {
        document.getElementById('cropContainer').style.display = 'none';
        document.getElementById('cropImage').src = '';
        document.getElementById('kategori').value = '';
        document.getElementById('is_active').value = '1';
        document.getElementById('is_show_home').value = '1';
        myDropzone.removeAllFiles();
    }

    document.getElementById('cropBtn').addEventListener('click', function() {
        var croppedCanvas = cropper.getCroppedCanvas({
            width: 1000,
            height: 1000,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high'
        });

        croppedCanvas.toBlob(function(blob) {
            var croppedFile = new File([blob], "cropped_image.jpg", {
                type: "image/jpeg"
            });
            myDropzone.removeAllFiles();
            myDropzone.addFile(croppedFile);
            myDropzone.processQueue();
        }, 'image/jpeg');
    });

    $('#addGalleryCroping').on('hidden.bs.modal', function() {
        resetModal();
    });

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
                                    timer: 1000, // Auto-close after 3 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false // Hide the default "OK" button
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Galeri belum dihapus.',
                                    timer: 1000, // Auto-close after 3 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false // Hide the default "OK" button
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
                            timer: 1000, // Auto-close after 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false // Hide the default "OK" button
                        });
                    },
                });
            });
        },
    });
</script>

<?= $this->endSection() ?>