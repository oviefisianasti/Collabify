<?= $this->extend('layouts/template') ?>

<?= $this->section('header') ?>

<div>

    <h1 class="mb-1">
        Workspace Saya
    </h1>

    <p class="text-muted mb-0">
        Tempat kerja dari template yang kamu gunakan.
    </p>

</div>

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')): ?>

    <div class="alert alert-danger">
        <?= esc(
            session()->getFlashdata('error')
        ) ?>
    </div>

<?php endif; ?>


<div class="row">

    <?php if (! empty($workspaces)): ?>

        <?php foreach ($workspaces as $workspace): ?>

            <div class="col-md-6 col-lg-4 mb-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">

                            <div class="workspace-card-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>

                            <span class="badge badge-success">
                                Aktif
                            </span>

                        </div>


                        <h5 class="font-weight-bold">

                            <?= esc(
                                $workspace['judul']
                            ) ?>

                        </h5>


                        <p class="small text-muted mb-2">

                            Dari template:

                            <strong>
                                <?= esc(
                                    $workspace['template_asal']
                                ) ?>
                            </strong>

                        </p>


                        <p class="small text-muted mb-3">

                            <i class="fas fa-users mr-1"></i>

                            <?= esc(
                                $workspace['nama_kelompok']
                                ?? 'Pribadi'
                            ) ?>

                        </p>


                        <a
                            href="<?= base_url(
                                'workspaces/' .
                                $workspace['id_workspace']
                            ) ?>"
                            class="btn btn-outline-success btn-block"
                        >
                            <i class="fas fa-edit mr-1"></i>
                            Buka Workspace
                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="col-12">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-5">

                    <div class="workspace-empty-icon mb-3">
                        <i class="fas fa-folder-open"></i>
                    </div>

                    <h4>
                        Belum ada workspace
                    </h4>

                    <p class="text-muted">
                        Gunakan template untuk membuat
                        workspace pertamamu.
                    </p>

                    <a
                        href="<?= base_url('templates') ?>"
                        class="btn btn-success"
                    >
                        <i class="fas fa-file-alt mr-1"></i>
                        Jelajahi Template
                    </a>

                </div>

            </div>

        </div>

    <?php endif; ?>

</div>


<style>

.workspace-card-icon {
    width: 42px;
    height: 42px;

    border-radius: 10px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #EAF1E9;
    color: #224B29;
}

.workspace-empty-icon {
    font-size: 42px;
    color: #224B29;
}

</style>

<?= $this->endSection() ?>