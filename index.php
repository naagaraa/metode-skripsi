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

