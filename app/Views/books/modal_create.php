<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Data Buku Baru</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?= base_url('create/book') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Kode Buku</label>
                            <input type="text" name="code_book" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ISBN</label>
                            <input type="text" name="isbn_book" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Judul Buku</label>
                            <input type="text" name="title_book" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Penulis</label>
                            <input type="text" name="author_book" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Penerbit</label>
                            <input type="text" name="publisher_book" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" name="published_year" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Stok Buku</label>
                            <input type="number" name="stock" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Keterangan / Deskripsi</label>
                            <textarea name="description_book" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tipe Buku</label>
                            <select name="tipe" class="form-control">
                                <option value="fisik">Fisik</option>
                                <option value="digital">Digital</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>File PDF (untuk buku digital)</label>
                            <input type="file" name="file_pdf" class="form-control" accept="application/pdf">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Cover Buku (gambar)</label>
                            <input type="file" name="cover_img" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Buku</button>
                </div>
            </form>
        </div>
    </div>
</div>