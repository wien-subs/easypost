<?php
header('X-XSS-Protection:0');
include('function.php');
$data = $_POST["source"];
$whos = array(
  "tl"=>$_POST["tl"],
  "tlc"=>$_POST["tlc"],
  "edit"=>$_POST["edit"],
  "enc"=>$_POST["enc"]);
if(!empty(@$_FILES['img']["tmp_name"])){
  $img = $_FILES['img'];
  $filename = $img['tmp_name'];
  $handle = fopen($filename, "r");
  $ds = fread($handle, filesize($filename));
  $pvars   = array('image' => base64_encode($ds));
}
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
          <a href="index.php" class="brand-logo center">Wien-Subs EasyPost</a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li class="active"><a href="index.php">Acasă</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
      <div class="col s12">
        <pre id="wscopy">
          <?php echo htmlentities($ws->ws($data,$whos));?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Postarea pentru Wien-Subs a fost copiată cu success în Clipboard!<br/>Verificați previzualizare înainte de a posta!!!'})" data-clipboard-target="#wscopy">
            Copy Wien-Subs to Clipboard
        </button>
      </div>
      <div class="col s12">
        <pre id="shcopy">
          <?php echo htmlentities($sh->sh($data, $whos, $pvars));?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Postarea pentru Shinobi a fost copiată cu success în Clipboard!<br/>Verificați previzualizare înainte de a posta!!!'})" data-clipboard-target="#shcopy">
            Copy Shinobi to Clipboard
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