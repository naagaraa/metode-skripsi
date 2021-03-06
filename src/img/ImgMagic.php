<?php

/**
 * 
 * this file is for image parser text
 * 
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa
 * @license     MIT public license
 * @describe    this tool using image filter, thumbnail and other with PHP GD IMAGE and Imagic
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

use imagick;

class ImgMagic
{
   /**
    * method for make thumbnail image with php and imagic
    *
    * @param string $path
    * @param integer $size
    * @return void
    */
   public function MakeThumbnail($path = '', $size = 100)
   {
      if (!file_exists($path)) {
         echo "tidak ada file gambar";
      } else {

         header('Content-type: image/jpeg');

         $image = new Imagick($path);

         // If 0 is provided as a width or height parameter,
         // aspect ratio is maintained
         $image->thumbnailImage($size, 0);

         echo $image;
         return $this;
      }
   }

   /**
    * method for convert image to png, gif and bmp
    *
    * @param string $image
    * @param string $format default png
    * @return void
    */
   public function convert($image = "", $format = "png")
   {
      // check file ready
      !is_file($image)? die("file {$image} tidak ada ") : true;
      
      // split image name
      $extention= pathinfo($image, PATHINFO_EXTENSION);
      $filename= pathinfo($image, PATHINFO_FILENAME);;

      if ($extention == "jpg") {
         // GD image object size and trueColor
         $imageObject = imagecreatefromjpeg($image);

         switch ($format) {
            case 'png':
               imagepng($imageObject, $filename . '.png');
               // remove old files
               // unlink(realpath($image));
               return $this;
               break;

            case 'gif':
               imagegif(
                  $imageObject,
                  $filename . '.gif'
               );
               // remove old files
               // unlink(realpath($image));
               return $this;
               break;

            case 'bmp':
               imagewbmp(
                  $imageObject,
                  $filename . '.bmp'
               );
               // remove old files
               // unlink(realpath($image));
               return $this;
               break;

            default:
               echo "sorry data not valid";
               break;
         }
      } elseif ($extention == "png") {
         // GD image object size and trueColor
         $imageObject = imagecreatefrompng($image);

         switch ($format) {
            case 'jpg':
               imagejpeg($imageObject, $filename . '.jpg', 70);
               // remove old files
               // unlink(realpath($image));
               return $this;
               break;

            case 'gif':
               imagegif(
                  $imageObject,
                  $filename . '.gif'
               );
               // remove old files
               // unlink(realpath($image));
               return $this;
               break;

            case 'bmp':
               imagewbmp(
                  $imageObject,
                  $filename . '.bmp'
               );
               // remove old files
               // unlink(realpath($image));
               return $this;
               break;

            default:
               echo "sorry data not valid";
               break;
         }
      }
   }

   /**
    * method for give filter to image
    *
    * @param string $image
    * @param string $filter | negatif | gausian blur | selective blur | grayscale and emboss
    * @return void
    */
   public function filter($image = "", $filter = "")
   {
      if ($image === "") {
         echo "sorry we need file for process";
         exit;
      }

      // check extention only png
      $extention = pathinfo($image, PATHINFO_EXTENSION);
      $filename = pathinfo($image, PATHINFO_FILENAME);

      if ($extention !== "png") {
         $this->convert($image, "png");
         $photo = $filename . ".png";
      } else {
         $photo = $image;
      }

      switch ($filter) {
         case 'negatif':
            $im = imagecreatefrompng($photo);
            if ($im && imagefilter($im, IMG_FILTER_NEGATE)) {
               // echo 'Image converted to negative.';
               imagepng($im, $photo);
            } else {
               echo 'Conversion to negative failed.';
            }
            imagedestroy($im);
            return $this;
            break;

         case 'grayscale':
            $im = imagecreatefrompng($photo);
            if ($im && imagefilter($im, IMG_FILTER_GRAYSCALE)) {
               // echo 'Image converted to grayscale.';
               imagepng($im, $photo);
            } else {
               echo 'Conversion to grayscale failed.';
            }
            // imagedestroy($im);
            return $this;
            break;

         case 'gaussian_blur':
            $im = imagecreatefrompng($photo);
            if ($im && imagefilter($im, IMG_FILTER_GAUSSIAN_BLUR)) {
               // echo 'Image converted to gasian blur.';
               imagepng($im, $photo);
            } else {
               echo 'Conversion to gausian blur failed.';
            }
            imagedestroy($im);
            return $this;
            break;

         case 'emboss':
            $im = imagecreatefrompng($photo);
            if ($im && imagefilter($im, IMG_FILTER_EMBOSS)) {
               // echo 'Image converted to emboss.';
               imagepng($im, $photo);
            } else {
               echo 'Conversion to emboss failed.';
            }
            imagedestroy($im);
            return $this;
            break;

         case 'selective_blur':
            $im = imagecreatefrompng($photo);
            if ($im && imagefilter($im, IMG_FILTER_SELECTIVE_BLUR)) {
               // echo 'Image converted to selective blur.';
               imagepng($im, $photo);
            } else {
               echo 'Conversion to selective blur failed.';
            }
            imagedestroy($im);
            return $this;
            break;

         default:
            echo "hi yo what up";
            return $this;
            break;
      }
   }

}
