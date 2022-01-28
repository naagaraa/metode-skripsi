<?php

/**
 * 
 * this file is single method of PHP Winnwoing
 * re Writing code Algorithm Winnowing for support multipe "pembanding string"
 * 
 * 
 * @author      Re-writing Eka Jaya Nagara <ekabersinar@gmail.com>     
 * @license     MIT public license
 * @source      https://github.com/naagaraa/metode-skriphit
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


use Nagara\Src\TimeTracker;

class MetodeWinnowingv2
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

   private static $data_word;
   private static $case_folding_string;
   private static $multipleNgram;
   private static $multiple_rolling_hash;
   private static $multiple_windowing;
   private static $multiple_fingerprint;
   private static $multiple_jaccard_value;
   private static $multiple_jaccard_message;
   private static $jaccard_value;
   private static $multiple_time_execution;
   private static $multiple_hash_char;
   private static $multiple_deycrpt_char;

   // input hipotesis and default value
   private static $n_gram_value;
   private static $n_key;
   private static $n_window_value;

   public function __construct($config = [])
   {
      if (!isset($config["key"])) {
         echo "tidak ada key, we need key for decrypt";
         exit;
      }

      // convert array to object
      $config = (object) $config;

      // set config
      self::$n_gram_value = $config->ngram;
      self::$n_key = $config->key;
      self::$n_window_value = $config->window;

      dump(self::$n_key);
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

      // dump($casefolding);

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
    * method char2hash for create hash from one word with 
    * reference https://gist.github.com/LogIN-/e451ab0e8738138bc60b
    *
    * @param string $string
    * @return array
    */
   private static function char2hash($string = "")
   {
      if (!$string) {
         return false;
      }

      $key = sha1(self::$n_key);
      $strLen = strlen($string);
      $keyLen = strlen($key);
      $j = 0;
      $hash = '';
      for ($i = 0; $i < $strLen; $i++) {
         $ordStr = ord(substr($string, $i, 1));
         if ($j == $keyLen) {
            $j = 0;
         }
         $ordKey = ord(substr($key, $j, 1));
         $j++;
         dump(strrev(base_convert(dechex($ordStr + $ordKey), 16, 36)));
         $hash .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
      }
      return $hash;
   }

   /**
    * method hash to char
    * reference https://gist.github.com/LogIN-/e451ab0e8738138bc60b
    *
    * @param string $string
    * @return void
    */
   public static function hash2char($string = "")
   {
      if (!$string) {
         return false;
      }

      $key = sha1(self::$n_key);
      $strLen = strlen($string);
      $keyLen = strlen($key);
      $j = 0;
      $hash = '';
      for ($i = 0; $i < $strLen; $i += 2) {
         $ordStr = hexdec(base_convert(strrev(substr($string, $i, 2)), 36, 16));
         if ($j == $keyLen) {
            $j = 0;
         }
         $ordKey = ord(substr($key, $j, 1));
         $j++;
         $hash .= chr($ordStr - $ordKey);
      }
      return $hash;
   }

   /**
    * find rolling hash from ngram or it can say method for tokenizing
    *
    * @return void
    */
   private static function rolling_hash($ngram)
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
   private static function multiple_rolling_hash()
   {
      $temp = [];
      foreach (self::$multipleNgram as $index => $value) {
         $temp[$index] = self::rolling_hash($value);
      }
      self::$multiple_rolling_hash = $temp;
      return self::$multiple_rolling_hash;
   }

   /**
    * find muitiple rolling hash from ngram or it can say method for tokenizing
    *
    * @return void
    */
   public static function multiple_hash_char()
   {
      $temp = [];
      foreach (self::$multiple_fingerprint as $index => $value) {
         foreach ($value as $key => $hash) {
            $temp[$index][$key] = self::hash2char($value[$key]);
         }
      }

      self::$multiple_hash_char = $temp;
      return self::$multiple_hash_char;
   }

   /**
    * split rolling hash into window with prime number
    *
    * @param [type] $rolling_hash
    * @return void
    */
   private static function windowing($rolling_hash)
   {
      $n = self::$n_window_value;
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

   /**
    * mulplte split rolling hash into window with prime number
    *
    * @return void
    */
   private static function multiple_windowing()
   {
      $rolling_hash = self::$multiple_rolling_hash;
      $window = [];
      foreach ($rolling_hash as $index => $value) {
         $window[$index] = self::windowing($value);
      }

      self::$multiple_windowing = $window;
      return self::$multiple_windowing;
   }

   /**
    * method fingerprint remove tokenizing
    * menghapus tokenizing yang tidak memiliki nilai yang sama
    *
    * @param [type] $window_table_arr
    * @return void
    */
   private static function fingerprints($window_table_arr)
   {
      // dump("window");
      $window_table = $window_table_arr;
      // dump($window_table);
      $fingers = array();
      for ($i = 0; $i < count($window_table); $i++) {
         $min = $window_table[$i][0];
         for ($j = 1; $j < self::$n_window_value; $j++) {
            if ($min > $window_table[$i][$j])
               $min = $window_table[$i][$j];
         }
         $fingers[] = $min;
      }
      self::$multiple_fingerprint = $fingers;
      return $fingers;
   }

   /**
    * multiple method fingerprint remove tokenizing
    * multiple  menghapus tokenizing yang tidak memiliki nilai yang sama
    *
    * @return void
    */
   private static function multiple_fingerprint()
   {
      $window = self::$multiple_windowing;
      $fingers = [];
      foreach ($window as $index => $value) {
         $fingers[$index] = self::fingerprints($value);
      }

      self::$multiple_fingerprint = $fingers;
      return self::$multiple_fingerprint;
   }


   /**
    * method algorithm calculate similarity tokenizing based jaccard index
    *
    * @return void
    */
   private static function jaccard_coefficient($string_source_0, $target_source_n)
   {

      $arr_intersect = array_intersect($string_source_0, $target_source_n);
      $arr_union = array_merge($string_source_0, $target_source_n);
      $count_intersect_fingers = count($arr_intersect);
      $count_union_fingers = count($arr_union);

      // handle default by zero. if zero 
      if ($count_intersect_fingers == 0.0) {
         $coefficient = 0.1 /
            ($count_union_fingers - 0.1);

         self::$jaccard_value = $coefficient * 100;
         return self::$jaccard_value;
      } else {
         $coefficient = $count_intersect_fingers /
            ($count_union_fingers - $count_intersect_fingers);

         self::$jaccard_value = $coefficient * 100;
         return self::$jaccard_value;
      }
   }


   /**
    * method algorithm calculate similarity tokenizing based jaccard index for multiple string
    *
    * @return void
    */
   private static function multiple_jaccard_coeffcient()
   {
      $finger_print = self::$multiple_fingerprint;
      $index_source = 0;

      $temp = [];
      foreach ($finger_print as $index => $array_fingerprint) {

         // handling offet + 1
         if ($index + 1 >= count($finger_print)) {
            break;
         }
         $temp[$index] = self::jaccard_coefficient($finger_print[$index_source], $finger_print[$index + 1]);
      }

      // class time tracker
      $timer = new TimeTracker("start-winnowing");
      $timer->add("winnowing execute");

      $value_time_calculate = [];
      $value_message = [];
      foreach ($temp as $index => $value) {
         $n_value = $index + 1;
         $value_message[$index] = "Document " . $index_source . " dibanding dengan Document ke " . $n_value . " = " . floor($value) . " % percent kemiripan. dan " . $timer->calculatetime() . " detik waktu execution";
         $value_time_calculate[$index] = $timer->calculatetime();
      }

      self::$multiple_jaccard_message = $value_message;
      self::$multiple_jaccard_value = $temp;
      self::$multiple_time_execution = $value_time_calculate;
      return self::$multiple_jaccard_message;
   }

   /**
    * stringDeycrpt method
    *
    * @param [type] $string_source_0
    * @param [type] $target_source_n
    * @return void
    */
   private static function stringDeycrpt($string_source_0, $target_source_n)
   {
      $arr_intersect = array_intersect($string_source_0, $target_source_n);
      $clean_duplicate = array_unique($arr_intersect);

      $temp = [];
      foreach ($clean_duplicate as $key => $value) {
         array_push($temp, self::hash2char($value));
      }

      $sentence = implode(" ", $temp);
      return $sentence;
   }

   /**
    * stringDeycrpt method
    *
    * @param [type] $string_source_0
    * @param [type] $target_source_n
    * @return void
    */
   private static function multiple_stringDeycrpt()
   {
      $finger_print = self::$multiple_fingerprint;
      $index_source = 0;

      $temp = [];
      foreach ($finger_print as $index => $array_fingerprint) {

         // handling offet + 1
         if ($index + 1 >= count($finger_print)) {
            break;
         }
         $temp[$index] = self::stringDeycrpt($finger_print[$index_source], $finger_print[$index + 1]);
      }

      self::$multiple_deycrpt_char = $temp;
      return self::$multiple_deycrpt_char;
   }

   /**
    * core process algorithm windowing with jaccard index
    *
    * @param [type] $wordtext
    * @return void
    */
   public function process($wordtext)
   {

      // save data
      self::$data_word = $wordtext;

      // automatic config check long string for make new config automatic coming soon

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

      // count similarity with jaccard coefficient
      self::multiple_jaccard_coeffcient();

      // get decode
      self::multiple_stringDeycrpt();
   }


   public function get_word_similarity()
   {
      # comming soon
      return self::$multiple_deycrpt_char;
   }

   /**
    * method getter result case folding
    *
    * @return itterable
    */
   public function getCaseFolding()
   {
      return self::$case_folding_string;
   }

   /**
    * method getter result ngram
    *
    * @return itterable
    */
   public function getNgram()
   {
      return self::$multipleNgram;
   }

   /**
    * method getter result rolling hash
    *
    * @return itterable
    */
   public function getRollingHash()
   {
      return self::$multiple_rolling_hash;
   }

   /**
    * method getter result window
    *
    * @return itterable
    */
   public function getWindow()
   {
      return self::$multiple_windowing;
   }

   /**
    * method getter result fingerprint
    *
    * @return itterable
    */
   public function getFingersPrint()
   {
      return self::$multiple_fingerprint;
   }

   /**
    * method getter result jaccard value index
    *
    * @return itterable
    */
   public function getJaccardCoefficientValue()
   {
      return self::$multiple_jaccard_value;
   }

   /**
    * method getter result jaccard index message (string format)
    *
    * @return itterable
    */
   public function getJaccardCoefficientMessage()
   {
      return self::$multiple_jaccard_message;
   }

   /**
    * method getter result jaccard simiarity (string format)
    *
    * @return itterable
    */
   public function getJaccardCoefficientSimilarity()
   {
      // getting data word or sting
      $word = self::$data_word;

      // remove first index
      array_shift($word);

      // make box for new array
      $similarity = [];
      foreach (self::$multiple_jaccard_value as $index => $value) {
         $similarity[$word[$index]] = floor($value);
      }

      return $similarity;
   }

   /**
    * method getter result timer calculate progress algorithm
    *
    * @return itterable
    */
   public function timerCalculateProgress()
   {
      return self::$multiple_time_execution;
   }
}
