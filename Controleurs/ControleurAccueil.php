<?php
/*
Le controleur sert à déclencher les
actions demandées par les requetes
utilisateur
*/

require("./Modeles/ModeleAccueil.php");

$ContenuJeux = getContenuById(1);
$Contenuboutique = getContenuById(2);
$ContenuEvenements = getContenuById(8);
$Contenuloca = getContenuById(4);
$LaBoite = getContenuById(10);
$partenaires = getContenuById(5);

$listeActu = listeActus();
$listeCont = listeContenu();

require("./Vues/VueAccueil.php");
?>