### metode naive bayes

Algoritma Naive Bayes merupakan sebuah metoda klasifikasi menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes. Algoritma Naive Bayes memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes. Ciri utama dr Naïve Bayes Classifier ini adalah asumsi yg sangat kuat (naïf) akan independensi dari masing-masing kondisi / kejadian.

Naive Bayes Classifier bekerja sangat baik dibanding dengan model classifier lainnya. Hal ini dibuktikan pada jurnal Xhemali, Daniela, Chris J. Hinde, and Roger G. Stone. “Naive Bayes vs. decision trees vs. neural networks in the classification of training web pages.” (2009), mengatakan bahwa “Naïve Bayes Classifier memiliki tingkat akurasi yg lebih baik dibanding model classifier lainnya”.

naive bayes sering digunakan untuk classifikasi text.

Tahapan dari proses algoritma Naive Bayes adalah:

1. Menghitung jumlah kelas / label.
2. Menghitung Jumlah Kasus Per Kelas
3. Kalikan Semua Variable Kelas
4. Bandingkan Hasil Per Kelas

1

### formula

p (C |X) = P ( x | c ) P ( c )/ p ( x )

## Keterangan :

- x : Data dengan class yang belum diketahui
- c : Hipotesis data merupakan suatu class spesifik
- P(c|x) : Probabilitas hipotesis berdasar kondisi (posteriori probability)
- P(c) : Probabilitas hipotesis (prior probability)
- P(x|c) : Probabilitas berdasarkan kondisi pada hipotesis
- P(x) : Probabilitas c

2

### formula

posterior = prior \* likelihood / evidence

### link

https://monkeylearn.com/blog/practical-explanation-naive-bayes-classifier/
https://informatikalogi.com/algoritma-naive-bayes/
http://publikasi.dinus.ac.id/index.php/technoc/article/view/975/739 - jurnal
https://en.wikipedia.org/wiki/Bayes%27_theorem
https://towardsdatascience.com/machine-learning-text-processing-1d5a2d638958

# Maintenner

this code maintenace by me miyuki nagara

- [miyuki nagara](https://github.com/naagaraa/)
