<?php
/**
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Simple Adictive Weight
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
/**
 * 
 */

class MetodeSaw{
    /**
     * function menghitung normalisasi
     * @author eka jaya nagara
     * @param array         | original matrix
     * @return array
     */
    public function normalisasi_value( $matrix = [], $cost)
    {
        $normalisasi = [];
        $cost = $cost; // index colum 0 adalah cost
        for ($i=0; $i < count($matrix) ; $i++) { 
            // check index colum yang termasuk cost
            if ($i == $cost) {
                foreach($matrix[$cost] as $key => $value){
                    $normalisasi[$cost][$key] = round( $value / max($matrix[$cost]) , 3 );
                }
            }else{
                foreach($matrix[$i] as $key => $value){
                    $normalisasi[$i][$key] = round( min($matrix[$i]) / $value , 3 );
                }
            }
        }
        return $normalisasi;
    }

    /**
     * function menghitung nilai alternative
     * @author eka jaya nagara
     * @param array             | matrix data  nilai yang sudah di flip atau transform
     * @param array             | matrix bobot 
     * @return array
     */
    public function get_alternative($flip_matrix= [], $bobot = [])
    {
        // $matrix =  new MatrixClass;
        // check kondisi jumlah colum selalu sama dengan jumlah bobotnya
        $matrixC = new MatrixClass;
        $column = $matrixC->flip_matrix($flip_matrix);
        if (count($column) !== count($bobot)) {
            echo "jumlah column yang di inputkan tidak sama dengan jumlah nama column yang masukan";
            exit;
        }
        // flix matrix merubah row menjadi colum
        // bobot adalah nilai kritria / bobot
        $data = [];
        for ($i=0; $i < count($flip_matrix) ; $i++) { 
            foreach ($flip_matrix[$i] as $key => $value) {
                $data[$i][$key] = $flip_matrix[$i][$key] * $bobot[$key];
            }
        }

        return $data;
    }

    /**
     * function menghitung nilai vector dari jumlah alternative
     * @author eka jaya nagara
     * @param array                 | nilai alternative
     * @return array
     */
    public function hitung_v($alternative = [])
    {
        // menjulahlan row nilai alternativenya
        $result = [];
        for ($i=0; $i < count($alternative); $i++) { 
            foreach($alternative[$i] as $key => $value) {
                $result[$i] = array_sum($alternative[$i]);
            }
        }
        return $result;
    }

    /**
     * function menggabungkan nilai array vector ke dalam array original
     * @author eka jaya nagara
     * @param array                 | matrix original
     * @param array                 | matrix hasil perhitungan vector
     * @param string                | string nama field baru untuk hasil perhitungan
     * @return array
     */
    public function menambah_hasil_akhir_ke_dalam_field_data($data = [], $vector = [], $field = "")
    {
        // mengabungkan nilai alternative dengan original arraynya
        $final = $data;
        for ($i=0; $i < count($final); $i++) { 
            foreach($final[$i] as $key => $value) {
                $final[$i][$field] = $vector[$i];
            }
        }
        return $final;
    }

    /**
     * function menggabungkan nilai array vector ke dalam array original
     * @author eka jaya nagara
     * @param array                 | matrix original
     * @param int                   | jumlah colum kriteria atau data kriteria 
     * @param int                   | index start from 0 untuk colum pertama pada kriteria (index yang termasuk kriteria cost)
     * @param array                 | nama column kriteria
     * @param array                 | bobot pada kriteria
     * @param string                | string nama field baru untuk hasil perhitungan
     * @return array
     */
    public function saw($data_original = [], $jumlah_column_kriteria, $index_column_cost , $nama_column_kriteria = [], $bobot = [], $column_hasil = "hasil_akhir" )
    {
        $matrixC = new MatrixClass;
        // buat new matrix
        $matrix = $matrixC->make_new_matrix($data_original, $jumlah_column_kriteria, $nama_column_kriteria, $index_column_cost );
        //  normalisasi
        $normalisasi = self::normalisasi_value($matrix , $index_column_cost);
        // transform matrix
        $flip_matrix = $matrixC->flip_matrix($normalisasi);
        // hitung alternative
        $data_alternative = self::get_alternative($flip_matrix, $bobot);
        // hitung total dari data alternativenya
        $hasil_vector = self::hitung_v($data_alternative);
        // gabungkan dengan data originalnya dengan menambahkan satu column hasil
        $arr = self::menambah_hasil_akhir_ke_dalam_field_data($data_original, $hasil_vector, $column_hasil);

        return $arr;
    }
}