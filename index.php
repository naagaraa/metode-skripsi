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
?>

<html>

<head>
   <title>Image Similarity Measure </title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="Alfred francis, Ajith kumar" />
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <style>
      .container {
         width: 500px;
         margin: 0 auto;
      }
   </style>
</head>

<body>
   <div class="container">
      <h1>Image Similarity Measure </h1>
      <?php
      error_reporting(E_ERROR | E_WARNING | E_PARSE); //to avoid unwanted notices
      function compareImages($pathA, $pathB) //
      {
         $accuracy = 90; //Set accuracy of comparison
         $bim = imagecreatefromjpeg($pathA);  //load base image from internet
         //create comparison points
         $bimX = imagesx($bim);
         $bimY = imagesy($bim);
         $pointsX = $accuracy * 5;
         $pointsY = $accuracy * 5;
         $sizeX = round($bimX / $pointsX);
         $sizeY = round($bimY / $pointsY);
         $im = imagecreatefromjpeg($pathB); //load second image from internet
         //loop through each point and compare the color of that point
         $y = 0;
         $matchcount = 0;
         $num = 0;
         for ($i = 0; $i <= $pointsY; $i++) {
            $x = 0;
            for ($n = 0; $n <= $pointsX; $n++) {
               $rgba = imagecolorat($bim, $x, $y);
               $colorsa = imagecolorsforindex($bim, $rgba);
               $rgbb = imagecolorat($im, $x, $y);
               $colorsb = imagecolorsforindex($im, $rgbb);
               if (colorComp($colorsa['red'], $colorsb['red']) && colorComp($colorsa['green'], $colorsb['green']) && colorComp($colorsa['blue'], $colorsb['blue'])) {
                  $matchcount++;
               }
               $x += $sizeX;
               $num++;
            }
            $y += $sizeY;
         }
         $rating = $matchcount * (100 / $num);
         return $rating;
      }
      function colorComp($color, $c)
      {
         if ($color >= $c - 2 && $color <= $c + 2) {
            return true;
         } else {
            return false;
         }
      }
      if (isset($_POST["a"]) && isset($_POST["b"])) {
         if (exif_imagetype($_POST["a"]) != IMAGETYPE_JPEG || exif_imagetype($_POST["b"]) != IMAGETYPE_JPEG) {
      ?>
            <div class="alert alert-danger">
               <?php echo 'Use only JPEG images';
               exit(); ?>
            </div>
         <?php
         }

         $percent = round(compareImages($_POST["a"], $_POST["b"]));
         ?>
         <div class="alert <?php if ($percent < 5) {
                              echo "alert-danger";
                           } else if ($percent > 80) {
                              echo "alert-success";
                           } else {
                              echo "alert-info";
                           } ?>">
            <?php
            if ($percent < 5) {
               echo "Completely different images!";
            } else if ($percent >= 5 && $percent < 25) {
               echo "Something is similar somewhere!";
            } else if ($percent >= 25 && $percent < 50) {
               echo "Noticable Similarities!";
            } else if ($percent >= 50 && $percent < 80) {
               echo "Good Similarities!";
            } else if ($percent >= 80 && $percent < 90) {
               echo "Very similar images!";
            } else if ($percent >= 90 && $percent < 98) {
               echo "They look same!";
            } else {
               echo "They are exactly the same!";
            }
            echo " <br>Image Similarity Measure  : " . $percent . " %";
            ?>
         </div>
      <?php
      } else { ?>
         <form name="comapre" method="post" action="main.php">
            <input type="text" class="form-control" name="a" placeholder="Path to first Image (*.jpg)" required autofocus>
            <br>
            <input type="text" class="form-control" name="b" placeholder="Path to second Image (*.jpg)" required><br>
            <input type="submit" value="Compare" class="btn btn-lg btn-primary btn-block">
         </form>
      <?php } ?>
   </div>
</body>

</html>