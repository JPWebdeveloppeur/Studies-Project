<?php
/*
Le controleur sert à déclencher les
actions demandées par les requetes
utilisateur
*/

require("./Modeles/ModeleNsconnaitre.php");

$txtnsconnaitre = getContenuById(6);
$equipe = getContenuById(26);
$localis = getContenuById(27);

require("./Vues/Vuenousconnaitre.php");


?>