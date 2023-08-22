<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function get_all(){
        return $this->db->get('users');
    }

    public function get_by_id($id){
        $this->db->where('uid', $id);
        return $this->db->get('users');
    }
    public function get_by_email($email){
        $this->db->where('email', $email);
        return $this->db->get('users');
    }
    public function get_where($condition){
        $this->db->where($condition);
        return $this->db->get('users');
    }

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('uid', $id);
        $this->db->set($data);
        return $this->db->update('users');
    }
    public function delete($id)
    {
        $this->db->where('uid', $id);
        return $this->db->delete('users');
    }

}