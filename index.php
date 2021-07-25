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

use Nagara\Src\Database\DB;
use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeSaw; // load libraries


// untuk config bisa di pass ke variabel atau langsung ke constructornya
$type = "mysql";
$servername = "localhost";
$database = "saw-database";
$username = "root";
$password = "";

// pass ke constructorynya
$db = new DB($type, $servername, $username, $password, $database);

// query database
$data_siswa = $db->select("SELECT * FROM normalisasi");


// Object Oriented
$metode = new MetodeSaw;
$hasil = $metode->saw($data_siswa, 6 , 0,[
    "kedisiplinan", "kehadiran", "nilai_raport","nilai_keterampilan", "nilai_kebaikan","nilai_kesehatan"
],[
    5,10,15,20,25,25
],"hasil");

dump($hasil);
