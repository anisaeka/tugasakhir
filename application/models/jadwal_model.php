<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_model extends CI_Model {

    public function list()
{
  $query = $this->db->get('jadwal_kuliah');
  return $query->result();
}

public function insert($data = [])
{
  $result = $this->db->insert('jadwal_kuliah', $data);
  return $result;
}

public function show($id)
{
  $this->db->where('id', $id);
  $query = $this->db->get('jadwal_kuliah');
  return $query->row();
}

public function update($id, $data = [])
{
   
  $data=[
    'mata_kuliah'=>$this->input->post('mata_kuliah'),
    'dosen'=>$this->input->post('dosen'),
    'hari'=>$this->input->post('hari'),
    'jam'=>$this->input->post('jam'),
    'mulai_jam'=>$this->input->post('mulai_jam'),
    'akhir_jam'=>$this->input->post('akhir_jam'),
    'nama_ruang'=>$this->input->post('nama_ruang'),
    'kelas'=>$this->input->post('kelas')
  ];
    $this->db->where('id', $id);
    $this->db->update('jadwal_kuliah', $data);
    
  // TODO: set data yang akan di update
  // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data
}


public function delete($id)
{
  // TODO: tambahkan logic penghapusan data
  $this->db->where('id', $id);
      $query= $this->db->delete('jadwal_kuliah');
     
}

    


}

/* End of file ModelName.php */
