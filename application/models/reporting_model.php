<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reporting_model extends CI_Model
{
    public function get_all($search = null)
    {
        
        $this->db->select("jadwal_kuliah.*");
        $this->db->join('ruang_kelas','jadwal_kuliah.nama_ruang=ruang_kelas.nama_ruang');
        $this->db->group_by('jadwal_kuliah.id');
        if($search != null){
            $this->db->like('mata_kuliah',$search);
            $this->db->or_like('dosen',$search);
            $this->db->or_like('hari',$search);
            $this->db->or_like('jam',$search);
            $this->db->or_like('kelas',$search);
            $this->db->or_like('jadwal_kuliah.nama_ruang',$search);
        }
        return $this->db->get('jadwal_kuliah')->result();
    }
    public function get_jadwal_kuliah($id)
    {
        $this->db->select("jadwal_kuliah.*");
    return $this->db->where('$id',$id)->get('jadwal_kuliah')->result()[0];
    }
    public function get_detail($id)
    {
        $this->db->select('jadwal_kuliah');
        $this->db->join('');
        $this->db->where('id',$id);
        return $this->db->get('jadwal_kuliah')->result();
        
    }
}