<?php
require_once("function.php");
$u_req = $sql->real_escape_string(@$_REQUIRE["type"]);
$u_fansub = $sql->real_escape_string(@$_REQUIRE["whos"]);
$u_ids = $sql->real_escape_string(@$_REQUIRE["ids"]);

if(strlen($u_req) > 1)
  $u_req = $u_req;
else
  $u_req = "JSON";

if($u_fansub == "shinobi") {
  if(is_numeric($u_ids))
    $data = $common->get_raw_logs($u_ids);
  else
    $data = $common->get_raw_logs();
  header('Content-Type: application/json');
  echo json_encode(array(
    "title" => $data["title"],
    "post_data" => $data["sh"],
    "post_tags" => $common->get_tags($data["title"])));
}

if($u_fansub == "wiensubs") {
  if(is_numeric($u_ids))
    $data = $common->get_raw_logs($u_ids);
  else
    $data = $common->get_raw_logs();
  header('Content-Type: application/json');
  echo json_encode(array(
    "title" => base64_encode($data["title"]),
    "post_data" => $data["ws"],
    "post_tags" => base64_encode($common->get_tags($data["title"]))));
}