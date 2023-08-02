<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller

{
 function __construct()
  {
                parent::__construct();
                $this->load->helper('url');
                $this->load->model('admin/authentication_model');                
                $this->load->model('admin/admin_common_model');
                $this->load->library(array('form_validation','session'));
                $this->load->helper('string');
                error_reporting(0);
                define("SITE_EMAIL",'info@cskwt.com'); 
                
  }

  public function index1()
  {
    $this->load->view('admin/login');
  }
  
  
public function index()
  {
      
      if($this->session->userdata('set_act_language')){
           $lang_data = $this->session->userdata('set_act_language');
            $language = $lang_data['lang'];
         
	  if ($language=='Arabic'){  
       $this->load->view('ar/admin/login');
       } 
	  else{
          $this->load->view('admin/login');
                 }
    }
          else{
             $this->load->view('admin/login');
                }
    
              }
  
  
  
  
  
  

  public

  function dashboard1()
  {
    $this->load->view('admin/dashboard');
    
  }

 public

  function dashboard()
  {
    if($this->session->userdata('set_act_language')){
                             $lang_data = $this->session->userdata('set_act_language');
                             $language = $lang_data['lang'];
                           if ($language=='Arabic'){  
                               
                               
                          $this->load->view('ar/admin/dashboard');
                             } 
		                   else{
                              $this->load->view('admin/dashboard');   
                             }
                           }
                            else{
                        $this->load->view('admin/dashboard');  
                      }
  }

  public

  function page1($page)
  {
     $this->load->view('admin/'.$page);
  }
  
   public function page($page){
                
                if($this->session->userdata('set_act_language')){
                $lang_data = $this->session->userdata('set_act_language');
                $language = $lang_data['lang'];
                if ($language=='Arabic'){  
                $this->load->view('ar/admin/'.$page);
                } 
                else{
                $this->load->view('admin/'.$page);
                }
                }
                else{
                $this->load->view('admin/'.$page);
                }  
                
                
                }



public function switch_language(){

	$language = $this->input->get_post('language_name');

	if($language=='English'){
   
  //  echo "$currency_type";die;
		$this->session->unset_userdata('set_act_language');
		$ressult['result']='successfull';
		$ressult['message']="UnSet Language successfull";
		$ressult['status']='1';
		$json = $ressult; 
	}

	else{

  //$set_cookie = setcookie('set_language',$language, time() + (86400 * 30), "/"); // 86400 = 1 day

		$set_language = $this->session->set_userdata('set_act_language',['lang'=>$language]);
// print_r($set_language); die;
		$ressult['result']='successfull';
		$ressult['message']="Set Language successfull";
		$ressult['status']='1';
		$json = $ressult;

	}

	header('Content-type:application/json');
	echo json_encode($json);

}



public function switch_language1(){

	$language = $this->input->get_post('language_name');

	if($language=='Arabic'){
   
  //  echo "$currency_type";die;
		$this->session->unset_userdata('set_act_language');
		$ressult['result']='successfull';
		$ressult['message']="UnSet Language successfull";
		$ressult['status']='1';
		$json = $ressult; 
	}

	else{

  //$set_cookie = setcookie('set_language',$language, time() + (86400 * 30), "/"); // 86400 = 1 day

		$set_language = $this->session->set_userdata('set_act_language',['lang'=>$language]);
// print_r($set_language); die;
		$ressult['result']='successfull';
		$ressult['message']="Set Language successfull";
		$ressult['status']='1';
		$json = $ressult;

	}

	header('Content-type:application/json');
	echo json_encode($json);

}










  public

  function go()
  {
    
      $result = $this->authentication_model->admin_login();
      if(!$result) {
        $msg = array(
           'msg' =>'<strong>Error!</strong> Invalid Username and Password. Log in failed.','res' => 0
              );
                             $this->session->set_userdata($msg);
                             redirect('admin');
      }
      else {
        redirect('admin/dashboard', $message);
      }
    
  }  

  public function logout(){
    $this->session->sess_destroy();
   redirect('admin');
   }  

public

  function display_rides()
  { 
         $action = $this->input->get_post('act');
         $branch = $this->session->userdata('admin');
         $branch_id =   $branch->id;
         
  
   
     if($action=='All'){
    $data['title'] = "All Order";
     $data['title_ar'] = "كل الطلبات";
   //  $this->db->order_by("id", "desc");
    //$data['rideList'] =$this->db->query("SELECT * FROM place_order WHERE branch_id = $branch_id ORDER BY id DESC")->result_array();
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id]);
   }
   
   if($action=='Pending'){
    $data['title'] = "Pending";
       $data['title_ar'] = "قيد الانتظار";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id,'status'=>'Pending']);
   }
   if($action=='Confirmed'){
    $data['title'] = "Confirmed";
       $data['title_ar'] = "مؤكد";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id,'status'=>'Confirmed']);
   }
   if($action=='Pickup'){
    $data['title'] = "Pickup";
       $data['title_ar'] = "يلتقط";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id,'status'=>'Pickup']);
   }    
   if($action=='Progress'){
    $data['title'] = "Progress";
       $data['title_ar'] = "تقدم";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id,'status'=>'Progress']);
   }
    if($action=='Shipped'){
    $data['title'] = "Shipped";
       $data['title_ar'] = "شحنها";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id,'status'=>'Shipped']);
   }
    if($action=='Delivered'){
    $data['title'] = "Delivered";
           $data['title_ar'] = "تم التوصيل";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id,'status'=>'Delivered']);
   }
      if($action=='Cancel'){
    $data['title'] = "Cancelled";
       $data['title_ar'] = "ألغيت";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['branch_id'=>$branch_id,'status'=>'Cancelled']);
   }
   
   
                $lang_data = $this->session->userdata('set_act_language');
                 $language = $lang_data['lang'];
                if ($language=='Arabic'){  
               $this->load->view('ar/admin/all_order_list',$data);
                } 
                else{
               $this->load->view('admin/all_order_list',$data);
                }
            }








