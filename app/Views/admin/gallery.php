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
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addGalleryCroping" class="btn_1">Tambah Galeri Baru</a>
                            </div>
                            <!-- <div class="btn-group add_button ms-2">
                                <button type="button" class="btn btn_1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tambah Galeri Baru
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addGaleriMasal">Upload Masal</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addGalleryCroping">Upload & Cropping</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table id="tabelGaleri" class="table lms_table_active bordered">
                            <thead>
                                <tr style="text-align:center;">
                                    <th class="w-5" scope="col">No.</th>
                                    <th class="w-25" scope="col">Gambar</th>
                                    <th class="w-20" scope="col">Status</th>
                                    <th class="w-20" scope="col">Tampilkan di Hal Depan</th>
                                    <th class="w-20" scope="col">Kategori</th>
                                    <th class="w-10" scope="col">Aksi</th>
                                </tr>
                            </thead>
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
                        <label for="kategoriCroping">Nama/Kategori Galeri</label>
                        <input type="text" id="kategoriCroping" name="kategoriCroping" class="form-control" placeholder="Masukkan kategori" required>
                    </div>
                    <!-- <div class="form-group">
                        <input type="hidden" id="is_active" name="is_active" class="form-control" value="1">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="show_home" name="show_home" class="form-control" value="1">
                    </div> -->
                </div>
                <div class="mb-3">
                    <span>Gambar Galeri</span>
                    <form action="<?= base_url('admin/save_gallery') ?>" class="dropzone" id="myDropzone"></form>
                </div>

                <div style="max-height: 400px" id="cropContainer" style="display: none;">
                    <img id="cropImage">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary btn-pink" id="cropBtn">Unggah Galeri</button>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-pink">Unggah Galeri</button>
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
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        // Inisialisasi DataTables untuk galeri
        var tableGallery = $('#tabelGaleri').DataTable({
            "searching": false,
            "bStateSave": true,
            "info": false,
            "ajax": {
                "url": "<?php echo base_url('admin/galleryajax'); ?>",
                "type": "GET"
            },

            "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                },
                {
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
                    targets: [-1],
                    sortable: false
                }
            ],

            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + 1; // Mengembalikan nomor urut dari baris
                    }
                },
                {
                    data: 'img',
                    render: function(data) {
                        return `<div class="zoom-container"><a href="<?= base_url('uploads/gallery/') ?>${data}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><img class="w-100 zoom-in img-thumbnail" src="<?= base_url('uploads/gallery/') ?>${data}" alt="Gallery Image"></a></div>`;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        if (row.is_active == 1) {
                            return '<input name="is_active" type="checkbox" class="is-active-toggle" data-id="' + row.id + '" checked>';
                        } else {
                            return '<input name="is_active" type="checkbox" class="is-active-toggle" data-id="' + row.id + '">';
                        }
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        if (row.is_show_home == 1) {
                            return '<input name="show_home" type="checkbox" class="status-toggle" data-id="' + row.id + '" checked>';
                        } else {
                            return '<input name="show_home" type="checkbox" class="status-toggle" data-id="' + row.id + '">';
                        }
                    }
                },
                {
                    data: 'kategori'
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `<button class="btn btn-secondary btn-sm delete-galeri" data-id="${data}">Hapus</button>`;
                    }
                }
            ]
        });

        // Inisialisasi ulang Bootstrap Switch dan pengikatan event handler saat tabel di-render ulang
        tableGallery.on('draw.dt', function() {
            //utk preview gambar
            var lightbox = GLightbox({
                selector: '.glightbox'
            });

            $('#tabelGaleri .is-active-toggle').bootstrapSwitch();
            $('#tabelGaleri .status-toggle').bootstrapSwitch();

            $('#tabelGaleri .is-active-toggle').on('switchChange.bootstrapSwitch', function(event, state) {
                var galeriID = $(this).data('id');
                var newStatus = state ? 1 : 0;
                $.ajax({
                    url: "<?= base_url('admin/status_gallery'); ?>",
                    type: "POST",
                    data: {
                        id: galeriID,
                        is_active: newStatus
                    },
                    success: function(response) {
                        // Handle success response
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Status telah diperbarui.',
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        // Handle error response
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Status belum diperbarui.',
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                });
            });


            $('#tabelGaleri .status-toggle').on('switchChange.bootstrapSwitch', function(event, state) {
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
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Galeri belum diperbarui.',
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                });
            });

            $('#tabelGaleri').on('click', '.delete-galeri', function() {
                var galeriId = $(this).data('id');

                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Kamu tidak akan bisa mengembalikan aksi ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ff78af',
                    cancelButtonColor: '#5c636a',
                    confirmButtonText: 'Ya, hapus!'
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
                                    timer: 1000,
                                    timerProgressBar: true,
                                    showConfirmButton: false
                                }).then(() => {
                                    tableGallery.ajax.reload(null, false);
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Galeri belum dihapus',
                                    timer: 1000,
                                    timerProgressBar: true,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });
        });

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
                    formData.append("kategori", $("#kategoriCroping").val());
                });

                this.on("success", function(file, response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Upload Berhasil',
                        timer: 1000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then((result) => {
                        $('#addGalleryCroping').modal('hide');
                        resetModal();
                        tableGallery.ajax.reload(null, false); // Reload data table
                    });
                });

                this.on("queuecomplete", function() {
                    resetModal();
                });
            }
        });

        var cropper;

        function resetModal() {
            var cropContainer = document.getElementById('cropContainer');
            var cropImage = document.getElementById('cropImage');
            var kategori = document.getElementById('kategori');
            var kategoriCroping = document.getElementById('kategoriCroping');
            // var is_active = document.getElementById('is_active');
            // var is_show_home = document.getElementById('is_show_home');

            if (cropContainer) {
                cropContainer.style.display = 'none';
            }
            if (cropImage) {
                cropImage.src = '';
            }
            if (kategori) {
                kategori.value = '';
            }
            if (kategoriCroping) {
                kategoriCroping.value = '';
            }
            // if (is_active) {
            //     is_active.value = '';
            // }
            // if (is_show_home) {
            //     is_show_home.value = '';
            // }

            if (galeriImageDropzone) {
                galeriImageDropzone.removeAllFiles();
            }
            if (myDropzone) {
                myDropzone.removeAllFiles();
            }
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


        var galeriImageDropzone = new Dropzone("#galeriImage", {
            url: "<?= base_url('admin/save_gallery'); ?>",
            maxFiles: null,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictDefaultMessage: "Seret gambar ke sini untuk unggah",
            autoProcessQueue: false,
            resizeQuality: 0.6,
            parallelUploads: 10,
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

                this.on("success", function(file, response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Upload Berhasil',
                        timer: 1000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then((result) => {
                        $('#addGaleriMasal').modal('hide');
                        resetModal();
                        tableGallery.ajax.reload(null, false); // Reload data table
                    });
                });

                this.on("queuecomplete", function() {
                    resetModal();
                });
            }
        });
    });
</script>

<?= $this->endSection() ?>