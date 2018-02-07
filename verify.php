<?php
$access_token = 'Ss8Yzw7R8t3wbyXWsBuP0Wjo1/j6Cm+vOmf2NiDl6q/Xesmhj9lCMoJEKhoXLfvR6bHo4L95eiTYC3HFkeRnTa9/c+1/JlS8QIDwC8XsYSJ/0Re+Q7ZTsQpTSJzxXVsIC+umGVHguuPlY60FN/SB5wdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>