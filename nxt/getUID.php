<?php

    require 'dataBaseMC.php';

	$UIDresult=$_POST["UIDresult"];

	echo "OK";

	$dataB=new Database();

	$tempData=substr($UIDresult,0,3);
	$humData=substr($UIDresult,3,3);
	$disp=substr($UIDresult,0,6);

	$dataB->saveDB($tempData,$humData);
	
	$Write="<?php $" . "UIDresult='" . $disp. "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

