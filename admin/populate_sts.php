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
		$rwy1432 = $_POST['runway1432']; // Recuperation et renommage des variables POST du form sur admin.php
		$rwy0927 = $_POST['runway0927'];
		$rwy1836 = $_POST['runway1836'];
		$rmk1432 = $_POST['remark1432'];
		$rmk0927 = $_POST['remark0927'];
		$rmk1836 = $_POST['remark1836'];
		$rwystsfile= fopen('rwy_sts.txt','r+');
		ftruncate($rwystsfile,0); 
		fseek($rwystsfile, 0);
			fputs($rwystsfile, $rwy1432);
			fputs($rwystsfile, "\n"); // Saut de ligne pour assurer un limiteur 
			fputs($rwystsfile, $rwy0927);
			fputs($rwystsfile, "\n");
			fputs($rwystsfile, $rwy1836);
			fputs($rwystsfile, "\n");
			fputs($rwystsfile, $rmk1432);
			fputs($rwystsfile, "\n");
			fputs($rwystsfile, $rmk0927);
			fputs($rwystsfile, "\n");
			fputs($rwystsfile, $rmk1836);
		fclose($rwystsfile); 
		echo '<div id="confirmmsg">Changes have been saved !</br> You will be soon redirected</div>';		// Redirection après fermeture du formulaire
		header ('refresh: 5;url=http://24.79.39.134/index.php'); 
	?>
	<div id="headerphoto">
		<img src="fglogo.jpg" alt="Logo de FG aviation"></img>
	</div>
	<br>
	<footer>
		<p>Powered with PHP, HTML and the lovely RasPi</p>
	</footer>
</html>