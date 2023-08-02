<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
        include('include/header_image.php');
        
        
        
      $button = "submit";
      $btn_name = "إضافة مستخدم";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "تحديث المستخدم";        
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
            <span class="h3">إضافة مستخدم</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input  id="image" name="image" type='file' value="<?=$row['image'];?>" > 
                                        <label for="image"></label>
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
                                    <label class="form-control-label" for="email_create">البريد الإلكتروني</label>
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

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('users',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add User Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/user')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add User',
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



$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('users',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update User Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/user')."';
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





  
  
  
  
  