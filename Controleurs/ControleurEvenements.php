<?php
/*
Le controleur sert à déclencher les
actions demandées par les requetes
utilisateur
*/

require("./Modeles/ModeleEvenements.php");

$pageEvenements = getContenuById(3);
$galerie = getContenuById(25);
if($_SERVER["REQUEST_METHOD"] == "POST") {

	$monform = getmonform(0);	
} else {
	$monform = getmonform(1);	
}

require("./Vues/Vueevenements.php");


?>