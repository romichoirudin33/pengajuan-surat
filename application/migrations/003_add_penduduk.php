<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_penduduk extends CI_Migration
{
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public $table = 'penduduk';

    public function up()
    {
        $field['id'] = array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true
        );
        $field['nik'] = array(
            'type' => 'BIGINT',
        );
        $field['nama_lengkap'] = array(
            'type' => 'VARCHAR',
            'constraint' => '100',
        );
        $field['tempat_lahir'] = array(
            'type' => 'VARCHAR',
            'constraint' => '100',
        );
        $field['tanggal_lahir'] = array(
            'type' => 'DATE',
            'null' => true,
        );
        $field['alamat'] = array(
            'type' => 'TEXT',
            'null' => true,
        );
        $field['agama'] = array(
            'type' => 'VARCHAR',
            'constraint' => '100',
            'null' => true,
        );
        $field['jenis_kelamin'] = array(
            'type' => 'VARCHAR',
            'constraint' => '100',
            'null' => true,
        );
        $field['status_kawin'] = array(
            'type' => 'VARCHAR',
            'constraint' => '100',
            'null' => true,
        );
        $field['pekerjaan'] = array(
            'type' => 'VARCHAR',
            'constraint' => '100',
            'null' => true,
        );
        $field['kewarganegaraan'] = array(
            'type' => 'ENUM("wni","wna")',
            'default' => 'wni',
            'null' => false,
        );
        $field['photo'] = array(
            'type' => 'VARCHAR',
            'constraint' => '100',
            'default' => 'empty.png'
        );

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table($this->table);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->table);
    }
}

/* End of file Add_penduduk.php */
