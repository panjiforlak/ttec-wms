<?php
if (!function_exists('google_translate')) {
    function google_translate($text, $d = '', $s = 'in', $f = 'text')
    {
        if ($d == '') $d = $s;
        if ($d != $s) {
            $lang_pair = urlencode($s . '|' . $d);
            $q = rawurlencode($text);
            // Google's API translator URL
            $url = "http://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=" . $q . "&langpair=" . $lang_pair . "&format=" . $f;
            // Make sure to set CURLOPT_REFERER because Google doesn't like if you leave the referrer out
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_REFERER,  base_url());
            $body = curl_exec($ch);
            curl_close($ch);

            $json = json_decode($body, true);
            $tranlate = $json['responseData']['translatedText'];
            echo $tranlate;
        } else {
            echo $text;
        }
    }
}
// if (!function_exists('translatetext')) {
function translatetext($text, $to = 'en')
{
    $from = 'en';
    // $to = 'zh-CN';
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, 'https://translate.googleapis.com/translate_a/single?client=gtx&sl=' . $from . '&tl=' . $to . '&dt=t&q=' . urlencode($text));
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curlSession);
    $jsonData = json_decode($response);
    curl_close($curlSession);

    if (isset($jsonData[0][0][0])) {
        return $jsonData[0][0][0];
    } else {
        return false;
    }
}
// }
