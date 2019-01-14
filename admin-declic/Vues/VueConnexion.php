<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>DéclicLudik</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- liaison au different fichiers css -->
    <link href="../css/bootstrap.css" rel="stylesheet"><!-- Pour la fin de dev pense a remttre le fichier Bootstrap.min.css -->
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/styleback.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 8]> 
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> 
  <![endif]-->
</head>
<body>
<div class="container-fluid">
	<div class="row">
      <div class="col-xs-6 col-sm-4 col-md-2 col-lg-10" id="logo">
          <div class="container">
        		<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2" id="header-logo">
              <a href="../index.php">
        			<img src="../img/template/logo.png" class="img-responsive" alt="Responsive image">
              </a>
        		</div>
          </div>
      </div>
      <div class="navbar navbar-inverse navbar-fixed-middle">
        <div class="container">
            <h1 class="site_title">Connexion à votre Espace d'administration</h1>
        </div>
      </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div id="connexion">
    
			<?php

			$erreur = "Identification échouée.";
			
			//  si $_SERVER["HTTP_REFERER"] est égal a la meme url que celle  ou on se connacet alors on tombe sur le message d'erreur, il suffit juste de faire une modification dans le app conf et dans ce cas ou met ceci ce qui comble fait que l'on as une url diferente a la deconaxion .

			if(isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"] == URL."/") {
				echo $erreur;
			}

			echo $form;
				
			?>
	</div>
  </div>
</div>