<?php

/**
 * 
 * this file is single method of PHP Technique for Rabin Karb string matching
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Technique for Rabin Karb string matching
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
 */

namespace Nagara\Src\Metode;

use Nagara\Src\Math\MathematicClass;
use Nagara\Src\Math\MatrixClass;


class MetodeRabinKarb
{
    /** 
     * @var String
     */
    private $pattern;
    private $patternHash;
    private $text;
    private $previousHash;

    /** 
     * @var Integer
     */
    private $radix;
    private $prime;
    private $position;

    /** 
     * Constructor 
     *
     * @param String $pattern - The pattern
     *
     */
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
        $this->radix = 256;
        $this->prime = 100007;
        $this->previousHash = "";
        $this->position = 0;
        $this->patternHash = $this->generateHash($pattern);
    }

    private function generateHash($key)
    {
        $charArray = str_split($key);
        $hash = 0;
        foreach ($charArray as $char) {
            $hash = ($this->radix * $hash + ord($char)) % $this->prime;
        }

        return $hash;
    }

    public function search($character)
    {
        $this->text .= $character;
        if (strlen($this->text) < strlen($this->pattern)) {
            return false;
        } else {
            $txtHash = 0;
            echo $this->previousHash . "<br/>";
            if (empty($this->previousHash)) {
                $txtHash = $this->generateHash($this->text);
                $this->previousHash = $txtHash;
                $this->position = 0;
            } else {
                // The issue is here 
                $charArray = str_split($this->text);
                $txtHash = (($txtHash  + $this->prime) - $this->radix * strlen($this->pattern) * ord($charArray[$this->position]) % $this->prime) % $this->prime;
                $txtHash = ($txtHash * $this->radix + ord($character)) % $this->prime;

                $this->previousHash = $txtHash;
            }

            if ($txtHash == $this->patternHash) {
                echo "Hash Match found";
            }
        }
    }
}
