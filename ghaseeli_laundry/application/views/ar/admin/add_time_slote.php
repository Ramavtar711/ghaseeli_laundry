<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
      
        
        
        
      $button = "submit";
      $btn_name = "يضيف";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('time_slote',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "تحديث";        
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
            <h6 class="h2 text-white d-inline-block mb-0">فسحة زمنية</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                  <li class="breadcrumb-item active text-white" aria-current="page">فسحة زمنية</li>
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
            <span class="h3">فسحة زمنية</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                             
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create">وقت متاح</label> 
                                    <input  class="form-control" id="open_time" name="open_time" placeholder="وقت متاح" type="text" value="<?=$row['open_time'];?>"required>
                                    
                                </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="name_create">وقت الاغلاق</label> 
                                    <input  autofocus="" class="form-control" id="close_time" name="close_time" placeholder="وقت الاغلاق" type="text" value="<?=$row['close_time'];?>"required>
                                    
                                </div>
                                
                                
                                  <!-- <div class="form-group">
                                    <label class="form-control-label" for="name_create">Duration Time(Minute)</label> 
                                    <input  autofocus="" class="form-control" id="close_time" name="duration_time" placeholder="Duration Time" type="text" value="<?=$row['duration_time'];?>"required>
                                    
                                </div>
                                
                                 <div class="form-group">
                                    <label class="form-control-label" for="status">Status</label> 
                                    <select class="form-control" name="closing_days">
                                        <option value="" > Select Close Day </option>
                                    <option value="Sun" <?php if($row['closing_days']=='Sun'){ echo "selected";}?> > Sun </option>
                                    <option value="Mon" <?php if($row['closing_days']=='Mon'){ echo "selected";}?> > Mon </option>
                                    <option value="Tue" <?php if($row['closing_days']=='Tue'){ echo "selected";}?> > Tue </option>
                                    <option value="Wed" <?php if($row['closing_days']=='Wed'){ echo "selected";}?> > Wed </option>
                                    <option value="Thu" <?php if($row['closing_days']=='Thu'){ echo "selected";}?> > Thu </option>
                                    <option value="Fri" <?php if($row['closing_days']=='Fri'){ echo "selected";}?> > Fri </option>
                                    <option value="Sat" <?php if($row['closing_days']=='Mon'){ echo "selected";}?> > Sat </option>
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

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }
     $arr_data['type'] = 'Pickup'; 
     $admin = $this->session->userdata('admin');
     $admin_id =   $admin->id;
     $arr_data['branch_id'] =$admin_id;
            
 

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('time_slote',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add Time Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/time_slote_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Time',
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
$result = $this->admin_common_model->update_data('time_slote',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update  Time Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/time_slote_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Time',
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





  
  
  
  
  