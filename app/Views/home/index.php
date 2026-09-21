<?= $this->extend('layouts/public_template') ?>

<?= $this->section('head') ?>

<style>
    .home-hero{
        display:grid;
        grid-template-columns:1.25fr .75fr;
        gap:30px;
        padding:35px 0 45px;
        align-items:center;
    }

    .hero-kicker{
        font-family:var(--mono);
        font-size:11px;
        letter-spacing:.14em;
        text-transform:uppercase;
        color:var(--forest);
    }

    .home-hero h1{
        font-size:46px;
        line-height:1;
        letter-spacing:-.04em;
        font-weight:600;
        margin:12px 0;
        max-width:650px;
    }

    .hero-desc{
        color:var(--muted);
        font-size:15px;
        line-height:1.65;
        max-width:560px;
    }

    .hero-actions{
        display:flex;
        gap:10px;
        margin-top:22px;
        flex-wrap:wrap;
    }

    .hero-card{
        background:var(--tint);
        border:1px solid var(--border);
        border-radius:20px;
        padding:24px;
    }

    .hero-card .big{
        font-family:var(--mono);
        font-size:34px;
        font-weight:500;
        color:var(--forest);
    }

    .hero-card .label{
        font-size:12px;
        color:var(--muted);
    }

    .stats{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:12px;
        margin-bottom:42px;
    }

    .stat{
        background:#fff;
        border:1px solid var(--border);
        border-radius:15px;
        padding:17px;
        box-shadow:var(--sh-sm);
    }

    .stat .num{
        font-family:var(--mono);
        font-size:25px;
        color:var(--ink);
    }

    .stat .txt{
        font-size:12px;
        color:var(--muted);
        margin-top:3px;
    }

    .section-head{
        display:flex;
        justify-content:space-between;
        align-items:end;
        gap:15px;
        margin:28px 0 14px;
    }

    .section-head h2{
        font-size:20px;
        font-weight:600;
        margin:0;
    }

    .section-head a{
        font-size:12px;
        color:var(--forest);
    }

    .template-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:15px;
    }

    .template-card{
        display:block;
        background:#fff;
        border:1px solid var(--border);
        border-radius:15px;
        padding:18px;
        box-shadow:var(--sh-sm);
        transition:transform .18s ease;
    }

    .template-card:hover{
        transform:translateY(-3px);
    }

    .template-icon{
        width:38px;
        height:38px;
        border-radius:11px;
        display:flex;
        align-items:center;
        justify-content:center;
        background:var(--tint);
        color:var(--forest);
        margin-bottom:13px;
    }

    .template-title{
        font-size:14px;
        font-weight:600;
        line-height:1.35;
    }

    .template-category{
        font-size:11px;
        color:var(--muted);
        margin-top:5px;
    }

    .template-desc{
        font-size:12px;
        color:var(--muted);
        line-height:1.5;
        margin-top:10px;
    }

    .template-footer{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-top:14px;
        padding-top:11px;
        border-top:1px solid var(--border);
        font-size:10px;
        color:var(--faint);
        font-family:var(--mono);
    }

    .group-grid{
        display:grid;
        grid-template-columns:repeat(3,1fr);
        gap:15px;
    }

    .group-card{
        border:1px solid var(--border);
        border-radius:15px;
        padding:17px;
        background:#fff;
    }

    .group-name{
        font-size:14px;
        font-weight:600;
    }

    .group-meta{
        font-size:11px;
        color:var(--muted);
        margin-top:5px;
    }

    .task-list{
        background:#fff;
        border:1px solid var(--border);
        border-radius:15px;
        overflow:hidden;
    }

    .task-item{
        display:flex;
        align-items:center;
        gap:12px;
        padding:13px 16px;
        border-top:1px solid var(--border);
    }

    .task-item:first-child{
        border-top:0;
    }

    .task-check{
        width:30px;
        height:30px;
        border-radius:9px;
        background:var(--tint);
        color:var(--forest);
        display:flex;
        align-items:center;
        justify-content:center;
        flex-shrink:0;
    }

    .task-main{
        flex:1;
        min-width:0;
    }

    .task-title{
        font-size:13px;
        font-weight:500;
    }

    .task-group{
        font-size:11px;
        color:var(--muted);
        margin-top:2px;
    }

    .task-status{
        font-family:var(--mono);
        font-size:10px;
        color:var(--muted);
    }

    .empty{
        padding:28px 15px;
        text-align:center;
        color:var(--faint);
        font-size:13px;
    }

    @media(max-width:800px){
        .home-hero{
            grid-template-columns:1fr;
        }

        .home-hero h1{
            font-size:36px;
        }

        .stats,
        .template-grid,
        .group-grid{
            grid-template-columns:1fr;
        }
    }
</style>

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<!-- HERO -->

