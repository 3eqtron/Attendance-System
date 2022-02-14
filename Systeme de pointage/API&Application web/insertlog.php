<?php
date_default_timezone_set('Africa/Tunis');

    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

$statut=1;
    if ( !empty($_POST)) {
        // keep track post values
       
		$id = $_POST['idcard'];
    }
		$datelog= date("Y-m-d");
$temps=date("H:i:s");
if (isset($_POST["idcard"])) {
   $statut=0 ;
}
    

    






        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO logs (idcard,datelog,statut,temps) values(?,?,?,?) limit 1,2";
        
		$q = $pdo->prepare($sql);
		$q->execute(array($id,$datelog,$statut,$temps));
		Database::disconnect();
		
    
?>