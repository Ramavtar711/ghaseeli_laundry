<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
   
      $button = "submit";
      $btn_name = "Add Addon";
      $path = base_url("uploads/images/user.png");
      $invoice = $this->uri->segment(4);
     if($invoice!=''){
       $edit_data2 = $this->admin_common_model->get_where('add_to_cart', ['orderid'=>$invoice]);
     }
      ?>  
      
      
  
                              
    <div class="header pt-7" style="background-image:  url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Add Category</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
           <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                  <li class="breadcrumb-item active text-white" aria-current="page">Add Category</li>
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
	<label for="inputEmail3" class="col-sm-2 control-label">Add Color: </label>
  <div class="table-responsive">
  <?php if($invoice==''){ ?>
 <?php $image_row = 0; $image_row_2 = 0; ?>
 <table id="images" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      
                        <td class="text-center">Color</td>
                        <td class="text-center">Color Code</td>
                        <td class="text-center">Image</td>
					            	<td colspan="2"></td>
                    </tr>
                  </thead>
                  <tbody class="tbodyclass1">
                    			 <tr id="image-row<?php echo $image_row; ?>"> 

                             

                            <td class="text-right">

                            <input type="hidden" name="color_id[]" value="">

                            <select class="form-control" name = "color[]">
                     
                     <?php 
                       foreach($color_list as $color){?>
                       <option value = "<?php echo $color['color_name']?>" <?php if($color['color_name'] == $product['color']){echo "selected";}?>><?php echo $color['color_name']?></option>
                  <?php } ?>
                    </select>
                            </td> 
                            <td class="text-right">
                              <input type="color" name="color_code[]" value="" class="form-control" required="">
                            </td> 

                            <td class="text-right">
                              <input type="file" name="image[]" value="" class="form-control" required="">
                            </td>  

                             <td>
                              <table id="images<?php echo $image_row; ?>">

                              

                                <tr><td>Size</td><td>Quantity</td><td>Price</td><td>Price Discount</td><td>Price Calculated</td></tr>
                                <tr id="image-in-row0" >



 


                            <td class="text-right">

                            <select class="form-control" name = "data_<?php echo $image_row; ?>_size[]">

                            <?php 
                            foreach($size_list as $size){?>
                            <option value = "<?php echo $size['size_name']?>" ><?php echo $size['size_name']?></option>
                            <?php } ?>

                           </select>

                            </td>  

                            <td class="text-right">
                              <input type="text" name="data_<?php echo $image_row; ?>_quantity[]" value="" class="form-control" required="">
                            </td>  

                            <td class="text-right">

                              <input type="text" onchange="return myfunctionprice('price_id_0_0','price_discount_id_0_0','price_calculated_id_0_0')"  id="price_id_0_0" name="data_<?php echo $image_row; ?>_price[]" value="" class="form-control" required="">
                              <input type="hidden" name="data_0_color_variation_id[]" value="">
                            </td> 


                            <td class="text-right">
                            <input type="text"  onchange="return myfunctionprice('price_id_0_0','price_discount_id_0_0','price_calculated_id_0_0')" id="price_discount_id_0_0" name="data_<?php echo $image_row; ?>_price_discount[]" value="" class="form-control" required="">
                            </td> 

                            <td class="text-right">
                            <input type="text" style="pointer-events: none;" id="price_calculated_id_0_0" name="data_<?php echo $image_row; ?>_price_calculated[]" value="" class="form-control" required="">
                            </td> 

                            </tr>

                            <tfoot>
                            <tr><td colspan="5"></td><td><input name="row_value[]" type="hidden" value="<?php echo $image_row; ?>" /><button type="button" onclick="addImage2('<?php echo $image_row; ?>','<?php echo $image_row; ?>');" data-toggle="tooltip" title="Add Row" class="btn btn-primary"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fa fa-plus-circle"></i> --></button></td></tr>
                            </tfoot>
                            </table>

                             </td>

                            <td class="text-left" >
                                                  
                                                
                                                
                            </td>
                        </tr>
                      </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4"></td>
                      <td class="text-left">
                        
                      <button type="button" onclick="addImage();" data-toggle="tooltip" title="Add Row" class="btn btn-primary"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fa fa-plus-circle"></i> --></button></td>
                    </tr>
                  </tfoot>
                </table>


              <?php $image_row++; $image_row_2++; ?>
        
   <?php } else {  ?>
<?php 
  $edit_data2 = $this->admin_common_model->get_where('add_to_cart', ['orderid'=>$invoice]);
?>

<?php $image_row = 0; $image_row_2 = 0; ?>


<table id="images" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
         <td class="text-center">Service</td>
          <td class="text-center">Category</td>
          <td class="text-center">Sub category</td>
          <td class="text-center">Quantity</td>
          <td colspan="2"></td>
      </tr>
    </thead>
    <tbody class="tbodyclass1">

              <?php 

              
              foreach($edit_data2 as $product){ ?>
             <tr id="image-row<?php echo $image_row; ?>"> 
             <td class="text-right">
             <input type="hidden" name="id[]" value="<?php echo $product['id']; ?>">
             
              <select class="form-control" name = "category_id[]"  id="vCountry" onchange="setState(this.value,'<?=$product['sub_category_id']?>');">
               <?php $category = $this->admin_common_model->get_all('category');
                      foreach($category as $category_val){?>
                       <option value = "<?php echo $category_val['id']?>" <?php if($category_val['id'] == $product['category_id']){echo "selected";}?>><?php echo $category_val['category_name']?></option>
                  <?php } ?>
                </select>
                
                
                
              </td>
            
         
               
             <td class="text-right">   
                <select class="form-control" name="sub_category_id[]" id="vState" onchange="setCity(this.value,'<?=$product['child_cat_id']?>');">
                <option value="">Select</option> 
                </select>
                  </td>
            <td class="text-right">
          
                <select class="form-control" name="child_cat_id[]" id="vCity">
                    <option value="">Select</option>
                </select>
              </td>
          <td class="text-right">
            <input type="text" name="quantity[]" value="<?php echo $product['quantity']; ?>" class="form-control" required="">
               </td>
               <td>
                <table id="images<?php echo $image_row; ?>">

                
                 
                <tr>
                <td>Name</td>
                <td>Price</td>
                </tr>


                  <?php 
                  //$color_data = $this->admin_common_model->get_where('extra_options_item', ['product_id'=>$product['extra_item_id']]);
                   $extra_item_id = $product['extra_item_id'];
                   $color_data = $this->db->query("SELECT * FROM extra_options_item WHERE  id IN ('$extra_item_id')")->result_array();
                 
                  
                    $jalebi = 0;
                   foreach($color_data as $color_data_in){
                     ?> 
                  <tr id="image-in-row<?php echo $image_row_2; ?>">
               <td class="text-right">
                <input type="text" name="data_<?php echo $image_row; ?>name[]" value="<?php echo $color_data_in['name']; ?>" class="form-control" required="">
              </td>  

             <td class="text-right">
                <input type="text" name="data_<?php echo $image_row; ?>price[]" value="<?php echo $color_data_in['price']; ?>" class="form-control" required="">
              </td>
              
         <?php if($jalebi ==0 ){
                  ?>
                <td class="text-right">
                </td> 

                  <?php

                }else{ ?>

                <td class="text-right" onclick="AAAABB(<?php echo $color_data_in['id']; ?>)">
                <button type="button" onclick="$('#image-in-row<?php echo $image_row_2; ?>').remove();" data-toggle="tooltip" title="" class="btn btn-danger"><svg class="svg-inline--fa fa-minus-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="minus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z"></path></svg><!-- <i class="fa fa-minus-circle"></i> --></button>
                </td> 

                <?php } ?>


              </tr>

              <?php $image_row_2++; $jalebi++; } ?>


              <tfoot>
              <tr><td colspan="5"></td><td><input name="row_value[]" type="hidden" value="<?php echo $image_row; ?>" /><button type="button" onclick="addImage2('<?php echo $image_row; ?>','<?php echo $image_row; ?>');" data-toggle="tooltip" title="Add Row" class="btn btn-primary"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fa fa-plus-circle"></i> --></button></td></tr>
              </tfoot>

              </table>

               </td>


               <?php if($image_row == 0){ ?>

                <td class="text-left" >                  
                </td>

               <?php }else{ ?>

                <td class="text-left" onclick="AAAA(<?php echo $product['id']; ?>)"><button type="button" onclick="$('#image-row<?php echo $image_row; ?>').remove();" data-toggle="tooltip" title="" class="btn btn-danger"><svg class="svg-inline--fa fa-minus-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="minus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z"></path></svg><!-- <i class="fa fa-minus-circle"></i> --></button></td>

               <?php 
               }

              ?>


          </tr>

          <?php 
          
          $image_row++; 
        
                
        } ?>


        </tbody>
    <tfoot>
      <tr>
        <td colspan="4"></td>
        <td class="text-left">
          
        <button type="button" onclick="addImage();" data-toggle="tooltip" title="Add Row" class="btn btn-primary"><svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fa fa-plus-circle"></i> --></button></td>
      </tr>
    </tfoot>
  </table>



<?php 

 }
         ?>

   </div>
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


