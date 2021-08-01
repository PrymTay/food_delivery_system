
<?php
$conn = new mysqli('localhost','prim','1234','FDS');
if ($conn -> connect_error)
{ 
    die('connection failed : ' . $conn -> connect_error); 
}
else {

if(isset($_POST['btn-login'])){

    $username = $_POST['username'];
    $password = $_POST['pasword'];

    $sql = "select * from user where username='".$username."' && password='".$password."'";
	$query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);

    if(isset($row['usertype'])){
        echo $row;
        if($row["usertype"] == "not_admin"){
            echo "user";
            $result=header("location:logged.html");
        }else
        {
            echo "invalid";
        }
    }else{

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
