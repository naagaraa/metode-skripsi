# PROJECT LIBRARIES METODE SIMPLE SKRIPSHIT

membuat rumus implementasi metode yang sering digunakan pada skripsi dengan pengetahuan basic Math or Mathematic ke dalam function dan object base. untuk collection. plesetin aja jadi skripshit.

## INTRODUCTION !

wanna be programmer, IT Research and share my knowlegde.
translate indonesia "yah gue gabut aja, gak ada temen ngobrol, makanya buat video aja deh"
just make video for self documentation during I am new learning something, solve problem or building something.

## WARNING !

i don't care about hater, hahaha you like stupid people. only can send negative commnet, without
understand about what i make it hahahha. if you not agree please leave don't read ahahaha. if you
have solution please send positif comment and help other people !

## INFO

semakin meninggi semakin merunduk, jangan sombong, bantu orang lain, janga mau dimanfaatkan demi kepentingan yang merugikan diri sendiri. _note_ : jika saya mood

## INSTALL USED COMPOSER ?

catatan ini versi beta, dan mungkin masih ada bug perhitungan lainnya silahkan di test sendiri

composer install :

```bash
composer require nagara/metode-skripshit
```

<br>
<br>
<br>

_update_ karena ini masih dalam develop untuk mengisi waktu gabut saya, dengan mengisinya untuk push up otak melakukan translate from jurnal or formula math to coding, maka versi release pun akan update.

<br>
<br>

composer update :

```bash
composer update
```

load vendor autoload :

```php
require_once "./vendor/autoload.php";

```

<br>

<!-- Links -->

## Traktier me ?

