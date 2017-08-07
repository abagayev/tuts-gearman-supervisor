<?php

require_once __DIR__ . '/lib.php';

// create gearman worker

$worker = new GearmanWorker();
$worker->addServer('127.0.0.1');

// register function with a callback

$worker->addFunction('get_sequence', function ($job) {
    // decode input
    $content = $job->workload();
    $data = json_decode($content, true);

    // calculate sequence and return result
    $rows = fibonacci($data);
    return json_encode($rows);
});

// make it work in a loop

for ($i = 0; $i < 100; ++$i) {
    $worker->work();
}
