<?php 
	
/*====================================*\
	 Gestion du slider d'accueil
\*====================================*/
// function wd_remove_accents($str)
// {
//     $str = str_replace('á', 'a', $str);
//     $str = str_replace('à', 'a', $str);
//     $str = str_replace('â', 'a', $str);
//     $str = str_replace('ä', 'a', $str);
//     $str = str_replace('ã', 'a', $str);
//     $str = str_replace('å', 'a', $str);
//     $str = str_replace('ç', 'c', $str);
//     $str = str_replace('é', 'e', $str);
//     $str = str_replace('é', 'e', $str);
//     $str = str_replace('ê', 'e', $str);
//     $str = str_replace('ë', 'e', $str);
//     $str = str_replace('í', 'i', $str);
//     $str = str_replace('î', 'i', $str);
//     $str = str_replace('ï', 'i', $str);
//     $str = str_replace('ñ', 'n', $str);
//     $str = str_replace('ó', 'o', $str);
//     $str = str_replace('ò', 'o', $str);
//     $str = str_replace('ô', 'o', $str);
//     $str = str_replace('ö', 'o', $str);
//     $str = str_replace('õ', 'o', $str);
//     $str = str_replace('ú', 'u', $str);
//     $str = str_replace('ù', 'u', $str);
//     $str = str_replace('û', 'u', $str);
//     $str = str_replace('ü', 'u', $str);
//     $str = str_replace('ý', 'y', $str);
//     $str = str_replace('ÿ', 'y', $str);
    
//     return $str;
// }

function gestionslider() {


	if(isset($_FILES["slider"]) && !empty($_FILES["slider"]["name"])) {
		// on lance les tests sur le code erreur

		$error = $_FILES["slider"]["error"];
		$monErreur = "";

		switch($error) {
			case '1';
				$monErreur = "Erreur :  le fichier est trop lourd ! ";
				break;
			case '2';
				$monErreur = "Erreur :  le fichier est trop lourd ! ";
				break;
			case '3';
				$monErreur = "Erreur :  Problème au cours du téléchargement ";
				break;
			case '4';
				$monErreur = "Erreur :  Pas de photo à télécharger ";
				break;
			case '6';
				$monErreur = "Erreur :  Téléchargement échoué à cause d'une erreur serveur. ";
				break;
			case '7';
				$monErreur = "Erreur :  La photo n'a pas pu être enregistrée.";
				break;
			case '8';
				$monErreur = "Erreur :  Téléchargement échoué à cause d'une erreur serveur. ";
				break;				
		}

		// si on n'a pas d'erreur à l'upload, on continue
		if(empty($monErreur)) {

			// on récupère le nom du fichier chez l'utilisateur
			$nomFichier = $_FILES["slider"]["name"];

			// on récupère le nom du fichier temporaire
			$tmpFile = $_FILES["slider"]["tmp_name"];	

			// On utilise la fonction getimagesize pour récupérer le "vrai" type Mime du fichier téléchargé.
			$ext = getimagesize($tmpFile)["mime"];

			// On utilise aussi cette fonction pour récupérer les dimensions du fichier téléchargé (largeur et hauteur).
			$width = getimagesize($tmpFile)[0];
			$height = getimagesize($tmpFile)[1];


			// on crée un tableau contenant les types mimes qu'on va gérer.
			$listeMime = array(
				"gif" 	=> "image/gif",
				"jpg" 	=> "image/jpeg",
				"jpeg" 	=> "image/pjpeg",
				"png" 	=> "image/png"
			);

			// on va tester si notre fichier a un type mime cohérent.
			if(!in_array($ext, $listeMime)) {
				return buildResponse('<div class="progress-bar-warning">Cette extension de fichier n\'est pas supportée par notre site !</div>');
			} else {
				// l'extension est bien valide, on continue

				// on se sert de notre tableau pour réécrire une extension de fichier correcte suivant son type Mime.
				$extension = ".".array_search($ext, $listeMime);

				// on va tester notre type Mime pour effectuer les fonctions correspondantes
				switch($ext) {
					case "image/gif":
						$image_create = "imagecreatefromgif";
						$image = "imagegif";
						break;

					case "image/png":
						$image_create = "imagecreatefrompng";
						$image = "imagepng";
						$quality = 7;	
						break;

					case "image/jpeg":
						$image_create = "imagecreatefromjpeg";
						$image = "imagejpeg";
						$quality = 80;
						break;

					case "image/pjpeg":
						$image_create = "imagecreatefromjpeg";
						$image = "imagejpeg";
						$quality = 72;
						break;
				}

				$srcImg = $image_create($tmpFile);
				
				// on crée le dossier de destination du fichier
				$dossierDest = __DIR__."/../../img/carousel/";

				// on teste si notre dossier de destination existe bien sur notre serveur
				if(!is_dir($dossierDest)) {
					// si ce n'est pas le cas, on le crée à la volée
					mkdir($dossierDest, 0777, true);
				} 
				$vowels = array(" ","__",".");
				$name = trim(htmlEntities($_POST["name"]));
				$name = str_replace($vowels, "_", $name);
				// $name = wd_remove_accents($name);
				$newsname =$name.uniqid().$extension;
				// On va enregistrer l'image envoyée par l'utilisateur
				$result = move_uploaded_file($tmpFile, $dossierDest.$newsname);

				// On retourne un message de confirmation pour confirmer que l'upload s'est bien déroulé.
				if ($result) {
				    //return updateStatus('<div class="progress-bar-success">Le téléchargement de l\'image a bien été effectué.</div>');
                    return buildResponse('<div class="progress-bar-success">Le téléchargement de l\'image a bien été effectué.</div>', '<div class="col-lg-3 col-md-4 col-xs-4 thumbadmin"><a href="index.php?page=slider&amp;action=supprimer&amp;file=' . $newsname . '" class="supprPhoto"><img class="img-responsive" src="/img/carousel/' . $newsname . '" alt="'. $newsname . '" height="210" width="300"></a></div>');
                }

			}

		} else {
			return buildResponse('<div class="progress-bar-error">'.$monErreur.'</div>');
		}
	}

	return buildResponse();
}
// /* FONCTION DE SUPPRESSION D'UNE IMAGE a faire  */
// Pour cette fonction de supression on va lui passer un parametre $nom_file qui lui nous donneras le bon nom du fichier a delete

function supprimeImage($nom_file) {

	$dir =BASEURLimg;
	// ouverture du dossier 
	if($dh = opendir($dir)){
		// suppression du bon fichier
		@unlink($dir.$nom_file);
		//fermeture du dossier
		closedir($dh);
	}

	return buildResponse('<div class="progress-bar-error">delete du mess !</div>');
}

function buildResponse($status = '<div class="progress-bar-error">Merci d\'envoyer un fichier !</div>', $slider ='') {
    return [
        'slider' => $slider,
        'status' => $status,
    ];
}
?>