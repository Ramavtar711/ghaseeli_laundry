   <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="<?php echo base_url('admin/dashboard'); ?>">
            <img src="<?php echo base_url(); ?>assets/admin/images/color_logo.png" class="navbar-brand-img" alt="Admin Logo">
        </a>
        
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="<?php echo base_url(); ?>assets/admin/images/admin_1602487776.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="<?php echo base_url('admin/page/profile'); ?>" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="<?php echo base_url('admin/logout'); ?>" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
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
                            <img src="<?php echo base_url(); ?>assets/admin/images/color_logo.png" class="navbar-brand-img" alt="Logo">
                        </a>
                    </div>
                </div>
            </div>

            
            <ul class="navbar-nav">

                                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/dashboard'); ?>">
                            <i class="ni ni-tv-2 text-teal"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                                
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
                                
                        <!--            <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/user'); ?>">
                            <i class="fas fa-list text-pink"></i>
                            <span class="nav-link-text">Service</span>
                        </a>
                    </li>-->
                                
                       
                                
                                    <li class="nav-item">
                          <a class="nav-link " href="<?php echo base_url('admin/page/coupon'); ?>">
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
                    </li>
                
                    <!--                <li class="nav-item">-->
                    <!--    <a class="nav-link " href="#">-->
                    <!--        <i class="fas fa-language text-green"></i>-->
                    <!--        <span class="nav-link-text">Language</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                               

                                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('admin/page/setting'); ?>">
                            <i class="fa fa-cogs text-purple"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </li>
                                

            </ul>
        </div>
    </div>
</nav>