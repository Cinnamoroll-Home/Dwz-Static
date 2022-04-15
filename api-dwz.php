<?php
/*
=========================================================
* 玉桂短网址- v0.1.0
=========================================================
* Product Page: https://github.com/Cinnamoroll-Home/Cinnamoroll-Dwz
* Copyright 2022 Cinnamoroll (https://mojy.xyz)
* Coded by Cinnamoroll
* Based on Xuhai / Pt-url.
*/
$long_url = urlencode($_GET['url']);
$_POST['kind'] = $_GET['domain'];
//get请求
function get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
//返回结果
require "./urls.php";
echo $short_url;
?>
