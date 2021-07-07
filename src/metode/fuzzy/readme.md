### Fuzzy Sugeno

Logika Fuzzy adalah suatu cara yang tepat untuk memetakan suatu ruang input ke dalam ruang output. Untuk sistem yang sangat rumit, penggunaan logika fuzzy (fuzzy logic) adalah salah satu pemecahannya. Sistem tradisional dirancang untuk mengontrol keluaran tunggal yang berasal dari beberapa masukan yang tidak saling berhubungan. fuzzy sugeno tidak berbeda jauh dengan fuzzy mamdani.

### how to use

```
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

### more detail
```
// basic usage
use Nagara\Src\Metode\MetodeFuzzySugeno;    // load library

// create new object
$metode = new MetodeFuzzySugeno;

// example 3 value
$a = 5;
$b = 5;
$c = 5; 

// get value
$metode = new MetodeFuzzySugeno;
$hasil_defuzifikasi = $metode->FuzzySugeno($a, $b, $c); //return value 1 or 0

```

### keterangan
- a nilai pertama
- b nilai kedua
- c nilai ketiga
- return 1 - 0 pada defuzufikasi 
- pada phi predikat mengambil nilai min selain 0 
