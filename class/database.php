<?php

$sql = new mysqli("localhost", "root", "Florin12", "tla");

class db {
  public function register_eps($name, $data_ws, $data_sh) {
    global $sql;
    $data_ws = base64_encode($data_ws);
    $data_sh = base64_encode($data_sh);
    $name = $sql->real_escape_string($name);
    date_default_timezone_set('Europe/Bucharest');
    $time = time();
    if(strlen($name) < 3)
      $name = "Necunoscut";
    $sql->query("INSERT INTO `ep_logs` (`a_name`,`data_ws`,`data_sh`, `time`) VALUES ('$name', '$data_ws', '$data_sh', '$time')");
    return ($this->count_rows() + 1);
  }
  private function count_rows() {
    global $sql;
    $row = $sql->query("select * from `ep_logs`");
    $row = $row->num_rows;
    return $row;
  }
  public function showlogs($search = null) {
    global $sql;
    if(is_null($search))
      $data = $sql->query("select * from `ep_logs` Order by `id` DESC");
    else
      $data = $sql->query("select * from `ep_logs` WHERE `a_name` like '%$search%' ORDER BY `id` DESC");
    $keep = "";
    while($row = $data->fetch_object()) {
      $keep .="<tr><td>".$row->id."</td><td><a href='show.php?id=".$row->id."'>".$row->a_name."</a></td><td>".date("d.m.Y @ h:i:s", $row->time)."</td></tr>";
    }
    return $keep;
  }
}