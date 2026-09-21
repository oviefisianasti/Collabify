<?= $this->extend('layouts/public_template') ?>

<?= $this->section('head') ?>
<style>
  .kat-wrap{display:grid;grid-template-columns:204px 1fr;gap:30px;align-items:start;}
  /* filter rail */
  .krail{position:sticky;top:84px;display:flex;flex-direction:column;gap:20px;}
  .ksearch{display:flex;align-items:center;gap:8px;background:var(--surface);border:1px solid var(--border);
    border-radius:var(--r-md);padding:9px 12px;}
  .ksearch input{border:0;outline:0;background:transparent;font-family:inherit;font-size:13.5px;color:var(--ink);width:100%;}
  .krail h4{font-family:var(--mono);font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:var(--faint);margin-bottom:9px;}
  .kseg{display:flex;background:var(--paper);border:1px solid var(--border);border-radius:var(--r-sm);padding:3px;font-size:12px;font-weight:500;}
  .kseg span{flex:1;text-align:center;padding:6px 0;border-radius:7px;color:var(--muted);cursor:pointer;}
  .kseg span.on{background:var(--surface);color:var(--ink);box-shadow:var(--sh-sm);}
  .ksub a{display:flex;justify-content:space-between;align-items:center;font-size:13px;color:var(--muted);
    padding:6px 9px;border-radius:8px;transition:background .14s,color .14s;}
  .ksub a:hover{background:var(--tint);color:var(--forest);}
  .ksub a.on{background:var(--tint);color:var(--forest);font-weight:500;}
  .ksub a .n{font-family:var(--mono);font-size:10px;color:var(--faint);}

  /* designed cover */
  .bcov{position:relative;border-radius:5px;overflow:hidden;box-shadow:0 8px 20px rgba(24,36,27,.14);display:flex;flex-direction:column;}
  .bcov img{width:100%;height:100%;object-fit:cover;}
  .bcov .ph{display:flex;flex-direction:column;height:100%;padding:14px 13px;}
  .bcov .ph .t{font-weight:700;letter-spacing:-.01em;line-height:1.04;margin-top:auto;}
  .bcov .ph .r{height:2px;width:20px;margin:8px 0;opacity:.7;}
  .bcov .ph .a{font-family:var(--mono);font-size:8px;letter-spacing:.06em;opacity:.7;}

  /* focal feature */
  .kfeat{display:flex;gap:18px;background:var(--surface);border:1px solid var(--border);border-radius:var(--r-lg);
    padding:16px;box-shadow:var(--sh-sm);margin-bottom:24px;}
  .kfeat .fc{width:108px;height:154px;flex-shrink:0;}
  .kfeat .ft{align-self:center;}
  .kfeat h3{font-size:22px;font-weight:600;letter-spacing:-.02em;margin-top:6px;}

  /* grid */
  .bgrid{display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:22px 16px;}
  .bcard{display:block;transition:transform .18s var(--ease);}
  .bcard:hover{transform:translateY(-4px);}
  .bcard .cw{aspect-ratio:5/7;}
  .bcard .bt{font-weight:500;font-size:13.5px;margin-top:9px;line-height:1.25;
    display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden;}
  .bcard .ba{font-size:12px;color:var(--muted);margin-top:1px;}
  .bcard .bf{display:flex;align-items:center;justify-content:space-between;margin-top:7px;}
  .resbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;}
  .resbar .c{font-size:13px;color:var(--muted);}
  @media(max-width:760px){
    .kat-wrap{grid-template-columns:1fr;} .krail{position:static;}
  }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
  $tones = [['#244B29','#dfe9e1'],['#2A2A28','#e7e3d6'],['#3a7d4a','#eaf3ec'],['#C9B79A','#3a2f1a'],
            ['#1d3b24','#cfe0d2'],['#D7E0CE','#2a3a2c'],['#ECE7DA','#18241B']];
  $tone = fn($b) => $tones[((int)($b['id_book'] ?? 0)) % count($tones)];
  $subjects = ['Fiksi','Sains','Sejarah','Filsafat','Bisnis'];
  $feat = (($q ?? '') === '' && ! empty($books)) ? $books[0] : null;
  $list = $feat ? array_slice($books, 1) : ($books ?? []);
?>

<div class="phead">
    <div class="ph-k">Katalog</div>
    <h1>Katalog Buku</h1>
    <p>Jelajahi koleksi LIBRIS — ribuan judul fisik &amp; digital, dikurasi untuk kamu.</p>
</div>

