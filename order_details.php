<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  
           $admin = $this->session->userdata('admin');
           $admin_id =   $admin->id;  
  
          $order_id = $this->uri->segment(4);
         if($order_id!=''){
           $place_order = $this->db->query("SELECT * FROM place_order WHERE id ='$order_id' ORDER BY id DESC")->result_array(); 
          }
          
        
          
          
            $users_details = $this->admin_common_model->get_where('users',['id'=>$place_order[0]['user_id']]);
            $driver_details = $this->admin_common_model->get_where('users',['id'=>$place_order[0]['driver_id']]);
            $order_count = $this->admin_common_model->get_where('place_order',['user_id'=>$place_order[0]['user_id']]);
            $product_details = $this->admin_common_model->get_where('child_category',['id'=>$row['child_cat_id']]);
    ?> 
           
                            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
         
               <h4 class="h2 text-white d-inline-block mb-0">Orders Details</h4>
         
         
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Orders Details </li>
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
                    <div class="col-md-12 pr-5">
                    <div class="row mt-2">
            <div class="col-md-2">
                <div style="padding:10px;">
                <a class="text-body  my-2" href="<?php echo base_url('admin/page/invoice/'.$place_order[0]['id']); ?>">
            <i class="fa fa-print" aria-hidden="true"></i> Print Invoice
                 </a>
                 </div>
            </div>
            <div class="col-md-3">
                
                 
             
                
              <?php $sub_branch = $this->admin_common_model->get_where('users',['type'=>'DRIVER']);  ?>  
                
           <select class="form-control" name="delivery_man_id" onchange="addDeliveryMan('<?php echo $place_order[0]['id']?>',this.value)" >
	  <option value="">Select Delivery Man</option>
                <?php foreach($sub_branch as $sub_branch_val){?>
                <option <?php if($place_order[0]['driver_id'] == $sub_branch_val['id']){echo 'selected' ; } ?> value="<?=$sub_branch_val['id']?>" ><?=$sub_branch_val['user_name'];?></option>
                <?php } ?>
	
	</select>
            </div>
            <div class="col-md-4"></div>
           
            <div class="col-md-3">
                <div class="dropdown float-left" style="margin-right:20px;">

<div  style="" >
  <select class="form-control" name="payment_status" onchange="addpaymentOrderstatus('<?php echo $place_order[0]['id']?>',this.value)" style="border: 1px solid #ddd;     color: #525f7f;width: 98px;">
	    <option <?php if($place_order[0]['payment_status'] == 'Paid'){echo 'selected' ; } ?> value="Paid" >Paid</option>
        <option <?php if($place_order[0]['payment_status'] == 'Unpaid'){echo 'selected' ; } ?> value="Unpaid" >Unpaid</option>
           
	
	</select>
</div>
</div>



<div class="dropdown-menu-right">
    
 <select class="form-control" name="status" onchange="addOrderstatus('<?php echo $place_order[0]['id']?>',this.value)" style="border: 1px solid #ddd;     color: #525f7f;width: 98px;">
	    <option <?php if($place_order[0]['status'] == 'Pending'){echo 'selected' ; } ?> value="Pending" >Pending</option>
        <option <?php if($place_order[0]['status'] == 'Confirmed'){echo 'selected' ; } ?> value="Confirmed" >Confirmed</option>
          <option <?php if($place_order[0]['status'] == 'Pickup'){echo 'selected' ; } ?> value="Pickup" >Pickup</option>
        <option <?php if($place_order[0]['status'] == 'Progress'){echo 'selected' ; } ?> value="Progress" >Progress</option>
          <option <?php if($place_order[0]['status'] == 'Shipped'){echo 'selected' ; } ?> value="Shipped" >Shipped</option>
        <option <?php if($place_order[0]['status'] == 'Delivered'){echo 'selected' ; } ?> value="Delivered" >Delivered</option>
	<option <?php if($place_order[0]['status'] == 'Cancel'){echo 'selected' ; } ?> value="Cancel" >Cancel</option>
	</select>
</div>

            </div>
             
        </div>
        </div>
                    <!-- Card header -->
                    <div class="card-header" style="
    display: flex;
">
                        <h3 class="mb-0">Orders details</h3>
                        <a href="<?php echo base_url('admin/page/edit_order1/'.$order_id); ?>">
