<main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$title;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>main">Home</a></li>
          <li class="breadcrumb-item active">Employee</li>
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
        <div class="col-lg-12 col-sm-12">
          <div class="row">
          <div class="card">          
            <div class="card-body">
            <div class="filter">
                  <a class="icon text-black" href="#" data-bs-toggle="dropdown"><i class="bi bi-gear"></i> Settings</a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Action</h6>
                    </li>

                    <li><a class="dropdown-item addEmployee" href="#" data-bs-toggle="modal" data-bs-target="#manageemployee">Add Employee</a></li>                    
                  </ul>
                </div>
              <h5 class="card-title">List of Employee</h5>         
              <div style="width:100vw;height:100vh; position:fixed;" id="loader">
                <div class="wavy-text">
                <span>L</span>
                <span>o</span>
                <span>a</span>
                <span>d</span>
                <span>i</span>
                <span>n</span>
                <span>g</span>
                <span>.</span>
                <span>.</span>
                </div>
              </div>     
              <!-- Default Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>                    
                    <th scope="col">Suffix</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Details</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php               
                        $x=1;
                        foreach($employee as $branch){                            
                            $query=$this->Payroll_model->db->query("SELECT * FROM branch WHERE id='$branch[branch]'");
                            $br=$query->row_array();
                            if($branch['is_daily']==1){
                              $daily="Daily Rate: $branch[salary]";
                            }else{
                              $daily="Per Head";
                            }
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$branch[empid]</td>";
                                echo "<td>$branch[lastname]</td>";
                                echo "<td>$branch[firstname]</td>";
                                echo "<td>$branch[middlename]</td>";
                                echo "<td>$branch[suffix]</td>";
                                echo "<td>$branch[birthdate]</td>";
                                echo "<td>$branch[gender]</td>";
                                echo "<td>$branch[designation]<br>$daily<br>$branch[description]</td>";
                                echo "<td>";
                                ?>
                                <!-- <div class="menu">
                                  <div class="center">Menu</div>
                                  <div class="item"><a href='#' class='editEmployee text-white' data-bs-toggle='modal' data-bs-target='#manageemployee' data-id='<?=$branch['idno'];?>'>Edit</a></div>
                          -->  
                                  
                                                                
                                <a href='#' class='editEmployee btn btn-warning btn-sm text-white' data-bs-toggle='modal' data-bs-target='#manageemployee' data-id='<?=$branch['idno'];?>'>Edit</a>
                                <a href="<?=base_url();?>delete_employee/<?=$branch['idno'];?>/<?=$branch['lastname'];?>_<?=$branch['firstname'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');return false;">Delete</a>
                                <a href="<?=base_url('manage_fixed_deduction/'.$branch['empid']);?>" class="btn btn-info btn-sm">Fixed Deduction</a>
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