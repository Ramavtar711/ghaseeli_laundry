<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
      $button = "submit";
      $btn_name = "Add";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('delivery_charge',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      
      
      
         $client  = @$_SERVER['HTTP_CLIENT_IP'];
      $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
      $remote  = @$_SERVER['REMOTE_ADDR'];
      $result  = array('country'=>'', 'city'=>'');
      if(filter_var($client, FILTER_VALIDATE_IP)){
          $ip = $client;
      }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
          $ip = $forward;
      }else{
          $ip = $remote;
      }
      $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
      if($ip_data && $ip_data->geoplugin_countryName != null){
        $ip_result['country_name'] = $ip_data->geoplugin_countryName;
          $ip_result['country'] = $ip_data->geoplugin_countryCode;
          $ip_result['city'] = $ip_data->geoplugin_city;
          $ip_result['lat'] = $ip_data->geoplugin_latitude;
          $ip_result['lon'] = $ip_data->geoplugin_longitude;
      }else{
          $ip_result['lat'] = 28.7041;
          $ip_result['lon'] = 77.1025;
            }
      
      

      
    ?>  



    <div class="header pt-7" style="background-image:  url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Add Delivery Charge</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="<?php echo base_url('admin/page/dashboard'); ?>"><i class="fa fa-home text-primary"></i></a></li>
                 <li class="breadcrumb-item active text-white" aria-current="page">Add Delivery Charge</li>
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
            <span class="h3">add Delivery Charge</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                             
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create"></label> 
                                    <input  class="form-control" id="" name="delivery_charge" placeholder="Delivery Charge" type="text" value="<?=$row['delivery_charge'];?>"required>
                                   </div>
                              
                  <div class="form-group">
                                    <label class="form-control-label" for="name_create"></label> 
                                    <input  class="form-control" id="" name="location" placeholder="Enter a location" type="text" value="<?=$row['location'];?>"required>
                                   </div>
                              
                              
                         <!--     
                               <div class="form-group">
                                    <label class="form-control-label" for="name_create"></label> 
                                     <input id="pac-input" class="form-control pac-target-input" name="location" autocomplete="off"type="text" placeholder="Enter a location" value="<?=$row['location'];?>">
                              </div>
                            <div class="form-group">
                            <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                            <div id="infowindow-content">
                            <span id="place-name" class="title"></span><br />
                            <span id="place-address"></span>
                            </div>
                               </div>    
                        <div class="row">
                    <div class="form-group col-md-6">
                  <label for="inputEmail3">Latitude</label>
                     <input type="text"  class="form-control" name="lat" id="latitude" require value="<?=$row['lat'];?>">
                    </div>
                   
                    <div class="form-group col-md-6">
                    <label for="inputEmail3">Longitude</label>
                 <input type="text"  class="form-control" name="lon" id="longnitude" require value="<?=$row['lon'];?>">
                    </div>
                    </div>
                   -->

                                   
                                   
                         <div class="text-center">
                                    <button class="btn btn-primary mt-4 mb-5" type="submit" name="<?=$button;?>"><?=$btn_name;?></button>
                                </div>
                            </div>
                        </form>
        </div>
      </div>
    </div>
</div>

 </di>
</div>
</div>
  
                    
  <?php include('include/footer.php'); ?>
  
  
  

<script>

   function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

    

 </body>
</html>



<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

$arr_data = $this->input->post();
  $admin = $this->session->userdata('admin');
            $admin_id =   $admin->id;
            $arr_data['branch_id'] =$admin_id;


unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('delivery_charge',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add delivery Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/delivery_charge')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add delivery',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}

}// end if submit


// for update restaurant
if(isset($update)){

$arr_data = $this->input->post();

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);

$result = $this->admin_common_model->update_data('delivery_charge',$arr_data, $arr_where); 

             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update Charge Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/delivery_charge')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Charge',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

  <style>
     .dialog {
    padding-right: 18px;
    float: left;
    position: relative;
}
.close-thik{
   background: #FFF none repeat scroll 0% 0%;
color: #0A0A0A;
font: 14px/100% arial,sans-serif;
position: absolute;
right: 20px;
text-decoration: none;
text-shadow: 0px 1px 0px #FFF;
top: 5px; 
}
.dialog label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.upload_file {
    width: 120px;
    height: 100px;
    border: 1px solid #0070BC;
}
.dialog input{
        visibility: hidden;
    position: absolute;

}

     </style>



<style type="text/css">
    .input-controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchInput {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 50%;
    }
    #searchInput:focus {
      border-color: #4d90fe;
    }
</style>

 <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 25.276987, lng: 55.296249 },
          zoom: 13,
        });
        const card = document.getElementById("pac-card");
        const input = document.getElementById("pac-input");
        const biasInputElement = document.getElementById("use-location-bias");
        const strictBoundsInputElement = document.getElementById(
          "use-strict-bounds"
        );
        const options = {
         
          fields: ["formatted_address", "geometry", "name"],
          origin: map.getCenter(),
          strictBounds: false,
          types: ["establishment"],
        };
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        const autocomplete = new google.maps.places.Autocomplete(
          input,
          options
        );
		  
        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo("bounds", map);
        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");
        infowindow.setContent(infowindowContent);
        const marker = new google.maps.Marker({
          map,
          anchorPoint: new google.maps.Point(0, -29),
        });
        autocomplete.addListener("place_changed", () => {
          infowindow.close();
          marker.setVisible(false);
          const place = autocomplete.getPlace();

          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(
              "No details available for input: '" + place.name + "'"
            );
            return;
          }
            document.getElementById('latitude').value = place.geometry.location.lat();
           document.getElementById('longnitude').value = place.geometry.location.lng();
          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
          infowindowContent.children["place-name"].textContent = place.name;
          infowindowContent.children["place-address"].textContent =
            place.formatted_address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          const radioButton = document.getElementById(id);
          radioButton.addEventListener("click", () => {
            autocomplete.setTypes(types);
            input.value = "";
          });
        }
        setupClickListener("changetype-all", []);
        setupClickListener("changetype-address", ["address"]);
        setupClickListener("changetype-establishment", ["establishment"]);
        setupClickListener("changetype-geocode", ["geocode"]);
		
        biasInputElement.addEventListener("change", () => {
          if (biasInputElement.checked) {
            autocomplete.bindTo("bounds", map);
          } else {
            // User wants to turn off location bias, so three things need to happen:
            // 1. Unbind from map
            // 2. Reset the bounds to whole world
            // 3. Uncheck the strict bounds checkbox UI (which also disables strict bounds)
            autocomplete.unbind("bounds");
            autocomplete.setBounds({
              east: 180,
              west: -180,
              north: 90,
              south: -90,
            });
            strictBoundsInputElement.checked = biasInputElement.checked;
          }
          input.value = "";
        });
        strictBoundsInputElement.addEventListener("change", () => {
          autocomplete.setOptions({
            strictBounds: strictBoundsInputElement.checked,
          });

          if (strictBoundsInputElement.checked) {
            biasInputElement.checked = strictBoundsInputElement.checked;
            autocomplete.bindTo("bounds", map);
          }
          input.value = "";
        });
      }
    </script>   

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsAl96Phonf22z69GSDlYQOjlDO6NsiWk&callback=initMap&libraries=places&v=weekly"
      async
    ></script>


  
  
  
  
  