<?php
$conn = new mysqli('localhost','prim','1234','FDS');
if ($conn -> connect_error)
{ 
    die('connection failed : ' . $conn -> connect_error); 
}
else {
       if(isset($_POST['signup-submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        $password = password_hash($_POST['pasword'],PASSWORD_BCRYPT);
        $confirmpassword = password_hash($_POST['confirmpassword'],PASSWORD_BCRYPT);


        if(empty($firstname) || empty($lastname) || empty($username) || empty($email)
        || empty($password)){
            header("Location:../views/signup.html?error=emptyfields&firstname=".$firstname."&lastname=".$lastname."&email=".$email."&username=".$username);
        exit();
        }
        else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            header("Location:../views/signup.html?error=InvalidEmail&firstname=".$firstname."&lastname=".$lastname."&username=".$username);
        exit();
        }/*
        else if(!preg_match("/^[a-zA-Z0-9]*&/",$username)){
            header("Location:../views/signup.html?error=invalideusername,firstname=".$firstname."&lastname=".$lastname);
            exit();
        }
        else if($password != $confirmpassword){
            header("Location:../views/signup.html?error=passwordsnotthesame&firstname=".$firstname."&lastname=".$lastname."&username=".$username);
        }*/
        }

        $sql_qry = "INSERT INTO user ( firstname, lastname, 
        username, emailaddress, password) values (?, ?, ?, ?, ?)";
        if ($statement = $conn->prepare($sql_qry)){
            
                if($statement->bind_param("sssss", $firstname,$lastname,$username,$email,
                $password)){
                $statement -> execute();
                $statement->close();
                    echo "successfully signed up";
                
                    $result = header('location:../views/login.html');
        
        }
            else {$error = $conn->errno . ' ' . $conn->error;
            echo $error;
            }        
        }
        else {
            echo "Failed signed up";
            $result = header('location:../views/signup.html');
        }

        if(isset($_POST['btn-login'])){

            $username = $_POST['username'];
            $password = password_hash($_POST['pasword'],PASSWORD_BCRYPT);


            $query=mysqli_query($conn,"select * from user where username='$username' && password='$password'");
            $row=mysqli_fetch_array($query);
            while($row){
                echo "yes";
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
        }


if(isset($_POST['btn-loggin']))
{
	$query=mysqli_query($conn,"select * from user where username='$username' && password='$password'");
    if($row=mysqli_fetch_array($query))
	{
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
		 
	}
	else
	{
		$ermsg="invalid Details";
	}
}
}


#<?php require_once('/var/www/public_html/config.php'); ?>
