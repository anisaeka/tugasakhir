<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation','pagination');
  $this->load->model('jadwal_model');
}
    public function index()
    {
        $total = $this->jadwal_model->getTotal();
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


        $jadwal = $this->jadwal_model->list($limit,$start);
        
        $data=[ 
          'jadwal'=> $jadwal,
          'ruang' => $this->jadwal_model->ruang(),
          'links' => $this->pagination->create_links()
        ];
      }
        $this->load->view('admin/index_jadwal', $data);
    }

    public function search(){
      if($this->input->post('search') != null){
        $this->load->model('jadwal_model');
        $search = $this->jadwal_model->search($this->input->post('search'));
        $data = [
        'jadwal' => $search,
        'ruang' => $this->jadwal_model->ruang(),
      ];
      $this->load->view('admin/index_jadwal', $data);
    } else {
        echo"data tidak ditemukan";
      }
    }

    public function create(){
        $this->load->model('jadwal_model');
        $data =[ 'ruang' => $this->jadwal_model->ruang() ];
        $this->load->view('admin/create_jadwal', $data);
        
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
            
            $this->load->model('jadwal_model');
            
          $result = $this->jadwal_model->insert($data);
          if ($result) {
            redirect('jadwal');
          }
        } else {
          redirect('jadwal/create');
        }
      }

public function show($id)
{
    
    $this->load->model('jadwal_model');
    
    $jadwal = $this->jadwal_model->show($id);
    $data = [
    'data' => $jadwal,
    'ruang' => $this->jadwal_model->ruang()
  ];
  $this->load->view('admin/show_jadwal', $data);
}

public function edit($id)
    {
      // TODO: tampilkan view edit data
      
      $this->load->model('jadwal_model');
      $jadwal = $this->jadwal_model->show($id);
      $data = [
        'data' => $jadwal,
        'ruang' => $this->jadwal_model->ruang()
      ];
      if(isset($_POST['simpan'])){
          $this->update($id);
          redirect('jadwal');
      }

      $this->load->view('admin/edit_jadwal',$data);
      
      
    }

public function update($id)
{
      // TODO: implementasi update data berdasarkan $id
      
     $this->load->model('jadwal_model');
     $pegawai = $this->jadwal_model->update($id, $data = []);
     
     redirect('jadwal');
     
}

public function destroy($id)
{
      // TODO: implementasi penghapusan data berdasarkan $id
      $this->load->model('jadwal_model');
      $pegawai = $this->jadwal_model->delete($id);
      redirect('jadwal');
     
}








}

/* End of file Controllername.php */

