<?php

/**
 * 
 * this file is part of action mathematic matrix class for method skripshit
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa matrix class function object
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
 */

namespace Nagara\Src\Math;

use Nagara\Src\Metode\MetodeSaw;

class MatrixClass
{
    /**
     * function membuat single matrix / membuat array satu dimensi dari columnnya
     * @author eka jaya nagara
     * @param array             |  original array
     * @param string            |  column name atau field name
     * @return array            |  return new single array
     */
    public static function make_field_matrix($data = [], $fieldOrColumn = "")
    {
        if (!is_string($fieldOrColumn)) {
            echo "sorry field yang kamu masukan tidak sesuai format untuk single adalah string dan untuk multiple adalah array silahkan check kembali formatnya";
            exit;
        }

        // membuat single matrix dari colum atau fiels
        $new_nilai = [];
        foreach ($data as $siswa) {
            $new_nilai[] = $siswa[$fieldOrColumn];
        }
        return $new_nilai;
    }


    /**
     * function membuat matrix atau array multi dimensi baru dari original datanya 
     * @author eka jaya nagara
     * @param array                 | paramter pertama data original array
     * @param int                   | paramter kedua jumlah field atau colum yang diambil
     * @param array                 | paramter ketiga nama field atau colum yang diambil
     * @return array
     */
    public static function make_new_matrix($data = [], $total_column_or_baris_matrix, $field = [])
    {
        if (is_string($field)) {
            echo "sorry field yang kamu masukan tidak sesuai format untuk single adalah string dan untuk multiple adalah array silahkan check kembali formatnya";
            exit;
        }
        // $saw = new MetodeSaw;
        // check kondisi
        if ($total_column_or_baris_matrix !== count($field)) {
            echo "jumlah column yang di inputkan tidak sama dengan jumlah nama column yang masukan";
            exit;
        }

        // membuat matrix baru
        $box_matrix = array();
        for ($i = 0; $i < $total_column_or_baris_matrix; $i++) {
            $box_matrix[$i] = self::make_field_matrix($data, $field[$i]);
        }

        return $box_matrix;
    }

    /**
     * function membuat flip matrix atau melaukan tranfrom array baris menjadi colum atau sebaliknya
     * @author eka jaya nagara
     * @param array                 | array yang akan di flip berdasarkan index
     * @return array
     */
    public static function flip_matrix($array = [])
    {
        $hasil = array();
        foreach ($array as $key => $subarr) {
            foreach ($subarr as $subkey => $subvalue) {
                $hasil[$subkey][$key] = $subvalue;
            }
        }
        return $hasil;
    }


    /**
     * function untuk mencari nilai multiplikasi atau perkalian dalam arry 1D atau single matrix
     * @param array                 | array yang akan di flip berdasarkan index
     * @return array
     * 
     * fungsi array_reduce(). array_reduce() berfungsi untuk melakukan iterasi
     * array dari index 0 ke index terakhir dengan menjalankan fungsi reducer
     * yang kita berikan di parameter ke 2 pada fungsi ini. Fungsi tersebut
     * memiliki 3 parameter yaitu:
     * 
     * 1. Parameter pertama => array yang akan di reduce
     * 2. Parameter Kedua => fungsi reducer yang akan menerima 2 parameter yaitu 
     * nilai kembalian fungsi di iterasi sebelumnya, dan nilai element array 
     * pada posisi sekarang. Note: Pada saat melakukan iterasi pertama (index ke 
     * 0 array), nilai parameter pertama fungsi reducer merupakan nilai awal
     * yang diberikan pada parameter ketika fungsi array_reduce()
     * 3. Parameter ketiga => nilai awal
     *  
     */

    public function Matrix_Multiplikasi($array = [])
    {

        if (!is_array($array)) {
            echo "value yang dimasukan bukan array, tidak dapat dilakukan multiplikasi";
            exit;
        }

        $output = array_reduce($array, function ($prev, $now) {
            return $prev * $now;
        }, 1);
        return $output;
    }
}
