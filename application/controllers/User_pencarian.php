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
                        'base_url' => base_url() . 'index.php/user_pencarian/pencarian',
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


        $jadwal = $this->user_pencarian_model->list($limit,$start);
        $data=[ 
          'pencarian'=> $jadwal,
          'links' => $this->pagination->create_links()
        ];
      }
        $this->load->view('users/pencarian',$data);
    }

    public function create(){
        
        $this->load->view('users/pencarian');
        
    }
    public function store()
    {
        
        $data = [
            'mata_kuliah'=>$this->input->post('mata_kuliah'),
            'dosen'=>$this->input->post('dosen'),
            'hari'=>$this->input->post('hari'),
            'jam'=>$this->input->post('jam'),
            'mulai_jam'=>$this->input->post('mulai_jam'),
            'akhir_jam'=>$this->input->post('akhir_jam'),
            'nama_ruang'=>$this->input->post('nama_ruang'),
            'kelas'=>$this->input->post('kelas')
        ];
        $rules = [
          [
            'field' => 'mata_kuliah',
            'label' => 'Mata Kuliah',
            'rules' => 'trim|required'
          ]
        ];
        // Untuk rule sederhana bisa dengan menggunakan
        // $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules($rules);
      
        if ($this->form_validation->run()) {
            
            $this->load->model('user_pencarian_model');
            
          $result = $this->user_pencarian_model->insert($data);
          if ($result) {
            redirect('user_pencarian');
          }
        } else {
          redirect('user_pencarian/create');
        }
      }

public function show($id)
{
  if(!$this->session->userdata('logged_in')){
    redirect('user/login');
}
    $this->load->model('user_pencarian_model');
    
    $user_pencarian = $this->user_pencarian_model->show($id);
    $data = [
    'data' => $user_pencarian
  ];
  $this->load->view('users/show_user_pencarian', $data);
}

public function edit($id)
    {
      // TODO: tampilkan view edit data
      if(!$this->session->userdata('logged_in')){
        redirect('user/login');
    }
      $this->load->model('user_jadwal_model');
      $jadwal = $this->user_jadwal_model->show($id);
      $data = [
        'data' => $jadwal
      ];
      if(isset($_POST['simpan'])){
          $this->update($id);
          redirect('pencarian');
      }

      $this->load->view('users/edit_jadwal',$data);
      
      
    }

public function update($id)
{
      // TODO: implementasi update data berdasarkan $id
      if(!$this->session->userdata('logged_in')){
        redirect('user/login');
    }
     $this->load->model('jadwal_model');
     $pegawai = $this->jadwal_model->update($id, $data = []);
     
     redirect('jadwal');
     
}

public function destroy($id)
{
  if(!$this->session->userdata('logged_in')){
    redirect('user/login');
}
      // TODO: implementasi penghapusan data berdasarkan $id
      $this->load->model('jadwal_model');
      $pegawai = $this->jadwal_model->delete($id);
      redirect('jadwal');
     
}

public function search(){
 
  if($this->input->post('search')){
    $this->load->model('jadwal_model');
    $search= $this->jadwal_model->search($search);
  
    $data = [
    'data' => $search
  ];
  $this->load->view('admin/index-jadwal', $data);
} else {
    echo"data tidak ditemukan";
  }
}






}

/* End of file Controllername.php */

