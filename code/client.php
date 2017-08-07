<?php

// create gearman client

$client = new GearmanClient();
$client->addServer('127.0.0.1');

// config

$numbers = [
    1, 2
];

// do a task with gearman worker

$res = $client->doNormal('get_sequence', json_encode($numbers));

// decode answer

$lines = json_decode($res, true);
if (empty($lines)) {
    die('empty answer');
}

// output as csv

foreach ($lines as $numbers) {
    $line = implode(', ', $numbers);
    echo($line . PHP_EOL);
}
