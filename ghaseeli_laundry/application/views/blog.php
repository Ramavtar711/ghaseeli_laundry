<!DOCTYPE html>
<html>
<head>
	<title>blog</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<style>
		body
	{
		background: #0d0e0d;
	    color: #ffffffa6;
	    font-size: 14px;
	    padding: 20px;
	    font-family: sans-serif;
	}
	.card
	{
		background: transparent;
    	box-shadow: 0px 0px 3px #ffffff6e;
    	margin-bottom: 15px;
	}
	.card-title {
	    margin-bottom: 10px;
	    color: #ffd770;
	    font-size: 16px;
	}
	.card-block {
	    padding: 15px;
	}
	.date-text
	{
		font-size: 12px;
    	margin: 6px 0px;
	}
	.card-text p
	{
		font-size: 13px;
	}
	.upp-text
	{
		position: absolute;
    top: 10px;
    left: 10px;
    color: black;
    background: #ffca3bc9;
    padding: 2px 5px;
    border-radius: 7px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 12px;
	}
	</style>
</head>

<body>
    
<a href="<?php echo base_url('webservice/article'); ?>">    
<div class="container-fluid">
        <div class="row">
        	<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url('assets/post.jpg'); ?>">
                    <a href="" class="upp-text">new</a>
                    <div class="card-block">
                    	<div class="date-text">
                    	<span class="float-right">Joined in 2013</span>
                        <span>by Eduro santa</span>
                    	</div>
                        <h4 class="card-title">The Profesional Trainer</h4>
                        
                        <div class="card-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, </p>
                        </div>
                    </div>
                </div>
            </div>
          <!--  <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url('assets/post.jpg'); ?>">
                    <a href="" class="upp-text">new</a>
                    <div class="card-block">
                    	<div class="date-text">
                    	<span class="float-right">Joined in 2013</span>
                        <span>by Eduro santa</span>
                    	</div>
                        <h4 class="card-title">The Profesional Trainer</h4>
                        
                        <div class="card-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, </p>
                        </div>
                    </div>
                </div>
            </div>
          
          <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url('assets/post.jpg'); ?>">
                    <a href="" class="upp-text">new</a>
                    <div class="card-block">
                    	<div class="date-text">
                    	<span class="float-right">Joined in 2013</span>
                        <span>by Eduro santa</span>
                    	</div>
                        <h4 class="card-title">The Profesional Trainer</h4>
                        
                        <div class="card-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, </p>
                        </div>
                    </div>
                </div>
            </div>-->
          
          
 </div>
</div>
</a>
</body>
</html>