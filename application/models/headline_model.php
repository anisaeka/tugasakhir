 
 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Headline_model extends CI_Model {
 
    
    public function list($limit, $start)
    {
      $query = $this->db->get('headline',$limit, $start);
      return ($query->num_rows() > 0) ? $query->result() : false;
    }

    public function insert($upload)
	{
		$data = array(
			'id' => '',
			'keterangan' => $this->input->post('keterangan'),
			'gambar' => $upload['file']['file_name']
		);

		$this->db->insert('headline', $data);
	}
public function delete($id)
{
  // TODO: tambahkan logic penghapusan data
  $this->db->where('id', $id);
      $query= $this->db->delete('headline');
     
}

public function getTotal()
{
  return $this->db->count_all('jadwal_kuliah');
}

public function upload(){
    $config['upload_path'] = 'assets/image/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']	= '2048';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
        // Jika berhasil :
        $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        return $return;
    }else{
        // Jika gagal :
        $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        return $return;
    }
}
 
 }
 
 /* End of file ModelName.php */

