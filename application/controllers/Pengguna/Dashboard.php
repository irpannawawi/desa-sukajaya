<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role'] !='pengguna') return redirect('login');
		$this->load->model('users_model');
		$this->load->model('masyarakat_model');
		$this->load->model('kematian_model');
		$this->load->model('kelakuan_baik_model');
		$this->load->model('domisili_model');
		$this->load->model('keterangan_usaha_model');
	}

	public function index()
	{
		$data['jumlah_keluarga'] = $this->masyarakat_model->get_where(['no_kk'=>$this->session->no_kk])->num_rows();
		$data['gender'] = $this->masyarakat_model->countGender();
		$data['jumlah_kematian'] = $this->kematian_model->get_where(['nik_pemohon'=>$this->session->nik])->num_rows();
		$data['jumlah_kelakuan_baik'] = $this->kelakuan_baik_model->get_where(['nik_pemohon'=>$this->session->nik])->num_rows();
		$data['jumlah_domisili'] = $this->domisili_model->get_where(['nik_pemohon'=>$this->session->nik])->num_rows();
		$data['jumlah_keterangan_usaha'] = $this->keterangan_usaha_model->get_where(['nik_pemohon'=>$this->session->nik])->num_rows();
        $data['_view'] = 'admin/dashboard';
		$this->load->view('templates/main_layout', $data);
	}
}