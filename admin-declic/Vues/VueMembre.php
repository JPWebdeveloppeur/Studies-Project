<?php

$message = array(
	"Le membre a bien été supprimé.",
	"Le membre que vous essayez de supprimer n'existe pas."
	);

require(BASEURL."/Vues/header.php");

	// on teste si on est sur un affichage liste
	if(isset($liste)) { ?>

		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 module width_full">
					<h1>Gestion des membres</h1>
						
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 liste">
						<div class="message">
							<?php if(isset($_GET["message"])) {
								  $codeMessage = $_GET["message"];
								  echo $message[$codeMessage];
							} ?>
						</div>
						<?php foreach ($liste as $item) {

							echo '<ul>
									<li>
										<a href="index.php?page=membre&id='.$item['idMembre'].'">'.'> '.$item["NomMembre"]." ".$item["PrenomMembre"]." - ".$item['RoleMembre'].'</a> / <a href="index.php?page=membre&id='.$item['idMembre'].'>&action=supprimer" class="supprmembre">Supprimer le membre</a></br>
									</li>
								</ul>'; 
						}?>
					</div><?php 
	} else {
		echo $fiche;
		} ?>
				</div>
			</div>
		</div>