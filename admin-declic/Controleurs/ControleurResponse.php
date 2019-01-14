<?php
	require(BASEURL . "/Modeles/ModeleSlider.php");

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    // Aprés soumission du formualire on lance le traitement de notre photo
		    $retour = gestionslider();
		}
		
	require(BASEURL . "/Vues/VueResponse.php");
?>