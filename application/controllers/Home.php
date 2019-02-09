<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','file','form','html'));
        $this->load->database();
        $this->load->library(array('form_validation','session','upload'));
        $this->load->model('Parkingmodel');
    }

    public function index(){
        $this->load->view('Home_view');
    }

    public function SellerEntry(){
        $this->load->view("Enteraddressview");
    }

    public function doupload(){
        $username=$this->session->userdata('id');
        $config['upload_path']='./images/';
        $config['allowed_types']='jpg|jpeg|gif|png';
        $config['file_name']=time().$username;
        $this->upload->initialize($config);
        if(!$this->upload->do_upload()){
            echo $this->upload->display_errors();
        }
        else{
            $file_data=$this->upload->data();
            return $file_data['file_name'];
        } 
    }

    public function newParkings(){
        $url=$this->doupload();
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('business_name','business_name','required');
        $this->form_validation->set_rules('vehnum','vehnum','required');
        $this->form_validation->set_rules('phone','phone','required');
        $this->form_validation->set_rules('address','address','required');
        if($this->form_validation->run()==TRUE){
            $name=$this->input->post('name');
            $phone=$this->input->post('phone');
            $bname=$this->input->post('business_name');
            $vehnums=$this->input->post('vehnum');
            $address=$this->input->post('address');
            $id=$this->session->userdata('id');
            $this->Parkingmodel->newspace($id,$name,$bname,$phone,$vehnums,$address,$url);
            redirect(base_url()."Findspace");
        }
        else{
            $this->session->set_flashdata('error','Enter Valid Values');
            $this->load->view("Enteraddressview");
        }
    }
}
?>