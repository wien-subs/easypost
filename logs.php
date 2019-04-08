<?php
include('header.php');
?>
    <div class="container">
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">search</i>
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix">Nume serie</label>
            </div>
          </div>
          <div class="center">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="ok">Caută
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col s12">
          <table class="highlight responsive-table">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Serie - ep</th>
                  <th>Data</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $db->showlogs();?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js" defer></script>
		<script defer>
      jQuery(document).ready(function(){
        $(".dropdown-trigger").dropdown();
        $('.sidenav').sidenav();
        $('.modal').modal({'dismissible': false});
        $('.modal').modal('open'); 
      });
		</script>
  </body>
</html>