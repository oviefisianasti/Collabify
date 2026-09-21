<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title) ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --bg: #FFF5F5;
            --sidebar: #FFFFFF;
            --border: #F0DFE1;

            --text: #4A4A4A;
            --muted: #8A777B;

            --primary: #E2B4BD;
            --primary-dark: #C98F9B;
            --primary-soft: #FFF0F2;

            --peach: #F7D6D0;
            --dark: #4A4A4A;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: red !important;
            color: var(--text);
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .forum-layout {
            height: 100vh;
            display: grid;
            grid-template-columns: 220px 240px 1fr;
            overflow: hidden;
        }

        /* =========================
           SIDEBAR 1
        ========================= */

        .forum-sidebar {
            background: #f0f4f1;
            border-right: 1px solid var(--border);
            padding: 22px 14px;
            overflow-y: auto;
        }

        .brand {
            padding: 0 10px 24px;
        }

        .brand h2 {
            font-size: 19px;
            font-weight: 700;
            margin: 0;
        }

        .brand span {
            color: var(--muted);
            font-size: 12px;
        }

        .section-title {
            font-size: 10px;
            font-weight: 700;
            color: var(--muted);
            letter-spacing: .08em;
            margin: 20px 10px 8px;
            text-transform: uppercase;
        }

        .group-item {
    display: block;
    padding: 10px 11px;
    border-radius: 9px;
    cursor: pointer;
    margin-bottom: 4px;
    font-size: 14px;
    text-decoration: none;
    color: inherit;
}

        .group-item:hover {
            background: #e5eee8;
        }

        .group-item.active {
            background: var(--primary-soft);
            color: var(--primary-dark);
            font-weight: 600;
        }

        /* =========================
           CHANNEL SIDEBAR
        ========================= */

        .channel-sidebar {
            background: var(--sidebar);
            border-right: 1px solid var(--border);
            padding: 22px 15px;
            overflow-y: auto;
        }

        .channel-header {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
            padding: 0 7px;
        }

        .channel-section {
            margin-bottom: 25px;
        }

        .channel-section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;

            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .08em;

            padding: 0 8px;
            margin-bottom: 7px;
        }

.channel-item {
    display: flex;
    align-items: center;
    gap: 9px;

    padding: 9px 10px;
    border-radius: 8px;

    color: var(--muted);
    font-size: 14px;

    cursor: pointer;
    margin-bottom: 2px;

    text-decoration: none;
}

