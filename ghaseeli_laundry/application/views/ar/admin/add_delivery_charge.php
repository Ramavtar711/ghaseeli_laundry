<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 

        
        
        
      $button = "submit";
      $btn_name = "Add";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('delivery_charge',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
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
            <h6 class="h2 text-white d-inline-block mb-0">إضافة رسوم التوصيل</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                 <li class="breadcrumb-item active text-white" aria-current="page">إضافة رسوم التوصيل</li>
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
            <span class="h3">إضافة رسوم التوصيل</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                             
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create"></label> 
                                    <input  class="form-control" id="" name="delivery_charge" placeholder="رسوم التوصيل" type="text" value="<?=$row['delivery_charge'];?>"required>
                                   </div>
                                   
                                      <div class="form-group">
                                    <label class="form-control-label" for="name_create"></label> 
                                    <input  class="form-control" id="" name="location" placeholder="أدخل موقعًا" type="text" value="<?=$row['location'];?>"required>
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



unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('delivery_charge',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add User Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/delivery_charge')."';
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

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);

$result = $this->admin_common_model->update_data('delivery_charge',$arr_data, $arr_where); 

             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update Charge Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/delivery_charge')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Charge',
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





  
  
  
  
  