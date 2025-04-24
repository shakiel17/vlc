<main id="main" class="main">

    <div class="pagetitle">
      <h1><?=$title;?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>main">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Go to</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Trainee (PDC)<span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=count($pdc);?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>                

              </div>
            </div>            
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Go to</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Trainee (TDC)<span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=count($tdc);?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>                

              </div>
            </div>
            <!-- End Sales Card -->
            <?php
            $totalrevenue=0;
            foreach($pdc as $item){
              if($item['status']=="PAID"){
                $totalrevenue +=$item['amount'];
              }
            }
            foreach($tdc as $item){
              if($item['status']=="PAID"){
                $totalrevenue +=$item['amount'];
              }
            }

            $totalrevenue_prev=0;
            foreach($previous_pdc as $item){
              if($item['status']=="PAID"){
                $totalrevenue_prev +=$item['amount'];
              }
            }
            foreach($previous_tdc as $item){
              if($item['status']=="PAID"){
                $totalrevenue_prev +=$item['amount'];
              }
            }

            $den=$totalrevenue+$totalrevenue_prev;
            $diff=$totalrevenue-$totalrevenue_prev;
            if($den==0){
              $den=1;
            }
            $increase=$diff/$den;
            if($increase < 0){
              $increase=0;
            }
            ?>
            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="">&#8369;</i>
                    </div>
                    <div class="ps-3">
                      <h6><?=number_format($totalrevenue,2);?></h6>
                      <span class="text-success small pt-1 fw-bold"><?=number_format($increase*100,0);?>%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Employees <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=count($employee);?></h6>                      

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
        
            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">                
                <div class="card-body pb-0">
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Trainee Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $x=1;
                      foreach($trainee as $item){
                        echo "<tr>";
                          echo "<td>$x.</td>";
                          echo "<td>$item[lastname], $item[firstname]</td>";
                          echo "<td align='center'>$item[type]</td>";
                          echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                          echo "<td align='center'>$item[t_status]</td>";
                          echo "<td align='center'>$item[remarks]</td>";
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->      
      </div>
    </section>

  </main><!-- End #main -->