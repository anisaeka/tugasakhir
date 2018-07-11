
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class user_admin extends CI_Controller {

    public function __construct()
{
  parent::__construct();
  $this->load->helper('url', 'form');
  $this->load->library('form_validation','pagination');
  $this->load->model('user_admin_model');
}
    public function index()
    {
        $total = $this->user_admin_model->getTotal();
        if ($total > 0) {
                      $limit = 2;
                      $start = $this->uri->segment(3, 0);
          
                      $config = [
                        'base_url' => base_url() . 'index.php/user_admin/index',
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


        $user = $this->user_admin_model->list($limit,$start);
        $user_level = $this->user_admin_model->user_level();
        $data=[ 
          'user'=> $user,
          'user_level' => $user_level,
          'links' => $this->pagination->create_links()
        ];
      }
        $this->load->view('admin/index_user',$data);
    }

    public function create(){
        $this->load->model('user_admin_model');
	$data =[
	'user_level' => $this->user_admin_model->user_level()
	];
        $this->load->view('admin/create_user',$data);
        
    }
    public function store()
    {
        
        $data = [
            'nama'=>$this->input->post('nama'),
            'nim'=>$this->input->post('nim'),
            'email'=>$this->input->post('email'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'fk_level_id'=>$this->input->post('level_id')
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

      
        if ($this->form_validation->run()) {
            
            $this->load->model('user_admin_model');
            
          $result = $this->user_admin_model->insert($data);
          if ($result) {
            redirect('user_admin');
          }
        } else {
          redirect('user_admin/create');
        }
      }

public function show($user_id)
{
    
    $this->load->model('user_admin_model');
    
    $user = $this->user_admin_model->show($user_id);
    $user_level = $this->user_admin_model->user_level();
    $data = [
    'data' => $user,
    'user_level' => $user_level
  ];
  $this->load->view('admin/show_user', $data);
}

public function edit($user_id)
    {
      // TODO: tampilkan view edit data
      
      $this->load->model('user_admin_model');
      $user = $this->user_admin_model->show($user_id);
      $user_level = $this->user_admin_model->user_level();
      $data = [
        'data' => $user,
        'user_level' => $user_level
      ];
      if(isset($_POST['simpan'])){
          $this->update($user_id);
          redirect('user');
      }

      $this->load->view('admin/edit_user',$data);
      
      
    }

public function update($user_id)
{
      // TODO: implementasi update data berdasarkan $user_id
      
     $this->load->model('user_admin_model');
     $pegawai = $this->user_admin_model->update($user_id, $data = []);
     
     redirect('user');
     
}

public function destroy($user_id)
{
      // TODO: implementasi penghapusan data berdasarkan $user_id
      $this->load->model('user_admin_model');
      $pegawai = $this->user_admin_model->delete($user_id);
      redirect('user_admin');
     
}

public function search(){
 
  if($this->input->post('search')){
    $this->load->model('user_admin_model');
    $search= $this->user_admin_model->search($search);
  
    $data = [
    'data' => $search
  ];
  $this->load->view('admin/index-user', $data);
} else {
    echo"data tuser_idak ditemukan";
  }
}






}

/* End of file Controllername.php */

