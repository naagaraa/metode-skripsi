### Simple Regresi Linear

K-Means Clustering adalah suatu metode penganalisaan data atau metode Data Mining yang melakukan proses pemodelan tanpa supervisi (unsupervised) dan merupakan salah satu metode yang melakukan pengelompokan data dengan sistem partisi. https://informatikalogi.com/algoritma-k-means-clustering/

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

### keterangan

- untuk saat ini hanya bisa dilakukan 2 cluster
- untuk saat ini hanya bisa dilakukan dengan nilai 2 centroid awal saja C1 dan C2
- untuk data saat ini hanya bisa dua data yakni nilai A dan B sebab centroid pun hanya C1 dan C3
- jumlah centroid dan data harus sama A , B = 2 data, dan C1 , C2 = 2 data
- hasil berupada array multidimensi
