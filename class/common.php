<?php
class common {
  function get_url_id($url) {
    switch($url) {
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
          "dl" => "//openload.co/f".$pattern[0],
          "iframe" => "//openload.co/embed".$pattern[0],
          "iframe_shinobi" => true,
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
          "iframe" => "//mirrorace.com/embed/".$pattern[1],
          "iframe_shinobi" => false,
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
          "dl" => "//mega.nz/".$pattern[0],
          "iframe" => "//mega.nz/embed".$pattern[0],
          "iframe_shinobi" => true,
          "source_id" => $pattern[0]);
        return $retrun;
        break;
      default:
        return "";
        break;
    }
  }

  function iframe($iurl) {
    return '<iframe src="'.$iurl.'" width="640" height="380" scrolling="no" frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>';
  }

}