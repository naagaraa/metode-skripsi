<?php

/**
 * 
 * this file is single method of PHP K-means
 * 
 * 
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

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Ceiling;

class MetodeKmeans
{
    private $centroid = [];
    private $perulangan_centroid;
    private $matrix;
    private $distance_cn;
    private $distance = [];
    private $n;

    public function EuclidianDistance($matrix = [], $centroid)
    {

        $this->matrix = $matrix;
        $n = count($matrix[0]);
        $this->n = $n;

        $dc1 = [];
        $dc2 = [];
        foreach ($matrix as $index => $matrix_n) {
            foreach ($matrix_n as $key => $value) {
                $dc1[$key] = sqrt((pow(($matrix[0][$key] - $centroid["C1"][0]), 2)) + (pow(($matrix[1][$key] - $centroid["C1"][1]), 2)));
                $dc2[$key] = sqrt((pow(($matrix[0][$key] - $centroid["C2"][0]), 2)) + (pow(($matrix[1][$key] - $centroid["C2"][1]), 2)));
            }
        }

        $distance_cn = [];
        $distance_cn = [$dc1, $dc2];

        array_push($this->distance, $distance_cn);
        $this->distance_cn = $distance_cn;
    }

    public function getNewCentroid()
    {
        // get location index centroid 1n dan 2n
        $temp_centroid_c1 = [];
        $temp_centroid_c2 = [];
        foreach ($this->distance_cn as $key => $dcn) {
            foreach ($dcn as $index => $value) {
                if ($this->distance_cn[0][$index] < $this->distance_cn[1][$index]) {
                    $temp_centroid_c1[$index] = $index;
                } else {
                    $temp_centroid_c2[$index] = $index;
                }
            }
        }

        // mencari nilai jumlah centroidnya c1a dan c1b
        $c1_a = [];
        foreach ($temp_centroid_c1 as $key => $value) {
            $c1_a[$key] = $this->matrix[0][$value];
        }
        $c1_b = [];
        foreach ($temp_centroid_c1 as $key => $value) {
            $c1_b[$key] = $this->matrix[1][$value];
        }

        // mencari nilai jumlah centroidnya c2a dan c2b
        $c2_a = [];
        foreach ($temp_centroid_c2 as $key => $value) {
            $c2_a[$key] = $this->matrix[0][$value];
        }
        $c2_b = [];
        foreach ($temp_centroid_c2 as $key => $value) {
            $c2_b[$key] = $this->matrix[1][$value];
        }

        // centroid baru
        $centroid = [
            "C1" => [
                array_sum($c1_a) / count($c1_a),
                array_sum($c1_b) / count($c1_b),
            ],
            "C2" => [
                array_sum($c2_a) / count($c2_a),
                array_sum($c2_b) / count($c2_b),
            ],
        ];

        // return centroid
        return $centroid;
    }

    public function Clustering($matrix = [], $centroid = [])
    {
        // check jika data awal 0
        $data_centroid_awal = count($this->centroid);
        if ($data_centroid_awal == 0) {
            array_push($this->centroid, $centroid);
        }

        // formula euclidian
        self::EuclidianDistance($matrix, $centroid);

        // get new centroid
        $new_centroid = self::getNewCentroid();

        // array push
        array_push($this->centroid, $new_centroid);
        $total_perulangan = count($this->centroid);

        // membandingkan nilai centroid terakhir dengan centroid sebelumnya
        $perulangan_centroid = [];
        for ($i = 0; $i <= count($this->matrix) - 2; $i++) {

            // c1 index terakhir dan index sebelum terakhir
            $C1N = array_diff_assoc(end($this->centroid)["C1"], $this->centroid[$total_perulangan - 2]["C1"]);

            // c2 index terakhir dan index sebelum terakhir
            $C2N = array_diff_assoc(end($this->centroid)["C2"], $this->centroid[$total_perulangan - 2]["C2"]);

            // check jika nilai centoroid sama
            if ((empty($C1N) and empty($C2N))) {
                // clustring selesai
                $perulangan_centroid = $this->centroid;
                $this->perulangan_centroid = $perulangan_centroid;
                return $this->perulangan_centroid;
                break;
            } else {
                // run recursion
                self::Clustering($matrix, end($this->centroid));
                continue;
            }
        }
    }

    public function getCentroid()
    {
        return $this->perulangan_centroid;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getValueN()
    {
        return $this->n;
    }

    public function getMatrix()
    {
        return $this->matrix;
    }
}