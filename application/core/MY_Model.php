<?php


class MY_Model extends CI_Model
{
    public $table = '';
    public $primaryKey = 'id';

    public function all()
    {
        return $this->db->get($this->table)->result();
    }

    public function first()
    {
        return $this->db->get($this->table)->row();
    }

    public function getId($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->get($this->table)->row();
    }

    public function create($object)
    {
        return $this->db->insert($this->table, $object);
    }

    public function update($id, $object)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->update($this->table, $object);
    }

    public function delete($id)
    {
        $this->db->where($this->primaryKey, $id);
        return $this->db->delete($this->table);
    }

    public function empty()
    {
        return $this->db->truncate($this->table);
        return $this->db->empty_table($this->table);
    }

    public function random()
    {
        $this->db->order_by($this->primaryKey, 'RANDOM');
        return $this->db->get($this->table)->row();
    }

    public function countWhere($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->count_all_results($this->table);
    }
}
