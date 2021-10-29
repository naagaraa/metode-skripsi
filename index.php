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

use Nagara\Src\Metode\MetodeLinearRegresion; // load libraries

// nilai x dan y total jumlahnya harus sama

// varaibel x adalah rata rata suhu
$x = [24, 22, 21, 20, 22, 19, 20, 23, 24, 25, 21, 20, 20, 19, 25, 27, 28, 25, 26, 24, 27, 23, 24, 23, 22, 21, 26, 25, 26, 27];

// variabel y adalah jumlah cacat
$y = [10, 5, 6, 3, 6, 4, 5, 9, 11, 13, 7, 4, 6, 3, 12, 13, 16, 12, 14, 12, 16, 9, 13, 11, 7, 5, 12, 11, 13, 14];


// example another data
// $x = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
// $y = [71, 70, 69, 68, 64, 65, 72, 78, 75, 75, 75, 70];
// $z = [13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];


// Object Oriented style
// linerar regresion
$metode = new MetodeLinearRegresion;


// single prediction
$prediction_single_x = $metode->LinearRegresion_x($x, $y, 30);   // return 19.12 prediksi cacat
$prediction_single_y = $metode->LinearRegresion_y($x, $y, 4);  // return 19.57 prediksi suhu

// multiple linear regresion y
// $multiple_y = $metode->MultipleLinearRegresion($x, $y, $z, "y");

// multiple linear regresion 
// $multiple_x = $metode->MultipleLinearRegresion($x, $y, $z, "x");

// combinasi atau gabungkan dan buat field baru
// $hasil = $metode->Combine_LinearRegresion($data_siswa, $x, $y, $z, "x", "result_akhir");

// debug hasil menggunakan dump
dump($prediction_single_y);
dump($prediction_single_x);
// dump($multiple_x);
// dump($multiple_y);
// dump($hasil);
