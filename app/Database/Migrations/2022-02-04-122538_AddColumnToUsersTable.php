<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', 'nip VARCHAR(255) NULL');
        $this->forge->addColumn('users', 'nim VARCHAR(255) NULL');
        $this->forge->addColumn('users', 'semester INT(11) NULL');
        $this->forge->addColumn('users', 'foto VARCHAR(255) NULL');
        $this->forge->addColumn('users', 'alamat VARCHAR(255) NULL');
        $this->forge->addColumn('users', 'telepon VARCHAR(255) NULL');
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'nip');
        $this->forge->dropColumn('users', 'nim');
        $this->forge->dropColumn('users', 'semester');
        $this->forge->dropColumn('users', 'foto');
        $this->forge->dropColumn('users', 'alamat');
        $this->forge->dropColumn('users', 'telepon');
    }
}
