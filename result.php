<?php
header('X-XSS-Protection:0');
php_uname();
error_reporting(E_ALL ^ E_NOTICE);
include('function.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
pre {
  overflow: hidden;
}
  </style>
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
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
      <div class="col s12">
        <pre id="wscopy">
          <?php echo htmlentities($ws->ws($data, $whos, $beta, $part, $manga));?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Postarea pentru Wien-Subs a fost copiată cu success în Clipboard!<br/>Verificați previzualizare înainte de a posta!!!'})" data-clipboard-target="#wscopy">
            Copy Wien-Subs to Clipboard
        </button>
      </div>
      <div class="col s12">
        <pre id="shcopy">
          <?php echo htmlentities($sh->sh($data, $whos, $pvars, $beta, $part, $ep, $manga));?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Postarea pentru Shinobi a fost copiată cu success în Clipboard!<br/>Verificați previzualizare înainte de a posta!!!'})" data-clipboard-target="#shcopy">
            Copy Shinobi to Clipboard
        </button>
      </div>
      <div class="col s12">
        <pre id="tagscopy">
          <?php echo htmlentities($common->get_tags($ep));?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Etichetele se află în clipboard!'})" data-clipboard-target="#tagscopy">
            Copy Tags to Clipboard
        </button>
      </div>
    </div>
    <script type="text/javascript" src="js/clipboard.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
      M.toast({html: 'Cod-ul pentru postări a fost generat!'});
      new ClipboardJS('.btn');
    </script>
  </body>
</html>