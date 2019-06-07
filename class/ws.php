<?php
class wiensubs {
  public function ws($data, $who, $beta = false, $part = false, $manga = false) {
    $header = '<div class="alert alert-info text-center"><a href="https://shinobifansub.com/" taget="_blank"><i class="fas fa-handshake"></i> Serie realizată în parteneriat cu Shinobi-Fansub <i class="fas fa-handshake"></i></a><br/><span title="Traducere realizată de '.$who["tl"].'" data-toggle="tooltip" data-html="true"> <i class="fas fa-file-alt"></i> '.$who["tl"].'</span> <span title="Corectare realizată de '.$who["tlc"].' " data-toggle="tooltip" data-html="true"><i class="fas fa-pencil-alt"></i> '.$who["tlc"].'</span> <span title="Karoake &amp; K-T &amp; TypeSetting realizat de '.$who["edit"].'" data-toggle="tooltip" data-html="true"><i class="fab fa-gripfire"></i> '.$who["edit"].'</span> <span title="Encodare realizată de '.$who["enc"].'" data-toggle="tooltip" data-html="true"><i class="fas fa-cogs"></i> '.$who["enc"].'</span></div><div class="text-center"><a href="https://shinobifansub.com/" target="_blank"><img src="https://wien-subs.moe/asset/shinobi.png" alt="Shinobi-Fansub"/></a></div>';
    $lq = '<h3 class="text-center" data-toggle="tooltip" data-placement="top" title="Aceasta versiune poate conține, greșeli gramaticale, greșeli de exprimare, calitatea video-ului scăzută. Echipa Wien-Subs nu își asumă responsabilitatea pentru acest episod. Îl vizionați pe propiul risc."> <i class="fas fa-low-vision text-danger"></i> Low Quality <i class="fas fa-low-vision text-danger"></i></h3>';
    $ant = "";
    if($beta == true)
      $ant .= $lq;
    if($part == true)
      $ant .= $header;
    
    return $ant.$this->ws_tab($data).$this->ws_ddl($data);
  }

  private function ws_ddl($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
    $ws_ddl = '<div class="downloadbox">'.PHP_EOL;
    $i = 0;
    foreach($match as $urls) {
      $i++;
      $keep = $urls[0];
      $durl = $common->get_url_id($keep);
      if($durl["dl"] !== null)
        $ws_ddl .= $this->gen_ws_ddl($durl["dl"], $keep);
    }
    if($i > 7)
      $ws_ddl = str_replace("> Download</a>","> DDL</a>", $ws_ddl);
    $ws_ddl .='</div>';
    return $ws_ddl;
  }

  private function ws_tab($data) {
    $common = new common();
    preg_match_all('/(http:|https:|)(\/\/)[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,5}(\/\S*)?/m', $data, $match, PREG_SET_ORDER);
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
    $icons = array("mega", "ol", "moe", "drive", "mp4", "fl", "kb", "tuf", "gp", "nf", "thev", "filec", "nyaa", "adex", "sfs", "yuc", "nova", "vidoza", "sit", "fb", "ma", "mr", "yup");
    if(in_array($this->ws_get_tabt_class($class), $icons))
      return '  <a href="'.$link.'" class="download '.$this->ws_get_tabt_class($class).'" target="_blank"> Download</a>'.PHP_EOL;
    else
      return '  <a href="'.$link.'" class="download" target="_blank">'.$this->ws_get_tabt_class($class).'</a>'.PHP_EOL;
  }

  private function ws_get_tabt_class($url) {
    switch($url) {
      case (strpos($url, "drive.google.com") == true):
          return "drive";
        break;
      case (strpos($url, "vidoza.net") == true):
          return "Vidz";
        break;
      case (strpos($url, "dailymotion.com") == true or strpos($url, "dai.ly") == true):
          return "Daily";
        break;
      case (strpos($url, "streamango.com") == true):
          return "Sgo";
        break;
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
          return "yup";
        break;
      case (strpos($url, "mega.nz") == true):
          return "mega";
        break;
      case (strpos($url, "fembed.com") == true):
          return "fb";
        break;
      case (strpos($url, "nofile.io") == true):
          return "nf";
        break;
      case (strpos($url, "sendvid.com") == true):
          return "Svid";
        break;
      case (strpos($url, "mirrorace.com") == true):
          return "ma";
        break;
      case (strpos($url, "mir.cr") == true || strpos($url, "mirrored.to") == true):
          return "mr";
        break;
      case (strpos($url, "video.sibnet.ru") == true):
          return "Sibnet";
        break;
      case (strpos($url, "sendit.cloud") == true):
          return "sit";
        break;
      case (strpos($url, "tusfiles.com") == true):
          return "tuf";
        break;
      case (strpos($url, "filelist.ro") == true):
          return "fl";
        break;
      case (strpos($url, "nyaa.si") == true):
          return "nyaa";
        break;
      case (strpos($url, "anime-torrents.ro") == true):
          return "Anime-Torrents";
        break;
      case (strpos($url, "anidex.info") == true):
          return "adex";
        break;
      case (strpos($url, "go4up.com") == true):
          return "gp";
        break;
      case (strpos($url, "ok.ru") == true):
          return "OK";
      case (strpos($url, "vup.to") == true):
          return "vUP";
      case (strpos($url, "s.go.ro") == true):
          return "Pack";
        break;
      case (strpos($url, "girlshare.ro") == true):
          return "GS";
        break;
      default:
        return "!DDL";
        break;
    }
  }
}