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
      header("Location: show.php?id=$id");
   }
   catch (Exception $e) {
     header("Location: index.php?status=error&msg=".$e->getMessage());
   }
    break;
  default:
    return 0;
}