<?php

/**
 * 
 * this file is single method of PHP Technique for Rabin Karb string matching
 * 
 * 
 * @author      Eka Jaya Nagara     
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

class MetodeRabinKarb
{

    private $case_folding_string;
    private $multipleNgram;
    private $multiple_hashing;
    private $multiple_matching;
    private $multiple_DiceCoefficient;

    public function __construct($config = [])
    {
        // convert array to object
        $config = (object) $config;

        // set config
        $this->n_gram_value = $config->ngram;
        $this->n_prime_number = $config->prima;
    }
    /**
     * method case folding for remove character
     *
     * @param string $wordtext
     * @return array
     */
    private function casefolding($wordtext = "")
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

        $this->case_folding_string = $casefolding;
        return $this->case_folding_string;
    }

    /**
     * createNgram
     * this method for create random string for main string, example : iamgroot and
     * and gram is 5, first word 1amgr, and second word amgro, is slide char index 0 to 1
     *
     * @return array
     */
    private function createNgram($casefolding = "")
    {
        // note string akan dianggap array jika dipanggil menurut index.

        // core
        $word = $casefolding;
        $n = $this->n_gram_value;

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
    private function multipleNgram()
    {
        $multipleNgram = [];
        foreach ($this->case_folding_string as $index => $string) {
            $multipleNgram[$index] = self::createNgram($string);
        }

        // return ngram from multiple string
        $this->multipleNgram = $multipleNgram;
        return $this->multipleNgram;
    }

    /**
     * method char2hash for create hash from one word with ngram
     *
     * @param string $string
     * @return array
     */
    private function char2hash($string = "")
    {
        if (strlen($string) == 1) {
            return ord($string);
        } else {
            $result = 0;
            $length = strlen($string);
            for ($i = 0; $i < $length; $i++) {
                $result += ord(substr($string, $i, 1)) * pow($this->n_prime_number, $length - $i);
            }
            return $result;
        }
    }

    /**
     * find rolling hash from ngram or it can say method for tokenizing
     *
     * @return void
     */
    private function hashing($ngram)
    {
        $roll_hash = array();
        foreach ($ngram as $ng) {
            $roll_hash[] = $this->char2hash($ng);
        }
        return $roll_hash;
    }

    /**
     * find muitiple rolling hash from ngram or it can say method for tokenizing
     *
     * @return void
     */
    private function multiple_hashing()
    {
        $temp = [];
        foreach ($this->multipleNgram as $index => $value) {
            $temp[$index] = self::hashing($value);
        }

        $this->multiple_hashing = $temp;
        return $this->multiple_hashing;
    }


    /**
     * method fingerprint remove tokenizing
     * menghapus tokenizing yang tidak memiliki nilai yang sama
     *
     * @param [type] $window_table_arr
     * @return void
     */
    private function matching($string_source_0, $target_source_n)
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
    private function multiple_matching()
    {
        $macthing = $this->multiple_hashing;
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


        $this->multiple_matching = $temp;
        return $this->multiple_matching;
    }

    private function DiceSimilarityCoefficient($macthing, $string_source_0, $target_source_n)
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

        // convert to %
        $coefficient = floor(((2 * $pembilang) / $penyebut) * 100);

        return $coefficient;
    }

    private function multi_DiceSimilarityCoefficient()
    {
        $macthing = $this->multiple_matching;

        $index_first = 0;
        $temp = [];
        foreach ($macthing as $index => $value) {
            $temp[$index] = self::DiceSimilarityCoefficient($macthing[$index], $this->multiple_hashing[$index_first], $this->multiple_hashing[$index + 1]);
        }

        $this->multiple_DiceCoefficient = $temp;
        return $this->multiple_DiceCoefficient;
    }

    public function Process($word)
    {
        // 0. text processing
        self::casefolding($word);

        // 1. create Ngram
        self::multipleNgram($this->case_folding_string);

        // 2. Hashing Ngram
        self::multiple_hashing();

        // 3. Maching Hash
        self::multiple_matching($this->multiple_hashing);

        // 4. member value
        self::multi_DiceSimilarityCoefficient();
    }

    /**
     * method get result casefolding
     *
     * @return void
     */
    public function getCaseFolding()
    {
        return $this->case_folding_string;
    }

    /**
     * method get result ngram
     *
     * @return void
     */
    public function getNgram()
    {
        return $this->multipleNgram;
    }

    /**
     * method get result hashing
     *
     * @return void
     */
    public function getHashing()
    {
        return $this->multiple_hashing;
    }

    /**
     * method get result macthing
     *
     * @return void
     */
    public function getMacthing()
    {
        return $this->multiple_matching;
    }

    /**
     * method get result dicesimillarity
     *
     * @return void
     */
    public function getDiceCoefficient()
    {
        return $this->multiple_DiceCoefficient;
    }
}
