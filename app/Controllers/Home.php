<?php

namespace App\Controllers;

class Home extends BaseController
{
    // Landing page
    public function index()
    {
        return view('landing page/index');
    }

    // Beranda COLLABIFY
    public function beranda()
    {
        $db = \Config\Database::connect();

        // Template terbaru
        $templates = $db->table('templates')
            ->select('
                templates.id_template,
                templates.judul,
                templates.kategori,
                templates.deskripsi,
                templates.status,
                templates.downloads_count,
                templates.created_at,
                users.name AS uploader
            ')
            ->join(
                'users',
                'users.id_user = templates.uploaded_by',
                'left'
            )
            ->where('templates.status', 'approved')
            ->orderBy('templates.created_at', 'DESC')
            ->limit(12)
            ->get()
            ->getResultArray();

        // Kelompok terbaru
        $groups = $db->table('groups')
            ->select('
                groups.id_group,
                groups.nama_kelompok,
                groups.kode_invite,
                groups.created_at,
                users.name AS pembuat
            ')
            ->join(
                'users',
                'users.id_user = groups.dibuat_oleh',
                'left'
            )
            ->orderBy('groups.created_at', 'DESC')
            ->limit(6)
            ->get()
            ->getResultArray();

        // Task terbaru
        $tasks = $db->table('tasks')
            ->select('
                tasks.id_task,
                tasks.judul,
                tasks.deskripsi,
                tasks.status,
                tasks.deadline,
                tasks.created_at,
                groups.nama_kelompok
            ')
            ->join(
                'groups',
                'groups.id_group = tasks.id_group',
                'left'
            )
            ->orderBy('tasks.created_at', 'DESC')
            ->limit(8)
            ->get()
            ->getResultArray();

        return view('home/index', [
            'title'     => 'Beranda —  COLLABIFY',
            'templates' => $templates,
            'groups'    => $groups,
            'tasks'     => $tasks,
        ]);
    }
}