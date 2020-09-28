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
			background-color: #4CAF50;
			width: auto;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

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
		
		<title>User Data : NodeMCU V3 ESP8266 / ESP12E with MYSQL Database</title>
	</head>
	
	<body>
  

		
        <span style="padding-left:210px;"></span>
        <br >

        <div class="container">

			<div class="center" style="margin: 0 auto; width:182px; border-style: solid;  border-color: #fffffff;">
            <div class="center">

            <ul class="topnav">
                <li><a href="home.php">Home</a></li>
                <li><a class="active" href="user data.php">User Data</a></li>
            </ul>

            </div>
        </div>

        
        
        </div>

		<br>
		<div class="container">
            <div class="row">
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                      <th>TEMPERATURE *C  </th>
                      <th>HUMIDITY  (%)</th>
					  <th>DATE</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php


                    $link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
                    mysqli_select_db($link,'datamonitoringcontrol') or die('Cannot select the DB');

                    $sql = 'SELECT * FROM datacontrol ';
                    $result = mysqli_query($link,$sql) or die('Errant query:  '.$sql);
                    $result = $link->query($sql);
                  
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["temperature"] . "</td><td>"
                    . $row["humidity"]."</td><td>". $row["date"] . "</td></tr>";
                    }
                    echo "</table>";
                   
					$link->close();
					
					
           
                  ?>
                  </tbody>
				</table>
			</div>
		</div> <!-- /container -->
	</body>
</html>