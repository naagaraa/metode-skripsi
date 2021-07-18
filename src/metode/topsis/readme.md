### TOPSIS

TOPSIS (Technique For Others Reference by Similarity to Ideal Solution) adalah salah satu metode pengambilan keputusan multikriteria yang pertama kali diperkenalkan oleh Yoon dan Hwang (1981). TOPSIS menggunakan prinsip bahwa alternatif yang terpilih harus mempunyai jarak terdekat dari solusi ideal positif dan terjauh dari solusi ideal negatif dari sudut pandang geometris dengan menggunakan jarak Euclidean untuk menentukan kedekatan relatif dari suatu alternatif dengan solusi optimal. referece pembuatan https://tugasakhir.id/contoh-perhitungan-spk-metode-topsis/

### how to use
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
]; # terdapat totalnya adalah 5 array

$weight = [5,3,4,2,5];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "biaya",
	"1" => "keuntungan",
	"2" => "biaya",
	"3" => "keuntungan",
	"4" => "keuntungan",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

$metode = new MetodeTopsis;

$hasil = $metode->topsis($matrix_example,$weight,$kriteria_weight); // hasil array

echo "Metode Topsis<br><br><br>";

// mencetak hasil akhir
$number = 1;
foreach ($hasil as $key => $value) {
	echo "A0".$number++."<br>";
	foreach ($value as $key => $nilai) {
		if ($key == 0) {
			echo "nilai positif {$nilai}<br>";
		}elseif($key == 1){
			echo "nilai negatif {$nilai}<br>";
		}else{
			echo "nilai preferensi {$nilai}<br>";
		}
	}
	echo "<br>";
}

```

### more detail
```php
// basic usage
use Nagara\Src\Metode\MetodeTopsis;

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
]; # terdapat totalnya adalah 5 array

$weight = [5,3,4,2,5];	# terdapat totalnya adalah 5 array

$kriteria_weight = [
	"0" => "biaya",
	"1" => "keuntungan",
	"2" => "biaya",
	"3" => "keuntungan",
	"4" => "keuntungan",
]; # type kriteria bobot untuk menetukan pembagian bobot tiap indek melambangkan column

$metode = new MetodeTopsis;

$hasil = $metode->topsis($matrix_example,$weight,$kriteria_weight); // hasil array

```

### keterangan
- matrix adalah data yang berisi nilai kriteria atau akan disebut sebagai c1 - cn
- weight adalah nilai bobot pada kriteria
- kriteria weight adalah type kriteria untuk pembagian pembobotan
- jumlah bobot dan kriteria adalah sama
- hasil akhir berupa array 