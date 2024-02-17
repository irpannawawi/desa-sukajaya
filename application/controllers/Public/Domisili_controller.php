<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Domisili_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('domisili_model');
        $this->load->model('masyarakat_model');
    }

    public function index()
    {
        $data['domisili'] = $this->domisili_model->get_all()->result();
        $data['_view'] = 'public/domisili/data_domisili';
        $this->load->view('templates/main_layout', $data);
    }

    public function store()
    {

        // insert masyarakat
        if ($this->masyarakat_model->get_by_id($this->input->post('nik'))->num_rows() == 0) {

            $userdata = [
                'nik' => $this->input->post('nik'),
                'no_kk' => $this->input->post('no_kk'),
                'nama' => $this->input->post('nama'),
                'dusun' => $this->input->post('dusun'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupaten' => $this->input->post('kabupaten'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'gol_darah' => $this->input->post('gol_darah'),
            ];

            $res = $this->masyarakat_model->insert($userdata);
        }

        $domisili_data = [
            'nik_pemohon' => $this->input->post('nik'),
            'tujuan' => $this->input->post('tujuan'),
            'nik_termohon' => $this->input->post('nik_termohon'),
            'alamat_lembaga' => $this->input->post('alamat_lembaga'),
            'nama_lembaga' => $this->input->post('nama_lembaga'),
            'alamat_asal' => $this->input->post('alamat_asal'),
        ];

        $res = $this->domisili_model->insert($domisili_data);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            return redirect('public/surat_domisili');
        }
    }
}
