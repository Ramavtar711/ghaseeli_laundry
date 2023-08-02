<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

    <div class="main-content">
        <?php include('include/header_bar.php');
       
         
         
            $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
            
         if($admin->type=='ADMIN'){
           $push_notification = $this->admin_common_model->get_where('push_notification',['branch_id'=>$admin_id,'type'=>'USER']);
         }
        ?>
                            
<div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Notification</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Notification New </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

    
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Notification Table</h3>
                
                        <a href="<?php echo base_url('admin/page/add_user_notifi'); ?>" class="btn btn-sm btn-primary float-right mt--4"><i class="fa fa-plus mr-1"></i> New</a> </div>
                     
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="dataTableReport">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Image</th>
                                    <th scope="col" class="sort">Title</th>
                                    <th scope="col" class="sort">Description</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                        <?php $i=1; foreach($push_notification as $row){  ?>
                                            <tr>
                                            <th> <?= $i; ?> </th>
                                            <td>
                                   <div class="avatar imageBox mr-3">
                                          <?php
                                            if ($row['image'] == ''){
                                            $img_url = 'https://ondemandscripts.com/App-Demo/laundring-52421/public/images/product/Product_1632323460.png';
                                            }else{
                                            $img_url = base_url('uploads/images/'.$row['image']);
                                            }
                                            ?>
                                      <img alt="Image placeholder imageBoxImg" src="<?= $img_url ?>">
                                                </div>
                                            </td>
                                              <td> <?= $row['title']; ?> </td>
                                              <td> <?= $row['description']; ?> </td> 
                                       
                                            <td> 
                                     
                                          
                                  <a class="table-action text-warning" href="<?= base_url('admin/page/add_notification/'.$row['id']) ?>">
                                       <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white"><i class="fa fa-edit"></i></button></a>
                                            <button class="btn-white btn shadow-none p-0 m-0 table-action text-danger bg-white" onclick="deleteUsers('<?= $row['id']; ?>')"><i class="fas fa-trash"></i></button>
                                           
                                   </td>
                                      </tr>
                                      
                                      <?php  $i++; } ?>
                                  </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>   
                 
        <?php include('include/footer.php'); ?>  