<?php

/**
 * 
 * this file is for image parser text
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa
 * @license     MIT public license
 * @describe    this tool using tesseract-OCR and libraries php-tecceract from thiagoalession
 *              <https://github.com/thiagoalessio/tesseract-ocr-for-php>
 *              <https://github.com/tesseract-ocr/tesseract>
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

namespace Nagara\Src\Img;

use thiagoalessio\TesseractOCR\TesseractOCR;

class ImgParser
{
    private $path_tesseract = 'C:\Program Files\Tesseract-OCR\tesseract.exe';
    /**
     * Parse image file
     *
     * @param string $filename
     * @return string
     */
    public function __construct(String $path = null)
    {
        $this->path_tesseract = $path;
    }
    
    public function parseFile($image = "", $lang = "")
    {

        if ($image == "") {
            echo "sorry please put your image bro before use this tool";
            die;
        }

        if (!$lang) {
            // simple execute
            try {
                $text = (new TesseractOCR($image))
                    ->executable($this->path_tesseract)
                    ->run(500);

                $result = [
                    "status" => true,
                    "result" => $text
                ];
                return $result;
            } catch (\Throwable $th) {
                $error = [
                    "status" => false,
                    "result" => $th->getMessage()
                ];
                return $error;
            }
            
        } elseif ($lang == "recognition") {
            // note this process can take long process for detect image
            try {
                $text = (new TesseractOCR($image))
                        ->executable($this->path_tesseract)
                        ->lang("deu", "eng", "fra", "ita", "jpn", "spa")
                        ->run(500);
                 $result = [
                    "status" => true,
                    "result" => $text
                ];
                return $result;
            } catch (\Throwable $th) {
               $error = [
                    "status" => false,
                    "result" => $th->getMessage()
                ];
                return $error;
            }
            
        } else {
            //  check lang support
            if (self::islang($lang) == false) {
                return "ups sorry {$lang} not support";
            }


            try {
                $text = (new TesseractOCR($image))
                    ->executable($this->path_tesseract)
                    ->lang($lang)
                    ->run(500);
                 $result = [
                    "status" => true,
                    "result" => $text
                ];
                return $result;
            } catch (\Throwable $th) {
                $error = [
                    "status" => false,
                    "result" => $th->getMessage()
                ];
                return $error;
            }
           
        }
    }

    public function islang($lang)
    {
        $language = [
            "deu", "eng", "fra", "ita", "jpn", "spa"
        ];

        return in_array($lang, $language);
    }

    public function printLangSupport()
    {
        echo "<br> this is language support by this lib : <br>";
        foreach ((new TesseractOCR())->availableLanguages() as $lang) {
            echo " - " . $lang . '<br>';
        };
    }

    public function printAbout()
    {
        $message = <<< HTML
            <p>lorem</p>
        HTML;

        echo $message;
    }
}
