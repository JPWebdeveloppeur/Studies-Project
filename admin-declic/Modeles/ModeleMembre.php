<?php

	if(!function_exists("formatUrl")) {
		require("FonctionsModele.php");	
	}

	function listMembres() {

		// on appelle la fonction connect() qu'on a définie dans appConf.php
		// pour récupérer l'objet de connexion mysqli
		$connect = connect();

		// On rédige notre requête simple

		$sql = "SELECT idMembre, NomMembre, PrenomMembre, RoleMembre FROM membres";

		// on lance la requête grace à mysqli_query et on stocke directement son résultat dans une variable $result
		if($result = mysqli_query($connect, $sql)) {

			// on crée un tableau $resultats pour regrouper les données bien formatées avant de les renvoyer
			$resultats = array();
			// on initialise un compteur
			$i = 0;
			// Avec la fonction mysqli_fetch_assoc on récupère les données de chaque ligne sous la forme d'un tableau.
			// on boucle sur cette fonction pour parcourir tout notre résultat
		    while ($row = mysqli_fetch_assoc($result)) {
		    	// a chaque résultat, on récupère le nom, et on le stocke dans une nouvelle ligne de notre tableau $resultats
		    	$resultats[$i]["NomMembre"] = $row["NomMembre"];
		    	$resultats[$i]["idMembre"] = $row["idMembre"];
		    	$resultats[$i]["PrenomMembre"] = $row["PrenomMembre"];
		    	$resultats[$i]["lien"] = formatUrl($row["NomMembre"]."-".$row["PrenomMembre"]."-".$row["idMembre"]);
		        $resultats[$i]["RoleMembre"] = getRole($row["RoleMembre"]);
		        $i++;
		    }

		    // une fois les résultats récupérés, on les retourne.
		    return $resultats;

		    /* Libération des résultats */
		    mysqli_free_result($result);

		} else {
			// mysqli_stmt_error permet d'afficher les erreurs concernant la requête
			// A commenter en prod
			echo "probleme : ".mysqli_stmt_errno($stmt)." / ".mysqli_stmt_error($stmt);
		}

	}

///// DEFINITION DES ROLES

	function getRole($RoleMembre) {
		$roles = array(
			"0" => "Editeur",
			"999" => "Admin",
		);	
		return $RoleMembre;
	}

	function listRoles() {
		$roles = array(
			"0" => "Editeur",
			"999" => "Admin",

		);	
		return $roles;
	}

/* Fonction getMembreById
	paramètre : id du membre
	La fonction lance un select dans la base et retourne les infos du membre */
	function getMembreById($id) {

		// on appelle la fonction connect() qu'on a définie dans appConf.php
		// pour récupérer l'objet de connexion mysqli
		$connect = connect();

		// On initialise une requête préparée
		$stmt = mysqli_stmt_init($connect);

		// On rédige notre requête préparée.
		// C'est une requête SELECT utilisant la clause WHERE
		$sql = "SELECT idMembre, NomMembre, PrenomMembre, MailMembre, RoleMembre FROM membres 
				WHERE idMembre = ?";

		// on prépare la requête de select d'un membre
		if(mysqli_stmt_prepare($stmt, $sql)) {

			// On lie les données à envoyer avec la requête préparée
			mysqli_stmt_bind_param($stmt, "i", $id);

			// On exécute notre requête
			if(!mysqli_stmt_execute($stmt)) {
				// A commenter en prod
				echo "probleme : ". mysqli_stmt_error($stmt);
			}

			// On lie les résultats avec des variables
			mysqli_stmt_bind_result(
				$stmt, 
				$idMembre, 
				$NomMembre, 
				$PrenomMembre, 
				$MailMembre, 
				$RoleMembre 
			);

			// on déclare un compteur qui va permettre de créer un tableau multidimensionnel
			$i = 0;

			// avec la fonction while associée à mysqli_stmt_fetch, on va récupérer les résultats de notre requête et on va les stocker dans un tableau $result
			while(mysqli_stmt_fetch($stmt)) {
				$result[$i]["idMembre"] = $idMembre;  
				$result[$i]["NomMembre"] = $NomMembre;  
				$result[$i]["PrenomMembre"] = $PrenomMembre;  
				$result[$i]["MailMembre"] = $MailMembre;  
				$result[$i]["RoleMembre"] = getRole($RoleMembre);
				$i++;
			}

			// On regarde si le tableau de résultats est vide.
			if(!empty($result)) {
				// s'il contient des infos, on le retourne
				return $result;
			} else {
				// s'il est vide, on retourne 0
				return 0;
			}

			// on referme la requête préparée.
			mysqli_stmt_close($stmt);

		} else {
			// mysqli_stmt_error permet d'afficher les erreurs concernant la requête
			// A commenter en prod
			echo "probleme : ".mysqli_stmt_errno($stmt)." / ".mysqli_stmt_error($stmt);
		}

	}

