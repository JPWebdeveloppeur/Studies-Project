<?php
require(BASEURL."/Modeles/ModeleArticle.php");

if(isset($_GET["id"])) {
	// on est sur une gestion de fiche
	$id = htmlspecialchars($_GET["id"]);

	// si on a une action
	if(isset($_GET["action"]) && $_GET["action"] == "supprimer") {
			deleteArticle($id);
	}

	// Je regarde si on vient de soummettre le formulaire
	if($_SERVER["REQUEST_METHOD"] ==  "POST") {
		
		// J'appelle ma fonction modifArticle avec le paramètre 1 qui va déclencher la récupération du form
		$gestionArt = modifArticle($id, 1);
		
	} else {
		$gestionArt = modifArticle($id, 0);		
	}
} elseif (empty($_GET["id"]) && !empty($_GET["action"])) {
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$gestionArt = insertArticle(1);
	} else {
		// si id est vide, mais qu'on a une action (creation)
		$gestionArt = insertArticle(0);		
	}
} else {
 	$listcontenu = listeContenu();
}


require(BASEURL.'/Vues/VueArticle.php');

?>