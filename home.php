









<!DOCTYPE html>
<html lang="en">
<html>
	<head>


        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 	
        <title>Button Switches with Checkboxes and CSS3 Fanciness</title>
        <meta name="description" content="CSS Button Switches with Checkboxes and CSS3 Fanciness" />
        <meta name="keywords" content="css3, css-only, buttons, switch, checkbox, toggle, web design, web development" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css' />
	    
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="jquery.min.js"></script>
        <script src="gauge.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
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

		@media screen and (max-width: 200px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		</style>
		
		<title>IOT SMART HOME SYSTEM</title>
	</head>
	
	<body>
		
	    <span style="padding-left:210px;"></span>
		<div class="container">

			<div class="center" style="margin: 0 auto; width:182px; border-style: solid;  border-color: #fffffff;">
            <div class="center">

            <ul class="topnav">
				<li><a class="active" href="home.php">Home</a></li>
				<li><a href="user data.php">User Data</a></li>
		   </ul>

            </div>
        </div>
		<span style="padding-left:210px;"></span>

		<h6 hidden="true" align="center" id="getUID"></h6>


		<div class="container">
			<div class="center" style="margin: 0 auto; width:600px; border-style: solid;  border-color:  #008000;">

			<br>

			<div class="column">
				<h2 align="center"><strong>DISPLAY</strong> </h2> 
				<h2 align="center"><strong>HUMIDITY    AND  TEMPERATURE </strong> </h2> 
			</div>

				<span style="padding-left:10px;"></span>
				<canvas data-type="radial-gauge" 
					data-value="00" 
					data-width="200" 
					data-height="300" 
					data-bar-width="20" 
					data-bar-shadow="1" 
					data-color-bar-progress="rgba(200,50,50,.75)" 
					data-color-bar="#eaa" 
					data-border-shadow-width="0" 
					data-border-inner-width="0" 
					data-border-outer-width="0"
					data-border-middle-width="0" 
					data-highlights="false" 
					data-value-box-stroke="0" 
					data-color-value-box-shadow="0" 
					data-value-box-border-radius="0" 
					data-value-text-shadow="0" 
					data-color-value-box-background="transparent" 
					data-needle="false" 
					width="628" 
					height="628" 
					style="width: 200px; height: 400px;">
				</canvas> 
				<span style="padding-left:210px;"></span>
				<canvas data-type="linear-gauge"
					id="di"
					data-width="160"
					data-height="300"
					data-border-radius="20"
					data-borders="true"
					data-bar-stroke-width="20"
					data-minor-ticks="10" 
					data-major-ticks="0,10,20,30,40,50,60,70,80,90,100" 
					data-color-numbers="red,green,blue,transparent,#ccc,#ccc,#ccc,#ccc,#ccc,#ccc,#ccc" 
					data-color-major-ticks="red,green,blue,transparent,#ccc,#ccc,#ccc,#ccc,#ccc,#ccc,#ccc" 
					data-color-bar-stroke="#444" 
					data-value="00" 
					data-units="°C" 
					data-color-value-box-shadow="false" 
					data-tick-side="left" 
					data-number-side="left" 
					data-needle-side="left" 
					data-animate-on-init="true" 
					data-color-plate="transparent" 
					data-font-value-size="45" 
					width="251" 
					height="942" 
					style="width: 200px; height: 400px;">
				</canvas>	
			</div> 


			<div  class="center" style="margin: 0 auto; width:700px; border-style: solid;  border-color: #008000;" >

			    <span style="padding-left:20px;"></span>

				<div class="column"> 
					<h2 align="center"><strong>CONTROL SWITCHES </strong> </h2> 
				</div>

				<span style="padding-left:20px;"></span>

			    <div class="row">
				            
					<span style="padding-left:40px;"></span>
					<div class=column>
						<h2 align="center"><strong>SWITCH1 </strong> </h2> 
						<div class="switch demo3">
							<input type="checkbox" id="switch1"onclick="change('switch1')" >
							<label><i></i></label>
						</div>
					</div>
					<span style="padding-left:50px;"></span>

					<div class=column>
						<h2 align="center"><strong>SWITCH2 </strong> </h2> 
						<div class="switch demo3">
							<input type="checkbox" id="switch2"onclick="change('switch2')" >
							<label><i></i></label>
						</div>

					</div>
					<span style="padding-left:50px;"></span>

					<div class=column>
						<h2 align="center"><strong>SWITCH3 </strong> </h2> 
						<div class="switch demo3">
							<input type="checkbox" id="switch3"onclick="change('switch3')" >
							<label><i></i></label>
						</div>
					</div>
					<span style="padding-left:30px;"></span>
				</div>
			</div>

		</div> <!-- /container -->	

		<script type="text/javascript"> 
			function ajaxcall(mcuCommand) {
				// GET FORM DATA
				var data = new FormData();

				data.append('message', mcuCommand);
			
				// AJAX CALL
				var xhr = new XMLHttpRequest();
				xhr.open('POST',"http://192.168.43.9:80/switches");
				xhr.send(data);
				return false;
		    }

		function change(swt) {

			var onCommand="";
		    var offCommand="";

		    function switchCommand(onComm, offComm){
				 onCommand=onComm;
			     offCommand=offComm;
		    }


			var decider = document.getElementById(swt);

			if( swt == "switch1"){
				 onCommand="so1";
				 offCommand="sf1";
			} else if(swt == "switch2"){
				onCommand="so2";
				offCommand="sf2";
			} else if(swt == "switch3"){
				switchCommand("so3", "sf3");	
			}
			
			if(decider.checked){
				ajaxcall(onCommand);
			} else {
				ajaxcall(offCommand);
			}

			onCommand="";
			offCommand="";
		}

		setInterval(function() {
			document.gauges.forEach(function(gauge) {
				var g = document.getElementById("getUID").innerHTML;
				var h=g%100;
				var t=g/1000;
				var t = parseInt(t);
				if(gauges[0]==gauge){
					gauge.value = h;
				}
				if(gauges[1]==gauge){
					gauge.value = t;
				} 
			});
		}, 500);
			

		</script>

	</body>
</html>
