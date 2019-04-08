<?php
include("header.php");
?>
<div class="container">
      <div class="col">
        <form action="controller.php" method="post">
          <div class="row">
            <div class="input-field col s12">
              <input id="mal" type="text" class="validate" name="mal" required>
              <label for="mal">MyAnimeList Link</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="youtube" type="text" class="validate" name="ytb" required>
              <label for="youtube">YouTube</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="IMDB" type="text" class="validate" name="imdb" required>
              <label for="IMDB">IMDB</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textarea1" class="materialize-textarea" name="mediainfo" rows="12"></textarea>
              <label for="textarea1">MediaInfo</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textare" class="materialize-textarea" name="desc" rows="12"></textarea>
              <label for="textare">Descriere (Dacă lași gol, va fi cea în engleză)</label>
            </div>
          </div>
          <div class="row">
            <p>
Who Release this?
              <label>
                <input type="radio" class="with-gap" name="releasetype" value="both"/>
                <span>Shinobi & Wien-Subs</span>
              </label>
              <label>
                <input type="radio" class="with-gap" name="releasetype" value="ws"/>
                <span>Wien-Subs</span>
              </label>
              <label>
                <input type="radio" class="with-gap" name="releasetype" value="sh"/>
                <span>Shinobi</span>
              </label>
            </p>
          </div>
          <div class="row">
            <p>
              <label>
                <input type="radio" class="with-gap" name="subtype" value="HardSub" checked />
                <span>HardSub</span>
              </label>
              <label>
                <input type="radio" class="with-gap" name="subtype" value="SoftSub [Format SSA/ASS]"/>
                <span>SoftSub</span>
              </label>
            </p>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea id="textare" class="materialize-textarea" name="ss" rows="12"></textarea>
              <label for="textare">ScreenShots</label>
            </div>
          </div>
          <div class="center">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="flro">Submit
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
    $(".dropdown-trigger").dropdown();
    $('.sidenav').sidenav();
    $('.modal').modal({'dismissible': false});
    $('.modal').modal('open');
  });
    </script>
  </body>
</html>