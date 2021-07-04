<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_pengajuan_surat extends CI_Migration
{
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public $table = 'pengajuan_surat';

    public function up()
    {
        $field['id'] = ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true];
        $field['nik'] = ['type' => 'BIGINT'];
        $field['pengajuan_surat'] = ['type' => 'VARCHAR','constraint' => '100'];
        $field['file'] = ['type' => 'VARCHAR','constraint' => '100', 'default' => null];
        $field['status_proses'] = ['type' => 'ENUM("baru","dikonfirmasi","ditolak","diproses","selesai")', 'default' => 'baru','null' => false];
        $field['email'] = ['type' => 'VARCHAR','constraint' => '100', 'default' => null, 'null' => true];
        $field['no_hp'] = ['type' => 'VARCHAR','constraint' => '100', 'default' => null, 'null' => true];
        $field['keterangan'] = ['type' => 'TEXT', 'default' => null, 'null' => true];
        $field['created_at'] = ['type' => 'datetime default current_timestamp'];

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table($this->table);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->table);
    }
}

/* End of file Add_pengajuan_surat.php */
