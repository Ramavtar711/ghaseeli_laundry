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
            <h6 class="h2 text-white d-inline-block mb-0">Services</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="dashboard.php"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Services </li>
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
                        <h3 class="mb-0">Services Table</h3>
                                                  <a href="create_new.php" class="btn btn-sm btn-primary float-right mt--4"><i class="fa fa-plus mr-1"></i> New</a>
                                            </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="dataTableReport">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Image</th>
                                    <th scope="col" class="sort">Name</th>
                                                                            <th scope="col" class="sort">Price / Cloth</th>
                                                                        <th scope="col" class="sort">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                                                                                            <tr>
                                            <th> 1 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1636488526.jpg">
                                                </div>
                                            </td>
                                            <td> Two-piece suite </td>
                                            <td> ₹500 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-danger"></i>
                                                        <span class="status">Inactive</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(10)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(10)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 2 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1628772960.jpg">
                                                </div>
                                            </td>
                                            <td> 561 </td>
                                            <td> ₹77 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(9)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(9)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 3 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1624463525.jpg">
                                                </div>
                                            </td>
                                            <td> on kilo </td>
                                            <td> ₹70 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(8)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(8)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 4 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1602658190.jpg">
                                                </div>
                                            </td>
                                            <td> Reg (2-3 Hari) </td>
                                            <td> ₹50.000 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(7)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(7)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 5 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1600846077.png">
                                                </div>
                                            </td>
                                            <td> Family plan </td>
                                            <td> ₹999 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(5)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(5)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 6 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1622892130.png">
                                                </div>
                                            </td>
                                            <td> Wash &amp; Ironing </td>
                                            <td> ₹40 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(4)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(4)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 7 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1600846032.png">
                                                </div>
                                            </td>
                                            <td> Ironing Clothes </td>
                                            <td> ₹10 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(3)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(3)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 8 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1600845986.png">
                                                </div>
                                            </td>
                                            <td> Wash Cloths </td>
                                            <td> ₹30 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(2)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(2)">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                                                            </td>
                                        </tr>
                                                                            <tr>
                                            <th> 9 </th>
                                            <td>
                                                <div class="avatar imageBox imageBoxService mr-3">
                                                    <img alt="Image placeholder imageBoxImg" src="https://ondemandscripts.com/App-Demo/laundring-52421/public/images/service/Service_1619403930.jpg">
                                                </div>
                                            </td>
                                            <td> Dry Cleaning </td>
                                            <td> ₹50 / Cloth </td>
                                            <td>
                                                                                                    <span class="badge badge-dot mr-4">
                                                        <i class="bg-success"></i>
                                                        <span class="status">Active</span>
                                                    </span>
                                                                                            </td>
                                            <td class="table-actions">
                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-warning bg-white" onclick="show_service(1)">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                                                                                                                    <button class="btn-white btn shadow-none p-0 m-0 table-action text-info bg-white" onclick="edit_service(1)">
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
    <div class="container-fluid sidebar_open " id="add_service_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <!-- Card header -->
                <div class="border_bottom_primary pb-3 pt-2 mb-4">
                    <span class="h3">Create Service</span>
                    <button type="button" class="add_service close">&times;</button>
                </div>
                <form class="form-horizontal"  id="create_service_form" method="post" enctype="multipart/form-data" action="#">
                    <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                    <div class="my-0">
                        
                        <div class="avatar-upload avatar-box">
                            <div class="avatar-edit">
                                <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg" />
                                <label for="image"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-color: #f0f3f6;">
                                </div>
                            </div>
                        </div>
                        <div class="invalid-div text-center mt-3"><span class="image"></span></div>

                        <div class="form-group">
                            <label class="form-control-label" for="name">Name</label>
                            <input type="text" value="" name="name" id="name" class="form-control" placeholder="Service Name" autofocus>
                            <div class="invalid-div "><span class="name"></span></div>
                        </div>
                       
                        <div class="form-group">
                                                            <label class="form-control-label" for="price">Price / Cloth</label>
                                <input type="text" value="" name="price" id="price" class="form-control" placeholder="Price / Cloth">
                                                        <div class="invalid-div "><span class="price"></span></div>
                        </div>
                    
                        <div class="form-group">
                            <label class="form-control-label" for="status">Status</label>
                            <select class="form-control" name="status"  value="">
                                <option value='1' selected>Active</option>
                                <option value='0'>Inactive</option>
                            </select>
                            <div class="invalid-div "><span class="status"></span></div>
                        </div>
                        
                        <div class="text-center">
                            <button type="button" id="create_btn" onclick="all_create('create_service_form','service')" class="btn btn-primary mt-4 mb-5">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    <div class="container-fluid sidebar_open " id="show_service_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <!-- Card header -->
                <div class="border_bottom_primary pb-3 pt-2 mb-4">
                    <span class="h3">View Service</span>
                    <button type="button" class="show_service_close close">&times;</button>
                </div>
                
                <div class="card card-profile shadow">
                    <div class="card-body p-2">
                        <div class="text-center">
                            
                            <img src="" class="my-3 service_img">
                            <div id="service_name" class="mb-3"></div>
                            <div> Price : <span id="price1"></span></div>
                            <div class="mt-3">Status : <span id="service_status"></span></div>
                                                            <div class="text-center">
                                    <button type="button" id="edit_btn" onclick="" class="btn edit_service_btn btn-primary mt-4 mb-5">Edit Service</button>
                                </div>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    <div class="container-fluid sidebar_open " id="edit_service_sidebar">
    <div class="row">
        <div class="col">
            <div class="card py-3 border-0">
                <!-- Card header -->
                <div class="border_bottom_primary pb-3 pt-2 mb-4">
                    <span class="h3">Edit Service</span>
                    <button type="button" class="edit_service_close close">&times;</button>
                </div>
                <form class="form-horizontal"  id="edit_service_form" method="post" enctype="multipart/form-data" action="#">
                    <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                    <input type="hidden" name="_method" value="put">
                    <div class="my-0">
                        
                        <div class="avatar-upload avatar-box">
                            <div class="avatar-edit">
                                <input type='file' id="image_edit" name="image_edit" accept=".png, .jpg, .jpeg" />
                                <label for="image_edit"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview_edit" style="background-color: #f0f3f6;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="name">Name</label>
                            <input type="text" value="" name="name" id="name" class="form-control" placeholder="Service Name" autofocus>
                            <div class="invalid-div "><span class="name"></span></div>
                        </div>
                    
                        <div class="form-group">
                            <label class="form-control-label" for="price">Price</label>
                            <input type="text" value="" name="price" id="price" class="form-control" placeholder="Price">
                            <div class="invalid-div "><span class="price"></span></div>
                        </div>
                    
                        <div class="form-group">
                            <label class="form-control-label" for="status">Status</label>
                            <select class="form-control" name="status"  value="">
                                <option value='1' selected>Active</option>
                                <option value='0'>Inactive</option>
                            </select>
                            <div class="invalid-div "><span class="status"></span></div>
                        </div>
                        
                        <input type="hidden" name="id">
                        
                        <div class="text-center">
                            <button type="button" id="edit_btn" onclick="all_edit('edit_service_form','service')" class="btn btn-primary mt-4 mb-5">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>                    
      <?php include('footer.php'); ?>  