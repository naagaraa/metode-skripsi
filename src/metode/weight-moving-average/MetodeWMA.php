<?php

/**
 *
 * this file is single method of PHP Technique for Single Moving Average
 *
 *
 * @author      Eka Jaya Nagara <ekabersinar@gmail.com>
 * @copyright   Copyright (c), 2022 naagaraa metode skripsi Technique for Wieght Moving Average
 * @license     MIT public license
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

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

        $peramalan = [];
        
        // step 0
        $slicedata=[];
        foreach (self::$normalisasi_data as $iteration => $value) {
            $slicedata[$iteration] = array_slice(self::$normalisasi_data, $iteration, $pergerakan_w);
        }

        //  step 3 mencari jumlah n pergerakan
        $hasil = 0;
        for ($i = 1; $i <= $pergerakan_w; $i++) {
            $hasil += $i;
        }

        // step 3.1 kalikan data dengan bobot
        foreach ($slicedata as $key => $value) {
            foreach ($value as $index => $nilai) {
                $slicedata[$key][$index] = ($nilai * ($index + 1));
            }
        }

        // step 4 dapat jumlah bagian atas / sum
        foreach ($slicedata as $index => $value) {
            $slicedata[$index] = array_sum($value);
        }

        // step 4.1 jumlah sum
        $sum = [];
        $pergerakan_s = $pergerakan;
        foreach ($slicedata as $key => $value) {
            $sum[$pergerakan_s++] = "($value/$hasil)";
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
