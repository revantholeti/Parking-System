<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signupmodel extends CI_Model{
    public function newuser($phone,$encrypted_key,$name,$address){
        $this->load->database();
        $this->db->query("insert into seller(phone,password,name,address) values ('$phone','$encrypted_key','$name','$address')");
    }

    public function checkdata($phone){
        $this->load->database();
        $query=$this->db->query("select * from seller where phone='$phone'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }

    public function checkuser($phone){
        $this->load->database();
        $query=$this->db->query("select * from seller where phone='$phone'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return 0;
        }
    }
}
?>