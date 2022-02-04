<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAngkatanToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', 'angkatan VARCHAR(129) NULL');
    }
    
    public function down()
    {
        $this->forge->dropColumn('users', 'angkatan');
    }
}
