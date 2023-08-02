<?php include('header.php'); ?> 
             
 <?php include('sidebar.php'); ?>        
    <div class="main-content">

  <?php include('header_bar.php'); ?> 

           
                            
    <div class="header pt-7" style="background-image: url(images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Roles</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="dashboard.php"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Roles </li>
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
                        <div class="mb-0 h3">Roles Table</div>
                                                    <a href="create_new.php" class="btn btn-sm btn-primary float-right mt--4"><i class="fa fa-plus mr-1"></i> New</a>
                                            </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="dataTableReport">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort table_num">#</th>
                                    <th scope="col" class="sort table_title">Title</th>
                                    <th scope="col" class="sort">Permission</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                                                                                            <tr>
                                            <th> 1 </th>
                                            <td> Admin </td>
                                            <td>
                                                                                                                                                            <span class="badge badge-success">role_access</span>
                                                                                                            <span class="badge badge-success">role_create</span>
                                                                                                            <span class="badge badge-success">role_edit</span>
                                                                                                            <span class="badge badge-success">role_delete</span>
                                                                                                            <span class="badge badge-success">user_create</span>
                                                                                                            <span class="badge badge-success">user_edit</span>
                                                                                                            <span class="badge badge-success">user_delete</span>
                                                                                                            <span class="badge badge-success">offer_access</span>
                                                                                                            <span class="badge badge-success">offer_create</span>
                                                                                                            <span class="badge badge-success">offer_edit</span>
                                                                                                            <span class="badge badge-success">offer_delete</span>
                                                                                                            <span class="badge badge-success">service_access</span>
                                                                                                            <span class="badge badge-success">service_create</span>
                                                                                                            <span class="badge badge-success">service_edit</span>
                                                                                                            <span class="badge badge-success">service_delete</span>
                                                                                                            <span class="badge badge-success">product_access</span>
                                                                                                            <span class="badge badge-success">product_create</span>
                                                                                                            <span class="badge badge-success">product_edit</span>
                                                                                                            <span class="badge badge-success">product_delete</span>
                                                                                                            <span class="badge badge-success">coupon_access</span>
                                                                                                            <span class="badge badge-success">coupon_create</span>
                                                                                                            <span class="badge badge-success">coupon_delete</span>
                                                                                                            <span class="badge badge-success">order_access</span>
                                                                                                            <span class="badge badge-success">order_create</span>
                                                                                                            <span class="badge badge-success">order_edit</span>
                                                                                                            <span class="badge badge-success">order_delete</span>
                                                                                                            <span class="badge badge-success">setting_access</span>
                                                                                                            <span class="badge badge-success">setting_create</span>
                                                                                                            <span class="badge badge-success">setting_delete</span>
                                                                                                            <span class="badge badge-success">notification_access</span>
                                                                                                            <span class="badge badge-success">notification_create</span>
                                                                                                            <span class="badge badge-success">notification_edit</span>
                                                                                                            <span class="badge badge-success">notification_delete</span>
                                                                                                            <span class="badge badge-success">report_access</span>
                                                                                                            <span class="badge badge-success">coupon_edit</span>
                                                                                                            <span class="badge badge-success">language_access</span>
                                                                                                            <span class="badge badge-success">language_create</span>
                                                                                                            <span class="badge badge-success">language_edit</span>
                                                                                                            <span class="badge badge-success">language_delete</span>
                                                                                                            <span class="badge badge-success">user_access</span>
                                                                                                            <span class="badge badge-success">setting_edit</span>
                                                                                                            <span class="badge badge-success">calendar_access</span>
                                                                                                            <span class="badge badge-success">dashboard</span>
                                                                                                                                                </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_role(1)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 2 </th>
                                            <td> Client </td>
                                            <td>
                                                                                                                                                            <span class="badge badge-success">role_access</span>
                                                                                                                                                </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_role(2)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 3 </th>
                                            <td> Staff </td>
                                            <td>
                                                                                                                                                            <span class="badge badge-success">offer_edit</span>
                                                                                                                                                </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_role(3)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 4 </th>
                                            <td> Manager </td>
                                            <td>
                                                                                                                                                            <span class="badge badge-success">role_access</span>
                                                                                                            <span class="badge badge-success">role_edit</span>
                                                                                                            <span class="badge badge-success">role_delete</span>
                                                                                                            <span class="badge badge-success">user_access</span>
                                                                                                            <span class="badge badge-success">coupon_edit</span>
                                                                                                                                                </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_role(4)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="container-fluid sidebar_open " id="add_role_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <!-- Card header -->
                <div class="border_bottom_primary pb-3 pt-2 mb-4">
                    <span class="h3">Create Role</span>
                    <button type="button" class="add_role close">&times;</button>
                </div>
                <form class="form-horizontal"  id="create_role_form" method="post" enctype="multipart/form-data" action="#">
                    <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                    <div class="my-0">
                        <div class="form-group">
                            <label class="form-control-label" for="title">Role Title</label>
                            <input type="text" value="" name="title" id="title" class="form-control" placeholder="Role Title"  autofocus>
                            <div class="invalid-div "><span class="title"></span></div>
                        </div>
                    
                        
                        <div class="form-group">
                            <label class="form-control-label" for="permission">Select Permissions</label>
                            <select class="form-control select2" dir="" multiple="multiple" name="permission[]"  value=""  data-placeholder='-- Select Permissions --'>
                                                                    <option value=1>dashboard</option>
                                                                    <option value=2>role_access</option>
                                                                    <option value=3>role_create</option>
                                                                    <option value=4>role_edit</option>
                                                                    <option value=5>role_delete</option>
                                                                    <option value=6>user_access</option>
                                                                    <option value=7>user_create</option>
                                                                    <option value=8>user_edit</option>
                                                                    <option value=9>user_delete</option>
                                                                    <option value=10>offer_access</option>
                                                                    <option value=11>offer_create</option>
                                                                    <option value=12>offer_edit</option>
                                                                    <option value=13>offer_delete</option>
                                                                    <option value=14>service_access</option>
                                                                    <option value=15>service_create</option>
                                                                    <option value=16>service_edit</option>
                                                                    <option value=17>service_delete</option>
                                                                    <option value=18>product_access</option>
                                                                    <option value=19>product_create</option>
                                                                    <option value=20>product_edit</option>
                                                                    <option value=21>product_delete</option>
                                                                    <option value=22>coupon_access</option>
                                                                    <option value=23>coupon_create</option>
                                                                    <option value=24>coupon_edit</option>
                                                                    <option value=25>coupon_delete</option>
                                                                    <option value=26>order_access</option>
                                                                    <option value=27>order_create</option>
                                                                    <option value=28>order_edit</option>
                                                                    <option value=29>order_delete</option>
                                                                    <option value=30>setting_access</option>
                                                                    <option value=31>setting_create</option>
                                                                    <option value=32>setting_edit</option>
                                                                    <option value=33>setting_delete</option>
                                                                    <option value=34>notification_access</option>
                                                                    <option value=35>notification_create</option>
                                                                    <option value=36>notification_edit</option>
                                                                    <option value=37>notification_delete</option>
                                                                    <option value=38>report_access</option>
                                                                    <option value=39>language_access</option>
                                                                    <option value=40>language_create</option>
                                                                    <option value=41>language_edit</option>
                                                                    <option value=42>language_delete</option>
                                                                    <option value=43>calendar_access</option>
                                                            </select>
                            <div class="invalid-div "><span class="permission"></span></div>
                        </div>
                        
                        <div class="text-center">
                            <button type="button" id="create_btn" onclick="all_create('create_role_form','role')" class="btn btn-primary mt-4 mb-5">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><div class="container-fluid sidebar_open " id="edit_role_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <!-- Card header -->
                <div class="border_bottom_primary pb-3 pt-2 mb-4">
                    <span class="h3">Edit Role</span>
                    <button type="button" class="edit_role_close close">&times;</button>
                </div>
                <form class="form-horizontal"  id="edit_role_form" method="post" enctype="multipart/form-data" action="#">
                    <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                    <input type="hidden" name="_method" value="put">
                    <div class="my-0">
                        <div class="form-group">
                            <label class="form-control-label" for="title">Role Title</label>
                            <input type="text" value="" name="title" id="title" class="form-control" placeholder="Role Title" readonly>
                            <div class="invalid-div "><span class="title"></span></div>
                        </div>
                    
                        
                        <div class="form-group">
                            <label class="form-control-label" for="permission">Select Permissions</label>
                            <select class="form-control select2" dir="" id="select_multiple" multiple="multiple" name="permission[]" data-placeholder='-- Select Permissions --'>
                                                                    <option value=1>dashboard</option>
                                                                    <option value=2>role_access</option>
                                                                    <option value=3>role_create</option>
                                                                    <option value=4>role_edit</option>
                                                                    <option value=5>role_delete</option>
                                                                    <option value=6>user_access</option>
                                                                    <option value=7>user_create</option>
                                                                    <option value=8>user_edit</option>
                                                                    <option value=9>user_delete</option>
                                                                    <option value=10>offer_access</option>
                                                                    <option value=11>offer_create</option>
                                                                    <option value=12>offer_edit</option>
                                                                    <option value=13>offer_delete</option>
                                                                    <option value=14>service_access</option>
                                                                    <option value=15>service_create</option>
                                                                    <option value=16>service_edit</option>
                                                                    <option value=17>service_delete</option>
                                                                    <option value=18>product_access</option>
                                                                    <option value=19>product_create</option>
                                                                    <option value=20>product_edit</option>
                                                                    <option value=21>product_delete</option>
                                                                    <option value=22>coupon_access</option>
                                                                    <option value=23>coupon_create</option>
                                                                    <option value=24>coupon_edit</option>
                                                                    <option value=25>coupon_delete</option>
                                                                    <option value=26>order_access</option>
                                                                    <option value=27>order_create</option>
                                                                    <option value=28>order_edit</option>
                                                                    <option value=29>order_delete</option>
                                                                    <option value=30>setting_access</option>
                                                                    <option value=31>setting_create</option>
                                                                    <option value=32>setting_edit</option>
                                                                    <option value=33>setting_delete</option>
                                                                    <option value=34>notification_access</option>
                                                                    <option value=35>notification_create</option>
                                                                    <option value=36>notification_edit</option>
                                                                    <option value=37>notification_delete</option>
                                                                    <option value=38>report_access</option>
                                                                    <option value=39>language_access</option>
                                                                    <option value=40>language_create</option>
                                                                    <option value=41>language_edit</option>
                                                                    <option value=42>language_delete</option>
                                                                    <option value=43>calendar_access</option>
                                                            </select>
                            <div class="invalid-div "><span class="permission"></span></div>
                        </div>
                        
                        <input type="hidden" name="id">
                        
                        <div class="text-center">
                            <button type="button" id="edit_btn" onclick="all_edit('edit_role_form','role')" class="btn btn-primary mt-4 mb-5">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>                    
       
   <?php include('footer.php'); ?>     