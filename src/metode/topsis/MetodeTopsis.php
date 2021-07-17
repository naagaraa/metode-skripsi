<?php
/**
 * 
 * this file is single method of PHP Technique for Order of Preference by Similarity to Ideal Solution
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Technique for Order of Preference by Similarity to Ideal Solution
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


class MetodeTopsis
{
    private $normalisasi;
    private $normalisasi_terbobot;
    private $matrix_solusi_ideal;
    private $total;

    public function normalisasi_terbobot($weight = [])
    {
        $terbobot = [];
        foreach ($this->normalisasi as $index => $matrix) {
            foreach ($matrix as $key => $value) {
                $terbobot[$index][$key] = $value * $weight[$key];
            }
        }

        $this->normalisasi_terbobot = $terbobot;
        return $terbobot;
    }

    public function normalisasi($arr = [])
    {
        $temp = [];
        foreach ($arr as $key => $matrix) {
            foreach ($matrix as $index => $value) {
                $temp[$key][$index] = pow($value,2);
            }
        }

        $count_kriteria = [];
        foreach ($temp as $key => $value) {
            $count_kriteria[$key] = array_sum($value);
        }

        $matrix = new MatrixClass;
        $trasnform = $matrix->flip_matrix($arr);

        $normalisasi = [];
        foreach ($trasnform as $key => $matrix) {
            foreach ($matrix as $index => $value) {
                $normalisasi[$key][$index] = ($value / sqrt($count_kriteria[$index])); 
            }
        }

        $this->normalisasi = $normalisasi;
        return $this->normalisasi;
    }

    public function matrix_solusi($kriteria = [])
    {
        if (empty($kriteria)) {
            echo "nampaknya kriteria tidak ada";
            exit;
        }
        
        
        $matrix = new MatrixClass;
        $trasnform = $matrix->flip_matrix($this->normalisasi_terbobot);

        $positif = [];
        foreach ($trasnform as $key => $value) {
            if ($kriteria[$key] == "biaya") {
                // echo "ini adalah cost<br>";
                $positif[$key] = min($value);
            }else{
                // echo "ini adalah benefit<br>";
                $positif[$key] = max($value);
            }
        }

        $negatif = [];
        foreach ($trasnform as $key => $value) {
            if ($kriteria[$key] == "biaya") {
                // echo "ini adalah cost<br>";
                $negatif[$key] = max($value);
            }else{
                // echo "ini adalah benefit<br>";
                $negatif[$key] = min($value);
            }
        }

        dump($positif);
        // dump($negatif);

        $new_positif = [];
        $new_negatif = [];

        foreach ($this->normalisasi_terbobot as $key => $matrix) {
            dump($key);
            foreach ($positif as $index => $value) {
                $new_positif[$key][$index] = pow(($matrix[$index] - $positif[$index]),2);
                // dump($positif[$index]);
                // dump($matrix[$index]);
                // dump($value);
            }
        }

        dump($new_positif);
        // https://tugasakhir.id/contoh-perhitungan-spk-metode-topsis/
    }

}