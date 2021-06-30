<?php
include "../vendor/autoload.php";

$arr = array(30, 2, 30, 7, 90, 35, 35, 35, 78);
rsort($arr);
echo array_search(35,$arr,true);

$dups = array();
foreach(array_count_values($arr) as $val => $c)
    if($c > 1) $dups[] = $val;


dump($dups);
dump(array_count_values($arr));

dump($arr);
