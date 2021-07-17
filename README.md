# PROJECT LIBRARIES METODE SIMPLE SKRIPSHIT
membuat rumus implementasi metode yang sering digunakan pada skripsi dengan pengetahuan basic Math or Mathematic ke dalam function dan object base. untuk collection. plesetin aja jadi skripshit.

 
## INTRODUCTION !
wanna be programmer, IT Research and share my knowlegde.
translate indonesia "yah gue gabut aja, gak ada temen ngobrol, makanya buat video aja deh"
just make video for self documentation during I am new learning something, solve problem or building something.

## WARNING !
i don't care about hater, hahaha you like stupid people. only can send negative commnet, without
understand about what video i make it hahahha. if you not agree please leave don't watch ahahaha. if you
have solution please send positif commnet and help other people !

## INFO
semakin meninggi semakin merunduk, jangan sombong, bantu orang lain, janga mau dimanfaatkan demi kepentingan yang merugikan diri sendiri. *note* : jika saya mood

## INSTALL USED COMPOSER ?

catatan ini versi beta, dan mungkin masih ada bug perhitungan lainnya silahkan di test sendiri 

composer install :
```bash
composer require nagara/metode-skripshit
```

load vendor autoload :
```php
require_once "./vendor/autoload.php";

```

<br>

<!-- Links -->
## Traktier me ?

