<?php
namespace Nagara\Src\Metode;

class MetodeWMA
{
    /**
     * formula error :
     * nilai terbesar di dalam data - nilai peramalan dalam deret
     *
     * formula peramalan periode :
     * Ft = (Yt-1)+(Yt-2)+(Yt-3)..+(Yt-n) / n
     *
     * ft : peramalan untuk periode t
     * Yt-1 + Yt-2 + ... +Yt -n : jumlah data dalam periode n sebelumnya
     * n : jumlah periode dalam rata rata gerak.
     */
    private static $history_data;
    private static $normalisasi_data;
    private static $hasil_peramalan;
    private static $hasil_sum;

    /**
     * normalisasi data
     *
     * @param array $data
     * @param string $field
     * @return array
     */
    private static function normalisasi($data = [], $field = "")
    {

        // save data
        self::$history_data = $data;

        // normalisasi data ke value
        $normalisasi = [];
        foreach ($data as $key => $value) {
            if (is_numeric($value[$field])) {
                array_push($normalisasi, $value[$field]);
            } else {
                echo "maaf data bukan angka";
                exit;
            };
        }

        self::$normalisasi_data = $normalisasi;
        return $normalisasi;
    }

    /**
     * proses bergerak
     *
     * melakukan proses perhitungan peramalan menggunakan  perhitungan bergerak
     * @param array $data
     * @param string $field
     * @param integer $pergerakan
     * @return array
     */
    public function proses($data = [], $field = "", $pergerakan = 6)
    {
        // check data
        if (empty($data)) {
            echo "butuh data, data yang anda masukan tidak ada";
            exit;
        }

        // check field
        if ($field == "") {
            echo "butuh nama field untuk normalisasi, kamu tidak memasukan field";
            exit;
        }

        foreach ($data as $key => $value) {
            if (array_key_exists($field, $data[$key])) {
                // echo "nama field ditemukan";
                break;
            } else {
                echo "nama field tidak ditemukan";
                exit;
            }
        }

        // normalisasi data
        self::normalisasi($data, $field);

        // menghitung berdasarkan pergerakan
        $pergerakan_w = $pergerakan;

        // $slicedata = array_slice(self::$normalisasi_data,0, $pergerakan);
        // $peramalan = array_sum($slicedata) / count($slicedata);

        $peramalan = [];
        // step 0
        $slicedata;
        foreach (self::$normalisasi_data as $iteration => $value) {
            $slicedata[$iteration] = array_slice(self::$normalisasi_data, $iteration, $pergerakan_w);
            // array_push($container_1, $slicedata);
            // $hasil = array_sum($slicedata) / count($slicedata);
            // $peramalan[$pergerakan++] = $hasil;
        }

        // dump($slicedata);
        //  step 3 mencari jumlah n pergerakan
        $hasil = 0;
        for ($i = 1; $i <= $pergerakan_w; $i++) {
            $hasil += $i;
        }
        // echo "pergerakan n";
        // dump($hasil);

        // step 4 dapat jumlah bagian atas / sum
        foreach ($slicedata as $index => $value) {
            $slicedata[$index] = array_sum($value);
        }

        // step 4.1 jumlah sum
        $sum = [];
        $pergerakan_s = $pergerakan;
        foreach ($slicedata as $key => $value) {
            $sum[$pergerakan_s++] = "{$value}/{$hasil}";
        }
        self::$hasil_sum = $sum;

        // step 5 mencari mean
        $peramalan = [];
        foreach ($slicedata as $key => $value) {
            $peramalan[$pergerakan_w++] = ($value / $hasil);
            // dump($value / $hasil);
        }

        self::$hasil_peramalan = $peramalan;
        // return $peramalan;
    }

    /**
     * melihat hasil normalisasi
     *
     * @return array
     */
    public function getNormalisasi()
    {
        return self::$normalisasi_data;
    }

    /**
     * melihat hasil sum
     *
     * @return array
     */
    public function getSum()
    {
        return self::$hasil_sum;
    }

    /**
     * melihat hasil peramalan bergerak
     *
     * @return array
     */
    public function getResult()
    {
        return self::$hasil_peramalan;
    }
}
