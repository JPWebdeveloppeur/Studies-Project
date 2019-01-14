<?php
require(BASEURL."/Modeles/ModeleActu.php");

if(isset($_GET["id"])) {
	// on est sur une gestion de fiche
	$id = htmlspecialchars($_GET["id"]);

	// si on a une action
	if(isset($_GET["action"]) && $_GET["action"] == "supprimer") {
			deleteActus($id);
	}

	// Je regarde si on vient de soummettre le formulaire
	if($_SERVER["REQUEST_METHOD"] ==  "POST") {
		
		// J'appelle ma fonction modifArticle avec le paramètre 1 qui va déclencher la récupération du form
		$gestionActu = modifActus($id, 1);
		
	} else {
		$gestionActu = modifActus($id, 0);		
	}
} elseif (empty($_GET["id"]) && !empty($_GET["action"])) {
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$gestionActu = insertActus(1);
	} else {
		// si id est vide, mais qu'on a une action (creation)
		$gestionActu = insertActus(0);		
	}
} else {
 	$listeactus = listeactus();
}

require(BASEURL.'/Vues/VueActu.php');

?>