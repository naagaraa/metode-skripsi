# Rabin Karb

In computer science, the Rabin–Karp algorithm or Karp–Rabin algorithm is a string-searching algorithm created by Richard M. Karp and Michael O. Rabin (1987) that uses hashing to find an exact match of a pattern string in a text. It uses a rolling hash to quickly filter out positions of the text that cannot match the pattern, and then checks for a match at the remaining positions. Generalizations of the same idea can be used to find more than one match of a single pattern, or to find matches for more than one pattern.

### reference

- https://en.wikipedia.org/wiki/Rabin%E2%80%93Karp_algorithm

### caution

this algorithm i'm not write with my self, i'm just re wrting for improve and make stand alone algorithm, for reusabilty use. and can used multiple string.

## Basic usage

```php

include "vendor/autoload.php";

use Nagara\Src\Metode\MetodeRabinKarb;

// example string 1
$wordtext1 = [
    0 => "ayah pergi kepasar",
    1 => "ibu pergi kepasar",
];

// example string 2
$wordtext2 = [
    0 => "ayah pergi kepasar",
    1 => "bapak pergi mall",
    2 => "paman pergi kepasar dengan ayah",
];

// setting config and run algorithm
$rabinkarb = new MetodeRabinKarb([
    "ngram" => 5,
    "prima" => 2
]);
$rabinkarb->process($wordtext1);

// show result (array view);
dump("case folding");
dump($rabinkarb->getCaseFolding());
dump("ngram");
dump($rabinkarb->getNgram());
dump("hashing");
dump($rabinkarb->getHashing());
dump("matching");
dump($rabinkarb->getMacthing());
dump("dice coefficient");
dump($rabinkarb->getDiceCoefficient());

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

### jurnal reference

- jurnal : "Aplikasi Pendeteksi Tingkat Kesamaan Dokumen Teks:
  Algoritma Rabin Karp Vs. Winnowing"
- jurnal : "RABIN-CARP IMPLEMENTATION IN MEASURING SIMALIRITY OF
  RESEARCH PROPOSAL OF STUDENTS"

## improve :warning:

done can improve multiple string, but now need to find decript hash for find text for make highlight same or similary text

## Similarity Calculate

for calculate similarity this algorithm emmbed with Dice Similarity coefficient

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
