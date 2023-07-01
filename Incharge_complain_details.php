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
    $cid=$_SESSION['cid'];        
    $iid=$_SESSION['email'];
    $result1=mysqli_query($conn,"SELECT location FROM police_station where i_id='$iid'");      
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];    
    $query="select c_id,type_crime,d_o_c,description from complaint where c_id='$cid' and location='$location'";
    $result=mysqli_query($conn,$query); 
    if(isset($_POST['assign']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $pname=$_POST['police_name'];
        $res1=mysqli_query($conn,"SELECT p_id FROM police where p_name='$pname'");
        $q3=mysqli_fetch_assoc($res1);
        $pid=$q3['p_id'];    
        $res=mysqli_query($conn,"update complaint set inc_status='Assigned',pol_status='In Process',p_id='$pid' where c_id='$cid'");      
        $message = "Case Assigned Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
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
	<title>Assign Police</title>
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
       <a class="navbar-brand" href="Incharge_complain_details.php">Complaints Details</a>
       </li>
       <li class="nav-item ">
       <a class="nav-link" href="inc_logout.php">Logout </a></li>
</ul>
     </ul>
   </div>
 </nav>
<div style="padding:50px; margin-top:100px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
      <th scope="col">Complaint Id</th>
      <th scope="col">Type of Crime</th>
      <th scope="col">Date of Crime</th>
      <th scope="col">Description</th>
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
      <td><?php echo $rows['description']; ?></td>      
    </tr>
       </tbody>
       <?php
} 
?>          
</table>
 </div>
 <div>  
<form method="post">
<select class="form-control" name="police_name" style="margin-left:40%; width:250px;">
            <?php
                        $p_name=mysqli_query($conn,"select p_name from police where location='$location'");
                        while($row=mysqli_fetch_array($p_name))
                        {
                            ?>
                                  <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>          
            </select>
            <input type="submit" name="assign" value="Assign Case" class="btn btn-primary" style="margin-top:22px; margin-left:45%;">
</form>
 </div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>