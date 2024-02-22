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
            $result=$this->db->query("SELECT * FROM commissioner ORDER BY lastname ASC");
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
            $result=$this->db->query("DELETE FROM commissioner WHERE id='$id'");
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
    }
?>