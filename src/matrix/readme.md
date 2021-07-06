### Matrix Class

matrix class adalah object base class yang saya buat untuk berinteraksi dengan data pada database seperti 
membuat array baru berdasarkan column yang ingin di ambil datanya atau melakukan flip array merubah row
menjadi colum atau sebaliknya.

### how to use
```
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
$z = $matrix->make_new_matrix($data_siswa, 2, ["kehadiran","kedisiplinan"]);

var_dump($x); // return new array hanya nilai kedisiplinan
var_dump($y); // return new array hanya nilai kehadiran
var_dump($z); // return new array hanya nilai kehadiran dan kedisiplinan


```

### more detail
```
// basic usage
use Nagara\Src\Math\MatrixClass;

$matrix = new MatrixClass;

// membuat multiple matrix
$z = $matrix->make_new_matrix($data_siswa, 2, ["kehadiran","kedisiplinan"]);

// debug
var_dump($z); // return new array hanya nilai kehadiran dan kedisiplinan

```

### keterangan
- data bisa dari database adalah berupa array assosiative atau basenya array assosiative langsung
- paramter pertama data original dari database atau array bentuk assosiative
- paramter kedua itu jumlah column yang akan diambil
- paramter ketiga itu adalah column (untuk single bentuknya string, untuk multiple itu bentuknya array)
