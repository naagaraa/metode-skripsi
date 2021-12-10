### Weighted Product

Weighted Product (WP) merupakan salah satu metode sistem pendukung keputusan yang termasuk ke dalam kategori Fuzzy Multiple Attribute Decision Making (FMADM). Metode weighted product (WP) menggunakan perkalian untuk menghubungkan rating atribut, dimana rating setiap atribut harus dipangkatkan dulu dengan bobot atribut yang bersangkutan.

## Explain Metode : teori

coming soon

### method available

```php
// basic usage
use Nagara\Src\Metode\MetodeWP;

// create object
$metode = new MetodeWP;

// init
$metode->WeightProduct("matrix-weight","matrix-kriteria-type","matrix");

// method getter
$metode->getValueWj();
$metode->getValueSi();
$metode->getValueVi();
$metode->getNormalisasiWeight();

```

### basic to use

```php

use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeWP;


$matrix = new MatrixClass;
$metode = new MetodeWP;


# siapkan data dalam format array atau matrix
# sumber referensi pembuatan dari teori ke bentuk code
# https://bukuinformatika.com/metode-weighted-product/ untuk example gue melakukan
# translate coding

// contoh untuk 4 data
$c1 = [7,9,6,9];
$c2 = [10000,11000,9000,6000];
$c3 = [6,8,5,7];
$c4 = [9,8,7,8];
$c5 = [150,250,120,100];

// contoh untuk 6 data
// $c1 = [7,9,6,9,8,6];
// $c2 = [10000,11000,9000,6000,6000,8000];
// $c3 = [6,8,5,7,7,5];
// $c4 = [9,8,7,8,8,5];
// $c5 = [150,250,120,100,100,50];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

$weight = [4,5,2,3,3];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "keuntungan",
	"1" => "biaya",
	"2" => "keuntungan",
	"3" => "keuntungan",
	"4" => "biaya",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

$arr = $matrix->flip_matrix($matrix_example); # flip matrix

# hasil berupa array
$metode = new MetodeWP;
$hasil = $metode->WeightProduct($weight,$kriteria_weight,$arr);
var_dump($hasil); # debug hasil berupa array
```

### keterangan

- weight adalah nilai bobot
- kriteria_weight adalah type kriteria biaya atau keuntungan
- arr adalah array yang sudah di flip atau array horizontal
- jumlah weight dan kriteria weight adalah sama

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
