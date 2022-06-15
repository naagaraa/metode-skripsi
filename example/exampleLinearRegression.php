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
use Nagara\Src\Metode\MetodeLinearRegresion; // load libraries

// nilai x dan y total jumlahnya harus sama

// varaibel x adalah rata rata suhu
$x = [24, 22, 21, 20, 22, 19, 20, 23, 24, 25, 21, 20, 20, 19, 25, 27, 28, 25, 26, 24, 27, 23, 24, 23, 22, 21, 26, 25, 26, 27]; # 30 data

// variabel y adalah jumlah cacat
$y = [10, 5, 6, 3, 6, 4, 5, 9, 11, 13, 7, 4, 6, 3, 12, 13, 16, 12, 14, 12, 16, 9, 13, 11, 7, 5, 12, 11, 13, 14]; # 30 data

// linerar regresion
$metode = new MetodeLinearRegresion;

// form
if (!isset($_POST["suhu"])) {
    // single prediction
    $prediction_single_x = $metode->LinearRegresion_x($x, $y, 0); // return 19.12 prediksi cacat

    $const_a = $metode->getConstA();
    $const_b = $metode->getConstB();
    $x2 = $metode->getValueX2();
    $y2 = $metode->getValueY2();
    $xy = $metode->getValueXY();

    // data
    $example_matrix = [$x, $y, $x2, $y2, $xy];
    $matrix = new MatrixClass;
    $data = $matrix->flip_matrix($example_matrix);
    // return true;
} else {

    // single prediction
    $prediction_single_x = $metode->LinearRegresion_x($x, $y, 4); // return 19.12 prediksi cacat
    $const_a = $metode->getConstA();
    $const_b = $metode->getConstB();
    $x2 = $metode->getValueX2();
    $y2 = $metode->getValueY2();
    $xy = $metode->getValueXY();

    // data
    $example_matrix = [$x, $y, $x2, $y2, $xy];
    $matrix = new MatrixClass;
    $data = $matrix->flip_matrix($example_matrix);

    $suhu = $_POST["suhu"];
    $suhu = intval($suhu);
    $prediction_single_x = $metode->LinearRegresion_y($x, $y, $suhu);
}

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
		<h1 class="mt-5">Metode Linear Regresion</h1>
		<p class="mb-5" >this my question ? user non programer or math need this formula ? hahaha mybe user just only want the final result not table formula . oke nope. let's make it</p>


		<div class="mt-5">
			<h5>total data x : <?=count($x)?></h2>
			<h5>total data Y : <?=count($y)?></h2>
			<br>
			<h5>nilai const a : <?=$const_a?></h2>
			<h5>nilai const b : <?=$const_b?></h2>
		</div>

		<div class="mt-5">
			<form method="POST">
				<div class="mb-3">
					<label class="form-label">suhu</label>
					<input type="number" name="suhu" class="form-control" value="0">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<p class="mt-3">jika rata rata suhu <?=isset($suhu) ? $suhu : 0?></p>
			<p>jumlah cacat adalah <?=$prediction_single_x?></p>
		</div>

		<h3 class="mt-5 mb-2">Matrix</h3>
		<table class="table mt-2">
			<thead>
				<tr>
					<th scope="col">X</th>
					<th scope="col">Y</th>
					<th scope="col">X2</th>
					<th scope="col">Y2</th>
					<th scope="col">XY</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $value): ?>
					<tr>
						<td><?=$value[0]?></td>
						<td><?=$value[1]?></td>
						<td><?=$value[2]?></td>
						<td><?=$value[3]?></td>
						<td><?=$value[4]?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</body>
</html>