<?php

/**
 * this file for tested during I am develop metode skripshit
 *
 * @author      Eka Jaya Nagara <ekabersinar@gmail.com>
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

$data = [
    [
        "bulan" => "januari",
        "tahun" => 2018,
        "penjualan" => 89,
    ],
    [
        "bulan" => "februari",
        "tahun" => 2018,
        "penjualan" => 95,
    ],
    [
        "bulan" => "maret",
        "tahun" => 2018,
        "penjualan" => 85,
    ],
    [
        "bulan" => "april",
        "tahun" => 2018,
        "penjualan" => 75,
    ],
    [
        "bulan" => "mei",
        "tahun" => 2018,
        "penjualan" => 86,
    ],
    [
        "bulan" => "juni",
        "tahun" => 2018,
        "penjualan" => 100,
    ],
    [
        "bulan" => "juli",
        "tahun" => 2018,
        "penjualan" => 120,
    ],
    [
        "bulan" => "agustus",
        "tahun" => 2018,
        "penjualan" => 95,
    ],
    [
        "bulan" => "september",
        "tahun" => 2018,
        "penjualan" => 80,
    ],
    [
        "bulan" => "oktober",
        "tahun" => 2018,
        "penjualan" => 92,
    ],
    [
        "bulan" => "november",
        "tahun" => 2018,
        "penjualan" => 92,
    ],
    [
        "bulan" => "desember",
        "tahun" => 2018,
        "penjualan" => 88,
    ],
    [
        "bulan" => "januari",
        "tahun" => 2018,
        "penjualan" => 90,
    ],
    [
        "bulan" => "februari",
        "tahun" => 2018,
        "penjualan" => 95,
    ],
    [
        "bulan" => "maret",
        "tahun" => 2018,
        "penjualan" => 100,
    ],
    [
        "bulan" => "april",
        "tahun" => 2018,
        "penjualan" => 102,
    ],
    [
        "bulan" => "mei",
        "tahun" => 2018,
        "penjualan" => 100,
    ],
    [
        "bulan" => "juni",
        "tahun" => 2018,
        "penjualan" => 104,
    ],
];

use Nagara\Src\Metode\MetodeWMA;

// initialize metode
$metode = new MetodeWMA;
$pergerakan = 3;

$metode->proses($data, "penjualan", $pergerakan);

$normalisasi = $metode->getNormalisasi();
$prediksi = $metode->getResult();
$sum = $metode->getSum();

// dd($sum);

?>

<h3>Example metode WMA Hasil Dalam Bentuk Table</h3>
<p>dengan pergerakan = <?=$pergerakan?></p>
<table border="1">
  <tr>
    <th>No<th>
    <th>normalisasi</th>
    <th>sum</th>
    <th>prediksi</th>
  </tr>
  <?php $no = 1?>
  <?php foreach ($normalisasi as $key => $value): ?>
  <tr>
    <td><?=$no++?><td>
    <td><?=$normalisasi[$key]?></td>
    <?php if (!isset($sum[$key])): ?>
        <td> - </td>
	    <?php else: ?>
        <td><?=$sum[$key]?></td>
    <?php endif;?>
    <?php if (!isset($prediksi[$key])): ?>
        <td> - </td>
	    <?php else: ?>
        <td><?=$prediksi[$key]?></td>
    <?php endif;?>
  </tr>
  <?php endforeach;?>
</table>
