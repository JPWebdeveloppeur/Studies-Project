<?php require("header.php") ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-lg-6 home-block">
			<div class="home-block-header">
				<h2>Actualités</h2>
			</div>
			<div class="panel-group" id="accordion">
			  	<!-- Donc on teste si $listeActu existe et dans ce cas on boucle pour recuperer le titre de l'actu ainsi que son contenu et on genere l'accordeon -->
				<?php if(isset($listeActu)) 
					{
						$compteur=1; // on lance un compteur pour generer l'accordeon
		    			foreach($listeActu as $item)
		    			{ 
		    				echo '<div class="panel panel-default">
	  								<div class="panel-heading bg-accord">
				  						<h4 class="panel-title">
				          					<a data-toggle="collapse" data-parent="#accordion" '
												.($compteur==1 ? 'aria-expanded="true"' : 'aria-expanded="false"')
				          						.' href="#collapse'.$compteur.'">'.$item["TitreActus"].'</a>
				          				</h4>
				          			</div>
				          			<div id="collapse'.$compteur.'" class="panel-collapse collapse '.($compteur==1 ? 'in' : '').'">
			          					<div class="panel-body">'.$item["TexteActus"].'</div>
			          				</div>
			          			</div>'; 
			          		$compteur++;
						}
					}
				?>
			</div>
			<!-- Meilleurs location du mois Fin -->
		    <div class="home-block">
		    	<div class="home-block-header">
		    		<?php if (!empty($Contenuloca["ssTitreContenu"] != null)) {
         				echo '<h2>'.$Contenuloca["TitreContenu"].'</h2><h2>'.$Contenuloca["ssTitreContenu"].'</h2>';
          				}else {
            			echo '<h2>'.$Contenuloca["TitreContenu"].'</h2>';
          				}
        			?>
		    	</div>
			    <div class="location">
					<?php echo $Contenuloca["TexteContenu"];?>
				  	<div style="clear:both;"></div>
				</div>	
		    </div>
		   <!-- A l'interieur de la boite< -->
			<div class="home-block">
	      		<div class="home-block-header">
	      		<?php if (!empty($LaBoite["ssTitreContenu"] != null)) {
     				echo '<h2>'.$LaBoite["TitreContenu"].'</h2><h2>'.$LaBoite["ssTitreContenu"].'</h2>';
      				}else {
        			echo '<h2>'.$LaBoite["TitreContenu"].'</h2>';
      				}
        		?>
	      		</div>
		      	<div class="video">
			        <?php echo $LaBoite["TexteContenu"];?>
			        <div style="clear:both;"></div>
		      	</div>
			</div><!-- A l'interieur de la boite Fin -->
		</div><!-- Colonne de gauche comprenaant (Actualités, Meileurs locations, A l'interieur de la boite) -->

		<!-- Colonne de Droite comprenant (Jeux a la une, Boutique en ligne, Evenements, Nos partenaires) -->
    	<div class="col-md-6 col-lg-6 home-block">
    		<!-- Jeux a la une  -->
    		<div class="home-block-header">
    			<?php if (!empty($ContenuJeux["ssTitreContenu"] != null)) {
     				echo '<h2>'.$ContenuJeux["TitreContenu"].'</h2><h2>'.$ContenuJeux["ssTitreContenu"].'</h2>';
      				}else {
        			echo '<h2>'.$ContenuJeux["TitreContenu"].'</h2>';
      				}
        		?>
			</div>
			<div class="embed-responsive embed-responsive-16by9 no-padding">
    			<iframe class="embed-responsive-item" src="<?php echo $ContenuJeux["LiensContenu"];?>"></iframe>
			</div>

		    <!-- Boutique en ligne -->
		    <div class="home-block">
		    	<div class="home-block-header boutique">
	    		<?php if (!empty($Contenuboutique["ssTitreContenu"] != null)) {
 				echo '<h2>'.$Contenuboutique["TitreContenu"].'</h2><h2>'.$Contenuboutique["ssTitreContenu"].'</h2>';
  				}else {
    			echo '<h2>'.$Contenuboutique["TitreContenu"].'</h2>';
  				}
        		?>
      			</div>
      			<div class="home-block-header">
      				<div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg"><?php echo $Contenuboutique["TexteContenu"]; ?></div>
      			</div>
				<div class="mbr-section__container">
					<div class="mbr-buttons mbr-buttons--auto-align btn-inverse">
						<a class="mbr-buttons__btn btn btn-lg btn-default" href="<?php echo $Contenuboutique["LiensContenu"]; ?>">Commandez dès Maintenant</a>
					</div>
				</div>
			</div>

			<!-- Nos Evenements -->
			<div class="home-block-header evenements">
			<?php if (!empty($ContenuEvenements["ssTitreContenu"] != null)) {
				echo '<h2>'.$ContenuEvenements["TitreContenu"].'</h2><h2>'.$ContenuEvenements["ssTitreContenu"].'</h2>';
				}else {
				echo '<h2>'.$ContenuEvenements["TitreContenu"].'</h2>';
			}
        	?>
      		</div>
      		<div class="evenmentexte"><?php echo $ContenuEvenements["TexteContenu"]; ?></div>

      		<!-- Nos Partenaires -->
      		<div class="home-block-header">
  			<?php if (!empty($partenaires["ssTitreContenu"] != null)) {
				echo '<h2>'.$partenaires["TitreContenu"].'</h2><h2>'.$partenaires["ssTitreContenu"].'</h2>';
				}else {
				echo '<h2>'.$partenaires["TitreContenu"].'</h2>';
				}
        	?>
		    </div>
	       	<div class="logopartenaire">
	        	<?php echo $partenaires["TexteContenu"]; ?>
	           	<div style="clear:both;"></div>
	        </div>
		</div>
	</div><!-- Row -->
</div><!-- Container -->
<?php require("footer.php") ?>
