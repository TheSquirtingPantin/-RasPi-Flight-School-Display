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
	
$func_return = htmlsniffer('https://docs.google.com/spreadsheets/d/1HioVrtr4YIvqSS1HJ2_zd7fW7famuXTOVoO2KaMfLm4/pubhtml', 'td', 15);
echo $func_return;
?>


<?php
$pos[0] = strpos(exec('uptime'), 'load') + 14;
$uptime[0] = substr(exec('uptime'), $pos[0]);
$pos[0] = strpos($uptime[0], ',');
$uptime[1] = substr($uptime[0], 0, $pos[0]);
echo "cpu : $uptime[1]%";
?>