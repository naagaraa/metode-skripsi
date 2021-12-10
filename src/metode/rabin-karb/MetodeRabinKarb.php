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

    public function __construct($config = [])
    {
        // convert array to object
        $config = (object) $config;

        // set config
        $this->n_gram_value = $config->ngram;
        $this->n_prime_number = $config->prima;
        $this->n_window_value = $config->window;
    }
    /**
     * method case folding for remove character
     *
     * @param string $wordtext
     * @return array
     */
    public function casefolding($wordtext = "")
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

        dump("case folding");
        dump($casefolding);

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
    public function createNgram($casefolding = "")
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
    public function multipleNgram()
    {
        $multipleNgram = [];
        foreach ($this->case_folding_string as $index => $string) {
            $multipleNgram[$index] = self::createNgram($string);
        }

        dump("ngram");
        dump($multipleNgram);
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
    public function char2hash($string = "")
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
    public function hashing($ngram)
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
    public function multiple_hashing()
    {
        $temp = [];
        foreach ($this->multipleNgram as $index => $value) {
            $temp[$index] = self::hashing($value);
        }

        dump("hasing");
        dump($temp);
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
    private function matching($hash_table_arr)
    {
        // dump("window");
        $hash_table = $hash_table_arr;
        dd($hash_table);
        // dump($hash_table);
        $matching = array();
        for ($i = 0; $i < count($hash_table); $i++) {
            $min = $hash_table[$i][0];
            for ($j = 1; $j < $this->n_window_value; $j++) {
                if ($min > $hash_table[$i][$j])
                    $min = $hash_table[$i][$j];
            }
            $matching[] = $min;
        }

        return $matching;
    }

    /**
     * multiple method fingerprint remove tokenizing
     * multiple  menghapus tokenizing yang tidak memiliki nilai yang sama
     *
     * @return void
     */
    public function multiple_matching()
    {
        $window = $this->multiple_hashing;
        $matching = [];
        foreach ($window as $index => $value) {
            $matching[$index] = self::matching($value);
        }

        dump("matching");
        dump($matching);
        $this->multiple_matching = $matching;
        return $this->multiple_matching;
    }

    public function Process($word)
    {
        # comming soon

        // 0. text processing
        self::casefolding($word);

        // 1. create Ngram
        self::multipleNgram($this->case_folding_string);

        // 2. Hashing Ngram
        self::multiple_hashing();

        // 3. Maching Hash
        self::multiple_matching($this->multiple_hashing);

        // 4. member value
    }
}
