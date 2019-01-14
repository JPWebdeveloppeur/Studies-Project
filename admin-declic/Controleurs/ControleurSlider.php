<?php

require(BASEURL."/Modeles/ModeleSlider.php");

	$lienSuppr = "index.php?page=slider&action=supprimer";	

		if(isset($_GET["action"]) && $_GET["action"] == "supprimer") {
			
			if(isset($_GET["file"])){
				$supp = supprimeImage($_GET["file"]);

			}
			
			header("location:".URL."index.php?page=slider&action=creer");
		}



	
require(BASEURL."/Vues/VueSlider.php");
?>