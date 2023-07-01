<!DOCTYPE html>
<html>
  <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $i_id=$_POST['incharge_id'];
        $i_name=$_POST['incharge_name'];
        $location=$_POST['location'];
        $i_pass=$_POST['password'];
        $I_dob=$_POST['d_o_b'];
        $I_doj=$_POST['d_o_j'];
        $Mobno=$_POST['Mobile_number'];
        $I_addr=$_POST['address'];
        $I_email=$_POST['emailid'];
        $I_aadhaar=$_POST['aadhaarnumber'];
        $image=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "I_aadhaaruploads/". $image);       
    $reg="insert into police_station values('$i_id','$i_name','$location','$i_pass','$I_dob','$I_doj','$Mobno','$I_addr','$I_email','$I_aadhaar','$image')";
     mysqli_select_db($con,"crime_portal");    
        $res=mysqli_query($con,$reg);
        if(!$res)
            {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }           
        else
    {
        $message = "Police Station Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>
<script>
     function f1()
        {
         var sta=document.getElementById("station").value;
         var sta1=document.getElementById("iname").value;
         var sta2=document.getElementById("iid").value;
         var sta3=document.getElementById("pas").value;
         var sta4=document.getElementById("dob").value;
         var sta5=document.getElementById("doj").value;
         var sta6=document.getElementById("mobnum").value;
         var sta7=document.getElementById("address1").value;
         var sta8=document.getElementById("email").value;
         var sta9=document.getElementById("aadhaar").value;
         var sta10=document.getElementById("image").value;
         var x=sta.indexOf(' ');
         var x1=sta1.trim();
         var x2=sta2.indexOf(' ');
         var x3=sta3.indexOf(' ');
         var x4=sta4.indexOf(' ');
         var x5=sta5.indexOf(' ');
         var x6=sta6.indexOf(' ');
         var x7=sta7.indexOf(' ');
         var x8=sta8.indexOf(' ');
         var x9=sta9.indexOf(' ');
         var x10=sta10.indexOf(' ');
 if(sta!="" && x==""){
    document.getElementById("station").value="";
    document.getElementById("station").focus();
      alert("Space Not Allowed");
        }
         else if(sta1!="" && x1==""){
    document.getElementById("iname").value="";
    document.getElementById("iname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("iid").value="";
    document.getElementById("iid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
        else if(sta4!="" && x4>=0){
    document.getElementById("d_o_b").value="";
    document.getElementById("d_o_b").focus();
      alert("Space Not Allowed");
        }
        else if(sta5!="" && x5>=0){
    document.getElementById("d_o_j").value="";
    document.getElementById("d_o_j").focus();
      alert("Space Not Allowed");
        }
        else if(sta6!="" && x6>=0){
    document.getElementById("mobnum").value="";
    document.getElementById("mobnum").focus();
      alert("Space Not Allowed");
        }
        else if(sta7!="" && x7>=0){
    document.getElementById("address1").value="";
    document.getElementById("address1").focus();
      alert("Space Not Allowed");
        }
        else if(sta8!="" && x8>=0){
    document.getElementById("email").value="";
    document.getElementById("email").focus();
      alert("Space Not Allowed");
        }
        else if(sta9!="" && x9>=0){
    document.getElementById("aadhaar").value="";
    document.getElementById("aadhaar").focus();
      alert("Space Not Allowed");
        }
        else if(sta10!="" && x10>=0){
    document.getElementById("image").value="";
    document.getElementById("image").focus();
      alert("Space Not Allowed");
        }
      }
</script>
<head>
<title>Add Incharge Officers</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
</head> 
<body style="background-size: cover;
    background-image: url(grad.jpg);
    background-position: center;">
  <nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" ><b>Crime Portal</b></a>
    </div>     
      <ul class="nav navbar-nav navbar-right">
      <li><a href="head_view_police_station.php">HQ Home</a></li>
        <li class="active"><a href="police_station_add.php">Log Police Station</a></li>
      <li> <a href="h_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
 <div class="video" style="margin-top: 3%"> 
  <div class="center-container">
      <br><br>
      <div class="police-login-form"> 
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <h1><u>Incharge Registration</h1></u><div style="margin-top: 4%">
          <form class="row g-3">
  <div class="col-md-4">
  <p style="color:white"> <label for="iname" class="form-label">Incharge Name</p></label>
  <input type="text" style="text-transform: uppercase;" pattern="[a-zA-Z]+" title=" (Enter alphabets only) " class="form-control" id="iname" required="" name="incharge_name" onfocusout="f1()">  
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="dob" class="form-label">Date Of Birth</p></label>
          <input type="date" class="form-control" name="d_o_b"  required="" onfocusout="f1()">
          </div>
          <div class="col-md-4">
  <p style="color:white"> <label for="doj" class="form-label">Date Of Joining</p></label>
          <input type="date" class="form-control" name="d_o_j"  required="" onfocusout="f1()">
          </div>
          <div class="col-md-4">
          <p style="color:white"> <label for="MobileNumber" class="form-label">Mobile Number</p></label>
    <input type="Mobile Number" class="form-control" id="mobnum"  required=""  name="Mobile_number" required pattern="[6789][0-9]{9}" minlength="10" maxlength="10" onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="Address" class="form-label">Address</p></label>
    <input type="text" class="form-control"  id="address1"  required=""  name="address" onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="EmailID" class="form-label">Email-ID</p></label>
    <input type="text" style="text-transform: lowercase;" class="form-control" id="email"  required="" name="emailid" onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="AadhaarNumber" class="form-label">Aadhaar Number</p></label>
    <input type="Aadhaar Number" class="form-control" id="aadhaar" name="aadhaarnumber" required="" minlength="12" maxlength="12" required pattern="[123456789][0-9]{11}" onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="Aadhaar Image" class="form-label">Aadhaar Image</p></label>
    <input type="file" class="form-control" name="image" required="" onfocusout="f1()">
  </div>       
  <div class="col-md-4">
  <p style="color:white"> <label for="station" class="form-label">Station Location</p></label>
    <input type="text" class="form-control" id="station"  required="" name="location" onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="Inchargeid" class="form-label">Incharge Id</p></label>
  <p style="color:white"> <input type="text" class="form-control" id="iid" name="incharge_id"  onfocusout="f1()" required>
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="Password" class="form-label">Password</p></label>
  <p style="color:white"> <input type="Password" class="form-control" id="pas" name="password"  onfocusout="f1()" pattern=".{6,}"  required="" maxlength="50" >
  </div>
  <div  class="col-md-8">
  <button type="submit" class="btn btn-primary" name="s" onclick="f1()">Submit</button>
 </div> 
        </form> 
      </div>  
    </div>
  </div>                
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>