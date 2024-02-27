<main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$title;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>main">Home</a></li>
          <li class="breadcrumb-item active">Payroll</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
        if($this->session->save_success){
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?=$this->session->save_success;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        }
    ?>
    <?php
        if($this->session->save_failed){
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <?=$this->session->save_failed;?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        }
    ?>
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-6 col-sm-12">
          <div class="row">
          <div class="card">          
            <div class="card-body">
            <div class="filter">
                  <a class="icon text-black" href="#" data-bs-toggle="dropdown"><i class="bi bi-gear"></i> Settings</a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Action</h6>
                    </li>

                    <li><a class="dropdown-item addPayrollPeriod" href="#" data-bs-toggle="modal" data-bs-target="#managepayrollperiod">Add Payroll Period</a></li>                    
                  </ul>
                </div>
              <h5 class="card-title">Payroll History</h5>

              <!-- Default Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>                    
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php               
                        $x=1;
                        foreach($payroll as $branch){                            
                            $query=$this->Payroll_model->db->query("SELECT * FROM branch WHERE id='$branch[branch]'");
                            $br=$query->row_array(); 
                            if(count($this->Payroll_model->checkPeriod($branch['id'])) > 0){
                              $view="style='display:none;'";
                            }else{
                              $view="";
                            }
                            echo "<tr>";
                                echo "<td>$x.</td>";                                
                                echo "<td>$branch[startdate]</td>";
                                echo "<td>$branch[enddate]</td>";
                                echo "<td><a href='#' class='btn btn-sm btn-warning editPayrollPeriod' data-bs-toggle='modal' data-bs-target='#managepayrollperiod' data-id='$branch[id]_$branch[startdate]_$branch[enddate]_$branch[branch]'>Edit</a>";
                                ?>
                                <a href="<?=base_url();?>delete_payrollperiod/<?=$branch['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');return false;">Delete</a>
                                <a href="<?=base_url();?>payroll_manager/<?=$branch['id'];?>" class="btn btn-success btn-sm">Manage Payroll</a>
                                <?php
                                echo "</td>";                                
                            echo "</tr>";
                            $x++;
                        }
                    
                  ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->      
      </div>
    </section>

  </main><!-- End #main -->