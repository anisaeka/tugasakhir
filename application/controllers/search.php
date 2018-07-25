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

      $data = $this->search_model->ruang();
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
        $data = [
        'ruang' => $search1
      ];
      $this->load->view('users/hasil_pencarian', $data);
      
      
    } else {
        echo"data tidak ditemukan";
      }
    }





}

/* End of file Controllername.php */

