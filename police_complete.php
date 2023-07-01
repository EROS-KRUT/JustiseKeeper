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
   
    $p_id=$_SESSION['pol'];
     $result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location,mob,u_addr FROM complaint natural join user where p_id='$p_id' and pol_status='ChargeSheet Filed' order by c_id desc");
    ?> 
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
	<title>Police completed complaint</title>
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
         <a class="nav-link" href="police_pending_complain.php">Police Home</a>
       </li>      
       </ul>
       <ul class="navbar-nav ml-auto">
       <li class="nav-item active">
         <a class="navbar-brand" href="police_complete.php">Completed Complaints</a>
       </li>
       <li class="nav-item ">
       <a class="nav-link" href="p_logout.php">Logout </a></li>
</ul>
     </ul>
   </div>
 </nav>
 <div style="padding:50px;margin-top:5%;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
          <th scope="col">Location of Crime</th>
          <th scope="col">Complainant Mobile</th>
          <th scope="col">Complainant Address</th>        
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
          <td><?php echo $rows['mob']; ?></td>
          <td><?php echo $rows['u_addr']; ?></td>                  
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