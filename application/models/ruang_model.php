<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ruang_model extends CI_Model {

    public function list($limit, $start)
{
  $query = $this->db->get('ruang_kelas',$limit, $start);
  return ($query->num_rows() > 0) ? $query->result() : false;
}

public function insert($data = [])
{
  $result = $this->db->insert('ruang_kelas', $data);
  return $result;
}

public function show($nama_ruang)
{
  $this->db->where('nama_ruang', $nama_ruang);
  $query = $this->db->get('ruang_kelas');
  return $query->row();
}

public function update($nama_ruang, $data = [])
{
   
  $data=[
    'nama_ruang'=>$this->input->post('nama_ruang'),
    'jenis_ruang'=>$this->input->post('jenis_ruang'),
    'gedung'=>$this->input->post('gedung')
  ];
    $this->db->where('nama_ruang', $nama_ruang);
    $this->db->update('ruang_kelas', $data);
    
  // TODO: set data yang akan di update
  // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data
}


public function delete($nama_ruang)
{
  // TODO: tambahkan logic penghapusan data
  $this->db->where('nama_ruang', $nama_ruang);
      $query= $this->db->delete('ruang_kelas');
     
}

public function getTotal()
{
  return $this->db->count_all('ruang_kelas');
}

public function search($search)
    {

      $this->db->select('*');
      $this->db->like('nama_ruang',$search);
      $this->db->or_like('jenis_ruang',$search);
      $this->db->or_like('gedung',$search);
      $query = $this->db->get("ruang_kelas");
        return $query->result();
    }
}

/* End of file ModelName.php */
