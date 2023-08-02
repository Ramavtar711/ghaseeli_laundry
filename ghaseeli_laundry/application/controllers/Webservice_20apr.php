<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

error_reporting('0');
 // define("SITE_URL",base_url()); 
class Webservice extends CI_Controller{

  public function __construct(){
    parent:: __construct();
    $this->load->model('Webservice_model');
    $this->load->library(['form_validation','email']);  
    $this->load->helper('string');   
    define("SITE_URL",'https://lamavietech.ml/lamavie_laundry/');
    define("SITE_EMAIL",'info@technorizen.com');  
    date_default_timezone_set('Asia/Kolkata');
    }



 public function index(){
     echo "welcome";
 }
 
 
 
 public function cybersource_payment(){
        
        
     
/**
 * Test script to show how the EPS_CYBERSOURCE class can be used.
 */
 include APPPATH . 'third_party/eps_cybersource.php';
 //require 'class.eps_cybersource.php';
 
/**
 * These should go in a config file somewhere on the box.
 */
 $trans_key = 'gNIPuDoymisqPT+69ZLG/04t6bUbwdSRsUkARby010pZsLQLkzMVvP/eZtgaSa+ZnS7U/14z9RbmPI+9tZOPfvd+Xv7ta2Bw38+P2QxV4Ufd2tYgSMVkK65L3ECNyAr9KO9EgeI9WmBJCvSYlWUo1D07dBaxLHJKwI8S3yZeGVAFBZstMaFUlHiYnl/I8kVqxgpjHGpsyExZmsdgP/fE8dYcoE2N/GT0PSxIbarSZwOOGVVvPxZjBRybvtTBQqGxVZTJOuTTXr8H8wTaF41pgeLi1ruadcfWQoNjZs4cVyApApzyZqP5kypfyyYZh7u2mtGtaBlm3VcEGdyTGYvBAQ==';
 $merchant_id = 'lamavie';
 $url = 'https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.53.wsdl';
 //$url = 'https://ics2wsa.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.53.wsdl';
  
 
/**
 * 
 * These are sent from some GUI and assembled into the applicable arrays.
 */

 
 $bill_array = array(
                'firstName'=>$this->input->get_post('firstName'),
                'lastName'=>$this->input->get_post('lastName'),
                'street1'=>$this->input->get_post('street1'),
                'city'=>$this->input->get_post('city'),
                'state'=>$this->input->get_post('state'),
                'postalCode' => $this->input->get_post('postalCode'),
                'country'=>$this->input->get_post('country'),
                'email'=> $this->input->get_post('email'),
                'ipaddress'=>$this->input->get_post('ipaddress'));
                     
 $card_array = array(
                'accountNumber'=>$this->input->get_post('accountNumber'),
                'expirationMonth'=>$this->input->get_post('expirationMonth'),
                'expirationYear'=>$this->input->get_post('expirationYear'),
                'cvNumber'=>$this->input->get_post('cvNumber'));
 $item_array = array(
 //array('unitPrice'=>'.50','quantity'=>2,'productName'=>'product one'),
 array('unitPrice'=>$this->input->get_post('unitPrice'),'quantity'=>$this->input->get_post('quantity'),'productName'=>$this->input->get_post('productName')));
 $custom_array = array('one');
 //$custom_array = array('one','two','three','four');
 
/**
 * Authorize a transaction.
 */
 try
 {
 $soap = new EPS_CYBERSOURCE($url, $merchant_id,$trans_key);
 $soap->setMerchantDefinedData($custom_array);
 $soap->setReferenceCode(array('CSTEST','YYYY','J','-','RNDM'));
 $soap->setCCRequest($bill_array,$card_array,$item_array);
 $soap->ccAuthorize();
 }
 catch (SoapFault $e)
 {
 exit($e->getMessage());
 }
 
 //print_r($soap->reply);
 
/**
 * Capture the successful authorization.
 * A single ccCapture() could have been done instead of a ccAuthorize() followed by a ccCapture().
 */
 if ($soap->success) $soap->ccCapture();
 
/**
 * These return values would be stored locally.
 */
 $tok = $soap->reply->requestToken;
 $id = $soap->reply->requestID;
 $rc = $soap->reply->merchantReferenceCode;
 $amount = $soap->reply->amount;
 $currency = $soap->reply->currency;
 
 //print_r($soap->reply);
 
 $trans_array = array('requestToken'=>$tok,
 'requestID'=>$id,
 'referenceCode'=>$rc,
 'amount'=>$amount,
 'currency'=>$currency);
 
/**
 * Reverse the capture or authorization.
 */
 if ($soap->success)
 {
 unset($soap);
 try
 {
 $soap = new EPS_CYBERSOURCE($url, $merchant_id,$trans_key);
 $soap->setCCReversalRequest($tok,$id,$rc,$amount);
 $soap->ccReverse('c');
 }
 catch (SoapFault $e)
 {
 exit($e->getMessage());
 }
 }
 
// print_r($soap->reply);    
 
/**
 * Credit the account.
 */
 if ($soap->success)
 {
 unset($soap);
 try
 {
 $soap = new EPS_CYBERSOURCE($url, $merchant_id,$trans_key);
 $soap->setCCCreditRequest($bill_array,$card_array);
 $soap->setReferenceCode(array('CR','YYYY','J','-',array('RNDM',5,5)));
 $soap->ccCredit('2.53');
 }
 catch (SoapFault $e)
 {
 exit($e->getMessage());
 }
 }
 
// print_r($soap->reply);    
 
/**
 * Get some help on the XML schema.
 */
/* print_r($soap->getHelp());
 
 echo "current version: " . $soap->getHelpVersion() . "\n";
 
 print_r($soap->getHelp('item'));
 
 unset($soap);*/
 //echo $soap->reply[0]['merchantReferenceCode'];
//print_r($soap->reply[0]['merchantReferenceCode']); 

    if ($soap->reply->decision =='ACCEPT') {
         
       
        $ressult['result']=$soap->reply->decision;
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
         
         
       
      }else{
          
     $json = ['status'=>'0','message'=>'unsuccessfull','result'=>'data not found'];
       
        }

      header('Content-type:application/json');
      echo json_encode($json);

    }
 
 
 
 
 
