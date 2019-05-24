<pre>
<?php

$url = 'https://apicrudproject.000webhostapp.com/Books/read.php/?apikey=5ce1642337e67';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$json = json_encode($response);

$arr = json_decode($json);

print_r($arr);

?>