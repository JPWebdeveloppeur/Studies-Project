<?php

/*============================*\
	Recuperation  du contenu
\*============================*/

	function getContenuById($id) {

		$connect = connect();

		$stmt = mysqli_stmt_init($connect);

		$sql = "SELECT idcontenu, TitreContenu, ssTitreContenu,TexteContenu, LiensContenu FROM contenu WHERE idcontenu = ?";

		if(mysqli_stmt_prepare($stmt, $sql)) {

			mysqli_stmt_bind_param($stmt, "i", $id);

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

?>