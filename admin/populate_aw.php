<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="shortcut icon" type="image/ico" href="fglogo.jpg" />
   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="fgstyle.css" />
   <title> F&G Aviation | Pilot Information Page </title>
 </head>
	<?php
		If (isset($_POST[opsstatus]))
		{
			$radioreturn = $_POST['opsstatus'];
			$aircraft_sts = fopen('acft_sts/fhcf_sts.txt','r+')or die('Config file not found!');
			ftruncate($aircraft_sts, 0);
			fwrite($aircraft_sts, $radioreturn);
			fclose($aircraft_sts);
			echo '<div id="confirmmsg">Changes have been saved !</br> You will be soon redirected</div>';// Redirection après fermeture du formulaire
			header ('refresh: 5;url=http://24.79.39.134/index.php'); 
		}
		else
		{
			echo 'ERROR IN RETRIEVING INFORMATION!';
		}
	?>
	<div id="headerphoto">
		<img src="fglogo.jpg" alt="Logo de FG aviation"></img>
	</div>
	<br>
	<footer>
		<p>Powered with PHP, HTML and the lovely RasPi</p>
	</footer>
</html>