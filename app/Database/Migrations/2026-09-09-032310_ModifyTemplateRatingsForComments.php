<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTemplateRatingsForComments extends Migration
{
    public function up()
    {
        $this->db->query('PRAGMA foreign_keys = OFF');

        try {
            // Simpan tabel lama
            $this->db->query(
                'ALTER TABLE template_ratings
                 RENAME TO template_ratings_old'
            );

            // Buat tabel baru tanpa UNIQUE
            $this->db->query(
                'CREATE TABLE template_ratings (
                    id_rating INTEGER PRIMARY KEY AUTOINCREMENT,
                    id_template INTEGER NOT NULL,
                    id_user INTEGER NOT NULL,
                    rating INTEGER NOT NULL,
                    comment TEXT,
                    created_at DATETIME,
                    FOREIGN KEY (id_template)
                        REFERENCES templates(id_template)
                        ON DELETE CASCADE,
                    FOREIGN KEY (id_user)
                        REFERENCES users(id_user)
                        ON DELETE CASCADE
                )'
            );

            // Pindahkan data lama
            $this->db->query(
                'INSERT INTO template_ratings
                    (id_rating, id_template, id_user, rating, comment, created_at)
                 SELECT
                    id_rating, id_template, id_user, rating, comment, created_at
                 FROM template_ratings_old'
            );

            // Hapus tabel lama
            $this->db->query(
                'DROP TABLE template_ratings_old'
            );

            // Index agar pencarian komentar tetap cepat
            $this->db->query(
                'CREATE INDEX idx_template_ratings_template
                 ON template_ratings(id_template)'
            );

            $this->db->query(
                'CREATE INDEX idx_template_ratings_user
                 ON template_ratings(id_user)'
            );
        } finally {
            $this->db->query('PRAGMA foreign_keys = ON');
        }
    }

    public function down()
    {
        // Migration ini mengubah struktur agar satu user
        // dapat membuat lebih dari satu komentar.
        // Rollback tidak dilakukan otomatis karena data komentar
        // bisa sudah memiliki duplikat user + template.
    }
}