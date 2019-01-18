<?php

$sql = new mysqli("localhost", "root", "Florin12", "tla");

class db {
  public function register_eps($name, $data_ws, $data_sh) {
    global $sql;
    $data_ws = base64_encode($data_ws);
    $data_sh = base64_encode($data_sh);
    $name = $sql->real_escape_string($name);
    $time = time();
    $sql->query("INSERT INTO `ep_logs` (`a_name`,`data_ws`,`data_sh`, `time`) VALUES ('$name', '$data_ws', '$data_sh', '$time')");
    return true;
  }
}