function chat_insert()
				{
        $sender_id = $_POST['sender_id'];
        $receiver_id = $_POST['receiver_id'];
        $chat_message = $_POST['chat_message'];
        date_default_timezone_set('Asia/Kolkata');
					
					
     $arr_data = [
        'sender_id'=>$sender_id,
        'receiver_id'=>$receiver_id,
        'chat_message'=>$chat_message,
        'date'=>date('Y-m-d h:i:s'),
        "type" => "ADMIN",
        ];

        $result = $this->admin_common_model->insert_data('kaise_chat_detail',$arr_data);  
			    
			    $user_r = $this->admin_common_model->get_where('users', ['id' => $receiver_id]);
			    
//	$user_r = $this->Webservice_model->get_where('users', ['id' => $sender_id]);
	$user_message_apk = array(
		"message" => array(
            "result" => "successful",
            "key" => "chat",
            "message" => "You have a new message",
            "type" => "ADMIN",
			"date" => date('Y-m-d h:i:s')
		)
	);
	
	$register_userid = array(
		            $user_r[0]['register_id']
	             );
	
    	$this->admin_common_model->user_apk_notification($register_userid, $user_message_apk);
			    
			    
                $this->load->view('admin/chat_ajax');
				}



function get_new(){ 
    
    
    
      $sender_id = $_POST['sender_id'];
      $receiver_id = $_POST['receiver_id'];  


$Dataaa=file_get_contents("https://ghaselwmakwa.com/ghaseeli_laundry/admin/get_chat?receiver_id=$sender_id&sender_id=$receiver_id");
$data['rt']=json_decode($Dataaa,true);
//print_r($Dataaa); die;
$this->load->view('admin/chat_ajax',$data);
}


function get_new11(){ 
    
        	$admin = $this->session->userdata('admin'); 
          $admin_id = $admin->id;
    
    
      $sender_id = $admin_id;
       $receiver_id = $_POST['receiver_id']; 


$Dataaa=file_get_contents("https://ghaselwmakwa.com/ghaseeli_laundry/admin/get_chat?receiver_id=$sender_id&sender_id=$receiver_id");
$data['rt']=json_decode($Dataaa,true);
//print_r($Dataaa); die;
$this->load->view('admin/chat_ajax',$data);
}






public

