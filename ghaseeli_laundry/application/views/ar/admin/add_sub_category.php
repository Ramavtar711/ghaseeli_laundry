<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
   
      $button = "submit";
      $btn_name = "أضف منتج";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('child_category',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "تحديث المنتج";        
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
            <h6 class="h2 text-white d-inline-block mb-0">أضف منتج</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                  <li class="breadcrumb-item active text-white" aria-current="page">أضف منتج</li>
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
                          <label class="form-control-label" for="role">اختر الخدمة</label> 
                          <select class="form-control select2"   name="category_id" id="vCountry" onchange="setState(this.value,'<?=$row['sub_category_id']?>');changeCode(this.value);">
                              <option value=''>اختر الخدمة</option>
                              
                        <?php  	$category = $this->admin_common_model->get_all('category');
                                $msds = explode(",", $row['category_id']);
                               foreach ($msds as $value) {  
                               foreach($category as $val){  ?>
                              <option value="<?= $val['id'];  ?>" <?php echo (!empty($value) && $value==$val['id']) ? 'selected="selected"' : ''; ?>><?= $val['category_name_ar'];  ?></option>
                              <?php  } } ?>        
                               </select>
                                </div>
                                
                                
                                
                                
                                        <div class="form-group">
                                        <label class="form-control-label" for="name_create"> اسم التصنيف</label> 
                                        <select class="form-control" name="sub_category_id" id="vState" onchange="setCity(this.value,'<?=$row['sub_category_id']?>');">
                                        <option value="">Select</option> 
                                        </select>
                                        </div>        
                                          <div class="form-group">
                                           <label class="form-control-label" for="name_create">اسم المنتج (انجليزي)</label> 
                                           <input  class="form-control" id="child_cate_name" name="child_cate_name" placeholder="اسم المنتج (انجليزي)" type="text" value="<?=$row['child_cate_name'];?>"required>
                                       </div>
                                        <div class="form-group">
                                           <label class="form-control-label" for="name_create">اسم المنتج (عربي)</label> 
                                           <input  class="form-control" id="child_cate_name" name="child_cate_name_ar" placeholder="اسم المنتج (عربي)" type="text" value="<?=$row['child_cate_name_ar'];?>"required>
                                       </div>
                                        
                                        <div class="form-group">
                                        <label class="form-control-label" for="name_create">مقدار</label> 
                                        <input  class="form-control" id="name" name="amount" placeholder="مقدار" type="number" value="<?=$row['amount'];?>"required>
                                        </div>
                                          <div class="form-group">
                                           <label class="form-control-label" for="name_create">الوقت المطلوب</label> 
                                           <input  class="form-control" id="child_cate_name" name="time_needed" placeholder="الوقت المطلوب" type="text" value="<?=$row['time_needed'];?>"required>
                                       </div>
                                        
                                        <div class="form-group">
                                        <label class="form-control-label" for="name_create">قيمة الضريبة)</label> 
                                        <input  class="form-control" id="name" name="tax" placeholder="قيمة الضريبة)" type="number" value="<?=$row['tax'];?>"required>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                        <label class="form-control-label" for="name_create">تاريخ انتهاء الصلاحية</label> 
                                        <input  class="form-control" id="name" name="exp_date" placeholder="تاريخ انتهاء الصلاحية" type="date" value="<?=$row['exp_date'];?>"required>
                                        </div>

                                
                                
                                        <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">أضف الملحق: </label>
              
              <div class="table-responsive">
                <table id="images" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      
                        <td class="text-center">اسم (انجليزي)</td>
                           <td class="text-center">الاسم (عربي)</td>
                        <td class="text-center">سعر</td>
					
						<td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $image_row = 0; ?>
					  <?php
                      $edit_data2 = $this->admin_common_model->get_where('extra_options_item', ['product_id'=>$row['id']]);
              
                    
                    if($edit_data2) { ?>
                    <?php foreach ($edit_data2 as $product) {
                   //  $color_image = IMAGE_URL.("uploads/images/".$product['image']);
                    
                    ?>
                    <tr id="image-row<?php echo $image_row; ?>">
						<input type="hidden" name="addon_id[]" value="<?php echo $product['id']; ?>">
				
                     <td class="text-right"><input type="text" name="name[]" value="<?php echo $product['name']; ?>" class="form-control" required/></td>
                     <td class="text-right"><input type="text" name="name_ar[]" value="<?php echo $product['name_ar']; ?>" class="form-control" required/></td>
					 <td class="text-right"><input type="text" name="price[]" value="<?php echo $product['price']; ?>" class="form-control" required /></td>
				
					 <td class="text-left">   <button type="button" onclick="$('#image-row<?php echo $image_row; ?>').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                    </tr>
                    <?php $image_row++; ?>
                    <?php } ?>
					   <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5"></td>
                      <td class="text-left"><button type="button" onclick="addImage();" data-toggle="tooltip" title="Add Row" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>
      
                                
                                
                                
                                
                                
                                
                        
                                          
                                     <!--    <div class="form-group">
                                     <label for="inputEmail3" class="col-sm-2 control-label">Select Service</label>
                                          <?php $category = $this->admin_common_model->get_all('category');  ?>
                                            <select name = "category_id" class="form-control">
                                            <option value="">--select--</option>
                                            <?php foreach($category as $category_name){?>
                                            <option <?php if($row['category_id'] == $category_name['id']){echo 'selected' ; } ?> value="<?=$category_name['id']?>" ><?=$category_name['category_name'];?></option>
                                            <?php } ?>
                                            </select>
                                          </div>
                                               
                                          
                                          
                                          <div class="form-group">
                                     <label for="inputEmail3" class="col-sm-2 control-label">Select Category</label>
                                          <?php $category11 = $this->admin_common_model->get_all('sub_category');  ?>
                                            <select name = "sub_category_id" class="form-control" >
                                            <option value="">--select--</option>
                                            <?php foreach($category11 as $sub_category){?>
                                            <option <?php if($row['sub_category_id'] == $sub_category['id']){echo 'selected' ; } ?> value="<?=$sub_category['id']?>" ><?=$sub_category['sub_cat_name'];?></option>
                                            <?php } ?>
                                            </select>
                                          </div>
                                          
                                          -->
                                          
                                          
                                         <!-- -->
                                 
                                  
                                       
                                       <!-- <div class="form-group">
                                           <label class="form-control-label" for="name_create">Amount</label> 
                                           <input  class="form-control" id="child_cate_name" name="amount" placeholder="Amount" type="text" value="<?=$row['amount'];?>"required>
                                       </div>
                                       -->
                                       
                                
                             <!--     <div class="form-group">
                                           <label class="form-control-label" for="name_create">Price</label> 
                                           <input  class="form-control"  name="price" placeholder="Price" type="number" value="<?=$row['price'];?>"required>
                                       </div>-->
                                
                                <!-- <div class="form-group">
                                    <label class="form-control-label" for="status">Status</label> 
                                    <select class="form-control" name="status">
                                         <option value="ENABLE" <?php if($row['status']=='ENABLE'){ echo "selected";}?> > ENABLE </option>
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
   html += '  <td class="text-right"><input type="text" name="name_ar[]" value="" class="form-control" required /></td>';
  html += '  <td class="text-right"><input type="text" name="price[]" value="" class="form-control" required /></td>';
  html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
  html += '</tr>';

  $('#images tbody').append(html);

  image_row++;
}
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
          url: '<?= base_url(); ?>admin/get_states_ar',
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
          url: '<?= base_url(); ?>admin/get_city_ar',
          data: {sub_category_id: id, selected: selected},
          success: function (dataHtml)
          {
             $("#vCity").html(dataHtml);
         }
     });
   }
   
    setCity('<?=$row['category_id']?>','<?=$row['sub_category_id']?>');
    
  </script>






