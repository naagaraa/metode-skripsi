<?php



/**
 * this file for tested during I am develop metode skripshit
 *
 * @author      Eka Jaya Nagara <ekabersinar@gmail.com>
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

use LDAP\Result;

include "vendor/autoload.php";

use Nagara\Src\StringMagic;

$str = new StringMagic;

dump($str->vocal("next case"));
dump($str->konsonan("next case"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <h1>hello</h1>
   <script>
      function remVowel(str) {
         let al = ['a', 'e', 'i', 'o', 'u',
            'A', 'E', 'I', 'O', 'U'
         ];
         let result = "";

         for (let i = 0; i < str.length; i++) {

            if (!al.includes(str[i])) {
               result += str[i];
            }
         }
         console.log(result);
      }

      function Vowel(str) {
         let al = ['a', 'e', 'i', 'o', 'u',
            'A', 'E', 'I', 'O', 'U'
         ];
         let result = "";

         for (let i = 0; i < str.length; i++) {

            if (al.includes(str[i])) {
               result += str[i];
            }
         }
         console.log(result);
      }

      remVowel("sample case");
      Vowel("sample case");
   </script>
</body>

</html>