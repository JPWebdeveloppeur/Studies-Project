<?php
ini_set("error_reporting", E_ALL);
/*
Front controleur pour l'admin
*/

// On lance la session
session_start(); 

// On charge notre fichier de config
require("appConf.php");

function verifToken() {
	// Vérification du token de session
	// Pour vérifier que la session correspond bien à l'utilisateur, on utilise le token créé à la connexion.
	// Pour cela on va chercher à le reproduire à l'aide des mêmes variables environnementales (adresse IP et User Agent du navigateur). Si on arrive au même résultat, on considère que la session correspond bien à notre utilisateur. La méthode n'est pas infaillible à 100% mais c'est une sécurité supplémentaire.
	$tokenConnect = md5($_SERVER["HTTP_USER_AGENT"].$_SERVER["REMOTE_ADDR"]);
	if($tokenConnect!=$_SESSION["token"]) {
		$_SESSION = array();
		session_destroy();
		header("location:".URL."?probleme");
		exit;
	}
}



/*
GESTION DES PERMISSIONS
L'intérêt d'un front controller est entre autres de pouvoir centraliser la gestion des permissions (ou droits d'accès ou privilèges).
Dans ce site de démo nous aurons pour le moment 3 niveaux :
- SuperAdmin : a accès à tout (role 999)
- Editeur : a accès aux actus et à la gestion de sa fiche membre (role 777)
- Membre : n'a accès qu'à sa fiche membre (role 0)

*/
// Si on cherche à accéder à une page, qu'on a un role et qu'il est à 999 (superadmin) ou 777(editeur), on lance la redirection vers le controleur
if(isset($_GET["page"]) && isset($_SESSION["RoleMembre"])) {

	// on vérifie le token de connexion, créé dans le fichier modeleConnexion
	verifToken();

	// si on a une variable en GET, on redirige automatiquement vers un controleur
	
	// on effectue un premier nettoyage avec htmlspecialchars
	$destination = htmlspecialchars($_GET["page"]);

	// on met la première lettre en majuscule
	$destination = ucfirst($destination);

	if ($destination != "Actu" && $destination != "Deconnexion") {
		// si on est pas admin et qu'on va ailleurs que sur les actus 
		if($_SESSION["RoleMembre"] == 0) {
			// Si on est visiteur, on est redirigé
			header("location:".URL);
			exit;
		} else {
			// sinon on passe
			$destination = BASEURL."/Controleurs/Controleur".$destination.".php";
			require($destination);
		}
	} else {
		// sinon on passe
			$destination = BASEURL."/Controleurs/Controleur".$destination.".php";
			require($destination);
	}

	

} else if(!isset($_GET["page"]) && isset($_SESSION["RoleMembre"]) && ($_SESSION["RoleMembre"] == 999 || $_SESSION["RoleMembre"] == 0)) {

	// on vérifie le token de connexion
	verifToken();

	// Si on cherche à accéder à l'accueil de l'admin et qu'on est logé en tant qu'admin
	require(BASEURL."/Controleurs/ControleurPanel.php");

} else {
	// si on n'a pas de GET, on redirige vers l'accueil de l'admin
	require(BASEURL."/Controleurs/ControleurConnexion.php");
}

?>