# Single Moving Average
A simple moving average (SMA) is an arithmetic moving average calculated by adding recent prices and then dividing that figure by the number of time periods in the calculation average. For example, one could add the closing price of a security for a number of time periods and then divide this total by that same number of periods. Short-term averages respond quickly to changes in the price of the underlying security, while long-term averages are slower to react.

- Metode time series salah satunya adalah Moving average forecasting atau rata-rata bergerak.

### reference
- [investopedia](https://www.investopedia.com/terms/s/sma.asp).


### caution
- this algorithm i'm not write with my self, i'm just re wrting for improve and make stand alone algorithm,
- this is new method i'm added in my libraries this method implementation algorithm from [journal PENERAPAN METODE SINGLE MOVING AVERAGE UNTUK PERAMALAN PENJUALAN MAINAN ANAK](https://ejurnal.dipanegara.ac.id/index.php/sensitif/article/download/552/485/). 



### example format data
in below this example format data history for Algoritma SMA in array
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

use Nagara\Src\Metode\MetodeSMA;

// initialize metode
$metode = new MetodeSMA;

// parameter pertama data, paramter kedua nama field, parameter ke tiga rata bergerak default value 6.
$metode->proses($data, "penjualan");

echo "hasil normalisasi data bentuk array <br>";
dump($metode->getNormalisasi());
echo "hasil proses bergerak SMA (single moving average) bentuk array<br>";
dump($metode->getResult());
```

### jurnal reference
- [journal PENERAPAN METODE SINGLE MOVING AVERAGE UNTUK PERAMALAN PENJUALAN MAINAN ANAK](https://ejurnal.dipanegara.ac.id/index.php/sensitif/article/download/552/485/).

<br>
<br>

# Maintenner
this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)