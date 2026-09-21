<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumThreadModel extends Model
{
    protected $table            = 'forum_threads';
    protected $primaryKey       = 'id_thread';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'id_user',
        'kategori',
        'judul',
        'isi',
    ];
}