 public function add_wallet(){
        
        
     
/**
 * Test script to show how the EPS_CYBERSOURCE class can be used.
 */
 include APPPATH . 'third_party/eps_cybersource.php';
 //require 'class.eps_cybersource.php';
 
/**
 * These should go in a config file somewhere on the box.
 */
 $trans_key = 'gNIPuDoymisqPT+69ZLG/04t6bUbwdSRsUkARby010pZsLQLkzMVvP/eZtgaSa+ZnS7U/14z9RbmPI+9tZOPfvd+Xv7ta2Bw38+P2QxV4Ufd2tYgSMVkK65L3ECNyAr9KO9EgeI9WmBJCvSYlWUo1D07dBaxLHJKwI8S3yZeGVAFBZstMaFUlHiYnl/I8kVqxgpjHGpsyExZmsdgP/fE8dYcoE2N/GT0PSxIbarSZwOOGVVvPxZjBRybvtTBQqGxVZTJOuTTXr8H8wTaF41pgeLi1ruadcfWQoNjZs4cVyApApzyZqP5kypfyyYZh7u2mtGtaBlm3VcEGdyTGYvBAQ==';
 $merchant_id = 'lamavie';
 $url = 'https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.53.wsdl';
 //$url = 'https://ics2wsa.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.53.wsdl';
  
 
/**
 * 
 * These are sent from some GUI and assembled into the applicable arrays.
 */

$user_id = $this->input->get_post('user_id');
$wallet_amount = $this->input->get_post('unitPrice');

 
 $bill_array = array(
                'firstName'=>$this->input->get_post('firstName'),
                'lastName'=>$this->input->get_post('lastName'),
                'street1'=>$this->input->get_post('street1'),
                'city'=>$this->input->get_post('city'),
                'state'=>$this->input->get_post('state'),
                'postalCode' => $this->input->get_post('postalCode'),
                'country'=>$this->input->get_post('country'),
                'email'=> $this->input->get_post('email'),
                'ipaddress'=>$this->input->get_post('ipaddress'));
                     
 $card_array = array(
                'accountNumber'=>$this->input->get_post('accountNumber'),
                'expirationMonth'=>$this->input->get_post('expirationMonth'),
                'expirationYear'=>$this->input->get_post('expirationYear'),
                'cvNumber'=>$this->input->get_post('cvNumber'));
 $item_array = array(
 //array('unitPrice'=>'.50','quantity'=>2,'productName'=>'product one'),
 array('unitPrice'=>$this->input->get_post('unitPrice'),'quantity'=>$this->input->get_post('quantity'),'productName'=>$this->input->get_post('productName')));
 $custom_array = array('one');
 //$custom_array = array('one','two','three','four');
 
/**
 * Authorize a transaction.
 */
 try
 {
 $soap = new EPS_CYBERSOURCE($url, $merchant_id,$trans_key);
 $soap->setMerchantDefinedData($custom_array);
 $soap->setReferenceCode(array('CSTEST','YYYY','J','-','RNDM'));
 $soap->setCCRequest($bill_array,$card_array,$item_array);
 $soap->ccAuthorize();
 }
 catch (SoapFault $e)
 {
 exit($e->getMessage());
 }
 
 //print_r($soap->reply);
 
/**
 * Capture the successful authorization.
 * A single ccCapture() could have been done instead of a ccAuthorize() followed by a ccCapture().
 */
 if ($soap->success) $soap->ccCapture();
 
/**
 * These return values would be stored locally.
 */
 $tok = $soap->reply->requestToken;
 $id = $soap->reply->requestID;
 $rc = $soap->reply->merchantReferenceCode;
 $amount = $soap->reply->amount;
 $currency = $soap->reply->currency;
 
 //print_r($soap->reply);
 
 $trans_array = array('requestToken'=>$tok,
 'requestID'=>$id,
 'referenceCode'=>$rc,
 'amount'=>$amount,
 'currency'=>$currency);
 
/**
 * Reverse the capture or authorization.
 */
 if ($soap->success)
 {
 unset($soap);
 try
 {
 $soap = new EPS_CYBERSOURCE($url, $merchant_id,$trans_key);
 $soap->setCCReversalRequest($tok,$id,$rc,$amount);
 $soap->ccReverse('c');
 }
 catch (SoapFault $e)
 {
 exit($e->getMessage());
 }
 }
 
// print_r($soap->reply);    
 
/**
 * Credit the account.
 */
 if ($soap->success)
 {
 unset($soap);
 try
 {
 $soap = new EPS_CYBERSOURCE($url, $merchant_id,$trans_key);
 $soap->setCCCreditRequest($bill_array,$card_array);
 $soap->setReferenceCode(array('CR','YYYY','J','-',array('RNDM',5,5)));
 $soap->ccCredit('2.53');
 }
 catch (SoapFault $e)
 {
 exit($e->getMessage());
 }
 }
 
// print_r($soap->reply);    
 
/**
 * Get some help on the XML schema.
 */
/* print_r($soap->getHelp());
 
 echo "current version: " . $soap->getHelpVersion() . "\n";
 
 print_r($soap->getHelp('item'));
 
 unset($soap);*/
 //echo $soap->reply[0]['merchantReferenceCode'];
//print_r($soap->reply[0]['merchantReferenceCode']); 

    if ($soap->reply->decision =='ACCEPT') {
        
           $this->db->query("UPDATE `users` SET `wallet_amount` = wallet_amount+($wallet_amount) WHERE `id` = $user_id");
       
        $ressult['result']=$soap->reply->decision;
        $ressult['message']='successfull';
        $ressult['status']='1';
        $json = $ressult;
         
         
       
      }else{
          
     $json = ['status'=>'0','message'=>'unsuccessfull','result'=>'data not found'];
       
        }

      header('Content-type:application/json');
      echo json_encode($json);

    }
 
 
 
 
 
                  

public function get_transaction()
{
    
    
  $user_id = $this->input->get_post('user_id');                       
  $fetch = $this->db->query("select * from  transaction where user_id = '$user_id' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
           $where = ['id'=>$val['child_cat_id']]; 
           
            $child_category = $this->Webservice_model->get_where('child_category',$where);  
            $val['item_name']=$child_category[0]['child_cate_name'];
            
           $users = $this->Webservice_model->get_where('users',['id'=>$user_id]);  
            $val['user_name']=$users[0]['user_name'];
         
           
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
              //  $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}



                

public function get_coupon_codes()
{
    
                       
  $fetch = $this->db->query("select * from  coupon_codes ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $val['image']=SITE_URL.'uploads/images/'.$val['image'];    
          
         $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
              //  $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}


 
 
 
 
 
 
 
 
   /************* login with otp function *************/

    public function login(){
        
        
          $arr_data = [
               'mobile'=>$this->input->get_post('mobile'),
               'type'=>$this->input->get_post('type'),
               'otp'=>'123456',
            ];
         $arr_get = ['mobile' => $arr_data['mobile'],'type' => $arr_data['type']];
         $login = $this->Webservice_model->get_where('users',$arr_get);
         if ($login){
      	 $this->Webservice_model->update_data('users', ['otp' => $arr_data['otp']], $arr_get);
         $ressult['message']='successfull';
         $ressult['user_id']= $login[0]['id'];
         $ressult['status']='1';
         $json = $ressult;
         
         
       
      }else{
          
     $json = ['status'=>'0','message'=>'invalid mobile number','user_id'=>''];
       
        }

      header('Content-type:application/json');
      echo json_encode($json);

    }
    
    
    
        
    /************* check_otp function *************/
    public function check_otp(){
        
    $register_id = $this->input->get_post('register_id');
    
      $arr_get = [
           'id'=>$this->input->get_post('user_id'),
           'otp'=>$this->input->get_post('otp'),
          ];
    
      $login = $this->Webservice_model->get_where('users',$arr_get);
    
      if($login) {
          $this->Webservice_model->update_data('users', ['register_id'=>$register_id], $arr_get);
          $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
          $ressult['result']=$login[0];
          $ressult['message']='successfull';
          $ressult['status']='1';
          $json = $ressult;
          }else{
            $json = ['result'=>'unsuccessfull','status'=>'0','message'=>'Data Not Found'];
             }
    
            header('Content-type: application/json');
            echo json_encode($json);
            }
    
    
    
    
    
      /************* signup function *************/

    public function signup(){

         $arr_data = [
            'first_name'=>$this->input->get_post('first_name'),
            'last_name'=>$this->input->get_post('last_name'),
            'email'=>$this->input->get_post('email'),
            'address'=>$this->input->get_post('address'),
            'mobile'=>$this->input->get_post('mobile'),
            'dob'=>$this->input->get_post('dob'),
            'gender'=>$this->input->get_post('gender'),
            'country_code'=>$this->input->get_post('country_code'),
            'lat'=>$this->input->get_post('lat'),
            'lon'=>$this->input->get_post('lon'),
            'type'=>$this->input->get_post('type'),
            'register_id'=>$this->input->get_post('register_id'),
              'otp'=>'123456',
            ];
            $arr_data['user_name'] = $arr_data['first_name'] . ' '.$arr_data['last_name'];
            
            
           if (isset($_FILES['image']))
           {
               $n = rand(0, 100000);
               $img = "USER_IMG_" . $n . '.png';
               move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
               $arr_data['image'] = $img;        
           }

            
            
            
            $arr_get = ['email' => $arr_data['email'],'type' => $arr_data['type']];
            $login = $this->Webservice_model->get_where('users',$arr_get);
            if ($login) {
                //   $ressult['result']='Email already exist';
                   $ressult['message']='Email already exist';
                   $ressult['status']='0';
                   $json = $ressult;
                               
                header('Content-type:application/json');
                echo json_encode($json);
                die;
               }     
                $id = $this->Webservice_model->insert_data('users',$arr_data);
               if ($id=="") {
                $json = ['status'=>'0','message'=>'data not found'];
                }else{
                    
                $arr_data11 = [
                'user_id' => $id,
                'address' => $this->input->get_post('address'),
                'lat' => $this->input->get_post('lat'),
                'lon' => $this->input->get_post('lon'),
                'country_code'=>$this->input->get_post('country_code'),
                'mobile'=>$this->input->get_post('mobile'),
                'type' => 'Home',
                ];
                $this->Webservice_model->insert_data('add_address',$arr_data11);   
                    
                    
          
  
                $arr_gets = ['id'=>$id];
                $login = $this->Webservice_model->get_where('users',$arr_gets);       
                $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
              //  $ressult['result']=$login[0];
                $ressult['message']='Thank you for register';
                $ressult['status']='1';
                $json = $ressult;
      }

      header('Content-type:application/json');
      echo json_encode($json);

    }
    
    
    
    
    
    
    
    
   
 public

      function forgot_password()
	{
	$email = $this->input->get_post('email', TRUE); //echo $email;die;
	$arr_login = ['email' => $email];
	$login = $this->Webservice_model->get_where('users', $arr_login);
	if ($login)
		{
		    //$aa = base64_encode($login[0]['id']);
		    $aa = $login[0]['id']; //echo $aa;die;
        $pass = random_string('alnum', 6);
		$to = $email;
		$subject = "Forgot Password";
           $body = "<div style='max-width: 600px; width: 100%; margin-left: auto; margin-right: auto;'>
                 <header style='color: #fff; width: 100%;'>
                 <img alt='' src='".SITE_URL."uploads/images/logo.png' width ='120' height='120'/>
                 </header>
                  <div style='margin-top: 10px; padding-right: 10px; padding-left: 125px;padding-bottom: 20px;'>
                  <hr>
                  <h3 style='color: #232F3F;'>Hello ".$login[0]['user_name'].",</h3>
                  <p>You have requested a new password for your lamavie laundry account.</p>
                  <p>Your new password is <span style='background:#2196F3;color:white;padding:0px 5px'>".$pass."</span></p>
                  <hr>
          
                  <p>Warm Regards<br>lamavie laundry<br>Support Team</p>
            
                    </div>
                </div>
        
            </div>";

       $headers = "From: ". SITE_EMAIL . "\r\n";
       $headers.= "MIME-Version: 1.0" . "\r\n";
       $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $body, $headers);
       

		// mail($to, $subject, $body, $headers);

		$ressult['result'] = "Forgot password successfuly";
		$ressult['message'] = 'successfull';
		$ressult['status'] = '1';
		$json = $ressult;
		$this->Webservice_model->update_data('users', ['password' => ($pass) ], $arr_login);
		}
	  else
		{
		$ressult['result'] = 'Email not exist';
		$ressult['message'] = 'unsuccessfull';
		$ressult['status'] = '0';
		$json = $ressult;
		}

        	header('Content-type: application/json');
        	echo json_encode($json);
        	}

    
    
    /************* get_profile function *************/
    public function get_profile(){
    
      $arr_get = ['id'=>$this->input->get_post('user_id')];
    
      $login = $this->Webservice_model->get_where('users',$arr_get);
    
      if($login) {
      
       $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
          $ressult['result']=$login[0];
          $ressult['message']='successfull';
          $ressult['status']='1';
          $json = $ressult;
    
        }else{
     
            $json = ['result'=>'unsuccessfull','status'=>'0','message'=>'Data Not Found'];
    
            }
    
            header('Content-type: application/json');
            echo json_encode($json);
            }
    
        
        
    
    /************* update_profile function *************/
    public function update_profile(){
      $arr_get = ['id'=>$this->input->get_post('user_id')];
      $login = $this->Webservice_model->get_where('users',$arr_get);
      if ($login[0]['id'] == "")
      {
     //   $ressult['result']='Data Not Found';
        $ressult['message']='unsuccessfull';
        $ressult['status']='0';
        $json = $ressult;
    
        header('Content-type:application/json');
        echo json_encode($json);
        die;
      }
        $arr_data = [
            'first_name'=>$this->input->get_post('first_name'),
            'last_name'=>$this->input->get_post('last_name'),
            'email'=>$this->input->get_post('email'),
            'address'=>$this->input->get_post('address'),
            'mobile'=>$this->input->get_post('mobile'),
            'dob'=>$this->input->get_post('dob'),
            'gender'=>$this->input->get_post('gender'),
            'country_code'=>$this->input->get_post('country_code'),
            ];
            $arr_data['user_name'] = $arr_data['first_name'] . ' '.$arr_data['last_name'];
    
      if (isset($_FILES['image']))
      {   
       $ext = end(explode(".",$_FILES['image']['name']));
       $img = "USER_IMG_" . date('YmdHis') . '.'.$ext;
       move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
       $arr_data['image'] = $img;        
      }
    
        /*  if (isset($_FILES['image']))
              {
               $n = rand(0, 100000);
               $img = "USER_IMG_" . $n . '.png';
               move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
               $arr_data['image'] = $img;        
              } */
        $res = $this->Webservice_model->update_data('users',$arr_data,$arr_get);
         if ($res)
             {
              $data[0] = $this->Webservice_model->get_where('users',$arr_get)[0];
              $data[0]['image'] = SITE_URL.'uploads/images/'.$data[0]['image'];        
            
              $ressult['result']=$data[0];
              $ressult['message']='successfull';
              $ressult['status']='1';
              $json = $ressult;
            }
            else
            {
              $ressult['result']='Data Not Found';
              $ressult['message']='unsuccessfull';
              $ressult['status']='0';
              $json = $ressult;
            }
    
    header('Content-type: application/json');
    echo json_encode($json);
    
     }
 
    
    
    /************* update_profile function *************/
    public function update_licence(){
      $arr_get = ['id'=>$this->input->get_post('user_id')];
      $login = $this->Webservice_model->get_where('users',$arr_get);
      if ($login[0]['id'] == "")
      {
     //   $ressult['result']='Data Not Found';
        $ressult['message']='unsuccessfull';
        $ressult['status']='0';
        $json = $ressult;
    
        header('Content-type:application/json');
        echo json_encode($json);
        die;
      }
        $arr_data = [
            'expiration_date'=>$this->input->get_post('expiration_date'),
            'national_id'=>$this->input->get_post('national_id'),
            'license_number'=>$this->input->get_post('license_number'),
            ];
          
    
      if (isset($_FILES['licence']))
      {   
       $ext = end(explode(".",$_FILES['licence']['name']));
       $img = "USER_IMG_" . date('YmdHis') . '.'.$ext;
       move_uploaded_file($_FILES['licence']['tmp_name'], "uploads/images/" . $img);
       $arr_data['licence'] = $img;        
      }
    
        /*  if (isset($_FILES['image']))
              {
               $n = rand(0, 100000);
               $img = "USER_IMG_" . $n . '.png';
               move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
               $arr_data['image'] = $img;        
              } */
        $res = $this->Webservice_model->update_data('users',$arr_data,$arr_get);
         if ($res)
             {
              $data[0] = $this->Webservice_model->get_where('users',$arr_get)[0];
              $data[0]['image'] = SITE_URL.'uploads/images/'.$data[0]['image'];        
            
              $ressult['result']=$data[0];
              $ressult['message']='successfull';
              $ressult['status']='1';
              $json = $ressult;
            }
            else
            {
              $ressult['result']=(object)[];
              $ressult['message']='unsuccessfull';
              $ressult['status']='0';
              $json = $ressult;
            }
    
    header('Content-type: application/json');
    echo json_encode($json);
    
     } 
    
    
/************* social_login function *************/
public function social_login(){

  $arr_data = [
   'user_name'=>$this->input->get_post('user_name'),
   'email'=>$this->input->get_post('email'), 
   'social_id'=>$this->input->get_post('social_id'),
   'dob'=>$this->input->get_post('dob'),
  // 'ios_register_id'=>$this->input->get_post('ios_register_id') 
   
   ];    

  if($arr_data['user_name']==''){
     unset($arr_data['user_name']);
  }
  if($arr_data['dob']==''){
     unset($arr_data['dob']);
  }
  if($arr_data['email']==''){
     unset($arr_data['email']);
  }


  if($arr_data['social_id']==''){
      echo json_encode(['result'=>'social id not found','message'=>'unsuccessfull','status'=>'0']); die;
  }

/*  $image =$this->input->get_post('image');

  if($image!=""){
   $img = "USER_IMG_" . date('Ymdhis') . '_' . rand(1, 10000) . ".png";
   @file_put_contents('uploads/images/'.$img, file_get_contents($image));
   $arr_data['image'] = $img;
  }*/

 $arr_get = ['social_id'=>$arr_data['social_id']];

 $login = $this->Webservice_model->get_where('users',$arr_get);

 if ($login) {  

    $this->Webservice_model->update_data('users',$arr_data,$arr_get);
    $data = $this->Webservice_model->get_where('users',$arr_get);
    $data[0]['image']=SITE_URL.'uploads/images/'.$data[0]['image'];

    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;

  }else{
  
    $id = $this->Webservice_model->insert_data('users',$arr_data);
    $data = $this->Webservice_model->get_where('users',['id'=>$id]);        
    $data[0]['image']=SITE_URL.'uploads/images/'.$data[0]['image'];

    $ressult['result']=$data[0];
    $ressult['message']='successfull';
    $ressult['status']='1';
    $json = $ressult;

  }

  header('Content-type: application/json');
  echo json_encode($json);
}



/*************  get_category *************/
 public function get_category()
	{
	    $category= $this->input->get_post('category_id');
		  $product_id= $this->input->get_post('product_id');
		  $productList = $this->db->query("select * from product where id = '$product_id'")->result_array();
		      if($productList){
        	$category =	$productList[0]['category_id'];
		  $categoryList = $this->db->query("select * from category where id IN($category)")->result_array();
        
	 //	$categoryList = $this->Webservice_model->get_all('category');
     	if ($categoryList){
			foreach($categoryList as $val){
		           $val['image'] = SITE_URL.'/uploads/images/'.$val['image'];
                   $data[] = $val;
			 	}
                   $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
            		}
            	  	else
            		{
			      $json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
	          	}
}else{
          $json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
}
	        	header('Content-type: application/json');
	        	echo json_encode($json);
	}
	
 
  
 
   

	
	
		
	/*************  get_sub_category *************/
 public function get_sub_category()
	{
	  
	    $category= $this->input->get_post('category_id');
		$subcategoryList = $this->Webservice_model->get_where('sub_category',['category_id'=>$category]);
     	if ($subcategoryList)
		{
			foreach($subcategoryList as $val)
			{
			
			 $categoryList = $this->Webservice_model->get_where('category' , ['id'=>$val['category_id']]);  
		     $val['category_name']= $categoryList[0]['category_name'];
            // $val['image'] = SITE_URL.'uploads/images/'.$val['image'];   
			 $data[] = $val;
			}
		       $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
	    	}
	         	else
	     	{
			$json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
	    	}
           	header('Content-type: application/json');
        		echo json_encode($json);
        	}
  
  
	
		
	/*************  get_child_category *************/
 public function get_child_category()
	{
	  
	    $sub_category_id= $this->input->get_post('sub_category_id');
		$subcategoryList = $this->Webservice_model->get_where('child_category',['sub_category_id'=>$sub_category_id,'status'=>'ENABLE']);
     	if ($subcategoryList)
		{
			foreach($subcategoryList as $val)
			{
		$category_id =	    $val['category_id'];
			
			 $categoryList = $this->Webservice_model->get_where('category' , ['id'=>$val['category_id']]);  
		     $val['category_name']= $categoryList[0]['category_name'];
             $val['image'] = SITE_URL.'uploads/images/'.$categoryList[0]['image']; 
             
              
             $sub_categoryList = $this->Webservice_model->get_where('sub_category' , ['id'=>$val['sub_category_id']]);  
		     $val['sub_cat_name']= $sub_categoryList[0]['sub_cat_name'];
		     
		     
		     
		     
		     
      
             
			 $data[] = $val;
			}
		       $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
	    	}
	         	else
	     	{
			$json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
	    	}
           	header('Content-type: application/json');
        		echo json_encode($json);
        	}
  
  	
	/*************  get_all_child_category *************/
 public function get_all_child_category()
	{
	  
	   
		$subcategoryList = $this->Webservice_model->get_where('child_category',['status'=>'ENABLE']);
     	if ($subcategoryList)
		{
			foreach($subcategoryList as $val)
			{
			
			 $categoryList = $this->Webservice_model->get_where('category' , ['id'=>$val['category_id']]);  
		     $val['category_name']= $categoryList[0]['category_name'];
             $val['image'] = SITE_URL.'uploads/images/'.$categoryList[0]['image']; 
             
             $sub_categoryList = $this->Webservice_model->get_where('sub_category' , ['id'=>$val['sub_category_id']]);  
		     $val['sub_cat_name']= $sub_categoryList[0]['sub_cat_name'];
      
             
			 $data[] = $val;
			}
		       $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
	    	}
	         	else
	     	{
			$json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
	    	}
           	header('Content-type: application/json');
        		echo json_encode($json);
        	}
  
  
  
  
  
  
  /*********** search_sub_category function****************/
    public function search_sub_category()
    {
        
       $sub_cat_name =  $this->input->get_post('sub_cat_name');
        if($sub_cat_name!=''){
        
        $arr_data = ['sub_cat_name'=>$this->input->get_post('sub_cat_name')]; 
        
        $select = $this->db->query("select * from sub_category where sub_cat_name like '".$arr_data['sub_cat_name']."%'")->result_array();
            if($select)
            {
                foreach($select as $val)
                {
                   	 $categoryList = $this->Webservice_model->get_where('category' , ['id'=>$val['category_id']]);  
		             $val['category_name']= $categoryList[0]['category_name']; 
                    
                    
                    $data[] = $val;
                }
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;
            }else
            {
                $json = ['result'=>[],'status'=>'0','message'=>'data not found'];
            }
        }else{
            $json = ['result'=>[],'status'=>'0','message'=>'data not found'];
        }
        
          header('Content-type:application/json');
          echo json_encode($json);
    }
    
  
  
  
             /************* add_extra_item function *************/

    public function add_extra_item(){

             $user_id = $this->input->get_post('user_id');
             $extra_item_id = $this->input->get_post('extra_item_id');
             $cart_id = $this->input->get_post('cart_id');   
              
             $arr_get = ['user_id' =>$user_id,'id'=>$cart_id];  
             $arr_data = ['extra_item_id' => $extra_item_id];
                        
          $login = $this->Webservice_model->get_where('add_to_cart',$arr_get);
            if ($login) {                                
               $this->Webservice_model->update_data('add_to_cart',$arr_data,$arr_get);
                $ressult['result']='cart update successfull';
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;

      }else{
              	$json = ['result'=>'data not found','message'=>'unsuccessfull','status'=>'0'];      
      }

            header('Content-type:application/json');
            echo json_encode($json);
            }

  
/************* add_to_cart1 function *************/

    public function add_to_cart(){

                    $user_id = $this->input->get_post('user_id');
                    $child_cat_id = $this->input->get_post('child_cat_id');
                    $quantity = $this->input->get_post('quantity');
                       
                   $arr_data = [
                        'user_id' => $user_id,
                        'child_cat_id' => $child_cat_id,
                        'quantity' => $quantity,
                        'date' => date('Y-m-d'), 
                        'time' => date('h:i:s'),
                         ];
                         
           $arr_get = ['user_id' => $user_id,'child_cat_id' => $child_cat_id, 'status' => 'Pending'];        
                         
          $login = $this->Webservice_model->get_where('add_to_cart',$arr_get);
             if ($login) {                                
               $this->Webservice_model->update_data('add_to_cart',$arr_data,$arr_get);
                $ressult['result']='cart update successfull';
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;

      }else{
                $this->Webservice_model->insert_data('add_to_cart',$arr_data);
                $ressult['result']='add to cart successfull';
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;       
      }

            header('Content-type:application/json');
            echo json_encode($json);
            }


                /************* get_cart function *************/

    public function get_cart(){

                        $user_id = $this->input->get_post('user_id');
                        $arr_get = ['user_id' => $user_id, 'status' =>'Pending'];
                        
                       $fetch = $this->Webservice_model->get_where('add_to_cart',$arr_get);
                       if ($fetch) {                                
                             foreach($fetch as $val) {
                                 
                                        
                        $get = $this->Webservice_model->get_where('child_category',['id'=>$val['child_cat_id']]);
                        $total11 = ($get[0]['price']*$val['quantity']);
                             $val['price'] = $get[0]['price'];
                             $val['child_cate_name'] = $get[0]['child_cate_name'];
                             $total_amount2 =  $total11 ;
                             $extra_item_id = $val['extra_item_id'];
                             
                          
			    
		$cate_id = explode(',', $extra_item_id);
         foreach ($cate_id as $vv) {
                $cate_details = $this->Webservice_model->get_where('extra_options_item', ['id' => $vv]);
                if ($cate_details) {
                     $extra_price += $cate_details[0]['price'];
                    $val['extra_options_item'][] = $cate_details[0];
                } else {
                    $val['extra_options_item'] = [];
                }
            } 
                             
                             
                             
                             
                             
                        //   $extra_options_item = $this->db->query("select * from extra_options_item ")->result_array();
                        //     foreach($extra_options_item as $val1){
                        //     $exp = explode(',',$extra_item_id) ;
                        //     if (in_array($val1['id'], $exp)){
                        //     $val1['status'] = "true";
                        //     $extra_price += $val1['price']; 
                        //     }else{
                        //     $val1['status'] = "false";
                        //     }
                        //     $val['extra_options_item'][] = $val1;
                        //     } 
                                   
                            $val['extra_price'] = ''.$extra_price.'';
                            $total_extra_price = $val['extra_price'] + $total_amount2 ;
                            $total[] = $total_extra_price;
                            
                           
                            $data[] = $val;
                             }
                              
                            $ressult['result']=$data;
                           $ressult['total'] = (int)array_sum($total);
                            $ressult['message']='successfull';
                            $ressult['status']='1';
                            $json = $ressult;

                            }else{
                            
                            $ressult['result']=[];
                            $ressult['message']='unsuccessfull';
                            $ressult['status']='0';
                            $json = $ressult;       
                            }
                            
                            header('Content-type:application/json');
                            echo json_encode($json);
                            }

  
  
     /*********** delete_address function****************/
    public function delete_cart()
    {
        $arr_data = 
        ['id'=>$this->input->get_post('cart_id'),
         'user_id'=>$this->input->get_post('user_id')]; 
        
        $delete = $this->Webservice_model->delete_data('add_to_cart',$arr_data);
            if($delete)
            {
                
             //   $ressult['result']='successfull';
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;
            }else
            {
                $json = ['status'=>'0','message'=>'data not found'];
            }
        
          header('Content-type:application/json');
          echo json_encode($json);
    }
    
  
  
/*************  get_banner *************/
 public function get_banner()
	{
	  	$categoryList = $this->Webservice_model->get_all('banner');
     	if ($categoryList){
			foreach($categoryList as $val){
		           $val['image'] = SITE_URL.'/uploads/images/'.$val['image'];
                   $data[] = $val;
			 	}
                   $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
            		}
            	  	else
            		{
			      $json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
	          	}

	        	header('Content-type: application/json');
	        	echo json_encode($json);
	}
	
 
  
  	/*********** add_address function *************/
	public function add_address()
	{
	    
	    
	    $arr_data = [
	     'user_id' => $this->input->get_post('user_id'),
	     'address' => $this->input->get_post('address'),
	     'lat' => $this->input->get_post('lat'),
	     'lon' => $this->input->get_post('lon'),
	     'type' => $this->input->get_post('type'),
	     'country_code'=>$this->input->get_post('country_code'),
         'mobile'=>$this->input->get_post('mobile'),
	   ];


$arr_get = ['user_id' => $arr_data['user_id'],'type' => $arr_data['type']];
            $login = $this->Webservice_model->get_where('add_address',$arr_get);
            if ($login) {
                   $ressult['result']=(object)[];
                   $ressult['message']='address already exist';
                   $ressult['status']='0';
                   $json = $ressult;
                   header('Content-type:application/json');
                   echo json_encode($json);
                die;
               } 


           $id = $this->Webservice_model->insert_data('add_address',$arr_data);
	     
          if ($id=="") {
            $json = ['status'=>'0','message'=>'data not found'];
          }else{
                                  
            $arr_gets = ['id'=>$id];// print_r($arr_gets);
            $login = $this->Webservice_model->get_where('add_address',$arr_gets); 
           // $city = $this->Webservice_model->get_where('kuwait_city',['id'=>$login[0]['area']]); 
         //   $login[0]['area'] = $city[0]['city_name'];
          //  $ressult['result']=$login[0];
            $ressult['message']='successfull';
            $ressult['status']='1';
            $json = $ressult;
          }
    
          header('Content-type:application/json');
          echo json_encode($json);

        	    
        	}
  
  
  


  /*************  country_list *************/
    public

    function get_address()
    {      
        
        $user_id = $this->input->get_post('user_id');
                          
      $fetch = $this->Webservice_model->get_where('add_address',['user_id'=>$user_id]);
     
            
      if ($fetch) {
                        foreach($fetch as $val) {
                        $data[] = $val;
                        }
                         
                          $ressult['result']=$data;
                          $ressult['message']='successful';
                          $ressult['status']='1';
                          $json = $ressult;                      
                         

      }
      else {
                          $ressult['result']=[];
                          $ressult['message']='unsuccessful';
                          $ressult['status']='0';
                          $json = $ressult;
      }

      header('Content-type: application/json');
      echo json_encode($json);

    }
    
    
    
    
    
    
    
    
    
      
    /************ update_address function *************/
    public function update_address()
    {
         $arr_get = [
        'user_id'=>$this->input->get_post('user_id'),
        'id'=>$this->input->get_post('address_id')
        ];
        
        $arr_data = [
         'address' => $this->input->get_post('address'),
	     'lat' => $this->input->get_post('lat'),
	     'lon' => $this->input->get_post('lon'),
	     'country_code'=>$this->input->get_post('country_code'),
         'mobile'=>$this->input->get_post('mobile'),
	    ];

        
        $address = $this->Webservice_model->get_where('add_address' , $arr_get);
            if($address)
            {
               $res =  $this->Webservice_model->update_data('add_address', $arr_data,$arr_get);  
                //$ressult['result']='successfull';
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;
            }else
            {
                $json = ['status'=>'0','message'=>'data not found'];
            }
            
          header('Content-type:application/json');
          echo json_encode($json);
        
    }
    
   
    
     /*********** delete_address function****************/
    public function delete_address()
    {
        $arr_data = ['id'=>$this->input->get_post('address_id'),
        'user_id'=>$this->input->get_post('user_id')]; 
        
        $delete = $this->Webservice_model->delete_data('add_address',$arr_data);
            if($delete)
            {
                
             //   $ressult['result']='successfull';
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;
            }else
            {
                $json = ['status'=>'0','message'=>'data not found'];
            }
        
          header('Content-type:application/json');
          echo json_encode($json);
    }
    
    
     /************* update_lat_lon function *************/
  public

    function update_lat_lon()
  {
    $id = $this->input->get_post('user_id', TRUE);
    $lat = $this->input->get_post('lat', TRUE);
    $lon = $this->input->get_post('lon', TRUE);
    $arr_login = ['id' => $id];
    $login = $this->Webservice_model->get_where('users', $arr_login);
    $arr_data = ['lat' => $lat,'lon' => $lon];
    if ($login) {
      $this->Webservice_model->update_data('users', $arr_data, $arr_login);
      $ressult['result'] = "Change lat lon successfuly";
      $ressult['message'] = 'successfull';
      $ressult['status'] = '1';
      $json = $ressult;
    }
    else {
      $ressult['result'] = "Data not found";
      $ressult['message'] = 'unsuccessfull';
      $ressult['status'] = '0';
      $json = $ressult;
    }

    header('Content-type: application/json');
    echo json_encode($json);
  }
    
    
    
    /*************  extra_options *************/
 public function get_extra_options()
	{
	  	$extra_options_item = $this->Webservice_model->get_all('extra_options_item');
     	if ($extra_options_item){
			foreach($extra_options_item as $val){
		        //   $val['image'] = SITE_URL.'/uploads/images/'.$val['image'];
                   $data[] = $val;
			 	}
                   $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
            		}
            	  	else
            		{
			      $json = ['result'=>[],'message'=>'unsuccessfull','status'=>'0']; 
	          	}

	        	header('Content-type: application/json');
	        	echo json_encode($json);
	}
	
    

/*-----------------------------------------------------------end api------------------------------------------------------------------------------------------*/















  /*************  country_list *************/
    public

    function country_list()
    {                     
                          
      $fetch = $this->Webservice_model->get_all('country');
     
            
      if ($fetch) {

                          foreach($fetch as $val)
                          {
                            $val['flag']=SITE_URL.'uploads/flags/'.$val['flag'];
                            $data[] = $val;
        
                          }
                         
                          $ressult['result']=$data;
                          $ressult['message']='successful';
                          $ressult['status']='1';
                          $json = $ressult;                      
                         

      }
      else {
                          $ressult['result']='Data Not Found';
                          $ressult['message']='unsuccessful';
                          $ressult['status']='0';
                          $json = $ressult;
      }

      header('Content-type: application/json');
      echo json_encode($json);

    }
    
    
    
  public function add_workout(){
    
                   $arr_data = [
                        'user_id'=>$this->input->get_post('user_id'),
                        'content'=>$this->input->get_post('content'),
                        'goaltime'=>$this->input->get_post('goaltime'),
                        'subcategory_id'=>$this->input->get_post('subcategory_id'),
                        'type'=>$this->input->get_post('type'),
                        'lat'=>$this->input->get_post('lat'),
                        'lon'=>$this->input->get_post('lon')
                        ];
                            if (isset($_FILES['image']))
                            {   
                            $ext = end(explode(".",$_FILES['image']['name']));
                            $img = "POST_IMG_" . date('YmdHis') . '.'.$ext;
                            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                            $arr_data['image'] = $img;        
                            }   
                        
                    $resultId = $this->Webservice_model->insert_data('post',$arr_data);
                   
                    if ($resultId=="") {
                    $json = ['result'=>'unsuccessfull','status'=>0,'message'=>'data not found'];
                     }else{
                    $arr_gets = ['id'=>$resultId];
                    $post_details = $this->Webservice_model->get_where('post',$arr_gets); 
                    $post_details[0]['image']=SITE_URL.'uploads/images/'.$post_details[0]['image'];
                    $ressult['result']=$post_details[0];
                    $ressult['message']='successfull';
                    $ressult['status']='1';
                    $json = $ressult;
                      }
            
                     header('Content-type:application/json');
                     echo json_encode($json);
                   }  
  


 /************* get_profile function *************/
    public function get_workout(){
    
     // $user_id=$this->input->get_post('user_id');
      $post = $this->Webservice_model->get_where('post',['type'=>'WORKOUT']);
    
      if($post) {
       foreach($post as $val){
                  $post_user_id = $val['user_id'];  
                  $subcategory_id = $val['subcategory_id'];
                   $users = $this->Webservice_model->get_where('users',['id'=>$post_user_id]); 
                   $sub_category = $this->Webservice_model->get_where('sub_category',['id'=>$subcategory_id]); 
                  
                 /*  $like = $this->Webservice_model->get_where('like',['user_id'=>$user_id,'post_id'=>$post_id]); 
                     $total_like = $this->Webservice_model->get_where('like',['post_id'=>$post_id]);  
                
                  if($like){
                             $val['like'] = 'like'; 
                              }else{
                             $val['like'] = 'unlike'; 
                            }
                      if($total_like){
                          $val['like_count'] = count($total_like);
                          }else{
                         $val['like_count'] = 0; 
                           }*/
               //   $users[0]['image']=SITE_URL.'uploads/images/'.$users[0]['image'];
                  // $val['users'] = $users[0];
                      $val['sub_cat_name'] = $sub_category[0]['sub_cat_name'];
                      $val['image']=SITE_URL.'uploads/images/'.$val['image'];
                       $data[] = $val;
                            }
                            
                            $ressult['result']=$data;
                            $ressult['message']='successfull';
                            $ressult['status']='1';
                            $json = $ressult;
                 }else{
    
                      $json = ['result'=>'no post available','status'=>'0','message'=>'Data Not Found'];
                     }
    
                    header('Content-type: application/json');
                    echo json_encode($json);
                    }
                    



    
    
  
    
/************ add_update_like function ************/

  public function add_update_like(){
          $arr_data = [
                  'user_id'=>$this->input->get_post('user_id'),
                  'post_id'=>$this->input->get_post('post_id')
                   ];
                   $arr_get = ['user_id' => $arr_data['user_id'],'post_id' => $arr_data['post_id']];
                   $login  = $this->Webservice_model->get_where('like',$arr_get);
                 if ($login) {
                    $this->Webservice_model->delete_data('like',$arr_get);
                    $fav_product = $this->Webservice_model->get_where('like',['post_id' => $arr_data['post_id']]);
                    $ressult['result']='unlike successfull';
                    $ressult['message']='successfull';
                    $ressult['status']='1';
                    $json = $ressult;
                
                    header('Content-type:application/json');
                    echo json_encode($json);
                    die;
                     }     


             $id = $this->Webservice_model->insert_data('like',$arr_data);

                 if ($id=="") {
                  $json = ['result'=>'unsuccessfull','message'=>'data not found','status'=>0];
                }else{
                  $fav_product = $this->Webservice_model->get_where('like',['post_id' => $arr_data['post_id']]);
                    
                  $ressult['result']='Like  successfull';
                  $ressult['message']='successfull';
                  $ressult['status']='1';
                  $json = $ressult;
                    }
                    
                    header('Content-type:application/json');
                    echo json_encode($json);
                    
                    }


  
  
  
  
  
  
  
   public function add_follow_unfollow(){
          $arr_data = [
                  'user_id'=>$this->input->get_post('user_id'),
                  'follow_id'=>$this->input->get_post('follow_id')
                   ];
                  $arr_get = ['user_id' => $arr_data['user_id'],'follow_id' => $arr_data['follow_id']];
                  $login  = $this->Webservice_model->get_where('follow_detail',$arr_get);
             if ($login) {
                   $this->Webservice_model->delete_data('follow_detail',$arr_get);
                   $fav_product = $this->Webservice_model->get_where('follow_detail',['follow_id' => $arr_data['follow_id']]);
                   
                   
                    $ressult['result']='unfollowing successfull';
                    $ressult['message']='successfull';
                    $ressult['status']='0';
                    $json = $ressult;
                
                    header('Content-type:application/json');
                    echo json_encode($json);
                    die;
                     }     


             $id = $this->Webservice_model->insert_data('follow_detail',$arr_data);

                 if ($id=="") {
                  $json = ['result'=>'unsuccessfull','message'=>'data not found','status'=>0];
                }else{
                  $fav_product = $this->Webservice_model->get_where('follow_detail',['follow_id' => $arr_data['follow_id']]);
                    
                  $ressult['result']='following  successfull';
                  $ressult['message']='successfull';
                  $ressult['status']='1';
                  $json = $ressult;
                    }
                    
                    header('Content-type:application/json');
                    echo json_encode($json);
                    
                    }

  
  
    public function add_comment(){
    
                   $arr_data = [
                        'user_id'=>$this->input->get_post('user_id'),
                        'comment'=>$this->input->get_post('comment'),
                        'post_id'=>$this->input->get_post('post_id'),
                        ];
                    $resultId = $this->Webservice_model->insert_data('comment',$arr_data);
                   
                    if ($resultId=="") {
                    $json = ['result'=>'unsuccessfull','status'=>0,'message'=>'data not found'];
                     }else{
                    $arr_gets = ['id'=>$resultId];
                    $post_details = $this->Webservice_model->get_where('comment',$arr_gets); 
                    $ressult['result']=$post_details[0];
                    $ressult['message']='successfull';
                    $ressult['status']='1';
                    $json = $ressult;
                      }
            
                     header('Content-type:application/json');
                     echo json_encode($json);
                   }  
    

 /************* get_profile function *************/
    public function get_comment(){
                     $user_id=$this->input->get_post('user_id');
                     $post_id=$this->input->get_post('post_id');
                     
                  $login = $this->Webservice_model->get_where('comment',['post_id' =>$post_id]);
              
                 if($login) {
                  foreach($login as $val){
                     
                        $post = $this->Webservice_model->get_where('post',['id' => $val['post_id']]);
                        $user_details = $this->Webservice_model->get_where('users',['id' => $post[0]['user_id']]);
                        $user_details[0]['image']=SITE_URL.'uploads/images/'.$user_details[0]['image'];
                        $val['user_details']  = $user_details[0];
                        $data[] = $val;
                        }
                  // $login[0]['image']=SITE_URL.'uploads/images/'.$login[0]['image'];
                            $ressult['result']=$data;
                            $ressult['message']='successfull';
                            $ressult['status']='1';
                            $json = $ressult;
                 }else{
    
                      $json = ['result'=>'unsuccessfull','status'=>'0','message'=>'Data Not Found'];
                     }
    
                    header('Content-type: application/json');
                    echo json_encode($json);
                    }
  
 
  

  function apply_code()
  {
    $code =  $this->input->get_post('code');
    $user_id =  $this->input->get_post('user_id');
    $arr_get = ['coupon_code' => $code, 'status' => 'Active'];

    $fetch = $this->Webservice_model->get_where('coupon_codes', $arr_get);
    $check = $this->Webservice_model->get_where('apply_codes', ['user_id'=>$user_id,'coupon_code'=>$code]);
    
    $valid_from = strtotime($fetch[0]['valid_from']);
    $valid_to = strtotime($fetch[0]['valid_to']);
    $now = strtotime(date('Y-m-d'));
    
    if($valid_from < $now && $valid_to < $now){ 
      
      $json['result'] = (object)[];
      $json['message'] = 'code already expired';
      $json['status'] = 0;
      
    } else  if ($check && count($check) >= $fetch[0]['used']) {  
      
      $json['result'] = (object)[];
      $json['message'] = 'code already used';
      $json['status'] = 0;
      
    } else if($fetch){ 
      
      $json['result'] = $fetch[0];
      $json['message'] = 'successfull';
      $json['status'] = 1;
      
    } else{
      
      $json['result'] = (object)[];
      $json['message'] = 'code not exist';
      $json['status'] = 0;
      
    }

    header('Content-type: application/json');
    echo json_encode($json);
  }
  
 public function add_placeorder(){

              $invoiceorder=  (rand(10,100000000));
              
              
              
	   
	           $user_id = $this->input->get_post('user_id');
               $cart_id = $this->input->get_post('cart_id');
               $coupon_code = $this->input->get_post('coupon_code');
               $payment_type = $this->input->get_post('payment_type');
               $price = $this->input->get_post('price');
               
                 $add_to_cart= $this->Webservice_model->get_where('add_to_cart',['id'=>$cart_id]);
               
                     
                  $arr_data = [
                    'invoice'=>$invoiceorder,
                    'user_id'=>$this->input->get_post('user_id'),
                    'pickup_date'=>$this->input->get_post('pickup_date'),
                    'pickup_time'=>$this->input->get_post('pickup_time'),
                    'price'=>$this->input->get_post('price'),   
                    //'item_id'=>$this->input->get_post('item_id'),
                    'cart_id'=>$this->input->get_post('cart_id'),
                    'payment_type'=>$this->input->get_post('payment_type'),
                    'lat'=>$this->input->get_post('lat'),
                    'lon'=>$this->input->get_post('lon'),
                    'delivery_date'=>$this->input->get_post('delivery_date'),
                    'delivery_time'=>$this->input->get_post('delivery_time'),
                    'address'=>$this->input->get_post('address'),
                    'address_type'=>$this->input->get_post('address_type'),
                    'pickup_address'=>$this->input->get_post('pickup_address'),
                    'pickup_lat'=>$this->input->get_post('pickup_lat'),
                    'pickup_lon'=>$this->input->get_post('pickup_lon'),
                        ];
                     $id = $this->Webservice_model->insert_data('place_order',$arr_data);
                     if ($id=="") {
                     $json = ['order_id'=>'','status'=>0,'message'=>'data not found'];
                     }else{
                          if($payment_type =='Wallet'){
                         $this->db->query("UPDATE `users` SET `wallet_amount` = wallet_amount-($price) WHERE `id` = $user_id");
                          }
                         
                         if($coupon_code !=''){ 
                      $this->Webservice_model->insert_data('apply_codes', ['user_id'=>$user_id,'coupon_code'=>$coupon_code]);    
                         }
                        
                         
         $arr_data12 = [
                    'user_id'=>$this->input->get_post('user_id'),
                    'amount'=>$this->input->get_post('price'),
                    'child_cat_id'=>$add_to_cart[0]['child_cat_id'],
                     ];
                      $this->Webservice_model->insert_data('transaction',$arr_data12);
                      
                      
                      /*------------------------------------------------wallet point-------------------------------------------*/
                      
                   $child_category =    $this->Webservice_model->insert_data('child_category',['id'=>$add_to_cart[0]['child_cat_id']]);
                   $point = $child_category[0]['product_point'];
                      
                  $this->db->query("UPDATE `users` SET `wallet_point` = wallet_point+($point) WHERE `id` = $user_id"); 
                          
                         
                         
                         
                      $arr_gets = ['id'=>$id];
                      $where = "id  IN($cart_id)";
                      $this->Webservice_model->update_data('add_to_cart',['status'=>'Complete'],$where);      
                      $login = $this->Webservice_model->get_where('place_order',['id'=>$id]);
                        $ressult['order_id']=$id;
                        $ressult['message']='successfull';
                        $ressult['status']='1';
                        $json = $ressult;
                          }
                         header('Content-type:application/json');
                         echo json_encode($json);
                        }
                        
                        
                        
             
public function get_orderdetails_driver_by_status()
{
        $user_id = $this->input->get_post('user_id');   
         $status = $this->input->get_post('status'); 
         
        $fetch = $this->db->query("select * from place_order where driver_id = '$user_id' AND status = '$status' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $where = ['id'=>$val['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $val['user_details']=$users[0];
             
               $cart_id = $val['cart_id'];
               $cart_ids = explode(',', $cart_id);
            

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                 $item_id =    $add_to_cart[0]['child_cat_id'];
                 
                  $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                   if($add_to_cart[0]['extra_item_id']){          
                                   $extra_options_item = $this->Webservice_model->get_where('extra_options_item',"id  IN(".$add_to_cart[0]['extra_item_id'].")"); 
                                     $extra_options1 =  [];
                                     foreach($extra_options_item as $extra_options)  {
                                      $extra_options1[] = $extra_options;
                                        }    
                                       $child_category[0]['extra_options'] = $extra_options1;        
                                     }  
                                       $val['item_details'][] =  $child_category[0];
                                   }
                                 }
             
                               $data[] = $val;
  
                            }  
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}
                               
           
public function get_order_details()
{
         $user_id = $this->input->get_post('user_id');   
         $type = $this->input->get_post('type'); 
         if($type=='USER'){
         $fetch = $this->db->query("select * from place_order where user_id = '$user_id' AND status IN('Confirmed','Pickup','Progress','Shipped') ORDER BY id DESC ")->result_array();
         }else{
         $fetch = $this->db->query("select * from place_order where driver_id = '$user_id' AND status IN('Confirmed','Pickup','Progress','Shipped') ORDER BY id DESC ")->result_array();     
         }
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $where = ['id'=>$val['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $val['user_details']=$users[0];
             $where1 = ['id'=>$val['driver_id']]; 
             $driver_details = $this->Webservice_model->get_where('users',$where1);  
             $driver_details[0]['image'] =SITE_URL . "uploads/images/" . $driver_details[0]['image'];
             $val['driver_details']=$driver_details[0];
               $cart_id = $val['cart_id'];

               $cart_ids = explode(',', $cart_id);
            // $ext = end(explode(".",$_FILES['image']['name']));

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                 $item_id =    $add_to_cart[0]['child_cat_id'];
                    
                    
                    $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                   $val['item_details'][] =  $child_category[0];
                    
                    
                   // $chd_details[0]['image'] = SITE_URL . 'uploads/images/' . $chd_details[0]['image'];
                 
                }
            }
             
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}
       
       
            
public function get_order_delivered()
{
         $user_id = $this->input->get_post('user_id');   
         $type = $this->input->get_post('type'); 
         if($type=='USER'){
         $fetch = $this->db->query("select * from place_order where user_id = '$user_id' AND status IN('Delivered') ORDER BY id DESC ")->result_array();
         }else{
         $fetch = $this->db->query("select * from place_order where driver_id = '$user_id' AND status IN('Delivered') ORDER BY id DESC ")->result_array();     
         }
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $where = ['id'=>$val['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $val['user_details']=$users[0];
             $where1 = ['id'=>$val['driver_id']]; 
             $driver_details = $this->Webservice_model->get_where('users',$where1);  
             $driver_details[0]['image'] =SITE_URL . "uploads/images/" . $driver_details[0]['image'];
             $val['driver_details']=$driver_details[0];
               $cart_id = $val['cart_id'];

               $cart_ids = explode(',', $cart_id);
            // $ext = end(explode(".",$_FILES['image']['name']));

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                 $item_id =    $add_to_cart[0]['child_cat_id'];
                    
                    
                    $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                   $val['item_details'][] =  $child_category[0];
                    
                    
                   // $chd_details[0]['image'] = SITE_URL . 'uploads/images/' . $chd_details[0]['image'];
                 
                }
            }
             
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}
             
       
       
       
       
       
       
                               
           
public function get_order_history()
{
    
       $user_id = $this->input->get_post('user_id');   
         $type = $this->input->get_post('type'); 
         if($type=='USER'){
         $fetch = $this->db->query("select * from place_order where user_id = '$user_id' AND status IN('Delivered') ORDER BY id DESC ")->result_array();
         }else{
         $fetch = $this->db->query("select * from place_order where driver_id = '$user_id' AND status IN('Delivered') ORDER BY id DESC ")->result_array();     
         }
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $where = ['id'=>$val['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $val['user_details']=$users[0];
             
               $cart_id = $val['cart_id'];

               $cart_ids = explode(',', $cart_id);
            // $ext = end(explode(".",$_FILES['image']['name']));

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                    $item_id =    $add_to_cart[0]['child_cat_id'];
                    $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                    $val['item_details'][] =  $child_category[0];
                    
                    
                 
                 
                }
            }
             
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}
                               
                        
                            
                              
                        
                        
             
public function get_orderdetails_driver()
{

        $user_id = $this->input->get_post('user_id');                       
        $fetch = $this->db->query("select * from place_order where driver_id = '$user_id' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $where = ['id'=>$val['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $val['user_details']=$users[0];
             
               $cart_id = $val['cart_id'];

               $cart_ids = explode(',', $cart_id);
            // $ext = end(explode(".",$_FILES['image']['name']));

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                 $item_id =    $add_to_cart[0]['child_cat_id'];
                    
                    
                    $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                   $val['item_details'][] =  $child_category[0];
                    
                    
                   // $chd_details[0]['image'] = SITE_URL . 'uploads/images/' . $chd_details[0]['image'];
                 
                }
            }
             
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}
           
