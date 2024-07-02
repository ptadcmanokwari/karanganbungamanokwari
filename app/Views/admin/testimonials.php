<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Tabel Galeri</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addNewTestimonial" class="btn_1">Tambah
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="addNewTestimonial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" tabindex="-1" aria-labelledby="addNewTestimonialLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTestimonialLabel">Unggah Testimoni Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="mb-3">
                        <span>Gambar Testimoni</span>
                        <form action="<?= base_url('admin/save_testimonials') ?>" class="dropzone" id="sliderImage"></form>
                    </div>
                    <div style="max-height: 400px; display: none;" id="cropContainer">
                        <img id="cropImage">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-pink" id="cropBtn">Crop & Unggah Testimoni</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        // Inisialisasi DataTables
        var tableTestimoni = $('#tabelTestimoni').DataTable({
            ajax: '<?= base_url('admin/testimonialsajax') ?>',
            "searching": false,
            "bStateSave": true,
            "info": false,

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
                    targets: [-1],
                    sortable: false
                }
            ],

            columns: [{
                    "data": null,
                    "render": function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return '<div class="zoom-container">' +
                            '<a href="<?= base_url('uploads/testimonials/') ?>' + row.gambar + '"' +
                            'data-gallery="portfolio-gallery-app" class="glightbox preview-link">' +
                            '<img src="<?= base_url('uploads/testimonials/') ?>' + row.gambar +
                            '" alt="' + row.nama +
                            '" class="w-100 zoom-in img-thumbnail"></a></div>';
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        if (row.is_active == 1) {
                            return '<input name="is_active" type="checkbox" class="is_active" data-id="' +
                                row.id + '" checked>';
                        } else {
                            return '<input name="is_active" type="checkbox" class="is_active" data-id="' +
                                row.id + '">';
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `<button class="btn btn-secondary btn-sm delete-testimoni" data-id="${data}">Hapus</button>`;
                    }
                }
            ]
        });

        // Inisialisasi ulang Bootstrap Switch dan pengikatan event handler saat tabel di-render ulang
        tableTestimoni.on('draw.dt', function() {
            var lightbox = GLightbox({
                selector: '.glightbox'
            });

            $('#tabelTestimoni .is_active').bootstrapSwitch();

            $('#tabelTestimoni .is_active').on('switchChange.bootstrapSwitch', function(event, state) {
                var testimonialsID = $(this).data('id');
                var newStatus = state ? 1 : 0;
                $.ajax({
                    url: "<?= base_url('admin/status_testimonials'); ?>",
                    type: "POST",
                    data: {
                        id: testimonialsID,
                        is_active: newStatus
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Status telah berubah.',
                            timer: 1000, // Auto-close after 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false // Hide the default "OK" button
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Status belum berubah.',
                            timer: 1000, // Auto-close after 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false // Hide the default "OK" button
                        });
                    }
                });
            });
        });

        var testimoniImageDropzone = new Dropzone("#sliderImage", {
            url: "<?= base_url('admin/save_testimonials'); ?>",
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            maxFiles: 1,
            dictDefaultMessage: "Seret gambar ke sini untuk unggah",
            autoProcessQueue: false,
            init: function() {
                var dz = this;
                this.on("addedfile", function(file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var cropContainer = document.getElementById('cropContainer');
                        var cropImage = document.getElementById('cropImage');
                        cropContainer.style.display = 'flex';
                        cropImage.src = event.target.result;
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(cropImage, {
                            viewMode: 1,
                            responsive: true,
                            scalable: true,
                            zoomable: true,
                            autoCropArea: 0.5, // Set initial cropping area
                            movable: true,
                            cropBoxResizable: true,
                            toggleDragModeOnDblclick: false // Disable toggle drag mode on double click
                        });
                    };
                    reader.readAsDataURL(file);
                });

                this.on("sending", function(file, xhr, formData) {
                    var status = $("input[name='status-toggle']").val();
                    formData.append("status", status);
                });

                this.on("success", function(file, response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Upload Berhasil',
                        timer: 1000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then((result) => {
                        $('#addNewTestimonial').modal('hide');
                        resetModal();
                        tableTestimoni.ajax.reload(null, false);
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

            if (cropContainer) {
                cropContainer.style.display = 'none';
            }
            if (cropImage) {
                cropImage.src = '';
            }

            if (testimoniImageDropzone) {
                testimoniImageDropzone.removeAllFiles();
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
                    type: "image/webp"
                });
                testimoniImageDropzone.removeAllFiles();
                testimoniImageDropzone.addFile(croppedFile);
                testimoniImageDropzone.processQueue();
            }, 'image/webp');
        });

        $('#tabelTestimoni').on('click', '.delete-testimoni', function() {
            var testimonialsID = $(this).data('id');

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
                        url: "<?= base_url('admin/delete_testimonials'); ?>",
                        type: "POST",
                        data: {
                            id: testimonialsID
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Slider telah dihapus.',
                                timer: 1000, // Auto-close after 3 seconds
                                timerProgressBar: true,
                                showConfirmButton: false // Hide the default "OK" button
                            }).then(() => {
                                tableTestimoni.ajax.reload(null, false);
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Slider belum dihapus.',
                                timer: 1000, // Auto-close after 3 seconds
                                timerProgressBar: true,
                                showConfirmButton: false // Hide the default "OK" button
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>