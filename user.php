<?php 
 session_start();
include '../includes/connection.php';
if(empty($_SESSION['username']))  
{
	header('location:login.html');
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
            <a href="menu.php">
              <i class='bx bxs-dish' ></i>
              <span class="links_name">Order Now</span>
            </a>
          </li>
      
        <li>
          <a href="report.php">
            <i class='bx bxs-wallet' ></i>
            <span class="links_name">Expenditure</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
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
                 
                  <i class='bx bxs-lock' ></i> <a class="dropdown-item" href="change_pwd.php">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <i class='bx bx-power-off'></i><a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            

        </li>
    
    </ul>
    </div>
      <div class="profile-detail">
  
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false"><span class="admin-name"><?php echo $_SESSION['username']?></span>
        <i class='bx bx-caret-down'></i></a> 
        
  
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <i class='bx bx-user' ></i> <a style="color: black;" class="dropdown-item" href="login.html">Change Account</a>

        </div>
      </div>
    </nav>

    <div class="home-content">
    
      <?php 
      $sql="select `order`.id,`order`.created_at, food.name,food.price from `order` inner join order_foods on `order`.id = order_foods.order_id inner join food on food.id = order_foods.food_id where user_id = '$_SESSION[uid]';";
      //$sql = "SELECT order.id,order_table.OrderID,order_details.food_name,order_details.price,order_details.date_ordered 
      //from order_table inner join order_details on order_table.id = order_details.id where  id = '$_SESSION[uid]';";
     // $sql = "SELECT * FROM order LIMIT 3;";
      $result = mysqli_query($conn, $sql);
      //$resultCheck = mysqli_num_rows($result);
      //if (!($resultCheck > 0 )){
        //  echo '<tr><td colspan="2">You have no recent orders</td></tr>';
      //} else 
      {
         ?>
    
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Orders</div>
          <div class="sales-details">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">OrderID</th>
                  <th scope="col">Date Ordered</th>
                  <th scope="col">Food Ordered</th>
                  <th scope="col" >Amount</th>
                
                </tr>
              </thead>
          
              <tbody>
                  <?php
                      if( mysqli_num_rows( $result ) > 0 ){
                        while( $row = mysqli_fetch_assoc( $result ) ){
                          echo "<tr><td>{$row['id']}</td><td>{$row['created_at']}</td><td>{$row['name']}</td><td>{$row['price']}</td></n>";
                       
                        }
                       
                        
                      }else{
                        echo '<tr><td colspan="4">You have no recent orders</td></tr>';
                        
                      }
                    ?>
                 
               
              </tbody>
            </table>
           
         
         
       
          </div>
         <!--  <div class="button">
            <a href="#">Show more</a>
          </div> -->
          <strong><small>Same orderid indicates content of the same order</small></strong>
        </div>
    
        
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

<?php
  }

?>

    </body>
   
</html>
<?php 
} 

?>