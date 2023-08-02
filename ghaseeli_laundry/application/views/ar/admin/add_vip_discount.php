<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
      $button = "submit";
      $btn_name = "يضيف";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('vip_discount',['id'=>$id]);
        $row = $fetch[0];
        $button = "تحديث";
        $btn_name = "Update";        
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
            <h6 class="h2 text-white d-inline-block mb-0">أضف خصم VIP</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                 <li class="breadcrumb-item active text-white" aria-current="page">أضف خصم VIP</li>
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
            <span class="h3">إضافة رسوم VIP</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                             
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create"></label> 
                                    <input  class="form-control" id="" name="مقدار" placeholder="نسبة مئوية" type="text" value="<?=$row['amount'];?>"required>
                               </div>
                               
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create"></label> 
                                    <input  class="form-control" id="" name="coupon_code" placeholder="رمز الكوبون" type="text" value="<?=$row['coupon_code'];?>"required>
                               </div>
                               
                               
                                <div class="form-group">
                          <label class="form-control-label" for="role">اختر المستخدم</label> 
                          <select class="form-control select2"   name="user_id[]" id="vCountry" multiple >
                              <option value=''>اختر المستخدم</option>
                              
                        <?php  	$category = $this->admin_common_model->get_all('users');
                                $msds = explode(",", $row['user_id']);
                               foreach ($msds as $value) {  
                               foreach($category as $val){  ?>
                   <option value="<?= $val['id'];  ?>" <?php echo (!empty($value) && $value==$val['id']) ? 'selected="selected"' : ''; ?>>
                               <?= $val['user_name'];  ?>
                              </option>
                              <?php  } } ?>        
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

        /*    if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }
 $arr_data['status'] = 'Active'; */
 
  $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
            $arr_data['branch_id'] =$admin_id;
               $arr_data['user_id'] = implode(",", $arr_data['user_id']);

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('vip_discount',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add vip discount Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/vip_discount')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add vip discount',
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
   $arr_data['user_id'] = implode(",", $arr_data['user_id']);
$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);


$result = $this->admin_common_model->update_data('vip_discount',$arr_data, $arr_where); 

             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update vip discount Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/vip_discount')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating vip discount',
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





  
  
  
  
  