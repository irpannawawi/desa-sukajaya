<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kematian_model extends CI_Model {

    public function get_all(){
        $this->db->select('masyarakat.*, suket_kematian.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_kematian.nik_pemohon');
        return $this->db->get('suket_kematian');
    }

    public function get_by_id($id){
        $this->db->select('masyarakat.*, suket_kematian.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_kematian.nik_pemohon');
        $this->db->where('id_surat', $id);
        return $this->db->get('suket_kematian');
    }
    public function get_where($condition){
        $this->db->select('masyarakat.*, suket_kematian.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_kematian.nik_pemohon');
        $this->db->where($condition);
        return $this->db->get('suket_kematian');
    }

    public function insert($data)
    {
        return $this->db->insert('suket_kematian', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_surat', $id);
        $this->db->set($data);
        return $this->db->update('suket_kematian');
    }
    public function delete($id)
    {
        $this->db->where('id_surat', $id);
        return $this->db->delete('suket_kematian');
    }

    public function status($status, $id)
    {
        $this->db->where('id_surat', $id);
        $this->db->set('status', $status);
        return $this->db->update('suket_kematian');
    }

}