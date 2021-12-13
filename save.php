<?php

include 'data.php';

var_dump($arr);

$data = json_decode(file_get_contents('php://input'), true);

$index = $data['index'];

$color = $data['color'];

$arr[$index] = $color;


file_put_contents('data.php', '<?php $arr = ' . var_export($arr, true) . ';');
