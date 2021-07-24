### Simple Regresi Linear  

regresi linear adalah sebuah pendekatan untuk memodelkan hubungan antara variable terikat Y dan satu atau lebih variable bebas yang disebut X. Salah satu kegunaan dari regresi linear adalah untuk melakukan prediksi berdasarkan data-data yang telah dimiliki sebelumnya. Hubungan di antara variable-variabel tersebut disebut sebagai model regresi linear.
referensi dalam pembuatan https://teknikelektronika.com/analisis-regresi-linear-sederhana-simple-linear-regression/
### how to use
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


// single prediction
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

### more detail
```php
// basic usage
use Nagara\Src\Metode\MetodeLinearRegresion; 

// create new object
$metode = new MetodeLinearRegresion;

// single prediction
$prediction_single_x = $metode->LinearRegresion_x($x, $y, 30);   // return 19.12 prediksi cacat
$prediction_single_y = $metode->LinearRegresion_y($x, $y, 4);  // return 19.57 prediksi suhu

```

### keterangan
- data dari database adalah berupa array assosiative yang dibutuhkan hanya valuenya saja
- jumlah column x dan y harus sama
- by default untuk single akan me return float atau integer
- untuk multiple linear regresion harus dilalukan loop 
