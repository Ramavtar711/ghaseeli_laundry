<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
   
      $button = "submit";
      $btn_name = "أضف الملحق";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('extra_options_item',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "تحديث الملحق";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      ?>  
      
      
  
                              
    <div class="header pt-7" style="background-image:  url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">إضافة فئة</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
           <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                  <li class="breadcrumb-item active text-white" aria-current="page">إضافة فئة</li>
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
            <span class="h3"></span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                                
                                        <div class="form-group">
                                     <label for="inputEmail3" class="col-sm-2 control-label">حدد المنتج</label>
                                          <?php $child_category = $this->admin_common_model->get_all('child_category');  ?>
                                            <select name = "product_id" class="form-control" required>
                                            <option value="">--تحديد--</option>
                                            <?php foreach($child_category as $child_category_name){?>
                                            <option <?php if($row['product_id'] == $child_category_name['id']){echo 'selected' ; } ?> value="<?=$child_category_name['id']?>" ><?=$child_category_name['child_cate_name_ar'];?></option>
                                            <?php } ?>
                                            </select>
                                          </div> 
                                          
                                          
                                      <div class="form-group">
                                           <label class="form-control-label" for="name_create">الاسم (انجليزي)</label> 
                                           <input  class="form-control" id="name" name="name" placeholder="الاسم (انجليزي)" type="text" value="<?=$row['name'];?>"required>
                                       </div>
                                           <div class="form-group">
                                           <label class="form-control-label" for="name_create">الاسم (عربي)</label> 
                                           <input  class="form-control" id="name" name="name_ar" placeholder="الاسم (عربي)" type="text" value="<?=$row['name_ar'];?>"required>
                                       </div>
                                
                                   <div class="form-group">
                                           <label class="form-control-label" for="name_create">سعر</label> 
                                           <input  class="form-control" id="sub_cat_name" name="price" placeholder="سعر" type="number" value="<?=$row['price'];?>"required>
                                       </div>
                                
                                
                                
                                
                                
                              
                              <!--  <div class="form-group">
                                    <label class="form-control-label" for="status">Status</label> 
                                    <select class="form-control" name="status">
                                         <option value="Active" <?php if($row['status']=='Active'){ echo "selected";}?> > Active </option>
                                          <option value="Deactive" <?php if($row['status']=='Deactive'){ echo "selected";}?> > Deactive </option>
                                    </select>
                                    
                                </div>-->
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


            $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
            $arr_data['branch_id'] =$admin_id;
           



unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('extra_options_item',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {

echo 
"<script> swal(
  'Success',
  'Add Addon Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/addon_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Addon',
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
$result = $this->admin_common_model->update_data('extra_options_item',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update Addon Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/addon_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Addon',
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





  
  
  
  
  