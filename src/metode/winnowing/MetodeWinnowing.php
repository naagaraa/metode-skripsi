<?php

namespace Nagara\Src\Metode;

class MetodeWinnowing
{
    /**
     * basic algorithm of winnowing
     * 
     * 1. case folding => menghapus spasi dan karakter yang tidak penting dan merubah menjadi huruf kecil
     * 2. ngram => membentuk nilai hasing dari setiap teks document yang dipecah
     * 3. window => pembagian karakter dalam window
     * 4. fingerprint => pembentukan fingerprint
     * 
     * count similarity used jaccard simmilarity
     *
     * 
     */

    private $case_folding_string;
    private $multipleNgram;
    private $multiple_rolling_hash;
    private $multiple_window;
    private $multiple_fingerprint;

    // input hipotesis and default
    private $n_gram_value;
    private $n_prime_number;
    private $n_window_value;

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

        // dump($casefolding);

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
            $temp[$index] = self::rolling_hash($value);
        }
        $this->multiple_rolling_hash = $temp;
        return $this->multiple_rolling_hash;
    }

    public function windowing($rolling_hash)
    {
        $n = $this->n_window_value;
        $ngram = array();
        $length = count($rolling_hash);
        $x = 0;
        for ($i = 0; $i < $length; $i++) {
            if ($i > ($n - 2)) {
                // dump($i);
                $ngram[$x] = array();
                $y = 0;
                for ($j = $n - 1; $j >= 0; $j--) {
                    $ngram[$x][$y] = $rolling_hash[$i - $j];
                    $y++;
                }
                $x++;
            }
        }
        //echo $x.' '.$y;
        return $ngram;
    }

    public function multiple_windowing()
    {
        $rolling_hash = $this->multiple_rolling_hash;
        $window = [];
        foreach ($rolling_hash as $index => $value) {
            $window[$index] = self::windowing($value);
        }

        $this->multiple_windowing = $window;
        return $this->multiple_windowing;
    }

    private function fingerprints($window_table_arr)
    {
        dump("window");
        $window_table = $window_table_arr;
        // dump($window_table);
        $fingers = array();
        for ($i = 0; $i < count($window_table); $i++) {
            $min = $window_table[$i][0];
            for ($j = 1; $j < $this->n_window_value; $j++) {
                if ($min > $window_table[$i][$j])
                    $min = $window_table[$i][$j];
            }
            $fingers[] = $min;
        }
        $this->multiple_fingerprint = $fingers;
        return $fingers;
    }

    public function multiple_fingerprint()
    {
        $window = $this->multiple_windowing;
        $fingers = [];
        foreach ($window as $index => $value) {
            $fingers[$index] = self::fingerprints($value);
        }

        $this->multiple_fingerprint = $fingers;
        return $this->multiple_fingerprint;
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
        self::multiple_rolling_hash();


        // create windowing untuk masing masing tabel hash step 4
        self::multiple_windowing();

        // find value minimum masing masing window (fingerprint) step 5
        self::multiple_fingerprint();
    }

    public function getCaseFolding()
    {
        return $this->case_folding_string;
    }

    public function getNgram()
    {
        return $this->multipleNgram;
    }

    public function getRollingHash()
    {
        return $this->multiple_rolling_hash;
    }

    public function getWindow()
    {
        return $this->multiple_windowing;
    }

    public function getFingersPrint()
    {
        return $this->multiple_fingerprint;
    }
}
