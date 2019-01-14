<?php 
require(BASEURL."/../Modeles/ModeleAccueil.php");

/*=============================*\
	C.R.U.D pour les Articles		
\*=============================*/

	function insertArticle($mode) {

		$erreur = "";

		// AFFICHAGE
		if($mode == 0) {
			$contenu = array(
				"TitreContenu" => "",
				"ssTitreContenu" => "",
				"TexteContenu" => "",
				"LiensContenu" => "",
				"date" => ""

			);

		// MODIFICATION
		} else {

			// on récupère notre tableau de données soumises via la requête POST du formulaire
			extract($_POST);

			var_dump($_POST);

			if(empty($TitreContenu) || strlen(trim($TitreContenu))<3) {
				$erreur = "Merci d'entrer un titre d'au moins trois caractères !";
			}

			if(empty($TexteContenu) || strlen(trim($TexteContenu))<10) {
				$erreur = "Merci d'entrer un contenu d'au moins trente caractères !";
			}

			// on reconstruit le tableau de données du contenu pour l'affichage dans le formulaire en fin de fonction
			$contenu = array(
				"TitreContenu" => $TitreContenu,
				"ssTitreContenu" => $ssTitreContenu,
				"TexteContenu" => $TexteContenu,
				"LiensContenu" => $LiensContenu
			);

		// REQUETE
		if(empty($erreur)) {

			$connect = connect();

			$stmt = mysqli_stmt_init($connect);

			// Requête SQL de mise à jour d'un contenu
			$sql = "INSERT INTO contenu 
					(TitreContenu, ssTitreContenu, TexteContenu, LiensContenu, date )
					VALUES (?, ?, ?, ?, CURDATE())";	

			if(mysqli_stmt_prepare($stmt, $sql)) {

				mysqli_stmt_bind_param($stmt, "ssss", $TitreContenu, $ssTitreContenu, $TexteContenu, $LiensContenu);

				if(!mysqli_stmt_execute($stmt)) {
					// echo mysqli_stmt_error();
				}
				
				mysqli_stmt_close($stmt);

				header("location:".URL."index.php?page=article");

				$id = mysqli_insert_id($connect);

				exit;

				} else {
				echo mysqli_stmt_error($stmt);
				}

			}

			
		}

		// On écrit le formulaire avec les infos préremplies en appelant la fonction getFormcontenu()
		$form = getFormcontenu($contenu, $erreur);
		return $form;
	}

 	/*==============================================================*\
 		Fonction d'affichage du formulaire de création d'un article	
 	\*==============================================================*/

	function getFormcontenu($contenu, $erreur) {

		// On définit les variables comme globales pour pouvoir les récupérer dans la fonction (sinon on aurait une erreur undefined)
		$Titrecontenu = $contenu["TitreContenu"];
		$ssTitrecontenu = $contenu["ssTitreContenu"];
		$Textecontenu = $contenu["TexteContenu"];
		$Lienscontenu = $contenu["LiensContenu"];

		// affcihage d'un titre pour l'edition ou la création d'article via $_GET['id'].
		
		if (empty($_GET['id'])) {
			$form = "<h1>Nouvel article</h1>";
		} else {
			$form = "<h1>Edition de l'article (" .$Titrecontenu. ")</h1>";
		}
	
		if(isset($erreur)) {
			$form.="<p>".$erreur."</p>";
		}


		$form.='
		<form method="POST" action="">
			<article class="col-xs-6 col-sm-6 col-md-6 col-lg-6 module width_full">
				<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
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
						<input type="text" name="TitreContenu" value="'.$Titrecontenu.'" placeholder="Entrer votre Titre" />
					</fieldset>
					<fieldset>
						<label>Sous-Titre</label>
						<input type="text" name="ssTitreContenu" value="'.$ssTitrecontenu.'" placeholder="Entrer votre Sous-Titre" />
					</fieldset>
					<fieldset>
						<label>Liens</label>
						<input type="text" name="LiensContenu" value="'.$Lienscontenu.'" placeholder="Entrer un liens" />
					</fieldset>
					<fieldset class=\'mce-panel\'>
						<textarea rows=12 name="TexteContenu" placeholder="Entrer votre Texte">'.$Textecontenu.'</textarea>
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
/*==============================*\
   	Modifications des articles			
\*==============================*/

	function modifArticle($id, $mode) {

		$erreur = "";

		// AFFICHAGE
		if($mode == 0) {
			$article = getContenuById($id);
			// si l'article n'existe pas (id non trouvée dans la base)
			if(empty($article)) {
				
				return 0;

			} else {
				// on récupère les infos de l'article grâce à la fonction extract qui transforme le tableau de résultats en variables
				extract($article);
			}
		// MODIFICATION
		} else {
			// on récupère notre tableau de données soumises via la requête POST du formulaire
			extract($_POST);


			if(empty($TitreContenu) || strlen(trim($TitreContenu))<3) {
				$erreur = "Merci d'entrer un titre d'au moins trois caractères !";
			}

			if(empty($TexteContenu) || strlen(trim($TexteContenu))<30) {
				$erreur = "Merci d'entrer un contenu d'au moins trente caractères !";
			}

			// on reconstruit le tableau de données de l'article pour l'affichage dans le formulaire en fin de fonction
			$article = array(
				"TitreContenu" => $TitreContenu,
				"ssTitreContenu" => $ssTitreContenu,
				"TexteContenu" => $TexteContenu,
				"LiensContenu" => $LiensContenu,
				"dateModif" => $dateModif

				
			);

			// ON PASSE A LA REQUETE
			if(empty($erreur)) {


				$connect = connect();

				$stmt = mysqli_stmt_init($connect);

				// Requête SQL de mise à jour d'un article
				$sql = "UPDATE contenu SET TitreContenu = ?, ssTitreContenu = ?, TexteContenu = ?, LiensContenu = ?, dateModif = SYSDATE() WHERE idcontenu = ?";

				
				if(mysqli_stmt_prepare($stmt, $sql)) {

					mysqli_stmt_bind_param($stmt, "ssssi", $TitreContenu, $ssTitreContenu, $TexteContenu, $LiensContenu, $id);

					if(!mysqli_stmt_execute($stmt)) {
						// $erreur = mysqli_stmt_error($stmt);
						$erreur = "la requête n'a pas pu être exécutée.";	
					} else {
						$erreur .= "<h4 class='alert_success'>L'article a bien été mise à jour.</h4>";
					}

					mysqli_stmt_close($stmt);
					
					header("location:".URL."index.php?page=article");

				} else {
					echo mysqli_stmt_error($stmt);
				}

			}
			

		}
		
		// On écrit le formulaire avec les infos préremplies en appelant la fonction getFormActu()
		$form = getFormcontenu($article, $erreur);
		return $form;

	}
/*=============================*\
	 Suppresion des articles
\*=============================*/
	function deleteArticle($id) {
		// 1 - on vérifie l'existence de l'article avant suppression
		// Pour cela on utilise la fonction getcontenuById
		// si elle retourne 0, elle est donc vide, on redirige vers la liste des article
		if(empty($article = getContenuById($id))) {
			header("location:".URL."index.php?page=article&message=1");
			exit;
		}

		$connect = connect();

		$stmt = mysqli_stmt_init($connect);

		// Requête SQL de suppression d'un membre
		$sql = "DELETE FROM contenu WHERE idcontenu = ?";

		if(mysqli_stmt_prepare($stmt, $sql)) {

			mysqli_stmt_bind_param($stmt, "i", $id);

			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			header("location:".URL."index.php?page=article&message=0");

		} else {
			echo mysqli_stmt_errror($stmt);
		}
	}

       	   
?>