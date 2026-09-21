<?= $this->extend('layouts/template') ?>

<?= $this->section('header') ?>
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div>
        <h1 class="page-title mb-1">Tugas</h1>
        <p class="page-sub mb-0">Kelola tugas dan deadline kelompokmu.</p>
    </div>

    <div class="mt-2 mt-md-0">
        <a href="<?= base_url('tasks/create') ?>" class="btn btn-primary">
            <i class="ti ti-plus mr-1"></i>
            Tambah Tugas
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

<?php if (empty($tasks)): ?>

    <div class="card">
        <div class="card-body text-center py-5">
            <div class="mb-3" style="font-size:42px;color:var(--forest);">
                <i class="ti ti-checklist"></i>
            </div>

            <h3 style="font-size:18px;font-weight:600;">
                Belum ada tugas
            </h3>

            <p class="text-muted mb-4">
                Tambahkan tugas pertama untuk mulai mengatur pekerjaan kelompok.
            </p>

            <a href="<?= base_url('tasks/create') ?>" class="btn btn-primary">
                <i class="ti ti-plus mr-1"></i>
                Tambah Tugas
            </a>
        </div>
    </div>

<?php else: ?>

    <div class="row">

        <?php foreach ($tasks as $task): ?>

            <?php
                $status = $task['status'] ?? 'todo';

                $statusLabel = [
                    'todo'        => 'Belum dikerjakan',
                    'in_progress' => 'Sedang dikerjakan',
                    'done'        => 'Selesai',
                ][$status] ?? ucfirst($status);

                $statusClass = [
                    'todo'        => 'badge-secondary',
                    'in_progress' => 'badge-warning',
                    'done'        => 'badge-success',
                ][$status] ?? 'badge-secondary';

                $isOverdue = false;

                if (!empty($task['deadline']) && $status !== 'done') {
                    $isOverdue = strtotime($task['deadline']) < strtotime(date('Y-m-d'));
                }
            ?>

            <div class="col-12 col-md-6 col-xl-4">
                <div class="card task-card h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge <?= $statusClass ?>">
                                <?= esc($statusLabel) ?>
                            </span>

                            <?php if ($isOverdue): ?>
                                <span class="badge badge-danger">
                                    <i class="ti ti-alert-triangle mr-1"></i>
                                    Terlambat
                                </span>
                            <?php endif; ?>
                        </div>

                        <h3 class="task-title">
                            <?= esc($task['judul']) ?>
                        </h3>

                        <?php if (!empty($task['deskripsi'])): ?>
                            <p class="task-description">
                                <?= esc(mb_strimwidth($task['deskripsi'], 0, 110, '...')) ?>
                            </p>
                        <?php endif; ?>

                        <div class="task-info">

                            <div class="task-info-item">
                                <i class="ti ti-users"></i>
                                <span>
                                    <?= esc($task['nama_kelompok'] ?? 'Tanpa kelompok') ?>
                                </span>
                            </div>

                            <?php if (!empty($task['deadline'])): ?>
                                <div class="task-info-item <?= $isOverdue ? 'text-danger' : '' ?>">
                                    <i class="ti ti-calendar"></i>
                                    <span>
                                        <?= date('d M Y', strtotime($task['deadline'])) ?>
                                    </span>
                                </div>
                            <?php else: ?>
                                <div class="task-info-item">
                                    <i class="ti ti-calendar-off"></i>
                                    <span>Tanpa deadline</span>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($task['assigned_name'])): ?>
                                <div class="task-info-item">
                                    <i class="ti ti-user"></i>
                                    <span>
                                        <?= esc($task['assigned_name']) ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                        </div>

                        <a href="<?= base_url('tasks/' . $task['id_task']) ?>"
                           class="btn btn-light btn-block mt-4">
                            Lihat Detail
                            <i class="ti ti-arrow-right ml-1"></i>
                        </a>

                    </div>

                </div>
            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>

<style>
.task-card {
    transition: transform .18s ease, box-shadow .18s ease;
}

.task-card:hover {
    transform: translateY(-2px) !important;
}

.task-title {
    font-size: 17px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 8px;
}

.task-description {
    color: var(--muted);
    font-size: 13px;
    line-height: 1.6;
    min-height: 42px;
    margin-bottom: 18px;
}

.task-info {
    display: flex;
    flex-direction: column;
    gap: 9px;
}

.task-info-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--muted);
    font-size: 12px;
}

.task-info-item i {
    color: var(--forest);
    font-size: 16px;
}

.text-danger i {
    color: inherit;
}
</style>

<?= $this->endSection() ?>
