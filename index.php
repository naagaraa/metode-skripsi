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

use Nagara\Src\Math\MathematicClass;
use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeOreste;
use Nagara\Src\Metode\MetodeTopsis;

// kriteria value
/**
 * Harga
 * kualitas
 * pelayanan
 * daya tarik
 * lokasi
 */
// $c1 = [3,4,2,2,5];
$c1 = [4,4,4,3,3,1];
$c2 = [5,4,3,3,3,5];
$c3 = [4,3,5,2,2,5];
$c4 = [4,3,4,2,2,3];
$c5 = [5,4,1,3,3,1];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

// bobotnya range 1 : 100 
$weight = [0.3,0.1,0.2,0.1,0.3];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "biaya",
	"1" => "keuntungan",
	"2" => "biaya",
	"3" => "keuntungan",
	"4" => "keuntungan",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column


// buat object baru
$metode = new MetodeOreste;
$oreste = $metode->oreste($matrix_example, $weight);

// get value only
$besson = $metode->getBessonRank();
$distanceScore = $metode->getDistanceScore();
$preferensi = $metode->getPreferensi();


echo "besson rank <br>";
dump($besson);
echo "distance score <br>";
dump($distanceScore);
echo "preferensi <br>";
dump($preferensi);
echo "oreste<br>";
dump($oreste);