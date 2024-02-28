<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?=base_url();?>main">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url();?>manage_employee">
          <i class="bi bi-person"></i>
          <span>Employee</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Transactions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url();?>manage_trainee">
              <i class="bi bi-circle"></i><span>Trainee</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url();?>manage_expenses">
              <i class="bi bi-circle"></i><span>Expenses</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url();?>manage_advances">
              <i class="bi bi-circle"></i><span>Advances</span>
            </a>
          </li>          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url();?>manage_payroll">
              <i class="bi bi-circle"></i><span>Payroll</span>
            </a>
          </li>
          <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#generateEnrollee">
              <i class="bi bi-circle"></i><span>Enrollee</span>
            </a>
          </li>          
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url();?>manage_agent">
              <i class="bi bi-circle"></i><span>Agent</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url();?>manage_branch">
              <i class="bi bi-circle"></i><span>Branch</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url();?>manage_designation">
              <i class="bi bi-circle"></i><span>Designation</span>
            </a>
          </li>
          <?php
            if($this->session->is_admin==1){
          ?>
          <li>
            <a href="<?=base_url();?>manage_users">
              <i class="bi bi-circle"></i><span>User Manager</span>
            </a>
          </li>
          <?php
            }
          ?>
        </ul>
      </li><!-- End Tables Nav -->
    </ul>

  </aside><!-- End Sidebar-->