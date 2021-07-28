<?php
/**
 * 
 * this file is single method of PHP Oreste
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi oreste
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

class MetodeOreste
{
    private $matrix;
    private $ranked;
    private $bessonRank;
    private $distanceScore;
    private $preferensi;
    private $temp_preferensi;

    /**
     * method untuk check rank pada array atau matrix
     * @param array                 | single matrix atau satu dimensi matrix
     * @return array
     */
    public function rank_array($values = [])
    {
        // mencari rangking dari array.
        $rank_array = array();

        $ordered_values = $values;
        rsort($ordered_values);
        foreach ($values as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $rank_array[$value] = $key + 1;
        }
        $this->ranked = $rank_array;
        return $rank_array;
    }


    /**
     * method untuk mencari nilai besson rank
     * @author eka jaya nagara
     * @param array                     | single matrix
     * @return array                    | single besson rank
     */
    public function besson_rank($arr = [])
    {
        // reverse arrt start from index 1
        $new_arr_index = [];
        foreach ($arr as $key => $value) {
            $new_arr_index[$key + 1] = $value;
        }

        // mengurutkan dari yang terbesar
        rsort($arr);

        // cari nilai yang sama pada field
        $similar_value = [];
        $similar_value = array_count_values($arr);


        // mencari rangking nilai pada field
        $rangked = [];
        foreach ($arr as $key => $alternative) {
            foreach ($similar_value as $index => $value) {
                // mencari mengurutkan nilai yang sama
                if ($alternative === $index) {
                    $rank_index = $key + 1;
                    $rank[$key] = "nilai sama {$index} ranked ke - {$rank_index}";
                    $rangked[$rank_index] = $index;
                }
            }
        }

        // step satu menghitung rata -rata rank untuk besson rank
        $count_similar_value = [];
        $x = 0;
        foreach ($similar_value as $key => $counter) {
            foreach ($rangked as $rank => $value) {

                // jika syarat kondisi tidak terpenuhi maka skip
                if ($value !== $key) {
                    $x = 0;
                    continue;
                }

                // mencari nilai untuk mean step pertama
                if ($value == $key) {
                    $x = $rank + $x;
                    $count_similar_value[$key] = $x;
                }
            }
        }

        // step dua untuk mencari mean untuk besson rank
        $total_mean = [];
        foreach ($count_similar_value as $key => $value) {
            $total_mean[$key] = round($value / $similar_value[$key], 2);
        }

        // nilai besson rank adalah mean dari step sebelumnya
        $besson_rank = [];
        foreach ($new_arr_index as $rank => $value) {
            foreach ($total_mean as $key => $mean) {
                if ($value === $key) {
                    $besson_rank[$rank] = $mean;
                }
            }
        }

        // return besson rank
        $this->besson_rank = $besson_rank;
        return $besson_rank;
    }



    /**
     * method untuk mencari multiple besson rank
     * @author eka jaya nagara
     * @param array                 | matrix original
     * @return array
     */
    public function multiple_besson_rank($matrix = [])
    {
        $besson_rank = [];
        foreach ($matrix as $key => $value) {
            $besson_rank[$key + 1] = self::besson_rank($value);
        }
        // mutitple besson rank
        $this->besson_rank = $besson_rank;
    }



    public function distance_score()
    {
        // mencari nilai distance score
        $value_of_distance = [];
        foreach ($this->besson_rank as $key => $arr) {
            $x = count($arr);
            foreach ($arr as $index => $value) {
                // memecah perhitungan mejadi beberapa part atau bagian
                $p1 = (0.5 * pow($value, 3));
                $p2 = (0.5 * pow($key, 3));
                $score =  $p1 + $p2;
                $score = pow($score, (0.3333333333333333));
                $value_of_distance[$key][$index] = round($score, 2);
            }
        }
        // return nilai distance score
        $this->distanceScore = $value_of_distance;
        return $value_of_distance;
    }



    /**
     * method untuk mencari nilai preferensi
     * @author eka jaya nagara
     * @param array                 | matrix original
     * @param array                 | matrix bobot
     * @return array    
     */
    public function preferensi($matrix = [], $bobot = [])
    {
        self::multiple_besson_rank($matrix);
        self::distance_score();

        // mengubah index start form 1 untuk bobot
        $weight = [];
        foreach ($bobot as $key => $value) {
            $weight[$key + 1] = $value;
        }

        // index start from 1 untuk mengitung nilai preferensi step 1
        $temp_preferensi = [];
        foreach ($this->distanceScore as $key => $value) {
            foreach ($value as $index => $nilai) {
                $temp_preferensi[$key][$index] = round($value[$index], 4) * $weight[$key];
            }
        }

        // transform nilai matrix tmp preferensi
        $matrix = new MatrixClass;
        $transform_preferensi = $matrix->flip_matrix($temp_preferensi);

        $this->temp_preferensi = $temp_preferensi;

        // menjumlahkan nilai preferensi step 2 dari step 1
        $preferensi = [];
        foreach ($transform_preferensi as $key => $value) {
            $preferensi[$key] = array_sum($value);
        }

        // return nilai preferensi
        $this->preferensi = $preferensi;
        return $this->preferensi;
    }

    /**
     * method untuk method oreste
     * @author eka jaya nagara
     * @param array                 | original matrix
     * @param array                 | bobot
     * @return array                | nilai preferensi
     */
    public function oreste($matrix = [], $bobot = [])
    {
        $this->matrix = $matrix;
        return self::preferensi($matrix, $bobot);
    }

    /**
     * method untuk mendapatkan nilai ranked array
     * @author eka jaya nagara
     * @return array
     */
    public function getRanked()
    {
        return $this->ranked;
    }

     /**
     * method untuk mendapatkan nilai besson rank
     * @author eka jaya nagara
     * @return array
     */
    public function getBessonRank()
    {
        $matrix = new MatrixClass;
        $besson = $matrix->flip_matrix($this->besson_rank);
        return $besson;
    }

     /**
     * method untuk mendapatkan distance score only
     * @author eka jaya nagara
     * @return array
     */
    public function getDistanceScore()
    {
        $matrix = new MatrixClass;
        $distanceScore = $matrix->flip_matrix($this->distanceScore);
        return $distanceScore;
    }

     /**
     * method untuk mendapatkan nilai prefensi
     * @author eka jaya nagara
     * @return array
     */
    public function getPreferensi()
    {
        return $this->preferensi;
    }

     /**
     * method untuk mendapatkan nilai temp prefensi
     * @author eka jaya nagara
     * @return array
     */
    public function getTempPreferensi()
    {
        $matrix = new MatrixClass;
        $tmp_preferensi = $matrix->flip_matrix($this->temp_preferensi);
        return $tmp_preferensi;
    }
}
