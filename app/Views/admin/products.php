<?= $this->extend('admin/template') ?>

<?= $this->section('content') ?>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Tabel Produk</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#addProductCategory"
                                    class="btn_1">Tambah Produk Baru</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table id="tabelProduk" class="table lms_table_active bordered">
                            <thead>
                                <tr style="text-align:center;">
                                    <th class="w-5" scope="col">No.</th>
                                    <th class="w-25" scope="col">Gambar</th>
                                    <th class="w-25" scope="col">Nama Produk</th>
                                    <th class="w-15" scope="col">Harga</th>
                                    <th class="w-5" scope="col">Tandai sebagai Produk Terlaris</th>
                                    <th class="w-20" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $index => $category) : ?>
                                <tr style="text-align:center;">
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <div class="zoom-container">
                                            <img class="w-100 zoom-in img-thumbnail"
                                                src="<?= base_url('uploads/products/' . $category['gambar']) ?>"
                                                alt="Kategori Image">
                                        </div>
                                    </td>
                                    <td><?= esc($category['nama']) ?></td>
                                    <td><?= esc($category['harga']) ?></td>
                                    <td>
                                        <input name="isPopular" type="checkbox" class="isPopular-toggle"
                                            data-id="<?= $category['id'] ?>"
                                            <?= $category['is_popular'] ? 'checked' : '' ?>>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm text-white edit-product"
                                            data-id="<?= $category['id'] ?>" data-nama="<?= esc($category['nama']) ?>"
                                            data-gambar="<?= esc($category['gambar']) ?>"
                                            data-harga="<?= esc($category['harga']) ?>">Ubah</button>
                                        <button class="btn btn-danger btn-sm delete-product"
                                            data-id="<?= $category['id'] ?>">Hapus</button>
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

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addProductCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addProductCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductCategoryLabel">Tambah Produk Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <span>Gambar Produk</span>
                        <div class="dropzone" id="gambarKategori"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="harga">Harga Produk</label>
                        <input class="form-control" type="text" name="harga" id="harga" required>
                    </div>

                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="is_popular" id="is_popular" value="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Unggah Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kategori -->
<div class="modal fade" id="editProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editProductModalLabel">Ubah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" id="editId" name="id">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <span>Gambar Produk Sekarang</span>
                                <div class="current-image mb-3">
                                    <img id="currentImage" class="w-75" src="" alt="Kategori Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <span>Gambar Baru Produk</span>
                                <div class="dropzone" id="editGambarKategori"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="editNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="harga">Harga Produk</label>
                        <input class="form-control" type="text" name="harga" id="editHarga">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="is_popular" id="editIsPopular" value="0">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Perbarui Produk</button>
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
                                }).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Produk belum dihapus.',
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
                    }).then(() => {
                        location.reload();
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
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: response.errors ? Object.values(
                                            response.errors).join("<br>") :
                                        'Produk belum diperbarui.',
                                });
                            }
                        })
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Produk belum diperbarui.',
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
                    formData.append("file", file);
                }
            });
            this.on("success", function(file, response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Produk telah diperbarui.',
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.errors ? Object.values(response.errors).join(
                            "<br>") : 'Produk belum diperbarui.',
                    });
                }
            });
            this.on("error", function(file, response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Produk belum diperbarui.',
                });
            });
        }
    });

});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

document.getElementById('editHarga').addEventListener('input', function(e) {
    e.target.value = formatRupiah(this.value, 'Rp. ');
});
document.getElementById('harga').addEventListener('input', function(e) {
    e.target.value = formatRupiah(this.value, 'Rp. ');
});
</script>
<?= $this->endSection() ?>