<div class="kat-wrap">
    <!-- filter rail -->
    <aside class="krail">
        <form class="ksearch" action="<?= base_url('katalog') ?>" method="get">
            <i class="ti ti-search" style="font-size:15px;color:var(--faint)"></i>
            <input type="text" name="q" value="<?= esc($q ?? '') ?>" placeholder="Cari di katalog…">
        </form>
        <div>
            <h4>Format</h4>
            <div class="kseg"><span class="on">Semua</span><span>Fisik</span><span>Digital</span></div>
        </div>
        <div>
            <h4>Subjek</h4>
            <div class="ksub">
                <a href="<?= base_url('katalog') ?>" class="<?= ($q ?? '')==='' ? 'on' : '' ?>">Semua</a>
                <?php foreach ($subjects as $s): ?>
                    <a href="<?= base_url('katalog?q=' . urlencode($s)) ?>" class="<?= strcasecmp($q ?? '', $s)===0 ? 'on' : '' ?>"><?= esc($s) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </aside>

    <!-- main -->
    <div>
        <?php if (empty($books)): ?>
            <div class="emptybox">
                <span class="em"><i class="ti ti-<?= ($q ?? '') !== '' ? 'search-off' : 'books' ?>"></i></span>
                <?php if (($q ?? '') !== ''): ?>
                    <h3>Tidak ditemukan</h3>
                    <p>Tidak ada buku yang cocok dengan &ldquo;<?= esc($q) ?>&rdquo;. Coba kata kunci lain.</p>
                    <a href="<?= base_url('katalog') ?>" class="btn btn-primary">Lihat semua buku</a>
                <?php else: ?>
                    <h3>Katalog masih kosong</h3>
                    <p>Belum ada buku yang ditambahkan. Cek lagi nanti.</p>
                <?php endif; ?>
            </div>
        <?php else: ?>

            <?php if ($feat): $t = $tone($feat); $fdig = ($feat['tipe'] ?? '')==='digital'; ?>
            <a href="<?= base_url('katalog/' . $feat['id_book']) ?>" class="kfeat">
                <div class="bcov fc" style="background:<?= $t[0] ?>">
                    <?php if (! empty($feat['cover'])): ?><img src="<?= base_url('uploads/covers/' . $feat['cover']) ?>" alt="">
                    <?php else: ?><div class="ph" style="color:<?= $t[1] ?>"><span class="t" style="font-size:14px"><?= esc(mb_strimwidth($feat['title_book'],0,28,'…')) ?></span><span class="r" style="background:<?= $t[1] ?>"></span><span class="a"><?= esc(mb_strtoupper(mb_strimwidth($feat['author_book'] ?: 'PENULIS',0,18,'…'))) ?></span></div><?php endif; ?>
                </div>
                <div class="ft">
                    <span class="kick">Paling dicari minggu ini</span>
                    <h3><?= esc($feat['title_book']) ?></h3>
                    <div style="font-size:13px;color:var(--muted);margin-top:2px"><?= esc($feat['author_book'] ?: 'Penulis') ?></div>
                    <div style="display:flex;align-items:center;gap:10px;margin-top:14px">
                        <span class="btn btn-primary" style="padding:9px 16px">Lihat detail</span>
                        <span class="pill <?= $fdig ? '' : 'muted' ?>"><?= $fdig ? 'Digital' : 'Fisik' ?></span>
                    </div>
                </div>
            </a>
            <?php endif; ?>

            <div class="resbar">
                <span class="c"><b style="color:var(--ink);font-weight:600"><?= count($books) ?></b> judul<?= ($q ?? '')!=='' ? ' untuk “'.esc($q).'”' : '' ?></span>
                <span style="display:flex;align-items:center;gap:6px;border:1px solid var(--border);border-radius:var(--r-sm);padding:7px 11px;font-size:12px;color:var(--muted)">Terpopuler <i class="ti ti-chevron-down" style="font-size:13px"></i></span>
            </div>

            <div class="bgrid">
                <?php foreach ($list as $b): $t = $tone($b); $dig = ($b['tipe'] ?? '')==='digital'; $stok = (int)($b['stock'] ?? 0); ?>
                <a href="<?= base_url('katalog/' . $b['id_book']) ?>" class="bcard">
                    <div class="bcov cw" style="background:<?= $t[0] ?>">
                        <?php if (! empty($b['cover'])): ?><img src="<?= base_url('uploads/covers/' . $b['cover']) ?>" alt="<?= esc($b['title_book']) ?>">
                        <?php else: ?><div class="ph" style="color:<?= $t[1] ?>"><span class="t" style="font-size:15px"><?= esc(mb_strimwidth($b['title_book'],0,30,'…')) ?></span><span class="r" style="background:<?= $t[1] ?>"></span><span class="a"><?= esc(mb_strtoupper(mb_strimwidth($b['author_book'] ?: 'PENULIS',0,22,'…'))) ?></span></div><?php endif; ?>
                    </div>
                    <div class="bt"><?= esc($b['title_book']) ?></div>
                    <div class="ba"><?= esc($b['author_book'] ?: 'Penulis') ?></div>
                    <div class="bf">
                        <?php if ($dig): ?><span class="pill">Bisa dibaca</span>
                        <?php elseif ($stok > 0): ?><span class="pill muted">Tersedia · <?= $stok ?></span>
                        <?php else: ?><span class="pill warn">Kosong</span><?php endif; ?>
                        <i class="ti ti-arrow-up-right" style="font-size:15px;color:var(--faint)"></i>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
