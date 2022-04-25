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

namespace Nagara\Src;

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
}
