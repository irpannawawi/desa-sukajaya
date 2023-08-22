<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role'] !='admin') return redirect('login');
		$this->load->model('users_model');
	}

	public function index()
	{
        $data['_view'] = 'admin/dashboard';
		$this->load->view('templates/main_layout', $data);
	}
}