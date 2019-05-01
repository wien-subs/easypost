<?php
header('X-XSS-Protection:0');
error_reporting(E_ALL ^ E_NOTICE);
include('function.php');
$id = $_REQUEST["id"];
if(!empty($id) && is_numeric($id)){
  if($common->get_log_by_id($id) == false)
    header("Location: logs.php");
  else
    $data = $common->get_log_by_id($id);
}
else
  header("Location: logs.php");
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
            <li><a href="index.php">Acasa</a></li>
            <li class="active"><a href="logs.php">Logs (<?php echo $id;?>)</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
    <div class="row">
      <div class="col s12 center-align">
        <h2><?php echo $data["title"];?></h2><h5>(<?php echo $data["time"];?>)</h5>
      </div>
    </div>
      <div class="col s12">
        <pre id="wscopy">
          <?php echo $data["ws"];?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Postarea pentru Wien-Subs a fost copiată cu success în Clipboard!<br/>Verificați previzualizare înainte de a posta!!!'})" data-clipboard-target="#wscopy">
            Copy Wien-Subs to Clipboard
        </button>
      </div>
      <div class="col s12">
        <pre id="shcopy">
          <?php echo $data["sh"];?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Postarea pentru Shinobi a fost copiată cu success în Clipboard!<br/>Verificați previzualizare înainte de a posta!!!'})" data-clipboard-target="#shcopy">
            Copy Shinobi to Clipboard
        </button>
      </div>
      <div class="col s12">
        <pre id="tagscopy">
          <?php echo htmlentities($common->get_tags($data["title"]));?>
        </pre>
      </div>
      <div class="center">
        <button class="btn waves-effect waves-light btn-large" onclick="M.toast({html: 'Etichetele se află în clipboard!'})" data-clipboard-target="#tagscopy">
            Copy Tags to Clipboard
        </button>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/clipboard.min.js"></script>
    <script defer>
    new ClipboardJS('.btn');
  jQuery(document).ready(function(){
    $(".dropdown-trigger").dropdown();
    $('.sidenav').sidenav();
    $('.modal').modal({'dismissible': false});
    $('.modal').modal('open');
<?php
  echo (strlen(@$_GET["meta"]) > 1 ? "M.toast({html: 'Cod-ul pentru postări a fost generat'});" : "M.toast({html: 'Cod-ul pentru postări a copiat din baza de date și afișiat'});");
  ?>
  });
    </script>
  </body>
</html>