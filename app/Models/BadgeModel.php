<?php

namespace App\Models;

use CodeIgniter\Model;

class BadgeModel extends Model
{
    protected $table            = 'badges';
    protected $primaryKey       = 'id_badge';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'id_user',
        'nama_badge',
        'earned_at',
    ];
}
