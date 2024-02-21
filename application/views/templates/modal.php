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