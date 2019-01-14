<?php
require(BASEURL."/Modeles/ModeleMembre.php");


if(isset($_GET['id']) || ($_SESSION["RoleMembre"] == 777 || $_SESSION["RoleMembre"] == 0)) {

	$idMembre = $_GET["id"];


	if(isset($_GET["id"]) && $_SESSION["RoleMembre"] == 999) {
		// Si on est Super Admin, on utilise l'id passée en GET pour afficher une fiche
		$id = htmlspecialchars($_GET["id"]);		
	} else {
		// Gestion des droits pour les membres et éditeurs : ils n'ont droits de modifier que leur prore fiche
		// On utilise alors l'id stockée dans leur session afin qu'ils ne puissent pas accéder à une autre fiche

		$id = $_SESSION["idmembre"];
	}


	// si on a une action
	if(isset($_GET["action"]) && $_GET["action"] == "supprimer") {
			deleteMembre($id);
	} else {
		// cas de figure étrange, l'admin teste des fonctions inconnues
	}
	
	// Je regarde si on vient de soummettre le formulaire
	if($_SERVER["REQUEST_METHOD"] ==  "POST") {
		// J'appelle ma fonction modifMembre avec le paramètre 1 qui va déclencher la récupération du form
		$fiche = modifMembre($id, 1);
	} else {
		$fiche = modifMembre($id, 0);		
	}


} else if (empty($_GET["id"]) && !empty($_GET["action"])) {

	// on crée un identifiant provisoire et aléatoire unique avec uniqid	
	$idMembre = uniqid();

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$fiche = insertMembre(1, $idMembre);
	} else {
		// si id est vide, mais qu'on a une action (creation)
		$fiche = insertMembre(0, $idMembre);		
	}


} else {
	// on est sur un affichage de liste
	$liste = listMembres();
}


require(BASEURL."/Vues/VueMembre.php");

?>