<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili_model extends CI_Model {

    public function get_all(){
        $this->db->select('masyarakat.*, suket_domisili.*');
        $this->db->order_by('id_surat', 'DESC');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_domisili.nik_pemohon');
        return $this->db->get('suket_domisili');
    }

    public function get_by_id($id){
        $this->db->select('masyarakat.*, suket_domisili.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_domisili.nik_pemohon');
        $this->db->where('id_surat', $id);
        return $this->db->get('suket_domisili');
    }
    public function get_where($condition){
        
        $this->db->select('masyarakat.*, suket_domisili.*');
        $this->db->join('masyarakat', 'masyarakat.nik=suket_domisili.nik_pemohon');
        $this->db->where($condition);
        return $this->db->get('suket_domisili');
    }

    public function insert($data)
    {
        return $this->db->insert('suket_domisili', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_surat', $id);
        $this->db->set($data);
        return $this->db->update('suket_domisili');
    }
    public function delete($id)
    {
        $this->db->where('id_surat', $id);
        return $this->db->delete('suket_domisili');
    }

}