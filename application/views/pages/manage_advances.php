<main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$title;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>main">Home</a></li>
          <li class="breadcrumb-item active">Employee Advances</li>
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
              <h5 class="card-title">List of Employee</h5>

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
                    <th scope="col">Balance</th>                    
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php               
                        $x=1;
                        foreach($advances as $branch){                            
                            $query=$this->Payroll_model->db->query("SELECT * FROM branch WHERE id='$branch[branch]'");
                            $br=$query->row_array();
                            $balance=$this->Payroll_model->getAdvanceBalance($branch['empid']); 
                            $amount=0;
                            foreach($balance as $bal){
                              $amount += $bal['amount'];
                            }
                            $payment=$this->Payroll_model->getAdvancePayment($branch['empid']);
                            $totalpayment=0;
                            foreach($payment as $pay){
                              $totalpayment += $pay['amount'];
                            }
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$branch[empid]</td>";
                                echo "<td>$branch[lastname]</td>";
                                echo "<td>$branch[firstname]</td>";
                                echo "<td>$branch[middlename]</td>";
                                echo "<td>$branch[suffix]</td>";                               
                                echo "<td align='right'>".number_format($amount-$totalpayment,2)."</td>";
                                echo "<td>";
                                ?>
                                <a href="<?=base_url('view_advances/'.$branch['empid']);?>" class="btn btn-sm btn-primary">View Details</a>
                                <a href="<?=base_url('view_advance_payment/'.$branch['empid']);?>" class="btn btn-success btn-sm" target="_blank">View Payment</a>  
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