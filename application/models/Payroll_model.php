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
            $result=$this->db->query("DELETE FROM branch WHERE id='$id'");
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
            $result=$this->db->query("DELETE FROM designation WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
      
    }
?>