<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
  
  	$admin = $this->session->userdata('admin'); 
  $admin_id = $admin->id;
  
   
      $button = "submit";
      $btn_name = "Add Category";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('sub_category',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Category";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      ?>  
      
      
      
      
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
      
  
                              
    <div class="header pt-7" style="background-image:  url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Add Category</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                  <li class="breadcrumb-item active text-white" aria-current="page">Add Category</li>
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
            <span class="h3"></span>
  
  <div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
              
              
             <?php    $users = $this->admin_common_model->get_all('users'); 
             
             foreach($users as $users_val){
             ?> 
              
              
            <div class="chat_list " onclick="showcart('<?=$admin_id;?>','<?php echo $users_val['id']?>')">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5><?= $users_val['user_name']?> <span class="chat_date"><?= $users_val['date_time']?></span></h5>
                  <p><?= $users_val['mobile']?></p>
                </div>
              </div>
            </div>
            
            <?php  } ?>
            
       <!--     <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
          -->
        
          </div>
        </div>
        <div class="mesgs">
            
              <div class="msg_history">
            
            
              <div id="resulll"></div>
              
              </div>
              
        <!--  <div class="msg_history">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all11
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
          
           </div>-->
           
           <?php 
             $admin = $this->session->userdata('admin');
            $admin_id = $admin->id;
     
            ?>
           
           
           
          <div class="type_msg">
            <div class="input_msg_write">
            <input type="hidden"  class="form-control" name="sender_id" id="sender_id" value="<?=$admin_id;?>">
                 <input type="hidden"  class="form-control" name="receiver_id" id="receiver_id" value="">
             <!--  <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button> -->
             <!--   <textarea class="write_msg form-control" name="chat_message" id="chat_message" placeholder="Type a Message" ></textarea>-->
                 <textarea class="write_msg form-control" name="chat_message" id="chat_message" placeholder="Type a Message" style='height: 49px;
    width: 1088px;'></textarea>
              <button class="msg_send_btn"type="submit" name="submit" onclick="send_msg()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
      
      <p class="text-center top_spac"> Design by <a target="_blank" href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p>
      
    </div></div>
  
  
  
  
        </div>
      </div>
    </div>
</div>


  
                    
  <?php include('include/footer.php'); ?>
  
  
  
  
  

<script type="text/javascript">
  function send_msg(){
     var sender_id = $("#sender_id").val();
     var receiver_id = $("#receiver_id").val();
     var chat_message = $("#chat_message").val();
 //   alert(receiver_id);
     $.ajax({
      url: "<?=base_url('admin/chat_insert');?>",
              data: {'sender_id': sender_id,'receiver_id': receiver_id,'chat_message':chat_message}, // change this to send js object
              type: "POST",
              success: function(result){
             $('#chat_message').val("");
             /*$('.panel-body').animate({
		     	scrollTop: $('.panel-body').prop("scrollHeight")
				}, 1000);*/
				
				
				var objDiv = document.getElementById("mesgs");
objDiv.scrollTop = objDiv.scrollHeight;
				
				// $(".panel-body").animate({ scrollTop: $(document).height() }, 1);
    
              }
            });

}
</script> 
 
<script>
/*   var sender_id = "<?php echo $admin_id; ?>";

   var receiver_id ="<?php echo $id; ?>";
    $(document).ready(function(){

      $(this).ready(function(){
        showcart(sender_id,receiver_id);
      });
  
  });
  
  */
  
  
  

  function showcart($sender_id,$receiver_id){
    
 

    
   $("#receiver_id").val($receiver_id);
    $('.chat_list').addClass('active_chat');
    
    
      var sender_id = $sender_id;

      var receiver_id = $receiver_id;
   
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
            
            
    setInterval(function(){
       
    
      $.ajax({
      url: "<?=base_url('admin/get_new11');?>",
              data: {'receiver_id': receiver_id}, // change this to send js object
              type: "POST",
              success: function(result){
            //  alert(result);
               // $("select[name='subcategory_id']").html(result);
                jQuery("#resulll").html(result); 
                
              }
            });
  }, 2000);  
  
 /*  	var objDiv = document.getElementById("mesgs");
objDiv.scrollTop = objDiv.scrollHeight;*/
            
            
            
//t = setInterval(showcart,1000);  
}
    
</script>   

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <style>
        
        .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
        
    </style>


  
  
  
  
  