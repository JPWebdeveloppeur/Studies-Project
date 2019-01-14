
<!-- Footer -->
<div class="container-fluid">
    <div class="row" id="footer">
      <!-- <div class="col-sm-3 cgv">
        <a href="#">Condition géneral de vente</a>
      </div> -->
        <div class="col-sm-3 copyright">
          <p>Copyright 2016</p>
        </div>
        <div class="container">
          <div class="col-xs-4" id="bandeaunom">
              <h1>Déclic Ludik</h1>
              <p>8 rue Brunet Lecomte</p>
              <p>38300 Bourgoin-Jallieu</p>
          </div>
          <div class="col-xs-4" id="bandeauhoraire">
              <h3>Ouvert du mardi au samedi de 9h à 19h</h3>
          </div>
          <div class="col-xs-4" id="bandeaureseaux">
              <a href="tel:0474283359"><img src="../img/template/item/telephone.png" class="img-responsive" id="tel" alt="telephone"></a>
              <a href="https://twitter.com/DeclicLudik" title="twitter" target="_blank"><img src="../img/template/item/twitter.png" class="img-responsive" alt="twitter"></a>
              <a href="http://www.facebook.com/declic.ludik.5" title="facebook" target="_blank"><img src="../img/template/item/facebook.png" class="img-responsive" alt="facebook"></a>
          </div>
        </div>
    </div>
</div>
<!-- Les liaisons aux scripts -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src="../js/datepicker-fr.js"></script>
<script src="../js/script.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $( "#datepicker" ).datepicker({
      dateFormat : 'yy-mm-dd'
    });

      var from = $( "#datepicker-from" ).datepicker({
          dateFormat : 'yy-mm-dd',
          defaultDate: "today"
        })

        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate(this) + 5);
          to.datepicker( "option", "maxDate", getDate(this) + 10);
        });

      var to = $( "#datepicker-to" ).datepicker({
          dateFormat : 'yy-mm-dd',
          defaultDate: "+10d"
        })

        .on( "change", function() {
          from.datepicker( "option", "maxDate", getDate(this));
          from.datepicker( "option", "minDate", getDate(this) - 5);
        });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
      return date;
    }
});
</script>
</body>
</html>
