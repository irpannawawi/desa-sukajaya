<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_model extends CI_Model {

    public function get_all(){
        return $this->db->get('masyarakat');
    }

    public function get_by_id($id){
        $this->db->where('nik', $id);
        return $this->db->get('masyarakat');
    }
    public function get_where($condition){
        $this->db->where($condition);
        return $this->db->get('masyarakat');
    }

    public function insert($data)
    {
        return $this->db->insert('masyarakat', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('nik', $id);
        $this->db->set($data);
        return $this->db->update('masyarakat');
    }
    public function delete($id)
    {
        $this->db->where('nik', $id);
        return $this->db->delete('masyarakat');
    }

    public function countGender() {
        // Menghitung jumlah laki-laki
        $query_laki = $this->db->where('jenis_kelamin', 'Laki-laki')->get('masyarakat');
        $count_laki = $query_laki->num_rows();

        // Menghitung jumlah perempuan
        $query_perempuan = $this->db->where('jenis_kelamin', 'Perempuan')->get('masyarakat');
        $count_perempuan = $query_perempuan->num_rows();

        // Mengembalikan hasil dalam bentuk array
        return array(
            'laki-laki' => $count_laki,
            'perempuan' => $count_perempuan
        );
    }

}