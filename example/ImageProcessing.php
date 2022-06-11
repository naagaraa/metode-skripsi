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

// load my libraries
use Nagara\Src\Img\ImgParser;
use Nagara\Src\Img\ImgMagic;
use Nagara\Src\Img\ImageProcessing;
use Nagara\Src\Metode\MetodeWinnowing;

// convert image to black and white dan format png # sorry kelupaan
$image1 = new ImgMagic;
$image2 = new ImgMagic;
$path1 =  "ktp1.jpg";
$path2 =  "ktp2.jpg";
$image1->filter($path1, "grayscale");
$image2->filter($path2, "grayscale");

// image processing
$path1 =  "ktp1.png";
$path2 =  "ktp2.png";
$imgProcess1 = new ImageProcessing($path1);
$imgProcess1->Rescaling(720)->Binarisation(0.33,1)->NoiseRemoval(7);
// $imgProcess1->showImage();

$imgProcess2 = new ImageProcessing($path2);
$imgProcess2->Rescaling(720)->Binarisation(0.33,1)->NoiseRemoval(7);
// $imgProcess2->showImage();


// ocr
$img1 = new ImgParser('C:\Program Files\Tesseract-OCR\tesseract.exe'); # example path exe'C:\Program Files\Tesseract-OCR\tesseract.exe'
$img2 = new ImgParser('C:\Program Files\Tesseract-OCR\tesseract.exe'); # example path exe'C:\Program Files\Tesseract-OCR\tesseract.exe'
$text1 = $img1->parseFile($path1, "recognition");
$text2 = $img2->parseFile($path2, "recognition");


// error test
if ($text1['status'] == false) {
   echo "gambar tidak mengandung text";
   // $imgProcess->showImage();
   dump($text1["result"]); # debug hasilnya
   dump($text2["result"]); # debug hasilnya
}else{
   echo "gambar mengandung text";
   // $imgProcess->showImage();
   dump($text1["result"]); # debug hasilnya
   dump($text2["result"]); # debug hasilnya
}
