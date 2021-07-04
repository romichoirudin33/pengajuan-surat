<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_application extends CI_Migration
{
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public $table = 'application';

    public function up()
    {
        $field['id'] = ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true];
        $field['name'] = ['type' => 'VARCHAR','constraint' => '100', 'default'=>'name'];
        $field['address'] = ['type' => 'TEXT','null' => true];
        $field['description'] = ['type' => 'TEXT','null' => true];
        $field['icon'] = ['type' => 'VARCHAR','constraint' => '100','default' => 'icon.png'];
        $field['logo'] = ['type' => 'VARCHAR','constraint' => '100','default' => 'logo.png'];
        $field['photo'] = ['type' => 'VARCHAR','constraint' => '100','default' => 'photo.png'];

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table($this->table);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->table);
    }
}

/* End of file Add_application.php */
