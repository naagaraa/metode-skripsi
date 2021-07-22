<?php


/**
 * besson rank
 * 1. value rangking dari matrixnya [1,2,3,4,5]
 * 2. mencari nilai yang sama pada value dimatrix [4 => 2, 3 => 3]
 * 3. hitung mean untuk besson rank
 */

namespace Nagara\Src\Metode;

use Nagara\Src\Math\MatrixClass;

class MetodeOreste
{

    private $ranked;
    private $bessonRank;

    public function rank_array($values = [])
    {
        // mencari rangking dari array.
        $result = array();

        $ordered_values = $values;
        rsort($ordered_values);
        foreach ($values as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $result[$value] = $key + 1;
        }
        $this->ranked = $result;
        return $result;
    }



    public function besson_rank($arr = [])
    {
        // urutkan dari yang terbesar
        rsort($arr);

        // cari nilai yang sama
        $similar_value = [];
        $similar_value = array_count_values($arr);

        $rangked = [];
        foreach ($arr as $key => $alternative) {
            foreach ($similar_value as $index => $value) {
                // mencari mengurutkan nilai yang sama
                if ($alternative === $index) {
                    $rank_index = $key + 1;
                    // $rank[$key] = "nilai sama {$index} ranked ke - {$rank_index}";
                    $rangked[$rank_index] = $index;
                }
            }
        }

        // echo "counter<br>";
        // dump($similar_value);

        $result = [];
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
                    $result[$key] = $x;
                }
            }
        }

        // echo "total yang akan dibuat mean <br>";
        // dump($result);
        $result_2 = [];
        foreach ($result as $key => $value) {
            $result_2[$key] = $value / $similar_value[$key];
        }

        // echo "mean<br>";
        // dump($result_2);

        $besson_rank = [];
        foreach ($rangked as $rank => $value) {
            foreach ($result_2 as $key => $mean) {
                if ($value === $key) {
                    $besson_rank[$rank] = $mean;
                }
            }
        }

        return $besson_rank;
    }




    public function multiple_besson_rank($matrix = [])
    {
        $besson_rank = [];
        foreach ($matrix as $key => $value) {
            $besson_rank[$key] = self::besson_rank($value);
        }

        $this->besson_rank = $besson_rank;
    }

    public function distance_score()
    {
        $value_of_distance = [];
        foreach ($this->besson_rank as $key => $arr) {
            $x = count($arr);
            foreach ($arr as $index => $value) {
            }
            dump($x);
        }
    }

    public function preferensi($matrix = [])
    {
       self::multiple_besson_rank($matrix);
       self::distance_score();
    }
}
