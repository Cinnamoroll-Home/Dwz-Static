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
error_reporting(0);
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');

//还原短网址
function restoreUrl($shortUrl)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $shortUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0');
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_NOBODY, false);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
    $data = curl_exec($curl);
    $curlInfo = curl_getinfo($curl);
    curl_close($curl);
    if ($curlInfo['http_code'] == 301 || $curlInfo['http_code'] == 302) {
        return $curlInfo['redirect_url'];
    }
    return '';
}
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
function returnResult($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $res_data['url'] = $url;
        $res_data['status'] = 1;
    } else {
        $res_data['status'] = 0;
        $res_data['msg'] = '获取失败';
    }
    exit(json_encode($res_data));
}
if ($_POST['type'] == 'toLong') {
    $long_url = restoreUrl($_POST['url']);
    returnResult($long_url);
} elseif ($_POST['type'] == 'toShort') {
    $long_url=urlencode($_POST['url']);
    require "./urls.php";
    returnResult($short_url);
} else {
    returnResult('');
}
?>
