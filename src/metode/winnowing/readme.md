# Winnowing

The winnow algorithm is a technique from machine learning for learning a linear classifier from labeled examples. It is very similar to the perceptron algorithm. However, the perceptron algorithm uses an additive weight-update scheme, while Winnow uses a multiplicative scheme that allows it to perform much better when many dimensions are irrelevant (hence its name winnow). It is a simple algorithm that scales well to high-dimensional data. During training, Winnow is shown a sequence of positive and negative examples. From these it learns a decision hyperplane that can then be used to label novel examples as positive or negative. The algorithm can also be used in the online learning setting, where the learning and the classification phase are not clearly separated.

### caution

this algorithm i'm not write with my self, i'm just re wrting for improve and make stand alone algorithm, for reusabilty use. and can used multiple string.

### reference

- https://en.wikipedia.org/wiki/Winnow_(algorithm)
- https://gist.github.com/LogIN-/e451ab0e8738138bc60b

## Basic usage
### winnowing V2
in v1 winnowing for hash using ord and make hash to ascii char

```php
include "vendor/autoload.php";

use Nagara\Src\Metode\MetodeWinnowing;


// tulis ulang algoritma for support multiple string

// example string 1
$wordtext1 = [
    0 => "ayah pergi kepasar",
    1 => "ibu pergi kepasar",
];

// example string 2
$wordtext2 = [
    0 => "ayah pergi kepasar",
    1 => "bapak pergi kepasar",
    2 => "ibu pergi mall",
];

// set config and run metode or algorithm
$winnowing = new MetodeWinnowing([
    "ngram" => 5,
    "prima" => 2,
    "window" => 4
]);
$winnowing->process($wordtext1);

// show result (array view)
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


```

### winnowing V2
at this winnowing v2 get new method and remove prime number for make rollinghas. i change to encode and decode code for decode result fingerprint end get the word / ngram value. in v1 winnowing for hash using ord and make hash to ascii char

```php
use Nagara\Src\Metode\MetodeWinnowingv2;

$wordtext1 = [
   0 => "ayah pergi kepasar",
   1 => "bapak pergi kepasar",
   2 => "ibu pergi mall",
];

// set config and run metode or algorithm
$winnowing = new MetodeWinnowingv2([
   "ngram" => 5,
   "key" => "secret",
   "window" => 4
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

```

## how it's work ?

document extraction string or only string at index 0 will compare to another index. if you have 2 string.

**example 2 string :**

- string A : "ayah pergi kepasar"
- string B : "ibu pergi kepasar"

**array format :**
if you write at program like this array format

```php
$wordtext1 = [
    0 => "ayah pergi kepasar",
    1 => "ibu pergi kepasar",
];
```

```
-string(A) index 0 compare to string(B) index 1
```

**example more 2 string**

- string A : "ayah pergi kepasar"
- string B : "ibu pergi kepasar"
- string C : "ibu pergi mall"

**array format :**
if you write at program like this array format

```php
$wordtext1 = [
    0 => "ayah pergi kepasar",
    1 => "ibu pergi kepasar",
    2 => "ibu pergi mall"
];
```

```
- string(A) index 0 compare to string(B) index 1
- string(A) index 0 compare to string(C) index 2
```

## reference

- gist https://gist.github.com/naagaraa/c144af0dc761abbb6c97842f990aee8c

- orginal reference :
  - atomicbomber winnowing document similarity calculator https://github.com/atomicbomber-git/winnowing-document-similarity-calculator/tree/master/app/Http/Controllers 4 july 2020
  - atomicbomber winnowing document similarity calculator https://github.com/atomicbomber-git/winnowing-document-similarity-calculator/tree/5efb3b8043d2add91c2425e06a3fdb6e3ca71288/app/Support 4 july 2020
  - muhrusdi https://github.com/muhrusdi/winnowing-app/tree/master/app/Http/Controllers 26 september 2017
  - gladmartin https://github.com/gladmartin/ci-winnowing/blob/master/application/libraries/Winnowing.php 13 agustus 2019

## improve :warning:

done can improve multiple string, but now need to find decript hash for find text for make highlight same or similary text

## Similarity Calculate

i found some artikel when I try searching at internet, first from stack overflow, itnext.io, catalysoft there explain about topic.

**reference reading**

- catalysoft http://www.catalysoft.com/articles/StrikeAMatch.html
- stack overflow https://stackoverflow.com/questions/653157/a-better-similarity-ranking-algorithm-for-variable-length-strings
- itnext.io https://itnext.io/string-similarity-the-basic-know-your-algorithms-guide-3de3d7346227
- another example code https://pastebin.com/EfcmR3Xx

### summarry

algorithm for similarty count is divide into several part.

1. Edit distance based.

   - Hamming Distance
   - Levenshtein distance
   - Jaro Winkler

2. Token based

   - jaccard index
   - sorensen-Dice

3. sequence based
   - Ratcliff Obershelp

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
