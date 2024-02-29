<?php  
  $post=$this->Payroll_model->db->query("SELECT * FROM payroll_daily WHERE `status`='pending' AND payroll_period='$payroll_period'");
  if($post->num_rows() > 0){
    $save="";
    $open="style='display: none;'";
    $post="";
  }else{
    $save="style='display: none;'";
    $open="";
    $post="style='display: none;'";
  }
?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$title;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>main">Home</a></li>
          <li class="breadcrumb-item active"><a href="<?=base_url();?>manage_payroll">Payroll</a></li>
          <li class="breadcrumb-item active">Manage Payroll</li>
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
              <h5 class="card-title">Employee Daily</h5>
              <div style="float:right;">
              <?=form_open(base_url()."post_payroll");?>
              <input type="hidden" name="id" value="<?=$payroll_period;?>">
              <input type="submit" name="save_changes" value="Post Payroll" class="btn btn-success" onclick="return confirm('Do you wish to post this payroll?'); return false;" <?=$post;?>/>
              <?=form_close();?>
              <a href="<?=base_url();?>unpost_payroll/<?=$payroll_period;?>" class="btn btn-warning" <?=$open;?>>Unpost Payroll</a>
            </div>              
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>                    
                    <th scope="col">Name</th>
                    <th scope="col" width='10%'>Daily Rate</th>
                    <th scope="col" width='10%'>Required Days</th>                    
                    <th scope="col" width='10%'>Days Worked</th>
                    <th scope="col">Adjustment</th>
                    <th scope="col">Gross</th>
                    <th scope="col">Deduction</th>
                    <th scope="col">Net</th>
                  </tr>
                </thead>
                <?=form_open(base_url()."create_payroll");?>
                <input type="hidden" name="id" value="<?=$payroll_period;?>">
                <tbody>
                  <?php               
                        $x=1;
                        foreach($payroll_daily as $branch){                            
                            $query=$this->Payroll_model->db->query("SELECT * FROM branch WHERE id='$branch[branch]'");
                            $br=$query->row_array();                               
                            $net=(($branch['salary']*$branch['no_of_days_work'])+$branch['adjustment']) - $branch['deduction'];
                            $gross=($branch['salary']*$branch['no_of_days_work'])+$branch['adjustment'];
                            $ded=$this->Payroll_model->db->query("SELECT SUM(amount) as deduction FROM deduction WHERE payroll_period='$payroll_period' AND empid='$branch[empid]' AND branch='$branch[branch]'");
                            $deduct=$ded->row_array();
                            $deduction=$deduct['deduction'];
                            echo "<input type='hidden' name='is_daily[]' value='1'>";
                            echo "<input type='hidden' name='empid[]' value='$branch[empid]'>";
                            echo "<tr>";
                                echo "<td>$x.</td>";                                
                                echo "<td>$branch[lastname], $branch[firstname] $branch[middlename] $branch[suffix]</td>";                                
                                echo "<td align='right'>$branch[salary]</td>";
                                echo "<td><input width='10%' style='text-align:center;' type='text' name='required_days[]' class='form-control' value='$branch[no_of_days_required]'></td>";
                                echo "<td><input width='10%' style='text-align:center;' type='text' name='days_worked[]' class='form-control' value='$branch[no_of_days_work]'></td>";
                                echo "<td><input width='10%' type='text' style='text-align:right;' name='adjustment[]' class='form-control' value='$branch[adjustment]'></td>";                                
                                echo "<td align='right'>".number_format($gross,2)."</td>";                                
                                echo "<td align='right'>
                                  <a href='".base_url()."manage_deduction/$payroll_period/$branch[empid]'>".number_format($deduction,2)."</a>
                                  <input type='hidden' name='deduction[]' class='form-control' value='$deduction'>
                                </td>";                                
                                echo "<td align='right'>".number_format($net,2)."</td>";
                            echo "</tr>";
                            $x++;
                        }                        
                  ?>
                </tbody>
              </table>
              <h5 class="card-title">Employee per Head</h5>
              <!-- End Default Table Example -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>                    
                    <th scope="col">Name</th>                    
                    <th scope="col" width='10%'>PDC</th>                    
                    <th scope="col" width='10%'>TDC</th>
                    <th scope="col">Adjustment</th>
                    <th scope="col">Gross</th>
                    <th scope="col">Deduction</th>
                    <th scope="col">Net</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $per_head=count($payroll_per_head); 
                        foreach($payroll_per_head as $branch){                            
                            $query=$this->Payroll_model->db->query("SELECT * FROM branch WHERE id='$branch[branch]'");
                            $br=$query->row_array();   
                            $pdc=$branch['no_of_heads_pdc']*60;
                            $tdc=$branch['no_of_heads_tdc']*80;
                            $gross=(($pdc+$tdc)/$per_head) + $branch['adjustment'];
                            $net=$gross - $branch['deduction'];
                            $ded=$this->Payroll_model->db->query("SELECT SUM(amount) as deduction FROM deduction WHERE payroll_period='$payroll_period' AND empid='$branch[empid]' AND branch='$branch[branch]'");
                            $deduct=$ded->row_array();
                            $deduction=$deduct['deduction'];
                            echo "<input type='hidden' name='is_daily[]' value='0'>";
                            echo "<input type='hidden' name='empid[]' value='$branch[empid]'>";
                            echo "<tr>";
                                echo "<td>$x.</td>";                                
                                echo "<td>$branch[lastname], $branch[firstname] $branch[middlename] $branch[suffix]</td>";                                                                
                                echo "<td><input width='10%' style='text-align:center;' type='text' name='required_days[]' class='form-control' value='$branch[no_of_heads_pdc]'></td>";
                                echo "<td><input width='10%' style='text-align:center;' type='text' name='days_worked[]' class='form-control' value='$branch[no_of_heads_tdc]'></td>";
                                echo "<td><input width='10%' type='text' style='text-align:right;' name='adjustment[]' class='form-control' value='$branch[adjustment]'></td>";                                
                                echo "<td align='right'>".number_format($gross,2)."</td>";                                
                                echo "<td align='right'>
                                  <a href='".base_url()."manage_deduction/$payroll_period/$branch[empid]'>".number_format($deduction,2)."</a>
                                  <input type='hidden' name='deduction[]' class='form-control' value='$deduction'>
                                </td>";
                                echo "<td align='right'>".number_format($net,2)."</td>";
                            echo "</tr>";
                            $x++;
                        }                        
                  ?>
                </tbody>
              </table>
              <input type="submit" name="save_changes" value="Save Changes" class="btn btn-primary" <?=$save;?>/>
              <?=form_close();?>              
            </div>
          </div>          
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->      
      </div>
    </section>

  </main><!-- End #main -->