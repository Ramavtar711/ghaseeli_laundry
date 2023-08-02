<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
    
    <!-- Dynamic color -->
        <style>
        :root{
            --primary_color : #2c69a5;
            --primary_color_hover : #2c69a5cc;
        }
                
        .goog-te-banner-frame {
    left: 0px;
    top: 0px;
    height: 39px;
    width: 100%;
    z-index: 10000001;
    position: fixed;
    border: none;
    border-bottom: 1px solid #6b90da;
    margin: 0;
    -moz-box-shadow: 0 0 8px 1px #999999;
    -webkit-box-shadow: 0 0 8px 1px #999999;
    box-shadow: 0 0 8px 1px #999999;
    _position: absolute;
    display: none !important;
}

/*loder css*/

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 100000000;
}
.overlay .overlayDoor:before, .overlay .overlayDoor:after {
  content: "";
  position: absolute;
  width: 50%;
  height: 100%;
  background: #111;
  transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
  transition-delay: 0.8s;
}
.overlay .overlayDoor:before {
  left: 0;
}
.overlay .overlayDoor:after {
  right: 0;
}
.overlay.loaded .overlayDoor:before {
  left: -50%;
}
.overlay.loaded .overlayDoor:after {
  right: -50%;
}
.overlay.loaded .overlayContent {
  opacity: 0;
  margin-top: -15px;
}
.overlay .overlayContent {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
}
.overlay .overlayContent .skip {
  display: block;
  width: 130px;
  text-align: center;
  margin: 50px auto 0;
  cursor: pointer;
  color: #fff;
  font-family: "Nunito";
  font-weight: 700;
  padding: 12px 0;
  border: 2px solid #fff;
  border-radius: 3px;
  transition: 0.2s ease;
}
.overlay .overlayContent .skip:hover {
  background: #ddd;
  color: #444;
  border-color: #ddd;
}

.loader {
  width: 128px;
  height: 128px;
  border: 3px solid #fff;
  border-bottom: 3px solid transparent;
  border-radius: 50%;
  position: relative;
  -webkit-animation: spin 1s linear infinite;
          animation: spin 1s linear infinite;
  display: flex;
  justify-content: center;
  align-items: center;
}
.loader .inner {
  width: 64px;
  height: 64px;
  border: 3px solid transparent;
  border-top: 3px solid #fff;
  border-radius: 50%;
  -webkit-animation: spinInner 1s linear infinite;
          animation: spinInner 1s linear infinite;
}

@-webkit-keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes spinInner {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-720deg);
  }
}
@keyframes spinInner {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-720deg);
  }
}
    </style>

    <!-- Title -->
        <title>Branch</title>

   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/nucleo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-wysihtml5.css">
   <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/sweetalert2.css" type="text/plain">-->
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/argon.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/mystyle.css" type="text/css">
 <!-- sweet alert -->
  <script src="<?=base_url('sweetAlert/sweetalert-dev.js');?>"></script>
  <link rel="stylesheet" href="<?=base_url('sweetAlert/sweetalert.css');?>"> 
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
 
    
 <script>
        $(document).ready(function() {
	// Users can skip the loading process if they want.
// 	$('.skip').click(function() {
// 		$('.overlay, body').addClass('loaded');
// 	})
	
	// Will wait for everything on the page to load.
	$(window).bind('load', function() {
		$('.overlay, body').addClass('loaded');
		setTimeout(function() {
			$('.overlay').css({'display':'none'})
		}, 4000)
	});
	
	// Will remove overlay after 1min for users cannnot load properly.
// 	setTimeout(function() {
// 		$('.overlay, body').addClass('loaded');
// 	}, 60000);
})
    </script>
</head>
<body>
    <div class="overlay">
	<div class="overlayDoor"></div>
	<div class="overlayContent">
		<div class="loader">
			<div class="inner"></div>
		</div>
		<!--<div class="skip">SKIP</div>-->
	</div>
</div>