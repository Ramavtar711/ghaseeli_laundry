<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
  
  
  ?> 
           
                            

<!-- Top 4 cards -->
<div class="header pt-9" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;padding-bottom: 50px;"> 
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
        <div class="header-body mt--4">
            <div class="row align-items-center pb-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item text-white"><a href="<?php echo base_url('page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page"> Dashboard </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('users',['branch_id'=>$admin_id])->num_rows();?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">  
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Services</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('category',['branch_id'=>$admin_id])->num_rows();?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                        <i class="fas fa-list"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Sub Category</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('child_category',['branch_id'=>$admin_id])->num_rows();?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fa fa-tshirt"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Income</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        
                                        
                                        
                                        
                                        <?= 
                                        $this->db->query("SELECT SUM(price) AS amt  FROM `place_order` WHERE branch_id = '$admin_id'")->row()->amt;
                                        ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
               <!-- <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('users',['branch_id'=>$admin_id])->num_rows();?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">  
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Services</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('category',['branch_id'=>$admin_id])->num_rows();?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                        <i class="fas fa-list"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('product',['branch_id'=>$admin_id])->num_rows();?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fa fa-tshirt"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Income</h5>
                                    <span class="h2 font-weight-bold mb-0">
                                        
                                        
                                        
                                        
                                        <?= 
                                        $this->db->query("SELECT SUM(price) AS amt  FROM `place_order` WHERE branch_id = '$admin_id'")->row()->amt;
                                        ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">Since app launch</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>

<!-- Revenue Charts -->
<!--<div class="container-fluid mt--4">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Income</h6>
                            <h2 class="text-default mb-0">Revenue</h2>
                        </div>
                        <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item ml-2 mr-md-0" data-toggle="chart" data-target="#revenue_chart">
                                    <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab" id="weekRevenue">
                                        <span class="d-none d-md-block">Week</span>
                                        <span class="d-md-none">W</span>
                                    </a>
                                </li>
                                                                                                                        
                                <li class="nav-item ml-2 mr-md-0" data-toggle="chart" data-target="#revenue_chart">
                                    <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="monthRevenue">
                                        <span class="d-none d-md-block">Month</span>
                                        <span class="d-md-none">M</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item ml-2 mr-md-0" data-toggle="chart" data-target="#revenue_chart">
                                    <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="yearRevenue">
                                        <span class="d-none d-md-block">Year</span>
                                        <span class="d-md-none">Y</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   
                    <div class="chart">
              
                        <img src="<?php echo base_url(); ?>assets/admin/images/chart1.png" style="width:100%"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->


<!-- Users Charts  &  Users table -->
<div class="container-fluid mt-4 mb-4">
    <div class="row">
        <!-- User Chart -->
      <!--  <div class="col-xl-7">
            <div class="card shadow pb-1">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Last 12 Months</h6>
                            <h2 class="mb--1">Users</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart mt-6">
                
                       <img src="<?php echo base_url(); ?>assets/admin/images/chart2.png" style="width:80%"/>
                    </div>
                </div>
            </div>
        </div>
        -->
        
        
        
             <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">New Registered</h6>
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo base_url('page/user');?>" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort">Image</th>
                                <th scope="col" class="sort">Name</th>
                                <th scope="col" class="sort">Registered Date</th>
                            </tr>
                        </thead>
                        <tbody class="list">
              <?php $users = $this->db->query("SELECT * FROM users WHERE type='USER' ORDER BY id DESC LIMIT 5")->result_array(); 
                             $i=1;
                            foreach($users as $users_val){ ?>      
                              <tr>     
                                      <th><?= $i;?></th>
                                        <td>
                                            
                                            <div class="avatar rounded-circle">
                                               <?php if($users_val['image']==''){ ?> 
                                                
                                      <img alt="Image placeholder" src="<?php echo base_url(); ?>assets/admin/images/noimage.jpg">
                                             <?php }else{?>
                                      <img alt="Image placeholder" src="<?php echo base_url('uploads/images/'.$users_val['image']); ?>">
                                                <?php }  ?>
                                            </div>
                                        </td>
                                         <th><?= $users_val['user_name'];?></th>
                                         <th><?= $users_val['date_time'];?></th>
                                   </tr>
                                     <?php $i++; } ?>   
                                       </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
        
        
        
        <!-- User Table -->
         <div class="col-xl-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">New Registered</h6>
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col text-right">
                                <a href="<?php echo base_url('page/user');?>" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort">Image</th>
                                <th scope="col" class="sort">Name</th>
                                <th scope="col" class="sort">Registered Date</th>
                            </tr>
                        </thead>
                        <tbody class="list">
              <?php $users = $this->db->query("SELECT * FROM users WHERE type='USER' ORDER BY id DESC LIMIT 5")->result_array(); 
                             $i=1;
                            foreach($users as $users_val){ ?>      
                              <tr>     
                                      <th><?= $i;?></th>
                                        <td>
                                            
                                            <div class="avatar rounded-circle">
                                               <?php if($users_val['image']==''){ ?> 
                                                
                                      <img alt="Image placeholder" src="<?php echo base_url(); ?>assets/admin/images/noimage.jpg">
                                             <?php }else{?>
                                      <img alt="Image placeholder" src="<?php echo base_url('uploads/images/'.$users_val['image']); ?>">
                                                <?php }  ?>
                                            </div>
                                        </td>
                                         <th><?= $users_val['user_name'];?></th>
                                         <th><?= $users_val['date_time'];?></th>
                                   </tr>
                                     <?php $i++; } ?>   
                                       </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
</div>

 <?php include('include/footer.php'); ?>  
