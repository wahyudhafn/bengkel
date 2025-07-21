<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Montir_model extends CI_Model
{
    private $_table = "montir";

    public function get_all()
    {
        return $this->db->get($this->_table)->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_montir" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = ['nama_montir' => $post["nama_montir"], 'spesialisasi' => $post["spesialisasi"]];
        return $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $post = $this->input->post();
        $data = ['nama_montir' => $post["nama_montir"], 'spesialisasi' => $post["spesialisasi"]];
        return $this->db->update($this->_table, $data, array('id_montir' => $post['id']));
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_montir" => $id));
    }

    public function count_all()
    {
        return $this->db->count_all($this->_table);
    }
}