<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_admin','M_admin');
        $this->load->model("Pelanggan_m");
        $this->load->library('form_validation');
        $this->load->model("User_m");
        $this->load->helper('url');

    }

    function index(){

        $data["Pelanggan"] = $this->Pelanggan_m->getAll();
        $data["Pe"] = $this->Pelanggan_m->JoinTB();
        $data["ViewP"] = $this->Pelanggan_m->view_modal();
        $this->load->view('admin/view_admin', $data);
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

    function add_pelanggan(){
        $pelanggan = $this->Pelanggan_m;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());
        $data['Domisili'] = $this->M_admin->get_Kota();
        $data['Dom'] = $this->M_admin->get_Kec();
        $data['Domi'] = $this->M_admin->get_Des();
        $data['Pekerjaan'] = $this->M_admin->get_Pekerjaan();
        $this->load->view('admin/add_form', $data);
    }
//MENAMPILKAN FORM EDIT
    function edit($id=null){
        $where = array('id' => $id);
        $data['pelanggan'] = $this->Pelanggan_m->edit_data($where,'pelanggan')->result();
        $this->load->model('M_admin');
        $this->load->model('M_admin');
        $this->load->model('M_admin');
        $data['Domisili'] = $this->M_admin->get_Kota();
        $data['Dom'] = $this->M_admin->get_Kec();
        $data['Domi'] = $this->M_admin->get_Des();
        $data['Domis'] = $this->M_admin->pos_get();
        $data['Pel'] = $this->Pelanggan_m->getAll();
        $data['Pekerjaan'] = $this->M_admin->get_Pekerjaan();
        // $data['pelanggan'] = $this->Pelanggan_m->getAll($id);
        $this->load->view('admin/edit_form',$data);
        
    }

    //AKSI UNTUK UPDATE DATA
            function update(){
            $id = $this->input->post('id');
            $no_indihome   = $this->input->post('no_indihome');
            $no_telepon    = $this->input->post('no_telepon');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $kota_kabupaten_id  = $this->input->post('kota_kabupaten');
            $kecamatan_id  =  $this->input->post('kecamatan');
            $desa_kelurahan_id  =  $this->input->post('desa_kelurahan');
            $alamat  = $this->input->post('alamat');
            $kodepos_id  = $this->input->post('kodepos_id');
            $no_handphone  = $this->input->post('no_handphone');
            $email  = $this->input->post('email');
            $pekerjaan  = $this->input->post('pekerjaan');
            $kartu_tanda_penduduk  = $this->input->post('kartu_tanda_penduduk');
            $date  = date('Y-m-d H:i:s');
        
            $data = array(
                'no_indihome'           => $no_indihome,
                'no_telepon'            => $no_telepon,
                'nama_lengkap'          => $nama_lengkap,
                'kota_kabupaten_id'     => $kota_kabupaten_id,
                'kecamatan_id'          => $kecamatan_id,
                'desa_kelurahan_id'     => $desa_kelurahan_id,
                'alamat'                => $alamat,
                'kodepos_id'            => $kodepos_id,
                'no_handphone'          => $no_handphone,
                'email'                 => $email,
                'pekerjaan_id'          => $pekerjaan,
                'kartu_tanda_penduduk'  => $kartu_tanda_penduduk,
                'last_updated_at'       => $date
                
        );
            
            $where = array(
            
            'id' => $id
            
            );
            
            
            $this->Pelanggan_m->update_data($where,$data,'pelanggan');
            
            redirect('Pelanggan');
            
            }

    
    //AKSI UNTUK MENGHAPUS DATA
     public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pelanggan_m->delete($id)) {
            redirect(site_url('Pelanggan'));
        }
    }

        function view($id=null){

        $where = array('id' => $id);
        
        $data['pelanggan'] = $this->Pelanggan_m->view_data($where,'pelanggan')->result();
        
        $this->load->view('Pelanggan',$data);
        
    }

     public function success()
    {
        $this->load->view('admin/succes');

    }
}
