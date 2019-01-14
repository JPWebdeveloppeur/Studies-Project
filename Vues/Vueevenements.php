<?php require('header.php');?>
<div class="container">
  <div class="row">
    <!-- Nos Evenements -->
    <div class="col-md-6 col-lg-6 home-block">
      <div class="home-block-header evenement">
       <?php if (!empty($pageEvenements["ssTitreContenu"] != null)) {
          echo '<h2>'.$pageEvenements["TitreContenu"].'</h2><h2>'.$pageEvenements["ssTitreContenu"].'</h2>';
          }else {
            echo '<h2>'.$pageEvenements["TitreContenu"].'</h2>';
          }
          
          ?>
      </div>
      <div class="textevenement"><?php echo $pageEvenements["TexteContenu"]; ?></div> 
    </div><!-- Nos Evenements Fin -->
    <!--Formualaire d'organisation -->
    <div class="col-md-6 col-lg-6 home-block">
      <div class="home-block-header">
        <h2>Formulaire de réservation</h2>
      </div>
      <div class="formulairereservation">
        <?php echo $monform; ?>
      </div>
    </div><!-- Formulaire D'organisation FIN -->
  </div><!-- Row General -->
</div><!-- Container General -->

<?php require('footer.php');?>
