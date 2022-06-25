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

use Nagara\Src\Metode\MetodeWinnowingv2;

// data text
$wordtext1 = [
    0 => "ayah pergi kepasar",
    1 => "bapak pergi kepasar",
    2 => "ibu pergi mall",
];

// set config and run metode or algorithm
$winnowing = new MetodeWinnowingv2([
    "ngram" => 5,
    "key" => "secret",
    "window" => 4,
]);

// prosess data
$winnowing->process($wordtext1);

// method
echo "case folding";
dump($winnowing->getCaseFolding());
echo "ngram";
dump($winnowing->getNgram());
echo "rolling hash";
dump($winnowing->getRollingHash());
echo "window";
dump($winnowing->getWindow());
echo "fingerpint";
dump($winnowing->getFingersPrint());
echo "jaccard coefficient value";
dump($winnowing->getJaccardCoefficientValue());
echo "jaccard coefficient message";
dump($winnowing->getJaccardCoefficientMessage());
echo "get timer calculate progress";
dump($winnowing->timerCalculateProgress());
echo "get result similarity index change to data";
dump($winnowing->getJaccardCoefficientSimilarity());
echo "test decrypt";
dump($winnowing->get_word_similarity());
