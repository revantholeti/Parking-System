<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->library(array('form_validation','session'));
        $this->load->model('Signupmodel');
    }

    public function index(){
        $this->load->view('Signup');
    }

    public function sellerSignup(){
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('password','password','required|trim|min_length[4]|alpha_numeric');
        $this->form_validation->set_rules('confirm_password','confirm_password','required|trim|matches[password]|alpha_numeric');
        $this->form_validation->set_rules('phone','phone','required');
        $this->form_validation->set_rules('address','address','required');
        if($this->form_validation->run()==TRUE){
            $name=$this->input->post('name');
            $phone=$this->input->post('phone');
            $pass=$this->input->post('password');
            $data=$this->Signupmodel->checkdata($phone);
            $address=$this->input->post('address');
            if(!$data){
                $encrypted_key=md5($pass);
                $this->Signupmodel->newuser($phone,$encrypted_key,$name,$address);
                $this->session->set_flashdata('error','Successfully Registered');
                $this->load->view("Login_view");
            }
            else{
                $this->session->set_flashdata('error','Phone Number already exist');
                $this->load->view("Signup");
            }
        }
        else{
            $this->load->view("Signup");
        }
    }

    public function login(){
        $this->load->view("Login_view");
    }

    public function Signin(){
        $this->form_validation->set_rules('phone','phone',"required");
        $this->form_validation->set_rules('password','password',"required|alpha_numeric");
        if($this->form_validation->run()==TRUE){
            $phone=$this->input->post('phone');
            $pass=$this->input->post('password');
            $data=$this->Signupmodel->checkuser($phone);
            $decrypted_key=md5($pass);
            if(!empty($data)){
                foreach($data as $d){
                    if($decrypted_key==$d->password){
                        $this->session->set_userdata('userid',$d->phone);
                        $this->session->set_userdata('id',$d->id);
                        redirect(base_url()."Findspace");
                    }
                    else{
                        $this->session->set_flashdata('error','entered password is wrong.. please try again');
                        $this->load->view('Login_view');
                    }
                }
            }
            else{
                $this->session->set_flashdata('error','wrong username or password');
                $this->load->view('Login_view');
                echo "break;";
            }
        }
        else{
            $this->session->set_flashdata('error','enter username and password');
            $this->load->view('Login_view');
        }
    }

    public function logout(){
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
?>