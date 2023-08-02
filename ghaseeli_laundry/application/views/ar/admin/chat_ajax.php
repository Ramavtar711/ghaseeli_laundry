
       <?php 
	$admin = $this->session->userdata('admin'); 
    $admin_no = $admin->admin_no;
    $s_login = $this->db->query("SELECT * FROM admin WHERE admin_no = '$admin_no'")->result_array();
?>

      
      
      
 <?php

 
 
 
     $i=0;
if(is_array($rt['result']))
          foreach($rt['result'] as $val){
          if($val['receiver_id']==$_POST['sender_id']){

      ?>
      <div class="panel-body">
      
        <div class="msg_history12345">
              
            <div class="incoming_msg">
              <div class="incoming_msg_img"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                    	<?php 
                      	$aid = $val['sender_id'];
	                    $name = $this->db->query("SELECT * FROM users WHERE id = '$aid'")->result_array();?>
                    
                     	<h5><?php echo $name[0]['user_name']; ?></h5>
                         <p><?php echo $val['chat_message']; ?></p>
                 
                  <span class="time_date"> <?php echo $val['date_time']; ?></span></div>
              </div>
            </div>
                 <?php } else{  ?>
            <div class="outgoing_msg">
              <div class="sent_msg">
              	 <h5><?php echo $s_login[0]['name']; ?></h5>
                <p><?php echo $val['chat_message']; ?></p>
                <span class="time_date"> <?php echo $val['date_time']; ?></span> </div> </div>
            </div> 
           
                  <?php } ?>
         	<?php $i++;
				}  ?> 
           
          </div>
</div>
          
        