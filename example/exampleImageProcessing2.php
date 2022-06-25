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

include "vendor/autoload.php";

use Nagara\Src\Img\ImageProcessing;
use Nagara\Src\Img\ImgMagic;
use Nagara\Src\Img\ImgParser;

// convert image to black and white step 1
$image = new ImgMagic;
$path = "wallpaper.jpg";

// image processing
$imgProcess = new ImageProcessing($path);
$imgProcess->Grayscale();
$imgProcess->Rescaling(1200);
$imgProcess->Binarisation(0.33, 1);
$imgProcess->NoiseRemoval();
$imgProcess->DilationAndErotion(12); # $radius = 0, $sigma = 0, $channel = 1
$imgProcess->Deskewing();

// get blob and write file
$blob = $imgProcess->getBlob();
$imgProcess->writeFile($path, $blob[2]); # replace old file, if u don't want replace make new file name

// image ocr
$img = new ImgParser('C:\Program Files\Tesseract-OCR\tesseract.exe');
$text = $img->parseFile($path, "recognition"); # return array

# error message
if ($text['status'] == false) {
    echo "gambar tidak mengandung text";
} else {
    echo $text['result'];
}

?>

<h2>grayscale</h2>
<img src="data:image/jpg;base64,<?=$blob[0]?>" alt="grayscale" srcset="">
<h2>rescaling</h2>
<img src="data:image/jpg;base64,<?=$blob[1]?>" alt="rescaling" srcset="">
<h2>binarisation</h2>
<img src="data:image/jpg;base64,<?=$blob[2]?>" alt="binarisation" srcset="">
<h2>noise removal</h2>
<img src="data:image/jpg;base64,<?=$blob[3]?>" alt="noiseremoval" srcset="">
<h2>dilation and erotion</h2>
<img src="data:image/jpg;base64,<?=$blob[4]?>" alt="dilationanderotion" srcset="">
<h2>deskewing</h2>
<img src="data:image/jpg;base64,<?=$blob[5]?>" alt="deskewing" srcset="">
