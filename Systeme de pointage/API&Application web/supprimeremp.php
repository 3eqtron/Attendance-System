<?php

    $connection = mysqli_connect("localhost","root","","applicationpointage");
    
     $uid = $_POST["uid"];
     
     $sql = "DELETE FROM user WHERE uid='$uid'";
     
     $result = mysqli_query($connection,$sql);
     
     if($result){
         echo "Data Deleted";
        
     }
     else{
         echo "Failed";
     }
     mysqli_close($connection);
     


?>