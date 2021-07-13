<?php
include "vendor/autoload.php";
use Nagara\Src\Metode\MetodeKmeans;

$n = [1,2,3,4];
$a = [1,2,4,5];
$b = [1,1,3,4];

$c1= [1,1];
$c2= [2,1];

$metode = new MetodeKmeans;

$metode->EuclidianDistance($n, $a, $b, $c1, $c2);


