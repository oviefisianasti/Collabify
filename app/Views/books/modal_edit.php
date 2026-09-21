<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalEditLabel">Edit Data Buku</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?= base_url('update/book/' . $book['id_book']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Kode Buku</label>
                            <input type="text" name="code_book" class="form-control" value="<?= esc($book['code_book']) ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ISBN</label>
                            <input type="text" name="isbn_book" class="form-control" value="<?= esc($book['isbn_book']) ?>" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Judul Buku</label>
                            <input type="text" name="title_book" class="form-control" value="<?= esc($book['title_book']) ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Penulis</label>
                            <input type="text" name="author_book" class="form-control" value="<?= esc($book['author_book']) ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Penerbit</label>
                            <input type="text" name="publisher_book" class="form-control" value="<?= esc($book['publisher_book']) ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tahun Terbit</label>
                            <input type="number" name="published_year" class="form-control" value="<?= esc($book['published_year']) ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Stok Buku</label>
                            <input type="number" name="stock" class="form-control" value="<?= esc($book['stock']) ?>" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Keterangan / Deskripsi</label>
                            <textarea name="description_book" class="form-control" rows="3"><?= esc($book['description_book']) ?></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Tipe Buku</label>
                            <select name="tipe" class="form-control">
                                <option value="fisik" <?= ($book['tipe'] ?? 'fisik') === 'fisik' ? 'selected' : '' ?>>Fisik</option>
                                <option value="digital" <?= ($book['tipe'] ?? '') === 'digital' ? 'selected' : '' ?>>Digital</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>File PDF (untuk buku digital)</label>
                            <input type="file" name="file_pdf" class="form-control" accept="application/pdf">
                            <?php if (! empty($book['file_digital'])): ?>
                                <small class="text-muted">File saat ini: <?= esc($book['file_digital']) ?> — unggah baru untuk mengganti.</small>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Cover Buku (gambar)</label>
                            <input type="file" name="cover_img" class="form-control" accept="image/*">
                            <?php if (! empty($book['cover'])): ?>
                                <small class="text-muted">Cover saat ini: <?= esc($book['cover']) ?> — unggah baru untuk mengganti.</small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>