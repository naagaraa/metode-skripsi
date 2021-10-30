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

use Nagara\Src\Metode\winnowing; // load libraries

$kalimat = "ayah pergi ke pasar";
$kalimat2 = "ayah pergi ke pasar";

$n =  5;
$window = 4;
$prima = 2;

// dd($kalimat, $kalimat2, $n, $window, $prima);

$w = new winnowing($kalimat, $kalimat2);
$w->SetPrimeNumber($prima);
$w->SetNGramValue($n);
$w->SetNWindowValue($window);

$w->process();

$s = '';
foreach ($w->GetNGramFirst() as $ng) {
    $s .= $ng . ' ';
}

$s2 = '';
foreach ($w->GetNGramSecond() as $ng) {
    $s2 .= $ng . ' ';
}

$s3 = '';
foreach ($w->GetRollingHashFirst() as $rl) {
    $s3 .= $rl . ' ';
}

$s4 = '';
foreach ($w->GetRollingHashSecond() as $rl) {
    $s4 .= $rl . ' ';
}

$wdf = $w->GetWindowFirst();
$sWf = '';
for ($i = 0; $i < count($wdf); $i++) {
    $s = '';
    for ($j = 0; $j < $window; $j++) {
        $s .= $wdf[$i][$j] . ' ';
    }
    $sWf = "W-" . ($i + 1) . " : {" . rtrim($s, ' ') . "}\n";
}

$wds = $w->GetWindowSecond();
$sWs = '';
for ($i = 0; $i < count($wds); $i++) {
    $s = '';
    for ($j = 0; $j < $window; $j++) {
        $s .= $wds[$i][$j] . ' ';
    }
    $sWs = "W-" . ($i + 1) . " : {" . rtrim($s, ' ') . "}\n";
}

$s7 = '';
foreach ($w->GetFingerprintsFirst() as $fp) {
    $s7 .= $fp . ' ';
}

$s8 = '';
foreach ($w->GetFingerprintsSecond() as $fp) {
    $s8 .= $fp . ' ';
}

$count_fingers1 = count($w->GetFingerprintsFirst());
$count_fingers2 = count($w->GetFingerprintsSecond());

$count_union_fingers = count(array_merge($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond()));
$count_intersect_fingers = count(array_intersect($w->GetFingerprintsFirst(), $w->GetFingerprintsSecond()));

$result = [
    'nGramFirst' => rtrim($s, ' '),
    'nGramSecond' => rtrim($s2, ' '),
    'rollingHashFirst' => rtrim($s3, ' '),
    'rollingHashSecond' => rtrim($s4, ' '),
    'windowFirst' => $sWf,
    'windowSecond' => $sWs,
    'FingerprintsFirst' => rtrim($s7, ' '),
    'FingerprintsSecond' => rtrim($s8, ' '),
    'countFinger1' => $count_fingers1,
    'countFinger2' => $count_fingers2,
    'countUnionFingers' => $count_union_fingers,
    'countIntersectFingers' => $count_intersect_fingers,
    'percent' => $w->GetJaccardCoefficient()
];

dump($result);
