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
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");
				}, 500);
			});
		</script>
		
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
            background-color: darkcyan;
		}
		
		textarea {
			resize: none;
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
		
		<title>Registration : Horizon Data</title>
	</head>
	
	<body>
      <section class="pattern">
        <div class="geeks">
     
        </div>
    </section>
		<h2 align="center"></h2>
		<ul class="topnav">
	<li><a  href="home.php"><img src="hh.png"></a></li>
			<li><a   href="user data.php"><img src="uu.png"></a></li>
			<li><a class ="active" href="registration.php"><img src="rr.png"></a></li>
			<li><a  href="read tag.php"><img src="dd.png"></a></li>
            <li><a  href="surveillance.php"><img src="b.png"></a></li>
		</ul>

		<div class="container">
			<br>
			<div class="center" style="margin: 0 auto; width:495px; border-style: solid; border-color: #f2f2f2;">
				<div class="row">
					<h3 align="center">Nouvelle Employé</h3>
				</div>
				<br>
				<form class="form-horizontal" action="insertDB.php" method="post" >
					<div class="control-group">
						<label class="control-label">ID</label>
						<div class="controls">
							<textarea name="id" id="getUID" placeholder="Taper votre TAG" rows="1" cols="1" required></textarea>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Nom</label>
						<div class="controls">
							<input id="div_refresh" name="name" type="text"  placeholder="" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Sex</label>
						<div class="controls">
							<select name="gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Email </label>
						<div class="controls">
							<input name="email" type="text" placeholder="" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Mobile </label>
						<div class="controls">
							<input name="mobile" type="text"  placeholder="" required>
						</div>
					</div>
					
					<div class="form-actions"  >
						<button type="submit" class="btn btn-success" >Enregistrer</button>
                    </div>
				</form>
				
			</div>               
		</div> 
	</body>
</html>