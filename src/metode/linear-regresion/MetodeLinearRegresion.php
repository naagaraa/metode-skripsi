<?php
/**
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi linear regresion
 * @license     MIT public license
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
        $constanta_a = round($h1 / $h2 ,2 );
        return $constanta_a;
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
        $constanta_b = round($z1 / $z2, 2);
        return $constanta_b;
    }

    /**
     * method untuk menhitung nilai pada model linear regresion mencari nilai y
     * @author eka jaya nagara
     * @return  float      | value squared by x
     */
    public function LinearRegresion_x($x_paramter = [] , $y_paramter = [], $paramter_predixtion_x = 0)
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
     * @return  float      | value squared by x
     */
    public function LinearRegresion_y($x_paramter = [] , $y_paramter = [], $paramter_predixtion_y = 0)
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
}