/* 	FONCTION DE CREATION D'UN MEMBRE
		$mode > mode d'utilisation de la fonction
		si mode == 0 : affichage
		si mode == 1 : modification */

	function insertMembre($mode, $idMembre) {

	
		// AFFICHAGE
		if($mode == 0) {
			$idMembre = "";
			$NomMembre = "";
			$PrenomMembre = "";
			$MailMembre = "";
			$RoleMembre = "";
		
		// MODIFICATION
		} else {

			// On commence par analyser nos données soumises
			extract($_POST);

			$NomMembre = htmlspecialchars($NomMembre);
			if(empty($NomMembre)) {
				$erreur = "Le nom est vide !";
			}

			$PrenomMembre = htmlspecialchars($PrenomMembre);
			if(empty($PrenomMembre)) {
				$erreur = "Le prénom est vide !";
			}

			$MailMembre = htmlspecialchars($MailMembre);
			if(!filter_var($MailMembre, FILTER_VALIDATE_EMAIL)) {
				$erreur = "L'adresse email n'est pas valide !";
			}
			if($PassMembre1 != $PassMembre2) {
				$erreur = "Les mots de passe ne concordent pas !";
			} else {
				// On crée un mot de passe avec la fonction password_hash
				$newPass = password_hash($PassMembre1,  PASSWORD_DEFAULT);
			}

			// LES DONNEES SONT ANALYSEES
			if(empty($erreur)) {
				// si on n'a pas d'erreur, on va pouvoir lancer notre requête de mise à jour dans la BDD.

				$connect = connect();

				$stmt = mysqli_stmt_init($connect);

				// Requête SQL d'insert
				$sql = "INSERT INTO membres 
						(NomMembre, PrenomMembre, MailMembre, RoleMembre, PassMembre)
						VALUES (?, ?, ?, ?, ?)";

				if(mysqli_stmt_prepare($stmt, $sql)) {

					mysqli_stmt_bind_param($stmt, "sssis", $NomMembre, $PrenomMembre, $MailMembre, $RoleMembre, $newPass);

					if(!mysqli_stmt_execute($stmt)) {
						// A commenter en prod
						//echo "probleme : ". mysqli_stmt_error();
					}

					// on récupère l'identifiant de l'insertion en BDD
					$id = mysqli_insert_id($connect);

					mysqli_stmt_close($stmt);

						$ajoutsucces = "Le membre a bien été ajouter.";

				} else {
					echo mysqli_stmt_error($stmt);
				}
			}

		}

		// On écrit le formulaire avec les infos pré-remplies

		$form.="<form method='POST' action=''>";
			if(isset($idMembre)) {
				$form.='<input type="hidden" name="idProvisoire" value="'.$idMembre.'" />';
			}

		$form.='<div class="container">
					<div class="row">
						<article class="col-xs-6 col-sm-6 col-md-6 col-lg-6 module width_full">
							<h1>Ajout d\'un nouveau membre</h1>';
								if(!empty($ajoutsucces)) {
									$form.="<h4 id='alert_success'>".$ajoutsucces."</h4>";
								}elseif(!empty($erreur)){
									$form.="<h4 id='alert'>".$erreur."</h4>";
								}
					$form.='<div class="formulaire">
								<input type="text" name="NomMembre" value="'.$NomMembre.'" placeholder="Nom" class="Nom"/></br>
								<input type="text" name="PrenomMembre" value="'.$PrenomMembre.'" placeholder="Prénom" class="Prenom" /></br>
								<input type="text" name="MailMembre" value="'.$MailMembre.'" placeholder="Adresse Email" class="addmail" /></br>
								<input type="password" name="PassMembre1" class="Pass1" placeholder="Mot de pass" /></br>
								<input type="password" name="PassMembre2" class="Pass2" placeholder="Confirmez Mot de pass" />
							</div>
							<div class="role">
								<select name="RoleMembre" class="RoleMembre">';
								$RoleMembre = listRoles();
									foreach ($RoleMembre as $codeRole => $nomRole) {
									$form.= "<option value=".$codeRole.">".$nomRole."</option>";
									}
						$form.="</select>
							</div>
							<button type='submit' class='alt_btn'>Publier</button>
						</article>
					</div>
				</div>";

		return $form;

	}