<button class=" btn btn-primary  p-0 m-0  " style="margin-left: 20px !important;padding: 0px 10px !important;">Add</button></a>
                    </div>
                    
                    <div class="row" id="printableArea">
		<div class="col-lg-8 mb-3 mb-lg-0">
			<div class="card mb-3 mb-lg-5">
				<div class="card-header" style="display: block!important;">
					<div class="row">
					
                        <div class="col-6 pt-2">
            <h4 style="color: #8a8a8a;">Pick Up Date Time :</h4><p><?= $place_order[0]['pickup_date']?> <?= $place_order[0]['pickup_time']?></p>
              <h4 style="color: #8a8a8a;">Delivery Date Time :</h4><p> <?= $place_order[0]['delivery_date']?> <?= $place_order[0]['delivery_time']?></p>
              <h4 style="color: #8a8a8a;">Pick Up Address :</h4><p>  <?= $place_order[0]['pickup_address']?> </p>
						</div>
					
					
						<div class="col-6 pt-2">
							<div class="text-right">
							    
							    <h4 class="text-capitalize" style="color: #8a8a8a;">Payment Status :<?= $place_order[0]['payment_status']?></h4>
								<h4 class="text-capitalize" style="color: #8a8a8a;">Payment Method :<?= $place_order[0]['payment_type']?></h4>
							<!--	<h4 class="" style="color: #8a8a8a;">Reference Code : <button class="btn btn-outline-primary btn-sm" data-target=".bd-example-modal-sm" data-toggle="modal">Add</button></h4>-->
								<h4 class="text-capitalize" style="color: #8a8a8a;">Order Type : <label class="badge badge-soft-primary" style="font-size: 14px"><?= $place_order[0]['status']?></label></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
				    
				    
				         <?php 
				         $total = 0;
				         
                               $cart_id    = $place_order[0]['cart_id'];
                               $where = "id  IN($cart_id)";
                               $add_to_cart =    $this->admin_common_model->get_where('add_to_cart',$where);  
                               $i=1;
                               foreach($add_to_cart as $cart_val){
                                   
                                 $product =  $this->admin_common_model->get_where('child_category',['id'=>$cart_val['child_cat_id']]); 
                               
                                     $total11 = ($product[0]['amount']*$cart_val['quantity']);
                                     
                                  $per_amount = (($total11*$product[0]['tax'])/100);
                                  $total_amount = $total11 + $per_amount;
                                  $sub_total  = $total_amount;
                                  $total += $sub_total ;   
                                 
                                 //  $total +=     $cart_val['quantity'] *$product[0]['amount'] ;   
                                       
                                   ?> 
				    
				    
				    
				    
					<div class="media">
						<div class="avatar avatar-xl mr-3"><img alt="Image Description" class="img-fluid"   src="<?php echo base_url('uploads/images/'.$product[0]['image']); ?>"></div>
						<div class="media-body">
						    
							<div class="row">
								<div class="col-md-6 mb-3 mb-md-0">
									<strong><?= $product[0]['child_cate_name']?></strong><br>
										<div class="font-size-sm text-body">
										<span>price :</span> <span class="font-weight-bold"><?= $product[0]['amount'];?> Tax(<?= $product[0]['tax']?>)</span>
									</div>
									<strong><u>Addons :</u></strong>
									<div class="font-size-sm text-body">
									    
							  <?php 
									 $extra_item_id    = $cart_val['extra_item_id'];
									       if($extra_item_id){   
									         
                                      $where = "id  IN($extra_item_id)";
                                      $extra_options_item =    $this->admin_common_model->get_where('extra_options_item',$where); 
                                      $extra_options_total = 0;
                                      foreach($extra_options_item as $extra_options){
                                             $extra_options_total += $extra_options['price'];  
									    ?>
								<span><?=  $extra_options['name']?> :</span> <span class="font-weight-bold"><?= $extra_options['price']?></span><br>
									<?php 
                                     }
									} else{ ?>
									<span> </span> <span class="font-weight-bold"></span>
									<?php }  ?>
									</div>
								
								</div>
								<div class="col col-md-2 align-self-center">
									<h4><?= $sub_total?>L.E</h4>
								</div>
								<div class="col col-md-1 align-self-center">
									<h5><?= $cart_val['quantity']?></h5>
								</div>
								<div class="col col-md-2 align-self-center text-right">
									<h5>$<?= $sub_total; ?></h5>
								</div>
								
								<div class="col col-md-1 align-self-center text-right">
							   <button class="btn-white btn shadow-none p-0 m-0 table-action text-danger bg-white" onclick="deleteUsers('<?= $cart_val['id']; ?>','<?php echo $order_id; ?>')"><i class="fas fa-trash"></i></button>
							   <a href="<?php echo base_url('admin/page/edit_order1/'.$order_id.'/'.$cart_val['id']); ?>"> <button class="btn-white btn shadow-none p-0 m-0 table-action text-success bg-white"><i class="fas fa-edit"></i></button></a>
								</div>
								
								
							</div>
						</div>
					</div>
					<?php  } ?>
					
					
					
					<hr>
					<div class="row justify-content-md-end mb-3">
						<div class="col-md-9 col-lg-8">
							<dl class="row text-sm-right">
								<dt class="col-sm-6">Items Price:</dt>
								<dd class="col-sm-6">$<?=$total;?></dd>
							<!--	<dt class="col-sm-6">Tax / Vat:</dt>
								
							
								<dd class="col-sm-6">
								    
								    <?= $place_order[0]['tax']?>
								    
								    </dd>-->
							  <!--  <dd class="col-sm-6"><?= $place_order[0]['tax']?></dd>-->
								<dt class="col-sm-6">Addon Cost:</dt>
								<dd class="col-sm-6">
								<?= $extra_options_total;?>
									<hr>
								</dd>
								<dt class="col-sm-6">Subtotal:</dt>
								<dd class="col-sm-6">
								    
							    $<?=  $sub_total =   $total + $extra_options_total  ;?></dd>
								     
								<dt class="col-sm-6">Coupon Discount:</dt>
								<dd class="col-sm-6"><?= $place_order[0]['coupon_amount']?></dd>
								<dt class="col-sm-6">Delivery Fee:</dt>
								<dd class="col-sm-6">
					           	<?= $place_order[0]['delivery_charge']?>
									<hr>
								</dd>
								<dt class="col-sm-6">Total:</dt>
								<dd class="col-sm-6">$<?=$sub_total - $place_order[0]['coupon_amount'] + $place_order[0]['delivery_charge'];?></dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-header-title">Customer</h4>
				</div>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="avatar avatar-circle mr-3"><img alt="Image Description" class="avatar-img" onerror="this.src='https://efood-admin.6amtech.com/public/assets/admin/img/160x160/img1.jpg'" src="<?php echo base_url('uploads/images/'.$users_details[0]['image']); ?>" style="width: 75px"></div>
						<div class="media-body">
							<span class="text-body text-hover-primary"><?= $users_details[0]['user_name']?></span>
						</div>
						<div class="media-body text-right"></div>
					</div>
					<hr>
					<div class="media align-items-center">
						<div class="icon icon-soft-info icon-circle mr-3">
							<i class="tio-shopping-basket-outlined"></i>
						</div>
						<div class="media-body">
							<span class="text-body text-hover-primary"><?= count($order_count);?> orders</span>
						</div>
						
						<div class="media-body text-right"></div>
					</div>
					<hr>
					<div class="d-flex justify-content-between align-items-center">
						<h5>Contact Info</h5>
					</div>
					<ul class="list-unstyled list-unstyled-py-2">
						<li><i class="tio-online mr-2"></i> <?= $users_details[0]['email']?></li>
						<li><i class="tio-android-phone-vs mr-2"></i> +<?= $users_details[0]['mobile']?></li>
					</ul>
					<hr>
					<div class="d-flex justify-content-between align-items-center">
						<h5>Delivery Address</h5><a class="link" data-target="#shipping-address-modal" data-toggle="modal" href="javascript:"></a>
					</div><span class="d-block"><?= $users_details[0]['user_name']?><br>
					+<?= $place_order[0]['address']?><br>
					Workplace<br>
					<a href="https://maps.google.com/maps?z=12&amp;t=m&amp;q=loc:<?= $place_order[0]['lat']?>+<?= $place_order[0]['lon']?>" target="_blank"><i class="tio-map"></i> Map<br></a></span>
				</div>
			</div>
		</div>
	</div>
                </div>
            </div>
        </div>
    </div>
                    
     <?php include('include/footer.php'); ?>  
     
     
     
