<?php

/**
 * this file is single method of PHP Weight Product
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Weight Product
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
 * 
 */

namespace Nagara\Src\Metode;

use Nagara\Src\Math\MatrixClass;

/**
 * 
 */

class MetodeWP
{

    private $normaliasi_weight;
    private $val_wj;
    private $val_si;
    private $val_vi;




    /**
     * function menghitung pembagian nilai bobot
     * 
     *  example untuk kriteria weight format
     * index 0 - n melambangkan column atau field
     * 
     * $kriteria_weight = [
     *      "0" => "keuntungan",
     *      "1" => "biaya",
     *      "2" => "keuntungan",
     *      "3" => "keuntungan",
     *      "4" => "biaya",
     * ]
     * 
     * @author eka jaya nagara
     * @param array             | type pemabgian kriteria weight atau bobot 
     * @return array
     * 
     * 
     */
    public function pembagian_nilai_bobot($kriteria_weight = [])
    {

        # index kriteria_weight sama dengan index normalisasi weight
        # urutan harus sama untuk menentukan pembagian keuntungan
        # dan biaya

        if (count($this->normaliasi_weight) !== count($kriteria_weight)) {
            echo "jumlah nilai kriteria tidak sama";
            exit;
        }

        $pembagian_pembobotan = [];
        foreach ($this->normaliasi_weight as $key => $value) {
            if ($kriteria_weight[$key] == "keuntungan") {
                // echo "kali kan 1<br>";
                $pembagian_pembobotan[$key] = $value * 1;
            } else {
                // echo "kalikan min 1<br>";
                $pembagian_pembobotan[$key] = $value * -1;
            }
        }

        # pembagian nilai bobot keuntungan dan biaya
        $this->val_wj = $pembagian_pembobotan;

        return $this->val_wj;
    }


    /**
     * function menghitung normalisasi bobot
     * 
     *  example untuk format kriteria weight format
     * index 0 - n melambangkan column atau field
     *  $kriteria_weight = [
     *      "0" => "keuntungan",
     *      "1" => "biaya",
     *      "2" => "keuntungan",
     *      "3" => "keuntungan",
     *      "4" => "biaya",
     * ]
     * 
     * example untuk format bobot
     * $weight = [4,5,2,3,3];	# terdapat totalnya adalah 5 array
     * 
     * 
     * @author eka jaya nagara
     * @param array             | nilai bobot pada setiap kriteria
     * @param array             | type kriteria weight atau bobot 
     * @return array
     * 
     * 
     */
    public function normaliasai_bobot($bobot = [], $kriteria_weight = [])
    {
        $total_bobot = array_sum($bobot);
        if (empty($bobot)) {
            echo "tidak ada bobot yang diinputkan";
            exit;
        }

        if (empty($kriteria_weight)) {
            echo "nilai kriteria tidak ada";
            exit;
        }

        $temporar = [];
        foreach ($bobot as $key => $value) {
            $temporar[$key] = $value / $total_bobot;
        }

        # normalisasi bobot / weight
        $this->normaliasi_weight = $temporar;

        return $this->normaliasi_weight;
    }


    /**
     * function menghitung vector s
     * 
     * example untuk format kriteria weight format
     * index 0 - n melambangkan column atau field
     * 
     *  $kriteria_weight = [
     *      "0" => "keuntungan",
     *      "1" => "biaya",
     *      "2" => "keuntungan",
     *      "3" => "keuntungan",
     *      "4" => "biaya",
     * ]
     * 
     * example untuk format bobot
     * $weight = [4,5,2,3,3];	# terdapat totalnya adalah 5 array
     * 
     * @author eka jaya nagara
     * @param array             | type kriteria weight atau bobot 
     * @param array             | array atau matrix horizontal atau yg sudah di flip
     * @return array
     * 
     * 
     */
    public function vector_s($kriteria_weight = [], $matrix_cn = [])
    {

        $pangkat = [];
        foreach ($matrix_cn as $key => $matrix) {
            foreach ($matrix as $index => $normalisasi) {
                $pangkat_s = pow($matrix[$index], $this->val_wj[$index]);
                $pangkat[$key][$index] = $pangkat_s;
            }
        }

        $matrix = new MatrixClass;

        $vector_si = [];
        foreach ($pangkat as $key => $value) {
            $vector_si[$key] = $matrix->Matrix_Multiplikasi($value);
        }

        # vector si
        $this->val_si = $vector_si;
        return $this->val_si;
    }


    /**
     * function menghitung vector v
     * @author eka jaya nagara
     * @return array
     * 
     */
    public function vector_v()
    {

        $temporar = [];
        foreach ($this->val_si as $key => $value) {
            $temporar[$key] = $value / array_sum($this->val_si);
        }

        # vector v
        $this->val_vi = $temporar;
        return $this->val_vi;
    }

    /**
     * function atau method untuk metode weight product
     * 
     *  example untuk format kriteria weight format
     * index 0 - n melambangkan column atau field
     *  $kriteria_weight = [
     *      "0" => "keuntungan",
     *      "1" => "biaya",
     *      "2" => "keuntungan",
     *      "3" => "keuntungan",
     *      "4" => "biaya",
     * ]
     * 
     * example untuk format bobot
     * $weight = [4,5,2,3,3];	# terdapat totalnya adalah 5 array
     * 
     * example matrix yang belum di flip atau transform:
     * $matrix_normal = [
     *      [7,9,6,9],
     *      [10000,11000,9000,6000],
     *      [6,8,5,7],
     *      [9,8,7,8],
     *      [150,250,120,100],
     * ];
     * 
     * example matrix yang yang sudah di flip atau transform:
     * $matrix_flix = [
     *      [7,10000,6,9,150],
     *      [9,11000,8,8,250],
     *      [6,9000,5,7,120],
     *      [9,6000,7,8,100]
     * ];
     * 
     * @author eka jaya nagara
     * @param array             | nilai bobot pada setiap kriteria
     * @param array             | type kriteria weight atau bobot 
     * @param array             | array atau matrix horizontal atau yg sudah di flip
     * @return array
     * 
    
     */

    public function WeightProduct($weight = [], $kriteria_weight = [], $matrix)
    {
        #normalisasi bobot
        self::normaliasai_bobot($weight, $kriteria_weight);
        # pembagian nilai bobot
        self::pembagian_nilai_bobot($kriteria_weight);
        # cari nilai vector s
        self::vector_s($kriteria_weight, $matrix);
        # cari nilai vector v
        return self::vector_v();
    }
}
