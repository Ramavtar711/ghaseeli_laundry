<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
        include('include/header_image.php');
        
        
        
      $button = "submit";
      $btn_name = "Add coupon";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('coupon_codes',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update coupon";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      
        
        
        
        
  
  ?>  
  


<div class="container-fluid mt--6 mb-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <span class="h3">Create</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                              
                            
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create">Coupon code</label> 
                  <input  class="form-control" id="coupon_code" name="coupon_code" placeholder="coupon code" type="text" value="<?=$row['coupon_code'];?>"required>
                                    
                                </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="name_create">Amount</label> 
                  <input  autofocus="" class="form-control" id="amount" name="amount" placeholder="Amount" type="text" value="<?=$row['amount'];?>"required>
                                    
                                </div>
                                
                                
                                
                                <div class="form-group">
                 <label class="form-control-label" for="email_create">Valid From</label> 
        <input autocomplete="text" class="form-control" name="valid_from" placeholder="Valid From" type="date" value="<?=$row['valid_from'];?>"required>
                                   
                                </div>
                              
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_create">Valid To</label>   
                        <input class="form-control" id="phone_create" name="valid_to" placeholder="Valid To " type="date" value="<?=$row['valid_to'];?>">
                                   
                                </div>
                                
                               
                                
                                   
                                <div class="form-group">
                                    <label class="form-control-label" for="role">Discount Type</label>
                                    <select class="form-control select2" data-placeholder='-- Select role --' dir=""  name="type">
                                       <option value="Active" <?php if($row['type']=='AMOUNT'){ echo "selected";}?> > Amount </option>
                                          <option value="Deactive" <?php if($row['type']=='PERCENT'){ echo "selected";}?> > Percent </option>
                                    </select>
                                   
                                </div>
                                
                                
                                
                                
                                
                                
                                  <div class="form-group">
                                    <label class="form-control-label" for="phone_create">Description</label>   
                            <textarea class="form-control" id="phone_create" name="description"><?=$row['description'];?></textarea>
                                   
                                </div>
                                
                                
                                
                                
                                
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="role">Select Role</label> <select class="form-control select2" data-placeholder='-- Select role --' dir=""  name="roles">
                                           <option value="Active" <?php if($row['status']=='Active'){ echo "selected";}?> > Active </option>
                                           <option value="Deactive" <?php if($row['status']=='Deactive'){ echo "selected";}?> > Deactive </option>
                                    </select>
                                   
                                </div>
                              
                                <div class="text-center">
                                    <button class="btn btn-primary mt-4 mb-5" type="submit" name="<?=$button;?>"><?=$btn_name;?></button>
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

    

 </body>
</html>



<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }
           $arr_data['status'] = 'Active'; 
 
            $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
         
         
            $arr_data['branch_id'] =$admin_id;
          
 
 
 

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('coupon_codes',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add Coupon Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/coupon')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Coupon',
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
$result = $this->admin_common_model->update_data('coupon_codes',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update Coupon Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/coupon')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating User',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

  <style>
     .dialog {
    padding-right: 18px;
    float: left;
    position: relative;
}
.close-thik{
   background: #FFF none repeat scroll 0% 0%;
color: #0A0A0A;
font: 14px/100% arial,sans-serif;
position: absolute;
right: 20px;
text-decoration: none;
text-shadow: 0px 1px 0px #FFF;
top: 5px; 
}
.dialog label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.upload_file {
    width: 120px;
    height: 100px;
    border: 1px solid #0070BC;
}
.dialog input{
        visibility: hidden;
    position: absolute;

}

     </style>





  
  
  
  
  