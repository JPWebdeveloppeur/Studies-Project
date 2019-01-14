<?php require(BASEURL."Vues/header.php"); ?>
<div class="container">
	<div class="row">
		<div class=" col-xs-6 col-sm-6 col-md-6 col-lg-6 formupload">
			<?php if(isset($_GET["action"]) && $_GET["action"] == "creer"){
					echo '<h1>Formulaire de téléchargement d\'image</h1>
							<div id="status"></div>';?>

			<?php echo '<div class="progress">
							<div class="bar" style="width: 100%;"></div>
    						<div class="percent">0%</div>
						</div>'; ?>
							
			<?php echo '<form method="POST" action="index.php?page=response" enctype="multipart/form-data" id="formPhoto" >
			        		<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
			        		<input type="text" name="name" value="" id="name" placeholder="Nom de l\'image final" />
			 				<input type="file" name="slider" value="" />
							<input type="submit" value="Envoyer" class="alt_btn" id="subm" />
						</form>
					<div class="gestionslider">';

							$dir = "../img/carousel/";
	            			//  si le dossier pointe existe
				            if (is_dir($dir)) {
				                // si il contient quelque chose
				                if ($slider = opendir($dir)) {
				                    // boucler tant que quelque chose est trouve
				                    while (($file = readdir($slider)) !== false) {
				                      // affiche le nom et le type si ce n'est pas un element du systeme
				                        if( $file != '.' && $file != '..' && preg_match('#\.(jpe?g|gif|png)$#i', $file)){

				                        	 echo  '<div class="col-lg-3 col-md-4 col-xs-4 thumbadmin">
				                        	 	<a href="'.$lienSuppr.'&file='.$file.'" class="supprPhoto">
				                        	 		<img class="img-responsive" src="/img/carousel/'.$file.'" alt="'.$file.'" width="300" height="210" class="supprPhoto"/>
				                                </a></div>';
				                        }

				                    }
				                    // on ferme la connection
				                    closedir($slider);
				                }
				            }
				echo '</div>
				<div class="format">
								<p>Format pour l\'upload : 1170px par 425px</p>
								<p> Ne pas mettre d\'accent pour les noms d\'images</p>
							</div>';            
				} ?>    					
			<!--  on utilise la meme div pour la supression et la création -->
			</div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="http://malsup.github.com/jquery.form.js"></script> 