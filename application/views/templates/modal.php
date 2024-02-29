<div class="modal fade" id="logout" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leaving so soon?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                      <h2>Do you wish to logout out?</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Please, Stay!</button>
                <?=form_open(base_url()."logout");?>
                <button type="submit" class="btn btn-danger">Leave, now!</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="managebranch" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_branch");?>
            <input type="hidden" name="id" id="branch_id">
            <div class="modal-body">
                <div class="form-group mb-1">                    
                    <input type="text" class="form-control" placeholder="Enter Branch Name" name="branch" required id="branch_name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="managedesignation" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Designation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_designation");?>
            <input type="hidden" name="id" id="designation_id">
            <div class="modal-body">
                <div class="form-group mb-1">                    
                    <input type="text" class="form-control" placeholder="Enter Designation" name="designation" required id="designation_name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manageagent" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Agent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_agent");?>
            <input type="hidden" name="id" id="agent_id">
            <div class="modal-body">
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required id="agent_lastname">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" required id="agent_firstname">
                </div>
                <?php
                    if($this->session->is_admin==1){
                ?>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Branch</label>
                    <select name="branch" class="form-select" id="agent_branch" required>
                        <option value="">Select Branch</option>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value='$branch[id]'>$branch[description]</option>";
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }else{
                        echo "<input type='hidden' name='branch' value='".$this->session->branch."'>";
                    }
                ?>
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">Username</label>
                    <input type="text" class="form-control" name="username" required id="agent_username">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Password</label>
                    <input type="password" class="form-control" name="password" required id="agent_password">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Status</label>
                    <select name="status" class="form-select" id="agent_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manageemployee" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_employee");?>
            <input type="hidden" name="id" id="emp_id">
            <input type="hidden" name="empidold" id="emp_idnumold">
            <div class="modal-body">
            <div class="form-group mb-1"> 
                    <label class="col-sm-3 control-label">Employee ID</label>
                    <input type="text" class="form-control" name="empid" required id="emp_idnum">
                </div>
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required id="emp_lastname">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" required id="emp_firstname">
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-3 control-label">Middle Name</label>
                    <input type="text" class="form-control" name="middlename" id="emp_middlename">
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-2 control-label">Suffix</label>
                    <input type="text" class="form-control" name="suffix" id="emp_suffix">
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-2 control-label">Birthday</label>
                    <input type="date" class="form-control" name="birthdate" id="emp_birthdate">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Gender</label>
                    <select name="gender" class="form-select" id="emp_gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Designation</label>
                    <select name="designation" class="form-select" id="emp_designation" required>
                        <option value="">Select Designation</option>
                        <?php
                            foreach($designation as $branch){
                                echo "<option value='$branch[id]'>$branch[designation]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-2 control-label">Daily Rate</label>
                    <input type="text" class="form-control" name="salary" id="emp_salary">
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-3 control-label">Is Daily Rate?</label>
                    <input type="radio" name="is_daily" id="emp_daily_yes" value="1" checked> Yes <input type="radio" name="is_daily" id="emp_daily_no" value="0"> No
                </div>
                <?php
                            if($this->session->is_admin=="1"){
                        ?>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Branch</label>
                    <select name="branch" class="form-select" id="emp_branch" required>                        
                        <option value="">Select Branch</option>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value='$branch[id]'>$branch[description]</option>";
                            }
                        ?>
                    </select>
                </div>                              
                <?php
                            }else{
                                echo "<input type='hidden' name='branch' value='".$this->session->branch."'>";
                            }
                            ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="managetrainee" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Trainee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_trainee");?>
            <input type="hidden" name="id" id="trainee_id">
            <input type="hidden" name="controlno" id="trainee_controlno">
            <div class="modal-body">
            <div class="form-group mb-1"> 
                    <label class="col-sm-3 control-label">Applicable Date</label>
                    <input type="date" class="form-control" name="datearray" required id="trainee_date" value="<?=date('Y-m-d');?>">
                </div>            
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required id="trainee_lastname">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" required id="trainee_firstname">
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-3 control-label">Type</label>
                    <select name="type" class="form-select" id="trainee_type">
                        <option value="PDC">Practical Driving Course</option>
                        <option value="TDC">Theoretical Driving Course`</option>
                        <option value="Add Code">Add Code</option>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-2 control-label">Code</label>
                    <input type="text" class="form-control" name="code" id="trainee_code">
                </div>
                <div class="form-group mb-1">
                    <label class="col-sm-2 control-label">Amount</label>
                    <input type="text" class="form-control" name="amount" id="trainee_amount">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-3 control-label">Referred by</label>
                    <select name="commissioner" class="form-select" id="trainee_commissioner" required>
                        <option value="">Select Referral</option>
                        <?php
                            foreach($agent as $branch){
                                echo "<option value='$branch[id]'>$branch[lastname] $branch[firstname]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Branch</label>
                    <select name="branch" class="form-select" id="trainee_branch" required>
                        <option value="">Select Branch</option>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value='$branch[id]'>$branch[description]</option>";
                            }
                        ?>
                    </select>
                </div>                              
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Status</label>
                    <select name="status" class="form-select" id="trainee_status">
                        <option value="PAID">PAID</option>
                        <option value="pending">NOT PAID</option>
                    </select>
                </div>  
                <div class="form-group mb-1">
                    <label class="col-sm-2 control-label">Remarks</label>
                    <textarea name="remarks" rows="3" class="form-control" id="trainee_remarks"></textarea>
                </div>                                              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manageusers" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Agent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_users");?>
            <input type="hidden" name="id" id="user_id">
            <div class="modal-body">
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">Username</label>
                    <input type="text" class="form-control" name="username" required id="user_username">
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Password</label>
                    <input type="password" class="form-control" name="password" required id="user_password">
                </div>
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" required id="user_fullname">
                </div>   
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">is Admin?</label><br>
                    <input type="radio" name="is_admin" value="1" id="user_is_admin_yes"> Yes <input type="radio" name="is_admin" value="0" id="user_is_admin_no" checked> No
                </div>             
                <?php
                    if($this->session->is_admin==1){
                ?>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Branch</label>
                    <select name="branch" class="form-select" id="user_branch" required>
                        <option value="">Select Branch</option>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value='$branch[id]'>$branch[description]</option>";
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }else{
                        echo "<input type='hidden' name='branch' value='".$this->session->branch."'>";
                    }
                ?>                                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manageexpenses" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Expenses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_expenses");?>
            <input type="hidden" name="id" id="expense_id">
            <div class="modal-body">  
                <div class="form-group mb-1">                    
                    <label class="col-sm-3 control-label">Applicable Date</label>
                    <input type="date" name="datearray" value="<?=date('Y-m-d');?>" id="expense_date" class="form-control" required>
                </div>              
                <div class="form-group mb-1">                    
                    <label class="col-sm-3 control-label">Expense Details</label>
                    <textarea name="expenses" class="form-control" rows="3" id="expense_name"></textarea>
                </div>            
            <?php
                    if($this->session->is_admin==1){
                ?>
            <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Branch</label>
                    <select name="branch" class="form-select" id="expense_branch" required>
                        <option value="">Select Branch</option>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value='$branch[id]'>$branch[description]</option>";
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }else{
                        echo "<input type='hidden' name='branch' value='".$this->session->branch."'>";
                    }
                    ?>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="manageadvances" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Advances</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_advances");?>
            <input type="hidden" name="id" id="advance_id">
            <input type="hidden" name="empid" value="<?=$empid;?>">
            <div class="modal-body">  
                <div class="form-group mb-1">                    
                    <label class="col-sm-3 control-label">Applicable Date</label>
                    <input type="date" name="datearray" value="<?=date('Y-m-d');?>" id="advance_date" class="form-control" required>
                </div>              
                <div class="form-group mb-1">                    
                    <label class="col-sm-3 control-label">Advance Details</label>
                    <textarea name="description" class="form-control" rows="3" id="advance_name"></textarea>
                </div>
                <div class="form-group mb-1">                    
                    <label class="col-sm-3 control-label">Amount</label>
                    <input type="text" name="amount" id="advance_amount" class="form-control" required>
                </div>            
            <?php
                    if($this->session->is_admin==1){
                ?>
            <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Branch</label>
                    <select name="branch" class="form-select" id="advance_branch" required>
                        <option value="">Select Branch</option>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value='$branch[id]'>$branch[description]</option>";
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }else{
                        echo "<input type='hidden' name='branch' value='".$this->session->branch."'>";
                    }
                    ?>
                    <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Status</label>
                    <select name="status" class="form-select" id="advance_status" required>
                        <option value="pending">PENDING</option>
                        <option value="paid">PAID</option>                        
                    </select>
                </div>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="managepayrollperiod" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Payroll Period</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_payrollperiod");?>
            <input type="hidden" name="id" id="period_id">
            <div class="modal-body">
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">Start Date</label>
                    <input type="date" class="form-control" name="startdate" required id="period_startdate">
                </div>
                <div class="form-group mb-1"> 
                    <label class="col-sm-2 control-label">End Date</label>
                    <input type="date" class="form-control" name="enddate" required id="period_enddate">
                </div>                
                <?php
                    if($this->session->is_admin==1){
                ?>
                <div class="form-group mb-1">                    
                    <label class="col-sm-2 control-label">Branch</label>
                    <select name="branch" class="form-select" id="period_branch" required>
                        <option value="">Select Branch</option>
                        <?php
                            foreach($branches as $branch){
                                echo "<option value='$branch[id]'>$branch[description]</option>";
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }else{
                        echo "<input type='hidden' name='branch' value='".$this->session->branch."'>";
                    }
                ?>                                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="generateEnrollee" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enrollee Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."print_enrollee",array('target' => '_blank'));?>            
            <div class="modal-body">
                <div class="form-group mb-1">                    
                    <label>Start Date</label>
                    <input type="date" name="startdate" class="form-control">
                </div>
                <div class="form-group mb-1">                    
                    <label>End Date</label>
                    <input type="date" name="enddate" class="form-control">
                </div>
                <div class="form-group mb-1">                    
                    <label>Type</label>
                    <select name="type" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="PDC">Practical Driving Course</option>
                        <option value="TDC">Theoretical Driving Course</option>
                        <option value="Add Code">Add Code</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-primary">Generate</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="managededuction" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Deduction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?=form_open(base_url()."save_deduction");?>            
            <input type="hidden" name="id" id="deduct_id">
            <input type="hidden" name="period" id="deduct_period">
            <input type="hidden" name="empid" id="deduct_empid">
            <div class="modal-body">
                <div class="form-group mb-1">                    
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="deduct_description" rows="3"></textarea>
                </div>
                <div class="form-group mb-1">                    
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control" id="deduct_amount">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-primary">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>