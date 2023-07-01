  <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");   
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");   
    $i_id=$_SESSION['email'];
    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$i_id'");      
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];   
     if(isset($_POST['s2']))
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $pid=$_POST['pid'];           
            $q1=mysqli_query($conn,"delete from police where p_id='$pid'");
            $q3=mysqli_query($conn,"update complaint set pol_status='null',inc_status='Unassigned',p_id='Null' where p_id='$pid'");
        }
    }    
    $result=mysqli_query($conn,"select p_id,p_name,spec,location from police where location='$location'");   
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
	<title>Incharge View Police</title>	
    <script>
     function f1()
        {          
           var sta2=document.getElementById("ciid").value;
            var x2=sta2.indexOf(' ');
            if(sta2!="" && x2>=0){
            document.getElementById("ciid").value="";
            alert("Blank Field not Allowed");
        }       
       }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">   
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item ">
         <a class="nav-link" >Crime Portal <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="incharge_complain_page.php">View Complaints</a>
       </li>
       </ul>
       <ul class="navbar-nav ml-auto">
       <li class="nav-item active" >
       <a class="navbar-brand" href="Incharge_view_police.php">Police Officers</a>
       </li>
       <li class="nav-item ">
       <a class="nav-link" href="inc_logout.php">Logout </a></li>
</ul>
     </ul>
   </div>
 </nav>
 <div  style="margin-top: 4%;margin-left: 45%">
   <a href="police_add.php"><input  type="button" name="add" value="Add Police Officers" class="btn btn-primary"></a>
 </div>   
    <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Police Id</th>
        <th scope="col">Police Name</th>
        <th scope="col">Specialist</th>
        <th scope="col">Location</th>
      </tr>
    </thead>
<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 
    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['p_id']; ?></td>
        <td><?php echo $rows['p_name']; ?></td>     
        <td><?php echo $rows['spec']; ?></td>          
        <td><?php echo $rows['location']; ?></td>          
      </tr>
    </tbody>    
    <?php
    } 
    ?>  
</table>
 </div>    
    <form style="margin-top: 5%; margin-left: 40%;" method="post" autocomplete="off">
      <input type="text" name="pid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Police Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-danger" type="submit" value="Delete Police" name="s2" style="margin-top: 10px; margin-left: 9%;">
        </div>
    </form>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>