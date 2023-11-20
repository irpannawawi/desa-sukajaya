<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role']!='pengguna') return redirect('login');
		$this->load->model('masyarakat_model');
	}

	public function index()
	{
        $data['masyarakat'] = $this->masyarakat_model->get_where(['no_kk'=>$this->session->no_kk])->result();
        $data['_view'] = 'pengguna/masyarakat/data_masyarakat';
		$this->load->view('templates/main_layout', $data);
	}

    public function store()
    {
        
        $userdata = [
            'nik'=>$this->input->post('nik'),
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
            return redirect('pengguna/masyarakat');
        }
    }

    public function edit($nik)
	{
        $data['masyarakat'] = $this->masyarakat_model->get_by_id($nik)->result()[0];
        $data['_view'] = 'pengguna/masyarakat/edit_masyarakat';
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
            return redirect('pengguna/masyarakat');
        }
    }

    public function delete($id)
    {
        $res = $this->masyarakat_model->delete($id);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('pengguna/pengguna');
        }
    }
}