<?php
include('header.php');
?>

    <div class="container">
      <div class="col">
        <form action="controller.php" enctype="multipart/form-data" method="post">
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
              <label for="enc">Encodare (Lasă gol pentru manga)</label>
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
                <input type="checkbox" name="beta" value="true">
                <span class="lever"></span>
                On
              </label>
              <label class="grey-text text-darken-4"> Variantă "BETA"/"Low Quality"? </label>
            </div>
          </div>
          <div class="row">
            <div class="switch">
              <label>
                DVD/HDTV/WEBDL
                <input type="checkbox" name="bluray" value="true">
                <span class="lever"></span>
                Bluray
              </label>
            </div>
          </div>
          <div class="row">
            <div class="switch">
              <label>
                Anime
                <input type="checkbox" name="manga" value="True">
                <span class="lever"></span>
                Manga
              </label>
            </div>
          </div>
          <div class="center">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="add_anime">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>
  <!-- Modal Structure -->
  <div id="STOOOPPP" class="modal">
    <div class="modal-content">
      <h4>STOP - Scriptul a fost publicat și mutat!</h4>
      <p><a href="https://easypost.wien-subs.moe">https://easypost.wien-subs.moe</a></p>
    </div>
  </div>
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js" defer></script>
    <script defer>
  jQuery(document).ready(function(){
    $(".dropdown-trigger").dropdown();
    $('.sidenav').sidenav();
    $('input.series').autocomplete({
      data: {
        "Tate no Yuusha no Narigari - Episodul ": null,
        "Endro - Episodul ": null,
        "Domestic na kanojo - Episodul ": null,
        "Dororo - Episodul ": null,
        "Revisions - Episodul ": null,
        "Shingeki no Bahamut Manaria Friends - Episodul ": null,
        "Attack on Titans - Episodul ": null,
        "One Punch Man - Episodul": null,
        "Bungou Stray Dogs - Episodul": null,
        "Fairy Gone - Episodul": null,
        "Bokutachi wa Benkyou ga Dekinai - Episodul": null,
        "Kenja no Mago - Episodul": null,
        "Fruits Basket - Episodul": null,
        "Shoumetsu Toshi - Episodul": null,
        "Kono Yo no Hate de Koi wo Utau Shoujo YU-NO - Episodul": null
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