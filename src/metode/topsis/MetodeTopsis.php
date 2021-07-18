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

use Nagara\Src\Math\MathematicClass;
use Nagara\Src\Math\MatrixClass;


class MetodeTopsis
{
    private $normalisasi;
    private $normalisasi_terbobot;
    private $matrix_solusi_ideal;
    private $positif;
    private $negatif;
    private $total;


    /**
     * method atau function untuk normalisasi bobot
     * @author eka jaya nagara
     * @param array         | bobot atau weight
     * @return array
     */
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

    /**
     * method atau function untuk normalisasi matrix
     * @author eka jaya nagara
     * @param array         | matrix nilai kriteria
     * @return array
     */
    public function normalisasi($arr = [])
    {
        $temp = [];
        foreach ($arr as $key => $matrix) {
            foreach ($matrix as $index => $value) {
                $temp[$key][$index] = pow($value, 2);
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

    /**
     * method atau function untuk matrix solusi
     * @author eka jaya nagara
     * @param array         | type kriteria
     * @return array
     */
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
            } else {
                // echo "ini adalah benefit<br>";
                $positif[$key] = max($value);
            }
        }

        $negatif = [];
        foreach ($trasnform as $key => $value) {
            if ($kriteria[$key] == "biaya") {
                // echo "ini adalah cost<br>";
                $negatif[$key] = max($value);
            } else {
                // echo "ini adalah benefit<br>";
                $negatif[$key] = min($value);
            }
        }

        // matrix solusi ideal
        $matrix_solusi_ideal = [$positif, $negatif];
        $this->matrix_solusi_ideal = $matrix_solusi_ideal;
        $this->positif = $positif;
        $this->negatif = $negatif;

        // total
        return $this->matrix_solusi_ideal;
    }

    /**
     * method atau function untuk menghitung total dan mencari preferensi
     * @author eka jaya nagara
     * @param array         | nilai positif
     * @param array         | nilai negatif
     * @return array
     */
    public function total($positif = [], $negatif = [])
    {
        // mencari nilai kuadrat
        $new_positif_kuadrat = [];
        $new_negatif_kuadrat = [];
        foreach ($this->normalisasi_terbobot as $key => $matrix) {
            foreach ($matrix as $index => $value) {
                $new_positif_kuadrat[$key][$index] = pow($value - $positif[$index], 2);
                $new_negatif_kuadrat[$key][$index] = pow($value - $negatif[$index], 2);
            }
        }

        // mencari nilai akar kuadrat
        $new_positif = [];
        $new_negatif = [];
        foreach ($new_positif_kuadrat as $key => $matrix) {
            $new_positif[$key] = sqrt(array_sum($matrix));
        }
        foreach ($new_negatif_kuadrat as $key => $matrix) {
            $new_negatif[$key] = sqrt(array_sum($matrix));
        }


        // mencari nilai preferensi
        $preferensi = [];
        foreach ($new_positif as $key => $value) {
            MathematicClass::division_by_zero($value + $new_negatif[$key]);
            $preferensi[$key] = $new_negatif[$key] / ($value + $new_negatif[$key]);
        }

        // nilai total
        $total = [$new_positif, $new_negatif, $preferensi];
        $this->total = $total;
        return $this->total;
    }

    /**
     * method atau function untuk method topsis
     * @author eka jaya nagara
     * @param array         | matrix value kriteria
     * @param array         | bobot atau weight
     * @param array         | type kriteria
     * @return array
     */
    public function topsis($matrix = [], $weight = [], $kriteria_weight = [])
    {
        self::normalisasi($matrix);
        self::normalisasi_terbobot($weight);
        self::matrix_solusi($kriteria_weight);
        return self::total($this->positif, $this->negatif);
    }
}
