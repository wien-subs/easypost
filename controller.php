<?php
include("function.php");
$action = $_REQUEST["action"];
switch($action) {
  case "add_anime":
   try {
      $data = $_POST["source"];
      if(empty(@$_POST["source"]))
        throw new Exception("Nu am găsit nici-o sursă. Cred că ai uitat să completezi.");
      $ep = $_POST["eps_name"];
      if(empty($ep) || strlen($ep) < 7)
        throw new Exception("Numele episodului trebuie să fie completat obligatoriu!");
      if(!empty(@$_POST["inpart"]))
        $part = true;
      else
        $part = false;
      if(!empty(@$_POST["beta"]))
        $beta = true;
      else
        $beta = false;
      if(!empty(@$_POST["manga"]))
        $manga = true;
      else
        $manga = false;
      $whos = array(
        "tl"=>(!empty($_POST["tl"]) ? $_POST["tl"] : "Unknown"),
        "tlc"=>(!empty($_POST["tlc"]) ? $_POST["tlc"] : "Unknown"),
        "edit"=>(!empty($_POST["edit"]) ? $_POST["edit"] : "Unknown"),
        "enc"=>(!empty($_POST["enc"]) ? $_POST["enc"] : "Unknown"));
      if(!empty(@$_FILES['img']["tmp_name"])){
        $handle = new upload($_FILES['img']);
        $fn = time().'image_resized';
        $dir = __DIR__ . (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ?  '//temp_img//' : '/temp_img/');
        if($handle->uploaded) {
          $handle->file_new_name_body   = $fn;
          $handle->image_resize         = true;
          $handle->file_force_extension = true;
          $handle->image_convert = 'jpg';
          $handle->file_new_name_ext = 'jpg';
          $handle->image_x = 476;
          $handle->image_y = 264;
          $handle->process($dir);
          if($handle->processed) {
            $handle->clean();
            $read = fopen($dir.$fn.".jpg", "r");
            $ds = fread($read, filesize($dir.$fn.".jpg"));
            $pvars=array('image' => base64_encode($ds));
            unlink($dir.$fn.".jpg");
          }
        }
      }
      $id = $db->register_eps($ep, $ws->ws($data, $whos, $beta, $part), $sh->sh($data, $whos, $pvars, $beta, $part, $ep));
      header("Location: show.php?id=$id&meta=new");
   }
   catch (Exception $e) {
     header("Location: index.php?status=error&msg=".$e->getMessage());
   }
    break;
  case "flro":
    try {
      $release = $_POST["releasetype"];
      switch($release) {
        case"ws":
          $release = "TL..........: [url=https://www.wien-subs.ro/]Echipa de Traducători Wien-Subs[/url]
Enc.........: [url=https://www.wien-subs.ro/]Echipa de Encodări Wien-Subs[/url]
TLC.........: [url=https://www.wien-subs.ro/]Echipa de Corectare Wien-Subs[/url]
FanSub......: [url=https://www.wien-subs.ro/]Wien-Subs România[/url]";
          break;
        case"sh":
          $release = "TL..........: [url=https://shinobifansub.com/]Echipa de Traducători Shinobi[/url]
Enc.........: [url=https://shinobifansub.com/]Echipa de Encodări Shinobi[/url]
TLC.........: [url=https://shinobifansub.com/]Echipa de Corectare Shinobi[/url]
FanSub......: [url=https://shinobifansub.com/]Shinobi Fansub[/url]";
          break;
        case"both":
          $release = "TL..........: [url=https://shinobifansub.com/]Shinobi[/url] & [url=https://www.wien-subs.ro/]Wien-Subs[/url]
Enc.........: [url=https://shinobifansub.com/]Shinobi[/url] & [url=https://www.wien-subs.ro/]Wien-Subs[/url]
TLC.........: [url=https://shinobifansub.com/]Shinobi[/url] & [url=https://www.wien-subs.ro/]Wien-Subs[/url]
FanSub......: [url=https://shinobifansub.com/]Shinobi Fansub[/url] & [url=https://www.wien-subs.ro/]Wien-Subs România[/url]";
          break;
        default:
          $release = "";
          break;
      }
      $mi = $common->mediainfo($_POST["mediainfo"]);
      $mal = $common->mal($_POST["mal"]);
      if(isset($_POST["desc"]) == true && strlen($_POST["desc"]) > 3)
        $desc = $_POST["desc"];
      else
        $desc = $mal["desc"];
      $var = null;
      $keep= '
[center][size=4][b][u]'.$mal["name"].'[/u][/b][/size]

[img]'.$mal["image"].'[/img]
[/center]
[b]Type[/b]: TV
[b]Synonims[/b]: '.$mal["alias"].'
[b]Episodes[/b]: [u]'.$mal["eps"].'[/u]
[b]Status[/b]: [u]Finished Airing[/u]
[b]Aired[/b]: [u]'.$mal["aried"].'[/u]
[b]Studios[/b]: [u]'.$mal["studio"].'[/u]
[b]Source[/b]: [u]'.$mal["source"].'[/u]
[b]Genres[/b]: [u]'.$mal["gen"].'[/u]
[b]Duration[/b]: [u]'.$mal["dura"].'[/u]
[b]Rating[/b]: [u]'.$mal["rating"].'[/u]
[b]MyAnimeList[/b]: '.$mal["url"].'
[b]IMDB[/b]: '.$_POST["imdb"].'

[b][color=red]Torent Info[/color][/b]
General
Filename.......: '.ucwords($mi["fname"]).'
Container......: '.strtoupper($mi["container"]).'
Duration.......: '.$mi["duration"].'
Size...........: '.$mi["size"].'

Video
Codec..........: [color=orange]'.strtoupper($mi["codec"]).'[/color] / [color=orange]'.$mi["bit"].'[/color]
Type...........: Progressive
Resolution.....: [u]'.$mi["width"].'[/u]x[u]'.$mi["height"].'[/u] 
Aspect ratio...: '.$mi["aspect"].'
Bit rate.......: '.$mi["bitrate"].'

Audio#1
Format.........: [color=#4bb702]'.$mi["audiof"].'[/color]
Channels.......: '.strtoupper($mi["ch"]).' channels
Bit rate.......: '.$mi["abitrate"].' Kbps
Language.......: Japanese

Subtitle#1
Language....: [color=red]Română[/color]
Type........: '.$_POST["subtype"].'
'.$release.'

[center][quote=[b][color=red]Descriere[/color][/b]]
[i][b][color=teal]'.$desc.'[/i][/quote][/b][/color]

[b]Screens[/b]
'.$_POST["ss"].'

[videohd=http://www.youtube.com/watch?v='.$common->youtube_id_from_url($_POST["ytb"]).']
[/center]
    ';
      $id = $db->register_eps("FileList: ".$mal["name"], $keep, null);
      sleep(5);
      header("Location: show.php?id=$id&meta=new");
    }
    catch (Exception $e) {

    }
    break;
  default:
    return 0;
}