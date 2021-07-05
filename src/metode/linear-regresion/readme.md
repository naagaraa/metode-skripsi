### Simple Regresi Linear  

regresi linear adalah sebuah pendekatan untuk memodelkan hubungan antara variable terikat Y dan satu atau lebih variable bebas yang disebut X. Salah satu kegunaan dari regresi linear adalah untuk melakukan prediksi berdasarkan data-data yang telah dimiliki sebelumnya. Hubungan di antara variable-variabel tersebut disebut sebagai model regresi linear.

### how to use
```
use Nagara\Src\Metode\MetodeLinearRegresion; // load libraries

// nilai x dan y total jumlahnya harus sama

// varaibel x adalah rata rata suhu
$x = [24,22,21,20,22,19,20,23,24,25,21,20,20,19,25,27,28,25,26,24,27,23,24,23,22,21,26,25,26,27];

// variabel y adalah jumlah cacat
$y = [10,5,6,3,6,4,5,9,11,13,7,4,6,3,12,13,16,12,14,12,16,9,13,11,7,5,12,11,13,14];

// Object Oriented style
// linerar regresion
$metode = new MetodeLinearRegresion;
$hasil_prediction_x = [];

// single prediction
$prediction_single_y = $metode->LinearRegresion_x($x, $y, 30);   // return 19.12 prediksi cacat
$prediction_single_x = $metode->LinearRegresion_y($x, $y, 4);  // return 19.57 prediksi suhu

// multiple linear regresion y
foreach ($y as $key => $value) {
    $hasil_prediction_x[$key] = $metode->LinearRegresion_y($x, $y, $value);
}

// multiple linear regresion x
$hasil_prediction_y = [];
foreach ($x as $key => $value) {
    $hasil_prediction_y[$key] = $metode->LinearRegresion_x($x, $y, $value);
}

// debug hasiil menggunakan dump
var_dump($prediction_single_y);
var_dump($prediction_single_x);
var_dump($hasil_prediction_x);
var_dump($hasil_prediction_y);


```

### more detail
```
// basic usage
use Nagara\Src\Metode\MetodeLinearRegresion; 

// create new object
$metode = new MetodeLinearRegresion;

// single prediction
$prediction_single_y = $metode->LinearRegresion_x($x, $y, 30);   // return 19.12 prediksi cacat
$prediction_single_x = $metode->LinearRegresion_y($x, $y, 4);  // return 19.57 prediksi suhu

```

### keterangan
- data dari database adalah berupa array assosiative yang dibutuhkan hanya valuenya saja
- jumlah column x dan y harus sama
- by default untuk single akan me return float atau integer
- untuk multiple linear regresion harus dilalukan loop 
