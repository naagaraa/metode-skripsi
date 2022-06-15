<?php

/**
 * this example view formula in html code
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi 
 * @license     MIT public license
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 */
include "vendor/autoload.php";


use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeWP;


$matrix = new MatrixClass;
$metode = new MetodeWP;


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

$weight = [4,5,2,3,3];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "keuntungan",
	"1" => "biaya",
	"2" => "keuntungan",
	"3" => "keuntungan",
	"4" => "biaya",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

$arr = $matrix->flip_matrix($matrix_example); # flip matrix

# hasil berupa array
$metode = new MetodeWP;
$hasil = $metode->WeightProduct($weight,$kriteria_weight,$arr);
$wj = $metode->getValueWj();
$si = $metode->getValueSi();
$vi = $metode->getValueVi();
$normalisasi = $metode->getNormalisasiWeight();
//dump($si); # debug hasil berupa array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 mb-5">
            <h1 class="mt-5">Metode Weight Product</h1>
            <p class="mb-5" >this my question ? user non programer or math need this formula ? hahaha mybe user just only want the final result not table formula . oke nope. let's make it</p>

            <h3 class="mt-2 mb-2">Weight Normalisasi step 1</h3>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Weight</th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 0?>
                    <?php foreach ($normalisasi as $index => $value) : ?>
                        <?php $counter++ ?>
                        <tr>
                            <td><?= "W{$counter}" ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3 class="mt-2 mb-2">W normalisasi step 2</h3>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">W</th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 0?>
                    <?php foreach ($wj as $index => $value) : ?>
                        <?php $counter++ ?>
                        <tr>
                            <td><?= "W{$counter}" ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3 class="mt-2 mb-2">S normalisasi</h3>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">S</th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 0?>
                    <?php foreach ($si as $index => $value) : ?>
                        <?php $counter++ ?>
                        <tr>
                            <td><?= "S{$counter}" ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3 class="mt-2 mb-2">V normalisasi</h3>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">V</th>
                    </tr>
                </thead>
                <tbody>
                <?php $counter = 0?>
                    <?php foreach ($vi as $index => $value) : ?>
                        <?php $counter++ ?>
                        <tr>
                            <td><?= "V{$counter}" ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</body>
</html>