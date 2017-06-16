<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <META HTTP-EQUIV="Refresh" CONTENT="120; URL=index.php"> 
   <link rel="shortcut icon" type="image/ico" href="fglogo.jpg" />
   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="fgstyle.css" />
   <title> F&G Aviation | Pilot Information Page </title>
 </head>
 <body>
	<div id="headerphoto">
		<p><img src="fglogo.jpg" alt="Logo de FG aviation"></img>Pilot Information Page</p>
	</div>
	<div id="acftaw">
	<?php
	function htmlsniffer($url,$node,$nodenumb)
		{
			//Creation de la feuille de récupération 
			$retrieve = new DOMDocument;
			// Retrieve de l'ensemble du code HTML de la page 
			$retrieve->loadHTMLFile($url);
			//tri par tag html
			$table_retrieve= $retrieve->getElementsByTagName($node);
			//definition du tag n°20 comme variable
			$heurerem_brut = $table_retrieve->item($nodenumb)->nodeValue;
			// Affichage
			return $heurerem_brut;
		}
	?>
		<p id="acftawtitle"><b>Aircraft A/W:</b></p>
		<div id="tablewrapper">
			<table id="acftinfo">
				<tr>
					<td></td>
					<th>C-FHCF</th>
				</tr>
				<tr>
					<td class="line_table">Auth. Disp.:</td>
					<td>
					<?php
						// Recupération de la valeur aw dans fichier texte
						$authdisfile = fopen('http://24.79.39.134/admin/acft_sts/fhcf_sts.txt', 'r'); 
						$retrieveauthdis = fgets($authdisfile);
						fclose($authdisfile);
						// Analyse du contenu 
						$result = $retrieveauthdis; 
						if ($result == 'yes')
							{
								echo '<p style="color: green;">YES </p>';
							}
							
						if ($result == 'yeswithlim')
							{
								echo '<p style="color: orange;">YES With Limitation</p>';
							}
						
						if ($result == 'no')
							{
								echo '<p style="color: red;">NO</p>';
							}							
					?>
					</td>
				</tr>
				<tr>
					<td class="line_table">Rem. Time:</td>
					<td>
					<?php
					$func_return = htmlsniffer('https://docs.google.com/spreadsheets/d/1HioVrtr4YIvqSS1HJ2_zd7fW7famuXTOVoO2KaMfLm4/pubhtml', 'td', 15);
					echo $func_return . 'h Air Time';
					?>
					</td>
				</tr>
				<tr>
					<td class="line_table">U/S Equipt.:</td>
					<td>
					<?php
						$usequipfile = fopen('http://24.79.39.134/admin/acft_sts/fhcf_inopitem.txt', 'r'); 
						$retrieveusequip = fgets($usequipfile);
						fclose($usequipfile);
						echo $retrieveusequip;
					?>
					</td>
				</tr>
				<tr>
					<td class="line_table">OPS lim:</td>
					<td>
						<?php
							$limfile = fopen('http://24.79.39.134/admin/acft_sts/fhcf_opslim.txt', 'r'); 
							$retrievelim = fgets($limfile);
							fclose($limfile);
							echo $retrievelim;
						?>
					</td>
				</tr>
			</table>
		</div>
		<div class="adminbutton"><button type="button"><a href="/admin/adminpanel.php">Admin Panel</a></button>
		</div>
	</div>
	<div id="metar">
		<p id="metartitle"><b>METARs / TAFs:</b></p>
		<!-- METAR 1 Change ICAO if needed -->
			<div id="wxwrapper">
				<div id="metarcontent">
				<?php
					//Recupération du content NOAA
					$metar_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/observations/metar/stations/CYPG.TXT');
					//Trimming
					$metar_adap = substr($metar_full,16);
					//Display
					echo $metar_adap;
				?>
				</div>
				<div id="tafcontent">
				<?php
					//Recupération du content NOAA
					$taf_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/forecasts/taf/stations/CYPG.TXT');
					//Trimming
					$taf_adap = substr($taf_full,16);
					//Display
					echo $taf_adap;
				?>
				</div>
			</div>
		<!-- METAR 2 Change ICAO in URL if needed -->
			<div id="wxwrapper">
				<div id="metarcontent">
				<?php
					//Recupération du content NOAA
					$metar_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/observations/metar/stations/CYBR.TXT');
					//Trimming
					$metar_adap = substr($metar_full,16);
					//Display
					echo $metar_adap;
				?>
				</div>
				<div id="tafcontent">
				<?php
					//Recupération du content NOAA
					$taf_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/forecasts/taf/stations/CYBR.TXT');
					//Trimming
					$taf_adap = substr($taf_full,16);
					//Display
					echo $taf_adap;
				?>
				</div>
			</div>
			<!-- METAR 3 Change ICAO in URL if needed -->
			<div id="wxwrapper">
				<div id="metarcontent">
				<?php
					//Recupération du content NOAA
					$metar_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/observations/metar/stations/CYWG.TXT');
					//Trimming
					$metar_adap = substr($metar_full,16);
					//Display
					echo $metar_adap;
				?>
				</div>
				<div id="tafcontent">
				<?php
					//Recupération du content NOAA
					$taf_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/forecasts/taf/stations/CYWG.TXT');
					//Trimming
					$taf_adap = substr($taf_full,16);
					//Display
					echo $taf_adap;
				?>
				</div>
			</div>
			<div id="wxwrapper">
				<div id="metarcontent">
				<?php
					//Recupération du content NOAA
					$metar_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/observations/metar/stations/CYDN.TXT');
					//Trimming
					$metar_adap = substr($metar_full,16);
					//Display
					echo $metar_adap;
				?>
				</div>
				<div id="tafcontent">
				<?php
					//Recupération du content NOAA
					$taf_full = file_get_contents('ftp://tgftp.nws.noaa.gov/data/forecasts/taf/stations/CYDN.TXT');
					//Trimming
					$taf_adap = substr($taf_full,16);
					//Display
					echo $taf_adap;
				?>
				</div>
			</div>
	</div>
	<div id="rwystate">
		<p id="rwystatetitle"><b>Runway Condition:</b></p>
		<div id="tablewrapper">
			<table id="rwyref">
			<tr>
				<th>Runway</th>
				<th>Condition</th>
				<th>Remarks</th>
			</tr>
			<tr>
				<td>14/32</td>
				<td>
					<?php
						$rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');
						$retrieve = $rwystsfile[0];
						echo $retrieve; 
					?>
				</td>
				<td>
					<?php
						$rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');
						$retrieve = $rwystsfile[3];
						echo $retrieve; 
					?>
				</td>
			</tr>
			<tr>
				<td>09/27</td>
				<td>
					<?php
						$rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');
						$retrieve = $rwystsfile[1];
						echo $retrieve; 
					?>
				</td>
				<td>
					<?php
						$rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');
						$retrieve = $rwystsfile[4];
						echo $retrieve; 
					?>
				</td>
			</tr>
			<tr>
				<td>18/36</td>
				<td>
					<?php
						$rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');
						$retrieve = $rwystsfile[2];
						echo $retrieve; 
					?>
					</td>
				<td>
					<?php
						$rwystsfile = file('http://24.79.39.134/admin/rwy_sts.txt');
						$retrieve = $rwystsfile[5];
						echo $retrieve; 
					?>
				</td>
			</tr>
			</table>
		</div>
		<div class="adminbutton"><button type="button"><a href="/admin/adminpanel.php">Admin Panel</a></button>
		</div>
	</div>
	<div id="notams">
		<p id="notamstitle">NOTAMs:</p>
		<div id="notamswrapper">
		<p><ul><li><b><u>Nav Canada Notams:</u></b></li></ul></p>
			<?php
			//Telechargement des derniers Notams
			$retrieve = file_get_contents("https://v4p4sz5ijk.execute-api.us-east-1.amazonaws.com/anbdata/states/notams/notams-list?api_key=acbea510-fec0-11e6-ab53-b1e15c34e173&format=csv&type=&Qcode=&locations=CYPG,CYZ2&qstring=&states=&ICAOonly=");
			$mod_retrieve = explode('!', $retrieve,1000); 
			echo $mod_retrieve[2];
			?>
		<p><ul><li><b><u>Company Notams:</u></b></li></ul></p>
		<?php
			//Telechargement des derniers Notams
			$retrieve_comp = file_get_contents("http://24.79.39.134/admin/comp_notams.txt");
			echo $retrieve_comp;
			?>
		</div>
		
		</br>
		</br>
		</br>
		</br>
	</div>
 </body>
 </br>
 <footer>
 <p>Powered with PHP, HTML and the lovely RasPi</p>
 </footer>
</html>