<?php
     
    require 'database.php';


    if ( !empty($_POST)) {
        // keep track post values
      
		$uid = $_POST['uid'];
		
      



        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "Delete from  tag where uid='$uid'";
        
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$uid,$gender,$email,$mobile));
		Database::disconnect();
		
    }
    
?>