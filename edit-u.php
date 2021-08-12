<?php

include_once('../includes/connection.php');

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from user where uid='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
	
    $edit = mysqli_query($conn,"update user set firstname='$firstname', email='$email',username='$username' where uid='$id'");
	
    if($edit)
    {
      
        header("location:edit-user.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "failed to update user details";
    }    	
}
?>

 <div class="card">
       

<form method="POST">
  <input type="text" name="firstname" value="<?php echo $data['firstname'] ?>" placeholder="Enter new first name" Required><br/>
  <input type="text-field" name="email" value="<?php echo $data['email'] ?>" placeholder="Enter new email" Required><br/>
  <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter new username" Required>
  <input type="submit" name="update" value="Update">
</form>
 </div>