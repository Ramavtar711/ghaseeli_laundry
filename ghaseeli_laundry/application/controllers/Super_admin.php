<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Super_admin extends CI_Controller

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

  public

  function index()
  {
    $this->load->view('super_admin/login');
  }
  

  public

  function dashboard()
  {
    $this->load->view('super_admin/dashboard');
    
  }


  public

  function page($page)
  {
     $this->load->view('super_admin/'.$page);
  }
  

  public

  function super_admin_go()
  {
    
      $result = $this->authentication_model->super_admin_login();
      if(!$result) {
        $msg = array(
           'msg' =>'<strong>Error!</strong> Invalid Username and Password. Log in failed.','res' => 0
              );
                             $this->session->set_userdata($msg);
                             redirect('super_admin');
      }
      else {
        redirect('super_admin/dashboard', $message);
      }
    
  }  

  public function logout(){
    $this->session->sess_destroy();
   redirect('super_admin');
   }  





public

  function display_rides()
  { 
   $action = $this->input->get_post('act');
   
    $branch = $this->session->userdata('admin');
         $branch_id =   $branch->id;
   
     if($action=='All'){
    $data['title'] = "All Order";
    $data['rideList'] = $this->admin_common_model->get_all('place_order');
   }
   
   if($action=='Pending'){
    $data['title'] = "Pending";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',['status'=>'Pending']);
   }
   if($action=='Confirmed'){
    $data['title'] = "Confirmed";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',"status IN('Confirmed')");
   }
   if($action=='Pickup'){
    $data['title'] = "Pickup";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',"status IN('Pickup')");
   }    
   if($action=='Progress'){
    $data['title'] = "Progress";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',"status IN('Progress')");
   }
    if($action=='Shipped'){
    $data['title'] = "Shipped";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',"status IN('Shipped')");
   }
    if($action=='Delivered'){
    $data['title'] = "Delivered";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',"status IN('Delivered')");
   }
      if($action=='Cancel'){
    $data['title'] = "Cancelled";
    $data['rideList'] = $this->admin_common_model->get_where('place_order',"status IN('Cancel')");
   }
  
     $this->load->view('super_admin/all_order_list',$data);
  }











 function update_profile()
  {
     
      $id = $this->input->post('id');
$this->load->library('form_validation');

$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


$this->form_validation->set_rules('name', 'Username', 'required');
$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{11}$/]');
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


function change_code()
  {
      
    $id = $this->input->post('id'); 
   
    $fetch = $this->admin_common_model->get_where('category', ['id'=>$id]);
    
    if ($fetch) {  
        
        $json = ['result' => 'successfull', 'status' => '1', 'message' => 'successfull'];

    } else {
        $json = ['result' => 'unsuccessfull', 'status' => '0', 'message' => 'Invalid record'];
    }

    header('Content-type:application/json'); 
    echo json_encode($json);

  }

 public function get_subcate()
      { 
        $state = $this->input->get_post('selected');
      
        $arr_where = ['id'=>$this->input->get_post('service')];
        $cnt = $this->admin_common_model->get_where('category', $arr_where);
        $service_id = $cnt[0]['id'];
        $fetch = $this->admin_common_model->get_where('sub_category',['category_id'=>$service_id]);
     
        if($fetch){

          foreach ($fetch as $val) { ?>
             
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
        $id = $this->input->post('product_id');
        $this->admin_common_model->delete_data($table,['product_id'=>$id]);
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
      
      $otp = rand(0000,9999);
      
      $status = $_POST['status'];
      $id = $_POST['id'];
      $this->admin_common_model->update_data("place_order",['status'=>$status],['id'=>$id]);
     
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



// end class
}
