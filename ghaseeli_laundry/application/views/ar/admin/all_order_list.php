<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');

  
  
  ?> 
           
                            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0"><?php echo $title_ar; ?> تقرير</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> <?php echo $title_ar; ?> تقرير </li>
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
                        <div class="row">
                       <div class="col-md-6">  
                        <h3 class="mb-0"><?php echo $title_ar; ?> تقرير</h3>
                        </div> 
                        
                    
                    <!--
                       <div class="col-md-6">  
                        <div class="dropdown show float-right">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select Branch
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
         <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=All'); ?>">ALl</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=Pending'); ?>">Pending</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=Confirmed'); ?>">Confirmed</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=Pickup'); ?>">Pickup</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=Progress'); ?>">Progress</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=Shipped'); ?>">Shipped</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=Delivered'); ?>">Delivered</a>
    <a class="dropdown-item" href="<?php echo base_url('admin/display_rides?act=Cancel'); ?>">Cancel</a>
  </div>
</div> 
  

</div>-->
</div>
                        
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
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-download"></i> يصدّر </button>
                            <div class="dropdown-menu"> 
                                <a class="dropdown-item"  id="export_print">
                                    <span class="navi-icon">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    <span class="navi-text ml-2">مطبعة</span>
                                </a>
                                
                                <a class="dropdown-item"  id="export_copy">
                                    <span class="navi-icon">
                                        <i class="fa fa-copy"></i>
                                    </span>
                                    <span class="navi-text ml-2">ينسخ</span>
                                </a>
                                
                                <a class="dropdown-item"  id="export_excel">
                                    <span class="navi-icon">
                                        <i class="fa fa-file-excel"></i>
                                    </span>
                                    <span class="navi-text ml-2">اكسل</span>
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
                                    <span class="navi-text ml-2">بي دي إف</span>
                                </a>
                            </div>
                        </div>
                       
                        <table class="table align-items-center table-flush" id="dataTableRevenueReport" data-sort-order="desc">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col" class="sort">#</th>
                                <th scope="col" class="sort">رقم التعريف الخاص بالطلب</th>
                                <th scope="col" class="sort">فرع</th>
                                <th scope="col" class="sort">عميل</th>
                                <th scope="col" class="sort">مقدار</th>
                                <th scope="col" class="sort">نوع الدفع</th>
                                <th scope="col" class="sort">حالة الطلب</th>
                                <th scope="col" class="sort">تاريخ الوقت</th>
                                <th class="sort" scope="col">عمل</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                 <?php $i=1; foreach($rideList as $row){
                                  $users= $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
                                  $admin= $this->admin_common_model->get_where('admin',['id'=>$row['branch_id']]);
                                    
                                    ?>
                                
                                
                                      <tr>
                                    
                             
                                          <td><p><?= $row['id']; ?></p></td>    
                                    <td>
                                         <a href="<?php echo base_url('admin/page/order_details/'.$row['id']); ?>" style="color:red;">
                                     
                                        <?= $row['invoice']; ?></p>
                                        </a>
                                  
                                    
                                    </td> 
                                    <td><p><?= $admin[0]['name']; ?></p></td> 
                                    <td><p><?= $users[0]['user_name']; ?></p></td> 
                                    <td><p>EGP<?= $row['price'] + $row['tax'] + $row['delivery_charge'] ; ?></p></td> 
                                    
                                        <?php   if($row['payment_type']=='Paid'){ 
							                $payment_type = 'مدفوع';
							                }else{
							                 $payment_type = 'غير مدفوعة';
							         } ?>
                                    
                                    <td><p><?= $payment_type; ?></p></td>  
                                                  
                         	<?php 
							if($row['status'] =='Pending'){
							  $status = 'قيد الانتظار';
							  	}
							  elseif ($row['status'] =='Confirmed') {
							       $status = 'مؤكد';
							  }
							   elseif ($row['status'] =='Pickup') {
							       $status = 'يلتقط';
							  }
							 
							   elseif ($row['status'] =='Progress') {
							       $status = 'تقدم';
							  }
							   elseif ($row['status'] =='Shipped') {
							       $status = 'شحنها';
							  }
							   elseif ($row['status'] =='Delivered') {
							       $status = 'تم التوصيل';
							  }
							   elseif ($row['status'] =='Cancel') {
							       $status = 'يلغي';
							  }else{
							        $status = 'قيد الانتظار';
							  }
							?>
							
                                    
                                    
                                    
                                    <td><p><?= $status; ?></p></td> 
                                    <td><p><?= $row['date_time']; ?></p></td> 
                                       
                                        <td class="table-actions">
                                           <a href="<?php echo base_url('admin/page/invoice/'.$row['id']) ?>" class="text-blue cursor table-action"><i class="fas fa-file-invoice"></i></a>
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