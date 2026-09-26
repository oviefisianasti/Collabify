<?php

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\GroupMemberModel;
use App\Models\SpinHistoryModel;
use App\Models\TaskModel;

class SpinnerController extends BaseController
{
    protected GroupModel $groupModel;
    protected GroupMemberModel $memberModel;
    protected SpinHistoryModel $spinHistoryModel;
    protected TaskModel $taskModel;

    public function __construct()
    {
        $this->groupModel      = new GroupModel();
        $this->memberModel     = new GroupMemberModel();
        $this->spinHistoryModel = new SpinHistoryModel();
        $this->taskModel       = new TaskModel();
    }

    /**
     * Halaman utama Spinner.
     */
    public function index()
    {
        $idUser = session()->get('id_user');

        if (!$idUser) {
            return redirect()->to('/login');
        }

        /*
         * Ambil kelompok yang diikuti user.
         */
        $groups = $this->groupModel
            ->getGroupsForUser($idUser);

        /*
         * Ambil semua task dari kelompok-kelompok tersebut.
         * Nanti JavaScript akan memfilter task berdasarkan
         * kelompok yang dipilih.
         */
        $tasks = [];

        /*
         * Ambil anggota masing-masing kelompok.
         */
        $members = [];

        foreach ($groups as $group) {
            $idGroup = (int) $group['id_group'];

            $tasks[$idGroup] = $this->taskModel
                ->where('id_group', $idGroup)
                ->orderBy('created_at', 'DESC')
                ->findAll();

            $members[$idGroup] = $this->memberModel
                ->getMembersWithUser($idGroup);
        }

        return view('spinner/index', [
            'title'   => 'Spin — CAMPUSS SAVER',
            'groups'  => $groups,
            'tasks'   => $tasks,
            'members' => $members,
        ]);
    }

    /**
     * Menyimpan satu hasil spin.
     *
     * Satu sesi spin dapat memiliki banyak hasil.
     */
    public function save()
    {
        $idUser = session()->get('id_user');

        if (!$idUser) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'success' => false,
                    'message' => 'Kamu harus login terlebih dahulu.',
                ]);
        }

        $idGroup   = (int) $this->request->getPost('id_group');
        $idTask    = (int) $this->request->getPost('id_task');
        $sessionId = trim(
            (string) $this->request->getPost('session_id')
        );
        $anggota   = trim(
            (string) $this->request->getPost('anggota')
        );
        $hasil     = trim(
            (string) $this->request->getPost('hasil')
        );

        /*
         * Validasi data dasar.
         */
        if (
            !$idGroup ||
            !$idTask ||
            $sessionId === '' ||
            $anggota === '' ||
            $hasil === ''
        ) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success' => false,
                    'message' => 'Data spin belum lengkap.',
                ]);
        }

        /*
         * Pastikan user merupakan anggota kelompok.
         */
        $isMember = $this->memberModel
            ->where('id_group', $idGroup)
            ->where('id_user', $idUser)
            ->first();

        if (!$isMember) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Kamu bukan anggota kelompok tersebut.',
                ]);
        }

        /*
         * Pastikan task memang milik kelompok tersebut.
         */
        $task = $this->taskModel
            ->where('id_task', $idTask)
            ->where('id_group', $idGroup)
            ->first();

        if (!$task) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'success' => false,
                    'message' => 'Tugas tidak ditemukan pada kelompok tersebut.',
                ]);
        }

        /*
         * Simpan hasil spin.
         */
        $spinId = $this->spinHistoryModel->insert([
            'id_group'   => $idGroup,
            'id_task'    => $idTask,
            'session_id' => $sessionId,
            'anggota'    => $anggota,
            'hasil'      => $hasil,
            'created_by' => $idUser,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if (!$spinId) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'message' => 'Gagal menyimpan hasil spin.',
                ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Hasil spin berhasil disimpan.',
            'id_spin'  => $spinId,
            'session_id' => $sessionId,
            'anggota'  => $anggota,
            'hasil'    => $hasil,
        ]);
    }

    /**
     * Mengambil history spin berdasarkan kelompok.
     */
    public function history($idGroup)
    {
        $idUser = session()->get('id_user');

        if (!$idUser) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'success' => false,
                    'message' => 'Kamu harus login terlebih dahulu.',
                ]);
        }

        $idGroup = (int) $idGroup;

        /*
         * Pastikan user merupakan anggota kelompok.
         */
        $isMember = $this->memberModel
            ->where('id_group', $idGroup)
            ->where('id_user', $idUser)
            ->first();

        if (!$isMember) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Kamu bukan anggota kelompok tersebut.',
                ]);
        }

        /*
         * Ambil seluruh history spin kelompok.
         *
         * Task digunakan supaya history mengetahui
         * tugas apa yang sedang dibagi.
         */
        $history = $this->spinHistoryModel
            ->select(
                'spin_history.*, tasks.judul AS task_judul'
            )
            ->join(
                'tasks',
                'tasks.id_task = spin_history.id_task',
                'left'
            )
            ->where(
                'spin_history.id_group',
                $idGroup
            )
            ->orderBy(
                'spin_history.created_at',
                'DESC'
            )
            ->findAll();

        return $this->response->setJSON([
            'success' => true,
            'history' => $history,
        ]);
    }
public function saveNote()
{
    $idUser = session()->get('id_user');
    $role   = session()->get('role');

    if (!$idUser) {
        return $this->response
            ->setStatusCode(401)
            ->setJSON([
                'success' => false,
                'message' => 'Sesi login sudah berakhir.'
            ]);
    }

    $idGroup = (int) $this->request->getPost('id_group');
    $content = trim((string) $this->request->getPost('content'));

    if (!$idGroup || $content === '') {
        return $this->response
            ->setStatusCode(400)
            ->setJSON([
                'success' => false,
                'message' => 'Data catatan tidak lengkap.'
            ]);
    }

    // Admin dan dosen boleh menyimpan ke kelompok mana pun.
    // Mahasiswa harus menjadi anggota kelompok.
    if (!in_array($role, ['admin', 'dosen'], true)) {
        if (!$this->memberModel->isMember($idGroup, $idUser)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Kamu bukan anggota kelompok ini.'
                ]);
        }
    }

    $db = \Config\Database::connect();

    $builder = $db->table('notes');

    $inserted = $builder->insert([
        'id_group'   => $idGroup,
        'content'    => $content,
        'warna'      => 'ungu',
        'created_by' => $idUser,
        'created_at' => date('Y-m-d H:i:s'),
    ]);

    if (!$inserted) {
        return $this->response
            ->setStatusCode(500)
            ->setJSON([
                'success' => false,
                'message' => 'Gagal menyimpan hasil ke Catatan.'
            ]);
    }

    return $this->response->setJSON([
        'success' => true,
        'message' => 'Hasil pembagian berhasil disimpan ke Catatan.',
        'id_note' => $db->insertID(),
    ]);
}

}