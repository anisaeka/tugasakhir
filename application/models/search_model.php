<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class search_model extends CI_Model {


    public function list($limit, $start)
    {
      $query = $this->db->get('jadwal_kuliah',$limit, $start);
      return ($query->num_rows() > 0) ? $query->result() : false;
    }

  public function search($hari, $jam_awal, $jam_akhir)
  {

    $sql = "select nama_ruang from ruang_kelas where nama_ruang not in 
    ( select nama_ruang from jadwal_kuliah) union all 
            select nama_ruang from jadwal_kuliah where hari = '$hari' and  
             akhir_jam <= $jam_awal and akhir_jam <=$jam_akhir or
             mulai_jam >= $jam_awal and mulai_jam >=$jam_akhir" ;
        
    
    
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotal()
{
  return $this->db->count_all('jadwal_kuliah');
}

public function ruang()
    {
      $query = $this->db->get('ruang_kelas');
      return $query->result();
    }

public function jam($jam_awal,$jam_akhir){
 $sql="select * from Jadwal_kuliah where akhir_jam <= $jam_awal and akhir_jam <=$jam_akhir ";
 $query=$this->db->query($sql);
 return $query->result();
}
}

/* End of file ModelName.php */
