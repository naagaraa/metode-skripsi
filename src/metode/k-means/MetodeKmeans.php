<?php
/**
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi K means
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
 * 
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

        // sum n 
        $this->n = self::count_n($n);

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

        // menggabungkan nilai dengan cluster
        $data_baru = [];
        foreach ($this->cluster as $key => $value) {
            $data_baru[$key]["cluster"] = $value;
            $data_baru[$key]["a"] = $this->a[$key];
            $data_baru[$key]["b"] = $this->b[$key];
        }

        // menjadi nilai berdasarkan clusternya
        $a_cluster_c1 = [];
        $a_cluster_c2 = [];
        
        $b_cluster_c1 = [];
        $b_cluster_c2 = [];

        foreach ($data_baru as $key => $value) {
            if($value["cluster"] == "C1"){
                $a_cluster_c1[$key] = $value["a"];
                $b_cluster_c1[$key] = $value["b"];
            }else{
                $a_cluster_c2[$key] = $value["a"];
                $b_cluster_c2[$key] = $value["b"];
            }
        }

        
        // total nilai cluster untuk mencari centroid baru
        $new_c1[0] = array_sum($a_cluster_c1) / count($a_cluster_c1);
        $new_c1[1] = array_sum($b_cluster_c1) / count($b_cluster_c1);

        $new_c2[0] = array_sum($a_cluster_c2) / count($a_cluster_c2);
        $new_c2[1] = array_sum($b_cluster_c2) / count($b_cluster_c2);


        // iterasi centroid 1
        $data[0]["C1"] = $centroid_1;
        $data[0]["C2"] = $centroid_2;

        // menghasilkan centroid baru pertama
        $data[1]["C1"] = $new_c1;
        $data[1]["C2"] = $new_c2;

        // dump($new_c1);
        // dump($new_c2);
       
        // dump($b_cluster_c1);
       
        for ($i=0; $i < count($data) ; $i++) { 
            // check index sebelumnya bukan -1 atau lebih kecil dari pada 0
            if ($i - 1 >= 0) {
                // echo $i - 1 .'<br>';
                // echo $i . '<br>';


                // index sebelum terakhir
                // C1
                // dump($data[$i-1]["C1"][0]);
                // dump($data[$i-1]["C1"][1]);
                // // C2
                // dump($data[$i-1]["C2"][0]);
                // dump($data[$i-1]["C2"][1]);

                // // index terakhir
                // // C1
                // dump($data[$i]["C1"][0]);
                // dump($data[$i]["C1"][1]);
                // // C2
                // dump($data[$i]["C2"][0]);
                // dump($data[$i]["C2"][1]);

                if ( ($data[$i]["C1"][0] == $data[$i-1]["C1"][0]) and ( $data[$i]["C1"][1] == $data[$i-1]["C1"][1] ) and ( $data[$i]["C2"][0] == $data[$i-1]["C2"][0] ) and ( $data[$i]["C2"][1] == $data[$i-1]["C2"][1] ) )

                // ( C1 ) and ( C2 )
                // if ( ( 1.5 == 1.5 ) and ( 1 == 1 ) and (4.5 == 4.5 ) and ( 3.5 == 3.5 ) ) 
                {
                   echo "nilai centroid sudah sama <br>";
                   dump($data);
                    dump($this->elucidian);
                   exit;
                }else{
                    echo "nilai centroid belum sama <br>";
                    self::EuclidianDistance($n, $a , $b , $new_c1, $new_c2);
                }

            }
        }

    }


}