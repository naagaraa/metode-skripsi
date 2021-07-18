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


    public function rank_array($values = [])
    {
        // mencari rangking dari array. bug
        $ordered_values = $values;
        rsort($ordered_values);
        foreach ($values as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key ;
                    break;
                }
            }
            echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';
        }
    }

    public function besson_rank($arr = [])
    {
        // urutkan dari yang terbesar
        rsort($arr);

        // cari nilai yang sama
        $similar_value = [];
        $similar_value = array_count_values($arr);

        foreach ($similar_value as $key => $value) {
            // dump($arr);
        }

        dump($arr);

        $rank = [];
        foreach ($arr as $key => $alternative) {
            foreach ($similar_value as $index => $value) {
                // mencari mengurutkan nilai yang sama
                if ($alternative == $index) {
                    $rank[$key] = "nilai sama {$index}";
                }
            }
        }

        dump($rank);
    }

    public function check_duplicate_value_count($arr = [])
    {
        $dups = array_count_values($arr);
        return $dups;
    }
}
