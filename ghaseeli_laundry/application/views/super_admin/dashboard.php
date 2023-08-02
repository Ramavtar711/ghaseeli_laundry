<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php'); ?> 
           
                            

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
                                    <h5 class="card-title text-uppercase text-muted mb-0">Branch</h5>
                                    <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('admin',['type'=>'ADMIN'])->num_rows();?></span>
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
                                    <h5 class="card-title text-uppercase text-muted mb-0">Branch</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('admin',['type'=>'ADMIN'])->num_rows();?></span>
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
                                     <h5 class="card-title text-uppercase text-muted mb-0">Branch</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('admin',['type'=>'ADMIN'])->num_rows();?></span>
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
                                       <h5 class="card-title text-uppercase text-muted mb-0">Branch</h5>
                                <span class="h2 font-weight-bold mb-0"><?= $this->db->get_where('admin',['type'=>'ADMIN'])->num_rows();?></span>
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
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Income</h6>
                            <h2 class="text-default mb-0">Revenue</h2>
                        </div>
                       
                       
                           <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="dataTableReport">
                                <thead class="thead-light">
                                    <tr>
                                    <th class="sort" scope="col">Image</th>
                                    <th class="sort" scope="col"> Name</th>
                                    <th class="sort" scope="col">Email</th>
                                      <th class="sort" scope="col">Mobile</th>
                                         <th class="sort" scope="col">Address</th>
                                    <th class="sort" scope="col">Date Time</th>
                                    <th class="sort" scope="col">Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    
                                          <?php 
                                           $adminList = $this->admin_common_model->get_where('admin',['type'=>'ADMIN']);
                                          
                                          $i=2; foreach($adminList as $row){  ?>
                                    
                                    <tr>
                                      
                                            <td>
                                            <div class="avatar imageBox mr-3">
                                            <?php
                                            if ($row['image'] == ''){
                                            $img_url = base_url('uploads/images/user.png');
                                            }else{
                                            $img_url = base_url('uploads/images/'.$row['image']);
                                            }
                                            ?>
                                            <img src="<?=$img_url;?>" alt="" width="50"> 
                                            
                                            </td>
                                            <td><p><?= $row['name']; ?></p></td> 
                                            <td><p><?= $row['email']; ?></p></td> 
                                            <td><p><?= $row['mobile']; ?></p></td> 
                                              <td><p><?= $row['address']; ?></p></td> 
                                            <td><p><?= $row['date_time']; ?></p></td> 
                                           
                                        <td class="table-actions">
                                     <!--     <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white">  <i class="fas fa-eye"></i></button>-->
                                            <a class="table-action text-warning" href="<?= base_url('super_admin/page/add_main_branch/'.$row['id']) ?>">
                                       <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white"><i class="fa fa-edit"></i></button></a>
                                            <button class="btn-white btn shadow-none p-0 m-0 table-action text-danger bg-white" onclick="deleteUsers('<?= $row['id']; ?>')"><i class="fas fa-trash"></i></button>
                                        </td>
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
