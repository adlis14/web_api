<?php 
class Kos_model extends CI_Model{
    public function getKos($id = null) {
        if($id != ''){
            return $this->db->get_where('kos', array('id' => $id))->result();
        }else{
            return $this->db->get('kos')->result();
        }
    }

    public function tambahDataKos($data){
        $this->db->insert('kos', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataKos($kode){
        $this->db->where("id = $id");
        return $this->db->delete('kos');;
    }

    public function ubahDataKos($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('kos', $data);
    }
    
}