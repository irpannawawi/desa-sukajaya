<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelakuan_baik_model extends CI_Model {

    public function get_all(){
        $this->db->select('masyarakat.*, suket_kelakuan_baik.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_kelakuan_baik.nik_pemohon');
        return $this->db->get('suket_kelakuan_baik');
    }

    public function get_by_id($id){
        $this->db->select('masyarakat.*, suket_kelakuan_baik.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_kelakuan_baik.nik_pemohon');
        $this->db->where('id_surat', $id);
        return $this->db->get('suket_kelakuan_baik');
    }
    public function get_where($condition){
        
        $this->db->select('masyarakat.*, suket_kelakuan_baik.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_kelakuan_baik.nik_pemohon');
        $this->db->where($condition);
        return $this->db->get('suket_kelakuan_baik');
    }

    public function insert($data)
    {
        return $this->db->insert('suket_kelakuan_baik', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_surat', $id);
        $this->db->set($data);
        return $this->db->update('suket_kelakuan_baik');
    }
    public function delete($id)
    {
        $this->db->where('id_surat', $id);
        return $this->db->delete('suket_kelakuan_baik');
    }

    public function status($status, $id)
    {
        
        $this->db->where('id_surat', $id);
        $this->db->set('status', $status);
        return $this->db->update('suket_kelakuan_baik');
        
    }

}