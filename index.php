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


use Nagara\Src\Metode\MetodeFuzzySugeno;    // load library

// range kurva segitga 1 - 5 [1 , 2, 3, 4, 5]

// example 3 value
$a = 5;
$b = 5;
$c = 5; 

// get value
$metode = new MetodeFuzzySugeno;
$hasil_defuzifikasi = $metode->FuzzySugeno($a, $b, $c); //return value 1 or 0

// debug
dump($hasil_defuzifikasi);

// penentuan kompeten atau tidak kompetern
if ($hasil_defuzifikasi  > 0) {
    echo "selamat anda kompeten";
}else{
    echo "maaf anda tidak kompeten";
}