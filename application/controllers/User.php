<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('M_admin','M_admin');
        $this->load->model("Pelanggan_m");
        $this->load->library('form_validation');
        if ($this->session->userdata('status')!='login') {
			redirect('Login_user');
		} 
	}
	
	public function index()
	{
		$data['Domisili'] = $this->M_admin->get_Kota();
        $data['Pekerjaan'] = $this->M_admin->get_Pekerjaan();
		$this->load->view('user/tes2', $data);
		
	}

	function get_Kecamatan()
    {
        $kota_kabupaten_id = $this->input->post('id',TRUE);
        $data = $this->M_admin->get_Kecamatan($kota_kabupaten_id)->result();
        echo json_encode($data);
    
    }

    function get_Desa()
    {
        $kecamatan_id = $this->input->post('id',TRUE);
        $data = $this->M_admin->get_Desa($kecamatan_id)->result();
        echo json_encode($data);
    }

    function get_Pos()
    {
        $desa_kelurahan_id = $this->input->post('id',TRUE);
        $data = $this->M_admin->get_Pos($desa_kelurahan_id)->result();
        echo json_encode($data);
	}
	
	function save_pelanggan()
    {
        $this->Pelanggan_m->upload_file();
        $this->Pelanggan_m->save_pelanggan();
    }

    
}


