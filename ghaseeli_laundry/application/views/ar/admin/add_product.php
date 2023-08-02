<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
     //   include('include/header_image.php');
        
        
        
      $button = "submit";
      $btn_name = "Add product";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('product',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update product";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      
        
          $country = $this->admin_common_model->get_all('category'); 
          $state = $this->admin_common_model->get_all('sub_category'); 
        
        
  
  ?>  
                                
    <div class="header pt-7" style="background-image:  url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Add Product</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                 <li class="breadcrumb-item active text-white" aria-current="page">Add Product</li>
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
            <span class="h3">Product</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                               <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input  id="image" name="image" type='file' value="<?=$row['image'];?>" > 
                                        <label for="image"> <img src="<?=$path;?>" alt="" width="50"> </label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-color: #f0f3f6;"></div>
                                    </div>
                                </div>
                            
              
                          <div class="form-group">
                          <label class="form-control-label" for="role">Select Service</label> 
                          <select class="form-control select2"   name="service_id" id="vCountry" onchange="setState(this.value,'<?=$row['category_id']?>');changeCode(this.value);">
                              <option value=''>select service</option>
                              
                        <?php  	$category = $this->admin_common_model->get_all('category');
                                $msds = explode(",", $row['service_id']);
                               foreach ($msds as $value) {  
                               foreach($category as $val){  ?>
                   <option value="<?= $val['id'];  ?>" <?php echo (!empty($value) && $value==$val['id']) ? 'selected="selected"' : ''; ?>>
                               <?= $val['category_name'];  ?>
                              </option>
                              <?php  } } ?>        
                               </select>
                                </div>
                                
                                
                                
                                
                           <div class="form-group">
                <label class="form-control-label" for="name_create">Sub Category Name</label> 
                <select class="form-control" name="category_id" id="vState" onchange="setCity(this.value,'<?=$row['sub_category_id']?>');">
                <option value="">Select</option> 
                </select>
                </div>        
                                
                                
                                
            <!--                  <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
           <div class="col-sm-8">
                <select class="form-control" name="country" id="vCountry" onchange="setState(this.value,'<?=$row[state]?>');changeCode(this.value);" aria-required="true" required>
                    <option value="">Select</option>
                    <?php foreach($country as $val){   ?>
                        <option value="<?= $val['id'];?>" <?php if($val['id']==$row['country']){ echo 'selected';}?>><?= $val['name'];?></option>
                    <?php } ?>  
                </select>
            </div>
       </div>-->
       
              
                       
       
       
      <!--  <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">State</label>
          <div class="col-sm-8">
                <select class="form-control" name="state" id="vState" onchange="setCity(this.value,'<?=$row[city]?>');">
                    <option value="">Select</option> 
                </select>
            </div>
        </div>-->
        
        
                <div class="form-group">
                <label class="form-control-label" for="name_create">Sub Category Name</label> 
                <select class="form-control" name="sub_category_id" id="vCity" >
                <option value="">Select</option> 
                </select>
                </div> 
        
        
      <!-- <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">City</label>
            <div class="col-sm-8">
                <select class="form-control" name="city" id="vCity">
                    <option value="">Select</option>
                </select>
            </div>
        </div>     
                     -->           
                                
                                
                                
                               
                  
                                
                                
                            <div class="form-group">
                     <label class="form-control-label" for="name_create">Product Name</label> 
                       <input  class="form-control" id="name" name="name" placeholder="name" type="text" value="<?=$row['name'];?>"required>
                       </div>    
                       
                       
                       <!-- <div class="form-group">
                                     <label for="inputEmail3" class="col-sm-2 control-label">Select Category</label>
                                          <?php $category = $this->admin_common_model->get_all('sub_category');  ?>
                                            <select name = "category_id" class="form-control" onchange="setSubcate(this.value,'<?=$row[category_id]?>');changeCode(this.value);">
                                            <option value="">--select--</option>
                                            <?php foreach($category as $category_name){?>
                                            <option <?php if($row['category_id'] == $category_name['id']){echo 'selected' ; } ?> value="<?=$category_name['id']?>" ><?=$category_name['sub_cat_name'];?></option>
                                            <?php } ?>
                                            </select>
                                          </div>
                                          
                                          <div class="form-group">
                                           <label class="form-control-label" for="name_create">Sub Category Name</label> 
                                           <select class="form-control" name="sub_category_id" id="sub_category_id">
                                            <option value="">Select</option> 
                                            </select>
                                       </div> 
                       -->
                       
                              
                        <!-- <div class="form-group">
                                     <label for="inputEmail3" class="col-sm-2 control-label">Select Category</label>
                                          <?php $category = $this->admin_common_model->get_all('category');  ?>
                                            <select name = "category_id" class="form-control" onchange="setSubcate(this.value,'<?=$row[category_id]?>');changeCode(this.value);">
                                            <option value="">--select--</option>
                                            <?php foreach($category as $category_name){?>
                                            <option <?php if($row['category_id'] == $category_name['id']){echo 'selected' ; } ?> value="<?=$category_name['id']?>" ><?=$category_name['category_name'];?></option>
                                            <?php } ?>
                                            </select>
                                          </div>
                                          
                                          <div class="form-group">
                                           <label class="form-control-label" for="name_create">Sub Category Name</label> 
                                           <select class="form-control" name="sub_category_id" id="sub_category_id">
                                            <option value="">Select</option> 
                                            </select>
                                       </div>   -->   
                              
                              
                              
                                    
                 <div class="form-group">
                     <label class="form-control-label" for="name_create">Amount</label> 
                       <input  class="form-control" id="name" name="amount" placeholder="Amount" type="number" value="<?=$row['amount'];?>"required>
                       </div>
                       
                       
                       <div class="form-group">
                     <label class="form-control-label" for="name_create">Tax (Amount)</label> 
                       <input  class="form-control" id="name" name="tax" placeholder="Tax" type="number" value="<?=$row['tax'];?>"required>
                       </div>
                       
                       
                           <div class="form-group">
                     <label class="form-control-label" for="name_create">Exp Date</label> 
                       <input  class="form-control" id="name" name="exp_date" placeholder="Exp Date" type="date" value="<?=$row['exp_date'];?>"required>
                       </div>
                     
                       
                       
                       <!--  <div class="form-group">
                     <label class="form-control-label" for="name_create">Discount (Amount)</label> 
                       <input  class="form-control" id="name" name="discount" placeholder="Discount" type="number" value="<?=$row['discount'];?>"required>
                       </div>-->    
                       
                      <!--  <div class="form-group">
                      <label class="form-control-label" for="name_create">Product Description</label> 
                     <textarea  class="form-control"  name="description" required><?=$row['description'];?></textarea>
                     </div>  
                     
                     
                       <div class="form-group">
                     <label class="form-control-label" for="name_create">Delivery Charge</label> 
                       <input  class="form-control" id="name" name="delivery_charge" placeholder="Tax" type="number" value="<?=$row['delivery_charge'];?>"required>
                       </div>-->
                     
                     
                   
                                
                                
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="status">Status</label> 
                                    <select class="form-control" name="status">
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
function changeCode(service_id) {
 
    //  alert(service_id);
      $.ajax({
          type: "POST",
          url: '<?= base_url(); ?>admin/change_code',
          dataType: 'json',
          data: {id: service_id},
          success: function (dataHTML)
          {
              document.getElementById("code").value = dataHTML.id; 
          }
      });
  }
  
  function setState(id,selected)
   {
  
     var request = $.ajax({
          type: "POST",
          url: '<?= base_url(); ?>admin/get_states',
          data: {service_id: id, selected: selected},
          success: function (dataHtml)
          {
             
          
 
              
             $("#vState").html(dataHtml);
             if(selected == ''){
                setCity('',selected);
             }
          }
        }); 
   }
   
    setState('<?=$row['service_id']?>','<?=$row['category_id']?>');
    
    function setCity(id,selected)
    {
        
     
        
        
       var request = $.ajax({
          type: "POST",
          url: '<?= base_url(); ?>admin/get_city',
          data: {sub_category_id: id, selected: selected},
          success: function (dataHtml)
          {
             $("#vCity").html(dataHtml);
         }
     });
   }
   
    setCity('<?=$row['category_id']?>','<?=$row['sub_category_id']?>');
    
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
//  $arr_data['service_id'] = implode(",",$arr_data['service_id']);
  
            $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
            $arr_data['branch_id'] =$admin_id;
           
  
  
   $arr_data['exp_date'] = date('Y-m-d', strtotime($arr_data['exp_date']));
  

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('product',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add product Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/productList')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add product',
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


          

//$arr_data['service_id'] = implode(",",$arr_data['service_id']);
   $arr_data['exp_date'] = date('Y-m-d', strtotime($arr_data['exp_date']));
$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('product',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update product Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/productList')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating product',
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





  
  
  
  
  