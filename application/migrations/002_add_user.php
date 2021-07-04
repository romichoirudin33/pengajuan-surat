<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration
{
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $field['id'] = ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true];
        $field['name'] = ['type' => 'VARCHAR','constraint' => '100'];
        $field['email'] = ['type' => 'VARCHAR','constraint' => '100'];
        $field['username'] = ['type' => 'VARCHAR','constraint' => '100'];
        $field['password'] = ['type' => 'VARCHAR','constraint' => '100'];
        $field['address'] = ['type' => 'TEXT','null' => true];
        $field['photo'] = ['type' => 'VARCHAR','constraint' => '100','default' => 'user.png'];
        $field['role'] = ['type' => 'ENUM("root","admin","user")','default' => 'user','null' => false];

        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}

/* End of file Add_user.php */
