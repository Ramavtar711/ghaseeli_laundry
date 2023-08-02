<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  
          $branch = $this->session->userdata('branch');
          $branch_id =   $branch->id;
          $place_order = $this->db->query("SELECT * FROM place_order WHERE sub_branch_id = $branch_id AND status ='Delivered' ORDER BY id DESC")->result_array();
       ?> 
           
                            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Orders Report</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('branch/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Orders Report </li>
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
                        <h3 class="mb-0">Orders Report</h3>
                    </div>
                    
                   <!-- <form action="#" method="post" class="ml-4" id="filter_revenu_form">
                        <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                        <div class="row rtl-date-filter-row">
                            <div class="form-group col-3">
                                <input type="text" id="filter_report_date" value="" name="filter_date" class="form-control" placeholder="-- Select Date --">
                                                            </div>
                            <div class="form-group col-3">
                                <button type="submit" id="filter_btn" class="btn btn-primary rtl-date-filter-btn">Apply</button>
                            </div>
                        </div>
                    </form>-->
                    <!-- Light table -->
                    <div class="table-responsive">
                        <div class="btn-group export-btns">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-download"></i> Export </button>
                            <div class="dropdown-menu"> 
                                <a class="dropdown-item"  id="export_print">
                                    <span class="navi-icon">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    <span class="navi-text ml-2">Print</span>
                                </a>
                                
                                <a class="dropdown-item"  id="export_copy">
                                    <span class="navi-icon">
                                        <i class="fa fa-copy"></i>
                                    </span>
                                    <span class="navi-text ml-2">Copy</span>
                                </a>
                                
                                <a class="dropdown-item"  id="export_excel">
                                    <span class="navi-icon">
                                        <i class="fa fa-file-excel"></i>
                                    </span>
                                    <span class="navi-text ml-2">Excel</span>
                                </a>
                                
                                <a class="dropdown-item"  id="export_csv">
                                    <span class="navi-icon">
                                        <i class="fas fa-file-csv"></i>
                                    </span>
                                    <span class="navi-text ml-2">CSV</span>
                                </a>
                                
                                <a class="dropdown-item"  id="export_pdf">
                                    <span class="navi-icon">
                                        <i class="fa fa-file-pdf"></i>
                                    </span>
                                    <span class="navi-text ml-2">PDF</span>
                                </a>
                            </div>
                        </div>
                       
                        <table class="table align-items-center table-flush" id="dataTableRevenueReport">
                            <thead class="thead-light">
                                <tr>
                               <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Order ID</th>
                                    <th scope="col" class="sort">Branch</th>
                                    <th scope="col" class="sort">Customer</th>
                                     <th scope="col" class="sort">Amount</th>
                                    <th scope="col" class="sort">Payment Type</th>
                                     <th scope="col" class="sort">Order Status</th>
                                    <th scope="col" class="sort">Date Time</th>
                                    <th class="sort" scope="col">Action</th>
                                    
                                    
                                    
                           <!--         <th scope="col" class="sort badge-center">Payment Status</th>-->
                                  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                 <?php $i=1; foreach($place_order as $row){ 
                                   $users= $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                                  $admin= $this->admin_common_model->get_where('admin',['id'=>$row['branch_id']]);
                                 ?>
                                
                                
                                      <tr>
                                       <td><p><?= $i; ?></p></td>    
                                    <td><p>
                                          <a href="<?php echo base_url('branch/page/order_details/'.$row['id']); ?>" style="color:red;">
                                     
                                        <?= $row['invoice']; ?></p>
                                        </a>
                                
                                        
                                        </td> 
                                    <td><p><?= $admin[0]['name']; ?></p></td> 
                                        <td><p><?= $users[0]['user_name']; ?></p></td> 
                                        <td><p><?= $row['price'] + $row['tax'] + $row['delivery_charge'] ; ?>L.E</p></td> 
                                        <td><p><?= $row['payment_type']; ?></p></td>    
                                        <td><p><?= $row['status']; ?></p></td> 
                                        <td><p><?= $row['date_time']; ?></p></td>   
                                  <!--    <td>
                                <select class="form-control" name="status" getid="<?=$row['id']?>" >
                                <option <?php if($row['status']=='Pending'){ echo 'selected'; }?>>Pending</option>
                                <option <?php if($row['status']=='Confirmed'){ echo 'selected'; }?>>Confirmed</option>
                                <option <?php if($row['status']=='Pickup'){ echo 'selected'; }?>>Pickup</option>
                                <option <?php if($row['status']=='Progress'){ echo 'selected'; }?> >Progress</option>
                                <option <?php if($row['status']=='Shipped'){ echo 'selected'; }?> >Shipped</option>
                                <option <?php if($row['status']=='Delivered'){ echo 'selected'; }?> >Delivered</option>
                                <option <?php if($row['status']=='Cancel'){ echo 'selected'; }?> >Cancel</option>
                                </select>
                                </td>  --> 
                                       
                             
                                       
                                        <td class="table-actions">
                                            <a href="<?php echo base_url('branch/page/invoice/'.$row['id']) ?>" class="text-blue cursor table-action"><i class="fas fa-file-invoice"></i></a>
                                        </td>
                                    </tr>
                               <?php $i++;}  ?>     
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
     <?php include('include/footer.php'); ?>  