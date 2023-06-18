<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 3,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => '255',
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->createTable('data_produk');
    }

    public function down()
    {
        $this->forge->dropTable('data_produk');
    }
}
