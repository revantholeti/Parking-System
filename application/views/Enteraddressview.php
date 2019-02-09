<!DOCTYPE html>
<html>
<head>
  <title>Parking Spaces</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  <link href="<?php echo base_url();?>style/Addressentry.css" rel="stylesheet"> 
</head>
<?php include("Nav.php");?>
<body>
    <div class="container" style="margin-top:5%;"> 
      <div class="box">
        <form action="<?php echo base_url();?>Home/newParkings" method="post"  enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">
                <label>Name</label><input type="text" name="name" class="form-control"><br>
                <label>Business Name</label><input type="text" name="business_name" class="form-control"><br>
                <label>Phone.No</label><input type="number" name="phone" class="form-control"><br>
                <label>Number of Vehicals can be parked</label><input type="number" name="vehnum" class="form-control"><br>
                <label>Address</label><textarea rows="5" cols="5" class="form-control" name="address"></textarea><br>
            </div>
            <div class="col-md-6">
                <div id="googleMap" style="height:200px;margin-top:20px;" ></div>
                <div class="row" id="image_button">
                    <div id="image_div" class="col-md-7">
                        <img id="uploaded_image" src="#" alt="Your Parking Space Image"/>
                    </div>
                    <div class="col-md-5 file-upload">
                            <div id="image_file_button" class="fileUpload btn btn-primary" style="width:150px;">
                                <span>Upload Image</span>
                                <input type="file" id="image_file" name="userfile" onchange="readURL(this);" class="form-control upload" >
                            </div>
                        <input type="submit" class="btn form-control btn-success" name="submit" value="Submit" style="width:150px;height:50px;font-size:20px;">
                    </div>
                </div>
            </div>
            <div>
        </form>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#uploaded_image')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function myMap() {
            var mapProp= {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjRCvrfi9Sh1DU-rFuQEMZfu7tdvn2z40&callback=myMap"></script>
</body>
</html>
