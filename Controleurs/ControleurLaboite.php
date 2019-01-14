<?php
/*
Le controleur sert à déclencher les
actions demandées par les requetes
utilisateur
*/

require("./Modeles/ModeleLa-boite.php");

$aLaBoite = getContenuById(14);

require("./Vues/Vuelaboite.php");


?>