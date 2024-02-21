<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url()."main");
            }
            $this->load->view('pages/'.$page);            
        }
        public function authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $authenticate=$this->Payroll_model->authenticate($username,$password);
            if($authenticate){
                $user_data = array(
                    'username' => $username,
                    'fullname' => $authenticate['fullname'],
                    'user_login' => true,
                    'is_admin' => $authenticate['is_admin']
                );
                $this->session->set_userdata($user_data);
                redirect(base_url()."main");
            }else{
                $this->session->set_flashdata('error','Invalid username or password!');
                redirect(base_url());
            }
        }
        public function logout(){
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('user_login');
            $this->session->unset_userdata('is_admin');
            redirect(base_url());
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
    }
?>