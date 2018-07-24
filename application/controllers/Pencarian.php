<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencarian extends CI_Controller {

	
	public function index()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hari','Hari','required');
        if($this->form_validation->run() == false){
            $this->load->view('users/pencarian');
        }else{
            $post = $this->input->post();
            $this->db->select("group_concat(ruang_kelas.nama_ruang) as list");
            $this->db->join("jadwal_kuliah","ruang_kelas.nama_ruang=jadwal_kuliah.nama_ruang","left");
            $this->db->where("jadwal_kuliah.mulai_jam <= ",$post['jam_akhir']);
            $this->db->or_where("jadwal_kuliah.akhir_jam >=",$post['jam_awal']);
            $this->db->where('jadwal_kuliah.id',null);
            $query = $this->db->get("ruang_kelas");
            $data['hasil'] = $query->row(0)->list;
            $this->load->view('users/pencarian',$data);
        }
		
	}
}
