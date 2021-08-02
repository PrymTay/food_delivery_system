<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
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
            <a href="menu.html">
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
        <li><a href="admin.php">Home</a></li>
        
        <li class="nav-item dropdown">
            
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                aria-haspopup="true" aria-expanded="false">My Account 
                <i class='bx bx-caret-down'></i></a> 
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                    <i class='bx bxs-dish' ></i> <a class="dropdown-item" href="#">My orders</a><br/>
                  <i class='bx bxs-lock' ></i> <a class="dropdown-item" href="change_pwd.php">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <i class='bx bx-power-off'></i><a class="dropdown-item" href="#">Log out</a>
                </div>
            

        </li>
        <li><a href="#">My Orders</a></li>
       
        
    </ul>
    </div>
      <div class="profile-detail">
        <!--<img src="images/profile.jpg" alt="">-->
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false"><span class="admin-name">Prim</span>
        <i class='bx bx-caret-down'></i></a> 
        
  
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <i class='bx bx-user' ></i> <a style="color: black;" class="dropdown-item" href="login.html">Change Account</a>

        </div>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Orders</div>
            <div class="number">40</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-dish cart three'></i>
        </div><br/>
     
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Users</div>
            <div class="number">5</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-user cart one' ></i>
        </div>
        
      </div>
      <div class="home-content">
      <div class="overview-boxes">
       
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Cancelled Orders</div>
            <div class="number">0</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-dish cart four' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Approved Orders</div>
            <div class="number">5</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-dish cart two' ></i>
        </div>
      </div>

    
         
         
       
          
         <!--  <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Top Seling Product</div>
          <ul class="top-sales-details">-->
          
        
        </div> 
      </div>
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

</body>
</html>

