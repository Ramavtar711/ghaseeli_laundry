<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); 
 
   $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
      $place_order = $this->admin_common_model->get_where('place_order',['branch_id'=>$admin_id]);
 
 ?>        
    <div class="main-content">

 
     
           
                            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">تقويم</h6>
            
            
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="dashboard"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> تقويم </li>
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
                <div class="card px-4 pb-4">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">اطلب التقويم</h3>
                    </div>
                    <div class="row statusRow text-center ml-1 my-2">
                        <div class="col completedBox p-1 mr-3 rounded"><span>مكتمل</span></div>
                        <div class="col pendingBox p-1 mr-3 rounded"><span>قيد الانتظار</span></div>
                        <div class="col cancelBox p-1 mr-3 rounded"><span>يلغي</span></div>
                    </div>
                    <div class="mt-3">
                        <div id="calendar-Rvf0nnOb"></div>
                        <script>
    $(document).ready(function(){
        $('#calendar-Rvf0nnOb').fullCalendar({
          //  "header":{"left":"prev,next today","center":"title","right":"month,agendaWeek,agendaDay"},
            "header":{"left":"prev,next today","center":"title","right":"month,agendaWeek,agendaDay"},
            "eventLimit":true,
            "events":[
           <?php foreach($place_order as $val){ 
               
               if($val['status']=='Pending'){
                  $color = '#2643e9'; 
               }elseif($val['status']=='Cancel'){
                   $color = '#f80031';
               }elseif($val['status']=='Completed'){
                   $color = '##108c57';
               }
               
               $users = $this->admin_common_model->get_where('users',['id'=>$val['user_id']]);
               
               ?>     
            {
            "id":1,
            "title":"<?=$users[0]['user_name']?>",
            "allDay":false,
            "start":"<?= $val['pickup_date']?>",
            "end":"<?= $val['delivery_date']?>",
            "color":"<?= $color?>",
            "textColor":"#108c57",
            "url":"https://ghaselwmakwa.com/ghaseeli_laundry/admin/page/invoice/<?=$val['id']?>"},
            <?php  } ?>
              ]});
    });
</script>

                    </div>
                </div>
            </div>
        </div>
    </div>
 
<?php include('include/footer.php'); ?> 