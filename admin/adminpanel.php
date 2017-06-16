<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="shortcut icon" type="image/ico" href="fglogo.jpg" />
   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="./fgstyle.css" />
   <title> F&G Aviation | Pilot Information Page </title>
 </head>
 <body>
	<div id="headerphoto">
		<img src="fglogo.jpg" alt="Logo de FG aviation"></img>
		<p>ADMIN Panel</p>
	</div>
	<div id="fieldsetwrapper">
		<fieldset>
			<legend>Runway Condition</legend>
			<form method="post" action="http://24.79.39.134/admin/populate_sts.php">
				<table id="rwyref">
				<tr>
					<th>Runway</th>
					<th width="200px">Condition</th>
					<th width="200px">Remarks</th>
				</tr>
				<tr>
					<td><b>14/32</b></td>
					<td><input size="45" type="text" name="runway1432" value="<?php $rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');$retrieve = $rwystsfile[0];echo $retrieve;?>"/></td>
					<td><input size="45" type="text" name="remark1432" value="<?php $rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');$retrieve = $rwystsfile[3];echo $retrieve;?>"/></td>
				</tr>
				<tr>
					<td><b>09/27</b></td>
					<td><input size="45" type="text" name="runway0927" value="<?php $rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');$retrieve = $rwystsfile[1];echo $retrieve; ?>"/></td>
					<td><input size="45" type="text" name="remark0927" value="<?php $rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');$retrieve = $rwystsfile[4];echo $retrieve; ?>"/></td>
				</tr>
				<tr>
					<td><b>18/36</b></td>
					<td><input size="45" type="text" name="runway1836" value="<?php $rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');$retrieve = $rwystsfile[2];echo $retrieve;?>"/></td>
					<td><input size="45" type="text" name="remark1836" value="<?php $rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');$retrieve = $rwystsfile[5];echo $retrieve;?>"/></td>
				</tr>
				</table>
				<p align="center"><img id="crfiimg" src="crfi.png" alt="Canadian CRFI" height="30%" width="50%"></img></p></br>
				<input type="submit" value="Save Runways Condition"/>
			</form>
		</fieldset>
		<fieldset>
			<legend>Aircraft A/W</legend>
			<div id="wrapperaw">
				<form id="aircraftaw" method="post" action="http://24.79.39.134/admin/populate_aw.php">
					<p id="registrationaw">C-FHCF:</p>
					<p><ul><li><u>Is Serviceable?:</u></li></ul></p>
						<input type="radio" name="opsstatus" value="yes" checked="checked">YES</input>
						<input type="radio" name="opsstatus" value="yeswithlim">Yes (with LIM)</input>
						<input type="radio" name="opsstatus" value="no">NO</input></br></br>
					<p><ul><li><u>Unserviceable Equipment:</u></li></ul></p>
						<input type="text" name="usequipment" size="150" value="
							<?php
								$usequipfile = fopen('http://24.79.39.134/admin/acft_sts/fhcf_inopitem.txt', 'r'); 
								$retrieveusequip = fgets($usequipfile);
								fclose($usequipfile);
								echo $retrieveusequip;
							?>"
						>
						</input>
					</br>
					<p><ul><li><u>Operational Limitations</u></li></ul></p>
						<input type="text" name="opslimitation" size="150" value="
							<?php
								$usequipfile = fopen('http://24.79.39.134/admin/acft_sts/fhcf_opslim.txt', 'r'); 
								$retrieveusequip = fgets($usequipfile);
								fclose($usequipfile);
								echo $retrieveusequip;
							?>"
						>
						</input>
					</br>
					</br>
					<input type="submit" value="Save Aircraft Status"/>
				</form>
			</div>
		</fieldset>
		<fieldset>
		<legend>NOTAMS Company</legend>
			<form method="post" action="populate_compnotam.php">
				<textarea id="notamsadmin" name="conotams" rows="8" cols="100">
				<?php
					$retrieve_comp = file_get_contents("http://24.79.39.134/admin/comp_notams.txt");
				echo $retrieve_comp;
				?>
				</textarea>
				<br>
				<input type="submit" value="Save Changes"/>
			</form>
		</fieldset>
	</div>
 </body>
 <footer>
 <p>Powered with PHP, HTML and the lovely RasPi</p>
 </footer>
</html>