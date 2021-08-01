<?php include '../includes/connection.php';?>

<html>
    <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link--> 
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
         <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> 
         <link rel="stylesheet" type="text/css" href="custom.css"> 
         <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php 
    $sql = "SELECT * FROM user;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if (!($resultCheck > 0 )){
        echo 'Retrieval of data from Database Failed - #';
    } else {
       ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Username</th>  
    </tr>
  </thead>
  <tbody>
  <?php
      if( mysqli_num_rows( $result )==0 ){
        echo '<tr><td colspan="2">No Rows Returned</td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $result ) ){
          echo "<tr><td>{$row['firstname']}</td><td>{$row['username']}</td><td><td><button style=."."background-color:green;border-radius: 4px;.".">EDIT</button></td>\n";
        }
      }
    ?>
  </tbody>
</table>
    

    <?php
  }

?>

    </body>
</html>