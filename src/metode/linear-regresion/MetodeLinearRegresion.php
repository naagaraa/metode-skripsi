<?php
/**
 * 
 * this file is single method of PHP Weight Product
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi linear regresion
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

class MetodeLinearRegresion {

    /**
     * @var array untuk nilai x bentuk array untuk data awal example rata-rata suhu ruangan
     */
    private $x;

    /**
     * @var array untuk nilai y bentuk array untuk data hasil example jumlah cacat
     */
    private $y;

    /**
     * @var array untuk nilai x squared atau kuarat bentuk array nilai dari nilai x
     */
    private $x2;

    /**
     * @var array untuk nilai y squared atau kuarat bentuk array nilai dari nilai y
     */
    private $y2;

    /**
     * @var array untuk nilai xy Multiplication atau perkalian  bentuk array nilai dari nilai x * y
     */
    private $xy;

    /**
     * @var int untuk nilai n jumlah total atau sum dari nilai x
     */
    private $n;

    /**
     * @var float untuk nilai konstanta a pada model linear regresion
     */
    private $const_a;

     /**
     * @var float untuk nilai konstanta b pada model linear regresion
     */
    private $const_b;

     /**
     * @var float untuk nilai hasil model linear regresion
     */
    private $regresion ;


    /**
     * method untuk menhitung nilai x kuadrat pada model linear regresion
     * @author eka jaya nagara
     * @param array         | parameter x adalah nilai x
     * @return  array       | value squared by x
     */
    public function x_kuadrat($paramter_x = [])
    {
        if (isset($paramter_x)) {
            $x = $paramter_x;
        };

        $x_2 = [];
        foreach ($x as $key => $value) {
            $x_2[$key] = pow($value,2);
        }
        $this->x2 = $x_2;

        return $this->x2;
    }


    
    /**
     * method untuk menhitung nilai y kuadrat pada model linear regresion
     * @author eka jaya nagara
     * @param array         | parameter y adalah nilai y
     * @return  array       | value squared by y
     */
    public function y_kuarat($paramter_y = [])
    {
        if (isset($paramter_y)) {
            $y = $paramter_y;
        };

        $y_2 = [];
        foreach ($y as $key => $value) {
            $y_2[$key] = pow($value,2);
        }
        $this->y2 = $y_2;

        return $this->y2;
    }

    
    /**
     * method untuk menhitung nilai sum xy pada model linear regresion
     * @author eka jaya nagara
     * @param array         | parameter x adalah nilai x
     * @param array         | parameter y adalah nilai y
     * @return  array       | value sum x and y
     */
    public function xy_sum($paramter_x = [], $paramter_y = [])
    {
        if (!isset($paramter_y) and !isset($paramter_y)) {
            echo "paramter x atau y belum ada";
        };

        $xy = [];
        for ($i=0; $i < count($paramter_x) ; $i++) { 
            $xy[$i] = $paramter_x[$i] * $paramter_y[$i];
        }
        $this->xy = $xy;

        return $this->xy;
    }

    
    /**
     * method untuk menhitung nilai konstata a pada model linear regresion
     * @author eka jaya nagara
     * @return  float      | constanta a
     */
    public function constant_a()
    {
        $h1 = ( array_sum($this->y) * array_sum($this->x2) ) - ( array_sum($this->x) * array_sum($this->xy) );
        $h2 = (( count($this->x) * array_sum($this->x2) ) - pow(array_sum($this->x), 2));

        // hadnling divided by zero
        if ($h2 == 0.0) {
            echo "Cannot divide by zero constant a";
        }else{
            $constanta_a = round($h1 / $h2 ,2 );
            return $constanta_a;
        }
        
    }

    
    /**
     * method untuk menhitung nilai konstata b pada model linear regresion
     * @author eka jaya nagara
     * @return  float       | constant b
     */
    public function constant_b()
    {
        $z1 = ( (count($this->x) * array_sum($this->xy)) - ( array_sum($this->x) * array_sum($this->y)));
        $z2 = (( count($this->x) * array_sum($this->x2) ) - pow(array_sum($this->x), 2));
        
        // hadnling divided by zero
        if ($z2 == 0.0) {
            echo "Cannot divide by zero constant b";
        }else{
            $constanta_b = round($z1 / $z2, 2);
            return $constanta_b;
        }
    }

    /**
     * method untuk menhitung nilai pada model linear regresion mencari nilai y
     * @author eka jaya nagara
     * @param array         | x adaalah data x
     * @param array         | y adalah data y
     * @param int           | paramter prediction
     * @return  array       | return hasil array
     */
    public function LinearRegresion_y($x_paramter = [] , $y_paramter = [], $paramter_predixtion_x = 0)
    {
        $this->x = $x_paramter;
        $this->y = $y_paramter;
        $this->n = count($x_paramter);

        // hitung syarat
        self::x_kuadrat($x_paramter);
        self::y_kuarat($y_paramter);
        self::xy_sum($x_paramter, $y_paramter);

        //  find constanta a and b
        $this->const_a = self::constant_a();
        $this->const_b = self::constant_b();

        // rumus regresion
        $this->regresion = round(($this->const_a + (  $this->const_b * $paramter_predixtion_x )),2);

        return $this->regresion;

    }

    /**
     * method untuk menhitung nilai pada model linear regresion mencari nilai x
     * @author eka jaya nagara
     * @param array         | x adaalah data x
     * @param array         | y adalah data y
     * @param int           | paramter prediction
     * @return  array       | return hasil array
     */
    public function LinearRegresion_x($x_paramter = [] , $y_paramter = [], $paramter_predixtion_y = 0)
    {
        $this->x = $x_paramter;
        $this->y = $y_paramter;
        $this->n = count($x_paramter);

        // hitung syarat
        self::x_kuadrat($x_paramter);
        self::y_kuarat($y_paramter);
        self::xy_sum($x_paramter, $y_paramter);

        //  find constanta a and b
        $this->const_a = self::constant_a();
        $this->const_b = self::constant_b();


        // rumus regresion y 
        $this->regresion = round( (( $paramter_predixtion_y + ( -1 * $this->const_a ) ) / $this->const_b ),2);

        return $this->regresion;

    }


    public function MultipleLinearRegresion($x_paramter = [] , $y_paramter = [], $paramter_predixtion = [], $type_regresion_x_or_y = "y")
    {
        if ($type_regresion_x_or_y == "y") {
            $regresion = [] ;
            foreach ($paramter_predixtion as $key => $value) {
                $regresion[$key] = self::LinearRegresion_y($x_paramter, $y_paramter, $value);
            }
        }elseif($type_regresion_x_or_y == "x") {
            $regresion =[] ;
            foreach ($paramter_predixtion as $key => $value) {
              $regresion[$key] = self::LinearRegresion_x($x_paramter, $y_paramter, $value);
            }
        }

        $this->regresion = $regresion;
        return $this->regresion;

    }

    /**
     * method untuk mengabungkan data asli dengan data hasil prediction dengan menciptakan satu field baru pada larik array
     * @author eka jaya nagara
     * @param array         | x adaalah data x
     * @param array         | y adalah data y
     * @param array         | y adalah data y
     * @param array         | y adalah data y
     * @param string        | paramter prediction
     * @param string        | paramter prediction
     * @return  array       | return hasil array yang sudah dicombinasi
     */
    public function Combine_LinearRegresion($data_original = [] , $x_paramter = [] , $y_paramter = [], $paramter_predixtion = [], $type_x_or_y = "x", $add_field = "hasil" )
    {

        // check validasi data
        $jml_original = count($data_original);
        $jml_parameter_prediction = count($paramter_predixtion);

        if ($jml_original !== $jml_parameter_prediction) {
            echo "jumlah data original dan paramter tidak valid, jumlah total row berbeda, jumlah orginal {$jml_original} dan jumlah paramter {$jml_parameter_prediction}";
            exit;
        }

        //  combine data
        if ($type_x_or_y == "x") {
            $combine_data = $data_original ;
            foreach ($paramter_predixtion as $key => $value) {
                $combine_data[$key][$add_field] = self::LinearRegresion_x($x_paramter, $y_paramter, $value);
            }
        }else{
            $combine_data = $data_original ;
            foreach ($paramter_predixtion as $key => $value) {
              $combine_data[$key][$add_field] = self::LinearRegresion_y($x_paramter, $y_paramter, $value);
            }
        }

        return $combine_data;
    }
}