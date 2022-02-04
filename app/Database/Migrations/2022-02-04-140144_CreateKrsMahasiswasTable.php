<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKrsMahasiswasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'krs_id INT(11) NOT NULL',
            'mahasiswa_id INT(11) NOT NULL',
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->createTable('krs_mahasiswas');
    }

    public function down()
    {
        $this->forge->dropTable('krs_mahasiswas');
    }
}
