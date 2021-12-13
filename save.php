<?php

include 'data.php';

$data = json_decode(file_get_contents('php://input'), true);

$index = $data['index'];

$color = $data['color'];

$arr[$index] = $color;


$content = '<?php $arr = ' . var_export($arr, true) . ';';

file_put_contents('/data.php', $content);
