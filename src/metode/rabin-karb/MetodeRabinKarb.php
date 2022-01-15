<?php
/**
 * 
 * this file is single method of PHP Technique for Rabin Karb string matching
 * 
 * 
 * @author      Re-writing Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Technique for Rabin Karb string matching
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


//  REWRITING CODE
namespace Nagara\Src\Metode;

use Nagara\Src\TimeTracker;

class MetodeRabinKarb
{

    private static $data_word;
    private static $case_folding_string;
    private static $multipleNgram;
    private static $multiple_hashing;
    private static $multiple_matching;
    private static $multiple_DiceCoefficient_value;
    private static $multiple_DiceCoefficient_message;
    private static $multiple_time_execution;

    private static $n_gram_value;
    private static $n_prime_number;

    public function __construct($config = [])
    {
        // convert array to object
        $config = (object) $config;

        // set config
        self::$n_gram_value = $config->ngram;
        self::$n_prime_number = $config->prima;
    }
    /**
     * method case folding for remove character
     *
     * @param string $wordtext
     * @return array
     */
    private static function casefolding($wordtext = "")
    {
        // this block for multiple text or string
        if (!is_array($wordtext)) {
            echo "ups, sorry your file is't not array format";
            exit;
        }

        // loop word text
        $casefolding = [];
        foreach ($wordtext as $index => $text_string) {
            $casefolding[$index] = strtolower(str_replace(' ', '', preg_replace("/[^a-zA-Z0-9\s-]/", "", $text_string)));
        }

        self::$case_folding_string = $casefolding;
        return self::$case_folding_string;
    }

    /**
     * createNgram
     * this method for create random string for main string, example : iamgroot and
     * and gram is 5, first word 1amgr, and second word amgro, is slide char index 0 to 1
     *
     * @return array
     */
    private static function createNgram($casefolding = "")
    {
        // note string akan dianggap array jika dipanggil menurut index.

        // core
        $word = $casefolding;
        $n = self::$n_gram_value;

        // algo
        $ngrams = [];
        $length = strlen($word);

        //  core process algoritma
        for ($i = 0; $i < $length; $i++) {
            if ($i > ($n - 2)) {
                $randomword = '';
                for ($j = $n - 1; $j >= 0; $j--) {
                    $randomword .= $word[$i - $j];
                }
                $ngrams[] = $randomword;
            }
        }

        // return ngram from single string
        return $ngrams;
    }

    /**
     * this method for create multiple ngram or support multi string in array
     *
     * @return array
     */
    private static function multipleNgram()
    {
        $multipleNgram = [];
        foreach (self::$case_folding_string as $index => $string) {
            $multipleNgram[$index] = self::createNgram($string);
        }

        // return ngram from multiple string
        self::$multipleNgram = $multipleNgram;
        return self::$multipleNgram;
    }

    /**
     * method char2hash for create hash from one word with ngram
     *
     * @param string $string
     * @return array
     */
    private static function char2hash($string = "")
    {
        if (strlen($string) == 1) {
            return ord($string);
        } else {
            $result = 0;
            $length = strlen($string);
            for ($i = 0; $i < $length; $i++) {
                $result += ord(substr($string, $i, 1)) * pow(self::$n_prime_number, $length - $i);
            }
            return $result;
        }
    }

    /**
     * find rolling hash from ngram or it can say method for tokenizing
     *
     * @return void
     */
    private static function hashing($ngram)
    {
        $roll_hash = array();
        foreach ($ngram as $ng) {
            $roll_hash[] = self::char2hash($ng);
        }
        return $roll_hash;
    }

    /**
     * find muitiple rolling hash from ngram or it can say method for tokenizing
     *
     * @return void
     */
    private static function multiple_hashing()
    {
        $temp = [];
        foreach (self::$multipleNgram as $index => $value) {
            $temp[$index] = self::hashing($value);
        }

        self::$multiple_hashing = $temp;
        return self::$multiple_hashing;
    }


    /**
     * method fingerprint remove tokenizing
     * menghapus tokenizing yang tidak memiliki nilai yang sama
     *
     * @param [type] $window_table_arr
     * @return void
     */
    private static function matching($string_source_0, $target_source_n)
    {
        // mathing array same hash
        $arr_intersect = array_intersect($string_source_0, $target_source_n);

        // matching re write index from 0
        $macthing = [];
        foreach ($arr_intersect as $index => $value) {
            array_push($macthing, $value);
        }

        return $macthing;
    }

    /**
     * multiple method fingerprint remove tokenizing
     * multiple  menghapus tokenizing yang tidak memiliki nilai yang sama
     *
     * @return void
     */
    private static function multiple_matching()
    {
        $macthing = self::$multiple_hashing;
        $index_source = 0;

        $temp = [];
        foreach ($macthing as $index => $array_macthing) {

            // handling offet + 1
            if ($index + 1 >= count($macthing)) {
                break;
            }

            // run compare same hash
            $temp[$index] = self::matching($macthing[$index_source], $macthing[$index + 1]);
        }


        self::$multiple_matching = $temp;
        return self::$multiple_matching;
    }

    private static function DiceSimilarityCoefficient($macthing, $string_source_0, $target_source_n)
    {
        // formula :
        // pecahan format
        //    2 X C
        // S -------
        //    A + B
        // part of top : pembilang : The same hash number of two documents.
        // part of bottom : penyebut : : Number of hash schemes in documents A and B

        $pembilang = count($macthing);
        $penyebut = count(array_merge($string_source_0, $target_source_n));

        // handle divided by zero
        if($penyebut == 0.0 || $pembilang == 0.0){
            $coefficient = (2 * $pembilang) / 0.1;
    
            return $coefficient;
        }else{
            $coefficient = (2 * $pembilang) / $penyebut;
    
            return $coefficient;
        }
    }

    private static function multi_DiceSimilarityCoefficient()
    {
        $macthing = self::$multiple_matching;

        $index_first = 0;
        $temp = [];
        foreach ($macthing as $index => $value) {
            $temp[$index] = self::DiceSimilarityCoefficient($macthing[$index], self::$multiple_hashing[$index_first], self::$multiple_hashing[$index + 1]);
        }

        // class time tracker
        $timer = new TimeTracker("start-winnowing");
        $timer->add("winnowing execute");

        $value_time_calculate = [];
        $value_message = [];
        foreach ($temp as $index => $value) {
            $n_value = $index + 1;
            $value_message[$index] = "Document " . $index_first . " dibanding dengan Document ke " . $n_value . " = " . $value . " % percent kemiripan . dan " . $timer->calculatetime() . " detik waktu execution";
            $value_time_calculate[$index] = $timer->calculatetime();
        }

        self::$multiple_DiceCoefficient_value = $temp;
        self::$multiple_DiceCoefficient_message = $value_message;
        self::$multiple_time_execution = $value_time_calculate;
        return self::$multiple_DiceCoefficient_value;
    }

    public function Process($word)
    {

        // save word
        self::$data_word = $word;

        // automatic config check long string for make new config automatic coming soon

        // 0. text processing
        self::casefolding($word);

        // 1. create Ngram
        self::multipleNgram(self::$case_folding_string);

        // 2. Hashing Ngram
        self::multiple_hashing();

        // 3. Maching Hash
        self::multiple_matching(self::$multiple_hashing);

        // 4. member value
        self::multi_DiceSimilarityCoefficient();
    }

    private function find_word_similarity()
    {
        # comming soon
    }
    
    /**
     * method get result casefolding
     *
     * @return void
     */
    public function getCaseFolding()
    {
        return self::$case_folding_string;
    }

    /**
     * method get result ngram
     *
     * @return void
     */
    public function getNgram()
    {
        return self::$multipleNgram;
    }

    /**
     * method get result hashing
     *
     * @return void
     */
    public function getHashing()
    {
        return self::$multiple_hashing;
    }

    /**
     * method get result macthing
     *
     * @return itterable
     */
    public function getMacthing()
    {
        return self::$multiple_matching;
    }

    /**
     * method get result dicesimillarity value
     *
     * @return itterable
     */
    public function getDiceCoefficientValue()
    {
        return self::$multiple_DiceCoefficient_value;

    }

    /**
     * method get result dicesimillarity message
     *
     * @return itterable
     */
    public function getDiceCoefficientMessage()
    {
        return self::$multiple_DiceCoefficient_message;
    }

    /**
     * method get result dicesimillarity message
     *
     * @return itterable
     */
    public function getDiceCoefficientSimilarity()
    {
        // getting data word or sting
        $word = self::$data_word;

        // remove first index
        array_shift($word);

        // make box for new array
        $similarity = [];
        foreach (self::$multiple_DiceCoefficient_value as $index => $value) {
            $similarity[$word[$index]] = floor($value);
        }

        return $similarity;

    }

    /**
     * method getter result timer calculate progress algorithm
     *
     * @return void
     */
    public function timerCalculateProgress()
    {
        return self::$multiple_time_execution;
    }
}
