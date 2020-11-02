<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_m extends CI_Model
{
    private $_table = "pelanggan";


    public $kota_id;
    public $camat_id;
    public $desa_id;
    public $id;
    public $no_indihome;
    public $no_telepon;
    public $nama_lengkap;
    public $kota_kabupaten_id;
    public $kecamatan_id;
    public $desa_kelurahan_id;
    public $alamat;
    public $kodepos_id;
    public $no_handphone;
    public $email;
    public $pekerjaan_id;
    public $kartu_tanda_penduduk;
    public $last_updated_at;
    public $status;

    public function rules()
    {
        return [
            ['field' => 'id',
            'label' => 'ID',
            'rules' => 'required'],

            ['field' => 'no_indihome',
            'label' => 'No Indihome',
            'rules' => 'required'],
            
            ['field' => 'no_telepon',
            'label' => 'No Telepon',
            'rules' => 'required'],

            ['field' => 'nama_lengkap',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'kota_kabupaten_id',
            'label' => 'Kota Kabupaten',
            'rules' => 'required'],

            ['field' => 'kecamatan_id',
            'label' => 'Kecamatan'],

            ['field' => 'desa_kelurahan_id',
            'label' => 'Desa Kelurahan',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'kodepos_id',
            'label' => 'Kode Pos',
            'rules' => 'required'],

            ['field' => 'no_handphone',
            'label' => 'No HP',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'pekerjaan',
            'label' => 'Pekerjaan',
            'rules' => 'required'],

            ['field' => 'kartu_tanda_penduduk',
            'label' => 'KTP',
            'rules' => 'required'],

            ['field' => 'last_updated_at',
            'label' => 'Last Updated',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function JoinTB()
    {
        $this->db->select('*, pl.id AS id_pelanggan, kb.id AS id_kabupaten, kc.id AS id_kecamatan, kl.id AS id_kecamatan, kp.id AS id_kodepos, pk.id AS id_pekerjaan');
        $this->db->from('pelanggan pl');
        $this->db->join('kota_kabupaten kb','kb.id = pl.kota_kabupaten_id');
        $this->db->join('kecamatan kc','kc.id = pl.kecamatan_id'); 
        $this->db->join('desa_kelurahan kl','kl.id = pl.desa_kelurahan_id');
        $this->db->join('kodepos kp','kp.id = pl.kodepos_id');           
        $this->db->join('pekerjaan pk','pk.id = pl.pekerjaan_id');  
        $query = $this->db->get();
        return $query->result();
        
    }
    public function view_modal(){
        
        $this->db->select('*, pl.id AS id_pelanggan, kb.id AS id_kabupaten, kc.id AS id_kecamatan, kl.id AS id_kecamatan, kp.id AS id_kodepos, pk.id AS id_pekerjaan');
        $this->db->from('pelanggan pl');
        $this->db->join('kota_kabupaten kb','kb.id = pl.kota_kabupaten_id');
        $this->db->join('kecamatan kc','kc.id = pl.kecamatan_id'); 
        $this->db->join('desa_kelurahan kl','kl.id = pl.desa_kelurahan_id');
        $this->db->join('kodepos kp','kp.id = pl.kodepos_id');           
        $this->db->join('pekerjaan pk','pk.id = pl.pekerjaan_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    //UNTUK MENAMBAH PELANGGAN BARU
    function save_pelanggan(){
        $no_indihome   = $this->input->post('no_indihome',TRUE);
        $no_telepon    = $this->input->post('no_telepon',TRUE);
        $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
        $kota_kabupaten_id  = $this->input->post('kota_kabupaten',TRUE);
        $kecamatan_id  =  $this->input->post('kecamatan',TRUE);
        $desa_kelurahan_id  =  $this->input->post('desa_kelurahan',TRUE);
        $alamat  = $this->input->post('alamat',TRUE);
        $kodepos_id  = $this->input->post('kodepos_id',TRUE);
        $no_handphone  = $this->input->post('no_handphone',TRUE);
        $email  = $this->input->post('email',TRUE);
        $pekerjaan  = $this->input->post('pekerjaan',TRUE);
        $kartu_tanda_penduduk  = $this->input->post('kartu_tanda_penduduk',TRUE);
        // $kartu_tanda_penduduk  = "dummy";
        $status  = 1;
        $date  = date('Y-m-d');
        $time  = date('H:i:s');

        $save_ktp = array(



        );
        
        $save    = array(
            'no_indihome'		    => $no_indihome,
            'no_telepon'		    => $no_telepon,
            'nama_lengkap'		    => $nama_lengkap,
            'kota_kabupaten_id' 	=> $kota_kabupaten_id,
            'kecamatan_id'		    => $kecamatan_id,
            'desa_kelurahan_id' 	=> $desa_kelurahan_id,
            'alamat'		        => $alamat,
            'kodepos_id'	        => $kodepos_id,
            'no_handphone'	        => $no_handphone,
            'email'	                => $email,
            'pekerjaan_id'	        => $pekerjaan,
            'kartu_tanda_penduduk'	=> $kartu_tanda_penduduk,
            'last_updated_at'	    => $date.' '.$time,
            'status'	            => $status
        );
    $this->db->insert('kartu_tanda_penduduk',$save_ktp);
    $this->db->insert('pelanggan', $save);
   
    
    $this->session->set_flashdata('msg','<div class="alert alert-success">Pelanggan Saved</div>');
        redirect('Pelanggan');
    }

    //UNTUK UPLOAD FOTO KTP
    public function upload_file()
    {
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg||jepg|png|pdf|doc';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $config['file_name']            = $this->input->post('kartu_tanda_penduduk',TRUE);
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('foto_ktp'))
            {
                    
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/add_form', $error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('admin/view_admin', $data);
            }
    }

    function edit_data($where,$_table){                              
        return $this->db->get_where($_table,$where);
    }
    

    function view_data($where,$_table){                              
        return $this->db->get_where($_table,$where);

    }

    function update_data($where,$data,$_table){
		$this->db->where($where);
		$this->db->update($_table,$data);
	}	   

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    
    
}