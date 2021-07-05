<?php
namespace Nagara\Src\Metode;

use Nagara\Src\Math\MatrixClass;

class MetodeOreste{

    public function make_rank($arr = [])
    {
        $ordered_values = $arr;
        rsort($ordered_values);
        $dumy=[];
        foreach ($arr as $key => $value) {
            foreach ($ordered_values as $ordered_key => $ordered_value) {
                if ($value === $ordered_value) {
                    $key = $ordered_key;
                    break;
                }
            }
            $dumy[$value] = (int) $key + 1;
        }
        return $dumy;

    }

    public function check_duplicate_value_count($arr = [])
    {
        $dups = array_count_values($arr);
        return $dups;
    }
}