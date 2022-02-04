<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMatakuliahsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'kode_mk VARCHAR(129) NULL',
            'nama_mk VARCHAR(255) NULL',
            'sks INT(11) NULL',
            'kategori VARCHAR(129) NULL',
            'status INT(11) NULL DEFAULT 1',
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            'updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP()',
        ]);

        $this->forge->createTable('matakuliahs');
    }
    
    public function down()
    {
        $this->forge->dropTable('matakuliahs');
    }
}