<script>
// delete function
function deleteUsers(id,orderid)
{
  swal({
  title: "Are you sure?",
  text: "You want to permanently remove this item!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){



        $.ajax({
          url: "<?=base_url('admin/delete_data1');?>",
          data: {'table': 'add_to_cart', 'id': id,'orderid': orderid}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("Deleted!", "Your selected item has been deleted.", "success");
  
            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

});

} 
// end delete function

</script>
     
<script>
// delete function
function addDeliveryMan(order_id,driver_id)
{
  

  swal({
  title: "Are you sure?",
  text: "You want to assigne driver this order!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, assigned it!",
  closeOnConfirm: false
},
function(){
      $.ajax({
          url: "<?=base_url('admin/updateStatus');?>",
          data: {'driver_id': driver_id,'order_id':order_id}, // change this to send js object
          type: "POST",
          success: function(result){
           swal("assigned!", "Your selected driver has been assigned.", "success");
               $('.confirm').click(function(){
               location.reload();
            });
              }
        });

});

} 
// end delete function

</script>
     
     
       
     
<script>
// delete function
function addpaymentOrderstatus(order_id,payment_status)
{
  




  swal({
  title: "Are you sure?",
  text: "You want to change payment status",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes",
  closeOnConfirm: false
},
function(){



        $.ajax({
          url: "<?=base_url('admin/UpdatePaymentStatus');?>",
          data: {'payment_status': payment_status,'order_id':order_id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("changed!", "Your selected status has been changed.", "success");
  
            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

});

} 
// end delete function

</script>
     
    
     
     
<script>
// delete function
function addOrderstatus(order_id,status)
{


  swal({
  title: "Are you sure?",
  text: "You want to change status",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes",
  closeOnConfirm: false
},
function(){



        $.ajax({
          url: "<?=base_url('admin/addOrderstatus');?>",
          data: {'status': status,'order_id':order_id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("changed!", "Your selected status has been changed.", "success");
  
            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

});

} 
// end delete function

</script>
     
     
     
     
     
     