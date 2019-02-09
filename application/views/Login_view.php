<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?php echo base_url();?>style/Signup.css" rel="stylesheet"> 
  <style>
      a{
          color:white;
      }      
  </style>
</head>
<?php include("Nav.php");?>
<body>
<div class="navigate" style="margin-top:15%;">
        <div class="back" >
		<section id="tab1" class="tab-content providers active">
			<div class="form-group">
				<form action="<?php echo base_url();?>Signup/Signin" method="post">
                    <h3>Parking Provider</h3>
                    <span class="text-danger"><?php if($this->session->flashdata('error')){
                            echo $this->session->flashdata('error');
                        } ?></span><br>
                    <input type="number" placeholder="Phone Number" class="form-control" name="phone"><br>
                    <input type="password" placeholder="Password" class="form-control" name="password"><br>
                    <input type="submit" class="btn btn-primary" value="Login"> 
                </form>
			</div>
        </section>
        </div>
    </div>
</body>
</html>
