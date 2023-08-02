<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  
         
  
          $order_id = $this->uri->segment(4);
         if($order_id!=''){
           $place_order = $this->db->query("SELECT * FROM place_order WHERE id ='$order_id' ORDER BY id DESC")->result_array(); 
          }
          
        
          
          
            $users_details = $this->admin_common_model->get_where('users',['id'=>$place_order[0]['user_id']]);
            $driver_details = $this->admin_common_model->get_where('users',['id'=>$place_order[0]['driver_id']]);
            $order_count = $this->admin_common_model->get_where('place_order',['user_id'=>$place_order[0]['user_id']]);
            $product_details = $this->admin_common_model->get_where('product',['id'=>$row['product_id']]);
    ?> 
           
                            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h4 class="h2 text-white d-inline-block mb-0">Invoice</h4>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page">Invoice </li>
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
                        <h3 class="mb-0">Invoice  <a class="btn btn-primary addbtn float-right p-2 px-3"  target="_blank" href="#" id="print_invoice" onClick="window.print()">Print</a></h3>
                       
                    </div>
                    
                    <div class="row" id="printableArea">
		<div class="col-lg-12 mb-3 mb-lg-0">
			<div class="w-50 card mb-3 mb-lg-5">
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
                                   
                                   
                                  
                                   
                                   
                                   
                                   
                                $product=    $this->admin_common_model->get_where('product',['id'=>$cart_val['product_id']]); 
                                
                               $total +=     $cart_val['quantity'] *$product[0]['amount'] ;   
                                       
                                   ?> 
				    
				    
				    
				    
					<div class="media">
						<div class="avatar avatar-xl mr-3"><img alt="Image Description" class="img-fluid"   src="<?php echo base_url('uploads/images/'.$product[0]['image']); ?>"></div>
						<div class="media-body">
						    
							<div class="row">
								<div class="col-md-6 mb-3 mb-md-0">
									<strong><?= $product[0]['name']?></strong><br>
										<div class="font-size-sm text-body">
										<span>price :</span> <span class="font-weight-bold"><?= $product[0]['amount']?></span>
									</div>
									<strong><u>Addons :</u></strong>
									<div class="font-size-sm text-body">
									    
									    <?php 
									       
									         $extra_item_id    = $cart_val['extra_item_id'];
									         
									       if($extra_item_id){   
									         
                                     $where = "id  IN($extra_item_id)";
                                      $extra_options_item =    $this->admin_common_model->get_where('extra_options_item',$where); 
                                      
                                     
                                      $$extra_options_total = 0;
                                     foreach($extra_options_item as $extra_options){
                                             $extra_options_total +=      $extra_options['price'];  
									      
									      
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
									<h4><?= $product[0]['amount']?>L.E</h4>
								</div>
								<div class="col col-md-1 align-self-center">
									<h5><?= $cart_val['quantity']?></h5>
								</div>
								<div class="col col-md-3 align-self-center text-right">
									<h5><?= $cart_val['quantity'] *$product[0]['amount']; ?>L.E</h5>
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
								<dd class="col-sm-6"><?=$total;?>L.E</dd>
								<dt class="col-sm-6">Tax / Vat:</dt>
								<dd class="col-sm-6"><?= $product[0]['tax']?></dd>
							  <!--  <dd class="col-sm-6"><?= $place_order[0]['tax']?></dd>-->
								<dt class="col-sm-6">Addon Cost:</dt>
								<dd class="col-sm-6">
								<?= $extra_options_total;?>
									<hr>
								</dd>
								<dt class="col-sm-6">Subtotal:</dt>
								<dd class="col-sm-6"><?= $sub_total = $total + $product[0]['tax'] + $extra_options_total ;?>L.E</dd>
								<dt class="col-sm-6">Coupon Discount:</dt>
								<dd class="col-sm-6"><?=  $place_order[0]['coupon_amount']?></dd>
								<dt class="col-sm-6">Delivery Fee:</dt>
								<dd class="col-sm-6">
					           	<?= $place_order[0]['delivery_charge']?>
									<hr>
								</dd>
								<dt class="col-sm-6">Total:</dt>
								<dd class="col-sm-6"><?=$sub_total -  $place_order[0]['coupon_amount'] + $place_order[0]['delivery_charge'];?>L.E</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4"></div>
	</div>
                </div>
            </div>
        </div>
    </div>
                    
     <?php include('include/footer.php'); ?>  
     
     
     
     
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
          url: "<?=base_url('admin/UpdatePaymentStatus');?>",
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
     
     
     
     
     
     