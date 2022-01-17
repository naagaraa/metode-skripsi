<?php



/**
 * this file for tested during I am develop metode skripshit
 *
 * @author      Eka Jaya Nagara
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi
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
 *
 */

include "vendor/autoload.php";

use Nagara\Src\Metode\TextWinnowing;
use Nagara\Src\Metode\MetodeWinnowing;

$wordtext1 = [
    0 => "ayah pergi kepasar",
    1 => "ibu pergi kepasar",
];


// inverts project
// hash 116
// kuadrat 16
// rolling =  hash * kuadrat

// hash 116
// log 16
// hashchar = hash / log

// dump("uji coba");
// dump(116 * 4);
// dump(101 * 2);
// dump(464 + 202);
// // 666
// echo "test";
// dump(crc32("hello world"));
// dump(crc32("world hello"));
// dump(chr(222957957));

// set config and run metode or algorithm
$winnowing = new MetodeWinnowing([
   "ngram" => 5,
   "prima" => 2,
   "window" => 4
]);

// $winnowing->process($wordtext1);
// echo "fingerpint";
// dump($winnowing->getFingersPrint());


// dump("ini char2 hash");
function char2hash($string = "")
{
   if (strlen($string) == 1) {
      return ord($string);
   } else {
      $result = 0;
      $length = strlen($string);
      for ($i = 0; $i < $length; $i++) {
            // prima
            // dump("prima"); 
            // dump(pow(2, $length - $i));
            // // char
            // dump("hash");
            // dump(ord(substr($string, $i, 1)));
            $result += ord(substr($string, $i, 1)) * pow(2, $length - $i);
      }
      return $result;
   }
}

function hash2char($hash = "")
{
   if (strlen($hash) == 1) {
      return ord($hash);
   } else {
      $result = 0;
      $length = strlen($hash);
      for ($i = 0; $i < $length; $i++) {
         $result += chr(substr($hash, $i, 1)) * pow(2, $length - $i);
      }
      return $result;
   }
}

dump(char2hash("text"));
// dump(hash2char(3376));

function encode($string, $key)
{
   $key = sha1($key);
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
      $hash .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
   }
   return $hash;
}

function decode($string, $key)
{
   $key = sha1($key);
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

// $encoded1 = encode("help me vanish", "secret");
// $encoded2 = encode("eka jaya nagara", "secret");
// dump($encoded1);
// dump($encoded2);
// $decoded1 = decode($encoded1, "secret");
// $decoded2 = decode($encoded2, "secret");
// dump($decoded1);
// dump($decoded2);

// set config and run metode or algorithm
$winnowing = new TextWinnowing([
   "ngram" => 5,
   "prima" => 2,
   "window" => 4
]);
$winnowing->process($wordtext1);
echo "hash encode";
dump($winnowing->getRollingHash());
echo "hash decode";
dump($winnowing->multiple_hash_char());
echo "ngram";
dump($winnowing->getNgram());
