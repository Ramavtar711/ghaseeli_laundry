<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  
  
     $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('place_order',['id'=>$id]);
        $row = $fetch[0];
      }
         $users_details = $this->admin_common_model->get_where('users',['id'=>$row['user_id']]);
         $driver_details = $this->admin_common_model->get_where('users',['id'=>$row['driver_id']]);
  
   ?> 
           
                            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Invoice Report</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Invoice Report </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>
    
    <!-- Page content -->
   <div class="container-fluid mt--6">
    <div class="row mb-5">
        <div class="col">
            <div class="card pb-4">
                <!-- Card header -->
                <div class="card-header border-0">
                    <span class="h3">Invoice</span>
                    <div class="">
                        <a class="btn btn-primary addbtn float-right p-2 px-3"  target="_blank" href="#" id="print_invoice" onClick="window.print()">Print</a>
                    </div>
                </div>
                 <!--<div class="card shadow mx-auto w-65">-->
                <div class="w-65">
                    <div class="card-body px-5 py-4">
                        <div class="row mb-5">
                            <div class="col text-center center">
                                <h1 class="pt-1 font-size-27">Invoice</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <h3>Details</h3>
                                <div class="font-weight-bold">Laundering</div>
                                <div><?= $row['address']; ?>,</div>
                             
                            </div>
                            <div class="col-6 text-right">
                                <img src="https://lamavietech.ml/lamavie_laundry/assets/admin/images/color_logo.png"  id="black_logo_output" class="mt-2 logo_size rtl-float-left" style="height: 56px;">
                            </div>
                        </div>
                        
                        <hr class="my-4" />

                        <div class="row">
                            <div class="col-6 text-left">
                                <h3>Invoice to</h3>
                                <div class="font-weight-bold">express laundry</div>
                                <div><?=$driver_details[0]['user_name']?></div>
                                <div><?=$driver_details[0]['email']?></div>
                                <div><?=$driver_details[0]['mobile']?> </div>
                            </div>
                            <div class="col-6 text-right rtl-p">
                                <p class="strong">Order ID : <span class="font-weight-normal"><?= $row['invoice']; ?></span> </p>
                                <p class="strong mt--3">Order Delivery Date : <span class="font-weight-normal"><?= $row['delivery_date']; ?> <?= $row['delivery_time']; ?> </span> </p>
                                <p class="strong mt--3">Payment Type : <span class="font-weight-normal"><?= $row['payment_type']; ?></span> </p>
                                <p class="strong mt--3">Order Status : <span class="font-weight-normal"><?= $row['status']; ?></span> </p>
                            </div>
                        </div>

                        <div class="table-responsive my-4">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort">#</th>
                                       
                                        <th scope="col" class="sort">Name</th>
                                        <th scope="col" class="sort">Qty</th>
                                        <th scope="col" class="sort">Price</th>
                                          <th scope="col" class="sort">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                   <?php 
                               $cart_id    = $row['cart_id'];
                               $where = "id  IN($cart_id)";
                               $add_to_cart =    $this->admin_common_model->get_where('add_to_cart',$where);  
                               $i=1;
                                $total=0;
                               
                               foreach($add_to_cart as $cart_val){
                              $child_category =    $this->admin_common_model->get_where('child_category',['id'=>$cart_val['child_cat_id']]);   
                                  $total +=      $child_category[0]['price'] *  $cart_val['quantity'];
                                       
                                   ?> 
                                    
                                          <tr>
                                            <th><?= $i;?></th>
                                            
                                            <td><?= $child_category[0]['child_cate_name']?></td>
                                            <td><?= $cart_val['quantity']?></td>
                                             <td><?= $child_category[0]['price']?></td>
                                               <td><?= $child_category[0]['price']*$cart_val['quantity'];?></td>
                                           </tr>
                                            <?php $i++;  } ?>      
                                          </tbody>
                            </table>
                        </div>
                            <div class="text-right">
                            <p class="strong">Items Price: <span class="font-weight-normal"><?=$total?>$</span> </p>
                            <p class="strong mt--3">Tax / VAT: <span class="font-weight-normal">0$</span> </p>
                            <p class="strong mt--3">Addon Cost: : <span class="font-weight-normal">0$</span> </p>
                        </div>
                        	<hr>
                          <div class="text-right">
                            <p class="strong">Subtotal : <span class="font-weight-normal"><?=$total?>$</span> </p>
                            <p class="strong mt--3">Coupon Discount : <span class="font-weight-normal">0$</span> </p>
                               <p class="strong mt--3">Delivery Fee: <span class="font-weight-normal">0$</span> </p>
                              	<hr> 
                            <p class="strong mt--3">Total Payment : <span class="font-weight-normal"><?= $total?>$</span> </p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
     <?php include('include/footer.php'); ?>  
     
     