function get_chat()
	{
	$sender_id = $this->input->get_post('sender_id', TRUE);
	$receiver_id = $this->input->get_post('receiver_id', TRUE);
	$this->db->where('sender_id', $sender_id);
	$this->db->where('receiver_id', $receiver_id);
	$this->db->or_where('sender_id', $receiver_id);
	$this->db->where('receiver_id', $sender_id);
	$this->db->order_by('id', 'ASC');
	$info = $this->db->get('kaise_chat_detail');
	$chat = $info->result_array();
	if ($chat)
		{
		$i = 0;
		foreach($chat as $val)
			{
			$sender = $this->admin_common_model->get_where('admin', ['admin_no' => $val['sender_id']]);
		
			$val['chat_image'] = SITE_URL . 'uploads/images/' . $val['chat_image'];
	
			$exp1 = $exp2 = "";
			$clr_id = $val['clear_chat'];
			$exp = explode(',', $clr_id);
			if (isset($exp[0]))
				{
				$exp1 = $exp[0];
				}

			if (isset($exp[1]))
				{
				$exp2 = $exp[1];
				}

			if ($exp1 != $receiver_id && $exp2 != $receiver_id)
				{
				$i++;
				$json[] = $val;
				} //end if
			}

		if ($i == 0)
			{
			$data = array(
				"result" => [],
					"message" => "unsuccessful",
						"status" => "0"
			);
			}
			else
			{
			    	$data = array(
				"result" => $json,
					"message" => "successful",
						"status" => "1"
			);
			}

		$arr_where = ['sender_id' => $sender_id, 'receiver_id' => $receiver_id]; //print_r($arr_where);
		$this->admin_common_model->update_data('kaise_chat_detail', ['status' => 'SEEN'], $arr_where);
		}
	  else
		{
			$data = array(
				"result" =>[],
					"message" => "unsuccessful",
						"status" =>0
			);
		}

	header('Content-type: application/json');
	echo json_encode($data);
	}



















 function update_profile()
  {
     
      $id = $this->input->post('id');
$this->load->library('form_validation');

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


$this->form_validation->set_rules('name', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
$this->form_validation->set_rules('mobile', 'Mobile No.', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');


if ($this->form_validation->run() == FALSE) {
$this->load->view('admin/profile');
} else {

$arr_data = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
);

 if ($_FILES['image']['name']!='') {
        $n = rand(0, 100000);
        $img = "update_profile_" . $n . '.png';
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
        $arr_data['image'] = $img;
      }




$this->admin_common_model->update_data("admin",$arr_data,['id'=>$id]);
$data['message'] = 'Data Inserted Successfully';

$this->load->view('admin/profile');

}  
     
     
     
  }









 function update_profile_ar()
  {
     
      $id = $this->input->post('id');
$this->load->library('form_validation');

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


$this->form_validation->set_rules('name', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
$this->form_validation->set_rules('mobile', 'Mobile No.', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');


if ($this->form_validation->run() == FALSE) {
$this->load->view('ar/admin/profile');
} else {

$arr_data = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
);

 if ($_FILES['image']['name']!='') {
        $n = rand(0, 100000);
        $img = "update_profile_" . $n . '.png';
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
        $arr_data['image'] = $img;
      }




$this->admin_common_model->update_data("admin",$arr_data,['id'=>$id]);
$data['message'] = 'Data Inserted Successfully';

$this->load->view('ar/admin/profile');

}  
     
     
     
  }



    
    function update_password()
  {
      $password = $_POST['password'];
      $id = $_POST['id'];
      $this->admin_common_model->update_data("users",['password'=>$password],['id'=>$id]);
  }



  public function admin_logout(){
        $this->session->unset_userdata('admin');
        return redirect('admin');   
  }






/*******************************************/  
  function change_code()
  {
      
    $country_id = $this->input->post('id');
     
    $fetch = $this->admin_common_model->get_where('category', ['id'=>$country_id]);
    if ($fetch) {  
        
        $json = ['result' => 'successfull','id'=>$fetch[0]['id'], 'status' => '1', 'message' => 'successfull'];

    } else {
        $json = ['result' => 'unsuccessfull', 'status' => '0', 'message' => 'Invalid record'];
    }

    header('Content-type:application/json'); 
    echo json_encode($json);

  }

/************* get_states function *************/
      public function get_states()
      { 
   
    $state = $this->input->get_post('selected'); 
      $this->input->get_post('category_id'); 
        
        $arr_where = ['id'=>$this->input->get_post('category_id')];
        $cnt = $this->admin_common_model->get_where('category', $arr_where);
        $country_id = $cnt[0]['id'];
        $fetch = $this->admin_common_model->get_where('sub_category',['category_id'=>$country_id]);
         if($fetch){
          foreach ($fetch as $val) { ?>
            <option value="">Select</option> 
            <option value="<?=$val['id']?>" <?php if($val['id'] == $state){echo 'selected';}?> ><?=$val['sub_cat_name']?></option>
             <?php }
 
        }
        
      }
      
      /************* get_city function *************/
      public
    
      function get_city()
      { 
        $city = $this->input->get_post('selected');
        $arr_where = ['id'=>$this->input->get_post('sub_category_id')];
        $cnt = $this->admin_common_model->get_where('sub_category', $arr_where);
        $state_id = $cnt[0]['id'];
        $fetch = $this->admin_common_model->get_where('child_category',['sub_category_id'=>$state_id]);
        if($fetch){

          foreach ($fetch as $val) { ?>
             
            <option value="<?=$val['id']?>" <?php if($val['id'] == $city){echo 'selected';}?> ><?=$val['child_cate_name']?></option>
            
             
          <?php }
 
        }
        
      }


/************* get_states function *************/
      public function get_states_ar()
      { 
       $state = $this->input->get_post('selected'); 
 
        
        $arr_where = ['id'=>$this->input->get_post('category_id')];
        $cnt = $this->admin_common_model->get_where('category', $arr_where);
        $country_id = $cnt[0]['id'];
        $fetch = $this->admin_common_model->get_where('sub_category',['category_id'=>$country_id]);
        if($fetch){

          foreach ($fetch as $val) { ?>
          
              
            <option value="<?=$val['id']?>" <?php if($val['id'] == $state){echo 'selected';}?> ><?=$val['sub_cat_name_ar']?></option>
            
             
          <?php }
 
        }
        
      }
      
      /************* get_city function *************/
      public
    
      function get_city_ar()
      { 
        $city = $this->input->get_post('selected');
        $arr_where = ['id'=>$this->input->get_post('sub_category_id')];
        $cnt = $this->admin_common_model->get_where('sub_category', $arr_where);
        $state_id = $cnt[0]['id'];
        $fetch = $this->admin_common_model->get_where('child_category',['sub_category_id'=>$state_id]);
        if($fetch){

          foreach ($fetch as $val) { ?>
            <option value="<?=$val['id']?>" <?php if($val['id'] == $city){echo 'selected';}?> ><?=$val['child_cate_name_ar']?></option>
            <?php }
             }
          }





function change_code11()
  {
      
    $id = $this->input->post('id'); 
   
    $fetch = $this->admin_common_model->get_where('sub_category', ['id'=>$id]);
    
    if ($fetch) {  
        
        $json = ['result' => 'successfull', 'status' => '1', 'message' => 'successfull'];

    } else {
        $json = ['result' => 'unsuccessfull', 'status' => '0', 'message' => 'Invalid record'];
    }

    header('Content-type:application/json'); 
    echo json_encode($json);

  }





/************* get_states function *************/
      public function get_subcate()
      { 
       $state = $this->input->get_post('selected'); 
 echo "hh";
        
        $arr_where = ['id'=>$this->input->get_post('id')];
        $cnt = $this->admin_common_model->get_where('category', $arr_where);
        $country_id = $cnt[0]['id'];
        $fetch = $this->admin_common_model->get_where('sub_category',['category_id'=>$country_id]);
        if($fetch){

          foreach ($fetch as $val) { ?>
          
              <option value="">Select</option> 
            <option value="<?=$val['id']?>" <?php if($val['id'] == $state){echo 'selected';}?> ><?=$val['sub_cat_name']?></option>
            
             
          <?php }
 
        }
        
      }








  public function delete_data(){
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $this->admin_common_model->delete_data($table,['id'=>$id]);
  }
  
   public function delete_data1(){
        $table = $this->input->post('table');
        $id = $this->input->post('id');
        $orderid = $this->input->post('orderid');
         $check = $this->admin_common_model->get_where('place_order',['id'=>$orderid]);
         $cart_id =  $check[0]['cart_id'];
            $arrr = explode(',',$cart_id);
       
           $key = array_search($id, $arrr);
           unset($arrr[$key]); 
     
             $cartid = implode(',',$arrr);
             $this->admin_common_model->update_data('place_order',['cart_id'=>$cartid],['id'=>$orderid]);
         
         $this->admin_common_model->delete_data($table,['id'=>$id]);
        
  }

  public function delete_data2(){
        $table = $this->input->post('table');
        $id = $this->input->post('fav_user_id');
        $this->admin_common_model->delete_data($table,['fav_user_id'=>$id]);
  }
  
   public function delete_image(){
        $table = $this->input->post('table');
        $id = $this->input->post('product_id');
        $this->admin_common_model->delete_data($table,['product_id'=>$id]);
  }
 
  
   public function create_owner(){
       
       $user_id = $this->input->post('user_id');
       $shop_id = $this->input->post('shop_id');
       if($shop_id!=''){
         $this->admin_common_model->update_data('shop',['user_id'=>$user_id],['id'=>$shop_id]);
       }
       return redirect('admin/view_page/userList');   
  }

  function updateStatus()
     {
      
       $driver_id = $_POST['driver_id'];
       $order_id = $_POST['order_id'];
       
       $this->admin_common_model->update_data("place_order",['driver_id'=>$driver_id],['id'=>$order_id]);
       
       $driver_details = $this->admin_common_model->get_where("users",['id'=>$driver_id]);
        
       
 $user_message_apk1 = array(
      "message" => array(
        "result" => "successful",
        "key" => $status,
       // "alert" => $alert,
        'order_id' => $order_id ,
        'driver_id' => $driver_details[0]['id'],
        'driver_firstname' => $driver_details[0]['first_name'],
        'driver_lastname' => $driver_details[0]['last_name'],
        'booking_status' => $status,
        "driver_img" => SITE_URL . "uploads/images/" . $driver_details[0]['image'],
     
      )
    );
    $register_userid = array(
      $driver_details[0]['register_id']
    );
    
  $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk1);
       
       
       
       
       
       
      }
      
     function UpdatePaymentStatus()
  {
      
       $payment_status = $_POST['payment_status'];
       $order_id = $_POST['order_id'];
       
      $this->admin_common_model->update_data("place_order",['payment_status'=>$payment_status],['id'=>$order_id]);
     
      }   
      
      
          function addOrderstatus()
  {
      
       $status = $_POST['status'];
       $order_id = $_POST['order_id'];
       
       $place_order = $this->admin_common_model->get_where("place_order",['id'=>$order_id]);
       
       if($place_order){
       
      $this->admin_common_model->update_data("place_order",['status'=>$status],['id'=>$order_id]);
      
          $driver_details = $this->admin_common_model->get_where("users",['id'=>$place_order[0]['driver_id']]);
      
        $alert = "Your order has been ". $status;
      
      
      
   $user_message_apk1 = array(
        "message" => array(
        "result" => "successful",
        "key" => $status,
        "alert" => $alert,
        'order_id' => $place_order[0]['id'],
        'driver_id' => $driver_details[0]['id'],
        'driver_firstname' => $driver_details[0]['first_name'],
        'driver_lastname' => $driver_details[0]['last_name'],
        'booking_status' => $status,
        "driver_img" => SITE_URL . "uploads/images/" . $driver_details[0]['image'],
     
      )
    );
    $register_userid = array(
      $driver_details[0]['register_id']
    );
    
  $this->admin_common_model->user_apk_notification($register_userid, $user_message_apk1);
       
       
       
       }
      
      
      
     
      }   
      
      
     function updateStatusAssgine()
  {
      
      $otp = rand(0000,9999);
      
      $driver_id = $_POST['driver_id'];
      $id = $_POST['id'];
      $this->admin_common_model->update_data("place_order",['status'=>'Confirmed','driver_id'=>$driver_id,'otp'=>$otp],['id'=>$id]);
      
      
      $driver =   $this->admin_common_model->get_where("users",['id'=>$driver_id]);
      
      
         $user_message_apk1 = array(
      "message" => array(
        "result" => "successful",
        "key" => 'Confirmed',
        "alert" => 'new order assigne',
        'driver_id' => $driver_id ,
         
     
      )
    );
    $register_userid = array(
      $driver[0]['register_id']
    );
    
  $this->Webservice_model->user_apk_notification($register_userid, $user_message_apk1);
      
      
      
      
      }
        
      
      
      
      
      
      
  
    function update_driver()
  {
      $driver_id = $_POST['driver_id'];
      $id = $_POST['id'];
      $this->admin_common_model->update_data("place_order",['driver_id'=>$driver_id],['id'=>$id]);
     // echo $this->db->last_query();
  }

  
  
  
  function update_status()
  {
      $status = $_POST['status'];
      $id = $_POST['id'];
      $this->admin_common_model->update_data("users",['status'=>$status],['id'=>$id]);
     // echo $this->db->last_query();
  }





 function demo()
  {
     $aa =  $this->admin_common_model->get_where("users",['status'=>'Deactive']);
      if($aa){
         $this->admin_common_model->update_data("users",['status'=>'Active'],['status'=>'Deactive']);  
         echo "true";
      }else{
          echo 'false';
      }
  }

function demo1()
  {
    // $active = 'Active'; 
      
 
    // $request = $this->db->query("UPDATE users SET status = '$active'")->result_array();
     
 $this->admin_common_model->update_data("users",['status'=>'Active'],['status'=>'Deactive']);
       return redirect('admin/view_page/userList'); 
  }






public function userAlerts(){
	    
         if($_POST["view"]!= ''){
          $updatequery = $this->db->query('UPDATE place_order SET notification_status=1 WHERE notification_status=0');   
                   // $this->db->query('UPDATE place_order SET bell_notification=1 WHERE notification_status=0'); 
         }
          
          
         // $selectquery = $this->db->query("SELECT * FROM booking_request WHERE notification_status=0");
         // $result = $selectquery->num_rows();  
           $result = $this->admin_common_model->get_where('place_order',['notification_status'=>0]);  
            $result1 = count($result);
        
       //  $driver_id =  $result[0]['id']; 
           if($result1 > 0){
           
      //  $fetch = $this->admin_common_model->get_where('users',['id'=>$driver_id]);
           
       $output .= '
   <a class="dropdown-item d-flex align-items-center" href="https://ghaselwmakwa.com/ghaseeli_laundry/admin/display_rides?act=All">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">New Order</div>
                                        <span class="font-weight-bold">new order </span>
                                    </div>
                                </a>
                              
   ';
 
   
           }
           
         else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}  
           
           
           
	    $query = $this->db->query("SELECT * FROM place_order WHERE notification_status=0");
         $count = $query->num_rows();
         $data = array(
          'notification' => $output,
          'unseen_notification' => $count,
         // 'bell_notification' => $bell_notification
         );
         echo json_encode($data);
    }



