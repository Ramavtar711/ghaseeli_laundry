<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php'); ?>  
  
  
  
  <?php


function in_array_r($check, $menu_id, $sub_menu_id,$array) {
    foreach ($array as $item) {

        if($check=='menu_id'){
          
           if($item['menu_id']==$menu_id){
              return true;
           }
 
        }

        if($check=='sub_menu_id'){
          
           if($item['menu_id']==$menu_id && $item['sub_menu_id']==$sub_menu_id){
              return true;
           }

        }    

    }

    return false;
}



      include 'include/head.php';
      $admin_users = $this->admin_common_model->get_where('admin',"id NOT IN(1)");

      $sidebar_menu = $this->admin_common_model->get_where('sidebar_menu',['status'=>'Active']);
    
      $button = "submit";
      $btn_name = "Add Permission Menu";
      
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('menu_permission',['roll'=>$id]);

        //$row = $fetch[0];
        //$button = "update";
        $btn_name = "Update Permission Menu";        
        
      }
      


 ?>
  
  
  
  
  <style>
.form-group input[type="checkbox"] {
    display: inline-block;
}
</style>
  
  
           
 <style>
     .panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}
 </style>                           
<div class="header pt-7" style="background-image: url(images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Add Permission</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white">
                      <a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a>
                      </li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Add Permission </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="container-fluid mt--6 mb-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
           
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
         

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Select Type</label>
            <div class="col-sm-8">
              <select class="form-control" name="roll"> 
                             <?php foreach($admin_users as $arr){ ?>
                 <option <?php if($id==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['type'];?> </option>
              <?php } ?>
                            </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Select Menu</label>
            <div class="col-sm-8">
               
		    <div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">
             
                <div class="panel">
			<div class="panel-heading" role="tab" id="heading<?=$i;?>">
			  <h4 class="panel-title">
			   <label role="button"><input type="checkbox" id="checkAll" name="all" value="all"> All Permission</label>
			  </h4>
			</div>
                 </div>
                 
                 
                 
            		<?php $i = 1; foreach($sidebar_menu as $arr){

      		$sidebar_sub_menu = $this->admin_common_model->get_where('sidebar_sub_menu',['menu_id'=>$arr['id']]);
                $class = $checked = '';
                if(in_array_r('menu_id', $arr['id'], false, $fetch)==true){
                  $class='in';
                  $checked = 'checked';
                }
		?>     
                 

		
		  <div class="panel">
			<div class="panel-heading" role="tab" id="heading<?=$i;?>">
			 <h4 class="panel-title">
			 <label role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?=$i;?>" aria-expanded="true" aria-controls="collapse<?=$i;?>"><input type="checkbox" <?=$checked;?> name="menu_id[]" value="<?=$arr['id'];?>"> <?=$arr['name'];?></label>
			 </h4>
			 </div>
			 		    <div id="collapse<?=$i;?>" class="panel-collapse collapse <?=$class;?>" role="tabpanel" aria-labelledby="heading<?=$i;?>">
			 <div class="panel-body" style="padding-left: 40px;">	 
			    			  
			    			        
			    			        
			    		   <?php foreach($sidebar_sub_menu as $arr1){
                              $checked = '';
                              if(in_array_r('sub_menu_id', $arr['id'], $arr1['id'], $fetch)==true){
                                 $checked = 'checked';
                              }
                              ?>	        
			    			        
			    			        
			    			        
			    	  <div class="checkbox">		        
			        <label><input type="checkbox" <?=$checked;?> name="sub_menu_id<?=$i;?>[]" value="<?=$arr1['id'];?>"> <?=$arr1['name'];?></label>
			        </div>
			         <?php } ?>
			    
			     	
			     			 </div>
		    </div>
		    		 </div>
		    		 
			<?php $i++; } ?>    		 
		    		 
		    		 
		 <!-- end of panel -->
			     
		
		  <!--<div class="panel">
			<div class="panel-heading" role="tab" id="heading2">
			 <h4 class="panel-title">
			 <label role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2"><input type="checkbox" name="menu_id[]" value="6"> Car Types</label>
			 </h4>
			 </div>
			 		    <div id="collapse2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading2">
			 <div class="panel-body" style="padding-left: 40px;">	 
			    			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id6[]" value="13"> Statistics</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id6[]" value="14"> Car Type List</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id6[]" value="15"> Add Car Types</label>
			    </div>
			     			 </div>
		    </div>
		    		 </div>-->
		 <!-- end of panel -->
			     
		
	<!--	  <div class="panel">
			<div class="panel-heading" role="tab" id="heading3">
			 <h4 class="panel-title">
			 <label role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3"><input type="checkbox" name="menu_id[]" value="7"> Make And Models</label>
			 </h4>
			 </div>
			 		    <div id="collapse3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading3">
			 <div class="panel-body" style="padding-left: 40px;">	 
			    			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id7[]" value="16"> Makers List</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id7[]" value="17"> Add New Maker</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id7[]" value="18"> Model List</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id7[]" value="19"> Add New Model</label>
			    </div>
			     			 </div>
		    </div>
		    		 </div>-->
		 <!-- end of panel -->
			     
		<!--
		  <div class="panel">
			<div class="panel-heading" role="tab" id="heading4">
			 <h4 class="panel-title">
			 <label role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4"><input type="checkbox" name="menu_id[]" value="8"> Clients</label>
			 </h4>
			 </div>
			 		    <div id="collapse4" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading4">
			 <div class="panel-body" style="padding-left: 40px;">	 
			    			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id8[]" value="20"> Dashboard</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id8[]" value="21"> Clients List</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id8[]" value="22"> Add Clients</label>
			    </div>
			     			 </div>
		    </div>
		    		 </div>-->
		 <!-- end of panel -->
			     
		<!--
		  <div class="panel">
			<div class="panel-heading" role="tab" id="heading5">
			 <h4 class="panel-title">
			 <label role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5"><input type="checkbox" name="menu_id[]" value="31"> Plans</label>
			 </h4>
			 </div>
			 		    <div id="collapse5" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading5">
			 <div class="panel-body" style="padding-left: 40px;">	 
			    			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id31[]" value="64"> plan</label>
			    </div>
			     			    <div class="checkbox">
			        <label><input type="checkbox" name="sub_menu_id31[]" value="65"> add plan</label>
			    </div>
			     			 </div>
		    </div>
		    		 </div>-->
		 <!-- end of panel -->
			     
					   

		</div>
		<!-- end of #accordion -->


            </div>
       	  </div>

 
         


  <div class="form-group">
    <div class=" col-sm-2 col-sm-offset-2">
      <button type="submit" name="<?=$button;?>" class="btn btn-dang-add mr10 btn-primary"><?=$btn_name;?></button>
    </div>
  </div>
</form>
        </div>
      </div>
    </div>
</div>
 </di>
</div>
</div>
  <?php include('include/footer.php'); ?>  
<script>
// getSubMenu function
function getSubMenu(id)
{
        $('.sub_menu_ids').html("<option> Loading ... </option>");
        $.ajax({
          url: "<?=base_url('admin/getSubMenu');?>",
          data: {'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            $('.sub_menu_ids').html(result);
          }
        });
 


} 
// end delete function

</script>

<script>

   function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>


<script>
    
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

</script>


                

  
  
  
  
  
<?php


extract($_REQUEST);
// for add holidays
if(isset($submit)){

 
$arr_data = $this->input->post();    

   

//unset($arr_data['submit'],$arr_data['id']);
$this->admin_common_model->delete_data('menu_permission',['roll'=>$arr_data['roll']]);

foreach ($arr_data['menu_id'] as $val) {
	$arr = [];
	
	if(empty($arr_data['sub_menu_id'.$val])){
	    $arr = ['roll'=>$arr_data['roll'],'menu_id'=>$val];
	    $result = $this->admin_common_model->insert_data('menu_permission',$arr);
	}else{
    	foreach ($arr_data['sub_menu_id'.$val] as $val1) {
    		$arr = [];
    		$arr = ['roll'=>$arr_data['roll'],'menu_id'=>$val,'sub_menu_id'=>$val1];
    		$result = $this->admin_common_model->insert_data('menu_permission',$arr); 
    	}
	}
}



//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Permission Menu Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/permission_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Permission Menu',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}

}// end if submit


// for update restaurant
if(isset($update)){

$arr_data = $this->input->post();


            
$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('menu_permission',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Permission Menu Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/permission_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Permission Menu',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>


  
  
  
  
  
  