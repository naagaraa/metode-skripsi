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
$c1 = [4,4,4,3,3];
$c2 = [5,4,3,3,3];
$c3 = [4,3,5,2,2];
$c4 = [4,3,4,2,2];
$c5 = [5,4,1,3,3];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

// bobotnya range 1 : 100 
$weight = [20,30,10,30,10];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "biaya",
	"1" => "keuntungan",
	"2" => "biaya",
	"3" => "keuntungan",
	"4" => "keuntungan",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

$values = array();
$values[0] = 5;
$values[1] = 12;
$values[2] = 19;
$values[3] = 9;
$values[4] = 5;

$metode = new MetodeOreste;
$hasil = $metode->besson_rank($c2);
// $hasil = $metode->rank_array($values);
echo "<br>";
// $hasil = $metode->rank_array($c1);


// dump($hasil);

// $ordered_values = $values;
// rsort($ordered_values);

// foreach ($values as $key => $value) {
//     foreach ($ordered_values as $ordered_key => $ordered_value) {
//         if ($value === $ordered_value) {
//             $key = $ordered_key;
//             break;
//         }
//     }
//     echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';
// }


  
// // Create a 2D array
// $arr = array(
//     array (105, 96, 112), 
//     array(96, 45, 63) 
// );
  
// // Initialize a number which
// // need to fine in the array
// $num = 4;
  
// // Declare a boolean variable and
// // initialize it with false
// $found = FALSE;
  
// // Outer loop
// for($i = 0; $i < 2; $i++) {
      
//     // Inner loop
//     for($j = 0; $j < 3; $j++) {
          
//         if($num == $arr[$i][$j]) {
//             $found = TRUE;
              
//             // Terminate the outer loop
//             // using goto keyword
//             goto terminateLoop;
//         }
//     } 
// }
  
// // target label
// terminateLoop:
  
// // Check number is found or not
// if( $found )
//     echo $num . " is found in the array";
// else
//     echo $num . " is not found in the given array";