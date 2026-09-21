<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUniqueTemplateGroupWorkspace extends Migration
{
    public function up()
    {
        $this->db->query("
            CREATE UNIQUE INDEX
            idx_unique_template_group_workspace
            ON template_workspaces(id_template, id_group)
        ");
    }

    public function down()
    {
        $this->db->query("
            DROP INDEX IF EXISTS
            idx_unique_template_group_workspace
        ");
    }
}