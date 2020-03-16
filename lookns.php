<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<title>lookns.meelab.th.com</title>
		<link href= "images/favicon.ico" rel="icon" type="image/x-icon" />
		<style>
			#bg {
				background: #fff;
				margin:0 auto;
				position:relative;
			}
			#container{
				margin:0 auto;
				padding:0;
				position:relative;
				top:80px;
				width:400px;
				width: /*\**/ 400px\9; /* IE8 Only */
			}	
			#logo {
				background: url(images/logo.png) no-repeat;
				height: 70px;
				width: 130px;
			}
			#header {
				height: 60px;
				width: 160px;
			}
			#own-table {
				margin:0 auto;
				Width: 85%;
				position:relative;
				bottom:0;
			}
			#one-table {
				background-color:black; 
				color:white;
			}
			#footer {
				position:fixed;
				bottom:0;
				width:100%;
				height:20px;   /* Height of the footer */
				background:#3498db;
			}		
			.btn {
				background: #3498db;
  				background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  				background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  				background-image: -ms-linear-gradient(top, #3498db, #2980b9);
 				background-image: -o-linear-gradient(top, #3498db, #2980b9);
  				background-image: linear-gradient(to bottom, #3498db, #2980b9);
  				-webkit-border-radius: 28;
  				-moz-border-radius: 28;
  				border-radius: 28px;
  				font-family: Arial;
  				color: #ffffff;
  				font-size: 20px;
  				padding: 10px 20px 10px 20px;
  				text-decoration: none;
			}
			.btn:hover {
  				background: #3cb0fd;
  				background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  				background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  				background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  				background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  				background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  				text-decoration: none;
			}
			table, td, th {
				border-collapse: collapse;
				border: 1px solid black;
			}
		</style>
	</head>
	<body id="bg" class="en" align="center">
		<div id="container">
		>>lookns "Input domain to find dns-server you want."
			<div id="header">
				<div id="logo"></div>
			</div>
			<div id="content">
				<form action="lookns.php" method="get" name="form1" id="form1">
					<br>
					<textarea rows="10" cols="50" name="txtName" form="form1"></textarea>
					<br>
					<input type="submit" value="Search" class="btn">
				</form>
			</div>
		</div>
		<br><br><br><br><br>
		<table id="own-table">
			<?php
				if($_GET["txtName"]){
					$mytext = split("\r\n", $_GET["txtName"]);
					$tb1 = "<tr id=\"one-table\"><th>No.</th><th>Domain</th><th>NS 1</th><th>NS 2</th><th>MX</th><th>MX Resolve</th></tr>";
					foreach($mytext as $key => $val) {
						$line = number_format($key)+1;
						$dns = dns_get_record($val, DNS_NS);
						$mx = dns_get_record($val,DNS_MX);
						$mxip = gethostbyname($mx[0]['target']);
						$tb1 = $tb1."<tr><th>".$line."</th><th>".$val."</th><th>".$dns[0]['target']."</th><th>".$dns[1]['target']."</th><th>".$mx[0]['target']."</th><th>".$mxip."</th></tr>";
					}
					echo $tb1;
				}
				else {
					echo "<tr id=\"one-table\"><th>No.</th><th>Domain</th><th>NS 1</th><th>NS 2</th><th>MX</th><th>MX Resolve</th></tr>";
					echo "<tr><th>-</th><th>----------</th><th>----------</th><th>----------</th><th>----------</th><th>----------</th></tr>";
				}
			?>
		</table>
		<br><br><br>
		<div id="footer"><input type="submit" value="Home" onclick="window.location='/index.html';">
			Powered by nostmax ®Forum Software ©Sysadmin
		</div>
	</body>
</html>
