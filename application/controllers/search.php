<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class search extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation','pagination');
  $this->load->model('search_model');
}
   
public function index()
    {
        /*
        $total = $this->search_model->getTotal();
        if ($total > 0) {
                      $limit = 2;
                      $start = $this->uri->segment(3, 0);
          
                      $config = [
                        'base_url' => base_url() . 'admin/index_jadwal',
                        'total_rows' => $total,
                        'per_page' => $limit,
                       'uri_segment' => 3,
        
                        // Bootstrap 3 Pagination
                        'first_link' => '&laquo;',
                        'last_link' => '&raquo;',
                        'next_link' => 'Next',
                        'prev_link' => 'Prev',
                        'full_tag_open' => '<ul class="pagination">',
                        'full_tag_close' => '</ul>',
                        'num_tag_open' => '<li>',
                        'num_tag_close' => '</li>',
                        'cur_tag_open' => '<li class="active"><span>',
                        'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                        'next_tag_open' => '<li>',
                        'next_tag_close' => '</li>',
                        'prev_tag_open' => '<li>',
                        'prev_tag_close' => '</li>',
                        'first_tag_open' => '<li>',
                        'first_tag_close' => '</li>',
                        'last_tag_open' => '<li>',
                        'last_tag_close' => '</li>',
                     ];
                      $this->pagination->initialize($config);


        $jadwal = $this->search_model->list($limit,$start);
        
        $data=[ 
          'jadwal'=> $jadwal,
          'ruang' => $this->search_model->ruang(),
          'links' => $this->pagination->create_links()
        ];
      }
      $this->load->view('users/hasil_pencarian',$data);
      */
      $user_id = $this->session->userdata('user_id');
      $this->load->model('user_model');
		  $nama_user=$this->user_model->get_user_details($user_id);
      $data = [ 'ruang' => $this->search_model->ruang(),
      'nama_user'=> $nama_user ]
      ;
      $this->load->view('users/hasil_pencarian',$data);

    }

    public function search(){

      $hari = $this->input->post('hari');
      $jam_awal=$this->input->post('jam_awal');
      $jam_akhir=$this->input->post('jam_akhir');
      $search=[
        'hari'=> $this->input->post('hari'),
        'jam_awal' => $this->input->post('jam_awal'),
        'jam_akhir' => $this->input->post('jam_akhir')
      ];
    
      if($search != null){
          /*if(($jam_awal == ($this->db->select('mulai_jam') )) && ($jam_akhir==($this->db->select('akhir_jam') ))){*/
        $this->load->model('search_model');
        $search1 = $this->search_model->search($hari,$jam_awal,$jam_akhir);
        $this->load->model('user_model');
        $user_id = $this->session->userdata('user_id');
		  $nama_user=$this->user_model->get_user_details($user_id);
        $data = [
        'ruang' => $search1,
        'nama_user' => $nama_user
      ];
      $this->load->view('users/hasil_pencarian', $data);
      
      
    } else {
        echo"data tidak ditemukan";
      }
    }

    public function show($nama_ruang)
{
  if(!$this->session->userdata('logged_in')){
    redirect('user/login');
}
    $this->load->model('ruang_model');
    $this->load->model('user_model');
        $user_id = $this->session->userdata('user_id');
		  $nama_user=$this->user_model->get_user_details($user_id);
    $ruang = $this->ruang_model->show($nama_ruang);
    $data = [
    'data' => $ruang,
    'nama_user' => $nama_user
  ];
  $this->load->view('users/details_pencarian', $data);
}
 public function back(){
   redirect('search/search');
 }




}

/* End of file Controllername.php */

