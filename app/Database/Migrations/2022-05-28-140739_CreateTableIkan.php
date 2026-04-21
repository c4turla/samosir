<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableIkan extends Migration
{
    public function up()
    {
        		// Membuat kolom/field untuk tabel news
		$this->forge->addField([
			'id_ikan'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama_ikan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ]
		]);

		// Membuat primary key
		$this->forge->addKey('id_ikan', TRUE);

		// Membuat tabel Ikan
		$this->forge->createTable('data_ikan', TRUE);
	}


    public function down()
    {
        $this->forge->dropTable('data_ikan');
    }
}
