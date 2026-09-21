<?= $this->extend('layouts/template') ?>

<?= $this->section('header') ?>
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div>
        <h1 class="page-title mb-1">Kelompok</h1>
        <p class="page-sub mb-0">Kelola kelompok belajar dan kolaborasimu.</p>
    </div>

    <div class="mt-2 mt-md-0">
        <a href="<?= base_url('groups/join') ?>" class="btn btn-light mr-2">
            <i class="ti ti-link mr-1"></i> Gabung
        </a>
        <a href="<?= base_url('groups/create') ?>" class="btn btn-primary">
            <i class="ti ti-plus mr-1"></i> Buat Kelompok
        </a>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <i class="ti ti-circle-check mr-2"></i>
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <i class="ti ti-alert-circle mr-2"></i>
        <?= esc(session()->getFlashdata('error')) ?>
    </div>
<?php endif; ?>

<?php if (empty($groups)): ?>

    <div class="card">
        <div class="card-body text-center py-5">
            <div class="mb-3" style="font-size:42px;color:var(--forest);">
                <i class="ti ti-users-group"></i>
            </div>

            <h3 style="font-size:18px;font-weight:600;">
                Belum ada kelompok
            </h3>

            <p class="text-muted mb-4">
                Buat kelompok baru atau bergabung menggunakan kode invite.
            </p>

            <a href="<?= base_url('groups/create') ?>" class="btn btn-primary mr-2">
                <i class="ti ti-plus mr-1"></i>
                Buat Kelompok
            </a>

            <a href="<?= base_url('groups/join') ?>" class="btn btn-light">
                <i class="ti ti-link mr-1"></i>
                Gabung Kelompok
            </a>
        </div>
    </div>

<?php else: ?>

    <div class="row">
        <?php foreach ($groups as $group): ?>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="card group-card h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="group-icon">
                                <i class="ti ti-users-group"></i>
                            </div>

                            <?php if (($group['peran'] ?? '') === 'ketua'): ?>
                                <span class="badge badge-success">
                                    Ketua
                                </span>
                            <?php else: ?>
                                <span class="badge badge-secondary">
                                    Anggota
                                </span>
                            <?php endif; ?>
                        </div>

                        <h3 class="group-title">
                            <?= esc($group['nama_kelompok']) ?>
                        </h3>

                        <p class="text-muted mb-3">
                            Kode invite:
                            <span class="font-mono">
                                <?= esc($group['kode_invite']) ?>
                            </span>
                        </p>

                        <div class="group-meta">
                            <span>
                                <i class="ti ti-calendar mr-1"></i>
                                <?= !empty($group['created_at'])
                                    ? date('d M Y', strtotime($group['created_at']))
                                    : '-' ?>
                            </span>
                        </div>

                        <a href="<?= base_url('groups/' . $group['id_group']) ?>"
                           class="btn btn-primary btn-block mt-4">
                            Buka Kelompok
                            <i class="ti ti-arrow-right ml-1"></i>
                        </a>

                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

<?php endif; ?>

<style>
.group-card {
    transition: transform .18s ease, box-shadow .18s ease;
}

.group-card:hover {
    transform: translateY(-2px) !important;
}

.group-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: var(--tint);
    color: var(--forest);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

.group-title {
    font-size: 17px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 7px;
}

.group-meta {
    color: var(--muted);
    font-size: 12px;
}

.group-meta i {
    color: var(--forest);
}
</style>

<?= $this->endSection() ?>
