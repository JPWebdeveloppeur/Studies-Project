<?php

/* Je définis une constante BASEURL qui va me permettre de réécrire les chemins d'accès aux fichiers (require)
*/

define('BASEURL', $_SERVER["DOCUMENT_ROOT"]."/admin-declic/");

define('URL', "http://declicludik.gc-infographie.fr/admin-declic/");

define('URLPublic', "http://declicludik.gc-infographie.fr/");

define('BASEURLimg', "/home/gcinfogr/declicludik/img/carousel/");


function connect() {
	// on instancie une connexion à la base via mysqli
	$connect = mysqli_connect("mysql51-118.perso", "gcinfographie", "SeFYHdeS9guy", "gcinfographie");
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
