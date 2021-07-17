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

    public $normaliasi_weight;
    // public $val_wj;
    public $val_wj;
    public $val_si;
    public $val_vi;

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
