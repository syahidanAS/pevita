<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_add extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Domisili_m','domisili_m');
        $this->load->model("Pelanggan_m");
        $this->load->library('form_validation');
    }

    function index(){
        $pelanggan = $this->Pelanggan_m;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());
        $data['Domisili'] = $this->domisili_m->get_Kota();
        $data['Dom'] = $this->domisili_m->get_Kec();
        $data['Domi'] = $this->domisili_m->get_Des();
        $data['Pekerjaan'] = $this->domisili_m->get_Pekerjaan();
        $this->load->view('admin/add_form', $data);
    }


    function get_Kecamatan()
    {
        $kota_kabupaten_id = $this->input->post('id',TRUE);
        $data = $this->domisili_m->get_Kecamatan($kota_kabupaten_id)->result();
        echo json_encode($data);
    
    }

    function get_Desa()
    {
        $kecamatan_id = $this->input->post('id',TRUE);
        $data = $this->domisili_m->get_Desa($kecamatan_id)->result();
        echo json_encode($data);
    }

    function get_Pos()
    {
        $desa_kelurahan_id = $this->input->post('id',TRUE);
        $data = $this->domisili_m->get_Pos($desa_kelurahan_id)->result();
        echo json_encode($data);
    }

}
