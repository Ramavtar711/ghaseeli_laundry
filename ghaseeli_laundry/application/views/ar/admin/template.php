<?php include('header.php'); ?> 
             
 <?php include('sidebar.php'); ?>        
    <div class="main-content">

  <?php include('header_bar.php'); ?>            
                            
<div class="header pt-7" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Notification Template</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="dashboard.php"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Notification Template </li>
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
                <span class="h3">Notification Template</span>
            </div>
            <div class="row mt-3">
                <div class="col-3 text-center">
                                                                                                                        
                        <button class="btn btn-primary w-90 mb-4" onclick="template_edit(1)">User Verification</button>
                                                                    
                        <button class="btn btn-primary w-90 mb-4" onclick="template_edit(3)">Order Create</button>
                                                                    
                        <button class="btn btn-primary w-90 mb-4" onclick="template_edit(4)">Order Status</button>
                                    </div>
                <div class="col-7">
                    <form class="form-horizontal form" id="template_form" action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/notification/template/update/1" method="post">
                    <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                        <h4 class="card-title" id="temp_title">User Verification</h4>
                        <div class="form-group">
                            <label class="form-control-label" for="subject">Subject</label>
                            <input type="text" value="User Verification" name="subject" id="subject" class="form-control" placeholder="Subject" autofocus>
                        </div>

                        <label class="form-control-label" for="mail_content">Mail Content</label>
                        <textarea class="textarea_editor form-control"  rows="10" name="mail_content">&lt;div&gt;Dear&amp;nbsp;{{UserName}},&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; Your Verification code is {{OTP}}.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;From {{AdminName}}.&lt;/div&gt;</textarea>

                        <div class="form-group mt-3">
                            <label class="form-control-label" for="msg_content">Message Content</label>
                            <input type="text" value="Dear {{UserName}}, Your Verification code is {{OTP}}. From {{AdminName}}." name="msg_content" id="msg_content" class="form-control" placeholder="Message Content" >
                        </div>

                        
                        <div class="border-top">
                            <div class="card-body text-center">
                                
                                <input type="button" id="edit_btn" class="btn btn-primary" onclick="demo()" value="Submit">
                            </div>
                        </div>
                    </form>            
                </div>
                <div class="col-2">
                    <h4 class="card-title rtl-align-center">Available placeholder</h4>
                    <div class="text-center">
                                                                            <p id="mytextUserName" class="d-none">&#123;&#123;UserName&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextUserName')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;UserName&#125;&#125;</button><br>
                                                    <p id="mytextOTP" class="d-none">&#123;&#123;OTP&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextOTP')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;OTP&#125;&#125;</button><br>
                                                    <p id="mytextAdminName" class="d-none">&#123;&#123;AdminName&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextAdminName')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;AdminName&#125;&#125;</button><br>
                                                    <p id="mytextCreatedDate" class="d-none">&#123;&#123;CreatedDate&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextCreatedDate')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;CreatedDate&#125;&#125;</button><br>
                                                    <p id="mytextPayment" class="d-none">&#123;&#123;Payment&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextPayment')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;Payment&#125;&#125;</button><br>
                                                    <p id="mytextDeliveryDate" class="d-none">&#123;&#123;DeliveryDate&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextDeliveryDate')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;DeliveryDate&#125;&#125;</button><br>
                                                    <p id="mytextOrderId" class="d-none">&#123;&#123;OrderId&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextOrderId')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;OrderId&#125;&#125;</button><br>
                                                    <p id="mytextOrderStatus" class="d-none">&#123;&#123;OrderStatus&#125;&#125;</p>
                            <button class="btn-sm btn btn-primary mt-2 rtl-float-none"  id="TextToCopy" onclick="copy_function('mytextOrderStatus')"  data-toggle="tooltip" data-original-title="Click to Copy">&#123;&#123;OrderStatus&#125;&#125;</button><br>
                                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php include('footer.php'); ?>  