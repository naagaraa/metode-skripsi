### TOPSIS

TOPSIS (Technique For Others Reference by Similarity to Ideal Solution) adalah salah satu metode pengambilan keputusan multikriteria yang pertama kali diperkenalkan oleh Yoon dan Hwang (1981). TOPSIS menggunakan prinsip bahwa alternatif yang terpilih harus mempunyai jarak terdekat dari solusi ideal positif dan terjauh dari solusi ideal negatif dari sudut pandang geometris dengan menggunakan jarak Euclidean untuk menentukan kedekatan relatif dari suatu alternatif dengan solusi optimal. referece pembuatan https://tugasakhir.id/contoh-perhitungan-spk-metode-topsis/

## Explain Metode : teori

coming soon

### method available

```php
use Nagara\Src\Metode\MetodeTopsis;

// create object
$metode = new MetodeTopsis;

// init
$metode->topsis("matrix","matrix-weight","matrix-keriteria-type");

// method getter
$metode->getNormalisasi();
$metode->getNormalisasiTerbobot();
$metode->getMatrixSolusiIdeal();
$metode->getTotal();

```

### basic to use

```php
use Nagara\Src\Metode\MetodeTopsis; // load libraries

// contoh 3 data
$c1 = [5,5,5];
$c2 = [2,1,3];
$c3 = [1,1,1];
$c4 = [4,3,4];
$c5 = [1,1,1];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; // terdapat totalnya adalah 5 array

$weight = [5,3,4,2,5];	// terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "biaya",
	"1" => "keuntungan",
	"2" => "biaya",
	"3" => "keuntungan",
	"4" => "keuntungan",
]; // type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

// create object
$metode = new MetodeTopsis;

// init
$metode->topsis($matrix_example,$weight,$kriteria_weight);

// get value
$normalisasi = $metode->getNormalisasi();
$normalisasiTerbobot = $metode->getNormalisasiTerbobot();
$matrixSolusiIdeal = $metode->getMatrixSolusiIdeal();
$total = $metode->getTotal();


// debug value
dump($normalisasi);
dump($normalisasiTerbobot);
dump($matrixSolusiIdeal);
dump($total);

```

### keterangan

- matrix adalah data yang berisi nilai kriteria atau akan disebut sebagai c1 - cn
- weight adalah nilai bobot pada kriteria
- kriteria weight adalah type kriteria untuk pembagian pembobotan
- jumlah bobot dan kriteria adalah sama
- hasil akhir berupa array

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
