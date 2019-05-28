<?php 
class Pasien_model extends CI_Model{
    public function getPasien($id = null) {
        if($id != ''){
            return $this->db->get_where('pasien', array('id' => $id))->result();
        }else{
            return $this->db->get('pasien')->result();
        }
    }

    public function tambahDataPasien($data){
        $this->db->insert('pasien', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataPasien($id){
        $this->db->where("id = $id");
        return $this->db->delete('pasien');;
    }

    public function ubahDataPasien($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('pasien', $data);
    }
    
}