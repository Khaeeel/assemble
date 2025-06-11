<?php
$ch = curl_init('https://getcomposer.org/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Curl executed successfully';
}

curl_close($ch);
