<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <!-- Title -->
                <title>Branch</title>
        
         <!-- Dynamic color -->
                <style>
            :root{
                --primary_color : #2c69a5;
                --primary_color_hover : #2c69a5cc;
            }
        </style>
            
        <!-- Favicon -->
            

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

        <!-- Icons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

        <!--  CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/login.css" type="text/css">
    </head>

    
<body class="login">

    <section class="main-area">
        <div class="container-fluid">
            <div class="row h100">
                                <div class="col-md-6 p-0 m-none" style="background: url(<?php echo base_url(); ?>assets/admin/images/bg_img.jpg) center center;background-size: cover;background-repeat: no-repeat;">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                </div>

                <div class="col-md-6 p-0">
                    <div class="login">
                        <div class="center-box">
                            <div class="logo">
                                 <img src="<?php echo base_url(); ?>assets/admin/images/color_logo.png" class="logo-img">
                            </div>
                            <div class="title">
                                
                                <h4 class="login_head">Branch Login</h4>
                                
                              <?php include("session_msg.php");  ?>
                                
                                
                                <p class="login-para">This is a secure system and you will need to provide your <br>
                                    login details to access the site.</p>
                            </div>
                            <div class="form-wrap">
                                <form role="form" class="pui-form" id=""  method="POST" action="<?php echo base_url(); ?>branch/branch_go">
                               <!-- <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM"> -->
                                    <div class="pui-form__element">
                                        <label class="animated-label ">Email</label>
                                        <input id="inputEmail" name="username" type="text" class="form-control" id="username"  value="" placeholder="">
                                            
                                    </div>
                                    <div class="pui-form__element">
                                        <label class="animated-label">Password</label>
                                        <input id="inputPassword" type="password" class="form-control " name="password" id="password" placeholder="">
                                            
                                    </div>
                                   <div class="pui-form__element">
                                        <button class="btn btn-lg btn-primary btn-block btn-salon" type="submit">SIGN IN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/js/myjavascript.js"></script>
</body>
 
</html>