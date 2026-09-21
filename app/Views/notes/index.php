<?= $this->extend('layouts/template') ?>

<?= $this->section('header') ?>
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="mb-1">Catatan</h1>
        <p class="text-muted mb-0">Simpan catatan penting untuk setiap kelompok.</p>
    </div>

    <a href="<?= base_url('notes/create') ?>" class="btn btn-success">
        <i class="fas fa-plus mr-1"></i>
        Tambah Catatan
    </a>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<div class="row">

    <?php if (empty($notes)): ?>

        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-sticky-note fa-3x text-muted mb-3"></i>
                    <h4>Belum ada catatan</h4>
                    <p class="text-muted">
                        Tambahkan catatan untuk membantu kelompokmu mengingat hal-hal penting.
                    </p>

                    <a href="<?= base_url('notes/create') ?>" class="btn btn-success">
                        <i class="fas fa-plus mr-1"></i>
                        Buat Catatan
                    </a>
                </div>
            </div>
        </div>

    <?php else: ?>

        <?php foreach ($notes as $note): ?>

            <?php
                $warna = [
                    'kuning' => '#FFF8C5',
                    'hijau'  => '#E8F5E9',
                    'biru'   => '#E3F2FD',
                    'pink'   => '#FCE4EC',
                ];

                $bg = $warna[$note['warna']] ?? '#FFF8C5';
            ?>

            <div class="col-lg-4 col-md-6 mb-4">
                <div
                    class="card h-100 border-0 shadow-sm"
                    style="background: <?= $bg ?>;"
                >

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-start mb-3">

                            <div>
                                <span class="badge badge-light">
                                    <?= esc($note['nama_kelompok'] ?? 'Kelompok') ?>
                                </span>
                            </div>

                            <span class="text-muted small">
                                <?= esc($note['warna']) ?>
                            </span>

                        </div>

                        <div class="mb-4" style="white-space: pre-line;">
                            <?= esc($note['content']) ?>
                        </div>

                        <div class="border-top pt-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="small text-muted">
                                    <i class="fas fa-user mr-1"></i>
                                    <?= esc($note['creator_name'] ?? 'Pengguna') ?>

                                    <?php if (!empty($note['created_at'])): ?>
                                        <br>
                                        <i class="far fa-clock mr-1"></i>
                                        <?= date('d M Y, H:i', strtotime($note['created_at'])) ?>
                                    <?php endif; ?>
                                </div>

                                <form
                                    action="<?= base_url('notes/' . $note['id_note'] . '/delete') ?>"
                                    method="post"
                                    onsubmit="return confirm('Yakin ingin menghapus catatan ini?');"
                                >
                                    <?= csrf_field() ?>

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Hapus catatan"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>