    public function get_orderhistory()
{

        $user_id = $this->input->get_post('user_id');                       
        $fetch = $this->db->query("select * from place_order where user_id = '$user_id' AND status= 'Delivered' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $where = ['id'=>$val['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $val['user_details']=$users[0];
             
             
              $where = ['id'=>$val['driver_id']]; 
             $drivers = $this->Webservice_model->get_where('users',$where);  
             $drivers[0]['image'] =SITE_URL . "uploads/images/" . $drivers[0]['image'];
             $val['driver_details']=$drivers[0];
             
               $cart_id = $val['cart_id'];

               $cart_ids = explode(',', $cart_id);
            // $ext = end(explode(".",$_FILES['image']['name']));

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                 $item_id =    $add_to_cart[0]['child_cat_id'];
                    
                    
                    $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                   $val['item_details'][] =  $child_category[0];
                    
                    
                   // $chd_details[0]['image'] = SITE_URL . 'uploads/images/' . $chd_details[0]['image'];
                 
                }
            }
             
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}           


 public function get_driver_orderhistory()
{

        $driver_id = $this->input->get_post('driver_id');                       
        $fetch = $this->db->query("select * from place_order where driver_id = '$driver_id' AND status= 'Delivered' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
             $where = ['id'=>$val['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $val['user_details']=$users[0];
             
              $where = ['id'=>$val['driver_id']]; 
             $drivers = $this->Webservice_model->get_where('users',$where);  
             $drivers[0]['image'] =SITE_URL . "uploads/images/" . $drivers[0]['image'];
             $val['driver_details']=$drivers[0];
             
               $cart_id = $val['cart_id'];

               $cart_ids = explode(',', $cart_id);
            // $ext = end(explode(".",$_FILES['image']['name']));

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                 $item_id =    $add_to_cart[0]['child_cat_id'];
                    
                    
                    $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                   $val['item_details'][] =  $child_category[0];
                    
                    
                   // $chd_details[0]['image'] = SITE_URL . 'uploads/images/' . $chd_details[0]['image'];
                 
                }
            }
             
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}             
     
 public function get_order_status_history()
{

        $order_id = $this->input->get_post('order_id');                       
        $fetch = $this->db->query("select * from order_status_history where order_id = '$order_id' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {

           $data[] = $val;
  
        } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}              
     
             
public function get_orderdetails_byid()
{
    
    
        $order_id = $this->input->get_post('order_id');                       
        $fetch = $this->db->query("select * from place_order where id = '$order_id'")->result_array();
       if ($fetch)
        {                                
         
             $where = ['id'=>$fetch[0]['user_id']]; 
             $users = $this->Webservice_model->get_where('users',$where);  
             $users[0]['image'] =SITE_URL . "uploads/images/" . $users[0]['image'];
             $fetch[0]['user_details']=$users[0];
             
             
                 $where1 = ['id'=>$fetch[0]['driver_id']]; 
             $driver_details = $this->Webservice_model->get_where('users',$where1);  
             $driver_details[0]['image'] =SITE_URL . "uploads/images/" . $driver_details[0]['image'];
             $fetch[0]['driver_details']=$driver_details[0];
             
             
             
               $cart_id = $fetch[0]['cart_id'];

               $cart_ids = explode(',', $cart_id);
            // $ext = end(explode(".",$_FILES['image']['name']));

            foreach ($cart_ids as $vv) {
                $add_to_cart = $this->Webservice_model->get_where('add_to_cart', ['id' => $vv]);
                if ($add_to_cart) {
                 $item_id =    $add_to_cart[0]['child_cat_id'];
                    
                    
                      $child_category = $this->Webservice_model->get_where('child_category', ['id' => $item_id]);
                      $child_category[0]['quantity'] = $add_to_cart[0]['quantity'];
                      $child_category[0]['item_id'] = $add_to_cart[0]['id'];
                      
                      
                        if($add_to_cart[0]['extra_item_id']){          
                                              
                                    $extra_options_item = $this->Webservice_model->get_where('extra_options_item',"id  IN(".$add_to_cart[0]['extra_item_id'].")"); 
                                     $extra_options1 =  [];
                                     
                                     
                                    foreach($extra_options_item as $extra_options)
                                  {
                                      $extra_options1[] = $extra_options;
                                      
                                  }    
                                       $child_category[0]['extra_options'] = $extra_options1;        
                                                
                                     }  else{
                                          $child_category[0]['extra_options'] = [];  
                                     }
                                        
                      
                         
                     $fetch[0]['item_details'][] =  $child_category[0];
                 }
                 else{
                      $fetch[0]['item_details'][] ='';
                 }
                 
                 
                 
                 
                 
            }
             
           $data = $fetch[0];
  
             
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
               // $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']=(object)[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}
           
                           
                        
      
  public

  function change_password()
  {
    $user_id =   $this->input->get_post('user_id');
     $arr_get = ['id' => $this->input->get_post('user_id')];
     $login = $this->Webservice_model->get_where('users', $arr_get);
    if ($login[0]['id'] == "") {
      $json = ['result' => (object)[], 'status' => '0', 'message' => 'unsuccessfull']; 
      header('Content-type:application/json');
      echo json_encode($json);
      die;
    }
    $arr_data = [
      'password'=>$this->input->get_post('password'),
      ];

  
    $res = $this->Webservice_model->update_data('users', $arr_data, ['id'=>$user_id]);
    if ($res) {
      $data = $this->Webservice_model->get_where('users', ['id'=>$user_id]);
      $data[0]['image'] = SITE_URL . 'uploads/images/' . $data[0]['image'];
   
      $json = ['result' => $data[0], 'status' => '1', 'message' => 'successfull'];  
    }
    else {
      $json = ['result' => (object)[], 'status' => '0', 'message' => 'unsuccessfull'];

    }

    header('Content-type: application/json');
    echo json_encode($json);
  }
                     
                        
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
                        
                        

public function get_my_order()
{
    
    
  $user_id = $this->input->get_post('user_id');                       
  $fetch = $this->db->query("select * from place_order where user_id = '$user_id' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
          foreach($fetch as $val)
        {
           $where = ['id'=>$val['restaurant_id']]; 
           
           $restaurant = $this->Webservice_model->get_where('restaurant',$where);  
        
           $val['restaurant_name']=$restaurant[0]['name'];
           $val['restaurant_image'] =SITE_URL . "uploads/images/" . $restaurant[0]['image'];
           $val['restaurant_lat']=$restaurant[0]['lat'];
           $val['restaurant_lon']=$restaurant[0]['lon'];
           
           $data[] = $val;
  
            } 
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
                $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']='no data found';
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}






/************* get_cart function *************/

public function get_orderdetails()
{
  $order_id = $this->input->get_post('order_id');                       
  $place_order = $this->db->query("select * from place_order where id = '$order_id' ORDER BY id DESC ")->result_array();
 
       if ($place_order)
        { 
         
            $item_id =  $place_order[0]['user_id']; 
           $fetch = $this->Webservice_model->get_where('add_to_data',['user_id'=>$item_id]);
           
          //  $fetch = $this->db->query("SELECT * FROM `restaurant_menu` WHERE `id`  IN ($item_id)")->result_array();
            
     foreach($fetch as $val)
        {
           $where = ['id'=>$val['item_id']]; 
           
           $fetch = $this->Webservice_model->get_where('restaurant_menu',$where);
           $sub_category = $this->Webservice_model->get_where('sub_category',$where);
           $fetch[0]['cousin_name']=$sub_category[0]['cousin_name'];
          $fetch[0]['product_id']=$val['restaurant_menu_id'];
           $fetch[0]['quantity']=$val['quantity'];                               
           $fetch[0]['item_id']=$val['item_id'];
           $fetch[0]['cart_id']=$val['id'];
           $fetch[0]['image'] =SITE_URL . "uploads/images/" . $fetch[0]['image'];
           $total[] = ($fetch[0]['price']*$val['quantity']);
           $data[] = $fetch[0];
  
            }
               $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
                $ressult['total_amount']= array_sum($total);
                $json = $ressult;
              }else{
                                
                $ressult['result']='no data found';
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
}






public function get_orderdetails1()
{
    
    
  $order_id = $this->input->get_post('order_id');                       
  $fetch = $this->db->query("select * from place_order where id = '$order_id' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
         
           $item_id =  $fetch[0]['item_id']; 
           $restaurant_menu = $this->db->query("SELECT * FROM `restaurant_menu` WHERE `id`  IN ($item_id)")->result_array(); 
            
         foreach($restaurant_menu as $menu){
           $menu['image'] =SITE_URL . "uploads/images/" . $menu['image'];
           $fetch[0]['restaurant_menu'][]  =  $menu;
         }
        
         /*  $fetch[0]['restaurant_name']=$restaurant[0]['name'];
           $val['restaurant_image'] =SITE_URL . "uploads/images/" . $restaurant[0]['image'];
           */
           $data[] = $fetch;
  
            
                $ressult['result']=$data;
                $ressult['message']='successfull';
                $ressult['status']='1';
                $json = $ressult;
              }else{
                                
                $ressult['result']='no data found';
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}




  /****************************************************************************/
  public function driver_accept_and_cancel_order()
  {

    $timezone = $this->input->get_post('timezone');
    date_default_timezone_set($timezone);

    $status = $this->input->get_post('status', TRUE);
    $order_id = $this->input->get_post('order_id', TRUE);
    $date = $this->input->get_post('date', TRUE);
    $time = $this->input->get_post('time', TRUE);
    
  

    $details = $this->Webservice_model->get_where("place_order", ['id'=>$order_id]);

    if ($details) {
      $key   = "your order is " . $this->input->get_post("status");
      $alert = "Your order has been ". $this->input->get_post("status");

     $driver = $this->Webservice_model->get_where("users", ['id' => $details[0]['driver_id']]);
     $users  = $this->Webservice_model->get_where("users", ['id' => $details[0]['user_id']]);

    if ($status == "Confirmed") {
      
        $arr_data = array(
		'order_id' => $order_id ,
		'status' => 'Confirmed',
        'description' => 'Your order has been Confirmed',
        'status_date' => $date,
        'status_time' => $time,
	);

          $this->Webservice_model->update_data("place_order",['confirmdate'=>$date,'confirmtime'=>$time], ['id'=>$order_id]); 
          $res = $this->Webservice_model->insert_data('order_status_history', $arr_data);
    }


    if ($status == "Pickup") {
         $otp = $this->input->get_post('otp', TRUE);
          $details12 = $this->Webservice_model->get_where("place_order", ['id'=>$order_id,'otp'=>$otp]);
            $this->Webservice_model->update_data("place_order",['pickupdate'=>$date,'pickuptime'=>$time], ['id'=>$order_id]); 
              $arr_data = array(
		'order_id' => $order_id ,
		'status' => 'Pickup',
        'description' => 'Your order has been Pickup',
        'status_date' => $date,
        'status_time' => $time,
	);
 $res = $this->Webservice_model->insert_data('order_status_history', $arr_data);
            
            
            
      if(!$details12){
            $ressult['message']='unsuccessfull';
            $ressult['status']=0;
            $json = $ressult; 
            header('Content-type: application/json');
            echo json_encode($json); die;
     
      }
     
    }
    

    if ($status == "Progress") {
       $arr_data = array(
    		'order_id' => $order_id ,
    		'status' => 'Progress',
            'description' => 'Your order has been Progress',
            'status_date' => $date,
            'status_time' => $time,
    	);
     $res = $this->Webservice_model->insert_data('order_status_history', $arr_data);
            

    }

    if ($status == "Shipped") {
           $arr_data = array(
        		'order_id' => $order_id ,
        		'status' => 'Shipped',
                'description' => 'Your order has been Shipped',
                'status_date' => $date,
                'status_time' => $time,
        	);
         $res = $this->Webservice_model->insert_data('order_status_history', $arr_data);

    }
    
  if ($status == "Cancel") {

      $alert = "Your booking request has been canceled by the driver";
            $arr_data = array(
        		'order_id' => $order_id ,
        		'status' => 'Shipped',
                'description' => $alert,
                'status_date' => $date,
                'status_time' => $time,
        	);
         $res = $this->Webservice_model->insert_data('order_status_history', $arr_data);

     }


    $arr_data = array(
      'status' => $status
    );
    $login_go = $this->Webservice_model->update_data("place_order", $arr_data, ['id'=>$order_id]);                

    $user_message_apk1 = array(
      "message" => array(
        "result" => "successful",
        "key" => $status,
        "alert" => $alert,
        'order_id' => $this->input->get_post('order_id', TRUE) ,
        'driver_id' => $driver[0]['id'],
        'driver_firstname' => $driver[0]['first_name'],
        'driver_lastname' => $driver[0]['last_name'],
        'booking_status' => $status,
        "driver_img" => SITE_URL . "uploads/images/" . $driver[0]['image'],
     
      )
    );
    $register_userid = array(
      $users[0]['register_id']
    );
    
  $this->Webservice_model->user_apk_notification($register_userid, $user_message_apk1);
   $details1 = $this->Webservice_model->get_where("place_order", ['id'=>$order_id]);
    
 $data = $details1[0];
  //  $json['result'] = $data;
    $json['message'] = 'successfull';
    $json['status'] = 1;
    header('Content-type: application/json');
    echo json_encode($json);
  }else{
//$ressult['result']='no data found';
$ressult['message']='unsuccessfull';
$ressult['status']=0;
$json = $ressult; 
header('Content-type: application/json');
echo json_encode($json);
      
        }
  
  
  
  }




  /************* get_latlon_driver function *************/
  public

  function get_latlon_driver()
  {
      
      
    $user_id = $this->input->get_post('user_id');
    $arr_get = ['id' => $this->input->get_post('user_id') ];
    $type = $this->input->get_post('type');
    
    $users = $this->Webservice_model->get_where('users', $arr_get);
    if ($users) {
     
      $json = [
       'lat' =>$users[0]['lat'],
       'lon' =>$users[0]['lon'],
      'status' => '1', 
      'message' => 'successful'];  
    }
    else {
      $json = ['result' => (object)[], 'status' => '0', 'message' => 'Data Not Found'];
    }

    header('Content-type: application/json');
    echo json_encode($json);
  } 
  




/***************get_product_list_nearbuy*****************/
    public

  function get_product_list_nearbuy()
        {      
            
                   $lat = $this->input->get_post('lat') ;
                   $lon = $this->input->get_post('lon') ;
                   $category_id = $this->input->get_post('category_id');
                  // $sub_cat_id =$this->request->getPost('sub_cat_id');
                   $user_distance = 100000000000000000000;
                   $get = $this->db->query("SELECT * FROM `product` WHERE  status='Active'")->result_array();
         // $get = $this->db->query("SELECT * FROM `product` WHERE  status='Active' AND FIND_IN_SET($category_id, category_id)")->result_array(); 
              if($get){
                  foreach($get as $val)
                    { 
                         $val['image'] =SITE_URL . "uploads/images/" . $val['image'];
                           $distance = $this->Webservice_model->distance($lat, $lon, $val['lat'], $val['lon'], $miles = false);   
                
                           $get['distance'] = number_format($distance, 2, '.', ''); 
                           if($user_distance >= $distance){
                                
                            $val['distance'] = number_format($distance, 2, '.', '');
                            $val['estimate_time'] = round($distance * 1.5);                    
                            $json[] = $val;
              
                           } 
                             
                        }                            
                              
                        if(!isset($json))
                          {
                              $ressult['result']='Data Not Found';
                            $ressult['message']='unsuccessful';
                            $ressult['status']='0';
                            $code = $ressult;
                              header('Content-type: application/json');
                          echo json_encode($code);
                          die;

                          }else{
                              $ressult['result']=$json;
                            $ressult['message']='successful';
                            $ressult['status']='1';
                            $code = $ressult;
                               }       
                      } 
                      else
                  {
                        $ressult['result']='Data Not Found';
                            $ressult['message']='unsuccessful';
                            $ressult['status']='0';
                            $code = $ressult;
                  }
            header('Content-type: application/json');
            echo json_encode($code);
          die;
   }      



    
    /*************  get_VIP_Charge *************/
 public function get_VIP_Charge()
	{
	  	$VIP_Charge = $this->Webservice_model->get_all('VIP_Charge');
     	if ($VIP_Charge){
		  $json = ['result'=>$VIP_Charge[0],'message'=>'successfull','status'=>'1']; 
          	}else{
		 $json = ['result'=>(object)[],'message'=>'unsuccessfull','status'=>'0']; 
	          	}

	        	header('Content-type: application/json');
	        	echo json_encode($json);
    	}
	
    
    
    
    

/************* order_time_slote function *************/
public function order_time_slote(){

   $dateformat = $this->input->get_post('date');
 $date = date('Y-m-d', strtotime($dateformat)); 
   
   $user_id = $this->input->get_post('user_id');
   $doctorlist = $this->Webservice_model->get_where('users',['id'=>$user_id]);
  if($doctorlist) {
       $duration = '60';
       
        $start_time = '10:00 AM';//$doctorlist[0]['open_time'];
        $end_time =  '10:00 PM';// $doctorlist[0]['close_time'];
        $i=0;
        while(strtotime($start_time) <= strtotime($end_time)){
            $start = $start_time;
            $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $i++;
            if(strtotime($start_time) <= strtotime($end_time)){
                $time[$i]['start'] =date('h:i a', strtotime($start));
                $time[$i]['end'] = date('h:i a', strtotime($end));
            }
        }

 
$booking_request = $this->Webservice_model->get_where('place_order',['user_id'=>$user_id,'date'=>$date]);

foreach($booking_request as $val){
      $ids[] =$val['time'];
}


$final1 = [];
$data = $time; 
$status = 'true';
$final = $ids;
foreach ($data as $array) {

    if(!in_array($array['start'], $final)){
         $array['status'] = 'false';
        $final1[] = $array;
    }else{
         $array['status'] = 'true';
          $final1[] = $array;
    }

}

//print_r($final); die;
//$catedata['time']= $final1;


   $ressult['result']=$final1;
   $ressult['message']='successfull';
   $ressult['status']='1';
   $json = $ressult;
}else{
  $json = ['result'=>[],'status'=>'0','message'=>'Data Not Found'];
}
header('Content-type: application/json');
echo json_encode($json);
}

  
    
     
                        
                        

public function order_status_history()
{
    
    
  $order_id = $this->input->get_post('order_id');                       
  $fetch = $this->db->query("select * from place_order where id = '$order_id' ORDER BY id DESC ")->result_array();
       if ($fetch)
        {                                
        
          $place_order = $this->Webservice_model->get_where('order_status_history',['order_id'=>$fetch[0]['id']]);  
          foreach($place_order as $val)
        {
          $data[] = $val;
  
        }
        
         $fetch[0]['status_history'] = $data;
        
         
        
        
                $ressult['result']=$fetch[0];
                $ressult['message']='successfull';
                $ressult['status']='1';
            
                $json = $ressult;
              }else{
                                
                $ressult['result']=(object)[];
                $ressult['message']='unsuccessfull';
                $ressult['status']='0';
                $json = $ressult;       
         }

         header('Content-type:application/json');
         echo json_encode($json);
    
}



    
    
    


/*-------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------------End APi--------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------*/


















public function serach_location()
{
   
    $lat = $this->input->get_post('lat');
    $lon = $this->input->get_post('lon');
    $type = $this->input->get_post('type');
    $radius = 100;
    
      $url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lon&radius=$radius&type=$type&key=AIzaSyABRtmxwu4OgB64OR2rq_8GecRDQf2TsLU";
    //$url= "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=22.6980,75.8683&radius=500&type=night_club&key=AIzaSyABRtmxwu4OgB64OR2rq_8GecRDQf2TsLU";
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        // return $data;
        print_r($data);
         
        
}




  
public function place_detail()
{
   
    $placeid = $this->input->get_post('placeid');
    $key = 'AIzaSyABRtmxwu4OgB64OR2rq_8GecRDQf2TsLU';
    
      //$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lon&radius=$radius&type=$type&key=AIzaSyABRtmxwu4OgB64OR2rq_8GecRDQf2TsLU";
    $url= "https://maps.googleapis.com/maps/api/place/details/json?placeid=$placeid&key=$key";
    
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        // return $data;
        print_r($data);
         
        
}


  
  
  
public function demo()
{
   
    $placeid = $this->input->get_post('placeid');
    $key = 'AIzaSyABRtmxwu4OgB64OR2rq_8GecRDQf2TsLU';
    
      //$url="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lon&radius=$radius&type=$type&key=AIzaSyABRtmxwu4OgB64OR2rq_8GecRDQf2TsLU";
   // $url= "https://www.google.com/maps/search/pubs+near+prague/@50.0860729,14.4135326,10z";
   $url= 'https://api.apify.com/v2/actor-tasks?token=GT9nkTcamwv5Nquv86oTkXQWJ';
    // $url = 'https://api.apify.com/v1/USER_ID/crawlers/CRAWLER_NAME/execute?token=GT9nkTcamwv5Nquv86oTkXQWJ';
    
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        // return $data;
        print_r($data);
         
        
}

  
 
    
   /*/////////////////////////start chating module/////////////////////////////////////////*/

/************************ insert chat ************************/
/* https://technorizen.com/lamavie_laundry/webservice/insert_chat?sender_id=77&receiver_id=76&chat_message=hello */
public

function insert_chat()
	{
	$arr_data = array(
		'sender_id' => $this->input->get_post('sender_id', TRUE) ,
		'receiver_id' => 1,//$this->input->get_post('receiver_id', TRUE) ,
		'chat_message' => $this->input->get_post('chat_message', TRUE),
        'message_date' => $this->input->get_post('message_date', TRUE),
        'message_time' => $this->input->get_post('message_time', TRUE),
        'type' => $this->input->get_post('type', TRUE),
	);
/*	if (isset($_FILES['chat_image']))
		{
		$user_img = "CHAT_IMG_" . rand(1, 10000) . ".png";
		move_uploaded_file($_FILES['chat_image']['tmp_name'], "uploads/images/" . $user_img);
		$arr_data['chat_image'] = $user_img;
		}*/

	$res = $this->Webservice_model->insert_data('kaise_chat_detail', $arr_data);
 	// print_r($arr_data);
	if ($res != "")
		{
		$single_data = array(
			'id' => $res
		);

                 
	$user = $this->Webservice_model->get_where('users', ['id' => $arr_data['receiver_id']]);
	$user_r = $this->Webservice_model->get_where('users', ['id' => $arr_data['sender_id']]);
	$user_message_apk = array(
		"message" => array(
			"result" => "successful",
			"key" => "You have a new message",
			"message" => $arr_data['chat_message'],
			"chat_image" => $res[0]['chat_image'],
			"userid" => $user_r[0]['id'],
			"name" => $user_r[0]['first_name']." ".$user_r[0]['last_name'] ,
			"userimage" => SITE_URL . "uploads/images/" . $user_r[0]['image'],
			"date" => date('Y-m-d h:i:s')
		)
	);
	$register_userid = array(
		            $user[0]['register_id']
	             );
	
    	$this->Webservice_model->user_apk_notification($register_userid, $user_message_apk);
    //	$fetch = $this->Webservice_model->get_where('kaise_chat_detail', $single_data);
	//	$fetch[0]['chat_image'] = SITE_URL . "uploads/images/" . $fetch[0]['chat_image'];
	   $json = array(
			"result" => "successful",
			"status" => 1
		);
	
	
		}
	  else
		{
		$json = array(
			"result" => "unsuccessful",
			"status" => 0
		);
		}

     	header('Content-type: application/json');
    	echo json_encode($json);
    	}
	
	
///////////////////////////////////////////////////////////////////////


/************* get chat *************/

/*  https://technorizen.com/lamavie_laundry/webservice/get_chat?sender_id=76&receiver_id=77 */

public

function get_chat()
	{
	$sender_id = $this->input->get_post('sender_id', TRUE);
	$receiver_id = 1;//$this->input->get_post('receiver_id', TRUE);
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
			$sender = $this->Webservice_model->get_where('users', ['id' => $val['sender_id']]);
		//	$receiver = $this->Webservice_model->get_where('users', ['id' => $val['receiver_id']]);
		//	$sender[0]['sender_image'] = SITE_URL . 'uploads/images/' . $sender[0]['image'];
		//	$receiver[0]['receiver_image'] = SITE_URL . 'uploads/images/' . $receiver[0]['image'];
			$val['chat_image'] = SITE_URL . 'uploads/images/' . $val['chat_image'];
		//	print_r($val);
		//	$val['result'] = "successful";
		//	$val['sender_detail'] = $sender[0];
		//	$val['receiver_detail'] = $receiver[0];
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
		$this->Webservice_model->update_data('kaise_chat_detail', ['status' => 'SEEN'], $arr_where);
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

/************* get conversation *************/

/* https://technorizen.com/lamavie_laundry/webservice/get_conversation?receiver_id=6 */

public

function get_conversation()
	{
	$receiver_id = $this->input->get_post('receiver_id', TRUE);
	$this->db->where("(receiver_id = '$receiver_id') OR (sender_id = '$receiver_id') ");
	$info = $this->db->get('kaise_chat_detail');
	$chat = $info->result_array();
	$arr = [];
	if ($chat)
		{
		foreach($chat as $val)
			{
			if ($val['sender_id'] == $receiver_id)
				{
				if (in_array($val['receiver_id'], $arr))
					{
					}
				  else
					{
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
						$arr[] = $val['receiver_id'];
						$user = $this->Webservice_model->get_where('users', ['id' => $val['receiver_id']]);
						$user[0]['image'] = SITE_URL . "uploads/images/" . $user[0]['image'];
						$json[] = $user[0];
						} //end if
					}
				}
			  else
				{
				if (in_array($val['sender_id'], $arr))
					{
					}
				  else
					{
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
						$arr[] = $val['sender_id'];
						$user = $this->Webservice_model->get_where('users', ['id' => $val['sender_id']]);
						$user[0]['image'] = SITE_URL . "uploads/images/" . $user[0]['image'];
						$json[] = $user[0];
						} //end if
					}
				}
			} // end foreach
		}
	  else
		{
		$json = array(
			"result" => "data not found",
			"message" => "unsuccess",
			"status" => "0"
		);
		header('Content-type: application/json');
		echo json_encode($json);
		die;
		}

	if (!isset($json))
		{
		$json = array(
			"result" => "data not found",
			"message" => "unsuccess",
			"status" => "0"
		);
		header('Content-type: application/json');
		echo json_encode($json);
		die;
		}
      else
	foreach($json as $key)
		{   //$key['id'] = 0;
	        if($key['id'] != "")
	        {  
		$where = "sender_id = '" . $key['id'] . "' AND receiver_id = '" . $receiver_id . "' AND status = 'NOTSEEN' ORDER BY id DESC";
		$msg = $this->Webservice_model->get_where('kaise_chat_detail', $where);
		if ($msg)
			{
			$key['no_of_message'] = count($msg);
			}
		  else
			{
			$key['no_of_message'] = 0;
			}

		$where1 = "(sender_id = '" . $key['id'] . "' AND receiver_id = '" . $receiver_id . "') OR (receiver_id = '" . $key['id'] . "' AND sender_id = '" . $receiver_id . "') ORDER BY id DESC";
		$msg1 = $this->Webservice_model->get_where('kaise_chat_detail', $where1);
		if ($user)
			{

		  	// $key['no_of_message'] = count($msg);

			$date_time = explode(" ", $msg1[0]['date']);
			$key['last_message'] = $msg1[0]['chat_message'];
			$key['last_image'] = SITE_URL . "uploads/images/" . $msg1[0]['chat_image'];
			$key['date'] = $date_time[0];
			$key['time'] = $date_time[1];
			$key['time_ago'] = $this->Webservice_model->humanTiming(strtotime($msg1[0]['date'])) . " ago";
			$key['sender_id'] = $key['id'];
			$key['receiver_id'] = $receiver_id;

                    
			$message[] = $key;
			}
		  else
			{

			// $key['no_of_message'] = 0;

			$message[] = $key;
			}
		}
		}

	$data['result'] = $message;
	$data['message'] = "success";
	$data['status'] = 1;
	header('Content-type: application/json');
	echo json_encode($data);
	}

/*************** clear_conversation *****************/

/* http://yashtechsolutions.com/social_app/webservice/clear_chat?sender_id=77&receiver_id=76 */

public

function clear_chat()
	{
	$sender_id = $this->input->get_post('sender_id', TRUE);
	$receiver_id = $this->input->get_post('receiver_id', TRUE);
	$this->db->where('sender_id', $sender_id);
	$this->db->where('receiver_id', $receiver_id);
	$this->db->or_where('sender_id', $receiver_id);
	$this->db->where('receiver_id', $sender_id);
	$info = $this->db->get('kaise_chat_detail');
	$chat = $info->result_array();
	if ($chat)
		{
		foreach($chat as $val)
			{
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

			if ($clr_id == "")
				{
				$arr_where = ['id' => $val['id']];
				$this->Webservice_model->update_data('kaise_chat_detail', ['clear_chat' => $receiver_id], $arr_where);
				}
			  else
			if ($exp1 == $receiver_id)
				{
				}
			  else
			if ($exp2 == $receiver_id)
				{
				}
			  else
				{
				$arr_where = ['id' => $val['id']];
				$this->Webservice_model->update_data('kaise_chat_detail', ['clear_chat' => $exp1 . ',' . $receiver_id], $arr_where);
				}
			}

		
		
			$data = array(
			 	        "message" => "successful",
						"status" => "0"
			);
		}
	  else
		{
			$data = array(
			       	    "message" => "unsuccessful",
						"status" => "0"
			);
		}

	header('Content-type: application/json');
	echo json_encode($data);
	}

/***************delete_conversation *****************/

/* http://yashtechsolutions.com/social_app/webservice/delete_conversation? */

public

function delete_conversation()
	{
	$receiver_id = $this->input->get_post('receiver_id', TRUE);
	$this->db->where('sender_id', $receiver_id);
	$this->db->or_where('receiver_id', $receiver_id);
	$info = $this->db->get('kaise_chat_detail');
	$chat = $info->result_array();
	if ($chat)
		{
		foreach($chat as $val)
			{
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

			if ($clr_id == "")
				{
				$arr_where = ['id' => $val['id']];
				$this->Webservice_model->update_data('kaise_chat_detail', ['clear_chat' => $receiver_id] , $arr_where);
				}
			  else
			if ($exp1 == $receiver_id)
				{
				}
			  else
			if ($exp2 == $receiver_id)
				{
				}
			  else
				{
				$arr_where = ['id' => $val['id']];
				$this->Webservice_model->update_data('kaise_chat_detail', ['clear_chat' => $exp1 . ',' . $receiver_id] ,$arr_where);
				}
			}

	
			$data = array(
				"result" => "successful",
					"message" => "successful",
						"status" => "0"
			);
		}
	  else
		{
		$data = array(
				"result" => "unsuccessful",
					"message" => "unsuccessful",
						"status" => "0"
			);
		}

	header('Content-type: application/json');
	echo json_encode($data);
	}

/**************count seen *****************/

/* https://technorizen.com/lamavie_laundry/webservice/get_unseen_count?user_id=1  */
public

function get_unseen_count()
	{
	$user_id = $this->input->get_post('user_id', TRUE);

	$user_list = $this->Webservice_model->get_where('kaise_chat_detail' , ['receiver_id'=>$user_id,'status'=>'NOTSEEN']);
	if($user_list){
            $json['count'] = ''.count($user_list).'';
         	$json['message'] = "success";
         	$json['status'] = "1";
		}
	  else
		{
            $json['count'] = '0';
            $json['message'] = "success";
            $json['status'] = "1";
		}

	header('Content-type: application/json');
	echo json_encode($json);
	die;
	}

/*////////////////////////////end chating module///////////////////////////////*/


    
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
     
  /*------------------------------------------------old api--------------------------------------------------------*/  
    
    
   

  
  
	/*************  get_user_list *************/
 public function get_user_list()
	{
	    $user_id= $this->input->get_post('user_id');
		$user_list = $this->Webservice_model->get_where('users' , ['id !='=>$user_id]);
     
		if ($user_list)
		{
			foreach($user_list as $val)
			{
			    
			
             $val['image'] = SITE_URL.'uploads/images/'.$val['image'];   
			 $data[] = $val;
			
			}
		
		
                        $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
		}
	  	else
		{
			$json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
		}

		header('Content-type: application/json');
		echo json_encode($json);
	}
  
  
    
  /*************************** get_near_by_user ************************************************/
  function get_near_by_user()
  {  
    
    $lat = $this->input->get_post("lat");
    $lon = $this->input->get_post("lon");
    $user_id = $this->input->get_post("user_id");
     
    
        $get_data = $this->db->query("SELECT *, format(111.045 * DEGREES(ACOS(COS(RADIANS('$lat'))
         * COS(RADIANS(lat))
         * COS(RADIANS(lon) - RADIANS('$lon'))
         + SIN(RADIANS('$lat'))
         * SIN(RADIANS(lat)))),2)
         AS distance_in_km
        FROM users WHERE  id != ".$user_id." AND 111.045 * DEGREES(ACOS(COS(RADIANS('$lat'))
         * COS(RADIANS(lat))
         * COS(RADIANS(lon) - RADIANS('$lon'))
         + SIN(RADIANS('$lat'))
         * SIN(RADIANS(lat)))) <= 100   
        ORDER BY distance_in_km ASC")->result_array();
        
       //round($get_data[0]['distance_in_km']);
 
      //echo  $this->db->last_query();die;
   
    
    
    //echo $this->db->last_query();
    
    if($get_data){
        
        	foreach($get_data as $val)
			{
			    
			 $val['distance_in_km'] = number_format($val['distance_in_km'],2);
             $val['image'] = SITE_URL.'uploads/images/'.$val['image'];   
			 $data[] = $val;
			
			}
                

        
        $json = ['result'=>$data,'message'=>'successfull','statu'=>'1'];
    }else{
        $json = ['result'=>'data not found','message'=>'unsuccessfull','statu'=>'0'];
    }
     
     
  
    header('Content-type:application/json');
    echo json_encode($json);
    
  }
  
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
  /////////// Old Functions Start From here
  
  
 public function check_curl(){
         // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, "https://api.koseeker.com/owner/register");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"name\":\"anurudh\",\"email\":\"anurudh@email.com\",\"password\":\"123456\"}");
        curl_setopt($ch, CURLOPT_POST, 1);
        
        $headers = array();
        $headers[] = "Cache-Control: no-cache";
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
       /* $headers[] = "Postman-Token: ff94215d-8fec-380c-88a9-2324296bbdf9";*/
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        echo $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
        
 }
 
 
 
 ///////////////////////////knet payment//////////////////////////////
 
 
 
 
 
 
 /*************  knet_token_generate *************/
    public

    function knet_token_generate()
    {                     
          
          
          
      $number = $this->input->get_post('number');
      $exp_month = $this->input->get_post('exp_month');
      $exp_year = $this->input->get_post('exp_year');
      $cvc = $this->input->get_post('cvc');
      $name = $this->input->get_post('name');
      $country = $this->input->get_post('country');
      $line1 = $this->input->get_post('line1');
      $city = $this->input->get_post('city');
      $street = $this->input->get_post('street');
      $avenue = $this->input->get_post('avenue');
      $client_ip = $this->input->get_post('client_ip');
      
      
      $live_mode = $this->input->get_post('live_mode');
      $type = $this->input->get_post('live_mode');
     

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tap.company/v2/tokens",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  
 // CURLOPT_POSTFIELDS, "{\"card\":{\"number\":5123450000000008,\"exp_month\":12,\"exp_year\":21,\"cvc\":124,\"name\":\"test user\",\"address\":{\"country\":\"Kuwait\",\"line1\":\"Salmiya, 21\",\"city\":\"Kuwait city\",\"street\":\"Salim\",\"avenue\":\"Gulf\"}},\"client_ip\":\"192.168.1.20\"}");

  
  CURLOPT_POSTFIELDS => "card%5Bnumber%5D=$number&card%5Bexp_month%5D=$exp_month&card%5Bexp_year%5D=$exp_year&card%5Bcvc%5D=$cvc&card%5Bname%5D=$name&address%5Bcountry%5D=$country&address%5Bline1%5D=$line1&address%5Bcity%5D=$city&address%5Bstreet%5D=$street&client_ip=$client_ip",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer sk_live_9oyd1FONMRmLrZJnq6BEluGU",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: 99d8654b-9940-dda5-a3bb-23525cf97410"
  ),
));

//sk_test_XKokBfNWv6FIYuTMg5sLPjhJ
//sk_live_9oyd1FONMRmLrZJnq6BEluGU

       $response = curl_exec($curl);  
       $response = json_decode($response);
       
       if (isset($response->error)) {
          $ressult['result']=$response;
          $ressult['message']='unsuccessful';
          $ressult['status']='0';
          $json = $ressult;
          header('Content-type: application/json');
          echo json_encode($json);
          die;
       }

       curl_close ($curl);  

                          $ressult['result']=$response;
                          $ressult['message']='successful';
                          $ressult['status']='1';
                          $json = $ressult;   
                          
                          
          header('Content-type: application/json');
          echo json_encode($json);
          die;
}

 
 
 /*************  add_knet_payment *************/
    public

    function add_knet_payment()
    {                     
          
    
  $arr_data = [
            'user_id' => $this->input->get_post('user_id'),
            'amount' => $this->input->get_post('amount'),
            'currency' => $this->input->get_post('currency'),
            'description' => $this->input->get_post('description'),
            'statement_descriptor' => $this->input->get_post('statement_descriptor'),
            'transaction' => $this->input->get_post('transaction'),
            'order_id' => $this->input->get_post('order'),
            'email' => $this->input->get_post('email')
        ];
        
        
                       
      $amount = $this->input->get_post('amount');
      $currency = $this->input->get_post('currency');
      $threeDSecure = $this->input->get_post('threeDSecure');
      $save_card = $this->input->get_post('save_card');
      $description = $this->input->get_post('description');
      $statement_descriptor = $this->input->get_post('statement_descriptor');
      
      
      $udf1 = $this->input->get_post('udf1');
      $udf2 = $this->input->get_post('udf2');
      $transaction = $this->input->get_post('transaction');
      
      
      $order = $this->input->get_post('order');
      $email = $this->input->get_post('email');
      $sms = $this->input->get_post('sms');
      $first_name = $this->input->get_post('first_name');
      $middle_name = $this->input->get_post('middle_name');
      $last_name = $this->input->get_post('last_name');
      $phone = $this->input->get_post('phone');
      $country_code = $this->input->get_post('country_code');
      
      $live_mode = true;
      $token = $this->input->get_post('token');
      $url_r = 'http://cskwt.com/giftstore/webpage/success.html';
      $url_p = 'http://cskwt.com/giftstore/webpage/error.html';
      
/*	$url = 'https://api.stripe.com/v1/charges';
    
//"{\"amount\":1,\"currency\":\"KWD\",\"threeDSecure\":true,\"save_card\":false,\"description\":\"Test Description\",\"statement_descriptor\":\"Sample\",\"metadata\":{\"udf1\":\"test 1\",\"udf2\":\"test 2\"},\"reference\":{\"transaction\":\"txn_0001\",\"order\":\"ord_0001\"},
//\"receipt\":{\"email\":false,\"sms\":true},\"customer\":{\"first_name\":\"test\",\"middle_name\":\"test\",\"last_name\":\"test\",\"email\":\"test@test.com\",\"phone\":{\"country_code\":\"965\",\"number\":\"50000000\"}},\"source\":{\"id\":\"src_kw.knet\"},\"post\":{\"url\":\"http://your_website.com/post_url\"},\"redirect\":{\"url\":\"http://your_website.com/redirect_url\"}}"

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.tap.company/v2/charges");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"amount\":$amount,\"currency\":\"$currency\",\"threeDSecure\":true,\"save_card\":false,\"description\":\"$description\",\"statement_descriptor\":\"$statement_descriptor\",\"metadata\":{\"udf1\":\"test 1\",\"udf2\":\"test 2\"},\"reference\":{\"transaction\":\"$transaction\",\"order\":\"$order\"},\"receipt\":{\"email\":false,\"sms\":true},\"customer\":{\"first_name\":\"$first_name\",\"middle_name\":\"$middle_name\",\"last_name\":\"$last_name\",\"email\":\"test@test.com\",\"phone\":{\"country_code\":\"$country_code\",\"number\":\"$number\"}},\"source\":{\"id\":\"src_kw.knet\"},\"post\":{\"url\":\"http://your_website.com/post_url\"},\"redirect\":{\"url\":\"http://your_website.com/redirect_url\"}}");
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"amount\":1000.00,\"currency\":\"KWD\",\"threeDSecure\":true,\"save_card\":false,\"description\":\"100.00\",\"statement_descriptor\":\"1200.00\",\"metadata\":{\"udf1\":\"test 1\",\"udf2\":\"test 2\"},\"reference\":{\"transaction\":\"txn_0001\",\"order\":\"ord_0001\"},\"receipt\":{\"email\":false,\"sms\":true},\"customer\":{\"first_name\":\"test\",\"middle_name\":\"test\",\"last_name\":\"test\",\"email\":\"test@test.com\",\"phone\":{\"country_code\":\"965\",\"number\":\"50000000\"}},\"source\":{\"id\":\"src_kw.knet\"},\"post\":{\"url\":\"http://your_website.com/post_url\"},\"redirect\":{\"url\":\"http://your_website.com/redirect_url\"}}");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
*/




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tap.company/v2/charges",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",

//  CURLOPT_POSTFIELDS => "amount=101.00&currency=KWD&description=gfdg%20gfdg&statement_descriptor=dgfg%20%20gdfgfd&email=a%40g.com&first_name=gffdg&middle_name=rtert&last_name=ere&phone=56546&country_code=965&source%5Bid%5D=src_kw.knet&customer%5Bfirst_name%5D=22dsd&customer%5Bphone%5D=434545&redirect%5Burl%5D=http%3A%2F%2Ftechnorizen.com&post%5Burl%5D=http%3A%2F%2Fabc.com&customer%5Bemail%5D=ad%40g.com",

  CURLOPT_POSTFIELDS => "amount=$amount&currency=$currency&live_mode=$live_mode&description=$description&statement_descriptor=$statement_descriptor&email=$email&first_name=$first_name&middle_name=$middle_name&last_name=$last_name&phone=$phone&country_code=$country_code&source%5Bid%5D=src_all&customer%5Bfirst_name%5D=$first_name&customer%5Bphone%5D=$5Bphone&customer%5Bemail%5D=$email&redirect%5Burl%5D=$url_r&post%5Burl%5D=$url_p",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer sk_live_9oyd1FONMRmLrZJnq6BEluGU",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: 9247a319-859a-6f91-407b-954f874664c9"
  ),
));
       $response = curl_exec($curl);  
       $response = json_decode($response);
       
       if (isset($response->errors)) {
          $ressult['result']=$response;
          $ressult['message']='unsuccessful';
          $ressult['status']='0';
          $json = $ressult;
          header('Content-type: application/json');
          echo json_encode($json);
          die;
       }

       curl_close ($curl);  
      
 

    

                          $ressult['result']=$response;
                          $ressult['message']='successful';
                          $ressult['status']='1';
                          $json = $ressult;                         
                     
                         header('Content-type: application/json');
                         echo json_encode($json);
    }





 /*************  final_payment *************/
    public

    function final_payment()
    {                     
          
      $arr_data = array(
        'user_id' => $this->input->get_post('user_id'),
        'order_id' => $this->input->get_post('order_id'), 
        'currency' => $this->input->get_post('currency'), 
        'transaction_id' => $this->input->get_post('transaction_id'), 
        'payment_method' => $this->input->get_post('payment_method'), 
        'amount' => $this->input->get_post('amount')                           
      );

 

      $pay = $this->Webservice_model->insert_data('payment', $arr_data);


      if ($pay != "") {
          
                        $arr_gets = ['id'=>$pay];
                        $login = $this->Webservice_model->get_where('payment',$arr_gets);   
                        
            
                        $ressult['result']=$login[0];
                        $ressult['message']='successfull';
                        $ressult['status']='1';
                        $json = $ressult;
                                       
                         
                         header('Content-type: application/json');
                         echo json_encode($json);die;
                          
      }
      else {
                          $json = ['result' => 'unsuccessfull', 'status' => 0, 'message' => 'unsuccessfull'];
      }

                         header('Content-type: application/json');
                         echo json_encode($json);die;
    }



 
 
 //////////////////////////end knet payment//////////////////////////
 
 
 

  


