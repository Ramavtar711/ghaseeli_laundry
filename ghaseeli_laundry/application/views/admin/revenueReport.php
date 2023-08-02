<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
           $place_order = $this->admin_common_model->get_all(' place_order');
  
  
  ?> 
           
                            
  <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Revenue Report</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Revenue Report </li>
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
                        <h3 class="mb-0">Revenue Report</h3>
                    </div>
                    
                        <div class="col-lg-12 cdG" style="padding:0px 0px 30px 0px;">
                       <form action="<?php echo base_url('admin/order_report');?>" method="post" class="form_container left_label" id="" >
					 
                      
						<div class="row">
									<div class="form_grid_12 col-lg-5">
										<label class="field_title">Start Date <span class="req">*</span>
										</label>
										<div class="form_input">
										     <input type="text" id="dp4" name="startDate" placeholder="From Date" class="form-control" value="" readonly=""/>
										</div>
									</div>
							
									<div class="form_grid_12 col-lg-5">
										<label class="field_title">End date <span class="req">*</span>
										</label>
										<div class="form_input">
										    <input type="text"  id="dp5" name="endDate" placeholder="To Date" class=" form-control" value="" readonly=""/>
										</div>
									</div>
										<div class="form_grid_12 col-lg-2">
								         <div class="form_input" style="margin-top: 2.5rem;">
										    <input type="submit" value="Search" class="btn btn-dang-add mr10 form-control" id="Search" name="Search" title="Search" />
										</div>
							     	</div>
								</div>
								</form>
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
                                <th scope="col" class="sort">User Name</th>
                                <th scope="col" class="sort">Address</th>
                                <th scope="col" class="sort">Status</th>
                                <th scope="col" class="sort">Payment Type</th>
                                <th scope="col" class="sort">Amount</th>
                                  <th scope="col" class="sort">Date Time</th>
                                
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                 <?php $i=1; foreach($place_order as $row){ 
                                    $users = $this->admin_common_model->get_where(' users',['id'=>$row['user_id']]);
                                  ?>
                                  <tr>
                                       <th> <?= $row['id'];?> </th>
                                       <td><p>
                                         <a href="<?php echo base_url('admin/page/order_details/'.$row['id']); ?>" style="color:red;">
                                     
                                        <?= $row['invoice']; ?></p>
                                        </a>
                                           </p></td>
                                            <td><p><?= $users[0]['user_name']; ?></p></td> 
                                            <td><p><?= $row['address']; ?></p></td> 
                                            <td><p><?= $row['status']; ?></p></td> 
                                            <td><p><?= $row['payment_type']; ?></p></td> 
                                            <td><p><?= $row['price']; ?></p></td> 
                                            <td><p><?= $row['date_time']; ?></p></td> 
                                        <td class="table-actions">
                                            <a href="<?php echo base_url('admin/page/order_details/'.$row['id']); ?>" class="text-blue cursor table-action">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
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
          <link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
 <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script>

// datepicker
 $(function() {
$( "#dp4" ).datepicker({ dateFormat: 'yy-mm-dd' });

 

$( "#dp5" ).datepicker({ dateFormat: 'yy-mm-dd' });
});
  </script>
          
     <?php include('include/footer.php'); ?>  