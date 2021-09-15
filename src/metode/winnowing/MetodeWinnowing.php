<?php

/**
 * 
 * this file is single method of PHP Technique for Winnowing string matching
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa metode skripsi Technique for Winnowing string matching
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


class MetodeWinnowing
{
    public function option($input = "")
    {
        $input = str_replace(" ", "", strtolower($input));
        $input = explode(",", $input);

        asort($input);
        $str = "";
        foreach ($input as $input) {
            $str .= $input;
        }

        return $str;
    }

    public function casefolding($input)
    {
        $fil1 = [
            " ",
            ",",
            ".",
            "?",
            "<",
            ">",
            "_",
            ";",
            ":",
            "'",
            "@",
            "*",
            "#",
            "$",
            "&",
        ];

        $fil2 = [
            "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-", "=", "/", "+", "(", ")", "%"
        ];

        $fil3 = ["'"];
        $fil4 = ['"'];
        $fil5 = [
            " dan ",
            " adalah ",
            " merupakan ",
            " karena ",
            " atau ",
            " jika ",
            " di ",
            " yang ",
            " ke ",
            " dari ",
            " sedangkan "
        ];

        return strtolower(str_replace($fil1, "", (str_replace(
                $fil4,
                "",
                str_replace(
                    $fil3,
                    "",
                    str_replace(
                        $fil2,
                        "",
                        str_replace($fil5, "", $input)
                    )
                )
            ))));
    }

    public function gram($input)
    {
        $n_grams = 3;
        $grams = [];
        $leg = strlen($input);
        for ($i = 0; $i <= ($leg - $n_grams); $i++) {
            $grams[$i] = substr($input, $i, $n_grams);
        }
        return $grams;
        // $rollinghas($grams);
    }

    public function rollinghas($grams)
    {
        $prim = 2;
        $h = 0;
        $has = [];
        for ($i = 0; $i < count($grams); $i++) {
            for ($j = 0; $j < strlen($grams[$i]); $j++) {
                $pow = pow($prim, (strlen($grams[$i]) - ($j + 1)));
                $h += (ord(substr($grams[$i], $j, 1)) * $pow);
            }
            $has[$i] = $h;
            $h = 0;
        }

        return $has;
    }

    public function window($has)
    {
        $window = 0;
        $leg = count($has);
        $windows = [[]];
        for ($i = 0; $i < ($leg - $window); $i++) {
            for ($j = 0; $j < $window; $j++) {
                $windows[$i][$j] = $has[$j + $i];
            }
        }

        return $window;
    }

    public function finger($windows)
    {
        $x = 0;
        $fingers = [];
        for ($i = 0; $i < count($windows); $i++) {
            $min = min($windows[$i]);
            if (!in_array($min, $fingers)) {
                $fingers[$x++] = $min;
            }
        }

        // echo $fingers;
        return $fingers;
    }

    public function simality($array_a, $array_b)
    {
        $len_a = count($array_a);
        $len_b = count($array_b);

        $jml = 0;
        for ($i = 0; $i < $len_a; $i++) {
            if (in_array($array_a[$i], $array_b)) {
                $jml = $jml + 1;
            } else {
                array_push($array_b, $array_a[$i]);
            }
        }
        return (($jml / count($array_b)));
    }

    public function nilai($s, $b)
    {
        if ($s <= 0.10) {
            return 0 * $b;
        } elseif ($s <= 0.40) {
            return 0.3 * $b;
        } elseif ($s <= 0.55) {
            return 0.5 * $b;
        } elseif ($s <= 0.70) {
            return 0.75 * $b;
        } elseif ($s > 0.75) {
            return $b;
        }
    }

    public function winradi($input)
    {
        $case = $this->casefolding($input);
        $gram = $this->gram($case);
        $has = $this->rollinghas($gram);
        $win = $this->window($has);
        $fing = $this->finger($win);
        return $fing;
    }
}
