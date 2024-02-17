<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelakuan_baik_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role']!='admin') return redirect('login');
		$this->load->model('kelakuan_baik_model');
	}

	public function index()
	{
        $data['kelakuan_baik'] = $this->kelakuan_baik_model->get_all()->result();
        $data['_view'] = 'admin/kelakuan_baik/data_kelakuan_baik';
		$this->load->view('templates/main_layout', $data);
	}

    public function store()
    {
        

        $kelakuan_baik_data = [
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'tujuan'=>$this->input->post('tujuan'),
        ];

        $res = $this->kelakuan_baik_model->insert($kelakuan_baik_data);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            return redirect('admin/surat_kelakuan_baik');
        }
    }

    public function edit($id)
	{
        $data['surat'] = $this->kelakuan_baik_model->get_by_id($id)->result()[0];
        $data['_view'] = 'admin/kelakuan_baik/edit_kelakuan_baik';
		$this->load->view('templates/main_layout', $data);
	}

    public function update()
    {
        $id = $this->input->post('id_surat');
        $kelakuan_baik_data = [
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'tujuan'=>$this->input->post('tujuan'),
        ];


        $res = $this->kelakuan_baik_model->update($id, $kelakuan_baik_data);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('admin/surat_kelakuan_baik');
        }
    }

    public function delete($id)
    {
        $res = $this->kelakuan_baik_model->delete($id);
        if($res){
            $this->session->set_flashdata('danger', 'Berhasil menghapus data');
            return redirect('admin/surat_kelakuan_baik');
        }
    }

    public function terima($id)
    {
        $res = $this->kelakuan_baik_model->status('selesai', $id);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menyetujui data');
            return redirect('admin/surat_kelakuan_baik');
        }
    }

    public function tolak($id)
    {
        $res = $this->kelakuan_baik_model->status('ditolak', $id);
        if($res){
            $this->session->set_flashdata('danger', 'Data ditolak');
            return redirect('admin/surat_kelakuan_baik');
        }
    }
}