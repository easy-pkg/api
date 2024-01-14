<?php

$json = array(
    'easy_version' => '1.1',
    'error' => 'Endpoint unavailable',
    'endpoints' => ['packages']
);

header('Content-Type: application/json');
echo json_encode($json);

?>
