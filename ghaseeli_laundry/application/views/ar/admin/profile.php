<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

    <div class="main-content">
        <?php include('include/header_bar.php');
         $admin_id = $admin->id;
         $admin = $this->admin_common_model->get_where('admin',['id'=>$admin_id]);
        ?>
        
  <style>
      #error_validation{color: red;}
  </style>      
        
            <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">تعديل الملف الشخصي</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?= base_url('admin/dashboard');  ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> تعديل الملف الشخصي </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>
        

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="<?= base_url('uploads/images/'.$admin[0]['image']);?>" class="rounded-circle salon_round">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                              <!--  <div>
                                    <span class="heading"><?//=$this->db->get('users')->num_rows();?></span>
                                    <span class="description">Users</span>
                                </div>
                                <div>
                                    <span class="heading">8</span>
                                    <span class="description">Services</span>
                                </div>
                                <div>
                                    <span class="heading">9</span>
                                    <span class="description">Products</span>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            مسؤل<span class="font-weight-light"></span>   
                        </h3>
                        <div>
                               هاتف : +<?= $admin[0]['mobile']?><br>
                            البريد الإلكتروني : <?= $admin[0]['email']?>
                        </div>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="ml-3">تعديل الملف الشخصي</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo base_url('admin/update_profile_ar') ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" value="<?= $admin[0]['id'];?>">
                        <h6 class="heading-small text-muted mb-4">معلومات المشرف</h6>

                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="image">تغيير صورة الملف الشخصي</label><br>
                            </div>
                             
                            <div class="avatar-upload avatar-box">
                                <div class="avatar-edit">
                                    <input type='file' id="image" name="image" />
                                    <label for="image"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(<?php echo base_url('uploads/images/'.$admin[0]['image']) ?>);">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="name">اسم</label>
                                <input type="text"  value="<?= $admin[0]['name'];?>" class="form-control" name="name" id="name" placeholder="اسم">
                                <spam id ='error_validation'><?php echo form_error('name'); ?></spam>
                                  </div>

                            <div class="form-group">
                                <label class="form-control-label" for="email">البريد الإلكتروني</label>
                                <input type="text"  value="<?= $admin[0]['email'];?>" class="form-control" name="email" id="email" placeholder="البريد الإلكتروني" >
                                 <spam id ='error_validation'><?php echo form_error('email'); ?></spam>
                                   </div>
                                   
                             <div class="form-group">
                                <label class="form-control-label" for="password">كلمة المرور</label>
                                <input type="password"  value="<?= $admin[0]['password'];?>" class="form-control" name="password" id="password" placeholder="كلمة المرور" >
                                 <spam id ='error_validation'><?php echo form_error('password'); ?></spam>
                                   </div>  
                                       <div class="form-group">
                                <label class="form-control-label" for="confirm_password">تأكيد كلمة المرور</label>
                                <input type="password"  value="<?= $admin[0]['password'];?>" class="form-control" name="confirm_password" id="confirm_password" placeholder="تأكيد كلمة المرور" >
                                 <spam id ='error_validation'><?php echo form_error('confirm_password'); ?></spam>
                                   </div> 
                                   

                                  
    
                            
                            <div class="form-group">
                                <label for="phone" class="form-control-label">رقم الهاتف</label>
                                <input type="phone" class="form-control" value="<?= $admin[0]['mobile'];?>" name="mobile" id="mobile" placeholder="رقم الهاتف">
                                  <spam id ='error_validation'><?php echo form_error('mobile'); ?></spam>
                              </div>

                            <div class="text-center">
                                <button  type="submit" class="btn btn-primary mt-4">يحفظ</button>
                            </div>
                        </div>
                    </form>
                    
                    
                   <!-- <hr class="my-4" />
                    <form class="form-horizontal" action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/profile/changepassword/1" enctype="multipart/form-data" method="post">
                        
                        <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">      
                        <input id="userName" type="hidden" name="username" autocomplete="username" value="">
                        <h6 class="heading-small text-muted mb-4">Password</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="current_password">Current Password</label>
                                <input type="password" class="form-control" name="current_password" id="current_password" autocomplete="current-password" placeholder="Current Password">
                                                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="new_password">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" autocomplete="new-password" placeholder="New Password">
                                                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="confirm_password">Confirm New Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" autocomplete="new-password" placeholder="Confirm New Password">
                                                            </div>

                            <div class="text-center">
                                <button type="button" onclick="demo()" class="btn btn-primary mt-4">Change password</button>
                            </div>
                        </div>
                    </form>-->
                </div>
            </div>
        </div>
    </div>
    
</div>
                    
     <?php include('include/footer.php'); ?>  