<script>

function AAAA(id)
{

        $.ajax({
          url: "<?=base_url('admin/delete_color_data');?>",
          data: {'table': 'color', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
           }
        });


} 


</script>

<script>

function AAAABB(id)
{

        $.ajax({
          url: "<?=base_url('admin/delete_color_data_variation');?>",
          data: {'table': 'color_variation', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
           }
        });


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
   
    setState('<?=$product['category_id']?>','<?=$product['sub_category_id']?>');
    
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
   
    setCity('<?=$product['sub_category_id']?>','<?=$product['child_cat_id']?>');
    
  </script>
















<script type="text/javascript"><!--
var image_row = <?php echo $image_row; ?>;

var image_row_2 = <?php echo $image_row_2; ?>;


function addImage() {

  //alert(image_row);

  //price_id_
  //price_discount_id_
  //price_calculated_id_

  


html  = '<tr id="image-row' + image_row + '">';
html += '  <td class="text-right"><input type="hidden" name="id[]" value=""><select class="form-control" name = "category_id[]"  id="vCountry" ><?php foreach($category as $category_val){?><option value = "<?php echo $category_val['category_name']?>"><?php echo $category_val['category_name']?></option><?php } ?></select></td>';
html += '  <td class="text-right"><select class="form-control" name="sub_category_id[]" id="vState"><option value = ""></select></td>';
html += '  <td class="text-right"><select class="form-control" name="child_cat_id[]" id="vCity"><option value = ""></select></td>';
html += '  <td class="text-right"><input type="text" name="quantity[]" value="" class="form-control" required /></td>';
html += '<td><table id="images'+image_row+'">';
html += '<tbody><tr><td>Name</td><td>Price</td></tr>';
html += '<tr id="image-in-row' + image_row_2 + '" ><td class="text-right"><input type="text" id="name' + image_row + '_' + image_row_2 + '" name="data_' + image_row + 'name[]" value="" class="form-control" required=""></td>';
html += '<td class="text-right"><input type="text" id="price' + image_row + '_' + image_row_2 + '" name="data_' + image_row + 'price[]" value="" class="form-control" required=""></td>';
html += '<td class="text-left"   ></td>';

  //html += '<td class="text-left"  onclick="AAAA()" ><button type="button" onclick="$(\'#image-in-row' + image_row  + '\').remove();"  data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
  
  html += '</tr></tbody>';

  html += '<tfoot><tr><td colspan="5"></td><td><input name="row_value[]" type="hidden" value="'+image_row+'" /><button type="button" onclick="addImage2('+image_row+','+image_row+');" data-toggle="tooltip" title="Add Row" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td></tr></tfoot></table><td class="text-left"   ><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();"  data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></td>';

  html += '';
  html += '</tr>';

  $('.tbodyclass1').append(html);

  image_row++;

  image_row_2++;

}

  
  
  

function addImage2(id,io) {
  html  = '<tr id="image-in-row' + image_row_2 + '">';
  html += '  <td class="text-right"><input type="text"  id="name' + io + '_' + image_row_2 + '" name="data_' + io + 'name[]" value="" class="form-control" required=""></td>';
  html += '  <td class="text-right"><input type="text"  id="price' + io + '_' + image_row_2 + '" name="data_' + io + 'price[]" value="" class="form-control" required=""></td>';
  html += '  <td class="text-left"  ><button type="button" onclick="$(\'#image-in-row' + image_row_2  + '\').remove();"  data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
  html += '</tr>';


 

    ids =  'images'+id;

    $('#'+ids+' tbody').append(html);



  image_row_2++;
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





  
  
  
  
  