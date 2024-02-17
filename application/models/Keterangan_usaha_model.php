<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keterangan_usaha_model extends CI_Model {

    public function get_all(){
        $this->db->select('masyarakat.*, suket_usaha.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_usaha.nik_pemohon');
        return $this->db->get('suket_usaha');
    }

    public function get_by_id($id){
        
        $this->db->select('masyarakat.*, suket_usaha.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_usaha.nik_pemohon');
        $this->db->where('id_surat', $id);
        return $this->db->get('suket_usaha');
    }
    public function get_where($condition){
        
        $this->db->select('masyarakat.*, suket_usaha.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_usaha.nik_pemohon');
        $this->db->where($condition);
        return $this->db->get('suket_usaha');
    }

    public function insert($data)
    {
        return $this->db->insert('suket_usaha', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_surat', $id);
        $this->db->set($data);
        return $this->db->update('suket_usaha');
    }
    public function delete($id)
    {
        $this->db->where('id_surat', $id);
        return $this->db->delete('suket_usaha');
    }

    public function status($status, $id)
    {
        
        $this->db->where('id_surat', $id);
        $this->db->set('status', $status);
        return $this->db->update('suket_usaha');
    }
}