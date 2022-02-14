
<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
  $page = $_SERVER['PHP_SELF'];
$sec = "5";
        
?>

<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
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
		
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
		</style>
		
		<title>Lecture Tag : Horizon Data</title>
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
			<li><a href="registration.php"><img src="rr.png"></a></li>
			<li><a  href="read tag.php"><img src="dd.png"></a></li>
            <li><a class ="active" href="surveillance.php"><img src="b.png"></a></li>
		</ul>
		
		<br>
		
		<h3 align="center" id="blink" color="red">Presence</h3>
		
		<p id="getUID" hidden></p>
		
		<br>
		
		<div id="show_user_data">
			
		</div>
        <form>
        
        
        	<table  width="452" border="1" bordercolor="darkcyan" align="center"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="padding: 2px">
					<tr>
						<td  height="40" align="center"  bgcolor="darkcyan"><font  color="#FFFFFF">
							<b>Donnés Employés</b>
							</font>
						</td>
					</tr>
					<tr>
						<td  bgcolor="#f9f9f9">
							<table width="452"  border="0" align="center" cellpadding="5"  cellspacing="0">
								<tr>
									<td width="113" align="left" class="lf">ID</td>
									<td style="font-weight:bold">:</td>
									<td align="left">--------</td>
								</tr>
        
        </form>

		<script>
			var myVar = setInterval(myTimer, 1000);
			var myVar1 = setInterval(myTimer1, 1000);
			var oldID="";
			clearInterval(myVar1);

			function myTimer() {
				var getID=document.getElementById("getUID").innerHTML;
				oldID=getID;
				if(getID!="") {
					myVar1 = setInterval(myTimer1, 500);
					showUser(getID);
					clearInterval(myVar);
				}
			}
			
			function myTimer1() {
				var getID=document.getElementById("getUID").innerHTML;
				if(oldID!=getID) {
                
					myVar = setInterval(myTimer, 500);
					clearInterval(myVar1);
				}
			}
           
			function showUser(str) {
				if (str == "") {
					document.getElementById("show_user_data").innerHTML = "";
					return;
				} else {
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("show_user_data").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","insertlog.php?id="+str,true);
					xmlhttp.send();
				}
			}
     
			
			var blink = document.getElementById('blink');
			setInterval(function() {
				blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
			}, 750); 
		</script>
	</body>
</html>