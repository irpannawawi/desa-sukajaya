<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role']!='admin') return redirect('login');
		$this->load->model('masyarakat_model');
	}

	public function index()
	{
        $data['masyarakat'] = $this->masyarakat_model->get_all()->result();
        
        $data['_view'] = 'admin/masyarakat/data_masyarakat';
		$this->load->view('templates/main_layout', $data);
	}

    public function store()
    {
        
        $userdata = [
            'nik'=>$this->input->post('nik'),
            'no_kk'=>$this->input->post('no_kk'),
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

        $res = $this->masyarakat_model->insert($userdata);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            return redirect('admin/masyarakat');
        }
    }

    public function edit($nik)
	{
        $data['masyarakat'] = $this->masyarakat_model->get_by_id($nik)->result()[0];
        $data['_view'] = 'admin/masyarakat/edit_masyarakat';
		$this->load->view('templates/main_layout', $data);
	}

    public function update()
    {
        $id = $this->input->post('nik');
        $userdata = [
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


        $res = $this->masyarakat_model->update($id, $userdata);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('admin/masyarakat');
        }
    }

    public function delete($id)
    {
        $res = $this->masyarakat_model->delete($id);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('admin/masyarakat');
        }
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