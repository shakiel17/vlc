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
            //$lastname=$this->input->post("lastname");
            $firstname=$this->input->post("firstname");
            $branch=$this->input->post("branch");
            // $username=$this->input->post("username");
            // $password=$this->input->post("password");
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
            $status=$this->input->post('status');
            $check_exist=$this->db->query("SELECT * FROM commissioner WHERE firstname='$firstname' AND id <> '$id'");
            if($check_exist->num_rows() > 0){
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO commissioner(lastname,firstname,branch,username,`password`,datearray,timearray,`status`) VALUES('','$firstname','$branch','','','$datearray','$timearray','$status')");
                }else{
                    $result=$this->db->query("UPDATE commissioner SET firstname='$firstname',branch='$branch' WHERE id='$id'");
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
        public function getSingleEmployee($empid){
            $result=$this->db->query("SELECT * FROM employee WHERE empid='$empid'");
            return $result->row_array();
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
            $check_exist=$this->db->query("SELECT * FROM customer WHERE lastname='$lastname' AND firstname='$firstname' AND id <> '$id' AND `type`='$type'");
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
            $amount=$this->input->post("amount");  
            $branch=$this->input->post("branch");
            $datearray=$this->input->post("datearray");
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO expenses(`description`,amount,branch,datearray,timearray) VALUES('$expenses','$amount','$branch','$datearray','$timearray')");
                }else{
                    $result=$this->db->query("UPDATE expenses SET `description`='$expenses',branch='$branch',amount='$amount' WHERE id='$id'");
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
        public function save_advances(){
            $id=$this->input->post("id");
            $empid=$this->input->post("empid");
            $description=$this->input->post("description");
            $amount=$this->input->post("amount");
            $branch=$this->input->post("branch");
            $datearray=$this->input->post("datearray");
            $status=$this->input->post("status");
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO advances(empid,`description`,amount,branch,datearray,timearray,`status`) VALUES('$empid','$description','$amount','$branch','$datearray','$timearray','$status')");                    
                }else{
                    $result=$this->db->query("UPDATE advances SET `description`='$description',amount='$amount',branch='$branch',`status`='$status' WHERE id='$id'");                    
                }                        
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_advances($id){
            $result=$this->db->query("DELETE FROM advances WHERE id='$id'");            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAdvanceBalance($empid){
            $result=$this->db->query("SELECT * FROM advances WHERE empid='$empid' ORDER BY datearray ASC");
            return $result->result_array();
        }
        public function getAllPayrollDaily(){
            $branch=$this->session->branch;
            $result=$this->db->query("SELECT * FROM payroll_daily WHERE branch='$branch'");
            return $result->result_array();
        }
        public function getAllPayrollPerHead(){
            $branch=$this->session->branch;
            $result=$this->db->query("SELECT * FROM payroll_per_head WHERE branch='$branch'");
            return $result->result_array();
        }
        public function getAllPayrollPeriod(){
            $branch=$this->session->branch;
            $result=$this->db->query("SELECT * FROM payroll_period WHERE branch='$branch' ORDER BY startdate DESC");
            return $result->result_array();
        }
        public function save_payrollperiod(){
            $id=$this->input->post("id");
            $startdate=$this->input->post("startdate");
            $enddate=$this->input->post("enddate");
            $branch=$this->input->post("branch");
            if($id==""){
                $result=$this->db->query("INSERT INTO payroll_period(startdate,enddate,branch) VALUES('$startdate','$enddate','$branch')");
            }else{
                $result=$this->db->query("UPDATE payroll_period SET startdate='$startdate',enddate='$enddate',branch='$branch' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_payrollperiod($id){
            $branch=$this->session->branch;
            $result=$this->db->query("DELETE FROM payroll_period WHERE id='$id' AND branch='$branch'");
            if($result){
                $this->db->query("DELETE FROM payroll_daily WHERE payroll_period='$id' AND branch='$branch'");
                $this->db->query("DELETE FROM payroll_per_head WHERE payroll_period='$id' AND branch='$branch'");
                return true;
            }else{
                return false;
            }
        }
        public function checkPeriod($id){
            $result=$this->db->query("SELECT * FROM payroll_daily WHERE payroll_period='$id' AND `status`='posted'");
            if($result->num_rows() > 0){
                return $result->result_array();
            }else{
                $result=$this->db->query("SELECT * FROM payroll_per_head WHERE payroll_period='$id' AND `status`='posted'");
                if($result->num_rows() > 0){
                    return $result->result_array();
                }else{
                    return false;
                }
            }
        }
        public function create_payroll($id,$type){
            $branch=$this->session->branch;
            $employee=$this->db->query("SELECT e.*,ed.* FROM employee e INNER JOIN employeedetails ed ON ed.empid=e.empid WHERE ed.branch='$branch'");
            $emp=$employee->result_array();
            $period=$this->db->query("SELECT * FROM payroll_period WHERE id='$id'");
            $p=$period->row_array();
            $d1=new DateTime($p['startdate']);
            $d2=new DateTime($p['enddate']);
            $interval=$d1->diff($d2);
            $days_required=$interval->d + 1;
            $train=$this->db->query("SELECT * FROM customer WHERE datearray BETWEEN '$p[startdate]' AND '$p[enddate]'");
            $customer=$train->result_array();
            $pdc=0;
            $tdc=0;
            foreach($customer as $t){
                if($t['type'] == "PDC"){
                    $pdc++;
                }
                if($t['type'] == "TDC"){
                    $tdc++;
                }
            }
            $datearray=date("Y-m-d");
            $timearray=date('H:i:s');
            foreach($emp as $e){
                $check=$this->db->query("SELECT * FROM payroll_daily WHERE payroll_period='$id' AND empid='$e[empid]' AND branch='$branch'");
                if($check->num_rows() > 0){

                }else{
                    $check=$this->db->query("SELECT * FROM payroll_per_head WHERE payroll_period='$id' AND empid='$e[empid]' AND branch='$branch'");
                    if($check->num_rows() > 0){

                    }else{
                        if($type==1){
                            $this->db->query("INSERT INTO payroll_daily(payroll_period,empid,salary,no_of_days_required,no_of_days_work,adjustment,deduction,date_created,time_created,`status`,branch) VALUES('$id','$e[empid]','$e[salary]','$days_required','$days_required','0','0','$datearray','$timearray','pending','$branch')");
                        }else{
                            $this->db->query("INSERT INTO payroll_per_head(payroll_period,empid,no_of_heads_pdc,no_of_heads_tdc,adjustment,deduction,date_created,time_created,`status`,branch) VALUES('$id','$e[empid]','$pdc','$tdc','0','0','$datearray','$timearray','pending','$branch')");
                        }
                        return true;                        
                    }
                }
            }
        }
        public function getPayrollDaily($id){
            $branch=$this->session->branch;
            $employee=$this->db->query("SELECT e.*,ed.* FROM employee e INNER JOIN employeedetails ed ON ed.empid=e.empid WHERE ed.branch='$branch' AND ed.is_daily='1'");
            $emp=$employee->result_array();
            $period=$this->db->query("SELECT * FROM payroll_period WHERE id='$id'");
            $p=$period->row_array();
            $d1=new DateTime($p['startdate']);
            $d2=new DateTime($p['enddate']);
            $interval=$d1->diff($d2);
            $days_required=$interval->d + 1;
            $datearray=date("Y-m-d");
            $timearray=date('H:i:s');
            foreach($emp as $e){
                $check=$this->db->query("SELECT * FROM payroll_daily WHERE payroll_period='$id' AND empid='$e[empid]' AND branch='$branch'");
                if($check->num_rows() > 0){

                }else{
                    $this->db->query("INSERT INTO payroll_daily(payroll_period,empid,salary,no_of_days_required,no_of_days_work,adjustment,deduction,date_created,time_created,`status`,branch) VALUES('$id','$e[empid]','$e[salary]','$days_required','$days_required','0','0','$datearray','$timearray','pending','$branch')");                                              
                }
            }            
            $result=$this->db->query("SELECT pd.*,e.* FROM payroll_daily pd INNER JOIN employee e ON e.empid=pd.empid WHERE pd.payroll_period='$id'");
            return $result->result_array();
        }
        public function getPayrollPerHead($id){
            $branch=$this->session->branch;
            $employee=$this->db->query("SELECT e.*,ed.* FROM employee e INNER JOIN employeedetails ed ON ed.empid=e.empid WHERE ed.branch='$branch' AND ed.is_daily='0'");
            $emp=$employee->result_array(); 
            $period=$this->db->query("SELECT * FROM payroll_period WHERE id='$id'");
            $p=$period->row_array();           
            $train=$this->db->query("SELECT * FROM customer WHERE datearray BETWEEN '$p[startdate]' AND '$p[enddate]'");
            $customer=$train->result_array();
            $pdc=0;
            $tdc=0;
            foreach($customer as $t){
                if($t['type'] == "PDC"){
                    $pdc++;
                }
                if($t['type'] == "TDC"){
                    $tdc++;
                }
            }
            $datearray=date("Y-m-d");
            $timearray=date('H:i:s');
            foreach($emp as $e){
                    $check=$this->db->query("SELECT * FROM payroll_per_head WHERE payroll_period='$id' AND empid='$e[empid]' AND branch='$branch'");
                    if($check->num_rows() > 0){

                    }else{
                        $this->db->query("INSERT INTO payroll_per_head(payroll_period,empid,no_of_heads_pdc,no_of_heads_tdc,adjustment,deduction,date_created,time_created,`status`,branch) VALUES('$id','$e[empid]','$pdc','$tdc','0','0','$datearray','$timearray','pending','$branch')");                       
                    }
                
            }
            $result=$this->db->query("SELECT pd.*,e.* FROM payroll_per_head pd INNER JOIN employee e ON e.empid=pd.empid WHERE pd.payroll_period='$id'");
            return $result->result_array();
        }
        public function save_payroll($payroll_period,$empid,$is_daily,$required_days,$days_worked,$adjustment,$discount){
            $branch=$this->session->branch;
            if($is_daily==1){
                $result=$this->db->query("UPDATE payroll_daily SET no_of_days_required='$required_days',no_of_days_work='$days_worked',adjustment='$adjustment',deduction='$discount' WHERE empid='$empid' AND payroll_period='$payroll_period' AND branch='$branch'");
            }else{
                $result=$this->db->query("UPDATE payroll_per_head SET no_of_heads_pdc='$required_days',no_of_heads_tdc='$days_worked',adjustment='$adjustment',deduction='$discount' WHERE empid='$empid' AND payroll_period='$payroll_period' AND branch='$branch'");
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function post_payroll($id){
            $branch=$this->session->branch;
            $result=$this->db->query("UPDATE payroll_daily SET `status`='posted' WHERE payroll_period='$id' AND branch='$branch'");
            if($result){
                $this->db->query("UPDATE payroll_per_head SET `status`='posted' WHERE payroll_period='$id' AND branch='$branch'");
                return true;
            }else{
                return false;
            }
        }
        public function unpost_payroll($id){
            $branch=$this->session->branch;
            $result=$this->db->query("UPDATE payroll_daily SET `status`='pending' WHERE payroll_period='$id' AND branch='$branch'");
            if($result){
                $this->db->query("UPDATE payroll_per_head SET `status`='pending' WHERE payroll_period='$id' AND branch='$branch'");
                return true;
            }else{
                return false;
            }
        }
        public function getAllDeduction($period,$empid){
            $branch=$this->session->branch;
            $result=$this->db->query("SELECT * FROM deduction WHERE payroll_period='$period' AND empid='$empid' AND branch='$branch'");
            return $result->result_array();
        }
        public function save_deduction(){
            $id=$this->input->post("id");
            $period=$this->input->post("period");
            $empid=$this->input->post("empid");
            $description=$this->input->post("description");
            $amount=$this->input->post("amount");            
            $branch=$this->session->branch;
            $datearray=date('Y-m-d');
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO deduction(payroll_period,empid,`description`,amount,datearray,timearray,branch) VALUES('$period','$empid','$description','$amount','$datearray','$timearray','$branch')");
                }else{
                    $result=$this->db->query("UPDATE deduction SET `description`='$description',amount='$amount' WHERE id='$id'");
                }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_deduction($id){
            $result=$this->db->query("DELETE FROM deduction WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllCustomer($type){
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            $branch=$this->session->branch;
            if($type=="All"){
                $result=$this->db->query("SELECT * FROM customer WHERE datearray BETWEEN '$startdate' AND '$enddate' AND branch='$branch' ORDER BY `type` ASC, lastname ASC");
            }else{
                $result=$this->db->query("SELECT * FROM customer WHERE datearray BETWEEN '$startdate' AND '$enddate' AND branch='$branch' AND `type`='$type' ORDER BY datearray ASC, lastname ASC");
            }            
            return $result->result_array();
        }
        public function getPayrollDailySummary($id){                       
            $result=$this->db->query("SELECT pd.*,e.* FROM payroll_daily pd INNER JOIN employee e ON e.empid=pd.empid WHERE pd.payroll_period='$id' AND pd.status='posted'");
            return $result->result_array();
        }
        public function getPayrollPerHeadSummary($id){            
            $result=$this->db->query("SELECT pd.*,e.* FROM payroll_per_head pd INNER JOIN employee e ON e.empid=pd.empid WHERE pd.payroll_period='$id' AND pd.status='posted'");
            return $result->result_array();
        }
        public function getAllCustomerByDate($type,$date){
            $branch=$this->session->branch;
            $result=$this->db->query("SELECT * FROM customer WHERE `type`='$type' AND datearray='$date'");
            return $result->result_array();
        }
        public function getDeduction($period,$empid){
            $result=$this->db->query("SELECT * FROM deduction WHERE payroll_period='$period' AND empid='$empid'");
            return $result->result_array();
        }
        public function getPayrollPeriod($id){
            $result=$this->db->query("SELECT * FROM payroll_period WHERE id='$id'");
            return $result->row_array();
        }

        public function getEmployeeDetails($empid){
            $result=$this->db->query("SELECT ed.*,d.designation FROM employeedetails ed INNER JOIN designation d ON d.id=ed.designation WHERE ed.empid='$empid'");
            return $result->row_array();
        }

        public function getAllDepositByDate($date){
            $branch=$this->session->branch;
            if($this->session->is_admin==1){
                $result=$this->db->query("SELECT * FROM deposit WHERE datearray='$date'");
            }else{
                $result=$this->db->query("SELECT * FROM deposit WHERE datearray='$date' AND branch='$branch");
            }            
            return $result->result_array();
        }

        public function getAllBalanceByDate($date){
            $branch=$this->session->branch;
            if($this->session->is_admin==1){
                $result=$this->db->query("SELECT * FROM balances WHERE datearray='$date'");
            }else{
                $result=$this->db->query("SELECT * FROM balances WHERE datearray='$date' AND branch='$branch");
            }            
            return $result->result_array();
        }
        public function save_deposit(){
            $id=$this->input->post("id");
            $expenses=$this->input->post("deposit");            
            $amount=$this->input->post("amount");  
            $branch=$this->input->post("branch");
            $datearray=$this->input->post("datearray");
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO deposit(`description`,amount,branch,datearray,timearray) VALUES('$expenses','$amount','$branch','$datearray','$timearray')");
                }else{
                    $result=$this->db->query("UPDATE deposit SET `description`='$expenses',branch='$branch',amount='$amount' WHERE id='$id'");
                }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_deposit($id){
            $result=$this->db->query("DELETE FROM deposit WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        } 

        public function save_balance(){
            $id=$this->input->post("id");
            $expenses=$this->input->post("balance");            
            $amount=$this->input->post("amount");  
            $branch=$this->input->post("branch");
            $datearray=$this->input->post("datearray");
            $timearray=date('H:i:s');
                if($id==""){
                    $result=$this->db->query("INSERT INTO balances(`description`,amount,branch,datearray,timearray) VALUES('$expenses','$amount','$branch','$datearray','$timearray')");
                }else{
                    $result=$this->db->query("UPDATE balances SET `description`='$expenses',branch='$branch',amount='$amount' WHERE id='$id'");
                }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_balance($id){
            $result=$this->db->query("DELETE FROM balances WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllAgentCommission($id) {
            $result=$this->db->query("SELECT c.lastname,c.firstname,cd.datearray FROM customer c INNER JOIN commissionerdetails cd ON cd.trainee_id=c.controlno WHERE cd.comm_id='$id' AND cd.status='pending' ORDER BY cd.datearray ASC,c.lastname ASC");
            return $result->result_array();
        }
        public function getSingleAgent($id){
            $result=$this->db->query("SELECT * FROM commissioner WHERE id='$id'");
            return $result->row_array();
        }
    }
?>