 <?php
  session_start();
  include_once('../includes/connection.php');
  $_SESSION['username'];
  if (isset($_POST['btn-confirm'])) {
    $checkbox = $_POST['check'];
    for ($i = 0; $i < count($checkbox); $i++) {
      $check_id = $checkbox[$i];
      mysqli_query($conn, "insert into orders (,subcategory_id) values ('1','" . $check_id . "')") or die();
      echo "Data added success fully!";
    }
  }
  ?>

 <!DOCTYPE html>

 <html lang="en" dir="ltr">

 <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="custom.css">
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="style.css">
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
           <i class='bx bx-grid-alt'></i>
           <span class="links_name">Dashboard</span>
         </a>
       </li>


       <li>
         <a href="team.php">
           <i class='bx bx-user'></i>
           <span class="links_name">Team</span>
         </a>
       </li>


       <li>
         <a href="menu-admin.php">
           <i class='bx bxs-dish'></i>
           <span class="links_name">Order Now</span>
         </a>
       </li>

       <li>
         <a href="report_admin.php">
           <i class='bx bxs-wallet'></i>
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
           <li><a href="admin.php">Home</a></li>

           <li class="nav-item dropdown">

             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account
               <i class='bx bx-caret-down'></i></a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">


               <i class='bx bxs-lock'></i> <a class="dropdown-item" href="change_pwd.php">Change Password</a>
               <div class="dropdown-divider"></div>
               <i class='bx bx-power-off'></i><a class="dropdown-item" href="logout.php">Log out</a>
             </div>


           </li>

         </ul>
       </div>
       <div class="profile-detail">

         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="admin-name"><?php echo $_SESSION['username'] ?></span>
           <i class='bx bx-caret-down'></i></a>


         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <i class='bx bx-user'></i> <a style="color: black;" class="dropdown-item" href="login.html">Change Account</a>

         </div>
       </div>
     </nav>

     <form id="order-form" method="POST" action="insert.php">
     <input type="hidden" name="total" id="sum-price">
     <input type="hidden" name="food_ids" id="id-food_ids">
       <div class="home-content">

         <?php
          $sql = "SELECT * FROM food;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if (!($resultCheck > 0)) {
            echo 'No Food Available';
          } else {
          ?>
           <div class="sales-boxes">
             <div class="recent-sales box" style="width: 70%;">
               <div class="title">Menu</div>
               <div class="sales-details">


                 <table class="table table-striped table-hover">
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
                     $counter = 0;
                      if (mysqli_num_rows($result) == 0) {
                        echo '<tr><td colspan="2">No Rows Returned</td></tr>';
                      } else {

                        while ($row = mysqli_fetch_assoc($result)) {
                          $counter+=1;
                      ?>
                         <tr data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['price']; ?>">
                           <td name="id" id="food_id"> <?php echo $counter; ?></td>
                           <td data-column=> <?php echo $row['name']; ?></td>
                           <td data-column=><?php echo $row['price']; ?></td>

                           <td class="text-center"><input type='checkbox' class="check" name='checkbox'></td>
                           <?php

                            ?>

                         </tr>

                       <?php } ?>

                       <tr style="font-size: x-large;">
                         <td colspan="3">TOTAL COST </td>
                         <td colspan="2"><strong id="total_amount"></strong></td>
                         
                       </tr><br />
                       <tr>
                         <td colspan="4"><button class="btn btn-success btn-lg order-btn" id="order-btn">Order Now</button></td>
                       </tr>
                     <?php

                      }
                      ?>

                   </tbody>
                 </table>
               </div>
             </div>


           <?php
          }

            ?>
     </form>
     </div>

 </body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
 <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script>

   //js to perform order amount 

   $(document).ready(function() {
     let total = 0;
     let foodIds = [];
     $(document).on('click', 'input.check', function() {
       const foodID = $(this).closest('tr').attr('data-id')
       const foodPrice = $(this).closest('tr').attr('data-price')
       if ($(this).is(":checked")) {
         foodIds.push(foodID)
         total += parseInt(foodPrice);
         $("#total_amount").html(total)
         $("#sum-price").val(total)
       } else {
         total -= parseInt(foodPrice);
         const indexToRemove = foodIds.indexOf(foodID)
         foodIds.splice(indexToRemove, 1)
         $("#total_amount").html(total)
         $("#sum-price").val(total)
       }

     })
     const form = $("#order-form")
     form.on('submit', function (e) {
       const selectedFoods = JSON.stringify(foodIds)
       console.log(selectedFoods)
       $("#id-food_ids").val(selectedFoods)
       const formData = form.serializeArray()
       console.log(formData)
     })
     //jquery function to get food id and total amount 
/** 
     $('#order-btn').on('click', function(e) {
       
       //$('#order-btn').attr('disabled', 'disabled');
       //var total = $('#sum-price').val();
       //var food_id = $(this).closest("tr").find("#food_id").val();

       console.log(total)
       e.preventDefault()
         var total = $(this).closest("tr").find("td:nth-child(2)").val() 
       
       var food_id = $(this).closest("tr").find("td:nth-child(1)").val()
 

   // geting variables into an ajax call, to use them in php script(insert query)

       if (total != "" && food_id != "") {
         $.ajax({
           url: "menu-admin.php",
           method: "POST",
           data: {
             total: total,
             food_ids: food_id

           },
           cache: false,

           success: function(dataResult) {
             var dataResult = JSON.parse(dataResult);
             if (dataResult.statusCode == 200) {
               $("#order-btn").removeAttr("disabled");
               $('#order-form').find('input:hidden').val('');
               $("#success").show();
               $('#success').html('Data added successfully !');
             } else if (dataResult.statusCode == 201) {
               alert("Error occured !");
             }

           }
         });
       } else {
         alert('Please select item to order !');
       }
     })**/


   });
 </script>


 </html>