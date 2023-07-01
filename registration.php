<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
   -webkit-appearance: none;
   margin: 0;
}
input[type="number"] {
   -moz-appearance: textfield;
}
</style>
<?php
session_start();
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $u_name=$_POST['name'];
        $u_id=$_POST['email'];
        $u_pass=$_POST['password'];
        $u_addr=$_POST['adress'];
        $a_no=$_POST['aadhar_number'];
        $gen=$_POST['gender'];
        $mob=$_POST['mobile_number'];
        $d_o_b=$_POST['d_o_b'];
        $image=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];      
        move_uploaded_file($tmp_name, "U_aadhaaruploads/". $image);
       $reg="insert into user values('$u_name','$u_id','$u_pass','$u_addr','$a_no','$gen','$mob','$d_o_b','$image')";
        mysqli_select_db($con,"crime_portal");
        $res=mysqli_query($con,$reg);
        if(!$res)
        {
          $message1 = "User Already Exist";
          echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            else
    {
        $message = "User Registered Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";   
    }
  }
}
?> 
<script>
     function f1()
        {
            var sta=document.getElementById("name1").value;
            var sta1=document.getElementById("email1").value;
            var sta2=document.getElementById("pass").value;
            var sta3=document.getElementById("addr").value;
            var sta4=document.getElementById("aadh").value;
            
            var sta5=document.getElementById("mobno").value;
            var sta6=document.getElementById("dob").value;
            var sta7=document.getElementById("image").value;
  var x=sta.trim();
  var x1=sta1.indexOf(' ');
  var x2=sta2.indexOf(' ');
  var x3=sta3.indexOf(' ');
  var x4=sta4.indexOf(' ');
	var x5=sta5.indexOf(' ');
  var x6=sta6.indexOf(' ');
  var x7=sta7.indexOf(' '); 
	if(sta!="" && x==""){
		document.getElementById("name1").value="";
		document.getElementById("name1").focus();
		  alert("Space Not Allowed");
        }      
         else if(sta1!="" && x1>=0){
    document.getElementById("email1").value="";
    document.getElementById("email1").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("pass").value="";
    document.getElementById("pass").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3==0){
    document.getElementById("addr").value="";
    document.getElementById("addr").focus();
      alert("Space Not Allowed");
        }
        else if(sta4!="" && x4>=0){
    document.getElementById("aadh").value="";
    document.getElementById("aadh").focus();
      alert("Space Not Allowed");
        }    
        else if(sta5!="" && x5>=0){
    document.getElementById("mobno").value="";
    document.getElementById("mobno").focus();
      alert("Space Not Allowed");
        }
        else if(sta6!="" && x6>=0){
    document.getElementById("dob").value="";
    document.getElementById("dob").focus();
      alert("Space Not Allowed");
        }
        else if(sta7!="" && x7>=0){
    document.getElementById("image").value="";
    document.getElementById("image").focus();
      alert("Space Not Allowed");
        }
}
</script>    
</head>
<body style="background-size: cover;
    background-image: url(grad.jpg);
    background-position: center;">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
      <li class><a href="userlogin.php">Login</a></li>
        <li class="active"><a href="registration.php">Registration</a></li>       
       </ul>
    </div>
  </div>
</nav>
<div class="video" style="margin-top: 4%"> 
	<div class="center-container">
			<br><br>
			<div class="login-form">	
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <h1><u>User Registration</h1></u><div style="margin-top: 4%"> <div  style="margin-left: 5%">
          <form class="row g-3">
  <div class="col-md-5">
  <p style="color:white"> <label for="Full Name" class="form-label">Full Name</p></label>
  <input type="text" style="text-transform: uppercase;" pattern="[a-zA-Z]+" title=" (Enter alphabets only) " class="form-control" id="name1" required="" name="name" >  
  </div>
  <div class="col-md-5">
  <p style="color:white"> <label for="Email-ID" class="form-label">Email-ID</p></label>
    <input type="email" style="text-transform: lowercase;" class="form-control" id="email1"  name="email"  validate="required:true"
    pattern="[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"  required>
  </div>
  <div class="col-md-5">
  <p style="color:white"> <label for="Password" class="form-label">Password</p></label>
  <p style="color:white"> <input type="Password" class="form-control" id="pass" name="password" onfocusout="f1()" required="" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
  </div>
  <div class="col-md-5">
  <p style="color:white"> <label for="inputAddress" class="form-label">Home Address</p></label>
    <input type="text" class="form-control"  id="addr"  required=""  name="adress" onfocusout="f1()">
  </div>
  <div class="col-md-5">
  <form onsubmit="alert('Submitted');">
  <p style="color:white"> <label for="Aadhaar Number" class="form-label">Aadhaar Number</p></label>
    <input type="dir" title="Enter numbers only"  maxlength="12" class="form-control" id="aadh" name="aadhar_number" required=""  pattern="^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$">
  </div>
</form>
  <div class="col-md-5">
  <p style="color:white"> <label for="Aadhaar Card" class="form-label">Aadhaar Card</p></label>
    <input type="file" accept=".png, .jpg, .jpeg, .pdf" class="form-control" name="image" required="">
  </div>
  <div class="col-md-5">
          <p style="color:white"> <label for="Mobile Number" class="form-label">Mobile Number</p></label>        
    <input type="number" min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10"  class="form-control" id="mobno"  required  name="mobile_number" required pattern="[7-9]{1}[0-9]{9}"  >
  </div>
  <div class="col-md-4">
						<p style="color:white">Gender</p><select class="form-control" id="gen" name="gender">
							<option>Male</option>
							<option>Female</option>
							<option>Others</option>
						</select>
          </div>
  <div class="col-md-5">
  <p style="color:white"> <label for="d_o_b" class="form-label">Date Of Birth</p></label>
					<input type="date" id="dob" class="form-control" max="2021-03-31" min="1921-01-01" name="d_o_b" required="">        
					</div>
  <div  class="col-md-8">
  <button type="submit"  class="btn btn-primary" name="s" onclick="f1()">Submit</button>
 </div>
				</form>	
        </div>
			</div>	
		</div>
	</div>	
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>            
</body>
</html>