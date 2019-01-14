<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>DéclicLudik</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Magasin de vente et location de jeux de societe, jeux de plateau, jeux de carte, jeux educatif">
  <meta name="keywords" content="jeux de societe, jeux de plateau, jeux educatif, jeux de carte">
    <!-- liaison au different fichiers css -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/template/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../img/template/favicon-16x16.png" sizes="16x16" />
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
    <!--[if IE 8]>
    	<link href="../css/style-ie.css" rel="stylesheet">
 		 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 	<![endif]--> 
</head>
<body>
<div class="container-fluid">
	<div class="row">
      <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2" id="logo">
          <div class="container">
      		<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2" id="header-logo">
      			<a href="../index.php"><img src="../img/template/logo.png" class="img-responsive" alt="Déclic Ludik"></a>
      		</div>
          </div>
        </div>
        <div class="navbar navbar-inverse navbar-fixed-middle">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Accueil</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?page=nsconnaitre">Nous connaître</a></li>
            <li class="active"><a href="index.php?page=evenements">Évenements</a></li>
            <li class="active"><a href="index.php?page=ludoteque">Ludothèque</a></li>
            <li class="active"><a href="index.php?page=laboite">À l'intérieur de la boite</a></li>
            <li class="active"><a href="http://www.declicludik.fr/boutique/" target="_blank">Boutique en ligne</a></li>
            <li class="active"><a href="http://www.declicludik.fr/forum/" target="_blank">Forum</a></li>
          </ul>
        </div>
      </div>
      </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="boite">
      <div id="moncarrousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php 
              $dir = BASEURL."/img/carousel/";
              //  si le dossier pointe existe
                if (is_dir($dir)) {
                  // si il contient quelque chose
                  if ($slider = opendir($dir)) {
                    // boucler tant que quelque chose est trouve
                    $isFirst=true;// Compteur pour la class active 
                    while (($file = readdir($slider)) !== false) {
                      // affiche le nom et le type si ce n'est pas un element du systeme
                        if( $file != '.' && $file != '..' && preg_match('#\.(jpe?g|gif|png)$#i', $file)){
                          if($isFirst==true){
                               echo '<div class="item active">';
                               $isFirst=false;
                          }else{
                               echo '<div class="item">';
                          }
                          echo  '<img src="/img/carousel/'.$file.'" alt="'.$file.'">
                                    <div class="carousel-caption"></div></div>';
                        
                        }
                    }
                    // on ferme la connection
                    closedir($slider);
                  }
                }     
          ?>
        </div>
        <a class="left carousel-control" href="#moncarrousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#moncarrousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
  </div>
</div>