public function bell_notification()
        {
	     $updatequery = $this->db->query('UPDATE place_order SET bell_notification=1 WHERE notification_status=0');  
	     
        }



    
      /************* order_report function *************/
      public function order_report()
      {
 
         $startDate =$this->input->get_post('startDate'); 
        $endDate =  $this->input->get_post('endDate'); 
  
      $get_where = "";
      
      
   /*  if($user_id!=''){
		if($get_where==''){
			$get_where = "user_id = '".$user_id."'";
		}else{
			$get_where = $get_where." AND user_id = '".$user_id."'";
		}
	}
        
       if($driver_id!=''){
		if($get_where==''){
			$get_where = "driver_id = '".$driver_id."'";
		}else{
			$get_where = $get_where." AND driver_id = '".$driver_id."'";
		}
	}
	
	  if($status!=''){
		if($get_where==''){
			$get_where = "booking_request.status = '".$status."'";
		}else{
			$get_where = $get_where." AND booking_request.status = '".$status."'";
		}
	}
	
	*/
	
    
        if($startDate!=''){
		if($get_where==''){
			$get_where = "DATE(place_order.date_time) >= '".$startDate."'";
		}else{
			$get_where = $get_where." AND DATE(place_order.date_time) >= '".$startDate."'";
		}
	}
    
     if($endDate!=''){
		if($get_where==''){
			$get_where = "DATE(place_order.date_time) <= '".$endDate."'";
		}else{
			$get_where = $get_where." AND DATE(place_order.date_time) <= '".$endDate."'";
		}
	}
    
        
        
        
        if ($get_where!='') { 
             $fetch = $this->db->query("SELECT users.*, place_order.* FROM place_order, users WHERE users.id = place_order.user_id  AND  $get_where")->result_array();
                //  $fetch = $this->db->query("SELECT * FROM booking_request WHERE $get_where")->result_array();
        }
       /* else{
                  $fetch = $this->db->query("SELECT * FROM booking_request")->result_array();
        }*/
           
           
           
           // $fetch = $this->db->query("SELECT users.*, booking_request.* FROM booking_request, users WHERE users.id = booking_request.user_id  AND  $where")->result_array();
         //  echo $this->db->last_query();die;
            if($fetch){
                $total = 0;
                foreach ($fetch as $val) {
     
                  $usr = $this->admin_common_model->get_where('users',['id'=>$val['user_id']]);
                  $val['user'] = $usr[0]['first_name'].' '.$usr[0]['last_name'];
                  $val['tran_date'] = date("d M Y h:i A", strtotime($val['date_time']));              
                  $val['total'] = $total = $total+$val['amount'];
                  $data[] = $val;
    
                }
            }
          

          $json = ['result' => $data, 'sub_total'=>$total, 'status' => '1', 'message' => 'successfull'];   
       

     
       $this->load->view('admin/revenueReport',$json);
      }   






// end class
}
