<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
		$this->load->model('masyarakat_model');
		$this->load->model('kematian_model');
		$this->load->model('kelakuan_baik_model');
		$this->load->model('domisili_model');
		$this->load->model('keterangan_usaha_model');
    }

    public function index()
    {
        $query = null;
        $data['_view'] = 'public/home';
		$this->load->view('templates/public', $data);
    }

    public function information()
    {
        if(isset($_GET['keyword']))
        {
            $data['search_result'] = [
                'masyarakat'=> $this->db->select('*')->like('nama', '%'.$_GET['keyword'].'%')->get('masyarakat')->result(),
            ];
        }
        // var_dump($this->db->last_query());
        // var_dump($data['search_result']['masyarakat']);die;
        $data['jumlah_pengguna'] = $this->masyarakat_model->get_all()->num_rows();
		$data['jumlah_kematian'] = $this->kematian_model->get_all()->num_rows();
		$data['jumlah_kelakuan_baik'] = $this->kelakuan_baik_model->get_all()->num_rows();
		$data['jumlah_domisili'] = $this->domisili_model->get_all()->num_rows();
		$data['jumlah_keterangan_usaha'] = $this->keterangan_usaha_model->get_all()->num_rows();
		$data['gender'] = $this->masyarakat_model->countGender();

        $data['_view'] = 'public/informasi';
		$this->load->view('templates/public', $data);
    }
}
