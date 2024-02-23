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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>                
                <button type="submit" class="btn btn-danger" onclick="return confirm('Do you wish to submit details?');return false;">Submit</button>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>