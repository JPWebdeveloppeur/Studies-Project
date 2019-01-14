<?php
require(BASEURL."/Modeles/ModeleConnexion.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {
	$form = connexion(0);	
} else {
	$form = connexion(1);	
}

require(BASEURL."/Vues/VueConnexion.php");

?>