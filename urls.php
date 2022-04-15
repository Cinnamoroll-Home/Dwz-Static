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
if ($_POST['kind'] == 'mtw') {
    $short_url = get("https://dwz.mojy.xyz/api-dwz.php?domain=mtw&url=" . $long_url);
} elseif ($_POST['kind'] == 'm6z') {
    $short_url = get("https://dwz.mojy.xyz/api-dwz.php?domain=m6z&url=" .$long_url);
} elseif ($_POST['kind'] == 'u6v') {
    $short_url = get("https://dwz.mojy.xyz/api-dwz.php?domain=u6v&url=" .$long_url);
} elseif ($_POST['kind'] == 'tinyurl') {
    $short_url = get("https://tinyurl.com/api-create.php?url=" .$long_url);
} else {
    $short_url = '';
}
?>
