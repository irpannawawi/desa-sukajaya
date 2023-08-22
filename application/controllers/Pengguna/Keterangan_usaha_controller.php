<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keterangan_usaha_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role']!='pengguna') return redirect('login');
		$this->load->model('keterangan_usaha_model');
	}

	public function index()
	{
        $data['keterangan_usaha'] = $this->keterangan_usaha_model->get_where(['nik_pemohon'=>$_SESSION['nik']])->result();
        $data['_view'] = 'pengguna/keterangan_usaha/data_keterangan_usaha';
		$this->load->view('templates/main_layout', $data);
	}

    public function store()
    {
        

        $keterangan_usaha_data = [
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'nama_usaha'=>$this->input->post('nama_usaha'),
        ];

        $res = $this->keterangan_usaha_model->insert($keterangan_usaha_data);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            return redirect('pengguna/surat_keterangan_usaha');
        }
    }

    public function edit($id)
	{
        $data['surat'] = $this->keterangan_usaha_model->get_by_id($id)->result()[0];
        $data['_view'] = 'pengguna/keterangan_usaha/edit_keterangan_usaha';
		$this->load->view('templates/main_layout', $data);
	}

    public function update()
    {
        $id = $this->input->post('id_surat');
        $keterangan_usaha_data = [
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'nama_usaha'=>$this->input->post('nama_usaha'),
        ];


        $res = $this->keterangan_usaha_model->update($id, $keterangan_usaha_data);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('pengguna/surat_keterangan_usaha');
        }
    }

    public function delete($id)
    {
        $res = $this->keterangan_usaha_model->delete($id);
        if($res){
            $this->session->set_flashdata('danger', 'Berhasil menghapus data');
            return redirect('pengguna/surat_keterangan_usaha');
        }
    }
}