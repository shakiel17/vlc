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
                    'is_admin' => $authenticate['is_admin'],
                    'branch' => $authenticate['branch']
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
            $data['title'] = "Dashboard";
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function manage_branch(){
            $page = "manage_branch";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Branch Manager";
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_branch(){
            $save=$this->Payroll_model->save_branch();
            if($save){
                $message="Branch successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Branch successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save branch!');
            }
            redirect(base_url().'manage_branch');
        }
        public function delete_branch($id,$description){
            $save=$this->Payroll_model->delete_branch($id);
            if($save){
                $message="Branch ($description) successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Branch successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete branch!');
            }
            redirect(base_url().'manage_branch');
        }

        public function manage_designation(){
            $page = "manage_designation";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Designation Manager";
            $data['branches'] = $this->Payroll_model->getAllDesignation();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_designation(){
            $save=$this->Payroll_model->save_designation();
            if($save){
                $message="Designation successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Designation successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save designation!');
            }
            redirect(base_url().'manage_designation');
        }
        public function delete_designation($id,$description){
            $save=$this->Payroll_model->delete_designation($id);
            if($save){
                $message="Designation ($description) successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Designation successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete designation!');
            }
            redirect(base_url().'manage_designation');
        }

        public function manage_agent(){
            $page = "manage_agent";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Agent Manager";
            $data['agents'] = $this->Payroll_model->getAllAgent();
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_agent(){
            $save=$this->Payroll_model->save_agent();
            if($save){
                $message="Agent successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Agent successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save agent!');
            }
            redirect(base_url().'manage_agent');
        }
        public function delete_agent($id,$description){
            $save=$this->Payroll_model->delete_agent($id);
            if($save){
                $message="Agent ($description) successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Agent successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete agent!');
            }
            redirect(base_url().'manage_agent');
        }
        public function fetch_single_agent(){
            $id=$this->input->post('id');
            $data=$this->Payroll_model->fetch_single_agent($id);
            echo json_encode($data);
        }

        public function manage_employee(){
            $page = "manage_employee";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Employee Manager";
            $data['employee'] = $this->Payroll_model->getAllEmployee();
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_employee(){
            $save=$this->Payroll_model->save_employee();
            if($save){
                $message="Employee successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Employee successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save employee!');
            }
            redirect(base_url().'manage_employee');
        }
        public function delete_employee($id,$description){
            $save=$this->Payroll_model->delete_employee($id);
            if($save){
                $message="Employee ($description) successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Employee successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete employee!');
            }
            redirect(base_url().'manage_employee');
        }
        public function fetch_single_employee(){
            $id=$this->input->post('id');
            $data=$this->Payroll_model->fetch_single_employee($id);
            echo json_encode($data);
        }
    }
?>