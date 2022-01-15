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

use Nagara\Src\Metode\MetodeSMA;


/**
 * formula error :
 * nilai terbesar di dalam data - nilai peramalan dalam deret
 * 
 * formula peramalan periode :
 * Ft = (Yt-1)+(Yt-2)+(Yt-3)..+(Yt-n) / n
 * 
 * ft : peramalan untuk periode t
 * Yt-1 + Yt-2 + ... +Yt -n : jumlah data dalam periode n sebelumnya
 * n : jumlah periode dalam rata rata gerak.
 */
// format data mentah
$data = [
   [
      "bulan" => "januari",
      "tahun" => 2018,
      "penjualan" => 89
   ],
   [
      "bulan" => "februari",
      "tahun" => 2018,
      "penjualan" => 95
   ],
   [
      "bulan" => "maret",
      "tahun" => 2018,
      "penjualan" => 85
   ],
   [
      "bulan" => "april",
      "tahun" => 2018,
      "penjualan" => 75
   ],
   [
      "bulan" => "mei",
      "tahun" => 2018,
      "penjualan" => 86
   ],
   [
      "bulan" => "juni",
      "tahun" => 2018,
      "penjualan" => 100
   ],
   [
      "bulan" => "juli",
      "tahun" => 2018,
      "penjualan" => 120
   ],
   [
      "bulan" => "agustus",
      "tahun" => 2018,
      "penjualan" => 95
   ],
   [
      "bulan" => "september",
      "tahun" => 2018,
      "penjualan" => 80
   ],
   [
      "bulan" => "oktober",
      "tahun" => 2018,
      "penjualan" => 92
   ],
   [
      "bulan" => "november",
      "tahun" => 2018,
      "penjualan" => 92
   ],
   [
      "bulan" => "desember",
      "tahun" => 2018,
      "penjualan" => 88
   ],
   [
      "bulan" => "januari",
      "tahun" => 2018,
      "penjualan" => 90
   ],
   [
      "bulan" => "februari",
      "tahun" => 2018,
      "penjualan" => 95
   ],
   [
      "bulan" => "maret",
      "tahun" => 2018,
      "penjualan" => 100
   ],
   [
      "bulan" => "april",
      "tahun" => 2018,
      "penjualan" => 102
   ],
   [
      "bulan" => "mei",
      "tahun" => 2018,
      "penjualan" => 100
   ],
   [
      "bulan" => "juni",
      "tahun" => 2018,
      "penjualan" => 104
   ],
];

// initialize metode
$metode = new MetodeSMA;

// parameter pertama data, paramter kedua nama field
$metode->proses($data, "bulan");

echo "hasil normalisasi data <br>";
dump($metode->getNormalisasi());
echo "hasil proses bergerak SMA (single moving average) <br>";
dump($metode->getResult());