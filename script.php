<?php

$group_id = "351768918325060";
$access_token = "CAAVRh7pwX8YBAP5LQc7TZBhimMe8junCKMTbZCBpC0bHmTWB9ZCT4uZA2ZC4SsjmgYLNcZAqTwqwenWGh4FXr3287sjxZBAMzcDHysZBQyx5zw86GWNWArYaRPzM2wt4ZBZCpUTqY9PP3qwdDTNsWecpW7pK4ukd8mA6XARA7eDhVJuuqIQKhBzfrTiqSF7GuIZB7Nk2RNudz97Qz8gUutvtocg";

function generateRandomWord($length) {
    $randString = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12345678910';
    $result = '';
    for($i=0;$i<$length;$i++) {
        $result = $result . $randString[rand(0,strlen($randString)-1)];
    }
    return $result;
}

function generateSentence($length) {
    $randomSentence = '';
    for($i=0;$i<$length;$i++) {
        $randomSentence = $randomSentence . (($i!=0)?" ":"") . generateRandomWord(rand(10,20));
    }
    return $randomSentence;
}

function generateRandomSentence() {
    return generateSentence(rand(40,50));
}

$url = "https://graph.facebook.com/$group_id/feed?access_token=$access_token&message=" . urlencode(generateRandomSentence()) . " http://www.google.com  " .  "&method=POST";
$curl_instance = curl_init($url);
curl_setopt($curl_instance, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl_instance);
echo $result."\n";
