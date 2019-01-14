<?php

require(BASEURL."/../Modeles/ModeleAccueil.php");

/*==============================*\
	C.R.U.D pour les Actualités		
\*==============================*/

	function insertActus($mode) {

		$erreur = "";

		// AFFICHAGE
		if($mode == 0) {
			$actus = array(
				"TitreActus" => "",
				"TexteActus" => "",
				"date" => ""

			);

		// MODIFICATION
		} else {

			// on récupère notre tableau de données soumises via la requête POST du formulaire
			extract($_POST);

			var_dump($_POST);

			if(empty($TitreActus) || strlen(trim($TitreActus))<3) {
				$erreur = "Merci d'entrer un titre d'au moins trois caractères !";
			}

			if(empty($TexteActus) || strlen(trim($TexteActus))<10) {
				$erreur = "Merci d'entrer un contenu d'au moins trente caractères !";
			}

			// on reconstruit le tableau de données du contenu pour l'affichage dans le formulaire en fin de fonction
			$actus = array(
				"TitreActus" => $TitreActus,
				"TexteActus" => $TexteActus
			);

		// REQUETE
		if(empty($erreur)) {

			$connect = connect();

			$stmt = mysqli_stmt_init($connect);

			// Requête SQL de mise à jour d'un contenu
			$sql = "INSERT INTO actualites 
					(TitreActus, TexteActus, date )
					VALUES (?, ?, CURDATE())";	

			if(mysqli_stmt_prepare($stmt, $sql)) {

				mysqli_stmt_bind_param($stmt, "ss", $TitreActus, $TexteActus);

				if(!mysqli_stmt_execute($stmt)) {
					// echo mysqli_stmt_error();
				}
				
				mysqli_stmt_close($stmt);

				header("location:".URL."index.php?page=actu");

				$id = mysqli_insert_id($connect);

				exit;

				} else {
				echo mysqli_stmt_error($stmt);
				}

			}

			
		}

		// On écrit le formulaire avec les infos préremplies en appelant la fonction getFormcontenu()
		$form = getFormactus($actus, $erreur);
		return $form;
	}

 	/*==================================================================*\
 		Fonction d'affichage du formulaire de création d'une actualités	
 	\*==================================================================*/


	function getFormactus($actus, $erreur) {

		// On définit les variables comme globales pour pouvoir les récupérer dans la fonction (sinon on aurait une erreur undefined)
		$TitreActus = $actus["TitreActus"];
		$TexteActus = $actus["TexteActus"];

		// affcihage d'un titre pour l'edition ou la création d'article via $_GET['id'].
		
		if (empty($_GET['id'])) {
			$form = "<h1>Nouvelle actualité</h1>";
		} else {
			$form = "<h1>Edition de l'actualité (" .$TitreActus. ")</h1>";
		}
	
		if(isset($erreur)) {
			$form.="<p>".$erreur."</p>";
		}


		$form.='
		<form method="POST" action="">
			<article class="col-xs-6 col-sm-6 col-md-6 col-lg-6 module width_full">
				<script src="//tinymce.cachefly.net/4.3/tinymce.min.js"></script>
				  <script>tinymce.init({
					  selector: "textarea",  // change this value according to your HTML
					  plugins: "code",
					  menu: {
					    edit: {title: "Editer", items: " | cut copy paste | selectall"},
					    tools: {title: "Html", items: " | code"},
					    format: {title:"Format", items: "bold italic underline |"},
					  }
					  
					});</script>
				<div class="module_content">
					<fieldset>
						<label>Titre</label>
						<input type="text" name="TitreActus" value="'.$TitreActus.'" placeholder="Entrer votre Titre" />
					</fieldset>
					<fieldset class=\'mce-panel\'>
						<textarea rows=12 name="TexteActus" placeholder="Entrer votre Texte">'.$TexteActus.'</textarea>
					</fieldset>
				</div>';
		$form .='	
				<footer>
					<div class="submit_link">
						<input type="submit" value="Publier" class="alt_btn">
					</div>
				</footer>
			</article>
		</form>
		';

		return $form;
	}
/*===============================*\
   	Modifications des actualités			
\*===============================*/

	function modifActus($id, $mode) {

		$erreur = "";

		// AFFICHAGE
		if($mode == 0) {
			$actus = getActuById($id);
			// si l'article n'existe pas (id non trouvée dans la base)
			if(empty($actus)) {
				
				return 0;

			} else {
				// on récupère les infos de l'article grâce à la fonction extract qui transforme le tableau de résultats en variables
				extract($actus);
			}
		// MODIFICATION
		} else {
			// on récupère notre tableau de données soumises via la requête POST du formulaire
			extract($_POST);


			if(empty($TitreActus) || strlen(trim($TitreActus))<3) {
				$erreur = "Merci d'entrer un titre d'au moins trois caractères !";
			}

			if(empty($TexteActus) || strlen(trim($TexteActus))<30) {
				$erreur = "Merci d'entrer un contenu d'au moins trente caractères !";
			}

			// on reconstruit le tableau de données de l'article pour l'affichage dans le formulaire en fin de fonction
			$actus = array(
				"TitreActus" => $TitreActus,
				"TexteActus" => $TexteActus,
				"dateModif" => $dateModif
	
			);

			// ON PASSE A LA REQUETE
			if(empty($erreur)) {


				$connect = connect();

				$stmt = mysqli_stmt_init($connect);

				// Requête SQL de mise à jour d'un article
				$sql = "UPDATE actualites SET TitreActus = ?, TexteActus = ?, dateModif = SYSDATE() WHERE idactus = ?";

				
				if(mysqli_stmt_prepare($stmt, $sql)) {

					mysqli_stmt_bind_param($stmt, "ssi", $TitreActus, $TexteActus, $id);

					if(!mysqli_stmt_execute($stmt)) {
						// $erreur = mysqli_stmt_error($stmt);
						$erreur = "la requête n'a pas pu être exécutée.";	
					} else {
						$erreur .= "<h4 class='alert_success'>L'actualités a bien été mise à jour.</h4>";
					}

					mysqli_stmt_close($stmt);
					
					header("location:".URL."index.php?page=actu");

				} else {
					echo mysqli_stmt_error($stmt);
				}

			}
			

		}
		
		// On écrit le formulaire avec les infos préremplies en appelant la fonction getFormActu()
		$form = getFormactus($actus, $erreur);
		return $form;

	}
/*=============================*\
	Suppresion des actualités
\*=============================*/
	function deleteActus($id) {
		// 1 - on vérifie l'existence de l'article avant suppression
		// Pour cela on utilise la fonction getcontenuById
		// si elle retourne 0, elle est donc vide, on redirige vers la liste des article
		if(empty($actus = getActuById($id))) {
			header("location:".URL."/index.php?page=actu&message=1");
			exit;
		}

		$connect = connect();

		$stmt = mysqli_stmt_init($connect);

		// Requête SQL de suppression d'un membre
		$sql = "DELETE FROM actualites WHERE idactus = ?";

		if(mysqli_stmt_prepare($stmt, $sql)) {

			mysqli_stmt_bind_param($stmt, "i", $id);

			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			header("location:".URL."index.php?page=actu&message=0");

		} else {
			echo mysqli_stmt_errror($stmt);
		}
	}
    	   
?>