/*************  get_country *************/
 public function get_country()
	{
		$countryList = $this->Webservice_model->get_all('country');
 

		if ($countryList)
		{
			foreach($countryList as $val)
			{
 
			 $data[] = $val;
			
			}

                        $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
		}
	  	else
		{
			$json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
		}

		header('Content-type: application/json');
		echo json_encode($json);
	}

/*************  get_state *************/

 public function get_state()
	{
                $arr_get = ['country_id'=>$this->input->get_post('country_id')];

                $stateList = $this->Webservice_model->get_where('states',$arr_get);  

		if ($stateList)
		{
			foreach($stateList as $val)
			{
 
			 $data[] = $val;
			
			}

                        $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
		}
	  	else
		{
			$json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
		}

		header('Content-type: application/json');
		echo json_encode($json);
	}


/*************  get_city *************/

 public function get_city()
	{
                $arr_get = ['country_id'=>$this->input->get_post('country_id'),
                            'state_id'=>$this->input->get_post('state_id')
                           ];

                $cityList = $this->Webservice_model->get_where('city',$arr_get);  

		if ($cityList)
		{
			foreach($cityList as $val)
			{
 
			 $data[] = $val;
			
			}

                        $json = ['result'=>$data,'message'=>'successfull','status'=>'1']; 
		}
	  	else
		{
			$json = ['result'=>'Data Not Found','message'=>'unsuccessfull','status'=>'0']; 
		}

		header('Content-type: application/json');
		echo json_encode($json);
	}




