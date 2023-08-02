<?php

  if(!$this->session->userdata('admin')){
    redirect('admin');
  }
    $admin = $this->session->userdata('admin');

?>

<style>
    .noti{
     position: absolute;
     padding: 3px;
     background-color: red;
     top: 17px;
     border-radius: 50%;
     width: 25px;
     height: 23px;
     right: 17px;
     color: #fff;
     font-size: 12px;
     text-align: center;
    }
</style>
   <nav class="navbar navbar-top navbar-expand navbar-dark">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
        </ul>
               <ul class="navbar-nav align-items-center  ml-auto ml-md-0 flag-ul mt-3">
                   
                <!--    <div id='google_translate_element'></div> -->         
        <li class="nav-item dropdown rtl-flag">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm">
                <img class="small_round flag" src="<?php echo base_url(); ?>assets/admin/images/English.jpg">
              </span>
            </div>
          </a>
          <!--<div class="dropdown-menu  dropdown-menu-right dropdown-menu-flag ">-->
          <!--  <div class="dropdown-header noti-title">-->
          <!--    <h6 class="text-overflow m-0">Language</h6>-->
          <!--  </div>-->
          <!--                  <a href="language/English" class="dropdown-item">-->
          <!--      <span class="avatar avatar-sm">-->
          <!--        <img class="small_round flag" src="images/English.jpg">-->
          <!--      </span>-->
          <!--      <span>English</span>-->
          <!--    </a>-->
          <!--                  <a href="language/Arabic" class="dropdown-item">-->
          <!--      <span class="avatar avatar-sm">-->
          <!--        <img class="small_round flag" src="images/Arabic.png">-->
          <!--      </span>-->
          <!--      <span>Arabic</span>-->
          <!--    </a>-->
          <!--              </div>-->
        </li>
      </ul>

        <ul class="navbar-nav align-items-center ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle rtl-avatar">
                  <img class="small_round" src="<?php echo base_url(); ?>assets/admin/images/admin_1602487776.jpg">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">   <?php echo $admin->name; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
                <a href="<?php echo base_url('admin/page/profile'); ?>" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
              
              <div class="dropdown-divider"></div>
                  <a href="<?php echo base_url('admin'); ?>" class="dropdown-item">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                  </a>
            </div>
          </li>
     <!--     <li class="ml-2">
              <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i></a>
              <span class="noti">3</span>
               <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Your subscription date is 22/12/2022</h6>
              </div>
               
                
            </div>
          </li>-->
          
              <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter ordercount">0+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Orders
                                </h6>
                                
                                 <span class="notification"></span>
                                
                               <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>-->
                             
                                
                               <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>-->
                            </div>
                        </li>
          
        </ul>
      </div>
    </div>
  </nav>
  
   
<script>
$(document).ready(function(){
 
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:'<?php echo base_url()."admin/userAlerts"?>',
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    console.log(data);
  
    if(data.unseen_notification>0)
    {
     $('.ordercount').html(data.unseen_notification);
     $('.notification').html(data.notification);
         var bell_notification = data.bell_notification;
      
           if(bell_notification == 0){
             play();
           }
           
         
  
  
           
    }
   }
  });
 }
 
 load_unseen_notification();
 

 $(document).on('click', '.dropdown-toggle', function(){
  $('.ordercount').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification(); 
 }, 1000);
 





 
});

 
</script> 
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
        function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'en,ar'}, 'google_translate_element');
  }
        </script>