<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kematian_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if(!isset($_SESSION['role']) OR $_SESSION['role']!='admin') return redirect('login');
		$this->load->model('kematian_model');
	}

	public function index()
	{
        $data['kematian'] = $this->kematian_model->get_all()->result();
        $data['_view'] = 'admin/kematian/data_kematian';
		$this->load->view('templates/main_layout', $data);
	}

    public function store()
    {
        
        $userdata = [
            'nik_pemohon'=>$this->input->post('nik_pemohon'),
            'nik_termohon'=>$this->input->post('nik_termohon'),
            'tanggal_meninggal'=>$this->input->post('tanggal_meninggal'),
            'tempat_meninggal'=>$this->input->post('tempat_meninggal'),
            'penyebab_meninggal'=>$this->input->post('penyebab_meninggal'),
        ];

        $res = $this->kematian_model->insert($userdata);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            return redirect('admin/surat_kematian');
        }
    }

    public function edit($id)
	{
        $data['surat'] = $this->kematian_model->get_by_id($id)->result()[0];
        $data['_view'] = 'admin/kematian/edit_kematian';
		$this->load->view('templates/main_layout', $data);
	}

    public function update()
    {
        $id = $this->input->post('id_surat');
        $suratData = [
            'tanggal_meninggal'=>$this->input->post('tanggal_meninggal'),
            'tempat_meninggal'=>$this->input->post('tempat_meninggal'),
            'penyebab_meninggal'=>$this->input->post('penyebab_meninggal'),
        ];


        $res = $this->kematian_model->update($id, $suratData);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil merubah data');
            return redirect('admin/surat_kematian');
        }
    }

    public function delete($id)
    {
        $res = $this->kematian_model->delete($id);
        if($res){
            $this->session->set_flashdata('danger', 'Berhasil menghapus data');
            return redirect('admin/surat_kematian');
        }
    }

    public function terima($id)
    {
        $res = $this->kematian_model->status('selesai', $id);
        if($res){
            $this->session->set_flashdata('success', 'Berhasil menyetujui data');
            return redirect('admin/surat_kematian');
        }
    }

    public function tolak($id)
    {
        $res = $this->kematian_model->status('ditolak', $id);
        if($res){
            $this->session->set_flashdata('danger', 'Data ditolak');
            return redirect('admin/surat_kematian');
        }
    }
}