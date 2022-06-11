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

// image processing psudo code

// rescaling
// binarisation
// noise removal
// dilation / erotion
// rotation / deskewing
// borders
// transparancy / alpha channel


class ImageProcessing {

   private $blob;
   private $image;
   private $dimension;

   public function __construct($pathToImage){
      // file validation
      !is_file(realpath($pathToImage)) ? die('soory is not file') : true;
      $this->image = $pathToImage;
      return $this;
   }

   /**
    * show GetDimension Image
    *
    * @return void
    */
   public function GetDimension()
   {
      $imagick = new \Imagick(realpath($this->image));
      $dimension = $imagick->getImageGeometry();
      $this->dimension = $dimension;
      echo "Dimension width : {$this->dimension['width']} DPI and height :{$this->dimension['height']} DPI";
      return $this;
   }

   /**
    * Rescaling Image defauld value 1200
    *
    * @param integer $DPI
    * @return void
    */
   public function Rescaling($DPI = 1200)
   {
      try {

         // rescaling image
         $imagick = new \Imagick(realpath($this->image));
         $imagick->scaleImage($DPI, $DPI, true);
         // header("Content-Type: image/jpg");
         $this->blob = $imagick->getImageBlob();
         $dimension = $imagick->getImageGeometry();

         // write image
         if ($dimension >= 300) {
            $imagick->scaleImage($DPI, $DPI, true);
            $imagick->writeImage(realpath($this->image));
         }

         // echo $this->blob;
         // remove old image
         // $imagick->destroy();
         return $this;
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   /**
    * method Binarisation Image
    *
    * @param float $threshold
    * @param integer $channel
    * @return void
    */
   public function Binarisation($threshold = 0.44, $channel = 1)
   {
      try {
         // header("Content-Type: image/jpg");
         $imagick = new \Imagick(realpath($this->image));
         $imagick->thresholdimage($threshold * \Imagick::getQuantum(), $channel);
         $imagick->writeImage(realpath($this->image));

         // echo $this->blob;
         // remove old image
         // $imagick->destroy();
         return $this;
      } catch (\Throwable $th) {
         //throw $th;
      }
      
   }

   /**
    * Method Noise Removal Image
    *
    * @param integer $quality
    * @return void
    */
   public function NoiseRemoval($quality = 5)
   {
      $imagick = new \Imagick(realpath($this->image));
      $imagick->setImageCompressionQuality($quality);
      $imagick->despeckleImage();
      $imagick->writeImage(realpath($this->image));

      // echo $this->blob;
      // remove old image
      // $imagick->destroy();
      // header("Content-Type: image/jpg");
      // echo $imagick->getImageBlob();
      return $this;
   }

   /**
    * beta method Dilation and Erotion
    *
    * @return void
    */
   public function DilationAndErotion()
   {
      $imagick = new \Imagick(realpath($this->image));
      $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_GAUSSIAN, "3,1");
      $imagick->morphology(\Imagick::MORPHOLOGY_CONVOLVE, 2, $kernel);
      // header("Content-Type: image/png");
      $imagick->writeImage(realpath($this->image));
        // remove old image
      // $imagick->destroy();
      // echo $imagick->getImageBlob();
      return $this;
   }

   /**
    * method show reusult image
    *
    * @return void
    */
   public function ShowImage()
   {
      header("Content-Type: image/jpg");
      $imagick = new \Imagick(realpath($this->image));
      echo $imagick->getImageBlob();
      return $this;
   }

}