* Naagaraa : [ Traktir baso aja at saweria [ DANA, OVO, dll ] ](https://saweria.co/naagaraa)
* Siapapun, berapapun, saya ucapkan terimakasih sebanyak-banyaknya.

## License
* **license** [ MIT ](https://github.com/naagaraa/metode-skriphit/blob/main/LICENSE.MD)

<br><br>

## Creator , Contribution dan development

* **Naagaraa Mahasiswa dan Content Creator**  [ YT ](https://www.youtube.com/channel/UCYsZhw6Mlk23Q-nUPP9t1YA) creator ,  pengembang dan maintainers 


<br><br>


**History :**
* temen gue suka pada nanyain ke gue, "gimana?, eh klo gini diapain lagi?, eh ..."
* yaudah gue bikin aja dah sekalian buat w juga, sekalian di publish juga
* padahal yang udah jadi banyak juga kaya PHP-ML atau PHP-Math tapi tetep aja
* mau yang dari awal.

## Metode
dalam pembuatanya semua metodenya tulis dengan konsep OOP atau object oriented dan ditulis dengan bahasa pemrograman PHP.

- fuzzy
    - [fuzzy-sugeno](#fuzzy-sugeno)

- linear-regresion
    - [simple linear regresion](#linear-regresion)

- simple addive weight (saw)
    - [simple SAW](#simple-adictive-weighted)

- weighted Product (wp)
    - [simple WP](#weighted-product)

- oreste | under development 
- k means | under development
- other ? | oke let's make something


## Tools Array Matrix
karena sering berhubungan dengan data, dan yang menghitung dan melakukan computer maka harus terurut layaknya step memasak indomie. maka dari itu gue buatlah tools methodnya sekalian buat bantu misalhnya membuat array baru dari data array assosiatif atau sekedar melakukan flip array merubah baris jadi column atau column jadi baris.

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

## DB | Database object class
database adalah suatu penyimpanan data, biasanya klo gak pake framework build dari zero itu harus config database dari awal mulai atur config DB_NAME, DB_PASSOWORD DB_USER DB_TYPE wah ribet banget, kebayangkan, nah maka dari itu gue orangnya sedikit males klo harus melakukan hal berulang - ulang kaya gituh. jadi gue buatlah librarynya sekalian dengan kumpulan metode metode yang gue buat sendiri dari baca jurnal jurnal dan referensi di internet. dengan konsep OOP

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


## Basic Usage



#### fuzzy-sugeno
Logika Fuzzy adalah suatu cara yang tepat untuk memetakan suatu ruang input ke dalam ruang output. Untuk sistem yang sangat rumit, penggunaan logika fuzzy (fuzzy logic) adalah salah satu pemecahannya. Sistem tradisional dirancang untuk mengontrol keluaran tunggal yang berasal dari beberapa masukan yang tidak saling berhubungan. fuzzy sugeno tidak berbeda jauh dengan fuzzy mamdani.

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


#### linear-regresion
regresi linear adalah sebuah pendekatan untuk memodelkan hubungan antara variable terikat Y dan satu atau lebih variable bebas yang disebut X. Salah satu kegunaan dari regresi linear adalah untuk melakukan prediksi berdasarkan data-data yang telah dimiliki sebelumnya. Hubungan di antara variable-variabel tersebut disebut sebagai model regresi linear.

```php

use Nagara\Src\Metode\MetodeLinearRegresion; // load libraries

// nilai x dan y total jumlahnya harus sama

// varaibel x adalah rata rata suhu
$x = [24,22,21,20,22,19,20,23,24,25,21,20,20,19,25,27,28,25,26,24,27,23,24,23,22,21,26,25,26,27];

// variabel y adalah jumlah cacat
$y = [10,5,6,3,6,4,5,9,11,13,7,4,6,3,12,13,16,12,14,12,16,9,13,11,7,5,12,11,13,14];


// example another data
$x = [1,2,3,4,5,6,7,8,9,10,11,12];
$y = [71,70,69,68,64,65,72,78,75,75,75,70];
$z = [13,14,15,16,17,18,19,20,21,22,23,24];


// Object Oriented style
// linerar regresion
$metode = new MetodeLinearRegresion;


// single prediction jika x dan y adalah data suhu dan kecacatan
$prediction_single_x = $metode->LinearRegresion_x($x, $y, 30);   // return 19.12 prediksi cacat
$prediction_single_y = $metode->LinearRegresion_y($x, $y, 4);  // return 19.57 prediksi suhu

// multiple linear regresion y
$multiple_y = $metode->MultipleLinearRegresion($x, $y , $z, "y");

// multiple linear regresion 
$multiple_x = $metode->MultipleLinearRegresion($x, $y , $z, "x");

// combinasi atau gabungkan dan buat field baru
$hasil = $metode->Combine_LinearRegresion($data_siswa, $x, $y ,$z, "x", "result_akhir");

// debug hasil menggunakan dump
var_dump($prediction_single_y);
var_dump($prediction_single_x);
var_dump($multiple_x );
var_dump($multiple_y );
var_dump($hasil);



```


#### simple-adictive-weighted
untuk menggunakan Metode SAW beberapa parameter yang dibutuhkan adalah database dalam format 
array assosiative, jumlah kriteria, index column cost, nama column yang mengandung field 
kriteria, bobot, dan jumlah bobot. jumlah bobot harus sama dengan jumlah column
kriterianya.

```php

use Nagara\Src\Metode\MetodeSaw; // load libraries

// query database jika menggunakan database
$normalisasi_query = "SELECT * FROM normalisasi";
$result_all = query($normalisasi_query);
$data_siswa = fetch_assoc($result_all);

// Object Oriented
$metode = new MetodeSaw;
$hasil = $metode->saw($data_siswa, 6 , 0,[
    "kedisiplinan", "kehadiran", "nilai_raport","nilai_keterampilan", "nilai_kebaikan","nilai_kesehatan"
],[
    5,10,15,20,25,25
],"hasil");


```

#### weighted-product
Weighted Product (WP) merupakan salah satu metode sistem pendukung keputusan yang termasuk ke dalam kategori Fuzzy Multiple Attribute Decision Making (FMADM). Metode weighted product (WP) menggunakan perkalian untuk menghubungkan rating atribut, dimana rating setiap atribut harus dipangkatkan dulu dengan bobot atribut yang bersangkutan.

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

### next metode comming soon

