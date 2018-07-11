<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class user_admin_model extends CI_Model {

    public function list($limit, $start)
{
  $query = $this->db->get('users',$limit, $start);
  return ($query->num_rows() > 0) ? $query->result() : false;
}

public function insert($data = [])
{
  $result = $this->db->insert('users', $data);
  return $result;
}

public function show($user_id)
{
  $this->db->where('user_id', $user_id);
  $query = $this->db->get('users');
  return $query->row();
}

public function update($user_id, $data = [])
{
   
  $data=[
    'nama'=>$this->input->post('nama'),
    'nim'=>$this->input->post('nim'),
    'email'=>$this->input->post('email'),
    'username'=>$this->input->post('username'),
    'password'=>$this->input->post('password'),
    'register_date'=>$this->input->post('register_date'),
    'fk_level_id'=>$this->input->post('level_id')
  ];
    $this->db->where('user_id   ', $user_id);
    $this->db->update('users', $data);
    
  // TODO: set data yang akan di update
  // https://www.codeigniter.com/userguuser_ide3/database/query_builder.html#updating-data
}


public function delete($user_id)
{
  // TODO: tambahkan logic penghapusan data
  $this->db->where('user_id', $user_id);
      $query= $this->db->delete('users');
     
}

public function getTotal()
{
  return $this->db->count_all('users');
}

public function search($search)
    {

      $this->db->where('email', $search);
        return $query->result();
    }

public function user_level()
    {
      $query = $this->db->get('levels');
      return $query->result();
    }
    


}

/* End of file ModelName.php */
