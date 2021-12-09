# Winnowing

The winnow algorithm is a technique from machine learning for learning a linear classifier from labeled examples. It is very similar to the perceptron algorithm. However, the perceptron algorithm uses an additive weight-update scheme, while Winnow uses a multiplicative scheme that allows it to perform much better when many dimensions are irrelevant (hence its name winnow). It is a simple algorithm that scales well to high-dimensional data. During training, Winnow is shown a sequence of positive and negative examples. From these it learns a decision hyperplane that can then be used to label novel examples as positive or negative. The algorithm can also be used in the online learning setting, where the learning and the classification phase are not clearly separated.

### caution

this algorithm i'm not write with my self, i'm just re wrting for improve and make stand alone algorithm, for reusabilty use. and can used multiple string.

### reference

- https://en.wikipedia.org/wiki/Winnow_(algorithm)

## Basic usage

```php
include "vendor/autoload.php";

use Nagara\Src\Metode\MetodeWinnowing;

// tulis ulang algoritma for support multiple string
// example string
$wordtext1 = [
    1 => "ayah pergi kepasar",
    2 => "ibu pergi kepasar",
];

// example string
$wordtext2 = [
    1 => "ayah pergi kepasar",
    2 => "ibu pergi kepasar",
    3 => "paman pergi kepasar",
];

// config windowing algorithm
$config = [
    "ngram" => 5,
    "prima" => 2,
    "window" => 4
];

// run metode or algorithm
$metode = new MetodeWinnowing($config);
$metode->process($wordtext1);

// show result (array view)
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
echo "jaccard coefficient";
dump($metode->getJaccardCoefficient());



```

## reference

- gist https://gist.github.com/naagaraa/c144af0dc761abbb6c97842f990aee8c

- orginal reference :
  - atomicbomber winnowing document similarity calculator https://github.com/atomicbomber-git/winnowing-document-similarity-calculator/tree/master/app/Http/Controllers 4 july 2020
  - atomicbomber winnowing document similarity calculator https://github.com/atomicbomber-git/winnowing-document-similarity-calculator/tree/5efb3b8043d2add91c2425e06a3fdb6e3ca71288/app/Support 4 july 2020
  - muhrusdi https://github.com/muhrusdi/winnowing-app/tree/master/app/Http/Controllers 26 september 2017
  - gladmartin https://github.com/gladmartin/ci-winnowing/blob/master/application/libraries/Winnowing.php 13 agustus 2019

## improve :warning:

done can improve multiple string, but now need to find count similarity
