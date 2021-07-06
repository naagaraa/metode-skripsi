<?php
include "vendor/autoload.php";
include "database/database.php";

// query database
$normalisasi_query = "SELECT * FROM normalisasi";
// result query
$result_all = query($normalisasi_query);
// hasil query
$data_siswa = fetch_assoc($result_all);

use Nagara\Src\Metode\MetodeLinearRegresion; // load libraries
use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeFuzzySugeno;

$metode = new MetodeFuzzySugeno;

$a = 4;
$b = 4;
$c = 4;
$d = 4;

// debug
$hasil = $metode->FuzzySugeno($a, $b, $c, $d);
dump($hasil);

