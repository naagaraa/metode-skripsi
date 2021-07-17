<?php
include "vendor/autoload.php";
// use Nagara\Src\Metode\MetodeKmeans;

use Nagara\Src\Database\DB;
use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeWP;

// $n = [1,2,3,4,5,6,7,8,9];
// $a = [1,2,4,5,1,1,2,3,4];
// $b = [8,5,3,2,7,3,2,4,1];

// $c1= [1,1];
// $c2= [2,1];

// $metode = new MetodeKmeans;
// $metode->EuclidianDistance($n, $a, $b, $c1, $c2);










// metode WP














$c1 = [7,9,6,9];
$c2 = [10000,11000,9000,6000];
$c3 = [6,8,5,7];
$c4 = [9,8,7,8];
$c5 = [150,250,120,100];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

$matrix = new MatrixClass;
$arr = $matrix->flip_matrix($matrix_example);


$weight = [4,5,2,3,3];	# terdapat totalnya adalah 5 array
$kriteria_weight = [
	"0" => "keuntungan",
	"1" => "biaya",
	"2" => "keuntungan",
	"3" => "keuntungan",
	"4" => "biaya",
];


$metode = new MetodeWP;
// $metode->normaliasai_bobot($weight, $kriteria_weight);
// $test = $metode->pembagian_nilai_bobot($kriteria_weight);
// $metode->vector_s($kriteria_weight, $arr);
// $metode->vector_v();
$hasil = $metode->WeightProduct($weight,$kriteria_weight,$arr);
dump($hasil);
// dump($test);
