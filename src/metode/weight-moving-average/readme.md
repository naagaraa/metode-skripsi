# Weight Moving Average

A Weight moving average (WMA) is an arithmetic moving average calculated by adding recent prices and then dividing that figure by the number of time periods in the calculation average. For example, one could add the closing price of a security for a number of time periods and then divide this total by that same number of periods. Short-term averages respond quickly to changes in the price of the underlying security, while long-term averages are slower to react.

### reference

- [investopedia](https://www.investopedia.com/terms/s/sma.asp).

### caution

- this algorithm i'm write with my self, i'm just writing for make stand alone algorithm and place in my libraries

### example format data

in below this example format data history for Algoritma WMA in array

```php
// format data mentah
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
```

### basic usage

**note** jika pakai framework tidak usah pakai include langsung panggil namespace paka use

```php
include "vendor/autoload.php";

use Nagara\Src\Metode\MetodeWMA;

// initialize metode
$metode = new MetodeWMA;

$metode->proses($data, "penjualan", 6);

echo "hasil normalisasi data bentuk array <br>";
dump($metode->getNormalisasi());
echo "hasil sum / rata bergerak dalam bentuk array <br>";
dump($metode->getSum());
echo "hasil proses bergerak WMA (single moving average) bentuk array<br>";
dump($metode->getResult());

```

### how is work ?

okay, let me explain in indonesia language.
cara kerjanya simple dari formula yang diambil dari jurnal dibawah, ini seperti mencari nilai mean atau rata rata, hanya saja kita bisa bebas menentukan panjang data yang akan di ambil, hal ini disebut sebagai pergerakan atau proses bergerak priode t. proses mempunyai tiga parameter yaitu data awal, field normalisasi, dan nilai pergerakan. pada normalisasi akan digunakan untuk mengambil nilai yang akan diproses. dan pergerakan merupakan nilai pemotongan.
<br>
<br>
contoh : ada sejumlah data sepanjang 18 data, 1,2,3,4,5 ... 18. maka bila memberi nilai 6 maka akan dilakukan pemotongan akhir 6 data. 1(1),2(2),3(3),4(4),5(5),6(6). = x / 1+2+3+4+5+6 = z adalah hasil predisiknya.

### jurnal reference

- null

<br>
<br>

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
