<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

    <div class="main-content">
        <?php include('include/header_bar.php');
         
            $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
            
           
         
         if($admin->type=='ADMIN'){
           $extra_options_item = $this->admin_common_model->get_where('extra_options_item',['branch_id'=>$admin_id]); 
      
         }
        ?>
        
        
        
        
                                  
    <div class="header pt-7" style="background-image:  url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">قائمة الملحق</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page">قائمة الملحق </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div> 
        
        
        
        
        
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">الجدول الإضافي</h3>
                           
                            <a href="<?php echo base_url('admin/page/add_addon'); ?>" class="btn btn-sm btn-primary float-right mt--4"><i class="fa fa-plus mr-1"></i> جديد</a>
                          
                        </div><!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="dataTableReport">
                                <thead class="thead-light">
                                    <tr>
                                    <th class="sort" scope="col">اسم المنتج</th>
                                    <th class="sort" scope="col">الاسم (انجليزي)</th>
                                         <th class="sort" scope="col">الاسم (عربي)</th>
                                    <th class="sort" scope="col">سعر</th>
                                    <th class="sort" scope="col">تاريخ الوقت</th>
                                    <th class="sort" scope="col">عمل</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    
                                          <?php $i=2; foreach($extra_options_item as $row){  
                                          
                                              $extra_options_item = $this->admin_common_model->get_where('child_category',['id'=>$row['product_id']]); 
                                          
                                          ?>
                                    
                                    <tr>
                                      
                                        <!--    <td>
                                            <div class="avatar imageBox mr-3">
                                            <?php
                                          //  if ($row['image'] == ''){
                                          //  $img_url = base_url('uploads/images/user.png');
                                          //  }else{
                                         //   $img_url = base_url('uploads/images/'.$row['image']);
                                         //   }
                                            ?>
                                            <img src="<?=$img_url;?>" alt="" width="50"> 
                                            
                                            </td>-->
                                     <td><p><?= $extra_options_item[0]['child_cate_name_ar']; ?></p></td>
                                        <td><p><?= $row['name']; ?></p></td>  
                                        <td><p><?= $row['name_ar']; ?></p></td> 
                                        <td><p><?= $row['price']; ?></p></td>   
                                        <td><p><?= $row['date_time']; ?></p></td>
                                        
                                        
                                      
                                       <!-- <td><span class="badge badge-dot mr-4"><i class="bg-success"></i> <span class="status"><?= $row['status']; ?></span></span></td>-->
                                        <td class="table-actions">
                                     <!--     <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white">  <i class="fas fa-eye"></i></button>-->
                                
                                            <a class="table-action text-warning" href="<?= base_url('admin/page/add_addon/'.$row['id']) ?>">
                                       <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white"><i class="fa fa-edit"></i></button></a>
                                            <button class="btn-white btn shadow-none p-0 m-0 table-action text-danger bg-white" onclick="deleteUsers('<?= $row['id']; ?>')"><i class="fas fa-trash"></i></button>
                                          
                                        </td>
                                    </tr>
                                   <?php  } ?>
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <?php include('include/footer.php'); ?>

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
          data: {'table': 'extra_options_item', 'id': id}, // change this to send js object
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