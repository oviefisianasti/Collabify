<?= $this->extend('layouts/template') ?>

<?= $this->section('header') ?>

<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="mb-1">Template</h1>
        <p class="text-muted mb-0">
            Temukan dan bagikan template untuk membantu kebutuhan akademikmu.
        </p>
    </div>

    <a href="<?= base_url('templates/create') ?>" class="btn btn-success">
        <i class="fas fa-plus mr-1"></i>
        Upload Template
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

    <?php if (empty($templates)): ?>

        <div class="col-12">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-5">

                    <div class="mb-3">
                        <i class="fas fa-file-alt fa-3x text-muted"></i>
                    </div>

                    <h4>Belum ada template</h4>

                    <p class="text-muted mb-4">
                        Belum ada template yang tersedia saat ini.
                    </p>

                    <a
                        href="<?= base_url('templates/create') ?>"
                        class="btn btn-success"
                    >
                        <i class="fas fa-upload mr-1"></i>
                        Upload Template
                    </a>

                </div>

            </div>

        </div>

    <?php else: ?>

        <?php foreach ($templates as $template): ?>

            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body">

                        <!-- CATEGORY -->
                        <div class="mb-3">

                            <span class="badge badge-success">
                                <?= esc($template['kategori']) ?>
                            </span>

                        </div>


                        <!-- TITLE -->
                        <h4 class="mb-2">

                            <?= esc($template['judul']) ?>

                        </h4>


                        <!-- DESCRIPTION -->
                        <p class="text-muted">

                            <?php
                                $deskripsi = $template['deskripsi'] ?? '';

                                if (strlen($deskripsi) > 120) {
                                    echo esc(substr($deskripsi, 0, 120)) . '...';
                                } else {
                                    echo esc($deskripsi);
                                }
                            ?>

                        </p>


                        <!-- META -->
                        <div class="small text-muted mb-4">

                            <div class="mb-1">
                                <i class="fas fa-user mr-1"></i>

                                <?= esc($template['uploader'] ?? 'Pengguna') ?>

                            </div>

                            <div>
                                <i class="fas fa-download mr-1"></i>

                                <?= (int) $template['downloads_count'] ?>
                                download
                            </div>

                        </div>


                        <!-- ACTION -->
                        <div class="d-flex justify-content-between align-items-center">

                            <small class="text-muted">

                                <?php if (!empty($template['created_at'])): ?>

                                    <?= date(
                                        'd M Y',
                                        strtotime($template['created_at'])
                                    ) ?>

                                <?php endif; ?>

                            </small>


                            <a
                                href="<?= base_url('templates/' . $template['id_template']) ?>"
                                class="btn btn-sm btn-outline-success"
                            >
                                Lihat Detail
                                <i class="fas fa-arrow-right ml-1"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>