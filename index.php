<?php

$pdo = require_once 'db.php';

$raw = file_get_contents('sites.json');
$data = json_decode($raw, true);

foreach ($data as $url) {
    $ch = curl_init();

    $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => $url,
    ];

    curl_setopt_array($ch, $options);

    $res = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    $url = $info['url'];
    $code = $info['http_code'];
    $totalTime = round($info['total_time'] * 1000);
    $timeToSave = ($code === 0) ? null : $totalTime;

    if ($code === 0) {
        echo "Site: '$url' | Code: DOWN | ERROR: Could not resolve host";
    } else {
        echo "Site: '$url' | Code: $code | Total_time: $totalTime ms";
    }

    $stmt = $pdo->prepare('INSERT INTO checks (status_code, url, response_time) VALUES (?,?,?)');
    $stmt->execute([$code, $url, $timeToSave]);
    echo '<br>';
}
