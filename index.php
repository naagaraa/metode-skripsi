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

// STATUS GIZI BALITA

// data
$tb = [65, 65, 60, 60, 52, 51, 54, 52.5, 70, 71, 72.5, 71.5, 55, 57, 52, 46.5, 95, 82, 75, 99, 99, 97.5, 88, 75, 95, 72, 50, 67, 68, 65, 61, 62, 53, 55, 54, 52.5, 77, 73, 72.5, 71.5, 55, 59, 54, 46.5, 95, 87, 75, 92.5, 93, 97.5];

$bb = [5.8, 7.2, 5, 8, 5.8, 5, 3.5, 7.8, 4.2, 6.2, 7, 8.5, 5.5, 4.8, 6.5, 5.7, 12, 9.7, 8, 11, 7.8, 10, 9.4, 10.1, 12.8, 10.2, 6, 5, 8.2, 9.4, 7.1, 5.8, 3.5, 5.8, 3.5, 6.8, 4.7, 5.8, 6.9, 8.1, 6.7, 5.5, 4.9, 4.2, 7.4, 9.1, 6.5, 9.4, 8.4, 7.9];

dump(count($tb)); // 50
dump(count($bb)); // 50
