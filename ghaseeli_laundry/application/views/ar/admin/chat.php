<?php include('include/header.php'); ?> 
             
 <?php include('include/sidebar.php'); ?>        
    <div class="main-content">

  <?php include('include/header_bar.php');
  
           $admin = $this->session->userdata('admin');
           $admin_id =   $admin->admin_no;  
  

            $id = $this->uri->segment(4);
  
  
  ?> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">            
    <div class="header pt-7" style="background-image: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">دردشة</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                 <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> دردشة </li>
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
                        
                        <h3 class="mb-0">دردشة</h3>
                     </div>
                    
                           <div class="messaging">
        <div class="inbox_msg">
       
        <div class="mesgs">
          <div class="msg_history" >
                    <div id="resulll"></div>
              
          
           <!-- <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://www.pepperhub.in/wp-content/uploads/2020/11/user-male.png"></div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>-->
           <!-- <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
            </div>-->
          <!--  <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://www.pepperhub.in/wp-content/uploads/2020/11/user-male.png"></div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <span class="time_date"> 11:01 AM    |    Today</span></div>
              </div>
            </div>-->
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
                   <input type="hidden"  class="form-control" name="sender_id" id="sender_id" value="<?=$admin_id;?>">
                 <input type="hidden"  class="form-control" name="receiver_id" id="receiver_id" value="<?php echo $id ?>">
              <input type="text" class="write_msg" placeholder="Type a message"  name="chat_message" id="chat_message"/>
              <button type="submit" name="submit" class="msg_send_btn" type="button" onclick="send_msg()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
      
   
      
    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    

    
<script type="text/javascript">
  function send_msg(){
     var sender_id = $("#sender_id").val();
     var receiver_id = $("#receiver_id").val();
     var chat_message = $("#chat_message").val();
    //alert(receiver_id);
     $.ajax({
      url: "<?=base_url('admin/chat_insert');?>",
              data: {'sender_id': sender_id,'receiver_id': receiver_id,'chat_message':chat_message}, // change this to send js object
              type: "POST",
              success: function(result){
             $('#chat_message').val("");
            $('html, body,div').animate({
		     	scrollTop: $('.msg_history').prop("scrollHeight")
				}, 1000);
				
			
				
				
		
    
              }
            });

}
</script> 
 
<script>
   var sender_id = "<?php echo $admin_id; ?>";
  //alert(sender_id);
   var receiver_id ="<?php echo $id; ?>";
    $(document).ready(function(){

      $(this).ready(function(){
        showcart(sender_id,receiver_id);
      });
  
  });

  function showcart($sender_id,$receiver_id){
  //    alert(sender_id);
  //  alert(receiver_id);
     $.ajax({
      url: "<?=base_url('admin/get_new');?>",
              data: {'sender_id': sender_id,'receiver_id': receiver_id}, // change this to send js object
              type: "POST",
              success: function(result){
              //  alert(result);
               // $("select[name='subcategory_id']").html(result);
                jQuery("#resulll").html(result); 
                
              }
            });

}
   t = setInterval(showcart,1000);   

</script>   

                    
     <?php include('include/footer.php'); ?>  