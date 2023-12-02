<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'nrp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20'
			],
			'jurusan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'telepon'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('mahasiswa', TRUE);
	}

	//-------------------------------------------------------

	public function down()
	{
		// menghapus tabel news
		$this->forge->dropTable('mahasiswa');
	}
}
