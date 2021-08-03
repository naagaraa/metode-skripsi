<?php
/**
 * 
 * this file is single method of PHP Simple Addictive Weight
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Simple Adictive Weight
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
use Nagara\Src\Math\MatrixClass;


class MetodeSaw{

    private $normalisasi;
    private $kriteria;
    private $weight;
    private $rangked;
    private $tmp_rangked;

    /**
     * method atau function menghitung normalisasi
     * @author eka jaya nagara
     * @param array         | original matrix
     * @param array         | kriteria
     * @return array
     */
    public function normalisasi_value( $matrix = [], $kriteria = [])
    {
        $normalisasi = [];
        foreach ($matrix as $index => $matrix_j) {
            if ($kriteria[$index] == "benefit") {
                // print("formula benefit<br>");
                foreach ($matrix_j as $key => $value) {
                    $normalisasi[$index][$key] = round($value / max($matrix_j),2);
                }
            }else{
                // print("formula cost<br>");
                foreach ($matrix_j as $key => $value) {
                    $normalisasi[$index][$key] = round(min($matrix_j) / $value,2);
                }
            }
        }

        $this->normalisasi = $normalisasi;
        return $normalisasi;
    }

    /**
     * method atau function menghitung perangkingan
     * @author eka jaya nagara
     * @return array
     */
    public function perangkingan()
    {
        // step one : mulplication all value * weight
        $temp_rangked = [];
        foreach ($this->normalisasi as $index => $matrix_j) {
            foreach ($matrix_j as $key => $value) {
                $temp_rangked[$index][$key] = $matrix_j[$key] * $this->weight[$index];
            }
        }
        $this->tmp_rangked = $temp_rangked;

        // transform matrix
        $matrix = new MatrixClass;
        $transform = $matrix->flip_matrix($temp_rangked);

        // step two : sum all value and multiplication * 100
        $rangked = [];
        foreach ($transform as $index => $matrix_n) {
            $rangked[$index] = array_sum($matrix_n) * 100;
        }
        $this->rangked = $rangked;
    }


    /**
     * method atau function init saw
     * @author eka jaya nagara
     * @param array         | original matrix
     * @param array         | kriteria
     * @param array         | weight matrix
     * @return array
     */
    public function saw($matrix = [], $kriteria = [], $weight = [])
    {
        // sum jumlah masing masing field
        $sum_matrix = count($matrix);
        $sum_kriteria = count($kriteria);
        $sum_weight = count($weight);

        if ($sum_matrix !== $sum_kriteria) {
            print("jumlah field matrix {$sum_matrix} tidak sama dengan jumlah field kriteria {$sum_kriteria} dan jumlah field bobot {$sum_weight}");
            die;
        }elseif($sum_matrix !== $sum_weight){
            print("jumlah field matrix {$sum_matrix} tidak sama dengan jumlah field kriteria {$sum_kriteria} dan jumlah field bobot {$sum_weight}");
            die;
        }

        // init
        $this->weight = $weight;
        $this->kriteria = $kriteria;

        // calculation
        self::normalisasi_value($matrix, $kriteria);
        return self::perangkingan();
        
    }


    /**
     * method atau function mendapatkan nilai normalisasi
     * @author eka jaya nagara
     * @return array
     */
    public function getNormalisasi()
    {
        $matrix = new MatrixClass;
        $transform = $matrix->flip_matrix($this->normalisasi);
        return $transform;
    }

    /**
     * method atau function mendapatkan nilai rangked
     * @author eka jaya nagara
     * @return array
     */
    public function getRangked()
    {
        return $this->rangked;
    }
}