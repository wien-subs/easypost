<?php
header('X-XSS-Protection:0');
include('function.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <title>Wien-Subs - EasyPost</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body class="grey darken-4 white-text">
    <div class="navbar-fixed">
      <nav class="blue-grey darken-4 white-text">
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo center">EasyPost</a>
          <a href="#" data-target="sidenavs" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="index.php">Acasa</a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">FileList<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a href="logs.php">Logs</a></li>
          </ul>
        </div>
      </nav>
    </div>
   
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="flro.php">Generate Post Data</a></li>
    <li><a href="https://filelist.ro/upload.php">FileList</a></li>
    <li><a href="https://ilikeshots.club/">Image Upload</a></li>
    <li class="divider"></li>
    <li><a href="https://myanimelist.net">MyAnimeList</a></li>
    <li><a href="https://imdb.com">I.M.D.B.</a></li>
  </ul>
  <ul class="sidenav" id="sidenavs">
    <li><a href="index.php">Acasă</a></li>
    <li><a href="flro.php">FileList Generate</a></li>
    <li><a href="logs.php">Logs</a></li>
  </ul>