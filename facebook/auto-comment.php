<?php
function auto_cmt_img($access_token,$idpost,$mess,$img){
    $url = "https://graph.facebook.com/{$idpost}/comments";
    $data = array(
        "access_token" => $access_token,
        "message" => $mess,
        "attachment_url" => $img
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    $result = json_decode($res,true);
    curl_close ($ch);
    if(array_key_exists("error",$result)){
      $kq = $result["error"]["message"];
      $msg = json_encode(["status"=>"die","msg"=>$kq]);
      return json_decode($msg,true);
    }else{
      return $result;
    }
}
function auto_cmt_no_img($access_token,$idpost,$mess,$img){
    $url = "https://graph.facebook.com/{$idpost}/comments";
    $data = array(
        "access_token" => $access_token,
        "message" => $mess,
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    $result = json_decode($res,true);
    curl_close ($ch);
    if(array_key_exists("error",$result)){
      $kq = $result["error"]["message"];
      $msg = json_encode(["status"=>"die","msg"=>$kq]);
      return json_decode($msg,true);
    }else{
      return $result;
    }
}
?>
