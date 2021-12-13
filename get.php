<?php

include 'data.php';

$out = '|';
ksort($arr);
foreach ($arr as $elem){
    $out .= $elem['r'] . ',' . $elem['g'] . ',' . $elem['b'] . '|';
}
echo $out;
