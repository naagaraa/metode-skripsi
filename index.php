<?php
include "vendor/autoload.php";

use Nagara\Src\Database\DB;

$type = "mysql";
$servername = "localhost";
$database = "saw-database";
$username = "root";
$password = "";

$db = new DB($type, $servername, $username, $password, $database);
$tb_normalisasi = $db->select("SELECT * FROM normalisasi");


// use Nagara\Src\Metode\MetodeKmeans;

// $n = [1,2,3,4];
// $a = [1,2,4,5];
// $b = [1,1,3,4];

// // centroid
// $c1 = [1,1];
// $c2 = [2,1];

// $metode =  new MetodeKmeans;
// $hasil = $metode->EuclidianDistance($n, $a, $b, $c1, $c2);
// // dump($hasil);
// // dump($metode->elucidian);
// dump($metode->sum_a);
// dump($metode->sum_b);
// dump($metode->cluster);

