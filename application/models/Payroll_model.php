 <?php   
    date_default_timezone_set('Asia/Manila');
    class Payroll_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM users WHERE username ='$username' AND `password` ='$password'");
            if($result->num_rows() > 0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function userlogs($message,$username,$datearray,$timearray){
            $result=$this->db->query("INSERT INTO user_logs(`transaction`,loginuser,datearray,timearray) VALUES ('$message','$username','$datearray','$timearray')");
            return true;
        }
        public function getAllBranch(){
            $result=$this->db->query("SELECT * FROM branch ORDER BY id ASC");
            return $result->result_array();
        }
        public function save_branch(){
            $id=$this->input->post("id");
            $branch=$this->input->post("branch");
            $check_exist=$this->db->query("SELECT * FROM branch WHERE `description`='$branch' AND id <> '$id'");
            if($check_exist->num_rows() > 0){
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO branch(`description`) VALUES('$branch')");
                }else{
                    $result=$this->db->query("UPDATE branch SET `description`='$branch' WHERE id='$id'");
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_branch($id){
            $check=$this->db->query("SELECT * FROM commissioner WHERE branch='$id'");
            if($check->num_rows() > 0){

            }else{
                $check=$this->db->query("SELECT * FROM employeedetails WHERE branch='$id'");
                if($check->num_rows() > 0){

                }else{
                    $check=$this->db->query("SELECT * FROM customer WHERE branch='$id'");
                    if($check->num_rows() > 0){

                    }else{
                        $check=$this->db->query("SELECT * FROM expenses WHERE branch='$id'");
                        if($check->num_rows() > 0){

                        }else{
                            $result=$this->db->query("DELETE FROM branch WHERE id='$id'");
                        }
                    }
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }       

        public function getAllDesignation(){
            $result=$this->db->query("SELECT * FROM designation ORDER BY designation ASC");
            return $result->result_array();
        }
        public function save_designation(){
            $id=$this->input->post("id");
            $branch=$this->input->post("designation");
            $check_exist=$this->db->query("SELECT * FROM designation WHERE `designation`='$branch' AND id <> '$id'");
            if($check_exist->num_rows() > 0){
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO designation(`designation`) VALUES('$branch')");
                }else{
                    $result=$this->db->query("UPDATE designation SET `designation`='$branch' WHERE id='$id'");
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_designation($id){
            $check=$this->db->query("SELECT * FROM employeedetails WHERE designation='$id'");
            if($check->num_rows() > 0){

            }else{
                $result=$this->db->query("DELETE FROM designation WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllAgent(){
            $branch=$this->session->branch;
            if($this->session->is_admin==1){
                $result=$this->db->query("SELECT * FROM commissioner ORDER BY lastname ASC");
            }else{
                $result=$this->db->query("SELECT * FROM commissioner WHERE branch='$branch' ORDER BY lastname ASC");
            }
            return $result->result_array();
        }
        public function save_agent(){
            $id=$this->input->post("id");
            $lastname=$this->input->post("lastname");
            $firstname=$this->input->post("firstname");
            $branch=$this->input->post("branch");
            $username=$this->input->post("username");
            $password=$this->input->post("password");
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            $status=$this->input->post('status');
            $check_exist=$this->db->query("SELECT * FROM commissioner WHERE lastname='$lastname' AND firstname='$firstname' AND id <> '$id'");
            if($check_exist->num_rows() > 0){
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO commissioner(lastname,firstname,branch,username,`password`,datearray,timearray,`status`) VALUES('$lastname','$firstname','$branch','$username','$password','$datearray','$timearray','$status')");
                }else{
                    $result=$this->db->query("UPDATE commissioner SET lastname='$lastname',firstname='$firstname',branch='$branch',username='$username',`password`='$password' WHERE id='$id'");
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_agent($id){
            $check=$this->db->query("SELECT * FROM commissionerdetails WHERE comm_id='$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                $result=$this->db->query("DELETE FROM commissioner WHERE id='$id'");
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function fetch_single_agent($id){
            $result=$this->db->query("SELECT c.*,b.description FROM commissioner c INNER JOIN branch b ON b.id=c.branch WHERE c.id='$id'");
            return $result->result_array();
        }
        public function getAllEmployee(){
            $branch=$this->session->branch;
            if($this->session->is_admin==1){
                $result=$this->db->query("SELECT e.*,ed.*,d.*,d.id as designation_id,b.description,b.id as branch_id FROM employee e INNER JOIN employeedetails ed ON ed.empid=e.empid LEFT JOIN designation d ON d.id=ed.designation LEFT JOIN branch b ON b.id=ed.branch ORDER BY e.lastname ASC");
            }else{
                $result=$this->db->query("SELECT e.*,ed.*,d.*,d.id as designation_id,b.description,b.id as branch_id FROM employee e INNER JOIN employeedetails ed ON ed.empid=e.empid LEFT JOIN designation d ON d.id=ed.designation LEFT JOIN branch b ON b.id=ed.branch WHERE ed.branch='$branch' ORDER BY e.lastname ASC");
            }
            return $result->result_array();
        }
        public function save_employee(){
            $id=$this->input->post("id");
            $empid=$this->input->post("empid");
            $empidold=$this->input->post("empidold");
            $lastname=$this->input->post("lastname");
            $firstname=$this->input->post("firstname");
            $middlename=$this->input->post("middlename");
            $suffix=$this->input->post("suffix");
            $birthdate=$this->input->post("birthdate");
            $gender=$this->input->post("gender");
            $designation=$this->input->post("designation");
            $salary=$this->input->post("salary");
            $branch=$this->input->post("branch");
            $is_daily=$this->input->post("is_daily");            
            $check_exist=$this->db->query("SELECT * FROM employee WHERE lastname='$lastname' AND firstname='$firstname' AND empid <> '$empid'");
            if($check_exist->num_rows() > 0){
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO employee(empid,lastname,firstname,middlename,suffix,birthdate,gender) VALUES('$empid','$lastname','$firstname','$middlename','$suffix','$birthdate','$gender')");
                    $result=$this->db->query("INSERT INTO employeedetails(empid,designation,salary,is_daily,branch) VALUES('$empid','$designation','$salary','$is_daily','$branch')");
                }else{
                    $result=$this->db->query("UPDATE employee SET empid='$empid',lastname='$lastname',firstname='$firstname',middlename='$middlename',suffix='$suffix',birthdate='$birthdate',gender='$gender' WHERE id='$id'");
                    $result=$this->db->query("UPDATE employeedetails SET empid='$empid',designation='$designation',salary='$salary',is_daily='$is_daily',branch='$branch' WHERE empid='$empidold'");
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_employee($id){
            $result=$this->db->query("DELETE FROM employee WHERE empid='$id'");
            $result=$this->db->query("DELETE FROM employeedetails WHERE empid='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function fetch_single_employee($id){
            $result=$this->db->query("SELECT e.*,ed.*,d.*,d.id as designation_id,b.description,b.id as branch_id FROM employee e INNER JOIN employeedetails ed ON ed.empid=e.empid LEFT JOIN designation d ON d.id=ed.designation LEFT JOIN branch b ON b.id=ed.branch WHERE e.empid='$id'");
            return $result->result_array();
        }

        public function getAllTraineeByDate($date){
            $branch=$this->session->branch;
            if($this->session->is_admin==1){
                $result=$this->db->query("SELECT e.*,e.status as t_status,ed.*,d.lastname as clastname,d.firstname as cfirstname,b.description,b.id as branch_id FROM customer e INNER JOIN commissionerdetails ed ON ed.trainee_id=e.controlno LEFT JOIN commissioner d ON d.id=e.commissioner LEFT JOIN branch b ON b.id=d.branch WHERE e.datearray='$date'");
            }else{
                $result=$this->db->query("SELECT e.*,e.status as t_status,ed.*,d.lastname as clastname,d.firstname as cfirstname,b.description,b.id as branch_id FROM customer e INNER JOIN commissionerdetails ed ON ed.trainee_id=e.controlno LEFT JOIN commissioner d ON d.id=e.commissioner LEFT JOIN branch b ON b.id=d.branch WHERE e.datearray='$date' AND d.branch='$branch'");
            }            
            return $result->result_array();
        }
        public function save_trainee(){
            $id=$this->input->post("id");
            $empid=$this->input->post("controlno");            
            if($empid==""){
                $empid=date('YmdHis');
            }
            $lastname=$this->input->post("lastname");
            $firstname=$this->input->post("firstname");
            $type=$this->input->post("type");
            $code=$this->input->post("code");
            $amount=$this->input->post("amount");
            $commissioner=$this->input->post("commissioner");
            $branch=$this->input->post("branch");
            $datearray=$this->input->post("datearray");
            $timearray=date('H:i:s');
            $status=$this->input->post("status");
            $remarks=$this->input->post("remarks");
            $loginuser=$this->session->fullname;
            $check_exist=$this->db->query("SELECT * FROM customer WHERE lastname='$lastname' AND firstname='$firstname' AND id <> '$id'");
            if($check_exist->num_rows() > 0){
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO customer(controlno,lastname,firstname,`type`,code,amount,commissioner,`status`,datearray,timearray,login_user,branch,remarks) VALUES('$empid','$lastname','$firstname','$type','$code','$amount','$commissioner','$status','$datearray','$timearray','$loginuser','$branch','$remarks')");
                    $result=$this->db->query("INSERT INTO commissionerdetails(comm_id,trainee_id,datearray,timearray) VALUES('$commissioner','$empid','$datearray','$timearray')");
                }else{
                    $result=$this->db->query("UPDATE customer SET lastname='$lastname',firstname='$firstname',`type`='$type',code='$code',amount='$amount',commissioner='$commissioner',`status`='$status',branch='$branch',remarks='$remarks' WHERE id='$id'");
                    $result=$this->db->query("UPDATE commissionerdetails SET comm_id='$commissioner' WHERE trainee_id='$empid'");
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_trainee($id){
            $check=$this->db->query("SELECT * FROM commissionerdetails WHERE trainee_id='$id' AND `status` = 'released'");
            if($check->num_rows()>0){
                
            }else{
                $result=$this->db->query("DELETE FROM customer WHERE controlno='$id'");
                $result=$this->db->query("DELETE FROM commissionerdetails WHERE trainee_id='$id'");
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function fetch_single_trainee($id){
            $result=$this->db->query("SELECT e.*,e.status as t_status,ed.*,d.lastname as clastname,d.firstname as cfirstname,b.description,b.id as branch_id FROM customer e INNER JOIN commissionerdetails ed ON ed.trainee_id=e.controlno LEFT JOIN commissioner d ON d.id=e.commissioner LEFT JOIN branch b ON b.id=d.branch WHERE e.id='$id'");
            return $result->result_array();
        }

        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM users ORDER BY fullname ASC");
            return $result->result_array();
        }
        public function save_users(){
            $id=$this->input->post("id");
            $username=$this->input->post("username");
            $password=$this->input->post("password");
            $fullname=$this->input->post("fullname");
            $is_admin=$this->input->post("is_admin");
            $branch=$this->input->post("branch");
            $check_exist=$this->db->query("SELECT * FROM users WHERE username='$username' AND id <> '$id'");
            if($check_exist->num_rows() > 0){
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO users(username,`password`,fullname,is_admin,branch) VALUES('$username','$password','$fullname','$is_admin','$branch')");
                }else{
                    $result=$this->db->query("UPDATE users SET username='$username',`password`='$password',fullname='$fullname',is_admin='$is_admin',branch='$branch' WHERE id='$id'");
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_users($id){            
            $result=$this->db->query("DELETE FROM users WHERE id='$id'");            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function fetch_single_users($id){
            $result=$this->db->query("SELECT * FROM users WHERE id='$id'");
            return $result->result_array();
        }

        public function getAllExpensesByDate($date){
            $branch=$this->session->branch;
            if($this->session->is_admin==1){
                $result=$this->db->query("SELECT * FROM expenses WHERE datearray='$date'");
            }else{
                $result=$this->db->query("SELECT * FROM expenses WHERE datearray='$date' AND branch='$branch");
            }            
            return $result->result_array();
        }

        public function save_expenses(){
            $id=$this->input->post("id");
            $expenses=$this->input->post("expenses");            
            $branch=$this->input->post("branch");
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO expenses(`description`,branch,datearray,timearray) VALUES('$expenses','$branch','$datearray','$timearray')");
                }else{
                    $result=$this->db->query("UPDATE expenses SET `description`='$expenses',branch='$branch' WHERE id='$id'");
                }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_expenses($id){
            $result=$this->db->query("DELETE FROM expenses WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }  

    }
?>