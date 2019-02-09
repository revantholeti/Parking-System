<nav class="navbar  navbar-fixed-top navbar-inverse navbar-custom" role="navigation" >
  <div class="container-fluid">
    <div class="navbar-header">
    <span><a class="navbar-brand" href="<?php echo base_url();?>">Parking Service</a></span>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>Home/parkingspaces">Parking Spaces</a></li>
        <li><a href="<?php echo base_url();?>Home/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?php echo base_url();?>Home/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" id="myDIV">
        <li class="btn"><a href="<?php echo base_url();?>Findspace">Parking Spaces</a></li>
        <?php if($this->session->userdata('id')){?>
          
              <li class="btn"><a href="<?php echo base_url();?>Home/SellerEntry">Provide Parking</a></li>
              <li class="btn"><a href="<?php echo base_url();?>Findspace/Sellerspace">Your Spaces</a></li>
              <li class="btn"><a href="<?php echo base_url();?>Findspace/Bookings">Bookings</a></li>
              <li class="btn"><a href="<?php echo base_url();?>Signup/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
           
          </li>
          
        <?php }?>
        <?php if(!$this->session->userdata('id')){?>
        <li class="btn"><a href="<?php echo base_url();?>Signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li class="btn"><a href="<?php echo base_url();?>Signup/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>


