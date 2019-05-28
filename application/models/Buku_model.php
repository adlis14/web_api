<?php 
class Buku_model extends CI_Model{
    public function getBuku($id = null) {
        if($id != ''){
            return $this->db->get_where('buku', array('id' => $id))->result();
        }else{
            return $this->db->get('buku')->result();
        }
    }

    public function tambahDataBuku($data){
        $this->db->insert('buku', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataBuku($id){
        $this->db->where("id = $id");
        return $this->db->delete('buku');;
    }

    public function ubahDataBuku($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('buku', $data);
    }
    
}