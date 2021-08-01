<?php
$conn = new mysqli('localhost','prim','1234','FDS');
if ($conn -> connect_error)
{ 
    die('connection failed : ' . $conn -> connect_error); 
}
else {
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
}
?>