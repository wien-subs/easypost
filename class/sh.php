<?php
class shinobi {
  public function sh($data, $who, $img, $beta = false, $part = false, $epname = null, $manga = false) {
    $images = new img();
    $images = $images->image($img);
    $header = "
  [CENTER]
  [IMG]".$images."[/IMG]
  [B] ".$epname." 
  Tradus în limba română - Download & Online[/B]
  ".PHP_EOL;

  if($manga == false)
    $middle="
  [I]Traducere: ".$who["tl"]."
  Verificare: ".$who["tlc"]."
  Editare: ".$who["edit"]."
  Encodare: ".$who["enc"]."[/I]
".PHP_EOL;
  else
    $middle="
  [I]Traducere: ".$who["tl"]."
  Verificare: ".$who["tlc"]."
  Editare: ".$who["edit"]."[/I]".PHP_EOL;
  $middle_part = "
  Realizată în parteneriat cu Wien-Subs
  [URL='https://www.wien-subs.moe/'][IMG]https://wien-subs.moe/asset/wsh.png[/IMG][/URL]

  [B][I]Vizionare Plăcută![/I][/B]
  ".PHP_EOL;
  $footer_beta = "[B][I]Versiune Temporară![/I][/B]".PHP_EOL;
  
  if($part == true && $beta == true)
    return $header.$this->sh_ddl($data).$middle.$middle_part.$footer_beta.$this->sh_online($data);
  elseif($part == true && $beta == false)
    return $header.$this->sh_ddl($data).$middle.$middle_part.$this->sh_online($data);
  elseif($part == false && $beta == true)
    return $header.$this->sh_ddl($data).$middle.$footer_beta.$this->sh_online($data);
  else
    return $header.$this->sh_ddl($data).$middle.$this->sh_online($data);
  }

  private function sh_online($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
    $sh_online = '';
    foreach($match as $urls) {
      $keep = $urls[0];
      $durl = $common->get_url_id($keep);
      if($durl["iframe"] !== null && $durl["iframe_shinobi"] == true) {
        $sh_online .= $this->get_sh_online($keep, $durl["source_id"]);
      }
    }
    return $sh_online;
  }

  private function get_sh_online($url, $iframe_id) {
    switch($url) {
      case (strpos($url, "drive.google.com") == true):
          return '[SPOILER="GDrive"][MEDIA=googlevideo]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "dailymotion.com") == true or strpos($url, "dai.ly") == true):
          return '[SPOILER="DailyMotion"][MEDIA=dailymotion]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "stream.moe") == true):
          return '[SPOILER="Stream"][MEDIA=stream]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "openload.co") == true):
          return '[SPOILER="OpenLoad"][MEDIA=openload]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "mp4upload.com") == true):
          return '[SPOILER="Mp4Up"][MEDIA=mp4upload]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "sendvid.com") == true):
          return '[SPOILER="SendVid"][MEDIA=sendvid]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "mega.nz") == true):
          return '[SPOILER="MEGA"][MEDIA=mega]'.str_replace("#", "",$iframe_id).'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "sendit.cloud") == true):
          return '[SPOILER="SendITcloud"][MEDIA=senditcloud]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "mirrorace.com") == true):
          return '[SPOILER="MirrorAce"][MEDIA=mirrorace]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      default:
        return "";
        break;
    }
    
  }

  private function sh_ddl($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
    $sh_ddl = '[B]720p:[/B]';
    foreach($match as $link) {
      $keep = $link[0];
      $durl = $common->get_url_id($keep);
      if($durl["dl"] !== null)
        $sh_ddl .= " [URL='https:".$durl["dl"]."']".$this->sh_get_ddl_icon($durl["dl"])."[/URL] -";
    }
    return $sh_ddl.PHP_EOL;
  }

  private function sh_get_ddl_icon($url) {
    switch($url) {
      case (strpos($url, "stream.moe") == true):
          return ":stream:";
        break;
      case (strpos($url, "drive.google.com") == true):
          return ":gdrive:";
        break;
      case (strpos($url, "openload.co") == true):
          return ":openload:";
        break;
      case (strpos($url, "mp4upload.com") == true):
          return ":mp4u:";
        break;
      case (strpos($url, "yourupload.com") == true):
          return ":YU:";
        break;
      case (strpos($url, "fembed.com") == true):
          return ":mirror:";
        break;
      case (strpos($url, "nofile.io") == true):
          return ":nofile:";
        break;
      case (strpos($url, "mirrorace.com") == true):
          return ":mirror:";
        break;
      case (strpos($url, "mega.nz") == true):
          return ":meganz:";
        break;
      case (strpos($url, "google") == true):
          return ":gdrive:";
        break;
      case (strpos($url, "filelist.ro") == true):
          return ":filelist:";
        break;
      case (strpos($url, "sendit.cloud") == true):
          return ":sendit:";
        break;
      case (strpos($url, "nyaa.si") == true):
          return ":nyaa:";
        break;
      case (strpos($url, "anime-torrents.ro") == true):
          return ":torrent:";
        break;
      case (strpos($url, "anidex.info") == true):
          return ":torrent:";
        break;
      case (strpos($url, "mir.cr") == true || strpos($url, "mirrored.to") == true):
          return ":mirror:";
        break;
      default:
        return ":ddl:";
        break;
    }
  }
}