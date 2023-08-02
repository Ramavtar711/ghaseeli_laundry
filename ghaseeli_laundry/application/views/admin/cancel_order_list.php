<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  
    
           $branch = $this->session->userdata('branch');
         $branch_id =   $branch->id;
         $place_order = $this->db->query("SELECT * FROM place_order WHERE branch_id = $branch_id AND status ='Cancel' ORDER BY id DESC")->result_array();
      
      
           
  ?>
           
                            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0"> Confirmed Orders</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="dashboard.php"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page">Confirmed Orders </li>
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
                        <h3 class="mb-0">Orders table</h3>
                        
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="dataTableReport">
                            <thead class="thead-light">
                                <tr>
                                     <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Order ID</th>
                                    <th scope="col" class="sort">Branch</th>
                                    <th scope="col" class="sort">Customer</th>
                                    <th scope="col" class="sort">Date Time</th>
                                    <th scope="col" class="sort">Payment Type</th>
                                    <th scope="col" class="sort">Payment</th>
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
                                        <!--  <td>
                                            <select class="form-control" name="driver_id" getid="<?=$row['id']?>" >
                                           <?php foreach($driver_list as $users_val){ ?>     
                                             <option value="">Select Driver</option>   
                                            <option value="<?= $users_val['id']?>" <?php   if($row['driver_id']==$users_val['id']){ echo 'selected'; }?>><?= $users_val['user_name']?></option>
                                         <?php  } ?>
                                            </select>
                                            </td>-->
                                            
                                            
                                            
                                             <td class="table-actions">
                                                 <a href="<?php echo base_url('admin/page/invoice/'.$row['id']) ?>" class="text-blue cursor table-action"><i class="fas fa-file-invoice"></i></a>
                                             </td>
                                          </tr>
                                    <?php $i++; } ?>
                                    
                                           </div>
                                         </div>
                                       </div>
                                    </div>
    
    
<script>

	$('select').change(function () {   
		//for open loader gif
		$(document).on({
			ajaxStart: function() { $("#preloader").show(); $("#status").show(); },
			ajaxStop: function() { $("#preloader").hide(); $("#status").hide(); }    
		});

		var getId = $(this).attr('getId');
		var driver_id = $(this).val();
		
	//	alert('getId='+getId+' driver_id='+driver_id);
	 	$.post("<?=base_url().'admin/updateStatusAssgine';?>", { driver_id: driver_id, id: getId }, function(data){
	 	    alert('Status update successfully');
	 	});

	});  
	
	
	  $(function () {
        $("#ddlFruits").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
            alert("Selected Text: " + selectedText + " Value: " + selectedValue);
        });
    });
</script>
	




<script>
// delete function
function deleteUsers(id)
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
          url: "<?=base_url('admin/delete_data');?>",
          data: {'table': 'users', 'id': id}, // change this to send js object
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
    
    
    
   <?php include('include/footer.php'); ?>  