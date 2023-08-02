<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

    <div class="main-content">
        <?php include('include/header_bar.php');
       
         
         
            $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
            
          $date = date('Y-m-d'); 
         
         if($admin->type=='ADMIN'){
        $productList = $this->admin_common_model->get_where('product',['branch_id'=>$admin_id,'exp_date >='=>$date]);
         }
         
         
         
         
        ?>
                            
<div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Product New</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Product New </li>
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
                        <h3 class="mb-0">Products Table</h3>
                
                        <a href="<?php echo base_url('admin/page/add_product'); ?>" class="btn btn-sm btn-primary float-right mt--4"><i class="fa fa-plus mr-1"></i> New</a> </div>
                     
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="dataTableReport">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Image</th>
                                    <th scope="col" class="sort">Name</th>
                        <!--              <th scope="col" class="sort">Service</th>-->
                                    <th scope="col" class="sort">Category</th>
                                    <th scope="col" class="sort">Sub Category</th>
                                    <th scope="col" class="sort">Amount</th>
                                <!--    <th scope="col" class="sort">Discount</th>-->
                                    <th scope="col" class="sort">Tax</th>
                                       <th scope="col" class="sort">Exp Date</th>
                                    <th scope="col" class="sort">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                
                                        <?php $i=1; foreach($productList as $row){  
                                    $category_id = $row['category_id'];
                                    $sub_category_id = $row['sub_category_id'];
                                    $category = $this->db->query("SELECT * FROM sub_category WHERE id = '$category_id'")->result_array(); 
                                    $sub_category = $this->db->query("SELECT * FROM child_category WHERE id = '$sub_category_id'")->result_array(); 
                                         
                                        ?>
                                            <tr>
                                            <th> <?= $i; ?> </th>
                                            <td>
                                   <div class="avatar imageBox mr-3">
                                          <?php
                                            if ($row['image'] == ''){
                                            $img_url = 'https://ondemandscripts.com/App-Demo/laundring-52421/public/images/product/Product_1632323460.png';
                                            }else{
                                            $img_url = base_url('uploads/images/'.$row['image']);
                                            }
                                            ?>
                                      <img alt="Image placeholder imageBoxImg" src="<?= $img_url ?>">
                                                </div>
                                            </td>
                                            <td> <?= $row['name']; ?> </td>
                                            
                                            
                                          <!--  <td>
                                             <div class="avatar-group">
                                                    
                                     <?php
                                     
                             /*      $service_id= $row['service_id'];
                                   
                                     $service = $this->db->query("SELECT * FROM category WHERE id IN($service_id)")->result_array(); 
                                     foreach($service as $category_val){*/
                                     ?>               
                                                    
                                  <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?//= $category_val['category_name']; ?>">
                                   <img alt="service" class="service_icon" src="<?php //echo base_url('uploads/images/'.$category_val['image']); ?>">
                                        </a>
                                        
                                        <?php //} ?>
                                         
                                             </div>
                                            </td>-->
                                            
                                            
                                            
                                        <td> <?= $category[0]['sub_cat_name']; ?> </td>
                                         <td> <?= $sub_category[0]['child_cate_name']; ?> </td>
                                        <td> <?= $row['amount']; ?> L.E </td>
                                  <!--      <td> <?= $row['discount']; ?> L.E </td>-->
                                        <td> <?= $row['tax']; ?> L.E </td>
                                        <td> <?= $row['exp_date']; ?> </td>
                                        <td><span class="badge badge-dot mr-4"><i class="bg-success"></i> <span class="status"><?= $row['status']; ?></span></td>
                                      <td class="table-actions">
                                          
                                     
                                          
                                  <a class="table-action text-warning" href="<?= base_url('admin/page/add_product/'.$row['id']) ?>">
                                       <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white"><i class="fa fa-edit"></i></button></a>
                                            <button class="btn-white btn shadow-none p-0 m-0 table-action text-danger bg-white" onclick="deleteUsers('<?= $row['id']; ?>')"><i class="fas fa-trash"></i></button>
                                           
                                   </td>
                                      </tr>
                                      
                                      <?php  $i++; } ?>
                                  </tbody>
                        </table>
                    </div>
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
          data: {'table': 'product', 'id': id}, // change this to send js object
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