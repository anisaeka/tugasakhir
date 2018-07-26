<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User_pencarian extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation','pagination');
  $this->load->model('user_pencarian_model');
}
    public function index()
    {
        $total = $this->user_pencarian_model->getTotal();
        if ($total > 0) {
                      $limit = 2;
                      $start = $this->uri->segment(3, 0);
          
                      $config = [
                        'base_url' => base_url() . 'index.php/user_pencarian/index',
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

                      $this->load->model('user_model');
                      $user_id = $this->session->userdata('user_id');
                   $nama_user=$this->user_model->get_user_details($user_id);
        $jadwal = $this->user_pencarian_model->list($limit,$start);
        $data=[ 
          'pencarian'=> $jadwal,
          'links' => $this->pagination->create_links(),
          'nama_user' => $nama_user
        ];
      }
        $this->load->view('users/pencarian',$data);
    }

   



}

/* End of file Controllername.php */

