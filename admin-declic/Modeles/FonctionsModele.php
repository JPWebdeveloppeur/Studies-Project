<?php
/* FONCTIONS GENERIQUES SERVANT POUR LES MODELES

FORMAT URL Cette fonction va permettre de prendre une chaine de caracteres et de la retourner bien formatée pour servir d'URL */

function formatUrl($url) {

	
	$urlFormatee = htmlentities($url);
	
	// on remplace les caractères spéciaux par des entités HTML
	// par exemple : é devient &eacute; à &agrave; ç &ccedil;
    
    $urlFormatee = preg_replace('#&([A-Za-z])(acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $urlFormatee);
    // on remplace les caractères accentués par leur équivalent non accentué

    // pour les ligatures e.g. '&oelig;'
    $urlFormatee = preg_replace('#&([A-Za-z]{2})lig;#', '\1', $urlFormatee); 

    // supprime les autres entités html non basées sur des lettres, par exemple &gt; ou &amp; ou &pi; ou 	&#x003C0; ou &#960;
    $urlFormatee = preg_replace('#&[A-Za-z0-9\#]+;#', '', $urlFormatee); 

    // on passe tout en minuscule
	$urlFormatee = strtolower($urlFormatee);

	// on utilise str_replace pour remplacer les espaces
	$urlFormatee = str_replace(" ", "-", $urlFormatee);

	// on utilise str_replace pour remplacer les guillemets simples
	$urlFormatee = str_replace("'", "-", $urlFormatee);

	// on utilise str_replace pour dédoublonner les --
	$urlFormatee = str_replace("--", "-", $urlFormatee);

	return $urlFormatee;
}
