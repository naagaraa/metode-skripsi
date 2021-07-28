<?php

/**
 * this file for tested during I am develop metode skripshit
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
use Nagara\Src\Metode\MetodeOreste;

# kriteria value
$c1 = [4, 4, 4, 3, 3];
$c2 = [5, 4, 3, 3, 3];
$c3 = [4, 3, 5, 2, 2];
$c4 = [4, 3, 4, 2, 2];
$c5 = [5, 4, 1, 3, 3];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

# transform matrix
$matrix = new MatrixClass;
$matrix_value = $matrix->flip_matrix($matrix_example);

// bobotnya range 1 : 100 [30,10,20,10,30]
$weight = [0.3, 0.1, 0.2, 0.1, 0.3];	# terdapat totalnya adalah 5 array

# buat object baru dari metodenya
$metode = new MetodeOreste;
$oreste = $metode->oreste($matrix_example, $weight);


# get value only
$besson = $metode->getBessonRank();
$distanceScore = $metode->getDistanceScore();
$preferensi = $metode->getPreferensi();
$tmppreferensi = $metode->getTempPreferensi();


dump($besson);
dump($distanceScore);
dump($preferensi);
dump($tmppreferensi);

die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-5 mb-5">
		<h1 class="mt-5">Metode Oreste</h1>
		<p class="mb-5" >this my question ? user non programer or math need this formula ? hahaha mybe user just only want the final result not table formula . oke nope. let's make it</p>


		<h3 class="mt-2 mb-2">Weight / Bobot</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">Weight</th>
					<th scope="col">index</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($weight as $index => $value) : ?>
					<tr>
						<td><?= $index + 1 ?></td>
						<td><?= $value ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<h3 class="mt-5 mb-2">Matrix</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">C1</th>
					<th scope="col">C2</th>
					<th scope="col">C3</th>
					<th scope="col">C4</th>
					<th scope="col">C5</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($matrix_value as $value) : ?>
					<tr>
						<td><?= $value[0] ?></td>
						<td><?= $value[1] ?></td>
						<td><?= $value[2] ?></td>
						<td><?= $value[3] ?></td>
						<td><?= $value[4] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>


		<h3 class="mt-5 mb-2">Besson Rank</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">C1</th>
					<th scope="col">C2</th>
					<th scope="col">C3</th>
					<th scope="col">C4</th>
					<th scope="col">C5</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($besson as $value) : ?>
					<tr>
						<td><?= $value[1] ?></td>
						<td><?= $value[2] ?></td>
						<td><?= $value[3] ?></td>
						<td><?= $value[4] ?></td>
						<td><?= $value[5] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<h3 class="mt-5 mb-2">Distance Score</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">C1</th>
					<th scope="col">C2</th>
					<th scope="col">C3</th>
					<th scope="col">C4</th>
					<th scope="col">C5</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($distanceScore as $value) : ?>
					<tr>
						<td><?= $value[1] ?></td>
						<td><?= $value[2] ?></td>
						<td><?= $value[3] ?></td>
						<td><?= $value[4] ?></td>
						<td><?= $value[5] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>


		<h3 class="mt-5 mb-2">Preferensi</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Preferensi</th>
					<th scope="col">index</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				sort($preferensi);
				$counter = 0;
				?>
				<?php foreach ($preferensi as $rank => $value) : ?>
					<?php $counter++ ?>
					<tr>
						<td><?= "P0{$counter}" ?></td>
						<td><?= $value ?></td>
						<td><?= $rank + 1 ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
</body>

</html>