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
              <label class="white-text"> Serie realizată în parteneriat? </label>
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
              <label class="white-text"> Variantă "BETA"/"Low Quality"? </label>
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
    <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js" defer></script>
    <script defer>
  jQuery(document).ready(function(){
    $(".dropdown-trigger").dropdown();
    $('.sidenav').sidenav();
    $('input.series').autocomplete({
      data: {
        "Tate no Yuusha no Narigari - Episodul ": null,
        "Domestic na kanojo - Episodul ": null,
        "Dororo - Episodul ": null,
        "Revisions - Episodul ": null,
        "Attack on Titans - Episodul ": null,
        "Fairy Gone - Episodul": null,
        "Bokutachi wa Benkyou ga Dekinai - Episodul": null,
        "Fruits Basket - Episodul": null,
        "Enen no Shouboutai - Episodul ": null,
        "Given - Episodul ": null,
        "Tejina-senpai - Episodul ": null,
        "Uchi no Ko no Tame Naraba - Episodul ": null,
        "Katsute Kami Datta Kemono-tachi e - Episodul ": null,
        "DanMachi II - Episodul ": null,
        "Lord El-Melloi II Sei no Jikenbo - Episodul ": null,
        "Arifureta Shokugyou de Sekai Saikyou - Episodul ": null,
        "HenSuki - Episodul ": null,
        "Dr.Stone - Episodul ": null,
        "Vinland Saga - Episodul ": null,
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