<?php
include "vendor/autoload.php";
include "database/database.php";

// query database
// $normalisasi_query = "SELECT * FROM normalisasi";
// // result query
// $result_all = query($normalisasi_query);
// // hasil query
// $data_siswa = fetch_assoc($result_all);

use Nagara\Src\Metode\MetodeKmeans;

$n = [1,2,3,4];
$a = [1,2,4,5];
$b = [1,1,3,4];

// centroid
$c1 = [1,1];
$c2 = [2,1];

$metode =  new MetodeKmeans;
$hasil = $metode->EuclidianDistance($n, $a, $b, $c1, $c2);
// dump($hasil);
// dump($metode->elucidian);
dump($metode->sum_a);
dump($metode->sum_b);
dump($metode->cluster);