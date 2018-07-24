<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Headline extends CI_Controller {
 
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation','pagination');
        $this->load->model('headline_model');
    }
    
     public function index()
     {
        $total = $this->headline_model->getTotal();
        if ($total > 0) {
                      $limit = 2;
                      $start = $this->uri->segment(3, 0);
          
                      $config = [
                        'base_url' => base_url() . 'index.php/headline/index',
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


        $headline = $this->headline_model->list($limit,$start);
        $data=[ 
          'headline'=> $headline,
          'links' => $this->pagination->create_links()
        ];
      }
        $this->load->view('admin/index_headline',$data);
     }

     public function search()
     {
        if($this->input->post('search') != null){
          $this->load->model('headline_model');
          $search = $this->headline_model->search($this->input->post('search'));
          $data = [
          'headline' => $search,
        ];
        $this->load->view('admin/index_headline', $data);
      } else {
          echo"data tidak ditemukan";
        }
      }

     public function create()
     {
         $this->load->model('headline_model');
         $data['id'] = $this->session->userdata('id');

         $this->load->helper(array('form', 'url'));
 
         $this->load->library('form_validation');
                 
                
                 $this->form_validation->set_rules('keterangan', 'Isi Keterangan', 'required|min_length[5]|max_length[30]');
                 $this->form_validation->set_rules('gambar', 'Isi File Gambar', 'required');
                 
 
                 if ($this->form_validation->run() == FALSE)
                 {
                    $this->load->view('admin/create_headline',$data);
                 }
                         $this->load->model('headline_model');
                         $data = array();
 
                         if ($this->input->post('submit')) {
                             $upload = $this->headline_model->upload();
 
                         if ($upload['result'] == 'success') {
                             $this->headline_model->insert($upload);
                             redirect('headline/index');
                             }else{
                             $data['message'] = $upload['error'];
                             }
                         }
                    
     }
    public function store()
    {
        

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('gambar', 'gambar', 'required');
		
        
        if($this->form_validation->run()== FALSE){
          //  $this->load->view('templates/header');
            $this->load->view('admin/create_headline',$data);
            //$this->load->view('templates/footer');
        }else {
           // Apakah user upload gambar?
    		if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = '.upload/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 20000000;
    	        $config['max_width']            = 1024;
    	        $config['max_height']           = 768;

    	        // Load library upload
    	        $this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('gambar'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();

    	        	$post_image = '';

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	           // $this->load->view('templates/header');
    	            $this->load->view('admin/create_headline', $data);
    	            //$this->load->view('templates/footer'); 

    	        } else {

    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {

    			// User tidak upload gambar, jadi kita kosongkan field ini
    			$post_image = '';
    		}

             	// Memformat slug sebagai alamat URL, 
	    	// Misal judul: "Hello World", kita format menjadi "hello-world"
	    	// Nantinya, URL blog kita menjadi mudah dibaca 
	    	// http://localhost/ci3-course/blog/hello-world
	    	
	    	$post_data = array(
				'keterangan' => $this->input->post('text'),
	    	    'gambar' => $post_image,
	    	   	
	    	);
	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->headline_model->insert($post_data);

		        //$this->load->view('templates/header');
		        $this->load->view('', $data);
		     //   $this->load->view('templates/footer'); 
	    	}
        }

        redirect('headline');
    }

    public function destroy($id)
{
      // TODO: implementasi penghapusan data berdasarkan $id
      $this->load->model('headline_model');
      $headline = $this->headline_model->delete($id);
      redirect('headline');
     
}
 
 }
 
 /* End of file Controllername.php */
 
?>