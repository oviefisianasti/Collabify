<?= $this->extend('layouts/template') ?>

<?= $this->section('header') ?>

<div class="d-flex align-items-end justify-content-between"
     style="flex-wrap:wrap;gap:10px">

    <div>
        <div class="mono"
             style="font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:#2F6B3C">
            <?= date('l, d F Y') ?>
        </div>

        <h1 class="page-title mb-0" style="margin-top:3px">
            Selamat datang, <?= esc(session('name') ?? 'Admin') ?>
        </h1>
    </div>

</div>

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<style>
.kpi-row{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
    margin-bottom:14px;
}

.kpi{
    background:#fff;
    border:1px solid var(--border);
    border-radius:16px;
    padding:16px 18px;
    box-shadow:var(--sh-sm);
}

.kpi .l{
    font-size:13px;
    color:var(--muted);
}

.kpi .v{
    font-family:var(--mono);
    font-size:25px;
    font-weight:500;
    margin-top:6px;
    letter-spacing:-.01em;
    color:var(--ink);
}

.kpi .d{
    font-size:11.5px;
    margin-top:2px;
}

.dash-2{
    display:grid;
    grid-template-columns:1.5fr 1fr;
    gap:14px;
}

.dcard{
    background:#fff;
    border:1px solid var(--border);
    border-radius:16px;
    padding:16px 18px;
    box-shadow:var(--sh-sm);
}

.dcard .h{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:6px;
}

.dcard .h .t{
    font-size:14px;
    font-weight:600;
}

.dcard .h .x{
    font-family:var(--mono);
    font-size:10px;
    color:var(--faint);
    letter-spacing:.06em;
}

.deadline-item{
    display:flex;
    align-items:center;
    gap:11px;
    padding:10px 0;
    border-top:1px solid var(--border);
}

.deadline-item:first-of-type{
    border-top:0;
}

.deadline-icon{
    width:30px;
    height:30px;
    border-radius:9px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:var(--tint);
    color:var(--forest);
}

.deadline-main{
    flex:1;
    min-width:0;
}

