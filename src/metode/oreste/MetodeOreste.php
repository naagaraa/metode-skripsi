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

        foreach ($similar_value as $key => $value) {
            // dump($key);
        }

        // dump($arr);

        $rangked = [];
        $rank = [];
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

        dump($rank);
        dump($similar_value);

        // dump($similar_value);
        $result = [];
        $found = FALSE;
        $x = 0;
        foreach ($similar_value as $key => $counter) {
            foreach ($rangked as $rank => $value) {


                if ($value !== $key) {
                    $x = 0;
                    continue;
                } 
                
                if ($value == $key) {
                    $x = $rank + $x;
                    // dump("{$rank} ditambah {$x}");
                    $result[$key] = $x;
                } 

                dump($counter);
                
            }
        }


        dump($result);
    }

    public function check_duplicate_value_count($arr = [])
    {
        $dups = array_count_values($arr);
        return $dups;
    }
}
