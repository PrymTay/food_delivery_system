<?php 
function insert(){
    global $conn;
    if(isset($_POST['order-btn']))
                        {
                          $checkbox = $_POST['checkbox'];         
                            for($i=0;$i<count($checkbox);$i++)
                                $check_id = $checkbox[$i];
                                if( mysqli_query($conn,"insert into order (food_id) 
                                values ('".$check_id)){
                                      echo "Data added success fully!";
                              }else {
                                echo "failed";
                              }
                        }
 }  
 $checked_data = insert();
 
 ?>