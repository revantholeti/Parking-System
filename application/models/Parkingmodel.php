<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parkingmodel extends CI_Model{
    public function newspace($id,$name,$bname,$phone,$vehnums,$address,$url){
        $this->load->database();
        $this->db->query("insert into newspaces(sellerid,name,businessname,phone,vehnums,address,imgadd) values ('$id','$name','$bname','$phone','$vehnums','$address','$url')");
    }

    public function getspaces(){
        $this->load->database();
        $query=$this->db->query("select * from newspaces");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function Booking($id,$customerid,$time,$date){
        $this->load->database();
        $this->db->query("insert into bookings(id,customerid,time,bookdate) values ('$id','$customerid','$time','$date')");
    }

    public function totalbookings($customerid){
        $this->load->database();
        $query=$this->db->query("select * from bookings INNER join newspaces on bookings.id=newspaces.id where bookings.customerid=$customerid");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function getsellerspaces($id){
        $query=$this->db->query("select * from newspaces where sellerid=$id");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function getbookings($id){
        $query=$this->db->query("select * from bookings inner join seller on bookings.customerid=seller.id where bookings.id=$id");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function getlivebookings($id){
        $today = date('Y-m-d');
        $query=$this->db->query("select * from bookings inner join seller on bookings.customerid=seller.id where bookings.id=$id and bookdate>='$today'");
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function totallivebookings($customerid){
        $this->load->database();
        $today = date('Y-m-d');
        $query=$this->db->query("select * from bookings INNER join newspaces on bookings.id=newspaces.id where bookings.customerid=$customerid and bookdate>='$today'");
        if($query->num_rows()>0){
            return $query->result();
        }
    }
}

?>