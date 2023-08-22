<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role'] !='admin') return redirect('login');
        
		$this->load->model('users_model');
	}

	public function index()
	{
        $data['admins'] = $this->users_model->get_where(['role'=>'admin'])->result();
        $data['_view'] = 'admin/admin/list_admin';
		$this->load->view('templates/main_layout', $data);
	}

    public function store()
    {
        $userdata = [
            'username'=>$this->input->post('username'),
            'email'=>$this->input->post('email'),
            'role'=>'admin',
            'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];

        $res = $this->users_model->insert($userdata);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            return redirect('admin/admin');
        }
    }

    public function update()
    {
        $id = $this->input->post('uid');
        $userdata = [
            'username'=>$this->input->post('username'),
            'email'=>$this->input->post('email'),
        ];
        
        if($this->input->post('password')!=''){
            $userdata['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $res = $this->users_model->update($id, $userdata);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('admin/admin');
        }
    }

    public function delete($id)
    {
        $res = $this->users_model->delete($id);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('admin/admin');
        }
    }
}