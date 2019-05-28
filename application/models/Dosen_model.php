<?php 
class Dosen_model extends CI_Model{
    public function getDosen($id = null) {
        if($id != ''){
            return $this->db->get_where('dosen', array('id' => $id))->result();
        }else{
            return $this->db->get('dosen')->result();
        }
    }

    public function tambahDataDosen($data){
        $this->db->insert('dosen', $id);
        return $this->db->affected_rows();
    }

    public function hapusDataDosen($data){
        $this->db->where("id = $id");
        return $this->db->delete('dosen');;
    }

    public function ubahDataDosen($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('dosen', $data);
    }
    
}