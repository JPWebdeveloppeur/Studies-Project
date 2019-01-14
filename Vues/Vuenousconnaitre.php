<?php require('header.php');?>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-lg-6 home-block">
      <div class="home-block-header evenements">
        <?php if (!empty($txtnsconnaitre["ssTitreContenu"] != null)) {
          echo '<h2>'.$txtnsconnaitre["TitreContenu"].'</h2><h2>'.$txtnsconnaitre["ssTitreContenu"].'</h2>';
          }else {
            echo '<h2>'.$txtnsconnaitre["TitreContenu"].'</h2>';
          }
        ?>
      </div>
      <div class="nousconaitre"><?php echo $txtnsconnaitre["TexteContenu"]; ?></div>  
    </div>
    <div class="col-md-6 col-lg-6 home-block">
      <div class="home-block-header">
        <h2><?php echo $equipe["TitreContenu"];?></h2>
      </div>
      <div class="equipe">
        <?php echo $equipe["TexteContenu"];?>
        <div style="clear:both;"></div>  
      </div>

      <div class="home-block">
        <div class="home-block-header">
          <h2><?php echo $localis["TitreContenu"];?></h2>
        </div>
        <!-- Google Map -->
        <div class="col-md-6 col-lg-10 col-xs-10" id="googlemap">
          <div class="map-responsive">
            <?php echo $localis["TexteContenu"];?>
          </div>
        </div>
      </div>
    </div><!-- Notre Equipe & google map --> 
  </div><!-- Row Nous-connaitre et formulaire -->
</div><!-- Container Fin -->
<?php require('footer.php');?>