<!-- ======= Footer ======= -->
<footer id="footer" class="footer">  
    <div class="copyright">
      2024
      &copy; Copyright <strong><span>VLC Driving Tutorial</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Developed by <b>Eczekiel H. Aboy</b>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url();?>design/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/quill/quill.min.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url();?>design/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url();?>design/assets/js/main.js"></script>
  <script>
    $('.addBranch').click(function(){      
      document.getElementById('branch_id').value = "";
      document.getElementById('branch_name').value = "";
    });
    $('.editBranch').click(function(){
      var data=$(this).data('id');
      var id=data.split('_');
      document.getElementById('branch_id').value = id[0];
      document.getElementById('branch_name').value = id[1];
    });
    $('.addDesignation').click(function(){      
      document.getElementById('designation_id').value = "";
      document.getElementById('designation_name').value = "";
    });
    $('.editDesignation').click(function(){
      var data=$(this).data('id');
      var id=data.split('_');
      document.getElementById('designation_id').value = id[0];
      document.getElementById('designation_name').value = id[1];
    });
    $('.addAgent').click(function(){            
      document.getElementById('agent_id').value = "";
      document.getElementById('agent_lastname').value = "";
      document.getElementById('agent_firstname').value = "";
      document.getElementById('agent_username').value = "";
      document.getElementById('agent_password').value = "";
    });
    $('.editAgent').click(function(){            
      var id=$(this).data('id');
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_agent',
        method:"POST",
        data:{id:id},
        dataType:'json',
        success:function(response){
          if(response.length>0){
            document.getElementById("agent_id").value=id;
            document.getElementById("agent_lastname").value=response[0]['lastname'];
            document.getElementById("agent_firstname").value=response[0]['firstname'];
            document.getElementById("agent_branch").value=response[0]['branch'];
            // var selectBrand = document.getElementById("agent_branch");
            // var optn = response[0]['description'];
            // var optn1 = response[0]['branch'];
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn1;                
            //     selectBrand.appendChild(el);
            document.getElementById("agent_status").value=response[0]['status'];
            // var selectClass = document.getElementById("agent_status");
            // var optn = response[0]['status'];
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn;                
            //     selectClass.appendChild(el);            
            document.getElementById("agent_username").value=response[0]['username'];
            document.getElementById("agent_password").value=response[0]['password'];            
          }
        }        
      });
    });
    $('.addEmployee').click(function(){            
        document.getElementById('emp_id').value = "";
        document.getElementById('emp_idnum').value = "";
        document.getElementById('emp_lastname').value = "";
        document.getElementById('emp_firstname').value = "";
        document.getElementById('emp_middlename').value = "";
        document.getElementById('emp_suffix').value = "";
        document.getElementById('emp_birthdate').value = "";          
        document.getElementById('emp_salary').value = "";
        document.getElementById('emp_daily_yes').checked = true;                   
        document.getElementById('emp_daily_no').checked = false;                   
      });

      $('.editEmployee').click(function(){            
      var id=$(this).data('id');
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_employee',
        method:"POST",
        data:{id:id},
        dataType:'json',
        success:function(response){
          if(response.length>0){            
            document.getElementById("emp_idnum").value=id;
            document.getElementById("emp_idnumold").value=id;
            document.getElementById("emp_id").value=response[0]['id'];
            document.getElementById("emp_lastname").value=response[0]['lastname'];
            document.getElementById("emp_firstname").value=response[0]['firstname'];
            document.getElementById("emp_middlename").value=response[0]['middlename'];
            document.getElementById("emp_suffix").value=response[0]['suffix'];
            document.getElementById("emp_birthdate").value=response[0]['birthdate'];
            document.getElementById("emp_gender").value=response[0]['gender'];            
            document.getElementById("emp_designation").value=response[0]['designation_id'];
            // var selectClass = document.getElementById("emp_designation");
            // var optn = response[0]['designation'];
            // var optn1 = response[0]['designation_id'];
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn1;                
            //     selectClass.appendChild(el);            
            document.getElementById("emp_salary").value=response[0]['salary'];
            if(response['is_daily']=="1")
              document.getElementById("emp_daily_yes").checked=true;            
            }else{
              document.getElementById("emp_daily_no").checked=true;            
            }
            document.getElementById("emp_branch").value=response[0]['branch_id'];
            // var selectBrand = document.getElementById("emp_branch");
            // var optn = response[0]['description'];
            // var optn1 = response[0]['branch_id'];
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn1;                
            //     selectBrand.appendChild(el);            
          }
        });        
      });
      $('.addTrainee').click(function(){            
        document.getElementById("trainee_id").value="";            
        document.getElementById("trainee_controlno").value="";
        document.getElementById("trainee_lastname").value="";
        document.getElementById("trainee_firstname").value="";
        document.getElementById("trainee_type").value="";
        document.getElementById("trainee_code").value="";
        document.getElementById("trainee_amount").value="";            
        document.getElementById('trainee_branch').value="";          
        document.getElementById("trainee_remarks").value="";      
      });
      $('.editTrainee').click(function(){            
      var id=$(this).data('id');
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_trainee',
        method:"POST",
        data:{id:id},
        dataType:'json',
        success:function(response){
          if(response.length>0){            
            document.getElementById("trainee_id").value=id;            
            document.getElementById("trainee_controlno").value=response[0]['controlno'];
            document.getElementById("trainee_lastname").value=response[0]['lastname'];
            document.getElementById("trainee_firstname").value=response[0]['firstname'];
            document.getElementById("trainee_type").value=response[0]['type'];
            document.getElementById("trainee_code").value=response[0]['code'];
            document.getElementById("trainee_amount").value=response[0]['amount'];            
            document.getElementById('trainee_branch').value=response[0]['branch'];
            document.getElementById('trainee_date').value=response[0]['datearray'];
            // var selectBrand = document.getElementById("emp_branch");
            // var optn = response[0]['description'];
            // var optn1 = response[0]['branch_id'];
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn1;                
            //     selectBrand.appendChild(el);
             document.getElementById('trainee_commissioner').value=response[0]['comm_id'];            
            var optn = response[0]['t_status'];
            if(optn=="NOT PAID"){
              var optn1="pending";
            }else{
              var optn1=optn;
            }
            document.getElementById("trainee_status").value=optn1;
            document.getElementById("trainee_status").text =optn;
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn1;                
            //     selectClass.appendChild(el);            
            document.getElementById("trainee_remarks").value=response[0]['remarks'];
          }
        }
        });        
      });

      $('.addUsers').click(function(){            
      document.getElementById('user_id').value = "";
      document.getElementById('user_fullname').value = "";      
      document.getElementById('user_username').value = "";
      document.getElementById('user_password').value = "";
    });
    $('.editUsers').click(function(){            
      var id=$(this).data('id');
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_users',
        method:"POST",
        data:{id:id},
        dataType:'json',
        success:function(response){
          if(response.length>0){
            document.getElementById("user_id").value=id;            
            document.getElementById("user_fullname").value=response[0]['fullname'];
            document.getElementById("user_branch").value=response[0]['branch'];
            // var selectBrand = document.getElementById("agent_branch");
            // var optn = response[0]['description'];
            // var optn1 = response[0]['branch'];
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn1;                
            //     selectBrand.appendChild(el);            
            // var selectClass = document.getElementById("agent_status");
            // var optn = response[0]['status'];
            // var el = document.createElement("option");
            //     el.selected = "selected";
            //     el.textContent = optn;
            //     el.value = optn;                
            //     selectClass.appendChild(el);            
            document.getElementById("user_username").value=response[0]['username'];
            document.getElementById("user_password").value=response[0]['password'];            
            if(response[0]['is_admin']==1){
              document.getElementById('user_is_admin_yes').checked=true;
            }else{
              document.getElementById('user_is_admin_no').checked=true;
            }
          }
        }        
      });
    });
    $('.addExpenses').click(function(){      
      document.getElementById('expense_id').value = "";
      document.getElementById('expense_name').value = "";
      document.getElementById('expense_branch').value = "";
      document.getElementById('expense_date').value = "";
    });
    $('.editExpenses').click(function(){
      var data=$(this).data('id');
      var id=data.split('_');
      document.getElementById('expense_id').value = id[0];
      document.getElementById('expense_name').value = id[1];
      document.getElementById('expense_branch').value = id[2];
      document.getElementById('expense_date').value = id[3];
    });
    $('.addAdvances').click(function(){      
      document.getElementById('advance_id').value = "";
      document.getElementById('advance_name').value = "";
      document.getElementById('advance_branch').value = "";
      document.getElementById('advance_date').value = "";
      document.getElementById('advance_amount').value = "";
      document.getElementById('advance_status').value = "pending";
    });
    $('.editAdvances').click(function(){
      var data=$(this).data('id');
      var id=data.split('_');
      document.getElementById('advance_id').value = id[0];
      document.getElementById('advance_name').value = id[1];
      document.getElementById('advance_branch').value = id[2];
      document.getElementById('advance_date').value = id[3];
      document.getElementById('advance_amount').value = id[4];
      document.getElementById('advance_status').value = id[5];
    });

    $('.addPayrollPeriod').click(function(){      
      document.getElementById('period_id').value = "";
      document.getElementById('period_startdate').value = "";
      document.getElementById('period_enddate').value = "";
      document.getElementById('period_branch').value = "1";    
    });

    $('.editPayrollPeriod').click(function(){
      var data=$(this).data('id');
      var id=data.split('_');
      document.getElementById('period_id').value = id[0];
      document.getElementById('period_startdate').value = id[1];
      document.getElementById('period_enddate').value = id[2];
      document.getElementById('period_branch').value = id[3];
    });

    $('.addDeduction').click(function(){      
      var data=$(this).data('id');
      var id=data.split('_');
      document.getElementById('deduct_id').value = "";
      document.getElementById('deduct_period').value = id[0];
      document.getElementById('deduct_empid').value = id[1];
      document.getElementById('deduct_description').value = "";    
      document.getElementById('deduct_amount').value = "";
    });
    $('.editDeduction').click(function(){      
      var data=$(this).data('id');
      var id=data.split('_');
      document.getElementById('deduct_id').value = id[0];
      document.getElementById('deduct_description').value = id[1];    
      document.getElementById('deduct_amount').value = id[2];
      document.getElementById('deduct_period').value = id[4];
      document.getElementById('deduct_empid').value = id[3];      
    });
  </script>
</body>

</html>