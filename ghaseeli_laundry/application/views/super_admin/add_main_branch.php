<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<div class="main-content">

    <?php include('include/header_bar.php'); 
 
        
        
      $button = "submit";
      $btn_name = "Add";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('admin',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      
        
       
        
        
  
  ?>
    <div class="header pt-7" style="background-image:  url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg);  background-size: cover; background-position: center center;">
        <span class="mask bg-gradient-dark opacity-7"></span>
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4 pb-7">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Main Branch </h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item text-white"><a href="<?php echo base_url('page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>


                                <li class="breadcrumb-item active text-white" aria-current="page"> Main Branch List </li>
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
                        <span class="h3">Create</span>
                        <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                            <input type="hidden" class="form-control" name="id" value="<?=$row['id'];?>">
                            <div class="my-0">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input id="image" name="image" type='file' value="<?=$row['image'];?>">
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
                                    <label class="form-control-label" for="name_create">Name</label>
                                    <input class="form-control" id="name" name="name" placeholder="First Name" type="text" value="<?=$row['name'];?>" required>

                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="email_create">Email</label>
                                    <input autocomplete="email" class="form-control" id="email" name="email" placeholder="Email Address" type="email" value="<?=$row['email'];?>" required>

                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="phone_create">Phone</label>
                                    <input class="form-control" id="phone_create" name="mobile" placeholder="Mobile Number" type="text" value="<?=$row['mobile'];?>">

                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password</label>
                                    <input class="form-control" id="password" name="password" placeholder="Password" type="password" value='<?=$row[' password '];?>'>

                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="name_create">Address</label>
                                    <input class="form-control" id="address" name="address" placeholder="Address" type="text" value="<?=$row['address'];?>" required>

                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create">Latitude</label>
                                    <input class="form-control" name="lat" placeholder="Latitude" type="text" value="<?=$row['lat'];?>" required>

                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create">Longitude</label>
                                    <input class="form-control" name="lon" placeholder="Longitude" type="text" value="<?=$row['lon'];?>" required>

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
            function readURL(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#' + id)
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
                        $img = "SUBADMIN_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }
            
  
   $arr_data['type'] = 'ADMIN'; 
   $arr_data['admin_no'] = rand(000000,999999); 

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('admin',$arr_data); 
//echo $this->db->last_query(); die;
 $this->admin_common_model->insert_data('VIP_Charge',['branch_id'=>$result,'charge'=>0]); 



$StartTime = "00:00";
$StartTime1 = "00:00";
  $EndTime =   "23:59";
  $Duration="60";
 
    
    
    $ReturnArray = array ();// Define output
    $StartTime    = strtotime ($StartTime); //Get Timestamp
    $EndTime      = strtotime ($EndTime); //Get Timestamp

    $AddMins  = $Duration * 60;
      $AddMins1  = $Duration * 60 + 60;

    while ($StartTime <= $EndTime) //Run loop
    {
        $start= date ("h:i a", $StartTime);
       $end = date('h:i a',strtotime('+1 hour',strtotime($start)));
        
        $StartTime += $AddMins; 
        $StartTime1 += $AddMins1; 
        
          $this->admin_common_model->insert_data('time_slote',['branch_id'=>$result,'open_time'=>$start,'close_time'=>$end,'type'=>'Pickup']); 
         $this->admin_common_model->insert_data('time_slote',['branch_id'=>$result,'open_time'=>$start,'close_time'=>$end,'type'=>'Delivery']); 
    }








             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add Main Branch Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('super_admin/page/main_branch_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Main Branch',
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
                        $img = "SUBADMIN_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }



$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('admin',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update Main Branch Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('super_admin/page/main_branch_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Main Branch',
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

                .close-thik {
                    background: #FFF none repeat scroll 0% 0%;
                    color: #0A0A0A;
                    font: 14px/100% arial, sans-serif;
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

                .dialog input {
                    visibility: hidden;
                    position: absolute;
                }
            </style>