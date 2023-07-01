
  <?php
    session_start();
    
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $u_id=$_SESSION['u_id'];
    $c_id=$_SESSION['cid'];
        
    $query="select c_id,description,inc_status,pol_status from complaint natural join user where c_id='$c_id' and u_id='$u_id'";
    $result=mysqli_query($conn,$query);
    
    $res2=mysqli_query($conn,"select d_o_u,case_update from update_case where c_id='$c_id'");
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
	<title>Complaint Details</title>
	
    
   
    <body style="background-color: #dfdfdf;">
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
         <a class="nav-link" href="complainer_complain_history.php">View Complaints</a>
       </li>
      
       </ul>
       <ul class="navbar-nav ml-auto">
       <li class="nav-item active">
         <a class="navbar-brand" href="complainer_complain_details.php">Complaint Details</a>
       </li>
       <li class="nav-item ">
       <a class="nav-link" href="logout.php">Logout </a></li>
</ul>
     </ul>
   </div>
 </nav>
 
        <div style="padding:50px;margin-top:10px;">
            <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: black; color: white;">
                <tr>
                    <th scope="col">Complain Id</th>
                    <th scope="col">Description</th>
                    <th scope="col">Police Status</th>
                    <th scope="col">Case Status</th>
                </tr>
            </thead>
            <?php
              while($rows=mysqli_fetch_assoc($result)){
            ?> 
             <tbody style="background-color: white; color: black;">
              <tr>
                <td><?php echo $rows['c_id']; ?></td>
                <td><?php echo $rows['description']; ?></td>     
                <td><?php echo $rows['inc_status']; ?></td>     
                <td><?php echo $rows['pol_status']; ?></td>
              </tr>
             </tbody>
            <?php
              } 
            ?>
            </table>
        </div>
    
        <div style="padding:50px; margin-top:8px;">
            <table class="table table-bordered">
               <thead class="thead-dark" style="background-color: black; color: white;">
                   <tr>
                        <th scope="col">Date Of Update</th>
                        <th scope="col">Case Update</th>
                   </tr>
               </thead>
            <?php
                while($rows1=mysqli_fetch_assoc($res2)){
             ?> 
                <tbody style="background-color: white; color: black;">
                <tr>
                    <td><?php echo $rows1['d_o_u']; ?></td>
                    <td><?php echo $rows1['case_update']; ?></td>
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