<?php
include "vendor/autoload.php";
include "database/database.php";

use Nagara\Src\Metode\MetodeLinearRegresion;
use Nagara\Src\Math\MatrixClass;

// query database
$normalisasi_query = "SELECT * FROM normalisasi";
// result query
$result_all = query($normalisasi_query);
// hasil query
$data_siswa = fetch_assoc($result_all);

$matrix = new MatrixClass;
$x = $matrix->make_field_matrix($data_siswa,["kedisiplinan"]);
$y = $matrix->make_field_matrix($data_siswa,["kehadiran"]);

dump($x);
dump($y);
// regresi linear
// variabel x dan y masing masing berjumlah 30
// varaibel x adalah rata rata suhu
// $x = [24,22,21,20,22,19,20,23,24,25,21,20,20,19,25,27,28,25,26,24,27,23,24,23,22,21,26,25,26,27];

// // variabel y adalah jumlah cacat
// $y = [10,5,6,3,6,4,5,9,11,13,7,4,6,3,12,13,16,12,14,12,16,9,13,11,7,5,12,11,13,14];

// // linerar regresion
// $metode = new MetodeLinearRegresion;
// $hasil_prediction_x = [];

// // single prediction
// $prediction_single_y = $metode->LinearRegresion_x($x, $y, 30);   // return 19.12 prediksi cacat
// $prediction_single_x = $metode->LinearRegresion_y($x, $y, 4);  // return 19.57 prediksi suhu

// // multiple linear regresion y
// foreach ($y as $key => $value) {
//     $hasil_prediction_x[$key] = $metode->LinearRegresion_y($x, $y, $value);
// }

// // multiple linear regresion x
// $hasil_prediction_y = [];
// foreach ($x as $key => $value) {
//     $hasil_prediction_y[$key] = $metode->LinearRegresion_x($x, $y, $value);
// }

// var_dump($prediction_single_y);
// var_dump($prediction_single_x);
// var_dump($hasil_prediction_x);
// var_dump($hasil_prediction_y);