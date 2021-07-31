<?php

/**
 * 
 * this file is part of action office DocumentExcel for method skripshit
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa office DocumentExcel function object
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

namespace Nagara\Src\Doc;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Nagara\Src\Math\MatrixClass;


class DocumentExcel
{

    private $data;
    private $column;
    private $filename;
    private $extension;
    private $field;


    /**
     * method atau funtion untuk membaca file excel atau csv
     * @author eka jaya nagara
     * @param string            |  path file name
     * @return object           |  return object
     */
    public function read($namefiles = "")
    {
        if ($namefiles == "") {
            print("nama file tidak boleh kosong");
            exit;
        }
        // get file
        $file = $namefiles;
        $old_name = explode(".", $namefiles);
        $extension = end($old_name);

        $this->file = $file;
        $this->extension = $extension;

        // kasih permision pada filenya
        chmod($file, 0777);

        // Identify the type of $inputFileName  
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file);

        // Create a new Reader of the type that has been identified  
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

        // config
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file);

        // get info dari worksheet
        $worksheetData = $reader->listWorksheetInfo($file);
        $data = [
            "worksheet_name" => $file,
            "worksheet_type" => $extension,
            "last_column_letter" => $worksheetData[0]["lastColumnLetter"],
            "last_column_index" => $worksheetData[0]["lastColumnIndex"],
            "total_rows" => $worksheetData[0]["totalRows"],
            "total_columns" => $worksheetData[0]["totalColumns"],
            "worksheet" => array(),
        ];

        foreach ($worksheetData  as $worksheet) {
            // $reader->setLoadSheetsOnly($sheetName);
            $spreadsheet = $reader->load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $sheetData = $worksheet->toArray();

            // save data ke array
            $data["worksheet"] = $sheetData;
        }
        // convert array to object
        $object = json_decode(json_encode($data));

        $this->data = $object->worksheet;
        // index 0 adalah nama columnnya
        return $object;
    }

    /**
     * method atau funtion untuk remove index 0 sebagai column name
     * @author eka jaya nagara
     * @param array             |  data matrix worksheet
     * @return array            |  return matrix
     */
    public function removeColumn($arr = [])
    {
        if (empty($arr)) {
            print("array / matrix tidak ada");
            exit;
        }

        // remove columns
        unset($arr[0]);

        $matrix = [];
        foreach ($arr as $key => $value) {
            $matrix[$key - 1] = $value;
        }

        // return by row
        return $matrix;
    }


    /**
     * method atau funtion untuk merubah index menjadi file name associative array
     * @author eka jaya nagara
     * @return array           |  return object
     */
    public function convertIndexToAssociative()
    {
        // get colum name
        $columnName = [];
        foreach ($this->data[0] as $key => $value) {
            $columnName[$key] = $value;
        }
        $this->column = $columnName;

        // remove column at default data
        $new_data = self::removeColumn($this->data);

        // transform
        $matrix = new MatrixClass;
        $transform = $matrix->flip_matrix($new_data);

        // convert data by index to string by name of column
        $convertData = [];
        foreach ($transform as $key => $value) {
            $convertData[$columnName[$key]] = $value;
        }

        $this->field = $convertData;
        return $convertData;
    }

    /**
     * method atau funtion untuk menampilkan data berdasarkan column
     * @author eka jaya nagara
     * @return matrix           |  return matrix
     */
    public function showColumn()
    {
        self::convertIndexToAssociative();
        return $this->field;
    }

    /**
     * method atau funtion untuk menampilkan data berdasarkan row
     * @author eka jaya nagara
     * @return matrix           |  return matrix
     */
    public function showRow()
    {
        $matrix = self::removeColumn($this->data);
        return $matrix;
    }

    /**
     * method atau funtion untuk menampilkan data berdasarkan column yang di ambil
     * @author eka jaya nagara
     * @return matrix           |  return single matrix
     */
    public function showByColumn($column = "")
    {

        // check 1
        if ($column === "") {
            print("nama column belum dimasukan");
            exit;
        }

        // check 2
        if (!array_key_exists($column, $this->field)) {
            print("nama column tidak ada");
            exit;
        }

        $data = [];
        foreach ($this->field[$column] as $key => $value) {
            $data[] = $value;
        }

        return $data;
    }
}
