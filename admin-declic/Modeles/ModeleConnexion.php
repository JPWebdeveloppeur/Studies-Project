<?php

/*
FONCTION DE CONNEXION AU SITE
la fonction va afficher et traiter le form de connexion
On va lancer une requete dans la base pour vérifier l'existence du membre
On va récupérer son mot de passe hashé 
Et on va le comparer avec le mot de passe entré dans le form avec la fonction password_verify
Si password_verify retourne true, on initialise une nouvelle variable de session permettant au membre d'accéder à l'admin et on redirige sur le panel

$mode :
0 -> Affichage du form
1 -> Traitement du form

*/

function connexion($mode) {

	// Si on est en mode traitement
	if($mode == 1) {
		$inputEmail = $_POST["email"];
		$inputPass = $_POST["pass"];

		// Si un des deux champs est vide, ou que l'email n'est pas valide, on redirige vers la connexion
		if(empty($inputEmail) || empty($inputPass) || !filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
			header("location:".URL);
			exit;
		}

		// Les champs sont bien remplis et le mail est valide, on continue

		// On va faire une requête préparée pour aller chercher les infos du membre

		$connect = connect();

		$stmt = mysqli_stmt_init($connect);

		// Requête SELECT dans la table membre
		$sql = "SELECT idMembre, RoleMembre, PrenomMembre, PassMembre FROM membres WHERE MailMembre = ? ";

		if(mysqli_stmt_prepare($stmt, $sql)) {

			mysqli_stmt_bind_param($stmt, 's', $inputEmail);

			if(!mysqli_stmt_execute($stmt)) {
				echo mysqli_stmt_error($stmt);
			}

			mysqli_stmt_bind_result(
				$stmt,
				$idmembre,
				$RoleMembre,
				$PrenomMembre,
				$PassMembre
			);

			// On récupère les résultats

			while(mysqli_stmt_fetch($stmt)) {
				$result["idMembre"] = $idmembre;
				$result["RoleMembre"] = $RoleMembre;					
				$result["PrenomMembre"] = $PrenomMembre;					
				$result["PassMembre"] = $PassMembre; 

			}

			// Si on a des résultats
			if(!empty($result)) {
	
				// On va tester le mot de passe pour voir si on est bon
				if(password_verify($inputPass, $PassMembre)) {
					
					// On lance la connexion :
					
					$_SESSION["idMembre"] = $result["idMembre"];
					$_SESSION["RoleMembre"] = $RoleMembre;
					$_SESSION["PrenomMembre"] = $PrenomMembre;


					// Pour plus de sécurité, on enregistre un token basé sur des variables environnementales
					// HTTP_USER_AGENT retourne l'agent utilisateur du navigateur
					// REMOTE_ADDR retourne l'adresse IP
					// On crypte l'ensemble avec md5 et on enregistre le token en variable de session.
					$_SESSION["token"] = md5($_SERVER["HTTP_USER_AGENT"].$_SERVER["REMOTE_ADDR"]);

					header("location:".URL);
					exit;

				} else {
					// si le mot de passe est faux
					$message = "Identification échouée mdp.";

				}

			} else {
				// l'utilisateur n'existe pas
				$message = "Identification échouée.";

			}

			mysqli_stmt_close($stmt);

		} else {
			echo mysqli_stmt_error($stmt);
		}


	}	

	$form = "
	<form method='POST' action=''>";
	if(isset($message)) {
		$form.="<p>".$message."</p>";
	}

	$form .="
		<form role='form'>
			<h1>
  			<div class='input-group col-sm-10 col-xs-10 col-md-4'>
				<span class='input-group-addon'>
				<i class='glyphicon glyphicon-user red'></i></span>
				<input type='email'  placeholder='adresse mail' name='email' class='form-control' id='email'>
			</div>
			<div class='input-group col-sm-10 col-xs-10 col-md-4'>
				<span class='input-group-addon'>
				<i class='glyphicon glyphicon-lock'></i></span>
				<input type='password' placeholder='Mot de passe' name='pass' class='form-control' id='password'>
			</div>
  			<button type='submit' class='btn btn-default'>Valider</button>
		</form>
	";

	return $form;
		
}

/*
FONCTION DE DECONNEXION
*/

function deconnexion() {
	// On vide le tableau de Session
	$_SESSION = array();
	// On détruit la session
	session_destroy();

	header("location:".URL);
	exit;

}

?>