<section class="home-hero">

    <div>
        <div class="hero-kicker">
            CAMPUSS SAVER
        </div>

        <h1>
            Semua tugas kuliah,<br>
            lebih terorganisir.
        </h1>

        <div class="hero-desc">
            Kelola tugas, kerja kelompok, template akademik,
            dan aktivitas perkuliahan dalam satu tempat.
        </div>

        <div class="hero-actions">
            <a href="<?= base_url('dashboard') ?>" class="btn btn-primary btn-lg">
                Buka dashboard
            </a>

            <a href="<?= base_url('groups') ?>" class="btn btn-ghost btn-lg">
                Lihat kelompok
            </a>
        </div>
    </div>


    <div class="hero-card">

        <div class="hero-kicker">
            Ringkasan platform
        </div>

        <div style="margin-top:15px">
            <div class="big">
                <?= number_format(count($templates ?? [])) ?>
            </div>

            <div class="label">
                template terbaru
            </div>
        </div>

        <div style="margin-top:20px">
            <div class="big">
                <?= number_format(count($groups ?? [])) ?>
            </div>

            <div class="label">
                kelompok terbaru
            </div>
        </div>

    </div>

</section>


<!-- STATISTIK -->

<div class="stats">

    <div class="stat">
        <div class="num">
            <?= number_format(count($templates ?? [])) ?>
        </div>
        <div class="txt">Template tersedia</div>
    </div>

    <div class="stat">
        <div class="num">
            <?= number_format(count($groups ?? [])) ?>
        </div>
        <div class="txt">Kelompok terbaru</div>
    </div>

    <div class="stat">
        <div class="num">
            <?= number_format(count($tasks ?? [])) ?>
        </div>
        <div class="txt">Tugas terbaru</div>
    </div>

</div>


<!-- TEMPLATE -->

<div class="section-head">
    <h2>Template terbaru</h2>

    <a href="<?= base_url('templates') ?>">
        Lihat semua →
    </a>
</div>


<?php if (empty($templates)): ?>

    <div class="template-grid">
        <div class="template-card">
            <div class="empty">
                Belum ada template yang tersedia.
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="template-grid">

        <?php foreach ($templates as $template): ?>

            <a
                href="<?= base_url('templates/' . $template['id_template']) ?>"
                class="template-card"
            >

                <div class="template-icon">
                    <i class="ti ti-file-text"></i>
                </div>

                <div class="template-title">
                    <?= esc($template['judul']) ?>
                </div>

                <div class="template-category">
                    <?= esc($template['kategori']) ?>
                </div>

                <?php if (!empty($template['deskripsi'])): ?>

                    <div class="template-desc">
                        <?= esc(mb_strimwidth(
                            $template['deskripsi'],
                            0,
                            110,
                            '…'
                        )) ?>
                    </div>

                <?php endif; ?>

                <div class="template-footer">

                    <span>
                        <?= esc($template['uploader'] ?? 'Pengguna') ?>
                    </span>

                    <span>
                        <?= number_format((int)($template['downloads_count'] ?? 0)) ?> download
                    </span>

                </div>

            </a>

        <?php endforeach; ?>

    </div>

<?php endif; ?>


<!-- KELOMPOK -->

<div class="section-head">
    <h2>Kelompok terbaru</h2>

    <a href="<?= base_url('groups') ?>">
        Lihat semua →
    </a>
</div>


<?php if (empty($groups)): ?>

    <div class="group-card">
        <div class="empty">
            Belum ada kelompok yang dibuat.
        </div>
    </div>

<?php else: ?>

    <div class="group-grid">

        <?php foreach ($groups as $group): ?>

            <div class="group-card">

                <div class="group-name">
                    <?= esc($group['nama_kelompok']) ?>
                </div>

                <div class="group-meta">
                    Dibuat oleh <?= esc($group['pembuat'] ?? 'Pengguna') ?>
                </div>

                <div style="margin-top:12px">
                    <span class="pill">
                        <?= esc($group['kode_invite']) ?>
                    </span>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>


<!-- TASK -->

<div class="section-head">
    <h2>Tugas terbaru</h2>

    <a href="<?= base_url('tasks') ?>">
        Lihat semua →
    </a>
</div>


<?php if (empty($tasks)): ?>

    <div class="task-list">
        <div class="empty">
            Belum ada tugas.
        </div>
    </div>

<?php else: ?>

    <div class="task-list">

        <?php foreach ($tasks as $task): ?>

            <div class="task-item">

                <div class="task-check">
                    <i class="ti ti-checkbox"></i>
                </div>

                <div class="task-main">

                    <div class="task-title">
                        <?= esc($task['judul']) ?>
                    </div>

                    <div class="task-group">
                        <?= esc($task['nama_kelompok'] ?? 'Tanpa kelompok') ?>

                        <?php if (!empty($task['deadline'])): ?>
                            · deadline <?= esc($task['deadline']) ?>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="task-status">
                    <?= esc($task['status']) ?>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>


<?= $this->endSection() ?>
