<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation','pagination');
  $this->load->model('ruang_model');
}
    public function index()
    {
        $total = $this->ruang_model->getTotal();
        if ($total > 0) {
                      $limit = 2;
                      $start = $this->uri->segment(3, 0);
          
                      $config = [
                        'base_url' => base_url() . 'admin/index_ruang',
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


        $ruang = $this->ruang_model->list($limit,$start);
        $data=[ 
          'ruang'=> $ruang,
          'links' => $this->pagination->create_links()
        ];
      }
        $this->load->view('admin/index_ruang',$data);
    }

    public function search(){
      if($this->input->post('search') != null){
        $this->load->model('ruang_model');
        $search= $this->ruang_model->search($this->input->post('search'));
        $data = [
          'ruang' => $search,
      ];
      $this->load->view('admin/index_ruang', $data);
    } else {
        echo"data tidak ditemukan";
      }
    }

    public function create(){
      if(!$this->session->userdata('logged_in')){
        redirect('user/login');
    }
      $this->load->model('jadwal_model');
        $data =[ 'ruang' => $this->jadwal_model->ruang() ];
        $this->load->view('admin/create_ruang', $data);
        
    }
    public function store()
    {
        
        $data = [
            'nama_ruang'=>$this->input->post('nama_ruang'),
            'jenis_ruang'=>$this->input->post('jenis_ruang'),
            'gedung'=>$this->input->post('gedung')
        ];
        $rules = [
          [
            'field' => 'nama_ruang',
            'label' => 'Nama Ruang',
            'rules' => 'trim|required'
          ]
        ];
        // Untuk rule sederhana bisa dengan menggunakan
        // $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules($rules);
      
        if ($this->form_validation->run()) {
            
            $this->load->model('ruang_model');
            
          $result = $this->ruang_model->insert($data);
          if ($result) {
            redirect('ruang');
          }
        } else {
          redirect('ruang/create');
        }
      }

public function show($nama_ruang)
{
  if(!$this->session->userdata('logged_in')){
    redirect('user/login');
}
    $this->load->model('ruang_model');
    
    $ruang = $this->ruang_model->show($nama_ruang);
    $data = [
    'data' => $ruang
  ];
  $this->load->view('admin/show_ruang', $data);
}

public function edit($nama_ruang)
    {
      // TODO: tampilkan view edit data
      if(!$this->session->userdata('logged_in')){
        redirect('user/login');
    }
      $this->load->model('ruang_model');
      $ruang = $this->ruang_model->show($nama_ruang);
      $data = [
        'data' => $ruang
      ];
      if(isset($_POST['simpan'])){
          $this->update($nama_ruang);
          redirect('ruang');
      }

      $this->load->view('admin/edit_ruang',$data);
      
      
    }

public function update($nama_ruang)
{
      // TODO: implementasi update data berdasarkan $id
      if(!$this->session->userdata('logged_in')){
        redirect('user/login');
    }
     $this->load->model('ruang_model');
     $pegawai = $this->ruang_model->update($nama_ruang, $data = []);
     
     redirect('ruang');
     
}

public function destroy($nama_ruang)
{
      // TODO: implementasi penghapusan data berdasarkan $id
      if(!$this->session->userdata('logged_in')){
        redirect('user/login');
    }
      $this->load->model('ruang_model');
      $pegawai = $this->ruang_model->delete($nama_ruang);
      redirect('ruang');
     
}

}
/* End of file Controllername.php */