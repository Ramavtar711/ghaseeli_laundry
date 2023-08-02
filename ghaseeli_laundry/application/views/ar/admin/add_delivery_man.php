<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
     
          $admin = $this->session->userdata('admin');
          $admin_id =   $admin->id;  
        
        
      $button = "submit";
      $btn_name = "إضافة رجل التسليم";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "تحديث رجل التسليم";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
          if($row['licence']!=''){
          $path1 = base_url("uploads/images/".$row['licence']);
        }
        
      }
      
        
        
        
        
  
  ?>  
      <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0"> رجل التوصيل</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="dashboard.php"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page">رجل التوصيل </li>
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
            <span class="h3">رجل التوصيل</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input  id="image" name="image" type='file' value="<?=$row['image'];?>" > 
                                       <label for="image"> <img src="<?=$path;?>" alt="" width="70"> </label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-color: #f0f3f6;"></div>
                                    </div>
                                </div>
                                <div class="invalid-div text-center mt-3">
                                    <span class="image"></span>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create">الاسم الاول</label> 
                                    <input  class="form-control" id="first_name" name="first_name" placeholder="الاسم الاول" type="text" value="<?=$row['first_name'];?>"required>
                                    
                                </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="name_create">الكنية</label> 
                                    <input  autofocus="" class="form-control" id="last_name" name="last_name" placeholder="الكنية" type="text" value="<?=$row['last_name'];?>"required>
                                    
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="email_create">عنوان البريد الالكترونى</label>
                                    <input autocomplete="email" class="form-control" id="email" name="email" placeholder="عنوان البريد الالكترونى" type="email" value="<?=$row['email'];?>"required>
                                   
                                </div>
                          
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_create">رقم الهاتف المحمول</label> 
                                    <input class="form-control" id="phone_create" name="mobile" placeholder="رقم الهاتف المحمول" type="text" value="<?=$row['mobile'];?>">
                                   
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">كلمة المرور</label> 
                                    <input  class="form-control" id="password" name="password" placeholder="كلمة المرور" type="password" value='<?=$row['password'];?>'>
                                    
                                </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="password">تاريخ إنتهاء الصلاحية</label> 
                                  
                                        <input autocomplete="text" class="form-control" name="expiration_date" placeholder="تاريخ إنتهاء الصلاحية" type="date" value="<?=$row['expiration_date'];?>"required>
                                    
                                </div>
                                
                                  <div class="form-group">
                                    <label class="form-control-label" for="password">الهوية الوطنية</label> 
                                    <input  class="form-control" id="national_id" name="national_id" placeholder="الهوية الوطنية" type="text" value='<?=$row['national_id'];?>'>
                                    
                                </div>
                                
                                  <div class="form-group">
                                    <label class="form-control-label" for="password">رقم الرخصة</label> 
                                    <input  class="form-control" id="license_number" name="license_number" placeholder="رقم الرخصة" type="text" value='<?=$row['license_number'];?>'>
                                    
                                </div>
                                
                                 
                                
                         <!--          <div class="form-group">
                                     <label for="inputEmail3" class="col-sm-2 control-label">Select Branch</label>
                                          <?php $sub_branch = $this->admin_common_model->get_where('admin',['sub_admin_id'=>$admin_id]);  ?>
                                            <select name = "sub_branch_id" class="form-control">
                                            <option value="All">All</option>
                                            <?php foreach($sub_branch as $sub_branch_val){?>
                                            <option <?php if($row['sub_branch_id'] == $sub_branch_val['id']){echo 'selected' ; } ?> value="<?=$sub_branch_val['id']?>" ><?=$sub_branch_val['name'];?></option>
                                            <?php } ?>
                                            </select>
                                          </div>
                                          -->
                                
                             <!--   <div class="form-group">
                                    <label class="form-control-label" for="role">Select Role</label> <select class="form-control select2" data-placeholder='-- Select role --' dir="" multiple="multiple" name="roles[]">
                                        <option value="1">
                                            Admin
                                        </option>
                                        <option value="2">
                                            Client
                                        </option>
                                        <option value="3">
                                            Staff
                                        </option>
                                        <option value="4">
                                            Manager
                                        </option>
                                    </select>
                                    <div class="invalid-div">
                                        <span class="roles"></span>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="form-control-label" for="status">حالة</label> 
                                    <select class="form-control" name="status">
                                         <option value="Active" <?php if($row['status']=='Active'){ echo "selected";}?> > نشيط </option>
                                          <option value="Deactive" <?php if($row['status']=='Deactive'){ echo "selected";}?> > معطل </option>
                                    </select>
                                    
                                </div>
                                
                                
                                
                                 
                                  <div class="form-group">
                                    <label class="form-control-label" for="password">صورة الترخيص</label> 
                                    <input  class="form-control" name="licence"  type="file" value='<?=$row['licence'];?>'>
                                 
                                </div>
                                 <div class="form-group">
                                     <label for="image"> <img src="<?=$path1;?>" alt="" style="height: 114px;
    width: 226px;"> </label>
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
              if($_FILES['licence']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "licence_" . $n . '.png';
                        move_uploaded_file($_FILES['licence']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['licence'] = $img; 

            }
            
            
 $arr_data['status'] = 'Active'; 
  $arr_data['branch_id'] = $admin_id; 
  $arr_data['type'] = 'DRIVER'; 
 
   $arr_data['user_name'] = $arr_data['first_name'] . ' '.$arr_data['last_name'];

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('users',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add Delivery Man Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/delivery_man_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Delivery Man',
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


            $user_image = $row['image'];
            if($_FILES['image']['name']!=''){
    
                        unlink("uploads/images/" . $rest_image);
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

    if($_FILES['licence']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "licence_" . $n . '.png';
                        move_uploaded_file($_FILES['licence']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['licence'] = $img; 

            }
  $arr_data['user_name'] = $arr_data['first_name'] . ' '.$arr_data['last_name'];
$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('users',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update Delivery Man Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/delivery_man_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Delivery Man',
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





  
  
  
  
  