.channel-item:hover {
    background: #FFF5F5;
    color: var(--primary-dark);
    text-decoration: none;
}

        .channel-item.active {
            background: var(--primary-soft);
            color: var(--primary-dark);
            font-weight: 600;
        }

        .channel-icon {
            width: 20px;
            text-align: center;
            font-weight: 600;
        }

        .voice-icon {
            font-size: 15px;
        }

        /* =========================
           MAIN CHAT
        ========================= */

        .forum-main {
            display: flex;
            flex-direction: column;
            min-width: 0;
            background: #fff;
        }

        .chat-header {
            height: 68px;
            display: flex;
            align-items: center;
            padding: 0 25px;

            border-bottom: 1px solid var(--border);
            background: #FFFFFF;
        }

        .chat-title {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .chat-title strong {
            font-size: 15px;
        }

        .chat-title span {
            color: var(--muted);
            font-size: 13px;
        }

        .chat-empty {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            text-align: center;
        }

        .empty-box {
            max-width: 390px;
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: var(--peach);

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 17px;
            font-size: 25px;
        }

        .empty-box h3 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .empty-box p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .chat-input {
            padding: 15px 22px 20px;
        }

        .fake-input {
            height: 46px;
            border: 1px solid var(--border);
            border-radius: 10px;

            display: flex;
            align-items: center;

            padding: 0 15px;
            color: #a1aaa5;
            font-size: 14px;
            background: #fafbfa;
        }

        @media (max-width: 900px) {
            .forum-layout {
                grid-template-columns: 180px 210px 1fr;
            }
        }
    </style>
</head>

<body>

<div class="forum-layout">

    <!-- =========================
         SIDEBAR GROUP
    ========================== -->

    <aside class="forum-sidebar">

        <div class="brand">
            <h2>CAMPUSS SAVER</h2>
            <span>Forum</span>
        </div>

        <div class="section-title">
            Community
        </div>

        <div class="group-item active">
            🌐 Community
        </div>

        <div class="section-title">
            Kelompok Saya
        </div>

        <?php if (empty($userGroups)): ?>

            <div
                style="
                    padding: 8px 10px;
                    font-size: 12px;
                    color: #9aa49f;
                "
            >
                Belum bergabung dengan kelompok.
            </div>

 <?php else: ?>

<?php foreach ($userGroups as $group): ?>

    <a
        href="<?= base_url('forum/group/' . $group['id_group']) ?>"
        class="group-item"
        style="display: block; text-decoration: none; color: inherit;"
    >
        👥 <?= esc($group['nama_kelompok']) ?>
    </a>

<?php endforeach; ?>

        <?php
        $idGroup = (int) $group['id_group'];
        $channels = $groupChannels[$idGroup] ?? [];
        ?>

        <?php if (!empty($channels)): ?>

            <!-- TEXT CHANNEL GROUP -->

            <div class="channel-section group-channel-section">

                <div class="channel-section-title">
                    <span>TEXT CHANNELS</span>
                </div>

                <?php foreach ($channels as $channel): ?>

                    <?php if ($channel['tipe'] === 'text'): ?>

                        <a
                            href="<?= base_url('forum/channel/' . $channel['id_channel']) ?>"
                            class="channel-item"
                        >
                            <span class="channel-icon">#</span>

                            <?= esc($channel['nama_channel']) ?>
                        </a>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>


            <!-- VOICE CHANNEL GROUP -->

            <div class="channel-section group-channel-section">

                <div class="channel-section-title">
                    <span>VOICE CHANNELS</span>
                </div>

                <?php foreach ($channels as $channel): ?>

                    <?php if ($channel['tipe'] === 'voice'): ?>

                        <a
                            href="<?= base_url('forum/channel/' . $channel['id_channel']) ?>"
                            class="channel-item"
                        >
                            <span class="channel-icon voice-icon">
                                🔊
                            </span>

                            <?= esc($channel['nama_channel']) ?>
                        </a>

                    <?php endif; ?>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <?php endif; ?>

    </aside>


    <!-- =========================
         CHANNEL SIDEBAR
    ========================== -->

    <aside class="channel-sidebar">

<div class="channel-header">

    <?php if (!empty($selectedGroup)): ?>

        <?= esc($selectedGroup['nama_kelompok']) ?>

    <?php else: ?>

        Community

    <?php endif; ?>

</div>

 <?php if (!empty($selectedGroup)): ?>

    <!-- =========================
         TEXT GROUP
    ========================== -->

    <div class="channel-section">

        <div class="channel-section-title">
            <span>TEXT CHANNELS</span>
        </div>

        <?php foreach ($groupChannels as $channel): ?>

            <?php if ($channel['tipe'] === 'text'): ?>

                <a
                    href="<?= base_url('forum/channel/' . $channel['id_channel']) ?>"
                    class="channel-item"
                >
                    <span class="channel-icon">#</span>

                    <?= esc($channel['nama_channel']) ?>
                </a>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>


    <!-- =========================
         VOICE GROUP
    ========================== -->

    <div class="channel-section">

        <div class="channel-section-title">
            <span>VOICE CHANNELS</span>
        </div>

        <?php foreach ($groupChannels as $channel): ?>

            <?php if ($channel['tipe'] === 'voice'): ?>

                <a
                    href="<?= base_url('forum/channel/' . $channel['id_channel']) ?>"
                    class="channel-item"
                >
                    <span class="channel-icon voice-icon">
                        🔊
                    </span>

                    <?= esc($channel['nama_channel']) ?>
                </a>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>

<?php else: ?>

    <!-- =========================
         TEXT COMMUNITY
    ========================== -->

    <div class="channel-section">

        <div class="channel-section-title">
            <span>TEXT CHANNELS</span>
        </div>

        <?php foreach ($communityChannels as $channel): ?>

            <?php if ($channel['tipe'] === 'text'): ?>

                <a
                    href="<?= base_url('forum/channel/' . $channel['id_channel']) ?>"
                    class="channel-item"
                >
                    <span class="channel-icon">#</span>

                    <?= esc($channel['nama_channel']) ?>
                </a>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>


    <!-- =========================
         VOICE COMMUNITY
    ========================== -->

    <div class="channel-section">

        <div class="channel-section-title">
            <span>VOICE CHANNELS</span>
        </div>

        <?php foreach ($communityChannels as $channel): ?>

            <?php if ($channel['tipe'] === 'voice'): ?>

                <a
                    href="<?= base_url('forum/channel/' . $channel['id_channel']) ?>"
                    class="channel-item"
                >
                    <span class="channel-icon voice-icon">
                        🔊
                    </span>

                    <?= esc($channel['nama_channel']) ?>
                </a>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>

<?php endif; ?>

        </div>

    </aside>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="forum-main">

        <div class="chat-header">

            <div class="chat-title">

                <strong># general</strong>

                <span>
                    Community
                </span>

            </div>

        </div>


        <div class="chat-empty">

            <div class="empty-box">

                <div class="empty-icon">
                    💬
                </div>

                <h3>
                    Selamat datang di Forum
                </h3>

                <p>
                    Pilih channel di sebelah kiri
                    untuk mulai berdiskusi dengan
                    mahasiswa lainnya.
                </p>

            </div>

        </div>


        <div class="chat-input">

            <div class="fake-input">
                Tulis pesan...
            </div>

        </div>

    </main>

</div>

</body>
</html>