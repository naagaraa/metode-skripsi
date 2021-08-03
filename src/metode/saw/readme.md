### Simple Addictive Weight

untuk menggunakan Metode SAW beberapa parameter yang dibutuhkan adalah database dalam format 
array assosiative, jumlah kriteria, index column cost, nama column yang mengandung field 
kriteria, bobot, dan jumlah bobot. jumlah bobot harus sama dengan jumlah column
kriterianya. 

referensi : https://bukuinformatika.com/metode-simple-additive-weighting-saw/

## Explain Metode : teori
coming soon


### method available
```php
// basic usage
use Nagara\Src\Metode\MetodeSaw;

// init
$metode = new MetodeSaw;
$metode->saw("matrix", "kriteria", "weight");

// get value
$normalisasi = $metode->getNormalisasi();
$rangked = $metode->getRangked();

```


### how to use

#### with csv

```php
use Nagara\Src\Doc\DocumentExcel;
use Nagara\Src\Metode\MetodeSaw;

// init office tools
$excel =  new DocumentExcel;
$excel->read("saw-example.csv");
$excel->execute();

// save single martix to variabel
$ipk = $excel->showByColumn("ipk");
$pengahasilan = $excel->showByColumn("penghasilan");
$tanggungan = $excel->showByColumn("tanggungan");
$prestasi = $excel->showByColumn("prestasi");
$lokasi = $excel->showByColumn("lokasi rumah");

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

// debug value
dump($normalisasi);
dump($rangked);


```

#### with array or matrix
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

// debug value
dump($normalisasi);
dump($rangked);

```


### keterangan
- data dari database adalah berupa array assosiative
- jumlah column kriteria adalah total colum yang mengandung nilai kriteria 
  example colum kriteria {"bagus", "baik", "benar"} totalnya adalah 3
- index column  cost adalah index yang ada pada column cost
  example column kriteria {"bagus", "baik", "benar"} yang ditetapkan 
  sebagai cost adalah kriteria bagus maka indexnya adalah 0
- nama column kriteria adalah nama field pada DB data yang dimasukan
  kedalam sebuah metode,
  example columnya {"bagus", "baik", "benar"} maka ini yang
  akan dimasukan ke dalam metode dalam format arrar satu
  dimensi.
- value bobot adalah masing masing nilai bobot yang ada pada
  field atau kriterianya.
  example : {"bagus", "baik", "benar"}, masing masing
  beban bobotnya {10,30,60} totalnya adalah 100
- hasil-column-baru adalah nama field baru yang akan dibuat pada manipulation
  structur data, bisa diberi nama bebas example "result"
