<main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$title;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>main">Home</a></li>
          <li class="breadcrumb-item active">Agent</li>
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

                    <li><a class="dropdown-item addAgent" href="#" data-bs-toggle="modal" data-bs-target="#manageagent">Add Agent</a></li>                    
                  </ul>
                </div>
              <h5 class="card-title">List of Agent</h5>

              <!-- Default Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <!-- <th scope="col">Last Name</th> -->
                    <th scope="col">Name</th>
                    <!-- <th scope="col">Username</th>
                    <th scope="col">Password</th> -->
                    <th scope="col">Branch</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php               
                        $x=1;
                        foreach($agents as $branch){
                            $date=date('M d, Y',strtotime($branch['datearray']))." ".date('h:i a',strtotime($branch['timearray']));
                            $query=$this->Payroll_model->db->query("SELECT * FROM branch WHERE id='$branch[branch]'");
                            $br=$query->row_array();
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                // echo "<td>$branch[lastname]</td>";
                                echo "<td>$branch[firstname]</td>";
                                // echo "<td>$branch[username]</td>";
                                // echo "<td>$branch[password]</td>";
                                echo "<td>$br[description]</td>";
                                echo "<td>$date</td>";
                                echo "<td>$branch[status]</td>";
                                echo "<td><a href='#' class='btn btn-sm btn-warning editAgent' data-bs-toggle='modal' data-bs-target='#manageagent' data-id='$branch[id]'>Edit</a>";
                                ?>
                                <a href="<?=base_url();?>delete_agent/<?=$branch['id'];?>/<?=$branch['lastname'];?>_<?=$branch['firstname'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');return false;">Delete</a>
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