/* FONCTION DE MODIF D'UN MEMBRE $id > id du membre
	$mode > mode d'utilisation de la fonction
	si mode == 0 : affichage
	si mode == 1 : modification */

	function modifMembre($id, $mode) {

		// AFFICHAGE
		if($mode == 0) {
			// on récupère le membre
			$membre = getMembreById($id)[0];

			// si le membre n'existe pas
			if(empty($membre)) {
				return 0;
			} else {
				// Récupération des infos du membre pour affichage
				extract($membre);

			}
		// MODIFICATION
		} else {

			// On commence par analyser nos données soumises
			extract($_POST);


			$NomMembre = htmlspecialchars($NomMembre);
			if(empty($NomMembre)) {
				$erreur = "Le nom est vide !";
			}

			$PrenomMembre = htmlspecialchars($PrenomMembre);
			if(empty($PrenomMembre)) {
				$erreur = "Le prénom est vide !";
			}

			$MailMembre = htmlspecialchars($MailMembre);
			if(!filter_var($MailMembre, FILTER_VALIDATE_EMAIL)) {
				$erreur = "L'adresse email n'est pas valide !";
			}

			// LES DONNEES SONT ANALYSEES
			if(empty($erreur)) {
				// si on n'a pas d'erreur, on va pouvoir lancer notre requête de mise à jour dans la BDD.


				$connect = connect();

				$stmt = mysqli_stmt_init($connect);
				//NomMembre, PrenomMembre, MailMembre, RoleMembre, PassMembre
				// Requête SQL de mise à jour d'un membre
				$sql = "UPDATE membres 
						SET NomMembre = ?, PrenomMembre = ?, MailMembre = ?, RoleMembre = ? 
						WHERE idMembre = ?";

				if(mysqli_stmt_prepare($stmt, $sql)) {

					mysqli_stmt_bind_param($stmt, "sssii", $NomMembre, $PrenomMembre, $MailMembre, $RoleMembre, $id);

					if(!mysqli_stmt_execute($stmt)) {
						// A commenter en prod
						//echo "probleme : ". mysqli_stmt_error();
					}

					mysqli_stmt_close($stmt);

					$succes = "Le membre a bien été mis à jour.";

				} else {
					echo mysqli_stmt_error($stmt);
				}
			}

		}

		// On écrit le formulaire avec les infos pré-remplies


		$form ="
		<div class='container'>
			<div class='row'>
				<article class='col-xs-6 col-sm-6 col-md-6 col-lg-6 module width_full'>
					<h1>Modifier la fiche Membre : ".$PrenomMembre." ".$NomMembre."</h1>";
					if(!empty($succes)) {
						$form.="<h4 id='alert_success'>".$succes."</h4>";
					}elseif(!empty($erreur)){
						$form.="<h4 id='alert'>".$erreur."</h4>";
					}

			$form.="<div class='formulaire'>
						<form method='POST' action=''>
							<input type='text' name='NomMembre' value='".$NomMembre."' placeholder='Nom' class='ModNom' /><br />
							<input type='text' name='PrenomMembre' value='".$PrenomMembre."' placeholder='Prénom' class='ModPrenom' /><br />
							<input type='text' name='MailMembre' value='".$MailMembre."' placeholder='Adresse Email' class='ModMail' /><br />
							<select name='RoleMembre' class='ModifRole'>";
								$roles = listRoles();
									foreach ($roles as $codeRole => $nomRole) {
										// si $RoleMembre est égale a Coderole alors on selectionne le numero du role correspondant dans le cas contraire on affiche le nom des roles.
										if($RoleMembre == $codeRole) {
											$form.= "<option value=".$codeRole." selected>".$nomRole."</option>";		
										} else {
											$form.= "<option value=".$codeRole.">".$nomRole."</option>";	
										}
									}
					$form.="</select><br />
							<button type='submit' class='alt_btn'>Publier</button>
						</form>
					</div>
				</article>
			</div>
		</div>";

		return $form;
	}

/* FONCTION DE SUPPRESSION D'UN MEMBRE $id > id du membre */

	function deleteMembre($id) {

		// 1 - on vérifie l'existence du membre avant suppression
		// Pour cela on utilise la fonction getMembreById
		// si elle retourne 0, elle est donc vide, on redirige vers la liste des membres
		if(empty($membre = getMembreById($id))) {
			header("location:".URL."index.php?page=membre&message=1");
			exit;
		}

		$connect = connect();

		$stmt = mysqli_stmt_init($connect);

		// Requête SQL de suppression d'un membre
		$sql = "DELETE FROM membres WHERE idMembre = ?";

		if(mysqli_stmt_prepare($stmt, $sql)) {

			mysqli_stmt_bind_param($stmt, "i", $id);

			if(!mysqli_stmt_execute($stmt)) {
				// A commenter en prod
				// echo "probleme : ". mysqli_stmt_error();
			}

			mysqli_stmt_close($stmt);

			if($id == $_SESSION["idmembre"]) {
				$_SESSION = array();
				session_destroy();
				header("location:".URL."/..");
				exit;
			} else {
				header("location:".URL."index.php?page=membre&message=0");			
			}

		} else {
			echo mysqli_stmt_error($stmt);
		}
	} 


?>