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