<?php 
include_once('../includes/connection.php');

if(isset($_POST['btn-confirm']))
{
   $checkbox = $_POST['check'];         
        for($i=0;$i<count($checkbox);$i++){
        $check_id = $checkbox[$i];
        mysqli_query($conn,"insert into orders (,subcategory_id) values ('1','".$check_id."')") or die();
            echo "Data added success fully!";
       }
}
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
<body>
  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name">DigitalSolutions</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        
        
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favorites</span>
          </a>
        </li>
       
       
        <li>
          <a href="team.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
            <a href="menu.php">
              <i class='bx bxs-dish' ></i>
              <span class="links_name">Order Now</span>
            </a>
          </li>
      
        <li>
          <a href="#">
            <i class='bx bxs-wallet' ></i>
            <span class="links_name">Expenditure</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
          <section class="home-section">
            <nav style="background-color: #6AB187">
              <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
              </div>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li><a href="user.php">Home</a></li>
                
                <li class="nav-item dropdown">
                    
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">My Account 
                        <i class='bx bx-caret-down'></i></a> 
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <i class='bx bxs-dish' ></i> <a class="dropdown-item" href="user.php">My orders</a><br/>
                          <i class='bx bxs-lock' ></i> <a class="dropdown-item" href="change_pwd.php">Change Password</a>
                          <div class="dropdown-divider"></div>
                          <i class='bx bx-power-off'></i><a class="dropdown-item" href="#">Log out</a>
                        </div>
                    
        
                </li>
                <li><a href="menu.html">My Orders</a></li>
               
                
            </ul>
            </div>
              <div class="profile-detail">
                
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                aria-haspopup="true" aria-expanded="false"><span class="admin-name">Prim</span>
                <i class='bx bx-caret-down'></i></a> 
                
          
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <i class='bx bx-user' ></i> <a style="color: black;" class="dropdown-item" href="login.html">Change Account</a>
        
                </div>
              </div>
            </nav>
          
        <div class="home-content">
            <?php 
              $sql = "SELECT * FROM food;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              if (!($resultCheck > 0 )){
                  echo 'Retrieval of data from Database Failed - #';
              } else {
                ?>
              <div class="sales-boxes">
              <div class="recent-sales box" style="width: 70%;">
                <div class="title">Food Menu</div>
                <div class="sales-details">
                  <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Food</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                  </thead>
                        <tbody>
                            <?php
                          if( mysqli_num_rows( $result ) == 0 ){
                            echo '<tr><td colspan="2">No Rows Returned</td></tr>';
                          }else{
                         
                            while( $row = mysqli_fetch_assoc( $result ) ){
                              foreach ($result as $row){echo '<tr>';
                                  foreach ($row as $col){$col=nl2br($col);
                                  echo '<td>'.$col.'</td>';
                                  }
                          
                              echo '<td><input type="checkbox" name="checkbox[]" value="$row[food_id]" id="checkbox"></td>';
                              '</tr>';
                             
                                  }
                                }
                           
                          echo '<tr style="font-size: x-large;"><td colspan="3">TOTAL COST</td> </tr><br/>'; 
                          echo '<tr><td colspan="4"><button class="btn btn-success btn-lg" name="order-btn">Order Now</button></td></tr>';
                        }
                        ?>
                      </tbody>
                  </table>
                  </div>
                <?php
                   }

                ?>
                </div>
              </div>
        
             <hr>
             
                <?php 
                  $sql = "SELECT * FROM sauce;";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if (!($resultCheck > 0 )){  
                      echo 'Retrieval of data from Database Failed - #';
                  } else {
                ?>
             <div class="sales-boxes">
              <div class="recent-sales box" style="width: 70%;">
                <div class="title">Sauce Menu</div>
                <div class="sales-details">
                  
                
                  <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Food</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                            <?php
                          if( mysqli_num_rows( $result ) == 0 ){
                            echo '<tr><td colspan="2">No Rows Returned</td></tr>';
                          }else{
                         
                            while( $row = mysqli_fetch_assoc( $result ) ){
                              foreach ($result as $row){echo '<tr>';
                                  foreach ($row as $col){$col=nl2br($col);
                                  echo '<td>'.$col.'</td>';
                                  }
                          
                              echo '<td><input type="checkbox" name="checkbox[]" value="$row[food_id]" id="checkbox"></td>';
                              '</tr>';
                             
                                  }
                                }
                           
                          echo '<tr style="font-size: x-large;"><td colspan="3">TOTAL COST</td> </tr><br/>'; 
                          echo '<tr><td colspan="4"><button class="btn btn-success btn-lg" name="order-btn">Order Now</button></td></tr>';
                        }
                        ?>
                      </tbody>
                    </table>
                      </div>
                      </div>
                  </div>
            
                
              <?php
            }

          ?>
        </div>  

    </body>
    
</html>