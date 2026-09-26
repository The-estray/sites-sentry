<?php

// $pdo = require_once __DIR__ . '/db.php';

// $raw = file_get_contents('sites.json');
// $data = json_decode($raw, true);

// foreach ($data as $url) {
//     $ch = curl_init();

//     $options = [
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_URL => $url,
//     ];

//     curl_setopt_array($ch, $options);

//     $res = curl_exec($ch);
//     $info = curl_getinfo($ch);
//     curl_close($ch);

//     $url = $info['url'];
//     $httpCode = $info['http_code'];
//     $totalTime = round($info['total_time'] * 1000) .  ' ms';

//     if ($httpCode === 0) {
//         echo "Site: '$url' | Code: [DOWN] | ERROR: Could not resolve host";
//     } else {
//         echo "Site: '$url' | Code: $httpCode | Total_time: $totalTime";
//     }
//     echo '<br>';
// }
