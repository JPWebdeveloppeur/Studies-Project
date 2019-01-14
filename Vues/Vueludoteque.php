<?php require('header.php');?>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-lg-6 home-block">
        <div class="home-block-header evenement">
          <?php if (!empty($pageLudoteque["ssTitreContenu"] != null)) {
            echo '<h2>'.$pageLudoteque["TitreContenu"].'</h2><h2>'.$pageLudoteque["ssTitreContenu"].'</h2>';
            }else {
              echo '<h2>'.$pageLudoteque["TitreContenu"].'</h2>';
            }
          ?>
        </div>
        <div class="texteludoteque"><?php echo $pageLudoteque["TexteContenu"]; ?></div>
    </div><!-- Ludoteque -->
    <!-- Formulaire de reservation-->
    <div class="col-md-6 col-lg-6 home-block">
      <div class="home-block-header">
        <h2>Formulaire de location</h2>
      </div>
      <div class="formulairereservation">
        <?php echo $reserform;?>
      </div>
  	</div><!-- Formulaire de reservation-->
  </div><!-- Row General -->
</div><!-- Container General -->
<?php require('footer.php');?>