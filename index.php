<?php
ini_set("error_reporting", E_ALL);
/*
Le fichier d'index nous
servira de contrôleur frontal

En fonction des paramètres qu'on
a dans les requêtes, on va 
appeler les controleurs dédiés

*/

// On charge notre fichier de config
require("appConf.php");

if(isset($_GET["page"])) {

	// si on a une variable en GET, on redirige automatiquement vers un controleur
	
	// on effectue un premier nettoyage avec htmlspecialchars
	$destination = htmlspecialchars($_GET["page"]);
	// on met la première lettre en majuscule
	$destination = ucfirst($destination);
	// on reconstruit automatiquement le chemin vers le controleur
	$destination = "Controleurs/Controleur".$destination.".php";

	// On va vérifier que le controleur existe avant de le charger
	if(file_exists($destination)) {
		require($destination);		
	} else {
		header("location:404.php");
	}


} else {
	// si on n'a pas de GET, on redirige vers l'accueil
	require("Controleurs/ControleurAccueil.php");
}

?>