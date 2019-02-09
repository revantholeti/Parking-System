<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your Parking Spaces</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?php echo base_url();?>style/placesstyle.css" rel="stylesheet"> 
  <style>
      a{
          color:white;
      }
  </style>
  <script>
	$(document).ready(function() {
		$('.nav-tabs > li > a').click(function(event){
		event.preventDefault();//stop browser to take action for clicked anchor
					
		//get displaying tab content jQuery selector
		var active_tab_selector = $('.nav-tabs > li.active > a').attr('href');					
					
		//find actived navigation and remove 'active' css
		var actived_nav = $('.nav-tabs > li.active');
		actived_nav.removeClass('active');
					
		//add 'active' css into clicked navigation
		$(this).parents('li').addClass('active');
					
		//hide displaying tab content
		$(active_tab_selector).removeClass('active');
		$(active_tab_selector).addClass('hide');
					
		//show target tab content
		var target_tab_selector = $(this).attr('href');
		$(target_tab_selector).removeClass('hide');
		$(target_tab_selector).addClass('active');
	     });
	  });
    </script>
</head>
<?php include("Nav.php");?>
<body>
    <div class="main">

    </div>
    <div class="container" style="margin-top:5%;"> 
        <div class="navigation">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab1">Live</a>
				</li>
				<li>
					<a href="#tab2">All</a>
				</li>
			</ul>	
        </div>
        <section id="tab1" class="tab-content lender active">
            <?php if($active){
                    foreach($active as $d){
                    ?>
                <div class="col-md-5 no-padding lib-item card" data-category="view" style="border-radius:0px;font-size:18px;">
                    <div class="lib-panel">
                        <div class="row">
                            <div class="col-md-4" style="padding-top:5px;">
                                <div class="lib-row lib-desc">
                                    <label>Name: </label>
                                    <?php echo $d->name?>
                                </div>
                                <div class="lib-row lib-desc">
                                    <label>Phone: </label>
                                    <?php echo $d->phone?>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding-top:5px;">                           
                                <div class="lib-row lib-desc">
                                    <label>Date: </label>
                                    <?php echo $d->bookdate?>
                                </div>                          
                                <div class="lib-row lib-desc">
                                    <label>Time: </label>
                                    <?php echo $d->time?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }}?>
        </section>
        <section id="tab2" class="tab-content providers hide">
        <?php if($spaces){
                foreach($spaces as $d){
                ?>
            <div class="col-md-5 no-padding lib-item card" data-category="view" style="border-radius:0px;font-size:18px;">
                <div class="lib-panel">
                    <div class="row">
                        <div class="col-md-4" style="padding-top:5px;">
                            <div class="lib-row lib-desc">
                                <label>Name: </label>
                                <?php echo $d->name?>
                            </div>
                            <div class="lib-row lib-desc">
                                <label>Phone: </label>
                                <?php echo $d->phone?>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-top:5px;">                           
                            <div class="lib-row lib-desc">
                                <label>Date: </label>
                                <?php echo $d->bookdate?>
                            </div>                          
                            <div class="lib-row lib-desc">
                                <label>Time: </label>
                                <?php echo $d->time?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php }}?>
         </section>
         <div style="margin-top:20px;">
                </div>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>

</body>
</html>
