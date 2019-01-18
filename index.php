<?php
header('X-XSS-Protection:0');
include('function.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo center">EasyPost</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li class="active"><a href="index.php">Acasa</a></li>
            <li><a href="logs.php">Logs</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
      <div class="col">
        <form action="result.php" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <input type="text" id="autocomplete-input" class="series" name="eps_name">
                  <label for="autocomplete-input">Numele seriei și nr-episod</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s3">
              <input id="tl" type="text" class="validate" name="tl">
              <label for="tl">Traducere</label>
            </div>
            <div class="input-field col s3">
              <input id="tlc" type="text" class="validate" name="tlc">
              <label for="tlc">Verificare</label>
            </div>
            <div class="input-field col s3">
              <input id="edit" type="text" class="validate" name="edit">
              <label for="edit">Editare</label>
            </div>
            <div class="input-field col s3">
              <input id="enc" type="text" class="validate" name="enc">
              <label for="enc">Encodare</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textare" class="materialize-textarea" name="source" rows="18"></textarea>
              <label for="textare">1 link / perline</label>
            </div>
          </div>
          <div class="row">
            <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" name="img">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" name="img" type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="switch">
              <label>
                Off
                <input type="checkbox" name="inpart" value="true" checked>
                <span class="lever"></span>
                On
              </label>
              <label class="grey-text text-darken-4"> Serie realizată în parteneriat? </label>
            </div>
          </div>
          <div class="row">
            <div class="switch">
              <label>
                Off
                <input type="checkbox">
                <span class="lever" name="beta" value="true"></span>
                On
              </label>
              <label class="grey-text text-darken-4"> Variantă "BETA"/"Low Quality"? </label>
            </div>
          </div>
          <div class="center">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="ok">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js" defer></script>
    <script defer>
  jQuery(document).ready(function(){
    $('input.series').autocomplete({
      data: {
        "Mob Psycho II - Episodul ": null,
        "Kakegurui xx - Episodul ": null,
        "Yakusoku no neverland - Episodul ": null,
        "Doukyonin wa Hiza Tokidoki Atama no Ue - Episodul ": null,
        "Tate no yuusha no Narigari - Episodul ": null,
        "Endro - Episodul ": null,
        "Grimms Notes - Episodul ": null,
        "Domestic na kanojo - Episodul ": null,
        "Dororo - Episodul ": null,
        "Revisions - Episodul ": null,
        "Gotoubun no Hanayome - Episodul ": null,
        "Mahou Shoujo Tokushusen Asuka - Episodul ": null,
        "Shingeki no Bahamut Manaria Friends - Episodul ": null,
      },
    });
    $('input#tl').autocomplete({
      data: {
        <?php echo $common->get_auto_complete_index('tls');?>
      },
    });
    $('input#tlc').autocomplete({
      data: {
        <?php echo $common->get_auto_complete_index('tlcs');?>
      },
    });
    $('input#enc').autocomplete({
      data: {
        <?php echo $common->get_auto_complete_index('enc');?>
      },
    });
    $('input#edit').autocomplete({
      data: {
        <?php echo $common->get_auto_complete_index('editor');?>
      },
    });
  });
  </script>
  </body>
</html>