<?php 

	$connection = mysqli_connect("localhost","root","","horizondt");
	
	$result = array();
	$result['data'] = array();
	$select= "SELECT * FROM tag  inner join logs on logs.datelog ORDER BY name ASC";
	$responce = mysqli_query($connection,$select);
	
	while($row = mysqli_fetch_array($responce))
		{
			
			$index['name']    = $row['0'];
			$index['datelog']   = $row['7'];
            $index['statut']   = $row['8'];
		
       
			
			
			array_push($result['data'], $index);
		}
			
			$result["success"]="1";
			echo json_encode($result);
			mysqli_close($connection);

 ?>