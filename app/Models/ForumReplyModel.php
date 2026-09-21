<?php

namespace App\Models;

use CodeIgniter\Model;

class ForumReplyModel extends Model
{
    protected $table            = 'forum_replies';
    protected $primaryKey       = 'id_reply';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'id_thread',
        'id_user',
        'isi',
        'created_at',
    ];
}