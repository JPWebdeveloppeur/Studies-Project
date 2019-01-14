<?php
/*===========================*\
	Recuperation du contenu
\*===========================*/

	function getContenuById($id) {

		$connect = connect();

		$stmt = mysqli_stmt_init($connect);

		$sql = "SELECT idcontenu, TitreContenu, ssTitreContenu,TexteContenu, LiensContenu FROM contenu WHERE idcontenu = ?";

		if(mysqli_stmt_prepare($stmt, $sql)) {

			mysqli_stmt_bind_param($stmt, "s", $id);

			mysqli_stmt_execute($stmt);

			// On lie les résultats avec des variables
			mysqli_stmt_bind_result(
				$stmt, 
				$idcontenu,
				$Titrecontenu,
				$ssTitreContenu,
				$TexteContenu,
				$LiensContenu

			);

			// on déclare un compteur qui va permettre de créer un tableau multidimensionnel
			$i = 0;

			// avec la fonction while associée à mysqli_stmt_fetch, on va récupérer les résultats de notre requête et on va les stocker dans un tableau $result
			while(mysqli_stmt_fetch($stmt)) {
				$result[$i]["idcontenu"] = $idcontenu;
				$result[$i]["TitreContenu"] = $Titrecontenu;
				$result[$i]["ssTitreContenu"] = $ssTitreContenu;
				$result[$i]["TexteContenu"] = $TexteContenu;
				$result[$i]["LiensContenu"] = $LiensContenu;
				$i++;
			}

			// On regarde si le tableau de résultats est vide.
			if(!empty($result)) {
				// s'il contient des infos, on le retourne
				return $result[0];
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

/*============================================*\
	Traitement du Formulaire de reservation 
\*============================================*/

	function getreservationform(){

		// On teste si la méthode de requête de la page est bien POST (soumission de formulaire)
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			
			// On teste la valeur de $_POST["nom"]
			if(!empty(trim($_POST["nom"]))) {
				$nom = htmlspecialchars($_POST["nom"]);
			} else {
				$erreur = "Le nom n'est pas rempli.";
			}	

			// On teste la valeur de $_POST["prenom"]
			if(!empty(trim($_POST["prenom"]))) {
				$prenom = htmlspecialchars($_POST["prenom"]);
			} else {
				$erreur = "Le prénom n'est pas rempli.";
			}

			// on teste la valeur de $_POST["tel"]
			if(!empty(trim($_POST["telephone"]))) {
    			 if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone'])){
    			// On rend inoffensives les balises HTML que le visiteur a pu entrer
    				 $telephone = htmlspecialchars($_POST['telephone']);
    			}else{
					$erreur ="Le numero de téléphone n'est pas valide";
    			}
			}

			// On teste la valeur de $_POST["mail"]
			if(!empty(trim($_POST["mail"]))) {
				if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
					$mail = htmlspecialchars($_POST["mail"]);
				} else {
					$erreur = "L'email n'est pas conforme.";
				}
			}

			if(!empty(trim($_POST["datedebut"]))){
				if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["datedebut"])){
					 $datedebut = htmlspecialchars($_POST['datedebut']);
					}else{
						$erreur ="La date de début n'est pas au format d'origine";
					}
    		}

    		if(!empty(trim($_POST["datefin"]))){
				if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST["datefin"])){
					 $datefin = htmlspecialchars($_POST['datefin']);
					}else{
						$erreur ="La date de fin n'est pas au format d'origine";
					}
    		}

    		
			// On teste la valeur de $_POST["message"]
			if(!empty(trim($_POST["message"]))) {
				$text = htmlentities($_POST["message"]);
			} else {
				$erreur = "Veuillez ecrire un votre message";
			}

			// Captcha antispam



			//si tout est bien conforme on envoie le mail sinon on affiche une erreur que l'on peut voir ligne 151 
			if(empty($erreur)) {
				
				$to      = 'jpwebdeveloppeur@gmail.com';
				$subject = 'Nouvelle réservation depuis la ludotéque du Site ';
				$message = 'Nom : '.$nom."\r\n".'Prenom : '.$prenom."\r\n".'Adresse Mail : '.$mail."\r\n".'Téléphone : '.$telephone."\r\n"
				.'Début de la location : '.$datedebut."\r\n".'Fin de la location : '.$datefin."\r\n".'Message Client : '.$text;
				$headers = 'From: jpwebdeveloppeur@gmail.com' . "\r\n";

				mail($to, $subject, $message, $headers);

				$valid = "Votre mail a bien été envoyé.";

				$nom = "";
				$prenom = "";
				$mail = "";
				$tel ="";
				$text = "";
			}
		}
			if(!empty($valid)) {
				$form.='<div class="success">'.$valid.'</div>';
			}elseif(!empty($erreur)){
				$form.='<div class="danger">'.$erreur.'</div>';
			}

		$form.='<form method="POST">
		          <label>Votre nom* <br />
		          <input type="text" id="nom" name="nom" value="'.$nom.'" required="required" autofocus placeholder="Votre nom"/></label>
		          <label>Votre prénom* <br />
		          <input type="text" id="prenom" name="prenom" value="'.$prenom.'" required="required" placeholder="Votre prénom"/></label>
		          <label>Votre email*<br />
		          <input type="text" id="mail" name="mail" value="'.$mail.'" required="required" placeholder="Votre mail" /></label>
		          <label>Votre téléphone*<br />
		          <input type="tel" id="telephone" name="telephone" required="required" placeholder="Votre telephone" />
		          </label>
		          <label>Début de la location*<br />
		          	<input readonly type="text" name="datedebut" id="datepicker-from" required="required" placeholder="Début de location" autocomplete="off"/>
		          </label>
		          <label>Fin de la location*<br />
		          	<input readonly type="text" name="datefin" id="datepicker-to" required="required" placeholder="Date de fin de location" autocomplete="off"/>
		          </label></br>
		          <textarea class="ludo" name="message" placeholder="Quels jeux souhaitez-vous louer ?" cols="40" rows="5">'.$text.'</textarea><br />
		          <input class="sub" type="submit"/>
		        </form>';

		return $form;
		
	}
?>