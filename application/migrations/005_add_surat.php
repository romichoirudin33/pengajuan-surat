<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_surat extends CI_Migration
{
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public $table = 'surat';

    public function up()
    {
        $field['id'] = ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true];
        $field['jenis_surat'] = ['type' => 'VARCHAR','constraint' => '100'];
        $field['contoh_file'] = ['type' => 'VARCHAR','constraint' => '100', 'default' => null];
        $field['keterangan_surat'] = ['type' => 'VARCHAR','constraint' => '100', 'default' => null];
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

/* End of file Add_surat.php */
