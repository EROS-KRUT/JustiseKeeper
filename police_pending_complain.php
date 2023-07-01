     <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    if(isset($_POST['s2']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
       $cid=$_POST['cid'];
       $_SESSION['cid']=$cid;
       $alok=mysqli_query($conn,"SELECT p_id FROM complaint WHERE c_id='$cid'");
       $row = mysqli_fetch_assoc($alok);
       $p_id=$_SESSION['pol'];
     if($row['p_id']==$p_id){
     header("location:police_complainDetails.php");}
     else{
         $message = "Not in your scope";
        echo "<script type='text/javascript'>alert('$message');</script>";
     }
 }
}    
    $p_id=$_SESSION['pol'];
     $result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location FROM complaint where p_id='$p_id' and pol_status='In Process' order by c_id desc");
    ?>
 <script>
     function f1()
        {
        var sta2=document.getElementById("ciid").value;
        var x2=sta2.indexOf(' ');
      if(sta2!="" && x2>=0){
          document.getElementById("ciid").value="";
          alert("Blank Field Found");
        }
}
</script>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
  *{ margin: 0; padding: 0; box-sizing: border-box;
  font-family: 'Josefin Sans', sans-serif;}
  .carousel-inner img {
    width: 40vh;
    height: 90vh; 
  }
  .navbar-brand{
    font-size:larger;
  } 
  </style>
<title>Police pending complain</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">  
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item px-1">
         <a class="nav-link" >Crime Portal <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="navbar-brand" href="police_pending_complain.php">Police Home</a>
       </li>      
       </ul>
       <ul class="navbar-nav ml-auto">
       <li class="nav-item active" >
       <a class="navbar-brand" href="police_pending_complain.php">Pending Complaints</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="police_complete.php">Completed Complaints</a>
       </li>
       <li class="nav-item ">
       <a class="nav-link" href="p_logout.php">Logout </a></li>
</ul>
     </ul>
   </div>
 </nav>    
    <form style="margin-top: 7%; margin-left: 40%;" method="post" autocomplete="off">
    <input type="text" name="cid" style="width: 250px; height: 30px; background-color:white; color:grey; margin-top:5px;" placeholder="&nbsp Complaint Id" onfocusout="f1()" required id="ciid">
        <div>
      <input class="btn btn-success" type="submit" value="Search" name="s2" style="margin-top: 10px; margin-left: 10%;">
        </div>
    </form>    
 <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Location of Crime</th>        
      </tr>
    </thead>
<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 
    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>     
        <td><?php echo $rows['d_o_c']; ?></td> 
        <td><?php echo $rows['location']; ?></td>                   
      </tr>
    </tbody>    
    <?php
    } 
    ?>  
</table>
 </div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>