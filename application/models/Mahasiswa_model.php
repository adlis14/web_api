<?php 
class Mahasiswa_model extends CI_Model{
    public function getMahasiswa($id = null) {
        if($id != ''){
            return $this->db->get_where('mahasiswa', array('id' => $id))->result();
        }else{
            return $this->db->get('mahasiswa')->result();
        }
    }
}