.deadline-main .title{
    font-size:13px;
    font-weight:500;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.deadline-main .group{
    font-size:11.5px;
    color:var(--muted);
}

.deadline-date{
    font-family:var(--mono);
    font-size:10px;
    color:var(--muted);
}

.act{
    display:flex;
    gap:11px;
    padding:10px 0;
    border-top:1px solid var(--border);
}

.act:first-of-type{
    border-top:0;
}

.act .ic{
    width:30px;
    height:30px;
    border-radius:9px;
    flex-shrink:0;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:15px;
}

.act .ic.p{
    background:var(--tint);
    color:var(--forest);
}

.empty-sm{
    font-size:13px;
    color:var(--faint);
    font-style:italic;
    padding:14px 0;
}

@media(max-width:900px){
    .kpi-row{
        grid-template-columns:repeat(2,1fr);
    }

    .dash-2{
        grid-template-columns:1fr;
    }
}
</style>


<!-- KPI -->

<div class="kpi-row">

    <div class="kpi">
        <div class="l">Total pengguna</div>

        <div class="v">
            <?= number_format($totalUser) ?>
        </div>

        <div class="d" style="color:var(--accent)">
            pengguna terdaftar
        </div>
    </div>


    <div class="kpi">
        <div class="l">Total kelompok</div>

        <div class="v">
            <?= number_format($totalGroup) ?>
        </div>

        <div class="d" style="color:var(--accent)">
            kelompok aktif
        </div>
    </div>


    <div class="kpi">
        <div class="l">Template</div>

        <div class="v">
            <?= number_format($totalTemplate) ?>
        </div>

        <div class="d" style="color:var(--muted)">
            <?= $templatePending ?> menunggu review
        </div>
    </div>


    <div class="kpi">
        <div class="l">Total tugas</div>

        <div class="v">
            <?= number_format($totalTask) ?>
        </div>

        <div class="d" style="color:var(--muted)">
            <?= $taskSelesai ?> selesai
        </div>
    </div>

</div>


<div class="dash-2">

    <!-- Grafik -->

    <div class="dcard">

        <div class="h">
            <span class="t">Aktivitas tugas</span>
            <span class="x">7 HARI TERAKHIR</span>
        </div>

        <div style="position:relative;height:210px;margin-top:6px">
            <canvas id="taskChart"></canvas>
        </div>

    </div>


    <!-- Deadline -->

    <div class="dcard">

        <div class="h">
            <span class="t">Deadline terdekat</span>

            <span class="x">
                <i class="ti ti-clock"
                   style="font-size:13px;vertical-align:-2px"></i>
            </span>
        </div>


        <?php if (empty($deadline)): ?>

            <div class="empty-sm">
                Belum ada deadline tugas.
            </div>

        <?php else: ?>

            <?php foreach ($deadline as $item): ?>

                <div class="deadline-item">

                    <div class="deadline-icon">
                        <i class="ti ti-checkbox"></i>
                    </div>

                    <div class="deadline-main">

                        <div class="title">
                            <?= esc($item['judul']) ?>
                        </div>

                        <div class="group">
                            <?= esc($item['nama_kelompok'] ?? '-') ?>
                        </div>

                    </div>

                    <div class="deadline-date">
                        <?= esc($item['deadline']) ?>
                    </div>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</div>


<!-- Aktivitas terbaru -->

<div class="dcard" style="margin-top:14px">

    <div class="h">
        <span class="t">Aktivitas terbaru</span>
    </div>


    <?php if (empty($aktivitas)): ?>

        <div class="empty-sm">
            Belum ada aktivitas tercatat.
        </div>

    <?php else: ?>

        <?php foreach ($aktivitas as $act): ?>

            <?php

            $icon = match ($act['tipe']) {
                'user'     => 'user-plus',
                'group'    => 'users',
                'template' => 'file-text',
                'task'     => 'checkbox',
                default    => 'activity',
            };

            ?>

            <div class="act">

                <div class="ic p">
                    <i class="ti ti-<?= $icon ?>"></i>
                </div>

                <div style="flex:1;min-width:0">

                    <div style="font-size:13.5px">

                        <b style="font-weight:600">
                            <?= esc($act['judul']) ?>
                        </b>

                        <span style="color:var(--muted)">
                            <?= esc($act['detail']) ?>
                        </span>

                    </div>

                    <div class="mono"
                         style="font-size:10.5px;color:var(--faint);margin-top:2px">

                        <?= isset($act['waktu'])
                            ? time_ago($act['waktu'])
                            : '-' ?>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>


<?= $this->section('js') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>

<script>

(function(){

    var cv = document.getElementById('taskChart');

    if(!cv) return;

    var ctx = cv.getContext('2d');

    var grad = ctx.createLinearGradient(0,0,0,210);

    grad.addColorStop(0,'rgba(34,75,41,.16)');
    grad.addColorStop(1,'rgba(34,75,41,0)');


    new Chart(cv,{

        type:'line',

        data:{
            labels:<?= $grafikLabels ?>,

            datasets:[{

                label:'Tugas',

                data:<?= $grafikData ?>,

                borderColor:'#224B29',

                backgroundColor:grad,

                fill:true,

                tension:.4,

                borderWidth:2.5,

                pointBackgroundColor:'#224B29',

                pointBorderColor:'#fff',

                pointBorderWidth:2,

                pointRadius:3,

                pointHoverRadius:5

            }]

        },

        options:{

            responsive:true,

            maintainAspectRatio:false,

            plugins:{

                legend:{
                    display:false
                },

                tooltip:{

                    backgroundColor:'#18241B',

                    cornerRadius:8,

                    padding:10,

                    displayColors:false,

                    callbacks:{

                        label:function(c){

                            return '  '+c.parsed.y+' tugas';

                        }

                    }

                }

            },

            scales:{

                x:{

                    grid:{
                        display:false
                    },

                    border:{
                        display:false
                    }

                },

                y:{

                    beginAtZero:true,

                    grid:{
                        color:'#F1EFE9'
                    },

                    border:{
                        display:false
                    },

                    ticks:{
                        stepSize:1
                    }

                }

            }

        }

    });

})();

</script>

<?= $this->endSection() ?>