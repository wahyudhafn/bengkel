<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Servis_model extends CI_Model
{
    private $_table = "servis";

    public function get_all_servis()
    {
        $this->db->select('servis.*, pelanggan.nama_pelanggan, montir.nama_montir');
        $this->db->from($this->_table);
        $this->db->join('pelanggan', 'servis.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->join('montir', 'servis.id_montir = montir.id_montir');
        $this->db->order_by('tanggal_masuk', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ['id_servis' => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = [
            'id_pelanggan' => $post["id_pelanggan"],
            'id_montir' => $post["id_montir"],
            'no_polisi' => strtoupper($post["no_polisi"]),
            'tanggal_masuk' => $post["tanggal_masuk"],
            'keluhan' => $post["keluhan"],
            'status' => 'Antrian',
        ];
        return $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'id_pelanggan' => $post["id_pelanggan"],
            'id_montir' => $post["id_montir"],
            'no_polisi' => strtoupper($post["no_polisi"]),
            'tanggal_masuk' => $post["tanggal_masuk"],
            'keluhan' => $post["keluhan"],
            'status' => $post["status"],
        ];
        return $this->db->update($this->_table, $data, array('id_servis' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_servis" => $id));
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->from($this->_table)->count_all_results();
    }

    public function get_monthly_servis_data()
    {
        $this->db->select("MONTH(tanggal_masuk) as bulan, COUNT(id_servis) as jumlah");
        $this->db->from($this->_table);
        $this->db->where('YEAR(tanggal_masuk)', date('Y'));
        $this->db->group_by('bulan');
        $this->db->order_by('bulan', 'ASC');
        return $this->db->get()->result_array();
    }
}