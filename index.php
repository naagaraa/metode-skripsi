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

# siapkan data dalam format array atau matrix
# sumber referensi pembuatan dari teori ke bentuk code
# https://bukuinformatika.com/metode-weighted-product/ untuk example gue melakukan
# translate coding

// contoh untuk 4 data
$c1 = [7,9,6,9];
$c2 = [10000,11000,9000,6000];
$c3 = [6,8,5,7];
$c4 = [9,8,7,8];
$c5 = [150,250,120,100];

// contoh untuk 6 data
// $c1 = [7,9,6,9,8,6];
// $c2 = [10000,11000,9000,6000,6000,8000];
// $c3 = [6,8,5,7,7,5];
// $c4 = [9,8,7,8,8,5];
// $c5 = [150,250,120,100,100,50];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

$matrix = new MatrixClass;
$arr = $matrix->flip_matrix($matrix_example); # flip matrix

$weight = [4,5,2,3,3];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "keuntungan",
	"1" => "biaya",
	"2" => "keuntungan",
	"3" => "keuntungan",
	"4" => "biaya",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

# object MetodeWp
$metode = new MetodeWP;

# hasil berupa array
$hasil = $metode->WeightProduct($weight,$kriteria_weight,$arr);
var_dump($hasil);
