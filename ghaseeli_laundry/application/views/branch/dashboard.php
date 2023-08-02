<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  
        $branch = $this->session->userdata('branch');
         $branch_id =   $branch->id;
            
         
        
  
  
        $place_order = $this->db->query("SELECT * FROM place_order WHERE sub_branch_id = $branch_id ORDER BY id DESC")->result_array();
  
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">All</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id])->num_rows();?></span>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id,'status'=>'Pending'])->num_rows();?></span>
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
                                     <h5 class="card-title text-uppercase text-muted mb-0">Confirmed</h5>
                          <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id,'status'=>'Confirmed'])->num_rows();?></span>
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
                                       <h5 class="card-title text-uppercase text-muted mb-0">Pickup</h5>
                               <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id,'status'=>'Pickup'])->num_rows();?></span>
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
            
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Progress</h5>
                                      <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id,'status'=>'Progress'])->num_rows();?></span>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">Shipped</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id,'status'=>'Shipped'])->num_rows();?></span>
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
                                     <h5 class="card-title text-uppercase text-muted mb-0">Delivered</h5>
                          <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id,'status'=>'Delivered'])->num_rows();?></span>
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
                                       <h5 class="card-title text-uppercase text-muted mb-0">Cancel</h5>
                               <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('place_order',['sub_branch_id'=>$branch_id,'status'=>'Cancel'])->num_rows();?></span>
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
        </div>
    </div>
</div>

<!-- Revenue Charts -->
<div class="container-fluid mt--4">
    <div class="row">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Orders</h6>
                            <h2 class="text-default mb-0">All Orders</h2>
                        </div>
                       
                       
                           <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="dataTableReport">
                                <thead class="thead-light">
                                    <tr>
                                  <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Order ID</th>
                                    <th scope="col" class="sort">Branch</th>
                                    <th scope="col" class="sort">Customer</th>
                                    <th scope="col" class="sort">Date Time</th>
                                     <th scope="col" class="sort">Amount</th>
                                    <th scope="col" class="sort">Payment Type</th>
                                   
                                        <th scope="col" class="sort">Order Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    
                                        
                                 <?php $i=1; foreach($place_order as $row){ 
                                   $users= $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                                  $admin= $this->admin_common_model->get_where('admin',['id'=>$row['branch_id']]);
                                 ?>
                                
                                
                                      <tr>
                                       <td><p><?= $i; ?></p></td>    
                                    <td><p><?= $row['invoice']; ?></p></td> 
                                    <td><p><?= $admin[0]['name']; ?></p></td> 
                                    <td><p><?= $users[0]['user_name']; ?></p></td> 
                                    <td><p><?= $row['date_time']; ?></p></td> 
                                    <td><p><?= $row['price']; ?></p></td> 
                                    <td><p><?= $row['payment_type']; ?></p></td>    
                                       <td><p><?= $row['status']; ?></p></td> 
                                    
                             
                                           
                                       
                                    </tr>
                                   <?php } ?>
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                       
                       
                       
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


<!-- Users Charts  &  Users table -->


 <?php include('include/footer.php'); ?>  
