<?php
header('X-XSS-Protection:0');
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
          <a href="index.php" class="brand-logo center">Wien-Subs EasyPost</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li class="active"><a href="index.php">Acasa</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
      <div class="col">
        <form action="result.php" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="mal" type="text" class="validate" name="tl">
              <label for="mal">Traducere</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="mal" type="text" class="validate" name="tlc">
              <label for="mal">Verificare</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="mal" type="text" class="validate" name="edit">
              <label for="mal">Editare</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="mal" type="text" class="validate" name="enc">
              <label for="mal">Encodare</label>
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
          <div class="center">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="ok">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="js/materialize.min.js" defer></script>
  </body>
</html>