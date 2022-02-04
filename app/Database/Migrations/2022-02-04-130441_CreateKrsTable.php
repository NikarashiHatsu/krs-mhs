<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKrsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id INT(11) PRIMARY KEY AUTO_INCREMENT',
            'nama VARCHAR(255) NOT NULL',
            'semester INT(11) NULL',
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->createTable('krs');
    }

    public function down()
    {
        $this->forge->dropTable('krs');
    }
}
