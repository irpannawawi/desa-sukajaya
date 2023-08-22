<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_seed extends CI_Controller {

	public function index()
	{
		$data = [
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'password'=>password_hash('admin', PASSWORD_DEFAULT)
        ];

        $res = $this->db->insert('users', $data);
	}
}
