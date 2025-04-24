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
            $date=date('Y-m-d');
            $data['title'] = "Dashboard";
            $data['tdc'] = $this->Payroll_model->getAllCustomerByDate("TDC",$date);
            $data['pdc'] = $this->Payroll_model->getAllCustomer("PDC",$date);
            $data['employee'] = $this->Payroll_model->getAllEmployee();
            $data['trainee'] = $this->Payroll_model->getAllTraineeByDate($date);
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
            $data['designation'] = $this->Payroll_model->getAllDesignation();
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

        public function manage_trainee(){
            $page = "manage_trainee";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Trainee Manager";
            $datenow=date('Y-m-d');
            $data['trainee'] = $this->Payroll_model->getAllTraineeByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();            
            $data['agent'] = $this->Payroll_model->getAllAgent();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function search_trainee(){
            $page = "manage_trainee";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Trainee Manager";
            $datenow=$this->input->post('datearray');
            $data['trainee'] = $this->Payroll_model->getAllTraineeByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();            
            $data['agent'] = $this->Payroll_model->getAllAgent();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_trainee(){
            $save=$this->Payroll_model->save_trainee();
            if($save){
                $message="Trainee successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Trainee successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save trainee!');
            }
            redirect(base_url().'manage_trainee');
        }
        public function delete_trainee($id,$description){
            $save=$this->Payroll_model->delete_trainee($id);
            if($save){
                $message="Trainee ($description) successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Trainee successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete trainee!');
            }
            redirect(base_url().'manage_trainee');
        }
        public function fetch_single_trainee(){
            $id=$this->input->post('id');
            $data=$this->Payroll_model->fetch_single_trainee($id);
            echo json_encode($data);
        }

        public function manage_users(){
            $page = "manage_users";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Users Manager";
            $datenow=date('Y-m-d');
            $data['users'] = $this->Payroll_model->getAllUsers();
            $data['branches'] = $this->Payroll_model->getAllBranch();                        
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_users(){
            $save=$this->Payroll_model->save_users();
            if($save){
                $message="User details successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','User details successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save user details!');
            }
            redirect(base_url().'manage_users');
        }
        public function delete_users($id,$description){
            $save=$this->Payroll_model->delete_users($id);
            if($save){
                $message="User $description successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','User details successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete user details!');
            }
            redirect(base_url().'manage_users');
        }
        public function fetch_single_users(){
            $id=$this->input->post('id');
            $data=$this->Payroll_model->fetch_single_users($id);
            echo json_encode($data);
        }

        public function manage_expenses(){
            $page = "manage_expenses";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Expenses Manager";
            $datenow=date('Y-m-d');
            $data['expenses'] = $this->Payroll_model->getAllExpensesByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['date_expense'] = $datenow;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_expenses(){
            $save=$this->Payroll_model->save_expenses();
            if($save){
                $message="Expenses details successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Expenses details successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save expenses details!');
            }
            redirect(base_url().'manage_expenses');
        }
        public function delete_expenses($id,$description){
            $save=$this->Payroll_model->delete_expenses($id);
            if($save){
                $message="Expense details $description successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Expenses details successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete expenses details!');
            }
            redirect(base_url().'manage_expenses');
        }
        public function search_expenses(){
            $page = "manage_expenses";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Expenses Manager";
            $datenow=$this->input->post('datearray');
            $data['expenses'] = $this->Payroll_model->getAllExpensesByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['date_expense'] = $datenow;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }



        public function manage_deposit(){
            $page = "manage_deposit";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Deposit Manager";
            $datenow=date('Y-m-d');
            $data['expenses'] = $this->Payroll_model->getAllDepositByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['date_expense'] = $datenow;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_deposit(){
            $save=$this->Payroll_model->save_deposit();
            if($save){
                $message="Deposit details successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Deposit details successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save deposit details!');
            }
            redirect(base_url().'manage_deposit');
        }
        public function delete_deposit($id,$description){
            $save=$this->Payroll_model->delete_deposit($id);
            if($save){
                $message="Deposit details $description successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Deposit details successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete deposit details!');
            }
            redirect(base_url().'manage_deposit');
        }
        public function search_deposit(){
            $page = "manage_deposit";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Deposit Manager";
            $datenow=$this->input->post('datearray');
            $data['expenses'] = $this->Payroll_model->getAllDepositByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['date_expense'] = $datenow;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function manage_balances(){
            $page = "manage_balance";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Balance Manager";
            $datenow=date('Y-m-d');
            $data['expenses'] = $this->Payroll_model->getAllBalanceByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['date_expense'] = $datenow;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_balance(){
            $save=$this->Payroll_model->save_balance();
            if($save){
                $message="Balance details successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Balance details successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save balance details!');
            }
            redirect(base_url().'manage_balances');
        }
        public function delete_balance($id,$description){
            $save=$this->Payroll_model->delete_balance($id);
            if($save){
                $message="Balance details $description successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Balance details successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete balance details!');
            }
            redirect(base_url().'manage_balances');
        }
        public function search_balance(){
            $page = "manage_balance";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Balance Manager";
            $datenow=$this->input->post('datearray');
            $data['expenses'] = $this->Payroll_model->getAllBalanbceByDate($datenow);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['date_expense'] = $datenow;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function manage_advances(){
            $page = "manage_advances";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Advances Manager";
            $datenow=date('Y-m-d');
            $data['advances'] = $this->Payroll_model->getAllEmployee();
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_advances(){
            $empid=$this->input->post('empid');
            $save=$this->Payroll_model->save_advances();
            if($save){
                $message="Advance details successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Advances details successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save advance details!');
            }
            redirect(base_url().'view_advances/'.$empid);
        }
        public function delete_advances($id,$description){
            $save=$this->Payroll_model->delete_advances($id);
            if($save){
                $message="Advance details $description successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Advance details successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete advance details!');
            }
            redirect(base_url().'manage_advances');
        } 
        
        public function view_advances($empid){
            $page = "view_advances";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Advances Manager";
            $datenow=date('Y-m-d');
            $data['empid'] = $empid;
            $data['advances'] = $this->Payroll_model->getAdvanceBalance($empid);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['employee'] = $this->Payroll_model->getSingleEmployee($empid);
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function manage_payroll(){
            $page = "manage_payroll";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Payroll Manager";
            $datenow=date('Y-m-d');
            $data['payroll'] = $this->Payroll_model->getAllPayrollPeriod();            
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function save_payrollperiod(){            
            $save=$this->Payroll_model->save_payrollperiod();
            if($save){
                $message="Payroll Period successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Payroll Period successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save Payroll Period!');
            }
            redirect(base_url().'manage_payroll');
        }

        public function delete_payrollperiod($id){            
            $save=$this->Payroll_model->delete_payrollperiod($id);
            if($save){
                $message="Payroll Period successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Payroll Period successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete Payroll Period!');
            }
            redirect(base_url().'manage_payroll');
        }

        public function payroll_manager($id){
            $page = "payroll_manager";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Payroll Manager";
            $datenow=date('Y-m-d');            
            $data['payroll_daily'] = $this->Payroll_model->getPayrollDaily($id);
            $data['payroll_per_head'] = $this->Payroll_model->getPayrollPerHead($id);
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['payroll_period'] = $id;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function create_payroll(){
            $payroll_period=$this->input->post('id');
            $empid=$this->input->post('empid');
            $is_daily=$this->input->post('is_daily');
            $required_days=$this->input->post('required_days');
            $days_worked=$this->input->post('days_worked');
            $adjustment=$this->input->post('adjustment');
            $deduction=$this->input->post('deduction');
            $x=0;
            foreach($empid as $code){
                $result=$this->Payroll_model->save_payroll($payroll_period,$code,$is_daily[$x],$required_days[$x],$days_worked[$x],$adjustment[$x],$deduction[$x]);
                $x++;
            }
            if($result){
                $this->session->set_flashdata('save_success','Payroll details successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save Payroll details!');
            }
            redirect(base_url()."payroll_manager/$payroll_period");
        }
        public function post_payroll(){
            $payroll_period=$this->input->post('id');            
            $result=$this->Payroll_model->post_payroll($payroll_period);
            if($result){
                $this->session->set_flashdata('save_success','Payroll details successfully posted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to post Payroll details!');
            }
            redirect(base_url()."payroll_manager/$payroll_period");
        }
        public function unpost_payroll($id){            
            $result=$this->Payroll_model->unpost_payroll($id);
            if($result){
                $this->session->set_flashdata('save_success','Payroll details successfully unposted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to unpost Payroll details!');
            }
            redirect(base_url()."payroll_manager/$id");
        }

        public function manage_deduction($payroll_period,$empid){
            $page = "manage_deduction";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }             
            if($this->session->user_login){

            }else{
                $this->session->set_flashdata('error','You are not logged in!');
                redirect(base_url());
            }
            $data['title'] = "Deduction Manager";
            $datenow=date('Y-m-d');
            $data['employee'] = $this->Payroll_model->getSingleEmployee($empid);
            $data['deductions'] = $this->Payroll_model->getAllDeduction($payroll_period,$empid);            
            $data['branches'] = $this->Payroll_model->getAllBranch();
            $data['payroll_period'] = $payroll_period;
            $data['empid'] = $empid;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_deduction(){
            $payroll_period=$this->input->post('period');
            $empid=$this->input->post('empid');
            $save=$this->Payroll_model->save_deduction();
            if($save){
                $message="Deduction details successfully saved!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Deduction details successfully saved!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to save deduction details!');
            }
            redirect(base_url().'manage_deduction/'.$payroll_period.'/'.$empid);
        }
        public function delete_deduction($id,$description,$payroll_period,$empid){            
            $save=$this->Payroll_model->delete_deduction($id);
            if($save){
                $message="Deduction details ($description) successfully deleted!";
                $username=$this->session->fullname;
                $datearray=date('Y-m-d');
                $timearray=date('H:i:s');
                $this->Payroll_model->userlogs($message,$username,$datearray,$timearray);
                $this->session->set_flashdata('save_success','Deduction details successfully deleted!');
            }else{
                $this->session->set_flashdata('save_failed','Unable to delete deduction details!');
            }
            redirect(base_url().'manage_deduction/'.$payroll_period.'/'.$empid);
        }
        //===================================Start of Reports=========================================

        public function print_enrollee(){
            $page="print_enrollee";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login){
                
            }else{
              redirect(base_url()."main");
            }            
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            $type=$this->input->post('type');            
            $interval="";
            if($startdate==$enddate){
                $interval="DAILY";
                $date="DATE: ".date('M d, Y',strtotime($startdate));
            }else{
                $interval="WEEKLY";
                $date="DATE RANGE: ".date('M d, Y',strtotime($startdate))." to ".date('M d, Y',strtotime($enddate));
            }
            $data['startdate']=$startdate;
            $data['enddate']=$enddate;    
            $data['interval']        = $interval;
            $data['type'] = $type;
            $data['date']=$date;
            $data['items'] = $this->Payroll_model->getAllCustomer($type);            
            $html = $this->load->view('pages/'.$page,$data);
            /*$mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 10,
                    'margin_right' => 10,
                    'setAutoBottomMargin' => 'stretch'
            ]);
            $mpdf->setHTMLHeader('
            <div align="center">
			 <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             '.$type.' '.$interval.' ENROLLEES<br><br>             
             </div>   
             <div>
             '.$date.'
             </div>          
            ');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();*/
        }
        public function payroll_summary($id){
            $page="payroll_summary";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login){
                
            }else{
              redirect(base_url()."main");
            }                                    
            $data['payroll_daily'] = $this->Payroll_model->getPayrollDailySummary($id);
            $data['payroll_per_head'] = $this->Payroll_model->getPayrollPerHeadSummary($id);            
            $html = $this->load->view('pages/'.$page,$data);
            /*$mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 10,
                    'margin_right' => 10,
                    'setAutoBottomMargin' => 'stretch',
                    'orientation' => 'L'
            ]);
            $mpdf->setHTMLHeader('
            <div align="center">
			 <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             <h3>PAYROLL SUMMARY</h3>             
             </div>          
            ');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();*/
        }

        public function print_payslip($id){
            $page="payslip";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login){
                
            }else{
              redirect(base_url()."main");
            }                                    
            $data['payroll_daily'] = $this->Payroll_model->getPayrollDailySummary($id);
            $data['payroll_per_head'] = $this->Payroll_model->getPayrollPerHeadSummary($id);
            $data['period'] = $this->Payroll_model->getPayrollPeriod($id);
            $html = $this->load->view('pages/'.$page,$data);
            /*$mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 10,
                    'margin_right' => 10,
                    'setAutoBottomMargin' => 'stretch',
                    'orientation' => 'L'
            ]);
            $mpdf->setHTMLHeader('
            <div align="center">
             <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             <h3>PAYROLL SUMMARY</h3>             
             </div>          
            ');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();*/
        }

        public function print_expenses(){
            $page="print_expenses";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }            
            if($this->session->user_login){
                
            }else{
              redirect(base_url()."main");
            }            
            $date=$this->input->post('rundate');
            $data['date']=$date;
            $data['items'] = $this->Payroll_model->getAllExpensesByDate($date);            
            $data['deposit'] = $this->Payroll_model->getAllDepositByDate($date);
            $data['balance'] = $this->Payroll_model->getAllBalanceByDate($date);
            $data['pdc'] = $this->Payroll_model->getAllCustomerByDate('PDC',$date);
            $data['tdc'] = $this->Payroll_model->getAllCustomerByDate('TDC',$date);
            $data['pdc'] = $this->Payroll_model->getAllCustomerByDate('PDC',$date);
            $data['addcode'] = $this->Payroll_model->getAllCustomerByDate('Add Code',$date);
            $html = $this->load->view('pages/'.$page,$data);
            /*$mpdf = new \Mpdf\Mpdf([
                    'setAutoTopMargin' => 'stretch',
                    'margin_left' => 10,
                    'margin_right' => 10,
                    'setAutoBottomMargin' => 'stretch'
            ]);
            $mpdf->setHTMLHeader('
            <div align="center">
			 <b style="font-size:20px;">VLC DRIVING TUTORIAL SERVICES</b><br>
             <b>Kidapawan City</b><br><br>
             '.$type.' '.$interval.' ENROLLEES<br><br>             
             </div>   
             <div>
             '.$date.'
             </div>          
            ');
            $mpdf->autoPageBreak = true;
            $mpdf->WriteHTML($html);
            $mpdf->Output();*/
        }
        //====================================End of Reports==========================================
    }
?>
