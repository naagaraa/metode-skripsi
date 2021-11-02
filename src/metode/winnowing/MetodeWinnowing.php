<?php

namespace Nagara\Src\Metode;

class MetodeWinnowing
{
    private $case_folding_string;
    private $multipleNgram;

    // input properties , hipotesis
    private $prime_number = 3;
    private $n_gram_value = 2;
    private $n_window_value = 4;

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
        $n = 5;

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
    public function char2hash()
    {
        $string = "textp";
        if (strlen($string) == 1) {
            // dump(ord($string));
            return ord($string);
        } else {
            $result = 0;
            $length = strlen($string);
            for ($i = 0; $i < $length; $i++) {
                $result += ord(substr($string, $i, 1)) * pow($this->prime_number, $length - $i);
            }
            // dump($result);
            return $result;
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function rolling_hash($ngram)
    {
        $roll_hash = array();
        foreach ($ngram as $ng) {
            $roll_hash[] = $this->char2hash($ng);
        }
        return $roll_hash;
    }

    public function multiple_rolling_hash()
    {
        $temp = [];
        foreach ($this->multipleNgram as $index => $value) {
            // dump($value);
            $temp[$index] = self::rolling_hash($value);
        }
        // self::rolling_hash()
        dump($temp);
    }


    /**
     * Undocumented function
     *
     * @param [type] $wordtext
     * @return void
     */
    public function process($wordtext)
    {
        // case folding step 1
        self::casefolding($wordtext);


        // create N-gram step 2
        self::multipleNgram();


        // rolloinghas masing masing ngram step 3


        // create windowing untuk masing masing tabel hash step 4


        // find value minimum masing masing window (fingerprint) step 5

    }
}
