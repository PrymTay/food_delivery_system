
<?php  
  include_once('../includes/connection.php');
 session_start(); 
 if(empty($_SESSION['username']))  
{
	header('location:log.html');
}
else
{ 
 ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
         <link rel="stylesheet" type="text/css" href="bootstrap.min.css"> 
         <link rel="stylesheet" type="text/css" href="custom.css"> 
         <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<?php 
                  $sql = "SELECT * FROM food;";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if (!($resultCheck > 0 )){  
                      echo 'No Food Available';
                  } else {
                ?>
             
              <div class="recent-sales box " style="width: 70%;">
<!--     
<div class="well clearfix">
        <a class="btn btn-success pull-right " data-added="0"> Edit Price</a>
        <a class="btn btn-success pull-left " data-added="0"> Edit Food</a>
      </div> -->
                <div class="sales-details">
                  
                
                  <table class="table table-striped table-hover table-bordered">
                  <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Food</th>
                        <th scope="col">Price</th>
                        <th class="text-center" scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                            <?php
                          if( mysqli_num_rows( $result ) == 0 ){
                            echo '<tr><td colspan="2">No Rows Returned</td></tr>';
                          }else{
                         
                            while( $row = mysqli_fetch_assoc( $result ) ){
                              $_SESSION["price"] = $row['price'];
                              $_SESSION["food_name"] = $row['food_name'];
                              ?>
                              <tr data-id="<?php echo $row['food_id']; ?>" data-price="<?php echo $row['price']; ?>">
                              <td > <?php echo $row['food_id']; ?></td>
							  <td > <?php echo $row['food_name']; ?></td>
							  <td ><?php echo $row['price']; ?></td>
                               
                            <td><a class="btn btn-success" href="edit.php?id=<?php echo $row['food_id']; ?>">Edit</a></td>
                            <td><a  class="btn btn-danger" href="delete.php?id=<?php echo $row['food_id']; ?>">Delete</a></td>
                          
                        
                           
                              
                             
                              </tr>
                                  
                              <?php }?> 
                              
                           <?php 
                          }
                        }
                    }
                        ?>
                      
                      </tbody>
                  </table>