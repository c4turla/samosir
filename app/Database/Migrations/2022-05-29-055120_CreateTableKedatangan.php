<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKedatangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_kedatangan'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'id_kapal'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'asal'       => [
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
            'koordinat'       => [
				'type'           => 'DECIMAL(9,6)',
			],
            'jenis_ikan1'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'jenis_ikan2'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'jenis_ikan3'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'jenis_ikan4'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'jenis_ikan5'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'jenis_ikan6'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
            'berat_ikan1'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'berat_ikan2'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'berat_ikan3'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'berat_ikan4'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'berat_ikan5'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'berat_ikan6'       => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
            'suhu_ikan'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
            'suhu_palka'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
            'harga_rata'       => [
				'type'           => 'INT',
				'constraint'     => '20'
			],
            'mutu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
            'produk'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
            'status'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
            'no_antrian'       => [
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
		$this->forge->addKey('id_kedatangan', TRUE);

		// Membuat tabel Kedatangan
		$this->forge->createTable('data_kedatangan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('data_kedatangan');
    }
}
