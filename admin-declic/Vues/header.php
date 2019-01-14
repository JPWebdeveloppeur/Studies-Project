
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
    <script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="../js/hideshow.js" type="text/javascript"></script>
    <script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.equalHeight.js"></script>
    <script type="text/javascript">
        $(document).ready(function() 
          { 
            if( $(".tablesorter").length>0){
               $(".tablesorter").tablesorter(); 
            }
           
              //Lors du chargements de la page
            $(".tab_content").hide(); // Masquer tous les contenus
            $("ul.tabs li:first").addClass("active").show(); // Activer premier onglet
            $(".tab_content:first").show(); // Afficher le contenu de premier onglet

            //onclick Event
            $("ul.tabs li").click(function() 
            {
              $("ul.tabs li").removeClass("active"); // Retirer toute catégorie "active"
              $(this).addClass("active"); // Ajouter la classe "active" à l'onglet sélectionné
              $(".tab_content").hide(); // Masquer tous les contenus de l'onglet
              var activeTab = $(this).find("a").attr("href"); // Trouver la valeur de l'attribut href pour identifier l'onglet actif + contenu
              $(activeTab).fadeIn(); // Fondu dans le contenu ID actif
              return false;

            });

               $("a.suppr").click(function(event){
                  var conf = confirm('Etes-vous sûr de supprimer ce contenu ?');
                  if(conf == false) {
                    event.preventDefault();
                  }
                });
               $("a.supprmembre").click(function(event){
                  var conf = confirm('Etes-vous sûr de supprimer ce membre ?');
                  if(conf == false) {
                    event.preventDefault();
                  }
                });
               $(".gestionslider").click( "supprPhoto" , function(event){
                  var conf = confirm('Etes-vous sûr de supprimer cette photo ?');
                  if(conf == false) {
                    event.preventDefault();
                  }
                });

               $(function() {
                  var bar = $('.bar');
                  var percent = $('.percent');
                  var status = $('#status');
                  var imageSlider = $('.gestionslider');

                    $('form').ajaxForm({
                      beforeSend: function() {
                          status.empty();
                          var percentVal = '0%';
                          bar.width(percentVal);
                          percent.html(percentVal);
                      },
                      uploadProgress: function(event, position, total, percentComplete) {
                          var percentVal = percentComplete + '%';
                          bar.width(percentVal);
                          percent.html(percentVal);
                      },
                      complete: function(xhr) {
                          var response = JSON.parse(xhr.responseText);
                          status.html(response.status);
                          imageSlider.append(response.slider);
                      }
                    });    
                });
        });
    </script>
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
            <header id="header">
                <h1 class="col-xs-6 col-sm-6 col-md-6 col-lg-6 site_title">Bonjour <?php echo $_SESSION["PrenomMembre"];?> (<a href="index.php?page=deconnexion" class="off"> Déconnexion</a> )</h1>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 btn_view_site"><a href="../index.php" target="_blank">Accés au site</a></div>
            </header> <!-- end of header bar -->
        </div>
      </div>
  </div>
</div>
<div class="container">
  <div class="row">
      <aside id="sidebar" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 column">
        <ul class="toggle">
          <li class="icn_tdb"><a href="index.php">Tableau de bord</a></li>
        </ul>
        <h2>Articles</h2>
        <ul class="toggle">
          <!-- <li class="icn_new_article"><a href="index.php?page=article&action=creer">Ajouter un Article</a></li> -->
          <li class="icn_edit_article"><a href="index.php?page=article">Editer un Article</a></li>
        </ul>
        <h2>Actualités</h2>
        <ul class="toggle">
          <li class="icn_new_article"><a href="index.php?page=actu&action=creer">Ajouter une Actualité</a></li>
          <li class="icn_edit_article"><a href="index.php?page=actu">Editer une Actualité</a></li>
        </ul>
        <h2>Slider Home</h2>
        <ul class="toggle">
          <li class="icn_folder"><a href="index.php?page=slider&action=creer">Ajouter un média</a></li>
        </ul>
        <h2>Utilisateurs</h2>
        <ul class="toggle">
          <li class="icn_view_users"><a href="index.php?page=membre&action=creer">Ajouter un Utilisateur</a></li>
          <li class="icn_profile"><a href="index.php?page=membre">Profils Utilisateurs</a></li>
        </ul>
        <!-- <h2>newsletter</h2>
        <ul class="toggle">
          <li class="icn_newsletter"><a href="#">Ajouter une newsletter</a></li>
        </ul> -->
      </aside><!-- end of sidebar -->