- Naagaraa : [ Traktir baso aja at saweria [ DANA, OVO, dll ] ](https://saweria.co/naagaraa)
- Siapapun, berapapun, saya ucapkan terimakasih sebanyak-banyaknya.

## License

- **license** [ MIT ](https://github.com/naagaraa/metode-skriphit/blob/main/LICENSE.MD)

<br><br>

## Creator , Contribution dan development

- **Naagaraa Mahasiswa dan Content Creator** [ YT ](https://www.youtube.com/channel/UCYsZhw6Mlk23Q-nUPP9t1YA) creator , pengembang dan maintainers

<br><br>

**History :**

- temen gue suka pada nanyain ke gue, "gimana?, eh klo gini diapain lagi?, eh ..."
- yaudah gue bikin aja dah sekalian buat w juga, sekalian di publish juga
- padahal yang udah jadi banyak juga kaya PHP-ML atau PHP-Math tapi tetep aja
- mau yang dari awal.

## List of Tools

- math

  - [matrix](#tools-array-matrix)

- db ( PDO - PHP data Object )

  - [database](#tools-database)
  - connection
  - query mysql

- office
  - [excel / csv](#tools-office-document-excel)
  - read file csv

## List of Metode

dalam pembuatanya semua metodenya tulis dengan konsep OOP atau object oriented dan ditulis dengan bahasa pemrograman PHP.

- fuzzy

  - [fuzzy-sugeno](#fuzzy-sugeno)

- linear-regresion

  - [simple linear regresion](#linear-regresion)

- simple addive weight (saw)

  - [simple SAW](#simple-adictive-weighted)

- weighted Product (wp)

  - [simple WP](#weighted-product)

- The Technique for Order of Preference by Similarity to Ideal Solution (TOPSIS)
  - [simple topsis](#topsis)
- oreste

  - [simple oreste](#oreste)

- k means | under development
- other ? | oke let's make something

## Tools Array Matrix

karena sering berhubungan dengan data, dan yang menghitung dan melakukan computer maka harus terurut layaknya step memasak indomie. maka dari itu gue buatlah tools methodnya sekalian buat bantu misalhnya membuat array baru dari data array assosiatif atau sekedar melakukan flip array merubah baris jadi column atau column jadi baris.

more detail about Math [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/math)

```php

use Nagara\Src\Math\MatrixClass; // load libraries

// query database
$normalisasi_query = "SELECT * FROM normalisasi";
$result_all = query($normalisasi_query);
$data_siswa = fetch_assoc($result_all);

// Object Oriented
$matrix = new MatrixClass;

// membuat single matrix
$x = $matrix->make_field_matrix($data_siswa,"kedisiplinan");
$y = $matrix->make_field_matrix($data_siswa,"kehadiran");


// membuat multiple matrix
// $z = $matrix->make_new_matrix($data, jumlah field, ["field 1","field 2"]);
$z = $matrix->make_new_matrix($data_siswa, 2, ["kehadiran","kedisiplinan"]);

// multiplikasi matrix atau perkalian array satu Dimenasi
$example = [1,2,3,4,5];
$matrix->Matrix_Multiplikasi($example);

var_dump($x); // return new array hanya nilai kedisiplinan
var_dump($y); // return new array hanya nilai kehadiran
var_dump($z); // return new array hanya nilai kehadiran dan kedisiplinan
var_dump($example); // return float



```

## Tools Office Document Excel

Office Class adalah method khusus yang saya buat untuk membaca atau read file csv untuk keperluan testing
seperti testing data jika , saya malas untuk mengambil data langsung dari database, saya bisa mengambil dan
melakukan read pada file csv saja

### format file CSV

- nama column berada pada ROW 1 [A1,B1,C1,D1 ... E - n]
- data yang berupa value atau dimulai dari ROW 2

atau untuk contoh nyata bentuk file csv example bisa check [disini](https://github.com/naagaraa/metode-skriphit/tree/main/src/example/csv) ini adalah file example yang diambil dari kaggle untuk public data penelitian data science atau research of data science <b>jakarta.csv<b> untuk file example pada libraries saya

more detail about Office Excel [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/office)

### basic usage

```php

use Nagara\Src\Doc\DocumentExcel; //load libraries

// init or read file
$excel = new DocumentExcel;
$jakarta = $excel->read("jakarta.csv"); // read file excel
$excel->execute();

// show by column
$column = $excel->showColumn();
$row = $excel->showRow();
$bycolumn = $excel->showByColumn("hospitalized"); //insert column name


// debug field array
dump($column);
dump($row);
dump($bycolumn);

```

## Tools Database

database adalah suatu penyimpanan data, biasanya klo gak pake framework build dari zero itu harus config database dari awal mulai atur config DB_NAME, DB_PASSOWORD DB_USER DB_TYPE wah ribet banget, kebayangkan, nah maka dari itu gue orangnya sedikit males klo harus melakukan hal berulang - ulang kaya gituh. jadi gue buatlah librarynya sekalian dengan kumpulan metode metode yang gue buat sendiri dari baca jurnal jurnal dan referensi di internet. dengan konsep OOP

more detail about DB [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/db)

### basic usage

```php
use Nagara\Src\Database\DB;

// untuk config bisa di pass ke variabel atau langsung ke constructornya
$type = "mysql";
$servername = "localhost";
$database = "karyawan";
$username = "root";
$password = "";

// pass ke constructorynya
$db = new DB($type, $servername, $username, $password, $database);

// SELECT
$select = $db->select('SELECT * FROM tb_tracking');

// SELECT WHERE
$where = $db->where('SELECT id_tracking, nama_tracking FROM tb_tracking WHERE id_tracking = 1');

// INSERT
$db->insert("INSERT INTO tb_tracking VALUES ('7','test')");

// UPDATE
$db->update("UPDATE tb_tracking SET nama_tracking = 'update fiture' WHERE id_tracking = 7");

// DELETE
$db->delete("DELETE FROM `tb_tracking` WHERE id_tracking = 7");


```

# Basic Usage Metode

## fuzzy-sugeno

Logika Fuzzy adalah suatu cara yang tepat untuk memetakan suatu ruang input ke dalam ruang output. Untuk sistem yang sangat rumit, penggunaan logika fuzzy (fuzzy logic) adalah salah satu pemecahannya. Sistem tradisional dirancang untuk mengontrol keluaran tunggal yang berasal dari beberapa masukan yang tidak saling berhubungan. fuzzy sugeno tidak berbeda jauh dengan fuzzy mamdani.

more detail about fuzzy sugeno [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/metode/fuzzy) and for example code [here](#)

```php
use Nagara\Src\Metode\MetodeFuzzySugeno;    // load library

// range kurva segitga 1 - 5 [1 , 2, 3, 4, 5]

// example 3 value
$a = 5;
$b = 5;
$c = 5;

// get value
$metode = new MetodeFuzzySugeno;
$hasil_defuzifikasi = $metode->FuzzySugeno($a, $b, $c); //return value 1 or 0

// debug
dump($hasil_defuzifikasi);

// penentuan kompeten atau tidak kompetern
if ($hasil_defuzifikasi  > 0) {
    echo "selamat anda kompeten";
}else{
    echo "maaf anda tidak kompeten";
}

```

## linear-regresion

regresi linear adalah sebuah pendekatan untuk memodelkan hubungan antara variable terikat Y dan satu atau lebih variable bebas yang disebut X. Salah satu kegunaan dari regresi linear adalah untuk melakukan prediksi berdasarkan data-data yang telah dimiliki sebelumnya. Hubungan di antara variable-variabel tersebut disebut sebagai model regresi linear.

more detail about linear regresion [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/metode/linear-regresion) and for example code [here](https://github.com/naagaraa/metode-skriphit/blob/main/src/example/exampleLinearRegresion.php)

```php

use Nagara\Src\Metode\MetodeLinearRegresion; // load libraries


$metode = new MetodeLinearRegresion;

// nilai x dan y total jumlahnya harus sama
$x = [24,22,21,20,22,19,20,23,24,25,21,20,20,19,25,27,28,25,26,24,27,23,24,23,22,21,26,25,26,27];
$y = [10,5,6,3,6,4,5,9,11,13,7,4,6,3,12,13,16,12,14,12,16,9,13,11,7,5,12,11,13,14];

// single prediction jika x dan y adalah data suhu dan kecacatan
$prediction_single_x = $metode->LinearRegresion_x($x, $y, 30);   // return 19.12 prediksi cacat
$prediction_single_y = $metode->LinearRegresion_y($x, $y, 4);  // return 19.57 prediksi suhu

// multiple linear regresion y
$multiple_y = $metode->MultipleLinearRegresion($x, $y , $z, "y");

// combinasi atau gabungkan dan buat field baru
$hasil = $metode->Combine_LinearRegresion("data-pada-db", $x, $y ,$z, "x", "result_akhir");

// method getter Linear Regresion
$const_a = $metode->getConstA();
$const_b = $metode->getConstB();
$x2 = $metode->getValueX2();
$y2 = $metode->getValueY2();
$xy = $metode->getValueXY();



```

## simple-adictive-weighted

untuk menggunakan Metode SAW beberapa parameter yang dibutuhkan adalah database dalam format
array assosiative, jumlah kriteria, index column cost, nama column yang mengandung field
kriteria, bobot, dan jumlah bobot. jumlah bobot harus sama dengan jumlah column
kriterianya.

more detail about SAW [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/metode/saw) and for example code [here](https://github.com/naagaraa/metode-skriphit/blob/main/src/example/exampleSAW.php)

```php


use Nagara\Src\Metode\MetodeSaw;

// menggunakan example array
$ipk = [3.92,3.95,3.4,4.0,3.2];
$pengahasilan = [2,3,4,3,1];
$tanggungan = [2,2,3,4,2];
$prestasi = [4,3,2,4,1];
$lokasi = [100,89,70,120,140];

// membuat matrix
$example_matrix = [$ipk,$pengahasilan,$tanggungan, $prestasi, $lokasi];

$weight = [0.25,0.15,0.20,0.30,0.10];
$kriteria = [
    0 => "benefit",
    1 => "cost",
    2 => "benefit",
    3 => "benefit",
    4 => "cost"
];

// formula metode
$metode = new MetodeSaw;
$metode->saw($example_matrix, $kriteria, $weight);

// get value
$normalisasi = $metode->getNormalisasi();
$rangked = $metode->getRangked();


```

## weighted-product

Weighted Product (WP) merupakan salah satu metode sistem pendukung keputusan yang termasuk ke dalam kategori Fuzzy Multiple Attribute Decision Making (FMADM). Metode weighted product (WP) menggunakan perkalian untuk menghubungkan rating atribut, dimana rating setiap atribut harus dipangkatkan dulu dengan bobot atribut yang bersangkutan.

more detail about weight product [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/metode/wp) and for example code [here](https://github.com/naagaraa/metode-skriphit/blob/main/src/example/exampleWP.php)

```php

use Nagara\Src\Math\MatrixClass;
use Nagara\Src\Metode\MetodeWP;

$matrix = new MatrixClass;
$metode = new MetodeWP;


// contoh untuk 4 data
$c1 = [7,9,6,9];
$c2 = [10000,11000,9000,6000];
$c3 = [6,8,5,7];
$c4 = [9,8,7,8];
$c5 = [150,250,120,100];

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

$transform = $matrix->flip_matrix($matrix_example); # flip matrix

// init
$metode = new MetodeWP;
$metode->WeightProduct($weight,$kriteria_weight,$transform);

// method getter
$wj = $metode->getValueWj();
$si = $metode->getValueSi();
$vi = $metode->getValueVi();
$normalisasi = $metode->getNormalisasiWeight();

```

## TOPSIS

TOPSIS (Technique For Others Reference by Similarity to Ideal Solution) adalah salah satu metode pengambilan keputusan multikriteria yang pertama kali diperkenalkan oleh Yoon dan Hwang (1981). TOPSIS menggunakan prinsip bahwa alternatif yang terpilih harus mempunyai jarak terdekat dari solusi ideal positif dan terjauh dari solusi ideal negatif dari sudut pandang geometris dengan menggunakan jarak Euclidean untuk menentukan kedekatan relatif dari suatu alternatif dengan solusi optimal. reference dalam proses pembuatan https://tugasakhir.id/contoh-perhitungan-spk-metode-topsis/

more detail about topsis [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/metode/topsis) and for example code [here](https://github.com/naagaraa/metode-skriphit/blob/main/src/example/exampleTopsis.php)

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

// init
$metode = new MetodeTopsis;
$metode->topsis($matrix_example,$weight,$kriteria_weight); // hasil array

// method getter
$normalisasi = $metode->getNormalisasi();
$normalisasiTerbobot = $metode->getNormalisasiTerbobot();
$matrixSolusiIdeal = $metode->getMatrixSolusiIdeal();
$total = $metode->getTotal();

```

## oreste

Metode Oreste adalah salah satu metode pengambilan keputusan multi criteria atau yang lebih dikenal dengani stilah Multi Criteria Decision Making (MCDM). MCDM digunakan untuk menyelesaikan permasalahan dengan kriteria yang bertentangan untuk dapat mengambil keputusan untuk mencapai keputusan akhir.

more detail about oreste [here](https://github.com/naagaraa/metode-skriphit/tree/main/src/metode/oreste) and for example code [here](https://github.com/naagaraa/metode-skriphit/blob/main/src/example/exampleoreste.php)

### how to use

```php
use Nagara\Src\Metode\MetodeOreste; // load libraries

# kriteria value
/**
 * Harga
 * kualitas
 * pelayanan
 * daya tarik
 * lokasi
 */

$c1 = [4,4,4,3,3,1];
$c2 = [5,4,3,3,3,5];
$c3 = [4,3,5,2,2,5];
$c4 = [4,3,4,2,2,3];
$c5 = [5,4,1,3,3,1];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

// bobotnya range 1 : 100 [30,10,20,10,30]
$weight = [0.3,0.1,0.2,0.1,0.3];	# terdapat totalnya adalah 5 array [c1,c2,c3,c4,c5]


# buat object baru dari metodenya
$metode = new MetodeOreste;
$metode->oreste($matrix_example, $weight);

// method getter
$besson = $metode->getBessonRank();
$distanceScore = $metode->getDistanceScore();
$preferensi = $metode->getPreferensi();


```

## next metode comming soon
