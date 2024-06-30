<script>
$(document).ready(function() {
    $('#tabelProduk').DataTable({
        "searching": false,
        "bStateSave": true,
        "info": false,
        "destroy": true,
        "columnDefs": [{
                targets: [1],
                sortable: false
            },
            {
                targets: [4],
                sortable: false
            },
            {
                targets: [5],
                sortable: false
            }
        ],

        "drawCallback": function(settings) {
            $('#tabelProduk .edit-product').on('click', function() {
                var categoryId = $(this).data('id');
                var categoryNama = $(this).data('nama');
                var categoryGambar = $(this).data('gambar');
                var categoriHarga = $(this).data('harga');

                $('#editId').val(categoryId);
                $('#editNama').val(categoryNama);
                $('#editHarga').val(categoriHarga);
                $('#currentImage').attr('src', "<?= base_url('uploads/products/') ?>" +
                    '/' +
                    categoryGambar);

                $('#editProductModal').modal('show');
            });

            $('#tabelProduk .isPopular-toggle').bootstrapSwitch();
            $('#tabelProduk .isPopular-toggle').on('switchChange.bootstrapSwitch', function(event,
                state) {
                var produkID = $(this).data('id');
                var newStatus = state ? 1 : 0;

                $.ajax({
                    url: "<?= base_url('admin/toggleIsPopular'); ?>",
                    type: "POST",
                    data: {
                        id: produkID,
                        is_popular: newStatus
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Status telah berubah.',
                            timer: 2000, // Auto-close after 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false // Hide the default "OK" button
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Status belum berubah.',
                            timer: 2000, // Auto-close after 3 seconds
                            timerProgressBar: true,
                            showConfirmButton: false // Hide the default "OK" button
                        });
                    }
                });
            });

            $('#tabelProduk .delete-product').on('click', function() {
                var productId = $(this).data('id');

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
                            url: "<?= base_url('admin/delete_products') ?>/" +
                                productId,
                            type: "POST",
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Produk telah dihapus.',
                                    timer: 2000, // Auto-close after 3 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false // Hide the default "OK" button
                                }).then(() => {
                                    $('#tabelProduk').DataTable().ajax.reload(null, false);
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Produk belum dihapus.',
                                    timer: 2000, // Auto-close after 3 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false // Hide the default "OK" button
                                });
                            }
                        });
                    }
                });
            });
        }
    });

    // Dropzone for Add Category
    const addDropzone = new Dropzone("#gambarKategori", {
        url: "<?= base_url('admin/save_products') ?>",
        autoProcessQueue: false,
        uploadMultiple: false,
        maxFiles: 1,
        dictDefaultMessage: "Seret gambar ke sini untuk unggah",
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        init: function() {
            var addDropzone = this;
            document.querySelector("#uploadForm").addEventListener("submit", function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (addDropzone.getQueuedFiles().length > 0) {
                    addDropzone.processQueue();
                } else {
                    Swal.fire('Error', 'Gambar produk belum diunggah.', 'error');
                }
            });
            this.on("sending", function(file, xhr, formData) {
                formData.append("nama", document.querySelector("#nama").value);
                formData.append("harga", document.querySelector("#harga").value);
                formData.append("is_popular", document.querySelector("#is_popular")
                    .value);
            });
            this.on("success", function(file, response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Produk baru telah diunggah.',
                        timer: 2000, // Auto-close after 3 seconds
                        timerProgressBar: true,
                        showConfirmButton: false // Hide the default "OK" button
                    }).then(() => {
                        $('#addProductCategory').modal('hide');
                        $('#tabelProduk').DataTable().ajax.reload(null, false);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.errors ? response.errors.join("<br>") :
                            'Gagal unggah produk baru.',
                    });
                }
            });
            this.on("error", function(file, response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Gagal unggah produk baru.',
                    timer: 2000, // Auto-close after 3 seconds
                    timerProgressBar: true,
                    showConfirmButton: false // Hide the default "OK" button
                });
            });
        }
    });

    const editDropzone = new Dropzone("#editGambarKategori", {
        url: "<?= base_url('admin/update_products') ?>",
        autoProcessQueue: false,
        uploadMultiple: false,
        maxFiles: 1,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        init: function() {
            var editDropzone = this;
            document.querySelector("#editForm").addEventListener("submit", function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (editDropzone.getQueuedFiles().length > 0) {
                    editDropzone.processQueue();
                } else {
                    var formData = new FormData();
                    formData.append("id", document.querySelector("#editId").value);
                    formData.append("nama", document.querySelector("#editNama").value);
                    formData.append("harga", document.querySelector("#editHarga").value);
                    formData.append("is_popular", document.querySelector("#editIsPopular")
                        .value);

                    fetch("<?= base_url('admin/update_products') ?>", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(response => {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Produk telah diperbarui.',
                                    timer: 2000, // Auto-close after 3 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false // Hide the default "OK" button
                                }).then(() => {
                                    $('#editProductModal').modal('hide');
                                    $('#tabelProduk').DataTable().ajax.reload(null, false);
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: response.errors ? Object.values(
                                            response.errors).join("<br>") :
                                        'Produk belum diperbarui.',
                                    timer: 2000, // Auto-close after 3 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false // Hide the default "OK" button
                                });
                            }
                        })
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Produk belum diperbarui.',
                                timer: 2000, // Auto-close after 3 seconds
                                timerProgressBar: true,
                                showConfirmButton: false // Hide the default "OK" button
                            });
                        });
                }
            });
            this.on("sending", function(file, xhr, formData) {
                formData.append("id", document.querySelector("#editId").value);
                formData.append("nama", document.querySelector("#editNama").value);
                formData.append("harga", document.querySelector("#editHarga").value);
                formData.append("is_popular", document.querySelector("#editIsPopular")
                    .value);
                if (editDropzone.getQueuedFiles().length > 0) {
                    formData.append("gambar", file);
                }
            });
            this.on("success", function(file, response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Produk telah diperbarui.',
                        timer: 2000, // Auto-close after 3 seconds
                        timerProgressBar: true,
                        showConfirmButton: false // Hide the default "OK" button
                    }).then(() => {
                        $('#editProductModal').modal('hide');
                        $('#tabelProduk').DataTable().ajax.reload(null, false);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.errors ? Object.values(response.errors)
                            .join("<br>") :
                            'Produk belum diperbarui.',
                        timer: 2000, // Auto-close after 3 seconds
                        timerProgressBar: true,
                        showConfirmButton: false // Hide the default "OK" button
                    });
                }
            });
            this.on("error", function(file, response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Produk belum diperbarui.',
                    timer: 2000, // Auto-close after 3 seconds
                    timerProgressBar: true,
                    showConfirmButton: false // Hide the default "OK" button
                });
            });
        }
    });

    $('#editProductModal').on('hidden.bs.modal', function(e) {
        editDropzone.removeAllFiles(true);
    });

    $('#addProductCategory').on('hidden.bs.modal', function(e) {
        addDropzone.removeAllFiles(true);
    });
});
</script>
