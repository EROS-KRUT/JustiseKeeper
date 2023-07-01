<?php
 session_start();
 if(!isset($_SESSION['x']))
     header("location:headlogin.php");
 $conn=mysqli_connect("localhost","root","","crime_portal");
 if(!$conn)
 {
     die("could not connect".mysqli_error());
 }
 mysqli_select_db($conn,"crime_portal");
 $query="select i_id,i_name,location from police_station";
 $result=mysqli_query($conn,$query);  
 if(isset($_POST['s1']))
 {
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
     $cid=$_POST['cid'];
     $_SESSION['cid']=$cid;
     header("location:head_case_details.php");
 }
 }
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
  <title>Head View Police Station</title>
</head>
<body>
<body style="background-size: cover;
    background-image: url(cream.png);
    background-position: center;">
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
        <li class="nav-item active">
          <a class="navbar-brand" href="head_view_police_station.php">HQ Home</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active" >
        <a class="navbar-brand" href="head_view_police_station.php">Police Station</a>
        </li>
        <li class="nav-item px-1">
        <a class="nav-link" href="h_logout.php">Logout </a></li>
</ul>
      </ul>
    </div>
  </nav>
  <form style="margin-top: 3%; margin-left: 40%;" method="post" autocomplete="off">
      <input type="text" name="cid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Complaint Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-success" type="submit" value="Search" name="s1" style="margin-top: 10px; margin-left: 9%;">
     </div>
     </form>
     <div  style="margin-top: 5%;margin-left: 43%">    
     <a href="police_station_add.php" class="btn btn-danger">Add Police Station</a>
   </div> 
  <div class="container my-4">
<hr> 
    <table class="table table-bordered" id="myTable">     
      <thead class="thead-dark" style="background-color: black; color: white;">
        <tr>
          <th scope="col">Incharge Id</th>
          <th scope="col">Incharge Name</th>
          <th scope="col">Location</th>
        </tr>
      </thead>
      <tbody>
        <?php    
          while($row = mysqli_fetch_assoc($result)){           
            echo "<tr>
            <td>". $row['i_id'] . "</td>
            <td>". $row['i_name'] . "</td>
            <td>". $row['location'] . "</td>            
          </tr>";
        } 
          ?>
      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script> 
</body>
</html>