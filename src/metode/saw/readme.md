### Simple Addictive Weight

untuk menggunakan Metode SAW beberapa parameter yang dibutuhkan adalah database dalam format 
array assosiative, jumlah kriteria, index column cost, nama column yang mengandung field 
kriteria, bobot, dan jumlah bobot. jumlah bobot harus sama dengan jumlah column
kriterianya.

### how to use
```php
use Nagara\Src\Metode\MetodeSaw; // load libraries

// query database
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

### more detail
```php
// basic usage
use Nagara\Src\Metode\MetodeSaw;

$metode = new MetodeSaw;
$metode->saw("data-dari-database", "jumlah-column-kriteria" , "index-column-cost",["nama-column-kriteria"],[ "value-bobot" ],"hasil-column-baru");

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
