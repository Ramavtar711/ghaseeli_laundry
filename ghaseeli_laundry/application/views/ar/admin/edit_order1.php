<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
     //   include('include/header_image.php');
        
        
        
      $button = "submit";
      $btn_name = "Add";
      $path = base_url("uploads/images/user.png");
      $orderid = $this->uri->segment(4);
      $id = $this->uri->segment(5);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('add_to_cart',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update";        
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
            <h6 class="h2 text-white d-inline-block mb-0">تغيير تفاصيل الطلب</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                 <li class="breadcrumb-item active text-white" aria-current="page">تغيير تفاصيل الطلب</li>
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
            <span class="h3">تغيير تفاصيل الطلب</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                      <div class="my-0">
                          <div class="form-group">
                          <label class="form-control-label" for="role">حدد الخدمة</label> 
                          <select class="form-control select2"   name="category_id" id="vCountry" onchange="setState(this.value,'<?=$row['category_id']?>');changeCode(this.value);">
                              <option value=''>اختر الخدمة</option>
                         <?php 
                     	$category = $this->admin_common_model->get_all('category');
                    
                    foreach($category as $val){   ?>
                        <option value="<?= $val['id'];?>" <?php if($val['id']==$row['category_id']){ echo 'selected';}?>><?= $val['category_name'];?></option>
                    <?php } ?>        
                               </select>
                                </div>
                                
                                       
                            
                            
              <!--
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
                                -->
                                
                                
                                
                           <div class="form-group">
                <label class="form-control-label" for="name_create">اسم الفئة الفرعية</label> 
                <select class="form-control" name="sub_category_id" id="vState" onchange="setCity(this.value,'<?=$row['sub_category_id']?>');">
                <option value="">يختار</option> 
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
                <label class="form-control-label" for="name_create">اسم الفئة الفرعية</label> 
                <select class="form-control" name="child_cat_id" id="vCity" >
                <option value="">Select</option> 
                </select>
                </div> 
        
                <div class="form-group">
                <label class="form-control-label" for="name_create">كمية</label> 
                <input  class="form-control" id="name" name="quantity" placeholder="Amount" type="text" value="<?=$row['quantity'];?>"required>
                </div>
                
                
                
                <div class="form-group">
                          <label class="form-control-label" for="role">حدد عنصر إضافي</label> 
                          <select class="form-control select2"   name="extra_item_id[]"  multiple >
                              <option value=''>حدد البند</option>
                              
                        <?php  	$extra_options_item = $this->admin_common_model->get_all('extra_options_item');
                                $msds = explode(",", $row['extra_item_id']);
                               foreach ($msds as $value) {  
                               foreach($extra_options_item as $val){  ?>
                               <option value="<?= $val['id'];  ?>" <?php echo (!empty($value) && $value==$val['id']) ? 'selected="selected"' : ''; ?>>
                               <?= $val['name'];  ?>
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
	 $("#insert-more").click(function () {
     $("#mytable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});

</script>

<script type="text/javascript"><!--
var image_row = <?php echo $image_row; ?>;

function addImage() {
  html  = '<tr id="image-row' + image_row + '">';
    html += '  <td class="text-right"><input type="text" name="name[]" value="" class="form-control" required /></td>';
 html += '  <td class="text-right"><input type="text" name="price[]" value="" class="form-control" required /></td>';
  html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
  html += '</tr>';

  $('#images tbody').append(html);

  image_row++;
}
</script>
 
	
  
  
  
<script>

  
  function setState(id,selected)
   {
     var request = $.ajax({
          type: "POST",
          url: '<?= base_url(); ?>admin/get_states',
          data: {category_id: id, selected: selected},
          success: function (dataHtml)
          {
             $("#vState").html(dataHtml);
             if(selected == ''){
                setCity('',selected);
             }
          }
        }); 
   }
   
    setState('<?=$row['category_id']?>','<?=$row['sub_category_id']?>');
    
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
   
    setCity('<?=$row['sub_category_id']?>','<?=$row['child_cat_id']?>');
    
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
$place_order = $this->admin_common_model->get_where('place_order',['id'=>$orderid]); 
$arr_data['user_id'] = $place_order[0]['user_id'];
$arr_data['date'] =date('Y-m-d');
$arr_data['time'] =date('H:i:s');
 $admin = $this->session->userdata('admin');
 $admin_id =   $admin->id; 
 $arr_data['branch_id'] =$admin_id;
 $arr_data['extra_item_id'] = implode(",",$arr_data['extra_item_id']);
  unset($arr_data['submit'],$arr_data['id']);
 $result = $this->admin_common_model->insert_data('add_to_cart',$arr_data); 
//echo $this->db->last_query(); die;

        $ids = $place_order[0]['cart_id'];
        $ids = $ids.','.$result; 
        $this->admin_common_model->update_data('place_order',['cart_id'=>$ids], ['id'=>$orderid]);
          
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add order Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/order_details/'.$orderid)."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add order details',
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

$place_order = $this->admin_common_model->get_where('place_order',['id'=>$orderid]); 
$arr_data['user_id'] = $place_order[0]['user_id'];

          

 $arr_data['extra_item_id'] = implode(",",$arr_data['extra_item_id']);
  
$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('add_to_cart',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update order details Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/order_details/'.$id)."';
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




<script>
// delete function
function deleteUsers(id)
{
  swal({
  title: "Are you sure?",
  text: "You want to permanently remove this item!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){



        $.ajax({
          url: "<?=base_url('admin/delete_data');?>",
          data: {'table': 'users', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("Deleted!", "Your selected item has been deleted.", "success");
  
            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

});

} 
// end delete function

</script>









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





  
  
  
  
  