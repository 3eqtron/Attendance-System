<?php 

	$connection = mysqli_connect("localhost","root","","horizondt");
	
	$result = array();
	$result['tag'] = array();
	$select= "SELECT *from tag";
	$responce = mysqli_query($connection,$select);
	
	while($row = mysqli_fetch_array($responce))
		{
			
			$index['name']    = $row['0'];
			$index['id']   = $row['1'];
        $index['gender']   = $row['2'];
			$index['email'] = $row['3'];
            $index['mobile'] = $row['4'];
			$index['uid']      = $row['5'];
			
			array_push($result['tag'], $index);
		}
			
			$result["success"]="1";
			echo json_encode($result);
			mysqli_close($connection);

 ?>