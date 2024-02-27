<main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$title;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>main">Home</a></li>
          <li class="breadcrumb-item active">Designation</li>
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

                    <li><a class="dropdown-item addDesignation" href="#" data-bs-toggle="modal" data-bs-target="#managedesignation">Add Designation</a></li>                    
                  </ul>
                </div>
              <h5 class="card-title">List of Designation</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Branch</th>                    
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(count($branches)>0){
                        $x=1;
                        foreach($branches as $branch){
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$branch[designation]</td>";
                                echo "<td><a href='#' class='btn btn-sm btn-warning editDesignation' data-bs-toggle='modal' data-bs-target='#managedesignation' data-id='$branch[id]_$branch[designation]'>Edit</a>";
                                ?>
                                <a href="<?=base_url();?>delete_designation/<?=$branch['id'];?>/<?=$branch['designation'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');return false;">Delete</a>
                                <?php
                                echo "</td>";                                
                            echo "</tr>";
                            $x++;
                        }
                    }else{
                        echo "<tr>";
                            echo "<td colspan='3' align='center'>No record found!</td>";
                        echo "</tr>";
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