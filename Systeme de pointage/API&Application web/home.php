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

		ul.topnav li a.active {background-color: #480E60;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
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
			<li><a class ="active"  href="home.php"><img src="hh.png"></a></li>
			<li><a href="user data.php"><img src="uu.png"></a></li>
			<li><a href="registration.php"><img src="rr.png"></a></li>
			<li><a  href="read tag.php"><img src="dd.png"></a></li>
            <li><a href="surveillance.php"><img src="b.png"></a></li>
		</ul>
		<br>
		
		
		<img src="tt.jpg" alt="" style="width:55%;"
            >
	</body>
</html>