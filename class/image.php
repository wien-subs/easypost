<?php
class img {
  private function do_upload_imgur($img) {
    $client_id="4e68108573073bb";
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $img);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url=$pms['data']['link'];
    if($url != "")
      return $url;
    else
      return "image was not uploaded";
  }
  public function image($img) {
    return $this->do_upload_imgur($img);
  }
}