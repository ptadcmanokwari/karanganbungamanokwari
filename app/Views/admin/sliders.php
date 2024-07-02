<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<!-- Cropper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Tabel Slider</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" modal data-bs-target="#addSliderBaru" class="btn_1">Tambah
                                    Slider Baru</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">

                        <table id="tabelSlider" class="table lms_table_active bordered">
                            <thead>
                                <tr>
                                    <th class="w-5" scope="col">No.</th>
                                    <th class="w-50" scope="col">Gambar</th>
                                    <th class="w-25" scope="col">Status</th>
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
<div class="modal fade" id="addSliderBaru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addSliderBaruLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSliderBaruLabel">Tambah Slider Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <span>Gambar Slider</span>
                    <form action="<?= base_url('admin/save_sliders') ?>" class="dropzone" id="sliderImage"></form>
                </div>
                <div style="max-height: 400px; display: none;" id="cropContainer">
                    <img id="cropImage">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-pink" id="cropBtn">Unggah Slider</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        var table = $('#tabelSlider').DataTable({
            ajax: '<?= base_url('admin/slidersajax') ?>',
            "searching": false,
            "bStateSave": true,
            "info": false,
            "columnDefs": [{
                    "className": "dt-center",
                    "targets": "_all"
                },
                {
                    targets: [1, 2, -1],
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
                    data: 'img',
                    render: function(data) {
                        return `<div class="zoom-container"><a href="<?= base_url('uploads/slider/') ?>${data}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><img class="w-100 zoom-in img-thumbnail" src="<?= base_url('uploads/slider/') ?>${data}" alt="Slider Image"></a></div>`;
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        if (row.is_active == 1) {
                            return '<input name="is_active" type="checkbox" class="is_active" data-id="' + row.id + '" checked>';
                        } else {
                            return '<input name="is_active" type="checkbox" class="is_active" data-id="' + row.id + '">';
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `<button class="btn btn-secondary btn-sm delete-slider" data-id="${data}">Hapus</button>`;
                    }
                }
            ]
        });

        table.on('draw.dt', function() {
            GLightbox({
                selector: '.glightbox'
            });
            $('#tabelSlider .is_active').bootstrapSwitch();
            $('#tabelSlider .is_active').on('switchChange.bootstrapSwitch', function(event, state) {
                var sliderId = $(this).data('id');
                var newStatus = state ? 1 : 0;
                $.ajax({
                    url: "<?= base_url('admin/status_sliders'); ?>",
                    type: "POST",
                    data: {
                        id: sliderId,
                        is_active: newStatus
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Status telah berubah.',
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Status belum berubah.',
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                    }
                });
            });
        });

        var sliderImageDropzone = new Dropzone("#sliderImage", {
            url: "<?= base_url('admin/save_sliders'); ?>",
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
                            aspectRatio: 16 / 9,
                            viewMode: 1,
                            responsive: true,
                            scalable: false,
                            zoomable: false,
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
                        $('#addSliderBaru').modal('hide');
                        resetModal();
                        table.ajax.reload(null, false);
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
            var title = document.getElementById('title');
            var subtitle = document.getElementById('subtitle');

            if (cropContainer) {
                cropContainer.style.display = 'none';
            }
            if (cropImage) {
                cropImage.src = '';
            }
            if (title) {
                title.value = '';
            }
            if (subtitle) {
                subtitle.value = '';
            }

            if (sliderImageDropzone) {
                sliderImageDropzone.removeAllFiles();
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
                sliderImageDropzone.removeAllFiles();
                sliderImageDropzone.addFile(croppedFile);
                sliderImageDropzone.processQueue();
            }, 'image/webp');
        });

        $('#tabelSlider').on('click', '.delete-slider', function() {
            var sliderId = $(this).data('id');

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
                        url: "<?= base_url('admin/delete_sliders'); ?>",
                        type: "POST",
                        data: {
                            id: sliderId
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Slider telah dihapus.',
                                timer: 1000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then(() => {
                                table.ajax.reload(null, false);
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Slider belum dihapus.',
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
</script>

<?= $this->endSection() ?>