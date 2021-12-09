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

use Nagara\Src\Metode\MetodeRabinKarb;
use Nagara\Src\Metode\MetodeWinnowing;

// tulis ulang algoritma for support multiple string
// example string
$wordtext1 = [
    0 => "ayah pergi kepasar",
    1 => "ibu pergi kepasar",
];

// example string
$wordtext2 = [
    0 => "ayah pergi kepasar",
    1 => "bapak pergi kepasar",
    2 => "ibu pergi mall",
];

// config windowing algorithm
$config = [
    "ngram" => 5,
    "prima" => 2,
    "window" => 4
];

$metode = new MetodeWinnowing($config);
// process
$metode->process($wordtext1);


echo "case folding";
dump($metode->getCaseFolding());
echo "ngram";
dump($metode->getNgram());
echo "rolling hash";
dump($metode->getRollingHash());
echo "window";
dump($metode->getWindow());
echo "fingerpint";
dump($metode->getFingersPrint());
echo "jaccard coefficient value";
dump($metode->getJaccardCoefficientValue());
echo "jaccard coefficient message";
dump($metode->getJaccardCoefficientMessage());
