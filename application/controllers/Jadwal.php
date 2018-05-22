
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation');
  $this->load->model('jadwal_model');
}
    public function index()
    {
        $jadwal = $this->jadwal_model->list();
        $data=[ 'jadwal'=> $jadwal];
        $this->load->view('admin/index_jadwal',$data);
    }

    public function create(){
        
        $this->load->view('admin/create_jadwal');
        
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
    'data' => $jadwal
  ];
  $this->load->view('admin/show_jadwal', $data);
}

public function edit($id)
    {
      // TODO: tampilkan view edit data
      
      $this->load->model('jadwal_model');
      $jadwal = $this->jadwal_model->show($id);
      $data = [
        'data' => $jadwal
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

