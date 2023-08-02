

<?php      $admin = $this->session->userdata('admin'); ?>

 <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="<?php echo base_url('admin/dashboard'); ?>">
            <img src="<?php echo base_url(); ?>ar_assets/admin/images/ar_logo.png" class="" alt="Admin Logo" style="
    width: 75%;
    max-height: 100%;
">
        </a>
        
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="<?php echo base_url(); ?>ar_assets/admin/images/admin_1602487776.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!<?php echo $admin->name;  ?></h6>
                    </div>
                    <a href="<?php echo base_url('admin/page/profile'); ?>" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo base_url('admin/logout'); ?>" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout </span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a class="navbar-brand pt-0" href="<?php echo base_url('admin/dashboard'); ?>">
                            <img src="<?php echo base_url(); ?>ar_assets/admin/images/ar_logo.png" class="navbar-brand-img" alt="Logo">
                        </a>
                    </div>
                </div>
            </div>

            
            <ul class="navbar-nav">



   <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/dashboard'); ?>">
                            <i class="ni ni-tv-2 text-teal"></i>
                            <span class="nav-link-text">لوحة القيادة</span>
                        </a>
                    </li>
                    
                    
                    
                   
                         <li class="nav-item">
                        <a class="nav-link " href="#navbar-examples" data-toggle="collapse"  aria-expanded=" " role="button" aria-controls="navbar-examples">
                            <i class="fa fa-file text-red"></i>
                            <span class="nav-link-text">ترتيب</span>
                        </a>

                        <div class="collapse  " id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=All'); ?>">الجميع</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=Pending'); ?>">قيد الانتظار</a>
                                </li>
                                 <li class="nav-item">
                                 <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=Confirmed'); ?>">مؤكد</a>
                                </li>
                                 <li class="nav-item">
                                 <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=Pickup'); ?>">يلتقط</a>
                                </li>
                                 <li class="nav-item">
                                 <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=Progress'); ?>">تقدم</a>
                                </li>
                                 <li class="nav-item">
                                 <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=Shipped'); ?>">شحنها</a>
                                </li>
                                 <li class="nav-item">
                                 <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=Delivered'); ?>">تم التوصيل</a>
                                </li>
                                 <li class="nav-item">
                                 <a class="nav-link " href="<?php echo base_url('admin/display_rides?act=Cancel'); ?>">يلغي</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    
                    
                    
                    
                    
                    
                    	<?php 
						    
						    $sidebar_menu = $this->admin_common_model->get_where('sidebar_menu',"status = 'Active' ORDER BY id ASC"); 
						    $roll = $admin->type;
						    $roll_id = $admin->id;
						    $i = 1; 
						    foreach($sidebar_menu as $menu){
						        $pages = explode(",",$menu['pages']); 
						        $for_roll = $this->db->query("SELECT * FROM menu_permission WHERE menu_id = '".$menu['id']."' AND roll = '$roll_id'")->result_array();
						   
						        if($for_roll || $admin->type == 'ADMIN'){
						?>
                   
                 <li class="nav-item">
                        <a class="nav-link " href="#navbar-examples<?= $i?>" data-toggle="collapse"  aria-expanded=" " role="button" aria-controls="navbar-examples">
                            <?=$menu['favicon']?>
                            <span class="nav-link-text"><?=$menu['name_ar']?></span>
                        </a>

                   	<?php 
    						    $sub_menu = $this->admin_common_model->get_where('sidebar_sub_menu',['menu_id'=>$menu['id'], 'status' => 'Active']); 
    						    if($sub_menu){
    						?>


                        <div class="collapse  " id="navbar-examples<?= $i?>">
                            <ul class="nav nav-sm flex-column">
                                
                                  <?php foreach($sub_menu as $smenu){  
							      //      $for_roll = $this->db->query("SELECT * FROM menu_permission WHERE menu_id = '".$smenu['menu_id']."' AND sub_menu_id = '".$smenu['id']."'  AND roll = '$roll'")->result_array();
      $for_roll = $this->db->query("SELECT * FROM menu_permission WHERE menu_id = '".$smenu['menu_id']."' AND  roll = '$roll_id'")->result_array();
                       
                         if($for_roll ||  $admin->type == 'ADMIN'){
                                        $pages1 = explode(",",$smenu['pages']); 
							    ?>
                                
                                <li class="nav-item">
                                    <a class="nav-link " href="<?php echo base_url('admin/page/'); ?><?=$smenu['link']?>"><?=$smenu['name_ar']?></a>
                                </li>
                              	<?php } }  ?>
                            </ul>
                        </div>
                         	<?php }   ?>
                        
                    </li>
                      	<?php }  $i++; }?>  
                    
                    
                    
                      
                    
                       
                    
                    
                    
                    
						
						
                          
						
						<!-- <li>
							<a href="<?=$menu['link']?>" class="<?php if(in_array($page,$pages)){echo 'active'; }?>"> <?=$menu['favicon']?> <?=$menu['name']?> <span class="up_down_arrow">&nbsp;</span>
							</a>
							
							
							<?php 
    						   // $sub_menu = $this->admin_common_model->get_where('sidebar_sub_menu',['menu_id'=>$menu['id'], 'status' => 'Active']); 
    						   // if($sub_menu){
    						?>
							<ul class="acitem" style="<?php// if(in_array($page,$pages)){echo 'overflow:hidden;display: block;'; }else{echo 'overflow:hidden;display: none;'; }?>">
							    <?php// foreach($sub_menu as $smenu){  
							         //   $for_roll = $this->db->query("SELECT * FROM menu_permission WHERE menu_id = '".$smenu['menu_id']."' AND sub_menu_id = '".$smenu['id']."'  AND roll = '$roll'")->result_array();
     
                        
                                   // if($for_roll ||  $admin->id == 'ADMIN'){
                                    //    $pages1 = explode(",",$smenu['pages']); 
							    ?>
								<li>
									<a href="<?=$smenu['link']?>" class="<?php if($page==$smenu['pages'] || $ac_type==$smenu['pages']){echo 'active'; }?>"> <span class="list-icon">&nbsp;</span><?=$smenu['name']?></a>
								</li>
								<?php //} }  ?>
							</ul>
							<?php //}   ?>
						</li> 
						<?php  // } } 	?>
                    
                    
                    -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                <!--    
                                
                 <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/user'); ?>">
                            <i class="fa fa-user-secret text-green"></i>
                            <span class="nav-link-text">Roles</span>
                        </a>
                    </li>
                                
                                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/user'); ?>">
                            <i class="fa fa-users text-red"></i>
                            <span class="nav-link-text">User</span>
                        </a>
                    </li>
                    
                     <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/serviceList'); ?>">
                            <i class="fa fa-gift text-yellow"></i>
                            <span class="nav-link-text">Service List</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/categoryList'); ?>">
                            <i class="fa fa-gift text-pink"></i>
                            <span class="nav-link-text">Category List</span>
                        </a>
                    </li>
                    
                     <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/sub_category_list'); ?>">
                            <i class="fa fa-gift text-pink"></i>
                            <span class="nav-link-text">Sub Category List</span>
                        </a>
                    </li>
                    
                                 <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/productList'); ?>">
                            <i class="fas fa-tshirt text-purple"></i>
                            <span class="nav-link-text">Product</span>
                        </a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/offerLIst'); ?>">
                            <i class="fa fa-gift text-yellow"></i>
                            <span class="nav-link-text">Offer</span>
                        </a>
                    </li>
                                
                      
                                
                       
                                
                                    <li class="nav-item">
                          <a class="nav-link " href="#">
                            <i class="fas fa-tag text-cyan"></i>
                            <span class="nav-link-text">Coupon</span>
                        </a>
                    </li>
                                
                                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/order'); ?>">
                            <i class="fa fa-shopping-cart text-orange"></i>
                            <span class="nav-link-text">Order</span>
                        </a>
                    </li>
                         <li class="nav-item"><a class="nav-link " href="<?php echo base_url('admin/page/calendar'); ?>">
                            <i class="ni ni-calendar-grid-58 text-pink"></i>
                            <span class="nav-link-text">Calendar</span>
                        </a>
                    </li>
                                
                                                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-examples" data-toggle="collapse"  aria-expanded=" " role="button" aria-controls="navbar-examples">
                            <i class="fa fa-bell text-blue"></i>
                            <span class="nav-link-text">Notification</span>
                        </a>

                        <div class="collapse  " id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="#">Template</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#">Send Notification</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                                                
                                    <li class="nav-item">
                        <a class="nav-link " href="#navbar-examples1" data-toggle="collapse"  aria-expanded=" " role="button" aria-controls="navbar-examples">
                            <i class="fa fa-file text-red"></i>
                            <span class="nav-link-text">Report</span>
                        </a>

                        <div class="collapse  " id="navbar-examples1">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="#">Users Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#">Revenue Report</a>
                                </li>
                            </ul>
                        </div>
                    </li>-->
                
                    <!--                <li class="nav-item">-->
                    <!--    <a class="nav-link " href="#">-->
                    <!--        <i class="fas fa-language text-green"></i>-->
                    <!--        <span class="nav-link-text">Language</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                               

                      <!--              <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/setting'); ?>">
                            <i class="fa fa-cogs text-purple"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </li>-->
                                

            </ul>
        </div>
    </div>
</nav>