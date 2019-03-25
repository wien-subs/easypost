<?php
class common {
  public function get_tags($name) {
    if(!strpos($name, "Necunoscut")) {
      preg_match('~^(.*) (-|–) (.*|[[:digit:]]{2,3})~m', $name, $pattern);
      preg_match('~[[:digit:]]{2,3}~m', $pattern[0], $nr_eps);
      $data = $pattern[1].' rosub, '.$pattern[1].' subtitrat in romana, '.$pattern[1].' online romana, '.$pattern[1].' in romana, '.$pattern[1].' in romana download, '.$pattern[1].' download, '.$pattern[1].' descarcare, '.$pattern[1].' tradus in romana, '.$pattern[1].' tradus online, '.$pattern[1].' online in romana, Episodul '.$nr_eps[0].' din '.$pattern[1].' in romana, '.$pattern[1].' - '.$nr_eps[0].'  subtitrat, '.$pattern[1].' - '.$nr_eps[0].' rosubbed, '.$pattern[1].' rosubbed, '.$pattern[1].' - '.$nr_eps[0].' online in romana';
      return $data;
    }
    else
      return false;
  }
  
  public function get_auto_complete_index($table) {
    global $sql;
    $data = $sql->query("select * from `$table`");
    $keepme = "";
    while($row = $data->fetch_object()) {
      $keepme .= '"'.$row->name.'": null,'.PHP_EOL;
    }
    return $keepme;
  }
  
