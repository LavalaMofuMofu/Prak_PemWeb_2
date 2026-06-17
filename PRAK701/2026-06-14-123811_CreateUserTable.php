<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true], 
            'username' => ['type' => 'VARCHAR', 'constraint' => '100'], 
            'email'    => ['type' => 'VARCHAR', 'constraint' => '100'], 
            'password' => ['type' => 'TEXT'], 
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user'); 
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}