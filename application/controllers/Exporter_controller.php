<?php
require FCPATH . 'vendor/autoload.php';
class Exporter_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kematian_model');
        $this->load->model('domisili_model');
        $this->load->model('masyarakat_model');
        $this->load->model('kelakuan_baik_model');
        $this->load->model('keterangan_usaha_model');
    }
    public function ubah_nama_hari($hari)
    {
        switch ($hari){
            case 'Monday':
                return 'Senin';
                break;
            case 'Tuesday':
                return 'Selasa';
                break;
            case 'Wednesday':
                return 'Rabu';
                break;
            case 'Thursday':
                return 'Kamis';
                break;
            case 'Friday':
                return 'Jum\'at';
                break;
            case 'Saturday':
                return 'Sabtu';
                break;
            case 'Sunday':
                return 'Minggu';
                break;
        }
    }
    public function ubah_nama_bulan($bulan)
    {
        switch ($bulan){
            case '01':
                return 'Januari';
                break;
            case '02':
                return 'Febrruari';
                break;
            case '03':
                return 'Maret';
                break;
            case '04':
                return 'April';
                break;
            case '05':
                return 'Mei';
                break;
            case '06':
                return 'Juni';
                break;
            case '07':
                return 'Juli';
                break;
            case '08':
                return 'Agustus';
                break;
            case '09':
                return 'September';
                break;
            
            case '10':
                return 'Oktober';
                break;
            
            case '11':
                return 'November';
                break;

            case '12':
                return 'Desember';
                break;
        }
    }
    public function surat_kematian($id)
    {
        $surat = $this->kematian_model->get_by_id($id)->result()[0];

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/kematian.docx');
        $templateProcessor->setValue('nama', $surat->nama);

        $jenis_kelamin = $surat->jenis_kelamin;
        if($jenis_kelamin == 'L'){
            $jenis_kelamin = 'Laki-laki';
        }elseif($jenis_kelamin=='P'){
            $jenis_kelamin = 'Perempuan';
        }
        $templateProcessor->setValue('jenis_kelamin', $jenis_kelamin);

        $tz  = new DateTimeZone('Asia/Jakarta');
        $age = DateTime::createFromFormat('d-m-Y', $surat->tanggal_lahir, $tz)->diff(new DateTime('now', $tz))->y;
        $hari_meninggal = $this->ubah_nama_hari(DateTime::createFromFormat('Y-m-d', $surat->tanggal_meninggal)->format('l'));
        $templateProcessor->setValue('umur', $age);
        $templateProcessor->setValue('pekerjaan', $surat->pekerjaan);
        $templateProcessor->setValue('dusun', $surat->dusun);
        $templateProcessor->setValue('rt', $surat->rt);
        $templateProcessor->setValue('rw', $surat->rw);

        $templateProcessor->setValue('hari_meninggal', $hari_meninggal);

        $templateProcessor->setValue('tanggal_meninggal', DateTime::createFromFormat('Y-m-d', $surat->tanggal_meninggal)->format('d-m-Y'));
        $templateProcessor->setValue('tempat_meninggal', $surat->tempat_meninggal);

        $templateProcessor->setValue('penyebab_meninggal', $surat->penyebab_meninggal);
        
        $templateProcessor->setValue('tgl', date('d'));
        $bulan = $this->ubah_nama_bulan(date('m'));
        $templateProcessor->setValue('bln', $bulan);
        $templateProcessor->setValue('thn', date('Y'));


        header("Content-Disposition: attachment; filename=kematian.docx");

		$templateProcessor->saveAs('php://output');
    }

    public function surat_domisili($id)
    {
        $surat = $this->domisili_model->get_by_id($id)->result()[0];
        if($surat->tujuan == 'sendiri' || $surat->tujuan == 'orang lain'){
            $nama_template = 'domisili_orang';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/'.$nama_template.'.docx');
            if($surat->tujuan == 'sendiri'){
                $orang = $this->masyarakat_model->get_by_id($surat->nik_pemohon)->result()[0];
            }elseif($surat->tujuan == 'orang lain'){
                $orang = $this->masyarakat_model->get_by_id($surat->nik_termohon)->result()[0];
            }
            // setting parameter
            $jenis_kelamin = $orang->jenis_kelamin;
            if($jenis_kelamin == 'L'){
                $jenis_kelamin = 'Laki-laki';
            }elseif($jenis_kelamin=='P'){
                $jenis_kelamin = 'Perempuan';
            }
            
            // set value
            $templateProcessor->setValue('nama', $orang->nama);
            $templateProcessor->setValue('nik', $orang->nik);
            $templateProcessor->setValue('jenis_kelamin', $jenis_kelamin);
            $tempat_lahir = ucfirst(strtolower($orang->tempat_lahir));
            $templateProcessor->setValue('tempat_lahir', $tempat_lahir);
            $templateProcessor->setValue('tanggal_lahir', $orang->tanggal_lahir);
            $templateProcessor->setValue('pekerjaan', $orang->pekerjaan);
            $templateProcessor->setValue('status_perkawinan', $orang->status_perkawinan=='S'?'Menikah':'Belum menikah');
            $dusun = ucfirst(strtolower(trim($orang->dusun)));
            $templateProcessor->setValue('dusun', $dusun);
            $templateProcessor->setValue('rt', $orang->rt);
            $templateProcessor->setValue('rw', $orang->rw);
    
            $templateProcessor->setValue('tgl', date('d'));
            $bulan = $this->ubah_nama_bulan(date('m'));
            $templateProcessor->setValue('bln', $bulan);
            $templateProcessor->setValue('thn', date('Y'));
        }else{
            $nama_template = 'domisili_lembaga';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/'.$nama_template.'.docx');

            // set value
            $templateProcessor->setValue('nama_lembaga', $surat->nama_lembaga);
            $templateProcessor->setValue('alamat_lembaga', $surat->alamat_lembaga);
    
            $templateProcessor->setValue('tgl', date('d'));
            $bulan = $this->ubah_nama_bulan(date('m'));
            $templateProcessor->setValue('bln', $bulan);
            $templateProcessor->setValue('thn', date('Y'));

        }
        
        header("Content-Disposition: attachment; filename=domisili.docx");

		$templateProcessor->saveAs('php://output');
    }

    public function surat_kelakuan_baik($id)
    {
        $surat = $this->kelakuan_baik_model->get_by_id($id)->result()[0];

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/kelakuan_baik.docx');
        $jenis_kelamin = $surat->jenis_kelamin;
        if($jenis_kelamin == 'L'){
            $jenis_kelamin = 'Laki-laki';
        }elseif($jenis_kelamin=='P'){
            $jenis_kelamin = 'Perempuan';
        }
        // set value
        $templateProcessor->setValue('nama', $surat->nama);
        $templateProcessor->setValue('nik', $surat->nik);
        $templateProcessor->setValue('jenis_kelamin', $jenis_kelamin);
        $tempat_lahir = ucfirst(strtolower($surat->tempat_lahir));
        $templateProcessor->setValue('tempat_lahir', $tempat_lahir);
        $templateProcessor->setValue('tanggal_lahir', $surat->tanggal_lahir);
        $templateProcessor->setValue('pekerjaan', $surat->pekerjaan);
        $templateProcessor->setValue('status_perkawinan', $surat->status_perkawinan=='S'?'Menikah':'Belum menikah');
        $dusun = ucfirst(strtolower(trim($surat->dusun)));
        $templateProcessor->setValue('dusun', $dusun);
        $templateProcessor->setValue('rt', $surat->rt);
        $templateProcessor->setValue('rw', $surat->rw);

        $templateProcessor->setValue('tgl', date('d'));
        $bulan = $this->ubah_nama_bulan(date('m'));
        $templateProcessor->setValue('bln', $bulan);
        $templateProcessor->setValue('thn', date('Y'));
        

        header("Content-Disposition: attachment; filename=kelakuan_baik.docx");

		$templateProcessor->saveAs('php://output');
    }

    
    public function surat_keterangan_usaha($id)
    {
        $surat = $this->keterangan_usaha_model->get_by_id($id)->result()[0];

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('assets/template/keterangan_usaha.docx');
        $jenis_kelamin = $surat->jenis_kelamin;
        if($jenis_kelamin == 'L'){
            $jenis_kelamin = 'Laki-laki';
        }elseif($jenis_kelamin=='P'){
            $jenis_kelamin = 'Perempuan';
        }
        // set value
        $templateProcessor->setValue('nama', $surat->nama);
        $templateProcessor->setValue('nik', $surat->nik);
        $templateProcessor->setValue('jenis_kelamin', $jenis_kelamin);
        $tempat_lahir = ucfirst(strtolower($surat->tempat_lahir));
        $templateProcessor->setValue('tempat_lahir', $tempat_lahir);
        $templateProcessor->setValue('tanggal_lahir', $surat->tanggal_lahir);
        $templateProcessor->setValue('pekerjaan', $surat->pekerjaan);
        $templateProcessor->setValue('status_perkawinan', $surat->status_perkawinan=='S'?'Menikah':'Belum menikah');
        $dusun = ucfirst(strtolower(trim($surat->dusun)));
        $templateProcessor->setValue('dusun', $dusun);
        $templateProcessor->setValue('rt', $surat->rt);
        $templateProcessor->setValue('rw', $surat->rw);
        $templateProcessor->setValue('nama_usaha', $surat->nama_usaha);

        $templateProcessor->setValue('tgl', date('d'));
        $bulan = $this->ubah_nama_bulan(date('m'));
        $templateProcessor->setValue('bln', $bulan);
        $templateProcessor->setValue('thn', date('Y'));
        

        header("Content-Disposition: attachment; filename=keterangan_usaha.docx");

		$templateProcessor->saveAs('php://output');
    }
}