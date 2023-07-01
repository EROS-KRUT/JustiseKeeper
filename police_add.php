<!DOCTYPE html>
<html>
<head>
  <title>Complainer Home Page</title> 
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
  <?php
   session_start();
   if(!isset($_SESSION['x']))
       header("location:inchargelogin.php");   
   $con=mysqli_connect('localhost','root','','crime_portal');
   if(!$con)
   {
       die('could not connect: '.mysqli_error());
   }
    mysqli_select_db($con,"crime_portal");   
   $i_id=$_SESSION['email'];
   $result1=mysqli_query($con,"SELECT location FROM police_station where i_id='$i_id'");     
   $q2=mysqli_fetch_assoc($result1);
   $location=$q2['location'];   
if(isset($_POST['s'])){    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $p_name=$_POST['police_name'];
        $p_id=$_POST['police_id'];
        $spec=$_POST['police_spec'];
        $p_pass=$_POST['password'];
        $p_d_o_b=$_POST['p_d_o_b'];
        $d_o_j=$_POST['p_d_o_j'];
        $p_mob=$_POST['p_mobile_number'];
        $p_addr=$_POST['p_address'];
        $p_email=$_POST['p_emailid'];
        $p_aadhaar=$_POST['p_aadhar_number'];
        $p_dept=$_POST['p_department'];
        $p_desig=$_POST['p_designation'];
        $image=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "P_aadhaaruploads/". $image);
        $reg="insert into police values('$p_name','$p_id','$spec','$location','$p_pass','$p_d_o_b','$d_o_j','$p_mob','$p_addr','$p_email','$p_aadhaar','$p_dept','$p_desig','$image')";    
        $res=mysqli_query($con,$reg);
        if(!$res)
         {
          $message1 = "User already Exists.";
          echo "<script type='text/javascript'>alert('$message1');</script>";
        }
        else
        {
          $message = "Police Added Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }       
    }
}
?>
     <script>
     function f1()
    {
      var sta=document.getElementById("pname").value;
      var sta1=document.getElementById("pid").value;
      var sta2=document.getElementById("pspec").value;
      var sta3=document.getElementById("pas").value;
      var sta4=document.getElementById("dob").value;
      var sta5=document.getElementById("doj").value;
      var sta6=document.getElementById("p_mobno").value;
      var sta7=document.getElementById("paddr").value;
      var sta8=document.getElementById("p_email1").value;
      var sta9=document.getElementById("p_aadh").value;
      var sta10=document.getElementById("p_dept").value;
      var sta11=document.getElementById("p_desgn").value;
      var sta12=document.getElementById("image").value;
      
      var x=sta.trim();
      var x1=sta1.indexOf(' ');
      var x2=sta2.trim();
      var x3=sta3.indexOf(' ');
      var x4=sta4.indexOf(' ');
      var x5=sta5.indexOf(' ');
      var x6=sta6.indexOf(' ');
      var x7=sta7.indexOf(' ');
      var x8=sta8.indexOf(' ');
      var x9=sta9.indexOf(' ');
      var x10=sta10.indexOf(' ');
      var x11=sta11.indexOf(' ');
      var x12=sta12.indexOf(' ');     
  if(sta!="" && x==""){
    document.getElementById("pname").value="";
    document.getElementById("pname").focus();
      alert("Space Not Allowed");
        }        
         else if(sta1!="" && x1>=0){
    document.getElementById("pid").value="";
    document.getElementById("pid").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2==""){
    document.getElementById("pspec").value="";
    document.getElementById("pspec").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }      
        else if(sta4!="" && x4==""){
    document.getElementById("dob").value="";
    document.getElementById("dob").focus();
      alert("Space Not Allowed");
        }    
        else if(sta5!="" && x5==""){
    document.getElementById("doj").value="";
    document.getElementById("doj").focus();
      alert("Space Not Allowed");
        }  
        else if(sta6!="" && x6==""){
    document.getElementById("p_mobno").value="";
    document.getElementById("p_mobno").focus();
      alert("Space Not Allowed");
        }
        else if(sta7!="" && x7==""){
    document.getElementById("paddr").value="";
    document.getElementById("paddr").focus();
      alert("Space Not Allowed");
        }
        else if(sta8!="" && x8==""){
    document.getElementById("p_email1").value="";
    document.getElementById("p_email1").focus();
      alert("Space Not Allowed");
        }
        else if(sta9!="" && x9==""){
    document.getElementById("p_aadh").value="";
    document.getElementById("p_aadh").focus();
      alert("Space Not Allowed");
        }
        else if(sta10!="" && x10==""){
    document.getElementById("p_dept").value="";
    document.getElementById("p_dept").focus();
      alert("Space Not Allowed");
        }
        else if(sta11!="" && x11==""){
    document.getElementById("p_desgn").value="";
    document.getElementById("p_desgn").focus();
      alert("Space Not Allowed");
        }
        else if(sta12!="" && x12==""){
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
  <nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="incharge_view_police.php">Incharge Home</a></li>
      </ul>    
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="police_add.php">Log Police Officer</a></li>
        <li><a href="Incharge_complain_page.php">Complaint History</a></li>
        <li><a href="inc_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
 </nav>
 <div class="video" style="margin-top: 3%"> 
  <div class="center-container">
      <br><br>
      <div class="login-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <h1><u>Police Registration</h1></u><div style="margin-top: 4%">
          <form class="row g-3">
          <div class="col-md-4">
          <p style="color:white"> <label for="Policename" class="form-label">Police Name</p></label>
  <p style="color:white"> <input type="text" class="form-control" id="pname" name="police_name" required="" onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_d_o_b" class="form-label">Date Of Birth</p></label>
          <input type="date" class="form-control" id="dob" name="p_d_o_b"  required=""  onfocusout="f1()">
          </div>
          <div class="col-md-4">
  <p style="color:white"> <label for="p_d_o_j" class="form-label">Date Of Joining</p></label>
          <input type="date" class="form-control" name="p_d_o_j" id="doj" required=""  onfocusout="f1()">
          </div>
          <div class="col-md-4">
          <p style="color:white"> <label for="p_Mobile Number" class="form-label">Mobile Number</p></label>
    <input type="Mobile Number" class="form-control" id="p_mobno"  required=""  name="p_mobile_number" required pattern="[6789][0-9]{9}" minlength="10" maxlength="10"  onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_inputAddress" class="form-label">Home Address</p></label>
    <input type="text" class="form-control"  id="paddr"  required=""  name="p_address"  onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_Email-ID" class="form-label">Email-ID</p></label>
    <input type="text" class="form-control" id="p_email1"  required="" name="p_emailid"  onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_Aadhaar Number" class="form-label">Aadhaar Number</p></label>
    <input type="Aadhaar Number" class="form-control" id="p_aadh" name="p_aadhar_number" required="" minlength="12" maxlength="12" required pattern="[123456789][0-9]{11}"  onfocusout="f1()">
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="Aadhaar Image" class="form-label">Aadhaar Image</p></label>
    <input type="file" class="form-control" name="image" required=""  onfocusout="f1()">
  </div> 
  <div class="col-md-4">
  <p style="color:white"> <label for="p_department" class="form-label">Department</p></label>
  <input type="text" class="form-control" id="p_dept" required="" name="p_department"  onfocusout="f1()">  
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_designation" class="form-label">Designation</p></label>
  <input type="text" class="form-control" id="p_desgn" required="" name="p_designation"  onfocusout="f1()">  
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_specialist" class="form-label">Specialist</p></label>
  <input type="text" class="form-control" id="pspec" required="" name="police_spec" onfocusout="f1()">  
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_location" class="form-label">Location of Police Officer</p></label>
  <input type="text" required  name="location" id="loct" disabled value="<?php echo "$location"; ?>" onfocusout="f1()">
          <br>
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="p_pid" class="form-label">Police Id</p></label>
  <input type="text" class="form-control" id="pid" required="" name="police_id" onfocusout="f1()">  
  </div>
  <div class="col-md-4">
  <p style="color:white"> <label for="password" class="form-label">Password</p></label>
  <p style="color:white"> <input type="Password" class="form-control" id="pas" name="password"  onfocusout="f1()" pattern=".{6,}"  required="" maxlength="50" >
  </div> 
  <div class="col-md-8">
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