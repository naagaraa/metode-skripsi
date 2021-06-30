<?php
include "vendor/autoload.php";
include "database/database.php";

use Nagara\Src\Metode\MetodeSaw;

// query database
$normalisasi_query = "SELECT * FROM normalisasi";
// result query
$result_all = query($normalisasi_query);
// hasil query
$data_siswa = fetch_assoc($result_all);
