<?php
include('header.php');
?>
    <div class="container">
      <div class="row">
        <form id="mainsearch" class="col s12" action="">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">search</i>
              <input id="icon_prefix" type="text" class="validate" name="aname">
			  <input type="hidden" name="action" value="search">
              <label for="icon_prefix">Nume serie</label>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col s12">
          <table class="highlight responsive-table centered">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Serie - ep</th>
                  <th>Data</th>
              </tr>
            </thead>
            <tbody id="tabledata">
              <?php echo $db->showlogs();?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/underscore.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
	<script defer>
		jQuery(document).ready(function(){
			$(".dropdown-trigger").dropdown();
			$('.sidenav').sidenav();
			$('.modal').modal({'dismissible': false});
			$('.modal').modal('open');
      $("#mainsearch").keyup(_.debounce(function (e) {
          e.preventDefault();
          var formData = $(this).serialize();
          $.ajax({
              type:'post',
              url:'controller.php',
              data:formData,
              beforeSend:function() {
                  $( "#tabledata" ).slideUp( "slow");
              },
              success:function(result)
              {
                  $( "#tabledata" ).slideDown( "slow", function() {
                      $("#tabledata").html(result);
                  });
              }
          });
      }, 650));

		});
	</script>
  </body>
</html>