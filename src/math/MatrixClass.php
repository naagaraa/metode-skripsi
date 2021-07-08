<?php
/**
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa matrix class function object
 * @license     MIT public license
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
    public static function make_new_matrix($data = [], $total_column_or_baris_matrix ,$field = [])
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
        for ($i = 0; $i < $total_column_or_baris_matrix ; $i++) { 
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
        foreach ($array as $key => $subarr)
        {
            foreach ($subarr as $subkey => $subvalue)
            {
                $hasil[$subkey][$key] = $subvalue;
            }
        }
        return $hasil;
    }
}