/***********************************************************************************/
  function user_request()
  { 
      
    $timezone = $this->input->get_post('timezone');
    date_default_timezone_set($timezone);
    
    $lat = $this->input->get_post("lat");
    $lon = $this->input->get_post("lon");
    $cat_id = $this->input->get_post("cat_id");
    $user_id = $this->input->get_post("user_id");
     
    
    $provider_id = $this->input->get_post("provider_id");
    
    if($provider_id==""){
          
        $get_data = $this->db->query("SELECT *, 111.045 * DEGREES(ACOS(COS(RADIANS('$lat'))
         * COS(RADIANS(lat))
         * COS(RADIANS(lon) - RADIANS('$lon'))
         + SIN(RADIANS('$lat'))
         * SIN(RADIANS(lat))))
         AS distance_in_km
        FROM users WHERE status = 'Active' AND type = 'PROVIDER' AND category_id = ".$cat_id." AND 111.045 * DEGREES(ACOS(COS(RADIANS('$lat'))
         * COS(RADIANS(lat))
         * COS(RADIANS(lon) - RADIANS('$lon'))
         + SIN(RADIANS('$lat'))
         * SIN(RADIANS(lat)))) <= 100   
        ORDER BY distance_in_km ASC")->result_array();
 
        $request_type = 'MULTIPLE';
    }else{
        $get_data = $this->Webservice_model->get_where('users',['id'=>$provider_id]);  
        
                $request_type = 'SINGLE';

    }
    
    
    //echo $this->db->last_query();
    
    if($get_data){
          
        $arr_data_request = [
          'user_id' => $user_id ,
          'provider_id' => $provider_id,
          'address' => $this->input->get_post('address') , 
          'lat' => $this->input->get_post('lat') ,
          'lon' => $this->input->get_post('lon') , 
          'cat_id' => $this->input->get_post('cat_id') , 
          'subcat_id' => $this->input->get_post('subcat_id') , 
          'comment' => $this->input->get_post('comment') , 
          'title' => $this->input->get_post('title') , 
          'duration' => $this->input->get_post('duration') , 
          'price' => $this->input->get_post('price') , 
          'start_date' => $this->input->get_post('start_date') , 
          'start_time' => $this->input->get_post('start_time') , 
          'service_type' => $this->input->get_post('service_type') , 
          'request_type' => $request_type ,
          'date_time' => date('Y-m-d H:i:s') ,
          'timezone' => $timezone
        ];
        
        $res_data = $this->Webservice_model->insert_data('user_request', $arr_data_request);
          
        if($_FILES['images']['name'][0]!=''){ 
            $i=0;
            foreach($_FILES['images']['name'] as $imgs){
                $file_ext = end(explode(".", $_FILES['images']['name'][$i])); 
                $img = "REQ_IMGS_".date('YmdHis')."_".rand(0, 100000).".".$file_ext;
                move_uploaded_file($_FILES['images']['tmp_name'][$i], "uploads/images/" . $img);
                $this->Webservice_model->insert_data('request_img', ['request_id'=>$res_data,'image'=>$img]);
                $i++;
            } 
        }
        
        
        $user_detail = $this->Webservice_model->get_where('users',['id'=>$user_id]);  
        
        $arr_data_request["result"] = "successfull";
        $arr_data_request["key"] = "your booking request is success";
        $arr_data_request["first_name"] = $user_detail[0]['first_name'];
        $arr_data_request["last_name"] = $user_detail[0]['last_name'];
        $arr_data_request["request_id"] = $res_data; 
         
         
        foreach($get_data as $val){
            
            $user_message_apk = array(
              "message" => $arr_data_request
            );
            
            $register_userid = array(
              $val['register_id']
            );
              
            $this->Webservice_model->provider_apk_notification($register_userid, $user_message_apk);
            
            $ids[] = $val['id'];
        }
        $ids = implode(",",$ids);
        $this->Webservice_model->update_data('user_request', ['receiver_id'=>$ids], ['id'=>$res_data]);
        $get_request = $this->Webservice_model->get_where('user_request',['id'=>$res_data]); 
        
        
        $json = ['result'=>$get_request,'message'=>'successfull','statu'=>'1'];
    }else{
        $json = ['result'=>'data not found','message'=>'unsuccessfull','statu'=>'0'];
    }
     
     
  
    header('Content-type:application/json');
    echo json_encode($json);
    
  }
  
  /*************************** get_available_provider ************************************************/
  function get_available_provider()
  {  
    
    $lat = $this->input->get_post("lat");
    $lon = $this->input->get_post("lon");
    $cat_id = $this->input->get_post("cat_id");
    $user_id = $this->input->get_post("user_id");
     
    
    $provider_id = $this->input->get_post("provider_id");
    
    if($provider_id==""){
          
        $get_data = $this->db->query("SELECT *, format(111.045 * DEGREES(ACOS(COS(RADIANS('$lat'))
         * COS(RADIANS(lat))
         * COS(RADIANS(lon) - RADIANS('$lon'))
         + SIN(RADIANS('$lat'))
         * SIN(RADIANS(lat)))),2)
         AS distance_in_km
        FROM users WHERE status = 'Active' AND type = 'PROVIDER' AND category_id = ".$cat_id." AND 111.045 * DEGREES(ACOS(COS(RADIANS('$lat'))
         * COS(RADIANS(lat))
         * COS(RADIANS(lon) - RADIANS('$lon'))
         + SIN(RADIANS('$lat'))
         * SIN(RADIANS(lat)))) <= 100   
        ORDER BY distance_in_km ASC")->result_array();
        
       //round($get_data[0]['distance_in_km']);
 
      //echo  $this->db->last_query();die;
    }else{
        $get_data = $this->Webservice_model->get_where('users',['id'=>$provider_id]);  
    }
    
    
    //echo $this->db->last_query();
    
    if($get_data){
                                     //   $get_data['distance_in_km'] = number_format($get_data['distance_in_km'],2);

        
        $json = ['result'=>$get_data,'message'=>'successfull','statu'=>'1'];
    }else{
        $json = ['result'=>'data not found','message'=>'unsuccessfull','statu'=>'0'];
    }
     
     
  
    header('Content-type:application/json');
    echo json_encode($json);
    
  }
    
  /*************************** get_my_request ************************************************/
  function get_my_request()
  {  
    
       
    $type = $this->input->get_post("type"); 
    $status = $this->input->get_post("status"); 
    $request_type = $this->input->get_post("request_type"); 
    $user_id = $this->input->get_post("user_id"); 
    if($type=='USER'){
        $get_data = $this->db->query("SELECT * FROM user_request WHERE user_id = '$user_id' AND request_type = '$request_type'AND status = '$status' ORDER BY id DESC")->result_array();
    
    }else{
        $get_data = $this->db->query("SELECT * FROM user_request WHERE status = 'Pending' AND FIND_IN_SET('$user_id',receiver_id) > 0 ORDER BY id DESC")->result_array();
 
    }
    
          
   // echo $this->db->last_query();die;
    
    if($get_data){
        
        foreach($get_data as $val){
         //  echo $val['user_id'];
            $request_accepted = $this->Webservice_model->get_where('request_accepted',['provider_id'=>$user_id,'request_id'=>$val['id']]); 
            if($request_accepted){
            $val['my_status'] = $request_accepted[0]['status'];
            }else{
            $val['my_status'] = 'Pending';
                
            }
            
           $request_accepted1 = $this->Webservice_model->get_where('request_accepted',['status'=>'Accept','request_id'=>$val['id']]); 
           if($request_accepted1){
             $val['accepted_count'] = count($request_accepted1);  
           }else{
             $val['accepted_count'] =0;  
               
           } 
           
           
           
              $request_accepted2 = $this->Webservice_model->get_where('request_accepted',['status'=>'Hire','request_id'=>$val['id']]); 
           if($request_accepted2){
               
              $pro = $this->Webservice_model->get_where('users',['id'=>$request_accepted2[0]['provider_id']]); 
              $pro[0]['image'] = SITE_URL.'uploads/images/'.$pro[0]['image'];
              $val['provider_details'] =  $pro[0]; 
           }

            $get_cat = $this->Webservice_model->get_where('category',['id'=>$val['cat_id']]); 
            $val['cat_name'] = $get_cat[0]['category_name'];
            $get_scat = $this->db->query("SELECT GROUP_CONCAT(sub_cat_name) AS sub_cat_name  FROM sub_category where id IN(".$val['subcat_id'].")")->result_array(); 
            $val['subcat_name'] = $get_scat[0]['sub_cat_name'];
            $get_user = $this->db->query("SELECT user_name,mobile,image  FROM users where id IN(".$val['user_id'].")")->result_array(); 
            $val['user_name'] = $get_user[0]['user_name'];
            $val['mobile'] = $get_user[0]['mobile'];
            $val['image'] = SITE_URL.'uploads/images/'.$get_user[0]['image'];
            $data[] = $val;
        }    
        
        $json = ['result'=>$data,'message'=>'successfull','statu'=>'1'];
    }else{
        $json = ['result'=>'data not found','message'=>'unsuccessfull','statu'=>'0'];
    }
     
      
    header('Content-type:application/json');
    echo json_encode($json);
    
  }








    /******* generate code ************/
    public
    function generateRandomString($length = 8) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function createThumbnail($filename){

		$this->load->library('image_lib');

           $config['image_library'] = 'GD2';
           $config['source_image'] = 'assets/product/'.$filename;
           $config['new_image']="assets/product/thumbs/";
           $config['thumb_marker'] = FALSE;
           $config['create_thumb'] = TRUE;
           $config['maintain_ratio'] = TRUE;
           $config['width']= 295;
           $config['height']= 150;

           $this->image_lib->initialize($config);
           $result = $this->image_lib->resize();
           $this->image_lib->clear();
           
           /*if($result){
             echo "Successfully manipulated the image";
           }
           else{
             echo "Failed";
           }*/
     }


     

  /************** type_status ****************/
    public function type_status(){

    	$product_id = $this->input->get_post('id', TRUE);
        $get_status = $this->input->get_post('status', TRUE);

        $status = 'featured';
	    $payment = 'PAY';
	    if($get_status=='featured'){
	    	$status = 'collection';
	        $payment = '';
	    }
		
		$this->Webservice_model->update_data('sp_products', ['product_id'=>$product_id], ['product_type'=>$status,'payment'=>$payment]);
		echo $status;
		//redirect('admin/products');     	
			
	}

	 /************** update_status ****************/
    public function update_status(){

    	$product_id = $this->input->get_post('id', TRUE);
        $product_status = $this->input->get_post('status', TRUE);  

		$class = "icon-close glyphicon glyphicon-remove";       
        if($product_status=='Active'){
            $class = "icon-checkmark glyphicon glyphicon-ok";     
        }
		$this->Webservice_model->update_data('sp_products', ['product_id'=>$product_id], ['product_status'=>$product_status]);
		echo $class;    	
			
	}

	/************** product_delete ****************/
    public function product_delete(){

		$this->load->model('home_model');
	
		$arr_where = [ 'product_id'=>$this->input->get_post('id', TRUE) ];
               
    	$this->home_model->delete_data($arr_where,'sp_products');
    	$get_res =$this->db->order_by('product_id','desc')->get("sp_products")->result_array();
    	$this->load->view('admin/get_products',['get_res'=>$get_res]);
		
	}

	/************** view_products ****************/
    public function view_products(){

		$this->load->model('home_model');
	
		$arr_where = [ 'product_id'=>$this->input->get_post('id', TRUE) ];
               
    	$get_res = $this->db->order_by('product_id','desc')->get_where("sp_products",$arr_where)->result_array();
    	$this->load->view('admin/view_products',$get_res[0]);
		
	}

	/************** add_products ****************/
    public function add_products(){

		$this->load->model('home_model');
		$product_id = $this->input->get_post('id', TRUE);
		$arr_where = [ 'product_id'=>$product_id ];
		if($product_id==''){
			$get_res = array();
		}else{
			$get_res = $this->db->order_by('product_id','desc')->get_where("sp_products",$arr_where)->result_array();
		}
               
    	
    	$this->load->view('admin/add_products',$get_res[0]);
		
	}

	/************** upload_products ****************/
    public function upload_products(){

    	$arr_data = $this->input->post();
    	
    	//print_r($arr_data); die;
    	if($arr_data['product_id']==""){
    		unset($arr_data['product_id']);
    		if($arr_data['product_type']=="featured"){
    			$arr_data['payment'] = "YES";
    		}
    		$this->Webservice_model->insert_data('sp_products', $arr_data);
		}else{

			$arr_id = ['product_id' => $arr_data['product_id']];
			$res = $this->Webservice_model->update_data('sp_products', $arr_id, $arr_data);
		}

		redirect('admin/products');
	}

	/************** create_thumb ****************/
    public function create_thumb($desired_width,$desired_height,$width,$height,$file_ext,$resource,$destination){
     
      $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

      switch ($file_ext)
      {
      case "png":
          
          $background = imagecolorallocate($virtual_image, 0, 0, 0);        
          
          imagecolortransparent($virtual_image, $background);
         
          imagealphablending($virtual_image, false);
         
          imagesavealpha($virtual_image, true);

          break;

      case "gif":
          
          $background = imagecolorallocate($virtual_image, 0, 0, 0);        
         
          imagecolortransparent($virtual_image, $background);

          break;
      }
   
      
      imagecopyresampled($virtual_image, $resource, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

      if ($file_ext == 'gif')
          imagegif($virtual_image, $destination);
      else if ($file_ext == 'png')
          imagepng($virtual_image, $destination, 1);
      else if ($file_ext == 'jpg' || $file_ext == 'jpeg')
          imagejpeg($virtual_image, $destination, 100);


      // for full size image     


      //echo '<img src="'.$destination.'">'; 

    }  



   
  public function session_id()
  {   
    $idd = $this->input->post('id', TRUE);
     $newdata = array(
        'chat_id'  => $idd
    );
     $this->session->set_userdata($newdata);
  }

  public function chat_details()
  {   
     $id = $this->session->userdata('chat_id');
     $admin_id = $this->session->userdata('userId');
    
     $url =  base_url()."webservice/get_chat?send_id=$admin_id&recieve_id=$id";
     $get = file_get_contents($url);
     $data['allChatData']=$get;
     $this->load->view('dashboard/chat_details',$data);
  }
   
  public function chat_insert()
   {
      

        $arr_data = array(
	       'send_id' => $this->input->post('send_id', TRUE) ,
	       'recieve_id' => $this->input->get_post('user_id', TRUE) ,
	       'message' => $this->input->get_post('chat_msg', TRUE) 
     	);
  

                 if(isset($_FILES['chat_image'])){
                   
                     $user_img = "CHAT_IMG_" . rand(1, 10000) . ".png";
                     move_uploaded_file($_FILES['chat_image']['tmp_name'], "uploads/images/" . $user_img);
                     $arr_data['chat_image'] = $user_img;
   
                 }
   
                 
     $user = $this->Webservice_model->getwhere('sp_users', ['id'=>$arr_data['receiver_id']]);
     $user_r = $this->Webservice_model->getwhere('sp_users', ['id'=>$arr_data['sender_id']]);
   
   
              
   
     $res = $this->Webservice_model->insert_data('sp_mail', $arr_data);
   
     // print_r($arr_data);
   
     if ($res != "") {
       $single_data = array(
         'id' => $res
       );
       $fetch = $this->Webservice_model->getwhere('sp_mail', $single_data);
       $fetch[0]['chat_image'] = SITE_URL . "uploads/images/" . $fetch[0]['chat_image'];
       $fetch[0]['result'] = "successful";
       $json = $fetch[0];
     }
     else {
       $json = array(
         "result" => "unsuccessful"
       );
     }
                 
     header('Content-type: application/json');
     echo json_encode($json);
  }



public function demo1()
{
     $time1 = '10:00:00';
    $time2 = '09:30:00';
    $array1 = explode(':', $time1);
    $array2 = explode(':', $time2);

    $minutes1 = ($array1[0] * 60.0 + $array1[1]);
    $minutes2 = ($array2[0] * 60.0 + $array2[1]);

    echo $diff = $minutes1 - $minutes2.' Minutes';
//echo date_create('03:00')->diff(date_create('03:25'))->format('%H:%i');

}





/****************************************************************************/

    // end class
}

?>

