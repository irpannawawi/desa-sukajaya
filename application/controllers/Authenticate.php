<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('masyarakat_model');
	}

	public function login()
	{
		if(isset($_SESSION['role'])) return redirect($this->session->role);
        $data['_view'] = 'auth/login';
		$this->load->view('templates/auth_layout', $data);
	}

	
	public function register()
	{
		if(isset($_SESSION['role'])) return redirect($this->session->role);
        $data['_view'] = 'auth/register';
		$this->load->view('templates/auth_layout', $data);
	}

	public function act_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// get userdata
		$user = $this->users_model->get_by_email($email);

		if($user->num_rows()<1){
			$this->session->set_flashdata('error', 'Email tidak ditemukan');
			return redirect('login');
			die;
		}


		// verify password
		$user = $user->result()[0];
		if(!password_verify($password, $user->password)){
			$this->session->set_flashdata('error', 'Password tidak cocok');
			return redirect('login');
			die;
		}

		// set session
		$dataMasyarakat = $this->masyarakat_model->get_where(['nik'=>$user->nik])->result()[0];
		$userdata = [
			'uid'=>$user->uid,
			'username'=>$user->username,
			'role'=>$user->role,
			'nik'=>$user->nik,
			'no_kk'=>$dataMasyarakat->no_kk,
		];
		$this->session->set_userdata($userdata);
		
		// redirect
		return redirect($this->session->role);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect('login');
	}

	public function register_member()
	{
		// insert user
		if($this->input->post('password') !== $this->input->post('confirm_password')){
			$this->session->set_flashdata('password tidak cocok');
			return redirect('register');
		}

		$userdata = [
			'username'=>$this->input->post('username'),
			'email'=>$this->input->post('email'),
			'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'nik'=>$this->input->post('nik'),
			'role'=>'pengguna',
		];
		$this->users_model->insert($userdata);

		// insert masyarakat
		if($this->masyarakat_model->get_by_id($this->input->post('nik'))->num_rows()<1){
			$masyarakatdata = [
				'nik'=>$this->input->post('nik'),
				'no_kk'=>$this->input->post('no_kk'),
				'nama'=>$this->input->post('nama'),
				'dusun'=>' ',
				'rt'=>' ',
				'rw'=>' ',
				'desa'=>' ',
				'kecamatan'=>' ',
				'kabupaten'=>' ',
				'tempat_lahir'=>$this->input->post('tempat_lahir'),
				'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
				'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			];
			$this->masyarakat_model->insert($masyarakatdata);
		}
		
		if($this->db->where('no_kk', $this->input->post('no_kk'))->get('kartu_keluarga')->num_rows()<1){
			$res = $this->db->insert('kartu_keluarga', ['no_kk'=>$this->input->post('no_kk')]);
		}
		$this->session->set_flashdata('success', 'Registrasi berhasil silahkan login');
		return redirect('login');
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
