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


use Nagara\Src\Metode\MetodeSaw;

// menggunakan example array
$ipk = [3.92, 3.95, 3.4, 4.0, 3.2];
$pengahasilan = [2, 3, 4, 3, 1];
$tanggungan = [2, 2, 3, 4, 2];
$prestasi = [4, 3, 2, 4, 1];
$lokasi = [100, 89, 70, 120, 140];

// membuat matrix
$example_matrix = [$ipk, $pengahasilan, $tanggungan, $prestasi, $lokasi];

$weight = [0.25, 0.15, 0.20, 0.30, 0.10];
$kriteria = [
    0 => "benefit",
    1 => "cost",
    2 => "benefit",
    3 => "benefit",
    4 => "cost"
];

// formula metode
$metode = new MetodeSaw;
$metode->saw($example_matrix, $kriteria, $weight);

// get value
$normalisasi = $metode->getNormalisasi();
$rangked = $metode->getRangked();

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
        <h1 class="mt-5">Metode SAW</h1>
        <p class="mb-5">this my question ? user non programer or math need this formula ? hahaha mybe user just only want the final result not table formula . oke nope. let's make it</p>

        <h3 class="mt-2 mb-2">weight</h3>
        <table class="table mt-2">
            <tr>
                <th>Weight</th>
            </tr>
            <?php foreach ($weight as $key => $value) : ?>
                <tr>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h3 class="mt-2 mb-2">matrix</h3>
        <table class="table mt-2">
            <tr>
                <th>C1</th>
                <th>C1</th>
                <th>C1</th>
                <th>C1</th>
                <th>C1</th>
            </tr>
            <?php foreach ($example_matrix as $key => $value) : ?>
                <tr>
                    <td><?= $value[0] ?></td>
                    <td><?= $value[1] ?></td>
                    <td><?= $value[2] ?></td>
                    <td><?= $value[3] ?></td>
                    <td><?= $value[4] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h3 class="mt-2 mb-2">normalisasi</h3>
        <table class="table mt-2">
            <tr>
                <th>C1</th>
                <th>C1</th>
                <th>C1</th>
                <th>C1</th>
                <th>C1</th>
            </tr>
            <?php foreach ($normalisasi as $key => $value) : ?>
                <tr>
                    <td><?= $value[0] ?></td>
                    <td><?= $value[1] ?></td>
                    <td><?= $value[2] ?></td>
                    <td><?= $value[3] ?></td>
                    <td><?= $value[4] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h3 class="mt-2 mb-2">rangked</h3>
        <table class="table mt-2">
            <tr>
                <th>#</th>
                <th>rank</th>
            </tr>
            <?php $num = 1 ?>
            <?php foreach ($rangked as $key => $value) : ?>
                <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>