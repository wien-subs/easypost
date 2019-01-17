<?php
class shinobi {
  public function sh($data, $who, $img) {
    $images = new img();
    $images = $images->image($img);
    $header = "
  [CENTER]
  [IMG]".$images."[/IMG]
  [B] - Episodul 
  Tradus în limba română - Download & Online[/B]
  ";

    $middle="
  [I]Traducere: ".$who["tl"]."
  Verificare: ".$who["tlc"]."
  Editare: ".$who["edit"]."
  Encodare: ".$who["enc"]."[/I]

  Realizată în parteneriat cu Wien-Subs
  [URL='https://www.wien-subs.ro/'][IMG]https://wien-subs.ro/asset/wsh.png[/IMG][/URL]

  [B][I]Vitionare Plăcută![/I][/B]
  ";
  return $header.$this->sh_ddl($data).$middle.$this->sh_online($data);
    
  }

  private function sh_online($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
    $sh_online = '';
    $i=0;
    foreach($match as $urls) {
      $keep = $urls[0];
      $durl = $common->get_url_id($keep);
      if($durl["iframe"] !== null && $durl["iframe_shinobi"] == true) {
        $i++;
        $sh_online .= $this->get_sh_online($keep, $durl["source_id"], $i);
      }
    }
    return $sh_online;
  }

  private function get_sh_online($url, $iframe_id, $i) {
    switch($url) {
      case (strpos($url, "stream.moe") == true):
          return '[SPOILER="Sursa '.$i.'"][MEDIA=stream]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "openload.co") == true):
          return '[SPOILER="Sursa '.$i.'"][MEDIA=openload]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "mp4upload.com") == true):
          return '[SPOILER="Sursa '.$i.'"][MEDIA=mp4upload]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      case (strpos($url, "sendvid.com") == true):
          return '[SPOILER="Sursa '.$i.'"][MEDIA=sendvid]'.$iframe_id.'[/MEDIA][/SPOILER]'.PHP_EOL;
        break;
      default:
        return "";
        break;
    }
    
  }

  private function sh_ddl($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
    $sh_ddl = '[B]720p:[/B]';
    foreach($match as $link) {
      $keep = $link[0];
      $durl = $common->get_url_id($keep);
      if($durl["dl"] !== null)
        $sh_ddl .= " [URL='".$durl["dl"]."']".$this->sh_get_ddl_icon($durl["dl"])."[/URL] -";
    }
    return $sh_ddl;
  }

  private function sh_get_ddl_icon($url) {
    switch($url) {
      case (strpos($url, "stream.moe") == true):
          return ":stream:";
        break;
      case (strpos($url, "openload.co") == true):
          return ":openload:";
        break;
      case (strpos($url, "mp4upload.com") == true):
          return ":mp4u:";
        break;
      case (strpos($url, "yourupload.com") == true):
          return "YU";
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
      case (strpos($url, "mega.co") == true):
          return ":meganz:";
        break;
      case (strpos($url, "goole") == true):
          return ":gdrive:";
        break;
      case (strpos($url, "filelist.ro") == true):
          return ":filelist:";
        break;
      case (strpos($url, "nyaa.si") == true):
          return ":nyaa:";
        break;
      case (strpos($url, "mir.cr") == true || strpos($url, "mirrored.to") == true):
          return ":mirror:";
        break;
      default:
        return "";
        break;
    }
  }
}