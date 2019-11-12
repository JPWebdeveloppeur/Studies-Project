<?php
/*
le fichier appConf.php va nous servir de fichier de paramétrage
de notre site, de manière à ce que les infos de configuration
du site soient regroupées en un seul fichier.
*/

/* Je définis une constante BASEURL qui va me permettre de réécrire les chemins d'accès aux fichiers (require)
*/
define('BASEURL', $_SERVER["DOCUMENT_ROOT"]);


function connect() {
	// on instancie une connexion à la base via mysqli
	$connect = mysqli_connect("***********", "***********", "***********", "***********");
	// on précise l'encodage des informations échangées avec la base
	mysqli_set_charset($connect, "utf8");

	// si on a une erreur à la connexion, on l'affiche
	// a commenter en prod
	if(mysqli_connect_errno()) {
		echo "Erreur de connexion à la base (".mysqli_connect_errno()." : ".mysqli_connect_error().").";
	}

	return $connect;
}




?>