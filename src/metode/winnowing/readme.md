# Winnowing

The winnow algorithm is a technique from machine learning for learning a linear classifier from labeled examples. It is very similar to the perceptron algorithm. However, the perceptron algorithm uses an additive weight-update scheme, while Winnow uses a multiplicative scheme that allows it to perform much better when many dimensions are irrelevant (hence its name winnow). It is a simple algorithm that scales well to high-dimensional data. During training, Winnow is shown a sequence of positive and negative examples. From these it learns a decision hyperplane that can then be used to label novel examples as positive or negative. The algorithm can also be used in the online learning setting, where the learning and the classification phase are not clearly separated.

### reference

- https://en.wikipedia.org/wiki/Winnow_(algorithm)

## Basic usage

```php
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


```

## reference

- gist https://gist.github.com/naagaraa/c144af0dc761abbb6c97842f990aee8c

- orginal reference :
  - atomicbomber winnowing document similarity calculator https://github.com/atomicbomber-git/winnowing-document-similarity-calculator/tree/master/app/Http/Controllers 4 july 2020
  - muhrusdi https://github.com/muhrusdi/winnowing-app/tree/master/app/Http/Controllers 26 september 2017
  - gladmartin https://github.com/gladmartin/ci-winnowing/blob/master/application/libraries/Winnowing.php 13 agustus 2019

## improve

this algorithm need improve for multiple string. atau butuh improve untuk pebanding lebih dari satu
