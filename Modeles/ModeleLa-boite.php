<?php
/*=============================================*\
	Lister l'intégralité de la table Contenu 
\*=============================================*/

	function listeContenu() {
		
		$connect = connect();

		 $sql = "SELECT idcontenu,TitreContenu, ssTitreContenu, TexteContenu,LiensContenu,date, dateModif From contenu";
		
		if($result = mysqli_query($connect, $sql)) {

			$resultats = array();
			// on initialise un compteur
			$i = 0;
			
		    while ($row = mysqli_fetch_assoc($result)) {
		    	
		    	$resultats[$i]["idcontenu"] = $row["idcontenu"];
		    	$resultats[$i]["TitreContenu"] = $row["TitreContenu"];
		    	$resultats[$i]["ssTitreContenu"] = $row["ssTitreContenu"];
		    	$resultats[$i]["TexteContenu"] = $row["TexteContenu"];
		    	$resultats[$i]["LiensContenu"] = $row["LiensContenu"];
		    	$resultats[$i]["date"] = $row["date"];
		    	$resultats[$i]["dateModif"] = $row["dateModif"];
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
/*============================*\
	Recuperation du contenu 
\*============================*/

function getContenuById($id) {

	$connect = connect();

	$stmt = mysqli_stmt_init($connect);

	$sql = "SELECT idcontenu, TitreContenu, ssTitreContenu,TexteContenu, LiensContenu, date, dateModif  FROM contenu WHERE idcontenu = ?";

	if(mysqli_stmt_prepare($stmt, $sql)) {

		mysqli_stmt_bind_param($stmt, "i", $id);

		mysqli_stmt_execute($stmt);

		// On lie les résultats avec des variables
		mysqli_stmt_bind_result(
			$stmt, 
			$idcontenu,
			$TitreContenu,
			$ssTitreContenu,
			$TexteContenu,
			$LiensContenu,
			$date,
			$dateModif

		);

		// on déclare un compteur qui va permettre de créer un tableau multidimensionnel
		$i = 0;

		// avec la fonction while associée à mysqli_stmt_fetch, on va récupérer les résultats de notre requête et on va les stocker dans un tableau.
		while(mysqli_stmt_fetch($stmt)) {
			$result[$i]["idcontenu"] = $idcontenu;
			$result[$i]["TitreContenu"] = $TitreContenu;
			$result[$i]["ssTitreContenu"] = $ssTitreContenu;
			$result[$i]["TexteContenu"] = $TexteContenu;
			$result[$i]["LiensContenu"] = $LiensContenu;
			$result[$i]["date"] = $date;
			$result[$i]["dateModif"] = $dateModif;
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
/*====================================*\
	 fonction pour lister les videos
\*====================================*/

	function listevideo() {
		// on appelle la fonction connect() qu'on a définie dans appConf.php
		// pour récupérer l'objet de connexion mysqli
		$connect = connect();

		// On rédige notre requête simple
		 $sql = "SELECT idvideo, TitreVideo, LiensVideo, DescriptionVideo  FROM video ";
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
		    	$resultats[$i]["idvideo"] = $row["idvideo"];
		    	$resultats[$i]["TitreVideo"] = $row["TitreVideo"];
		    	$resultats[$i]["LiensVideo"] = $row["LiensVideo"];
		    	$resultats[$i]["DescriptionVideo"] = $row["DescriptionVideo"];
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
/*==========================*\
	Recuperation des video 
\*==========================*/

	function getVideocatById($id) {

		$connect = connect();

		$stmt = mysqli_stmt_init($connect);

		$sql = "SELECT idvideo, TitreVideo, LiensVideo, DescriptionVideo FROM video WHERE idvideo = ?";

		if(mysqli_stmt_prepare($stmt, $sql)) {

			mysqli_stmt_bind_param($stmt, "i", $id);

			mysqli_stmt_execute($stmt);

			// On lie les résultats avec des variables
			mysqli_stmt_bind_result(
				$stmt, 
				$idvideo,
				$TitreVideo,
				$LiensVideo,
				$DescriptionVideo

			);

			// on déclare un compteur qui va permettre de créer un tableau multidimensionnel
			$i = 0;

			// avec la fonction while associée à mysqli_stmt_fetch, on va récupérer les résultats de notre requête et on va les stocker dans un tableau $result
			while(mysqli_stmt_fetch($stmt)) {
				$result[$i]["idvideo"] = $idvideo;
				$result[$i]["TitreVideo"] = $TitreVideo;
				$result[$i]["LiensVideo"] = $LiensVideo;
				$result[$i]["DescriptionVideo"] = $DescriptionVideo;
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