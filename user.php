<?php include '../includes/connection.php';

session_start();  
if(!isset($_SESSION["username"]))  
{  
     header("location:login.php?");  
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
                    
                    <i class='bx bxs-dish' ></i> <a class="dropdown-item" href="user.php">My orders</a><br/>
                  <i class='bx bxs-lock' ></i> <a class="dropdown-item" href="change_pwd.php">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <i class='bx bx-power-off'></i><a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            

        </li>
        <li><a href="menu.html">My Orders</a></li>
       
        
    </ul>
    </div>
      <div class="profile-detail">
        <!--<img src="images/profile.jpg" alt="">-->
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
      $sql = "SELECT * FROM order_details;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
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
                  <th scope="col">#</th>
                  <th scope="col">Date</th>
                  <th scope="col">Food Ordered</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <tbody>
                  <?php
                      if( mysqli_num_rows( $result )==0 ){
                        echo '<tr><td colspan="2">You have no recent orders</td></tr>';
                      }else{
                        while( $row = mysqli_fetch_assoc( $result ) ){
                          echo "<tr><td>{$row['food_id']}</td><td>{$row['food_name']}</td><td><td><button style=."."background-color:green;border-radius: 4px;.".">EDIT</button></td>\n";
                        }
                      }
                    ?>
                  </tbody>
               
              </tbody>
            </table>
         
         
       
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div><!--
        <div class="top-sales box">
          <div class="title">Top Seling Product</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              <img src="images/sunglasses.jpg" alt="">-->
              <!---
              <span class="product">Vuitton Sunglasses</span>
            </a>
            <span class="price">$1107</span>
          </li>
          <li>
            <a href="#">
               <!--<img src="images/jeans.jpg" alt="">
              <span class="product">Hourglass Jeans </span>
            </a>
            <span class="price">$1567</span>
          </li>
          <li>
            <a href="#">
             <!-- <img src="images/nike.jpg" alt="">
              <span class="product">Nike Sport Shoe</span>
            </a>
            <span class="price">$1234</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/scarves.jpg" alt="">
              <span class="product">Hermes Silk Scarves.</span>
            </a>
            <span class="price">$2312</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/blueBag.jpg" alt="">
              <span class="product">Succi Ladies Bag</span>
            </a>
            <span class="price">$1456</span>
          </li>
          <li>
            <a href="#">
              <!--<img src="images/bag.jpg" alt="">
              <span class="product">Gucci Womens's Bags</span>
            </a>
            <span class="price">$2345</span>
          <li>
            <a href="#">
              <!--<img src="images/addidas.jpg" alt="">
              <span class="product">Addidas Running Shoe</span>
            </a>
            <span class="price">$2345</span>
          </li>
<li>
            <a href="#">
             <!--<img src="images/shirt.jpg" alt="">
              <span class="product">Bilack Wear's Shirt</span>
            </a>
            <span class="price">$1245</span>
          </li>
          </ul>
        </div>
      </div>
    </div>-->
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