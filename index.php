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

use Nagara\Src\Doc\DocumentExcel;
use Nagara\Src\Metode\MetodeSaw;

// init office tools
$excel =  new DocumentExcel;
$excel->read("saw-example.csv");
$excel->execute();

// save single martix to variabel
$ipk = $excel->showByColumn("ipk");
$pengahasilan = $excel->showByColumn("penghasilan");
$tanggungan = $excel->showByColumn("tanggungan");
$prestasi = $excel->showByColumn("prestasi");
$lokasi = $excel->showByColumn("lokasi rumah");

// membuat matrix
$example_matrix = [$ipk,$pengahasilan,$tanggungan, $prestasi, $lokasi];

$weight = [0.25,0.15,0.20,0.30,0.10];
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

// debug value
dump($normalisasi);
dump($rangked);


