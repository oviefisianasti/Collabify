<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTemplateWorkspaces extends Migration
{
    public function up()
    {
        $this->db->query("
            CREATE TABLE template_workspaces (
                id_workspace INTEGER PRIMARY KEY AUTOINCREMENT,
                id_template INTEGER NOT NULL,
                id_group INTEGER,
                created_by INTEGER NOT NULL,
                judul TEXT NOT NULL,
                file_path TEXT,
                status TEXT NOT NULL DEFAULT 'active',
                created_at DATETIME,
                updated_at DATETIME,

                FOREIGN KEY (id_template)
                    REFERENCES templates(id_template)
                    ON DELETE CASCADE,

                FOREIGN KEY (id_group)
                    REFERENCES groups(id_group)
                    ON DELETE SET NULL,

                FOREIGN KEY (created_by)
                    REFERENCES users(id_user)
                    ON DELETE CASCADE
            )
        ");

        $this->db->query("
            CREATE INDEX idx_workspace_template
            ON template_workspaces(id_template)
        ");

        $this->db->query("
            CREATE INDEX idx_workspace_group
            ON template_workspaces(id_group)
        ");

        $this->db->query("
            CREATE INDEX idx_workspace_creator
            ON template_workspaces(created_by)
        ");
    }

    public function down()
    {
        $this->db->query("
            DROP TABLE IF EXISTS template_workspaces
        ");
    }
}