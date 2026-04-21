<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKeberangkatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_keberangkatan'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'id_kapal'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'tujuan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'tanggal'           => [
				'type'          => 'DATE',
				'null'          => true,
			],
            'jam'           => [
				'type'          => 'TIME',
				'null'          => true,
			],
            'dermaga'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
            'lat'       => [
				'type'           => 'VARCHAR',
                'constraint'     => '100'
			],
            'long'       => [
				'type'           => 'VARCHAR',
                'constraint'     => '100'
			],
            'status'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'es'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
            'air'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
            'solar'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
            'oli'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
            'bensin'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
            'lainnya'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'keterangan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
           
            'status_approval'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'approve_by'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
            'input_by'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
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
		$this->forge->addKey('id_keberangkatan', TRUE);

		// Membuat tabel Keberangkatan
		$this->forge->createTable('data_keberangkatan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('data_keberangkatan');
    }
}