### k-Means

K-Means Clustering adalah suatu metode penganalisaan data atau metode Data Mining yang melakukan proses pemodelan tanpa supervisi (unsupervised) dan merupakan salah satu metode yang melakukan pengelompokan data dengan sistem partisi. https://informatikalogi.com/algoritma-k-means-clustering/

maintenance metode, used example jurnal CLUSTERING MENGGUNAKAN METODE K-MEANS UNTUK
MENENTUKAN STATUS GIZI BALITA

## Explain Metode : teori

coming soon

### method available

```php
// basic usage
use Nagara\Src\Metode\MetodeKmeans;

// create new object
$metode = new MetodeKmeans;

// k-mean init
$metode->Clustering($matrix_example, $centroid);

// getter
$metode->getCentroid();
$metode->getDistance();
$metode->getValueN();
$metode->getMatrix();

```

### how to use

```php
use Nagara\Src\Metode\MetodeKmeans; // load libraries or method

$metode = new MetodeKmeans;

// nilai awal centorid
$c1 = [3, 2];
$c2 = [2, 2];

// matrix centroid
$centroid = [
    "C1" => $c1,
    "C2" => $c2,
];

// matrix a dan b
$a = [1, 2, 4, 5, 4];
$b = [1, 1, 3, 4, 2];

// data matrix
$matrix_example = [$a, $b];

// k-mean init
$metode->Clustering($matrix_example, $centroid);

// getter k mean
$centroid = $metode->getCentroid();
$distance = $metode->getDistance();
$getvaluen = $metode->getValueN();
$matrix = $metode->getMatrix();

// debug value
dump($matrix);
dump($centroid);
dump($distance);
dump($getvaluen);


```

maintenance metode

```php
// STATUS GIZI BALITA

// data
$tb = [65, 65, 60, 60, 52, 51, 54, 52.5, 70, 71, 72.5, 71.5, 55, 57, 52, 46.5, 95, 82, 75, 99, 99, 97.5, 88, 75, 95, 72, 50, 67, 68, 65, 61, 62, 53, 55, 54, 52.5, 77, 73, 72.5, 71.5, 55, 59, 54, 46.5, 95, 87, 75, 92.5, 93, 97.5];

$bb = [5.8, 7.2, 5, 8, 5.8, 5, 3.5, 7.8, 4.2, 6.2, 7, 8.5, 5.5, 4.8, 6.5, 5.7, 12, 9.7, 8, 11, 7.8, 10, 9.4, 10.1, 12.8, 10.2, 6, 5, 8.2, 9.4, 7.1, 5.8, 3.5, 5.8, 3.5, 6.8, 4.7, 5.8, 6.9, 8.1, 6.7, 5.5, 4.9, 4.2, 7.4, 9.1, 6.5, 9.4, 8.4, 7.9];


```

### keterangan

- untuk saat ini hanya bisa dilakukan 2 cluster
- untuk saat ini hanya bisa dilakukan dengan nilai 2 centroid awal saja C1 dan C2
- untuk data saat ini hanya bisa dua data yakni nilai A dan B sebab centroid pun hanya C1 dan C3
- jumlah centroid dan data harus sama A , B = 2 data, dan C1 , C2 = 2 data
- hasil berupada array multidimensi

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
