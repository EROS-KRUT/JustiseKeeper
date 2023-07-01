<!DOCTYPE html>
<html>
<head>
<?php
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $u_id=$_POST['email'];
        $_SESSION['u_id']=$u_id;
        $result=mysqli_query($conn,"SELECT u_id,u_pass FROM user where u_id='$name' and u_pass='$pass' ");      
        if(!$result || mysqli_num_rows($result)==0)
        {
          $message = "Id or Password not Matched.";
          echo "<script type='text/javascript'>alert('$message');</script>";  
        }
        else 
        {
          header("location:complainer_page.php");
          
        }
    }                
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet" type="text/css" media="all" />
  <script>
     function f1()
        {
            var sta2=document.getElementById("exampleInputEmail1").value;
            var sta3=document.getElementById("exampleInputPassword1").value;
          var x2=sta2.indexOf(' ');
var x3=sta3.indexOf(' ');
    if(sta2!="" && x2>=0){
    document.getElementById("exampleInputEmail1").value="";
    document.getElementById("exampleInputEmail1").focus();
      showalert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("exampleInputPassword1").value="";
    document.getElementById("exampleInputPassword1").focus();
      alert("Space Not Allowed");
        }
}
    </script>
    
  <title>Complainant Login</title>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top" style="height: 60px;">
  <div class="container-fluid">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="home.php" style="margin-top: 5%;"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active" style="margin-top: 5%;"><a href="userlogin.php">User Login</a></li>
      </ul>  
    </div>
  </div>
 </nav>
 <div class="video" style="margin-top: 5%"> 
 <div style="align=center">
  <div class="form">
    <form method="post" autocomplete="off">
  <h2><u>LOGIN</h2></u>
  <label>EMAIL</label>
    <input type="email"  id="exampleInputEmail1"  placeholder="Enter Email id" required name="email" onfocusout="f1()"> 
  <label>PASSWORD</label>
    <input type="password"  id="exampleInputPassword1" placeholder="Password" required name="password" onfocusout="f1()"><br>
    <div  style="margin-top: 3%;margin-left: 3%">
  <button type="submit"  name="s" onclick="f1()">Submit</button><br><br>
  </div>
</form>
</div>
</div>
</div>
</body>
</html>