<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('masyarakat_model');
	}

    public function check_nik()
    {
        $nik = $this->input->post('nik');

        $res = $this->masyarakat_model->get_by_id($nik);
        if($res->num_rows()>0){
            header('Content-type: application/json');
            echo json_encode($res->result()[0]);
        }else{
            echo json_encode(['error'=>true, 'nik'=>$nik]);
        }
    }
}