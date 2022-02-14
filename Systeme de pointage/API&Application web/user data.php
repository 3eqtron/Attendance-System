<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
            background-color: white;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #550BEC;
			width: 35%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #455;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		.table {
			margin: auto;
			width: 90%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
                <style>
        body {
            padding: 0%;
            margin: 0%;
        }
 
        .geeks {
            padding: 100px;
            text-align: center;
        }
 
        section {
            width: 100%;
            min-height: 100px;
        }
 
        .pattern {
            position: relative;
            background-color: darkblue;
            background-image: linear-gradient(315deg,
                    darkcyan 0%, darkcyan 74%);
        }
 
        .pattern:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 250px;
            background: url(
https://media.geeksforgeeks.org/wp-content/uploads/20200326181026/wave3.png);
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
		
		<title>Horizon Data</title>
	</head>
	
	<body>
          <section class="pattern">
        <div class="geeks">
     
        </div>
    </section>
		<h2></h2>
       
             
		<ul class="topnav">
				<li><a  href="home.php"><img src="hh.png"></a></li>
			<li><a  class ="active" href="user data.php"><img src="uu.png"></a></li>
			<li><a href="registration.php"><img src="rr.png"></a></li>
			<li><a  href="read tag.php"><img src="dd.png"></a></li>
            <li><a href="surveillance.php"><img src="b.png"></a></li>
		</ul>
		<br>
		<div class="container">
            <div class="row">
                <h3>Donnés Employés</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#79305A" color="#FFFFFF">
                      <th>Nom</th>
                      <th>ID</th>
					  <th>Sex</th>
					  <th>Email</th>
                      <th>Mobile </th>
                        <th>uid </th>
                        <th>Date </th>
                                                <th>statut </th>

                         
                    
                        
                        
                    </tr>
                  </thead>
                              <script>
                    function name()
{


}
</script>
                  <tbody>
                      
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                                  
                   
                      
        
                   $sql = 'SELECT * FROM tag  inner join logs on logs.datelog ORDER BY name ASC';
                      
                          
                      
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
							echo '<td>'. $row['email'] . '</td>';
							echo '<td>'. $row['mobile'] . '</td>';
                            echo '<td>'. $row['uid'] . '</td>';
                       echo '<td>'. $row['datelog'] . '</td>';
                       $presence;
                       if($row['statut']==1){
                           $presence="present";
                       }
                       else{
                           $presence="absent";
                       }
                       echo '<td>'. $presence . '</td>';
                      
                   
							
                   }
                      
                   Database::disconnect();
                  ?>
                     
                  </tbody>
          
				</table>
			</div>
		</div> <!-- /container -->
	</body>
</html>