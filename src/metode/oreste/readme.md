### Oreste

Metode Oreste adalah salah satu metode pengambilan keputusan multi criteria atau yang lebih dikenal dengani stilah Multi Criteria Decision Making (MCDM). MCDM digunakan untuk menyelesaikan permasalahan dengan kriteria yang bertentangan untuk dapat mengambil keputusan untuk mencapai keputusan akhir.

## Explain Metode : teori
coming soon


### method available
```php
// basic usage
use Nagara\Src\Metode\MetodeOreste;

$metode = new MetodeOreste;
$metode->oreste("matrix-data", "matrix-bobot");
$metode->getBessonRank();
$metode->getDistanceScore();
$metode->getPreferensi();

```


### basic  to use
```php
use Nagara\Src\Metode\MetodeOreste; // load libraries

# kriteria value
/**
 * Harga
 * kualitas
 * pelayanan
 * daya tarik
 * lokasi
 */

$c1 = [4,4,4,3,3];
$c2 = [5,4,3,3,3];
$c3 = [4,3,5,2,2];
$c4 = [4,3,4,2,2];
$c5 = [5,4,1,3,3];

$matrix_example = [
	$c1,
	$c2,
	$c3,
	$c4,
	$c5,
]; # terdapat totalnya adalah 5 array

// bobotnya range 1 : 100 [30,10,20,10,30]
$weight = [0.3,0.1,0.2,0.1,0.3];	# terdapat totalnya adalah 5 array [c1,c2,c3,c4,c5]


# buat object baru dari metodenya
$metode = new MetodeOreste;
$oreste = $metode->oreste($matrix_example, $weight);

# get value only
$besson = $metode->getBessonRank();
$distanceScore = $metode->getDistanceScore();
$preferensi = $metode->getPreferensi();

// debug result bentuk array
dump($besson);
dump($distanceScore);
dump($preferensi);
dump($oreste);


```

### keterangan
- value yang dihitung haruslah bentuk matrix atau array
- jumlah bobot sama dengan jumlah fieldnya
