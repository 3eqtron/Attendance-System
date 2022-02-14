<?php
     
    require 'database.php';


    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$uid = $_POST['uid'];
		$gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
      



        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE  tag SET name='$name',gender='$gender',email='$email',mobile='$mobile ' where uid='$uid'";
        
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$uid,$gender,$email,$mobile));
		Database::disconnect();
		
    }
    
?>