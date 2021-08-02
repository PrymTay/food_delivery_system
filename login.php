
<?php
session_start();
$conn = new mysqli('localhost','prim','1234','FDS');
if ($conn -> connect_error)
{ 
    die('connection failed : ' . $conn -> connect_error); 
}
else {

if(isset($_POST['btn-login'])){

    $username = $_POST['username'];
    $password = $_POST['pasword'];

    $sql = "select * from user where username='".$username."'";
	$query=mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($query);
    if(!($resultCheck > 0)){

        echo "User does not exist! Please sign up";
        
    } else {
    
        while ($row=mysqli_fetch_assoc($query)) {

            $_SESSION["username"] = $row['username'];

            $row['PASSWORD'];

            if(!(password_verify($password,$row['PASSWORD']))){
                $_SESSION = [];
                session_destroy();
                echo "invalid Password";
            }else {
                if(isset($row['usertype']) && ($_SESSION["username"])){
                
                    if($row["usertype"] == "not_admin"){
                        
                        $result=header("location:user.php ");
                    }else
                    {
                        $result=header("location:admin.php");
                    }
                }else{
    
                }
                    }
        }
        ;
    
        
            }
       
    
    /*
    if ($row["usertype"] == "not_admin"){
        echo "user";
        $result=header("location:logged.html");
    }
    elseif ($row["usertype"] == "admin"){
        echo "admin";
        $result= header("location:canvas.html");
    }
    else {
        echo "invalid details";
    }*/
    
} else {
    $error = $conn->errno . ' ' . $conn->error;
echo $error;
}

} 
    /*
	
		$username=$row['username'];
		//$_SESSION['cust_id']=$customer_email;
		if(!empty($customer_email && $product_id))
		{
			 //$_SESSION['product']=$product_id;
			echo $_SESSION['cust_id']=$customer_email;
			
			 header("location:cart.php?product=$product_id");
			
		}
		else
		{
		header("location:../index.php");
		 $_SESSION['product']=$product_id;
		 $_SESSION['cust_id'];
		}
		 
	
	else
	{
		$ermsg="invalid Details";
	} */
