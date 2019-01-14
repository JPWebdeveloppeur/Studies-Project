<?php
/*
Le controleur sert à déclencher les
actions demandées par les requetes
utilisateur
*/

require("./Modeles/ModeleLudoteque.php");

$pageLudoteque = getContenuById(9);

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$reserform = getreservationform(0);	
} else {
	$reserform = getreservationform(1);	
}

require("./Vues/Vueludoteque.php");


?>