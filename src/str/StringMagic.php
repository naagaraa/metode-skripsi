<?php

/**
 * 
 * this file is for image parser text
 * 
 * 
 * @author       ekajayanagara <ekabersinar@gmail.com>
 * @package library for string magic     
 *              
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
 * 
 */

namespace Nagara\Src\Str;

class StringMagic
{

   /**
    * remove non-vowel char return sort character
    *
    * @param array $string
    * @return void
    */
   public function vocal($string = "")
   {
      $string = str_split(str_replace(" ", "", strtolower($string)));
      $vocal = "aiueo";
      $result = [];
      sort($result);

      foreach ($string as $key => $value) {
         if (str_contains($vocal, $value)) {
            array_push($result, $value);
         }
      }

      return implode("", $result);
   }

   /**
    * remove vowel char return sort character
    *
    * @param array $string
    * @return void
    */
   public function konsonan($string = "")
   {
      $string = str_split(str_replace(" ", "", strtolower($string)));
      $vocal = "aiueo";
      $result = [];
      sort($result);

      foreach ($string as $key => $value) {
         if (!str_contains($vocal, $value)) {
            array_push($result, $value);
         }
      }

      return implode("", $result);
   }

   /**
    * method for check tahun kabisat atau bukan
    *
    * @param integer $tahun
    * @return boolean
    */
   public function isKabisat(int $tahun)
   {
      echo ($tahun % 4 == 0) ? "tahun kabisat" : "bukan tahun kabisat";
   }


   /**
    * method ofr check word is palindrom atau bukan
    *
    * @param [type] $string
    * @return boolean
    */
   public function isPalindrom($string)
   {
      echo strrev($string) == $string ? "palindrome" : "bukan palindrome";
   }

   /**
    * method for find fibbonaci number
    *
    * @param integer $input
    * @return void
    */
   public function fibbonaci(int $input)
   {
      $angka_sekarang = 1;
      $angka_sebelumnya = 0;

      if ($input >= 2) {
         echo "$angka_sebelumnya $angka_sekarang";

         for ($i = 0; $i < $input - 2; $i++) {
            $result = $angka_sekarang + $angka_sebelumnya;
            echo " $result";

            $angka_sebelumnya = $angka_sekarang;
            $angka_sekarang = $result;
         }
      } else {
         echo "{$angka_sebelumnya}";
      }
   }

   /**
    * method for print pyramid start
    *
    * @param [type] $n
    * @return void
    */
   public function triangle($n)
   {

      $size = $n;
      for ($i = 1; $i <= $size; $i++) {
         for ($j = 1; $j <= $size - $i; $j++) {
            echo "&nbsp;&nbsp;";
         }
         for ($k = 1; $k <= $i; $k++) {
            echo "*&nbsp;&nbsp;";
         }
         echo "<br />";
      }
   }

   /**
    * this method test coding for hired me
    *
    * @param integer $family
    * @param array $member
    * @return void
    */
   public function checkbus($family = 5, $member = [])
   {
      if ($family == count($member)) {
         sort($member);
         $max_familily = 4;
         // echo "this is valid data";

         $random_bus = [];
         $max_bus = [];
         foreach ($member as $index => $currenly_member) {
            if ($currenly_member == $max_familily) {
               // echo "skip to next family <br>";
               array_push($max_bus, $currenly_member);
               continue;
            } elseif ($currenly_member <= $max_familily) {
               // echo "sum currenly to next member <br>";
               array_push($random_bus, $currenly_member);
            }
         }

         $a = array_sum($random_bus) / 4;
         $b = count($max_bus);

         echo "Minimum bus required is : " . ceil($a + $b);
      } else {
         echo "Input must be equal with count of family";
      }
   }
}
