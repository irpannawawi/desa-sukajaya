<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role']!='admin') return redirect('login');
		$this->load->model('domisili_model');
	}

	public function index()
	{
        $data['domisili'] = $this->domisili_model->get_all()->result();
        $data['_view'] = 'admin/domisili/data_domisili';
		$this->load->view('templates/main_layout', $data);
	}

    public function store()
    {
        

        $domisili_data = [
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'tujuan'=>$this->input->post('tujuan'),
            'nik_termohon'=>$this->input->post('nik_termohon'),
            'alamat_lembaga'=>$this->input->post('alamat_lembaga'),
            'nama_lembaga'=>$this->input->post('nama_lembaga'),
            'alamat_asal'=>$this->input->post('alamat_asal'),
        ];

        $res = $this->domisili_model->insert($domisili_data);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            return redirect('admin/surat_domisili');
        }
    }

    public function edit($id)
	{
        $data['surat'] = $this->domisili_model->get_by_id($id)->result()[0];
        $data['_view'] = 'admin/domisili/edit_domisili';
		$this->load->view('templates/main_layout', $data);
	}

    public function update()
    {
        $id = $this->input->post('id_surat');
        $domisili_data = [
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'tujuan'=>$this->input->post('tujuan'),
            'nik_termohon'=>$this->input->post('nik_termohon'),
            'alamat_lembaga'=>$this->input->post('alamat_lembaga'),
            'nama_lembaga'=>$this->input->post('nama_lembaga'),
            'alamat_asal'=>$this->input->post('alamat_asal'),
        ];


        $res = $this->domisili_model->update($id, $domisili_data);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('admin/surat_domisili');
        }
    }

    public function delete($id)
    {
        $res = $this->domisili_model->delete($id);
        if($res){
            $this->session->set_flashdata('danger', 'Berhasil menghapus data');
            return redirect('admin/surat_domisili');
        }
    }

    public function terima($id){
        $res = $this->domisili_model->status('selesai', $id);
        if($res){
            $this->session->set_flashdata('danger', 'Berhasil menghapus data');
            return redirect('admin/surat_domisili');
        }
    }

    public function tolak($id){
        $res = $this->domisili_model->status('ditolak', $id);
        if($res){
            $this->session->set_flashdata('danger', 'Berhasil menghapus data');
            return redirect('admin/surat_domisili');
        }
    }
}