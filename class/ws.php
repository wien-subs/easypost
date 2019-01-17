<?php
class wiensubs {
  public function ws($data, $who) {
    $header = '<div class="alert alert-info text-center"><a href="https://shinobifansub.com/" taget="_blank"><i class="fas fa-handshake"></i> Serie realizată în parteneriat cu Shinobi-Fansub <i class="fas fa-handshake"></i></a><br/><span title="Traducere realizată de '.$who["tl"].'" data-toggle="tooltip" data-html="true"> <i class="fas fa-file-alt"></i> '.$who["tl"].'</span> <span title="Corectare realizată de '.$who["tlc"].' " data-toggle="tooltip" data-html="true"><i class="fas fa-pencil-alt"></i> '.$who["tlc"].'</span> <span title="Karoake &amp; K-T &amp; TypeSetting realizat de '.$who["edit"].'" data-toggle="tooltip" data-html="true"><i class="fab fa-gripfire"></i> '.$who["edit"].'</span> <span title="Encodare realizată de '.$who["enc"].'" data-toggle="tooltip" data-html="true"><i class="fas fa-cogs"></i> '.$who["enc"].'</span></div><div class="text-center"><a href="https://shinobifansub.com/" target="_blank"><img src="https://wien-subs.ro/asset/shinobi.png" alt="Shinobi-Fansub"/></a></div>';
    return $header.$this->ws_tab($data).$this->ws_ddl($data);
  }

  private function ws_ddl($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
    $ws_ddl = '<div class="downloadbox">'.PHP_EOL;
    foreach($match as $urls) {
      $keep = $urls[0];
      $durl = $common->get_url_id($keep);
      if($durl["dl"] !== null)
        $ws_ddl .= $this->gen_ws_ddl($durl["dl"], $keep);
    }
    $ws_ddl .='</div>';
    return $ws_ddl;
  }

  private function ws_tab($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
    $ws_tab = '[restabs alignment="osc-tabs-center" responsive="false"]'.PHP_EOL;
    $i = 1;
    foreach($match as $urls) {
      $keep = $urls[0];
      $durl = $common->get_url_id($keep);
      if($durl["iframe"] !== null) {
        if($i == 1) {
          $ws_tab .= $this->gen_ws_tabs($durl["iframe"], $keep, True);
          $i++;
        }
        else
          $ws_tab .= $this->gen_ws_tabs($durl["iframe"], $keep, False);
      }
    }
    $ws_tab .='[/restabs]'.PHP_EOL;
    return $ws_tab;
  }

  private function gen_ws_tabs($ifr, $tit, $active){ 
    $common = new common();
    if($active == true)
      return '[restab title="'.strtoupper($this->ws_get_tabt_class($tit)).'" active="active"]'.$common->iframe($ifr).'[/restab]'.PHP_EOL;
    else
      return '[restab title="'.strtoupper($this->ws_get_tabt_class($tit)).'"]'.$common->iframe($ifr).'[/restab]'.PHP_EOL;
  }

  private function gen_ws_ddl($link, $class){
    $icons = array("mega", "ol", "moe", "drive", "mp4", "fl", "kb", "tuf", "gp", "nf", "thev", "filec", "nyaa", "adex", "sfs", "yuc", "nova", "vidoza", "sit");
    if(in_array($this->ws_get_tabt_class($class), $icons))
      return '  <a href="'.$link.'" class="download '.$this->ws_get_tabt_class($class).'" target="_blank"> Download</a>'.PHP_EOL;
    else
      return '  <a href="'.$link.'" class="download" target="_blank">'.$this->ws_get_tabt_class($class).'</a>'.PHP_EOL;
  }

  private function ws_get_tabt_class($url) {
    switch($url) {
      case (strpos($url, "stream.moe") == true):
          return "moe";
        break;
      case (strpos($url, "openload.co") == true):
          return "ol";
        break;
      case (strpos($url, "mp4upload.com") == true):
          return "mp4";
        break;
      case (strpos($url, "yourupload.com") == true):
          return "YourUP";
        break;
      case (strpos($url, "mega.nz") == true):
          return "mega";
        break;
      case (strpos($url, "fembed.com") == true):
          return "FemBed";
        break;
      case (strpos($url, "nofile.io") == true):
          return "nf";
        break;
      case (strpos($url, "sendvid.com") == true):
          return "Svid";
        break;
      case (strpos($url, "mirrorace.com") == true):
          return "MirrAce";
        break;
      case (strpos($url, "mir.cr") == true || strpos($url, "mirrored.to") == true):
          return "MirrorRed";
        break;
      case (strpos($url, "video.sibnet.ru") == true):
        return "Sibnet";
        break;
      default:
        return "ERROR $url";
        break;
    }
  }
}