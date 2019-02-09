<!DOCTYPE html>
<html lang="en">
<head>
  <title>Parking Spaces</title>
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
</head>
<?php include("Nav.php");?>
<body>
    <div class="main">

    </div>
    <div class="container" style="margin-top:5%;"> 
        <?php if($spaces){
                foreach($spaces as $d){
                ?>
            <div class="col-md-5 no-padding lib-item card" data-category="view">
                <div class="lib-panel">
                    <div class="row ">
                        <div class="col-md-3 nopadding">
                            <?php $base=base_url()."images"; echo '<img id="uploaded_image" class="lib-img-show" src="'.$base.'/'.$d->imgadd.'" alt="Image Not Present"/>';?>
                        </div>
                        <div class="col-md-9 paddings">
                            <div class="lib-row lib-header">
                                <h2><?php echo $d->businessname?></h2>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                                <?php echo $d->address?>
                            </div>
                            <div class="lib-row lib-desc">
                                <?php echo $d->phone?>
                            </div>
                            <form action="<?php echo base_url();?>Findspace/Book/<?php echo $d->id?>" method="post">
                            <div class="lib-row lib-desc">
                               <div class="row">
                               <div class="col-md-4">
                               <label>Date: </label>
                               <input type="date"  name="bookdate">
                               </div>
                               <div class="col-md-4">
                               <label>Time: </label>
                               <select name="timing">
                                   <option value="8:00 AM - 10:00 AM">8:00 AM - 10:00 AM</option>
                                   <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                                   <option value="12:00 PM - 2:00 PM">12:00 PM - 2:00 PM</option>
                                   <option value="2:00 PM - 4:00 PM">2:00 PM - 4:00 PM</option>
                                   <option value="4:00 PM - 6:00 PM">4:00 PM - 6:00 PM</option>
                                   <option value="6:00 PM - 8:00 PM">6:00 PM - 8:00 PM</option>
                               </select>
                               </div>
                            </div>
                            <input type="submit" value="Book" class="lib-row btn btn-warning">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                
    </div>
    <?php }}?>
                </div>
                <div style="margin-top:20px;">
                </div>
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>

</body>
</html>
