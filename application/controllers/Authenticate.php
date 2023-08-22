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
		$userdata = [
			'uid'=>$user->uid,
			'username'=>$user->username,
			'role'=>$user->role,
			'nik'=>$user->nik,
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
				'nama'=>$this->input->post('nama'),
				'dusun'=>$this->input->post('dusun'),
				'rt'=>$this->input->post('rt'),
				'rw'=>$this->input->post('rw'),
				'desa'=>$this->input->post('desa'),
				'kecamatan'=>$this->input->post('kecamatan'),
				'kabupaten'=>$this->input->post('kabupaten'),
				'tempat_lahir'=>$this->input->post('tempat_lahir'),
				'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
				'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
				'agama'=>$this->input->post('agama'),
				'status_perkawinan'=>$this->input->post('status_perkawinan'),
				'pekerjaan'=>$this->input->post('pekerjaan'),
				'gol_darah'=>$this->input->post('gol_darah'),
			];
			$this->masyarakat_model->insert($masyarakatdata);
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
