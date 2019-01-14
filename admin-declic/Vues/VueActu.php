<?php require(BASEURL."/Vues/header.php");  ?>

<div class="container">
	<?php if(isset($listeactus)) {
		echo '<div class="row">
				<article class="col-xs-6 col-sm-6 col-md-10 col-lg-10 module width_3_quarter">
					<div class="tab_container">
						<div id="tab1" class="tab_content">
							<table class="tablesorter" cellspacing="0">
						        <thead> 
							        <tr> 
								        <th>Titre Actualités</th>
								        <th>Date Création</th>
								        <th>Date Modification</th>  
								        <th>Editer</th>
								        <th>Supprimer</th> 
							        </tr> 
						       	</thead>
								<tbody>';
							foreach ($listeactus as $item) { 
							echo '<tr>
								    <td><a href="index.php?page=actu&id='.$item['idactus'].'">'.$item['TitreActus'].'</a></td>
								    <td>'.$item['date'].'</td>
									<td>'.$item['dateModif'].'</td>
									<td><a href="index.php?page=actu&id='.$item['idactus'].'"><img src="../img/template/back/icn_edit.png"></td>
									<td><a href="index.php?page=actu&id='.$item['idactus'].'&action=supprimer" class="suppr"><img src="../img/template/back/icn_trash.png"></td>
								  </tr>' ; }
							echo '</tbody> 
							</table>
					</div>
				</article>
			</div>'; } else { ?>
				
				<div class="row">
					<div class="listeArticle">
						<?php echo $gestionActu; } 
						?>
					</div>
				</div>
</div>




