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

use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

include "vendor/autoload.php";

use Nagara\Src\Str\StringMagic;


$keluarga = 5;
$anggota = [1, 2, 4, 3, 3];
// $keluarga = 8;
// $anggota = [2, 3, 4, 4, 2, 1, 3, 1];
// $keluarga = 5;
// $anggota = [1, 5];

$str = new StringMagic;
// echo $str->checkbus($keluarga, $anggota); // return aa


$str = new StringMagic;
echo $str->vocal("sample case"); // return aa
echo "<br>";
echo $str->konsonan("sample case");

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

   <script>
      
   </script>
</body>

</html>