  public function get_url_id($url) {
    switch($url) {
      case (strpos($url, "dailymotion.com") == true):
        preg_match('~(/embed/video/|/video/)([[:alnum:]]{7,9})~', $url, $pattern);
        $retrun = array(
          "dl" => null,
          "iframe" => "//www.dailymotion.com/embed/video/".$pattern[2],
          "iframe_shinobi" => true,
          "source_id" => $pattern[2]);
        return $retrun;
        break;
      case (strpos($url, "drive.google.com") == true):
        preg_match('~(/d/)(([A-Za-z0-9_=+-]){24,})~', $url, $pattern);
        $retrun = array(
          "dl" => "//drive.google.com/file/d/".$pattern[2]."/view?usp=sharing",
          "iframe" => "//drive.google.com/file/d/".$pattern[2]."/preview",
          "iframe_shinobi" => true,
          "source_id" => $pattern[2]);
        return $retrun;
        break;
      case (strpos($url, "vidoza.net") == true):
        preg_match('~([[:alnum:]]){12,13}~', $url, $pattern);
        $retrun = array(
          "dl" => "//vidoza.net/".$pattern[0].".html",
          "iframe" => "//vidoza.net/embed-".$pattern[0].".html",
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "stream.moe") == true):
        preg_match('~[[:alnum:]]{16,18}~', $url, $pattern);
        $retrun = array(
          "dl" => "//stream.moe/".$pattern[0],
          "iframe" => "//stream.moe/embed2/".$pattern[0],
          "iframe_shinobi" => true,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "openload.co") == true):
        preg_match('~[[:alnum:]_+-]{9,12}~',$url, $pattern);
        $retrun = array(
          "dl" => "//openload.co/f/".$pattern[0],
          "iframe" => "//openload.co/embed/".$pattern[0],
          "iframe_shinobi" => true,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "streamango.com") == true):
        preg_match('~[[:alnum:]_+-]{15,18}~',$url, $pattern);
        $retrun = array(
          "dl" => "//streamango.com/f/".$pattern[0],
          "iframe" => "//streamango.com/embed/".$pattern[0],
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "mp4upload.com") == true):
        preg_match('~[[:alnum:]]{11,14}~',$url, $pattern);
        $retrun = array(
          "dl" => "//www.mp4upload.com/".$pattern[0],
          "iframe" => "//www.mp4upload.com/embed-".$pattern[0].".html",
          "iframe_shinobi" => true,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "yourupload.com") == true):
        preg_match('~/(watch|embed)/([[:alnum:]]{11,14})~',$url, $pattern);
        $retrun = array(
          "dl" => "//www.yourupload.com/watch/".$pattern[2],
          "iframe" => "//www.yourupload.com/embed/".$pattern[2],
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "fembed.com") == true):
        preg_match('~[[:alnum:]]{10,13}~',$url, $pattern);
        $retrun = array(
          "dl" => "//www.fembed.com/f/".$pattern[0],
          "iframe" => "//www.fembed.com/v/".$pattern[0],
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "nofile.io") == true):
        preg_match('~[[:alnum:]]{10,13}~',$url, $pattern);
        $retrun = array(
          "dl" => "//nofile.io/f/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
          return $retrun;
        break;
      case (strpos($url, "sendvid.com") == true):
        preg_match('~[[:alnum:]]{8,10}~',$url, $pattern);
        $retrun = array(
          "dl" => null,
          "iframe" => "//sendvid.com/embed/".$pattern[0],
          "iframe_shinobi" => true,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "mirrorace.com") == true):
        preg_match('~/m/([[:alnum:]]{4,6})~',$url, $pattern);
        $retrun = array(
          "dl" => "//mirrorace.com/m/".$pattern[1],
          "iframe" => "//mirrorace.com/m/embed/".$pattern[1],
          "iframe_shinobi" => true,
          "source_id" => $pattern[1]);
        return $retrun;
        break;
      case (strpos($url, "mir.cr") == true || strpos($url, "mirrored.to") == true):
        preg_match('~/[[:alnum:]]{7,9}~',$url, $pattern);
        $retrun = array(
          "dl" => "//mir.cr/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "video.sibnet.ru") == true):
        preg_match('~\d{7,9}~',$url, $pattern);
        $retrun = array(
          "dl" => null,
          "iframe" => "//video.sibnet.ru/shell.php?videoid=".$pattern[0],
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "mega.nz") == true):
        preg_match('~\S#([[:ascii:]]){10,53}~',$url, $pattern);
        $retrun = array(
          "dl" => "//mega.nz/".str_replace('/','',$pattern[0]),
          "iframe" => "//mega.nz/embed".str_replace('/','',$pattern[0]),
          "iframe_shinobi" => true,
          "source_id" => str_replace('/','',$pattern[0]));
        return $retrun;
        break;
      case (strpos(strtolower($url), "sendit.cloud") == true):
        preg_match('~[[:alnum:]]{12,14}~',$url, $pattern);
        $retrun = array(
          "dl" => "//sendit.cloud/".$pattern[0],
          "iframe" => "//sendit.cloud/embed-".$pattern[0].".html",
          "iframe_shinobi" => true,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "tusfiles.com") == true):
        preg_match('~[[:alnum:]]{12,14}~',$url, $pattern);
        $retrun = array(
          "dl" => "//tusfiles.com/".$pattern[0],
          "iframe" => "//tusfiles.com/embed-".$pattern[0].".html",
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "go4up.com") == true):
        preg_match('~[[:alnum:]]{12,14}~',$url, $pattern);
        $retrun = array(
          "dl" => "//go4up.com/dl/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "girlshare.ro") == true):
        preg_match('~(\d){7,}.(\d)~',$url, $pattern);
        $retrun = array(
          "dl" => "//girlshare.ro/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "ok.ru") == true):
        preg_match('~[[:digit:]]{11,15}~',$url, $pattern);
        $retrun = array(
          "dl" => null,
          "iframe" => "//ok.ru/videoembed/".$pattern[0],
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "filelist.ro") == true):
        preg_match('~[[:digit:]]{6,7}~',$url, $pattern);
        $retrun = array(
          "dl" => "//filelist.ro/details.php?id=".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "nyaa.si") == true):
        preg_match('~[[:digit:]]{6,7}~',$url, $pattern);
        $retrun = array(
          "dl" => "//nyaa.si/veiw/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
      case (strpos($url, "anidex.info") == true):
        preg_match('~[[:digit:]]{5,7}~',$url, $pattern);
        $retrun = array(
          "dl" => "//anidex.info/torrent/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
      case (strpos($url, "anime-torrents.ro") == true):
        preg_match('~[[:digit:]]{1,5}~',$url, $pattern);
        $retrun = array(
          "dl" => "//anime-torrents.ro/torrent/view/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      case (strpos($url, "s.go.ro") == true):
        preg_match('~(([[:alnum:]]){7,9})~',$url, $pattern);
        $retrun = array(
          "dl" => "//s.go.ro/".$pattern[0],
          "iframe" => null,
          "iframe_shinobi" => false,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      default:
        return "";
        break;
    }
  }

  public function iframe($iurl) {
    return '<iframe src="'.$iurl.'" width="640" height="380" scrolling="no" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>';
  }

  public function get_log_by_id($id) {
    global $sql;
    $data = $sql->query("select * from `ep_logs` where `id`='".$sql->real_escape_string($id)."'");
    if($data->num_rows > 0) {
      $data = $data->fetch_object();
      return array("title" => $data->a_name,
      "time" => date("d.m.Y @ h:i:s", $data->time),
      "ws" => htmlentities(base64_decode($data->data_ws)),
      "sh" => htmlentities(base64_decode($data->data_sh))
      );
    }
    else
      return false;
  }
}