<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();
            
            $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
         
            $arr_data['branch_id'] =$admin_id;
            
            
            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }
               $arr_data['exp_date'] = date('Y-m-d', strtotime($arr_data['exp_date']));
            
           

unset($arr_data['submit'],$arr_data['id'],$arr_data['name'],$arr_data['name_ar'],$arr_data['price'],$arr_data['addon_id']);
$result = $this->admin_common_model->insert_data('child_category',$arr_data); 
//echo $this->db->last_query(); die;


 $arr_data12 = [
            'name'=>$this->input->get_post('name'),
         'name_ar'=>$this->input->get_post('name_ar'),
            'price'=>$this->input->get_post('price'),
            ];
      
           $i=0;
   			$count = count($arr_data12['name']);
            for ($i=0; $i <$count; $i++) {
      
              
              
			$arr_time = array(
				'product_id' => $result,
				'name' => $arr_data12['name'][$i], 
			    'name_ar' => $arr_data12['name_ar'][$i],
				'price' => $arr_data12['price'][$i], 
			    'branch_id' => $admin_id,
			);
              
            	$color = $this->admin_common_model->insert_data('extra_options_item', $arr_time);
       	}
			
$i++;



             
        
if ($result) {

echo 
"<script> swal(
  'Success',
  'Add Product Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/sub_category_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Product',
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

  if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }
               $arr_data['exp_date'] = date('Y-m-d', strtotime($arr_data['exp_date']));
        


$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update'],$arr_data['name'],$arr_data['name_ar'],$arr_data['price'],$arr_data['addon_id']);
$result = $this->admin_common_model->update_data('child_category',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
           $addon_id =  $this->input->get_post('addon_id');
         
 $arr_data12 = [
           'name'=>$this->input->get_post('name'),
            'name_ar'=>$this->input->get_post('name_ar'),
            'price'=>$this->input->get_post('price'),
           'product_id'=>$this->input->get_post('id'),
        ];

 $i=0;
             $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;


   		$count = count($arr_data12['name']);
         for ($i=0; $i <$count; $i++) {
          $arr_time = array(
				  'name' => $arr_data12['name'][$i], 
				  'name_ar' => $arr_data12['name_ar'][$i],
				  'price' => $arr_data12['price'][$i], 
				  'product_id' => $arr_data12['product_id'], 
				  'branch_id' => $admin_id,
                );
                
                $colordata =  $this->admin_common_model->get_where('extra_options_item', ['id'=>$addon_id[$i]]);
                 if($colordata){
               $idsd = $this->admin_common_model->update_data('extra_options_item', $arr_time,['id'=>$addon_id[$i]]);
           
			  }else{
			          $idsd =  $this->admin_common_model->insert_data('extra_options_item',$arr_time);
			  }
          
			}
			
				$i++;
  

    
             
             
             
             
             
             
             
             
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update Product Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/sub_category_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Product',
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





  
  
  
  
  