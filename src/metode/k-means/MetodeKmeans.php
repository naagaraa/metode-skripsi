<?php
/**
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi K means
 * @license     MIT public license
 */
namespace Nagara\Src\Metode;


class MetodeKmeans {

    public $a;
    public $b;
    public $c;

    public $sum_a;
    public $sum_b;

    public $n;

    // centroid awal
    public $c1;
    public $c2;

    // centroid selanjutnya 
    public $c1_n;
    public $c2_n;

    public $elucidian;
    public $cluster;
    public $sum_cluster;


    public function count_n($n = [])
    {
        // total n
        $total_n = 0;
        foreach ($n as $key => $value) {
            $total_n = $total_n + $value;
        }
        return $total_n;
    }

    public function count_a($a = [])
    {
        $total_a = 0;
        foreach ($a as $key => $value) {
            $total_a = $total_a + $value;
        }
        return $total_a;
    }

    public function count_b($b)
    {
        $total_b = 0;
        foreach ($b as $key => $value) {
            $total_b = $total_b + $value;
        }
        return $total_b;
    }

    public function c1_result($centroid_1 = [])
    {
       // hasil c1
       $c1 = [];
       foreach ($this->a as $key => $value) {
           $c1[$key] = sqrt((pow(($value - $centroid_1[0]),2) + pow(($this->b[$key] - $centroid_1[1]),2)));
       }
       return $c1;
    }

    public function c2_result($centroid_2 = [])
    {
        $c2 = [];
        foreach ($this->a as $key => $value) {
            $c2[$key] = sqrt((pow(($value - $centroid_2[0]),2) + pow(($this->b[$key] - $centroid_2[1]),2)));
        }
        return $c2;
    }

    public function cluster_result()
    {
        // hasil cluster
        $cluster = [];
        foreach ($this->c1 as $key => $value) {
            if ($value < $this->c2[$key]) {
                $cluster[$key] = "C1";
            }else{
                $cluster[$key] = "C2";
            }
        }
        return $cluster;
    }

    public function count_cluster()
    {
        return array_count_values($this->cluster);
    }
    
    public function EuclidianDistance($n = [], $a = [], $b = [], $centroid_1 = [], $centroid_2)
    {

        // data
        $this->a = $a;
        $this->b = $b;

        // sum n , a and b
        $this->n = self::count_n($n);
        $this->sum_a = self::count_a($a);
        $this->sum_b = self::count_b($b);

        // mencari nilai c1
        $this->c1 = self::c1_result($centroid_1);
        $this->c2 = self::c2_result($centroid_2);

        // elucidian
        $elucidian = [
            0 => $this->c1,
            1 => $this->c2
        ];
        $this->elucidian = $elucidian;

        // cluster
        $this->cluster = self::cluster_result();
        $this->sum_cluster = self::count_cluster();

        // mencari nilai centroid baru 1
        $this->c1_n[0] = ($this->sum_a / $this->sum_cluster["C1"]);
        $this->c1_n[1] = ($this->sum_b / $this->sum_cluster["C2"]);

        // mencari nilai centroid baru 1
        $this->c2_n[0] = ($this->sum_a / $this->sum_cluster["C1"]);
        $this->c2_n[1] = ($this->sum_b / $this->sum_cluster["C2"]);

        dump($this->sum_cluster);
        dump($this->c1_n);
        dump($this->c2_n);

    }


}