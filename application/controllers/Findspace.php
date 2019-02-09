<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Findspace extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->library(array('form_validation','session'));
        $this->load->model('Parkingmodel');
    }

    public function index(){
        $data['spaces']=$this->Parkingmodel->getspaces();
        $this->load->view('Places_view',$data);
    }

    public function Book($id=NULL){
        $time=$this->input->post('timing');
        $date=$this->input->post('bookdate');
        $customerid=$this->session->userdata('id');
        $this->Parkingmodel->Booking($id,$customerid,$time,$date);
        $data['bookings']=$this->Parkingmodel->totalbookings($customerid);
        $data['active']=$this->Parkingmodel->totallivebookings($customerid);
        $this->load->view("Bookings_view",$data);
    }

    public function Bookings(){
        $customerid=$this->session->userdata('id');
        $data['bookings']=$this->Parkingmodel->totalbookings($customerid);
        $data['active']=$this->Parkingmodel->totallivebookings($customerid);
        $this->load->view("Bookings_view",$data);
    }

    public function Sellerspace(){
        $customerid=$this->session->userdata('id');
        $data['spaces']=$this->Parkingmodel->getsellerspaces($customerid);
        $this->load->view("Sellerspace_view",$data);
    }

    public function Activity($id=NULL){
        $data['spaces']=$this->Parkingmodel->getbookings($id);
        $data['active']=$this->Parkingmodel->getlivebookings($id);
        $this->load->view("Livebookings_view",$data);
    }
}
?>