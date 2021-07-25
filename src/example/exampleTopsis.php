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
include "../../vendor/autoload.php";

use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeTopsis; // load libraries

// contoh 3 data
$c1 = [5,5,5];
$c2 = [2,1,3];
$c3 = [1,1,1];
$c4 = [4,3,4];
$c5 = [1,1,1];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

$matrix = new MatrixClass;
$alternative = $matrix->flip_matrix($matrix_example);

$weight = [5,3,4,2,5];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "biaya",
	"1" => "keuntungan",
	"2" => "biaya",
	"3" => "keuntungan",
	"4" => "keuntungan",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

$metode = new MetodeTopsis;

$hasil = $metode->topsis($matrix_example,$weight,$kriteria_weight); // hasil array
$normalisasi = $metode->getNormalisasi();
$normalisasiTerbobot = $metode->getNormalisasiTerbobot();
$matrixSolusiIdeal = $metode->getMatrixSolusiIdeal();
$total = $metode->getTotal();

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

    <div class="container">
        <h1 class="mt-5">Metode TOPSIS</h1>
        <p class="mb-5" >this my question ? user non programer or math need this formula ? hahaha mybe user just only want the final result not table formula . oke nope. let's make it</p>
        
        <h3 class="mt-5 mb-2">Nilai Alternative</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">C1</th>
					<th scope="col">C2</th>
					<th scope="col">C3</th>
					<th scope="col">C4</th>
					<th scope="col">C5</th>
				</tr>
			</thead>
			<tbody>
                <?php $counter = 0?>
				<?php foreach ($alternative as $value) : ?>
                    <?php $counter++ ?>
					<tr>
						<td><?= "A0{$counter}" ?></td>
						<td><?= round($value[0],5) ?></td>
						<td><?= round($value[1],5) ?></td>
						<td><?= round($value[2],5) ?></td>
						<td><?= round($value[3],5) ?></td>
						<td><?= round($value[4],5) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

        <h3 class="mt-5 mb-2">Normalisasi</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">C1</th>
					<th scope="col">C2</th>
					<th scope="col">C3</th>
					<th scope="col">C4</th>
					<th scope="col">C5</th>
				</tr>
			</thead>
			<tbody>
                <?php $counter = 0?>
				<?php foreach ($normalisasi as $value) : ?>
                    <?php $counter++ ?>
					<tr>
						<td><?= "A0{$counter}" ?></td>
						<td><?= round($value[0],5) ?></td>
						<td><?= round($value[1],5) ?></td>
						<td><?= round($value[2],5) ?></td>
						<td><?= round($value[3],5) ?></td>
						<td><?= round($value[4],5) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

        <h3 class="mt-5 mb-2">Normalisasi Terbobot</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">C1</th>
					<th scope="col">C2</th>
					<th scope="col">C3</th>
					<th scope="col">C4</th>
					<th scope="col">C5</th>
				</tr>
			</thead>
			<tbody>
                <?php $counter = 0?>
				<?php foreach ($normalisasiTerbobot as $value) : ?>
                    <?php $counter++ ?>
					<tr>
						<td><?= "A0{$counter}" ?></td>
						<td><?= round($value[0],5) ?></td>
						<td><?= round($value[1],5) ?></td>
						<td><?= round($value[2],5) ?></td>
						<td><?= round($value[3],5) ?></td>
						<td><?= round($value[4],5) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>


        <h3 class="mt-5 mb-2">Matrix Solusi Ideal</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">C1</th>
					<th scope="col">C2</th>
					<th scope="col">C3</th>
					<th scope="col">C4</th>
					<th scope="col">C5</th>
				</tr>
			</thead>
			<tbody>
                <?php $counter = 0?>
				<?php foreach ($matrixSolusiIdeal as $key => $value) : ?>
                    <?php $counter++ ?>
					<tr>
                        <?php if($key == 0):?>
                            <td>positif</td>
                        <?php else:?>
                            <td>negatif</td>
                        <?php endif;?>
						<td><?= round($value[0],5) ?></td>
						<td><?= round($value[1],5) ?></td>
						<td><?= round($value[2],5) ?></td>
						<td><?= round($value[3],5) ?></td>
						<td><?= round($value[4],5) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>


        <h3 class="mt-5 mb-2">Matrix Solusi Ideal</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">positif</th>
					<th scope="col">negatif</th>
					<th scope="col">preferensi</th>
				</tr>
			</thead>
			<tbody>
                <?php $counter = 0?>
				<?php foreach ($total as  $value) : ?>
                    <?php $counter++ ?>
					<tr>
                        <td><?= "A0{$counter}" ?></td>
						<td><?= round($value[0],5) ?></td>
						<td><?= round($value[1],5) ?></td>
						<td><?= round($value[2],5) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

    </div>
    
</body>
</html>


