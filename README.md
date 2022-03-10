# METODE-SKRIPSI
what is that ? metode skripshit is my personal package library php publish at packagist can used with composer. this library include metode mostly used at skripsI write with OOP PHP. contains metode statistic and string

---

Thank you kindly for the ⭐ and forks. When I first started working on this project in 2019, I had just undergraduated from college and had no prior exposure to web-development or open source. cause i'am start learn web-development and also explorer to many algorithm mostly used at skripsi (TA). so why i'am not build the package for reusability ? why not.

Without financial support, it was overwhelming to fix these issues, adding new method, reading a journal, not to mention that I felt like an absolute imposter. With a heavy heart 💔, I decided to keep continue :( and this in my portofolio my project

---

## PROJECT DOCUMENTATION
before you used this library maaybe you can read this, and for note i'am not often update documentation


- [documentation-indonesia](https://github.com/naagaraa/metode-skriphit/tree/main/documents/manual-indonesia.md)
- [documentation-english](https://github.com/naagaraa/metode-skriphit/tree/main/documents/manual-english.md)

- [wiki](https://github.com/naagaraa/metode-skriphit/tree/main/wiki.md) |  indonesia
- [official-web](https://nagara.gitbook.io/myphp-tools/) | indonesia
- [youtube-video](https://www.youtube.com/playlist?list=PLK5_CL-hAKCfNQkFHBOigInCJKk_F6-mY) | indonesia

---

## HOW TO USED ?

you need package manager [composer](https://getcomposer.org/) dpwnload and install it. and run this comand below inside your project.


```bash
composer require nagara/metode-skripshit
```

:warning note

okay, if you newbie used composer or write in native code, you need call this file in every file you need the tools for autoload composer.
```php
<?php
include "vendor/autoload.php";

...
// another code here

```

if you used framework like Laravel or anything and have fiture autoload you no needed call "include". just call the namespace and create object. example

```php

use Nagara\Src\Metode\MetodeSMA;

// initialize metode
$metode = new MetodeSMA;

// format data
$data = [
   [
      "bulan" => "januari",
      "tahun" => 2018,
      "penjualan" => 89
   ],
   [
      "bulan" => "februari",
      "tahun" => 2018,
      "penjualan" => 95
   ],
   [
      "bulan" => "maret",
      "tahun" => 2018,
      "penjualan" => 85
   ],
   [
      "bulan" => "april",
      "tahun" => 2018,
      "penjualan" => 75
   ],
   [
      "bulan" => "mei",
      "tahun" => 2018,
      "penjualan" => 86
   ],
   [
      "bulan" => "juni",
      "tahun" => 2018,
      "penjualan" => 100
   ],
   [
      "bulan" => "juli",
      "tahun" => 2018,
      "penjualan" => 120
   ],
   [
      "bulan" => "agustus",
      "tahun" => 2018,
      "penjualan" => 95
   ],
   [
      "bulan" => "september",
      "tahun" => 2018,
      "penjualan" => 80
   ],
   [
      "bulan" => "oktober",
      "tahun" => 2018,
      "penjualan" => 92
   ],
   [
      "bulan" => "november",
      "tahun" => 2018,
      "penjualan" => 92
   ],
   [
      "bulan" => "desember",
      "tahun" => 2018,
      "penjualan" => 88
   ],
   [
      "bulan" => "januari",
      "tahun" => 2018,
      "penjualan" => 90
   ],
   [
      "bulan" => "februari",
      "tahun" => 2018,
      "penjualan" => 95
   ],
   [
      "bulan" => "maret",
      "tahun" => 2018,
      "penjualan" => 100
   ],
   [
      "bulan" => "april",
      "tahun" => 2018,
      "penjualan" => 102
   ],
   [
      "bulan" => "mei",
      "tahun" => 2018,
      "penjualan" => 100
   ],
   [
      "bulan" => "juni",
      "tahun" => 2018,
      "penjualan" => 104
   ],
];

// parameter pertama data, paramter kedua nama field, parameter ke tiga rata bergerak default value 6.
$metode->proses($data, "penjualan");

echo "hasil normalisasi data bentuk array <br>";
dump($metode->getNormalisasi());
echo "hasil proses bergerak SMA (single moving average) bentuk array<br>";
dump($metode->getResult());

```

- [indonesia](https://github.com/naagaraa/metode-skriphit/tree/main/documents/manual-indonesia.md)
- [english](https://github.com/naagaraa/metode-skriphit/tree/main/documents/manual-english.md)
- [official-web](https://nagara.gitbook.io/myphp-tools/) | indonesia
- [yt playlist](https://www.youtube.com/playlist?list=PLK5_CL-hAKCfNQkFHBOigInCJKk_F6-mY) || indonesia
### EXTRAS
you can build in server with call like this

**build in server**

```bash
php -S localhost:8000
```

## WHAT YOU GET ?
okay if you install this is, you will get my personal tool and my metode. i'am build this from journal and implementation in code and also sometimes i'am just re writing code from other people and put inside.

### personal tools 
- math
  - [matrix](https://github.com/naagaraa/metode-skriphit/blob/main/src/math/readme.md)

- db ( PDO - PHP data Object )
  - [database](https://github.com/naagaraa/metode-skriphit/blob/main/src/db/readme.md)
  - [connection](https://github.com/naagaraa/metode-skriphit/blob/main/src/db/readme.md)
  - [query mysql](https://github.com/naagaraa/metode-skriphit/blob/main/src/db/readme.md)
- office
  - [excel / csv](https://github.com/naagaraa/metode-skriphit/blob/main/src/office/readme.md)
  - [read file csv](https://github.com/naagaraa/metode-skriphit/blob/main/src/office/readme.md)
  - [parser pdf to text](https://github.com/naagaraa/metode-skriphit/blob/main/src/office/readme.md)
  - [parser docx to text](https://github.com/naagaraa/metode-skriphit/blob/main/src/office/readme.md)
  - [listing file or direactory](https://github.com/naagaraa/metode-skriphit/blob/main/src/office/readme.md)

- image OCR ( optical character recognition )

  - [parse image to text](https://github.com/naagaraa/metode-skriphit/tree/main/src/img/readme.md)

- track ( time execution )
  - [track ](https://github.com/naagaraa/metode-skriphit/tree/main/src/timetrack.md)

### Metode Available

- [apriori](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/apriori/readme.md) 

- [fuzzy-sugeno](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/fuzzy/readme.md)

- [simple linear regresion](https://github.com/naagaraa/metode-skriphit/blob/main/src/metodelinear-regresion/readme.md)

- [simple addive weight](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/saw/readme.md)

- [weighted Product](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/wp/readme.md)

- [c45](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/c45/readme.md) 

- [The Technique for Order of Preference by Similarity to Ideal Solution (TOPSIS)](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/topsis/readme.md)

- [simple oreste](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/oreste/readme.md)


- [simple k means](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/k-means/readme.md)

- [simple naive-bayes](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/naive-bayes/readme.md) learning and under develeopment :warning:

- [winnowing](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/winnowing/readme.md)
  - v1 hash used ord not have decrypt
  - v2 hash used custom ord have decrypt result ngram


- [rabin-karb](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/rabin-karb/readme.md) 
  - v1 rolling hash used ord not have decrypt
  - v2 rolling hash used custom ord have decrypt result ngram 

- [single-moving-average](https://github.com/naagaraa/metode-skriphit/blob/main/src/metode/single-moving-average/readme.md) 
learning and under development
- other ? | oke let's make something

### next plan make libraries

next plan make libraries often used for skripshit you can read this link below

- [planning](https://github.com/naagaraa/metode-skriphit/tree/main/src/metode/readme.md)

---

## support or sponsor

jika kamu terbantu dengan library ini kamu bisa support saya agar terus berkarya dengan klik link dibawah ini, mungkin kopi atau mie ayam boleh kok.

- [saweria.co](https://saweria.co/naagaraa)
- [trakterr.id](https://trakteer.id/naagaraa/tip)

<br>

### Dilema

**:warning: pusing w ngerjain metode pake php, orang lain pada sans pake python, python banyak library, tinggal pnp, klo php harus from scracth atau build from zero hahaha :warning:**

## Maintenace

this code maintenace by me [miyuki nagara](https://github.com/naagaraa)

