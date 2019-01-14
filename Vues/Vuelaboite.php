<?php require('header.php');?>
<div class="container">
	<div class="row">
  	<div class="home-block">
      <div class="home-block-header">
        <?php if (!empty($aLaBoite["ssTitreContenu"] != null)) {
          echo '<h2>'.$aLaBoite["TitreContenu"].'</h2><h2>'.$aLaBoite["ssTitreContenu"].'</h2>';
          }else {
            echo '<h2>'.$aLaBoite["TitreContenu"].'</h2>';
          }

        ?>
      </div>
      <div class="col-lg-12 col-md-6 col-xs-12 contenuboite">
        <?php echo $aLaBoite["TexteContenu"];?>
      </div>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>   
<?php require('footer.php');?>